<?php

namespace App\Http\Controllers;

use PDF;
use Auth;
use App\Alert;
use App\User;
use App\Models\State;
use App\Models\Student;
use App\Models\SystemSetting;
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

      //check for session
      $session = SystemSetting::where('name','current_session')->first();

      //check to know what level has been paid through reference field in payment model
      $payment = Payment::where('student_id', session()->get('st_id'))->latest('created_at')->select('reference', 'status')->first();
        $lvl = 100;
      //declare an object to allow choosing full or half payment
      $payType = [
        "full" => "full",
        "half" => "half"
      ];

      if ($payment !== null) {
        $lvl = substr($payment->reference,4,3);
        //check for half payment so that the same level can be repeated
              if ($payment->status == "HALF PAID") {
                $lvl = $lvl;
                $payType['full'] = "half";
                session()->put('pay_full', 'complete');
              }else {
                $lvl = $lvl + 100;
              }
        if ($lvl > 300) {
          $lvl = "";
        }
      }
      return view('portal.paytuition')->with('session', Fee::all()->first())
                                      ->with('user', User::find(Auth::id()))
                                      ->with('student', Student::find(session()->get('st_id')))
                                      ->with('level', $lvl)
                                      ->with('payType', $payType)
                                      ->with('sess', $session);
    }



    public function payAjax($lvl, $type)
    {
      $fee = new Fee;
      //add level into session for usage during payment through Paystack
      session()->put('lvl', $lvl);
      $amount = $fee->where('level','=', $lvl)->where('department_id','=',session()->get('dept_id'))->first();
      $latepayment = SystemSetting::where('name', 'late_payment_fee')->select('value')->first();
      //dd($latepayment->value);
      //to check for late payment
      $n = date("Y/m/d");
      $date1 = new DateTime($n);
      $date2 = new DateTime($amount->expiry_date);
      $interval = $date1->diff($date2);
      $Ma = $interval->format('%R%a');
      $state = State::find(session()->get('origin'));
      if ($Ma < 0) {
        //created  a session to know when registration is late
            session()->put('regStatus', 'L');
            switch ($state->name) {
              case 'Oyo':
                  $total = $amount->indigene;
                  $result= $this->verifyAmount($type, $total, $latepayment->value);
                  return $result;
                break;

                default:
                $total = $amount->non_indigene;
                $result= $this->verifyAmount($type, $total, $latepayment->value);
                return $result;
                break;
            }
      }
      else {
          session()->put('regStatus', 'E');
            switch ($state->name) {
              case 'Oyo':
                $total = $amount->indigene;
                $late = 0;
                $result= $this->verifyAmount($type, $total, $late);
                return $result;
                break;

              default:
              $total = $amount->non_indigene;
              $late = 0;
              $result= $this->verifyAmount($type, $total, $late);
              return $result;
                break;
        }
      }
    }

    public function verifyAmount($check, $amount, $late)
    {
      if ($check == "half") {
        session()->put('pay_status', 'HALF PAID');
        if(session()->has('pay_full')){
          session()->put('pay_status', 'PAID');
        }
        return ($amount/2)+ $late;
      }else{
        session()->put('pay_status', 'PAID');
        return $amount;
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

      public function downloadPDF($id, $date)
      {
        $st_id = session()->get('st_id');
        $origin = State::find(session()->get('origin'));
        $payment = Payment::find($id);
        $student = Student::find($st_id);
        $user = User::find(Auth::id());
        $session = substr($payment->reference,0,2);
        //check to know whether it is late payment
        $late = substr($payment->reference,2,1);
        $late = ($late == 'L') ? 'YES' : 'NO' ;
        $dated = $date;
        $pdf = PDF::loadView('portal/pdfPayReceipt', compact('payment','student', 'user', 'dated', 'origin', 'session', 'late'));

        return $pdf->download('invoice.pdf');

      }


}
