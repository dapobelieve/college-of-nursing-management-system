<?php

namespace App\Http\Controllers\Admission;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Paystack;
use App\Models\Payment;
use App\Alert;

class Payment2Controller extends Controller
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



 

}
