<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Paystack;
use App\Models\Payment;
use App\Models\Paymentapplicant;
use App\Alert;

class PaymentController extends Controller
{

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
     //dd($paymentDetails['data']['metadata']['payment_type']);
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
           'amount' => $paymentDetails['data']['amount']/100, //getting exact amount from paystack
           'created_at' => $paymentDetails['data']['createdAt'],
         ]);
         $notification = Alert::alertMe('Payment successful!!!', 'success');
         return redirect()->route('upload.index')->with($notification);
        break;
         break;

       default:
       $notification = Alert::alertMe('something went wrong!', 'warning');
       return redirect()->route('payapplication.pay')->with($notification);
         break;
     }
   }


 }
}
