<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Paystack;
use  App\User;
use App\Models\Payment;
use App\Models\Result;
use App\Models\Student;
use App\Models\Studentapplicant;
use App\Models\Paymentapplicant;
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

     return Paystack::getAuthorizationUrl()->redirectNow();
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
     // get the session being paid for and concatenate late payment or early payment
     $getYr =$paymentDetails['data']['metadata']['session'];
     $getYr = substr($getYr,2,2)."".session()->get('regStatus');
     //determine if the payment was successful or not
     switch ($paymentDetails['data']['status']) {
       case 'success':
          $payment = Payment::create([
            'student_id' => $paymentDetails['data']['metadata']['student_id'],
            'reference' => $getYr."/".session()->get('lvl')."/".$paymentDetails['data']['reference'], //adding payment level to the reference
            'payment_modes_id' => 1,
            'status' => session()->get('pay_status'),
            'amount' => $paymentDetails['data']['amount']/100, //getting exact amount from paystack
            'created_at' => $paymentDetails['data']['createdAt'],
          ]);
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
     switch ($paymentDetails['data']['status']) {
       case 'success':
         $payment = Paymentapplicant::create([
           'studentapplicant_id' => $paymentDetails['data']['metadata']['student_id'],
           'reference' => $paymentDetails['data']['reference'],
           'payment_modes_id' => 1, // to show it is paid through paystack
           'status' => 'PAID',
           'amount' => ($paymentDetails['data']['amount']/100) - 300, //getting exact amount from paystack
           'created_at' => $paymentDetails['data']['createdAt'],
         ]);
         $notification = Alert::alertMe('Payment successful!!!', 'success');
         return redirect()->route('upload.index')->with($notification);
        break;

       default:
       $notification = Alert::alertMe('something went wrong!', 'warning');
       return redirect()->route('payapplication.pay')->with($notification);
         break;
     }
   }

   //acceptance payment
   if ($paymentDetails['data']['metadata']['payment_type'] == "Acceptance")
   {  //dd($paymentDetails);
     switch ($paymentDetails['data']['status']) {
       case 'success':
       //automatically insert students that have paid acceptance fee into the school database
       $student = studentapplicant::find($paymentDetails['data']['metadata']['student_id']);
       $user = User::create([
         'first_name' => $student->first_name,
         'middle_name' => $student->middle_name,
         'last_name' => $student->surname,
         'sex' => $student->gender,
         'phone' => $student->phone,
         'dob' => $student->dob,
         'state_id' => 31,
         'location_id' => 661,
         'email' => $student->email,
         'password' => bcrypt($student->phone),
         'address' =>  $student->home_address,
         'city' => $student->state,
       ]);

       $imageData = $this->upload($student->pic_url, 'students', 3600, '', 'auto');
       $user->images()->create([
           'url' => $imageData['secure_url']
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

         $payment = Paymentapplicant::create([
           'studentapplicant_id' => $paymentDetails['data']['metadata']['student_id'],
           'reference' => "accept/".$paymentDetails['data']['reference'], //concatenate accept to know whether a student has paid for his/her acceptance fee
           'payment_modes_id' => 1, // to show it is paid through paystack
           'status' => 'PAID',
           'amount' => ($paymentDetails['data']['amount']/100) - 300, //getting exact amount from paystack
           'created_at' => $paymentDetails['data']['createdAt'],
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
}
