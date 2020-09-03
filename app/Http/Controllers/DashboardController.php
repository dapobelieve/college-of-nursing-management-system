<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\User;
use App\Models\Student;
use App\Models\Department;
use App\Models\Payment;
use App\Models\SystemSetting;
use App\Models\Fee;
use App\Models\State;
use Auth;
use DateTime;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $student = Student::find(session()->get('st_id'));
        //dd($student);
       $user = User::find(Auth::id());

       $session = SystemSetting::where('name','current_session')->first();

       $sess = Fee::where('department_id', session()->get('dept_id'))->first();
       if ($sess !== null) {
         $latedate = date("Y-m-d", strtotime(Carbon::parse($sess->expiry_date)->addDays(30)));

         //for late registration Status
         $n = date("Y/m/d");
         $date1 = new DateTime($n);
         $date2 = new DateTime($sess->expiry_date);
         $interval = $date1->diff($date2);
         $Ma = $interval->format('%R%a');
         if ($Ma < 0) {
           $late ="Late";
         }else if($Ma < -30){
           $late = "Closed";
         }else {
           $late = "Open";
         }
         // for redirecting paytuition to dashboard when registration is closed
         if ($late == "Closed") {
           session()->put('closed', $late);
         }

       }

        $dept = Department::find(session()->get('dept_id'));
        $payment = Payment::where('student_id', session()->get('st_id'))->orderByDESC('created_at')->first();
        //dd($payment);
        return view('portal.dashboard', ['section' => 'dashboard'])
                                      ->with('user', $user)
                                       ->with('student', $student)
                                       ->with('dept', $dept)
                                       ->with('state', State::find($user->state_id))
                                       ->with('sess', $sess)
                                       ->with('latedate', $latedate)
                                       ->with('late', $late)
                                       ->with('session', $session)
                                       ->with('payment', $payment);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
