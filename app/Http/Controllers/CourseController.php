<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Session;
use App\Alert;
use App\User;
use App\Models\Course;
use App\Models\Student;
use App\Models\Payment;
use App\Models\Department;
use Illuminate\Http\Request;

class CourseController extends Controller
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
      // check the session the student has paid and only allow him to register courses for the session
        $payment = new Payment;
        $payment = $payment->where('student_id',session()->get('st_id'))->orderBy('created_at', 'DESC')->select('reference', 'status')->first();

          if ($payment == null) {
            $notification = Alert::alertMe('Pay your tuition fee first!!!', 'info');
            return redirect()->back()->with($notification);
          }
    //get the level from the reference added in payment
          $lvl = substr($payment->reference,4,3);
          $level = [
            "first" => $lvl." first",
            "second" => $lvl." second"
          ];
          if ($payment->status == 'HALF PAID') {
            $level['second'] = $lvl." first";
          }
        $user = User::find(Auth::id());
        $student = Student::where('user_id', Auth::id())->first();

        return view('portal.coursereg')->with('user', $user)
                                      ->with('dept', Department::find($student->department_id))
                                      ->with('student', $student)
                                      ->with('level', $level);
    }
//to recieve data for course registration through ajax
    public function recieveAjax($id, $dept)
    {
        $explode = explode(" ",$id);
        $level = $explode[0];
        $semester = $explode[1];
        $res = Course::where('Semester', '=', $semester)->where('level', '=', $level)->where('department_id','=', $dept)->get();
        $result= json_encode($res);
        $arraydata = json_decode($result);
        return $arraydata;
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
            //to know if the course has been register

            $studentID = session()->get('st_id');
            $cours =DB::table('course_student')->where('student_id','=',$studentID)->where('course_id','=', $request->cou_reg[0])->first();
            if(!$cours){
              $student = Student::find($studentID);
              $student->courses()->attach($request->cou_reg);
              $notification = Alert::alertMe('Course Registered!!!', 'success');
              return redirect()->back()->with($notification);
            }else {
              $notification = Alert::alertMe('Course already registered!!!', 'info');
              return redirect()->back()->with($notification);
            }

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
