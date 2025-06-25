<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Paystack;
use Session;
use App\User;
use App\Models\Payment;
use App\Models\Result;
use App\Models\Student;
use App\Models\Studentapplicant;
use App\Models\Paymentapplicant;
use App\Models\SystemSetting;
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
      $getYr =$paymentDetails['data']['metadata']['session'];
       $getYr = substr($getYr,2,2)."".$paymentDetails['data']['metadata']['reg_status'];
       $reference = $getYr."/".$paymentDetails['data']['metadata']['lvl']."/".$paymentDetails['data']['reference']; //adding payment level to the reference
       //determine if the payment was successful or not
     //determine if the payment was successful or not
     switch ($paymentDetails['data']['status']) {
       case 'success':
               $chck = Payment::where('reference', $reference)->first();
               if ($chck == null)
               {
              $payment = Payment::create([
                'student_id' => $paymentDetails['data']['metadata']['student_id'],
                'reference' => $reference,
                'payment_modes_id' => 1,
                'status' => $paymentDetails['data']['metadata']['pay_status'],
                'amount' => ($paymentDetails['data']['amount']/100) - 300, //getting exact amount from paystack
                'created_at' => $paymentDetails['data']['created_at'],
              ]);
            }

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
        sleep(3);
       /*$chck = Cardapplicant::where('invoice_id', $paymentDetails['data']['metadata']['student_id'])->first();
      if ($chck == null)
      {
     //generate a rand pin
           $pin = (string)rand(1000000000, 9999999999);

          $card = Cardapplicant::create([
             'invoice_id' =>  $paymentDetails['data']['metadata']['student_id'],
             'password' => bcrypt($pin),
             'pin' => $pin,
           ]);
           //create registration number
           $id = $card->id;
           $dep = 'CNM/23A/';
           //$dep = 'BMID/23/';
           if ($id < 10) {
               $txt = sprintf("%s000%u",$dep,$id);
           }
           if ($id < 100 and $id > 9) {
             $txt = sprintf("%s00%u",$dep,$id);
           }
           if ($id < 1000 and $id > 99) {
               $txt = sprintf("%s0%u",$dep,$id);
           }
           if ($id >= 1000) {
               $txt = sprintf("%s%u",$dep,$id);
           }
           $card->update([
             'reg_no' => $txt,
           ]);

           $arr = explode(",", $paymentDetails['data']['metadata']['Appname']);
           $lastname = $arr[0];
           $firstname = $arr[1];

          

           $student = $card->studentapplicant()->create([
              'first_name' => $firstname,
              'surname' => $lastname,
              'phone' =>  $paymentDetails['data']['metadata']['phone'],
              'email' => $paymentDetails['data']['customer']['email'],
              'dob' => $paymentDetails['data']['metadata']['dob']
           ]);

             $payment = $student->Paymentapplicant()->create([
               'reference' => $paymentDetails['data']['reference'],
               'payment_modes_id' => 1, // to show it is paid through paystack
               'status' => 'PAID',
               'amount' => ($paymentDetails['data']['amount']/100) - 300, //getting exact amount from paystack
               'created_at' => $paymentDetails['data']['createdAt'],
             ]);


         } */

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
 $reference = $getYr."/".$event->data->metadata->lvl."/".$event->data->reference; //adding payment level to the reference
 //determine if the payment was successful or not
 switch ($event->event) {
   case 'charge.success':
       $chck = Payment::where('reference', $reference)->first();
       if ($chck == null)
       {
      $payment = Payment::create([
        'student_id' => $event->data->metadata->student_id,
        'reference' => $reference,
        'payment_modes_id' => 1,
        'status' => $event->data->metadata->pay_status,
        'amount' => ($event->data->amount/100) - 300, //getting exact amount from paystack
        'created_at' => $event->data->created_at,
      ]);

     break;
       }
       $fWrite = fopen("akinator.txt","a");
         $wrote = fwrite($fWrite, $reference);
         fclose($fWrite);
 }
}

 //admission payment
 if ($event->data->metadata->payment_type == "Admission")
 {
     
   $reg_no = SystemSetting::where('name','registration_number')->select('value')->first();
   switch ($event->event) {
     case 'charge.success':
     //check whether the payment has been completed
     $chck = Cardapplicant::where('invoice_id', $event->data->metadata->student_id)->count();
     $rounds = $chck <= $event->data->metadata->rounds ? true : false;
    if ($rounds)
    {
   //generate a rand pin
         $pin = (string)rand(1000000000, 9999999999);

        $card = Cardapplicant::create([
           'invoice_id' => $event->data->metadata->student_id,
           'password' => bcrypt($pin),
           'pin' => $pin,
         ]);

         $id = $card->id;
         $dep = $reg_no->value;
           //$dep = 'BMID/23/';
         if ($id < 10) {
             $txt = sprintf("%s000%u",$dep,$id);
         }
         if ($id < 100 and $id > 9) {
           $txt = sprintf("%s00%u",$dep,$id);
         }
         if ($id < 1000 and $id > 99) {
             $txt = sprintf("%s0%u",$dep,$id);
         }
         if ($id >= 1000) {
             $txt = sprintf("%s%u",$dep,$id);
         }
         $card->update([
           'reg_no' => $txt,
         ]);

         $arr = explode(",",$event->data->metadata->Appname);
         $lastname = $arr[0];
         $firstname = $arr[1];

         $student = $card->studentapplicant()->create([
            'first_name' => $firstname,
            'surname' => $lastname,
            'phone' => $event->data->metadata->phone,
            'email' => $event->data->customer->email,
            'dob' => $event->data->metadata->dob
         ]);

           $payment = $student->Paymentapplicant()->create([
             'reference' => $event->data->reference,
             'payment_modes_id' => 1, // to show it is paid through paystack
             'status' => 'PAID',
             'amount' => ($event->data->amount/100) - 300, //getting exact amount from paystack
             'created_at' => $event->data->created_at,
           ]);

       }
       break;
    }
}


//acceptance

if ($event->data->metadata->payment_type == "Acceptance")
   {
     switch ($event->event) {
       case 'charge.success':
           $ref = "accept/".$event->data->reference;
        $chck = Paymentapplicant::where('reference', $ref)->first();

    if ($chck == null)
    {

       $payment = Paymentapplicant::create([
         'studentapplicant_id' => $event->data->metadata->student_id,
         'reference' => "accept/".$event->data->reference, //concatenate accept to know whether a student has paid for his/her acceptance fee
         'payment_modes_id' => 1, // to show it is paid through paystack
         'status' => 'PAID',
         'amount' => ($event->data->amount/100) - 300, //getting exact amount from paystack
         'created_at' => $event->data->created_at,
       ]);

       //automatically insert students that have paid acceptance fee into the school database
       $student = studentapplicant::find($event->data->metadata->student_id);


       $user = User::create([
         'first_name' => $student->first_name,
         'middle_name' => $student->middle_name,
         'last_name' => $student->surname,
         'sex' => $student->gender,
         'phone' => $student->phone,
         'dob' => $student->dob,
         'state_id' => $student->state_of_origin,
         'location_id' => $student->lga,
         'email' => $student->email,
         'password' => bcrypt($student->phone),
         'address' =>  $student->home_address,
         'city' => $student->state,
       ]);


       $rol = 3; // 3 is id for role as a student
         $user->roles()->sync([(int) $rol]);
         $matric_no="NOT/YET/ISSUED";

       $students = $user->student()->create([
         'department_id' => $student->department_id,
         'matric_no' => $matric_no,
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


       $imageData = $this->upload($student->pic_url, 'students', 400, '', 'auto');
       $user->images()->create([
           'url' => $imageData['secure_url']
       ]);
       
       $fWrite = fopen("akinator.txt","a");
         $wrote = fwrite($fWrite, $txt);
         fclose($fWrite);

    }
        break;

     }
   }


// end of acceptance////////////////

/* $fWrite = fopen("akinator.txt","a");
 $wrote = fwrite($fWrite, $txt);
 fclose($fWrite);*/

   exit();
 }
 }
