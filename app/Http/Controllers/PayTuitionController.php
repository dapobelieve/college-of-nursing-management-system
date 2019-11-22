<?php

namespace App\Http\Controllers;

use Auth;
use App\Alert;
use App\User;
use App\Models\State;
use App\Models\Student;
use App\Models\Fee;
use App\Models\Payment;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class PayTuitionController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }



    public function index()
    {
      //redirect to dashboard if payment is closed
      if(session()->has('closed'))
      {
        $notification = Alert::alertMe('Registration Closed!!!','info');
        return redirect()->route('portal.dashboard')->with($notification);
      }
      //check to know what level has been paid through reference field in payment model
      $payment = Payment::where('student_id', session()->get('st_id'))->latest('created_at')->select('reference')->first();
        $lvl = 100;
      if ($payment !== null) {
        $lvl = substr($payment->reference,0,3);
        $lvl = $lvl + 100;
        if ($lvl > 300) {
          $lvl = "";
        }
      }
      return view('portal.paytuition')->with('session', Fee::all()->first())
                                      ->with('user', User::find(Auth::id()))
                                      ->with('student', Student::find(session()->get('st_id')))
                                      ->with('level', $lvl);
    }

    public function payAjax($lvl)
    {
      $fee = new Fee;
      //add level into session for usage during payment through Paystack
      session()->put('lvl', $lvl);
      $amount = $fee->where('level','=', $lvl)->where('department_id','=',session()->get('dept_id'))->first();
      //to check for late payment
      $n = date("Y/m/d");
      $date1 = new DateTime($n);
      $date2 = new DateTime($amount->expiry_date);
      $interval = $date1->diff($date2);
      $Ma = $interval->format('%R%a');
      $state = State::find(session()->get('origin'));
      if ($Ma < 0) {
            switch ($state->name) {
              case 'Oyo':
                return $amount->late_payment+ $amount->indigene ;
                break;

              default:
              return $amount->late_payment+ $amount->non_indigene ;
                break;
            }
      }
      else {
            switch ($state->name) {
              case 'Oyo':
                return $amount->indigene ;
                break;

              default:
              return $amount->non_indigene ;
                break;
        }
      }
    }

    public function index4History()
      {
        $payment = new Payment;
        $studentID = session()->get('st_id');
        $payment = $payment->where('student_id',$studentID)->get();
        //dd($payment);
        if ($payment == null) {
          $notification = Alert::alertMe('No payment history available!!!','info');
          return redirect()->route('portal.dashboard')->with($notification);
        }
        return view('portal.tuitionhistory')->with('user', User::find(Auth::id()))
                                            ->with('registered', $payment)
                                            ->with('department', session()->get('dept_id'));
      }


}
