<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Paystack;
use Session;
use  App\User;
use App\Models\Payment;
use App\Models\Result;
use App\Models\Student;
use App\Models\Studentapplicant;
use App\Models\Paymentapplicant;
use App\Models\Cardapplicant;
use App\Http\Traits\CloudinaryUpload;
use App\Alert;

class PaymentController extends Controller
{
  use CloudinaryUpload;

  /**
  * Redirect the User to Paystack Payment Page
  * @return Url
  */
 public function redirectToGateway(Request $request)
 {
   $request->validate([
       'amount' => 'required|string|max:255',
   ]);
   try {
     return Paystack::getAuthorizationUrl()->redirectNow();
   } catch (\Exception $e) {
     $note = $e->getMessage();
     return redirect()->back()->with('warning', $note);
   }
 }

 /**
  * Obtain Paystack payment information
  * @return void
  */
 public function handleGatewayCallback()
 {
     $paymentDetails = Paystack::getPaymentData();

     //Payment of school fees (PORTAL)
     if ($paymentDetails['data']['metadata']['payment_type'] == "Portal")
     {
     //determine if the payment was successful or not
     switch ($paymentDetails['data']['status']) {
       case 'success':

          $notification = Alert::alertMe('Payment successful!!!', 'success');
          return redirect('/portal/dashboard')->with($notification);
         break;

       default:
       $notification = Alert::alertMe('something went wrong!', 'warning');
       return redirect('/portal/dashboard')->with($notification);
         break;
     }
   }


   //admission payment
   if ($paymentDetails['data']['metadata']['payment_type'] == "Admission")
   {
     //dd($paymentDetails);
     switch ($paymentDetails['data']['status']) {
       case 'success':

         $notification = Alert::alertMe('Payment successful!!!, Please refresh if any value is not given', 'success');
         return redirect()->route('appformfee.activate')->with('success', 'Payment successful!!!, Please refresh page if any value is not yet given');
        break;

       default:
       $notification = Alert::alertMe('something went wrong!', 'warning');
       return redirect()->back()->with('success', 'something went wrong!!');
         break;
     }
   }

   //acceptance payment
   if ($paymentDetails['data']['metadata']['payment_type'] == "Acceptance")
   {  //dd($paymentDetails);
     switch ($paymentDetails['data']['status']) {
       case 'success':


       $payment = Paymentapplicant::create([
         'studentapplicant_id' => $paymentDetails['data']['metadata']['student_id'],
         'reference' => "accept/".$paymentDetails['data']['reference'], //concatenate accept to know whether a student has paid for his/her acceptance fee
         'payment_modes_id' => 1, // to show it is paid through paystack
         'status' => 'PAID',
         'amount' => ($paymentDetails['data']['amount']/100) - 300, //getting exact amount from paystack
         'created_at' => $paymentDetails['data']['createdAt'],
       ]);

       //automatically insert students that have paid acceptance fee into the school database
       $student = studentapplicant::find($paymentDetails['data']['metadata']['student_id']);
       $stateID = 29;
       $lgaID = 593;
       $SOR = $student->state_of_origin;
       if ($SOR == 'OYO STATE' or $SOR == 'OYO' or $SOR == 'Oyo state' or $SOR == 'Oyo State') {
         $stateID = 31;
         $lgaID = 661;
       }

       $user = User::create([
         'first_name' => $student->first_name,
         'middle_name' => $student->middle_name,
         'last_name' => $student->surname,
         'sex' => $student->gender,
         'phone' => $student->phone,
         'dob' => $student->dob,
         'state_id' => $stateID,
         'location_id' => $lgaID,
         'email' => $student->email,
         'password' => bcrypt($student->phone),
         'address' =>  $student->home_address,
         'city' => $student->state,
       ]);


       $rol = 3; // 3 is id for role as a student
         $user->roles()->sync([(int) $rol]);

       $students = $user->student()->create([
         'department_id' => $student->department_id,
         'matric_no' => $student->cardapplicant->reg_no,
         'level' => 100,
         'marital_status' => $student->marital_status,
         'admission_no' => $student->cardapplicant->reg_no,
         'sponsors_name' => $student->sponsor_name,
         'sponsors_phone' => $student->sponsor_phone,
       ]);

       $result = $students->result()->create([
         'exam_type' => $student->exam_type,
         'exam_no' => $student->exam_no,
         'mathematics' =>  $student->mathematics,
         'english' =>  $student->english,
         'chemistry' =>  $student->chemistry,
         'biology' =>  $student->biology,
         'physics' =>  $student->physics,
       ]);


       $imageData = $this->upload($student->pic_url, 'students', 3600, '', 'auto');
       $user->images()->create([
           'url' => $imageData['secure_url']
       ]);


         $notification = Alert::alertMe('Payment successful!!!', 'success');
         return redirect()->route('admission.dashboard')->with($notification);
        break;

       default:
       $notification = Alert::alertMe('something went wrong! Contact the Administrator', 'warning');
       return redirect()->route('admission.dashboard')->with($notification);
         break;
     }
   }


 }


 //webhook to handle event
 public function handleGatewayWebhook()
 {


 // Retrieve the request's body
 $input = @file_get_contents("php://input");
 $PAYSTACK = config('paystack.secretKey');

 // validate event do all at once to avoid timing attack
 if($_SERVER['HTTP_X_PAYSTACK_SIGNATURE'] !== hash_hmac('sha512', $input, $PAYSTACK))
   exit();

 http_response_code(200);

 // parse event (which is json string) as object
 // Do something - that will not take long - with $event
 $event = json_decode($input);
 /*$txt = $event->event." and ". $event->data->metadata->reg_no;
 $txt.= "\r\n";*/

//for tuition fee
 if ($event->data->metadata->payment_type == "Portal")
 {
 // get the session being paid for and concatenate late payment or early payment
 $getYr =$event->data->metadata->session;
 $getYr = substr($getYr,2,2)."".$event->data->metadata->reg_status;
 //determine if the payment was successful or not
 switch ($event->event) {
   case 'charge.success':
      $payment = Payment::create([
        'student_id' => $event->data->metadata->student_id,
        'reference' => $getYr."/".$event->data->metadata->lvl."/".$event->data->reference, //adding payment level to the reference
        'payment_modes_id' => 1,
        'status' => $event->data->metadata->pay_status,
        'amount' => ($event->data->amount/100) - 300, //getting exact amount from paystack
        'created_at' => $event->data->created_at,
      ]);

     break;

 }
}

 //admission payment
 if ($event->data->metadata->payment_type == "Admission")
 {
   //dd($paymentDetails);
   switch ($event->event) {
     case 'charge.success':
     //check whether the payment has been completed
     $chck = Cardapplicant::where('reg_no', $event->data->metadata->reg_no)->first();
    if ($chck == null)
    {
   //generate a rand pin
         $pin = (string)rand(1000000000, 9999999999);

        $card = Cardapplicant::create([
           'reg_no' => $event->data->metadata->reg_no,
           'password' => bcrypt($pin),
           'pin' => $pin,
         ]);

         $arr = explode(",",$event->data->metadata->Appname);
         $lastname = $arr[0];
         $firstname = $arr[1];

         //create a date for examination
         $num = $card->id;
           if ($num <= 650 ) {
             $date=date_create("2020-06-16");
           }elseif ($num > 650 and $num < 1150) {
             $date=date_create("2020-06-17");
           }else {
             $date=date_create("2020-06-18");
           }

         $student = $card->studentapplicant()->create([
            'first_name' => $firstname,
            'surname' => $lastname,
            'phone' => $event->data->metadata->phone,
            'email' => $event->data->customer->email,
            'dob' => $event->data->metadata->dob,
            'date_exam' => $date
         ]);

           $payment = $student->Paymentapplicant()->create([
             'reference' => $event->data->reference,
             'payment_modes_id' => 1, // to show it is paid through paystack
             'status' => 'PAID',
             'amount' => ($event->data->amount/100) - 300, //getting exact amount from paystack
             'created_at' => $event->data->created_at,
           ]);

          break;
       }
    }
}



/* $fWrite = fopen("akinator.txt","a");
 $wrote = fwrite($fWrite, $txt);
 fclose($fWrite);*/

   exit();
 }
 }
