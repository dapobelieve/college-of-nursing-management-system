<?php

namespace App\Http\Controllers\Admission;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Studentapplicant;
use App\Models\Paymentapplicant;
use App\Models\SystemSetting;
use App\Alert;
use Session;

class PayapplicationController extends Controller
{
  public function index()
  {
    $card_id = session()->get('auth');
    $reg_step = 'Second';
    $student = Studentapplicant::where('cardapplicant_id', $card_id)->first();

    if ($student == null) {
      $notification = Alert::alertMe('Complete step one and two', 'info');
      return redirect()->route('application.index')->with($notification);
    }

    $payment = Studentapplicant::find($student->id)->paymentapplicant;

    if ($payment != null) {
      $notification = Alert::alertMe('Registration done!!! Upload picture', 'success');
      return redirect()->route('upload.index')->with($notification);
    }

      //amout to pay, which will be fetch from the settings mysql_list_table
      $amount = SystemSetting::where('name','admission_payment_fee')->select('value')->first();

      //Paystack format
      $amounted = $amount->value * 100;
      $charges = 30000;
    if (Session::has('studapp_id')) {
        $students = $student->where('reg_step',$reg_step)->first();
        if ($students == null) {
          $notification = Alert::alertMe('Complete step two', 'info');
          return redirect()->route('application.steptwo')->with($notification);
        }
        return View('admission.payapplication', ['section' => 'payment', 'amount' => $amounted, 'student' => $student, 'charges' => $charges]);
    }
    return View('admission.payapplication', ['section' => 'payment', 'amount' => $amounted, 'student' => $student, 'charges' => $charges]);
  }
}
