<?php

namespace App\Http\Controllers;
use App\Alert;
use App\Models\Currentsession;
use App\Models\Payment;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class PayTuitionController extends Controller
{
    public function index()
    {
      return view('portal/paytuition')->with('session', Currentsession::all()->first());
    }

    public function payAjax($lvl)
    {
      $currentsession = new Currentsession;
      $amount = $currentsession->where('level','=', $lvl)->where('department_id','=',session()->get('dept_id'))->first();
      //to check for late payment
      $n = date("Y/m/d");
      $date1 = new DateTime($n);
      $date2 = new DateTime($amount->expiry_date);
      $interval = $date1->diff($date2);
      $Ma = $interval->format('%R%a');
      if ($Ma < 0) {
        return $amount->late_payment;
      }else {
        return $amount->payment;
      }
    }

    public function index4History()
      {

        $studentID = session()->get('st_id');
        $payment = Payment::find($studentID);
        //dd($payment);
        if ($payment == null) {
          $notification = Alert::alertMe('No Payment History available!!!','info');
          return redirect('portal/dashboard')->with($notification);
        }
        return view('portal.payHistory')->with('student', $payment);
      }
}
