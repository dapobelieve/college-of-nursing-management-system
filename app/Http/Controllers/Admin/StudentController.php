<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Http\Traits\CloudinaryUpload;

use App\Models\Student;
use App\Models\State;
use App\Models\Location;
use App\Models\Department;
use App\Models\Lecturer;
use App\Models\Result;
use App\Alert;
use App\User;
use Carbon\Carbon;

class StudentController extends Controller
{
    use CloudinaryUpload;

    public function __construct()
    {
      $this->middleware('checkAdminPermissions:super,intermediate')->except(['create', 'store']);
    }
  
    /**
     * Shows all students
     *
     * @return View
     */
    public function index()
    {

      /*  $students = Student::orderBy('created_at', 'DESC')
            ->orderBy('updated_at', 'DESC')
            ->paginate(10); */
        $students =  Student::with('user', 'department', 'result')->paginate(10);
        $dept = Department::all();
        return View('admin.students.index', ['section' => 'students', 'sub_section' => 'all', 'students' => $students, 'dept' => $dept]);
    }

    /**
    *show all student by department
    *@return View
    */
    public function dept($id)
    {
      $students = Student::with('user')->where('department_id', $id)->paginate(10);
      $dept = Department::all();
      return View('admin.students.index2dep', ['section' => 'students', 'sub_section' => 'all', 'students' => $students, 'dept' => $dept]);
    }

    /**
    *add student mysqli_more_results
    *
    *@return view
    */
    public function showresult($id)
    {
      $student = Student::find($id)->user;
      $result = Result::where('student_id', $id)->first();
      if ($result == null) {
        return View('admin.students.addresult', ['section' => 'students', 'sub_section' => 'all', 'students'=> $student]);
      }
      $notification = Alert::alertMe('Result has been added!!', 'success');
      return redirect()->route('students.index')->with($notification);
    }

    public function addresult(Request $request)
    {

      $this->validate($request, [
        'exam_type' => 'required',
        'exam_no' => 'required|string|min:10|unique:results',
        'mathematics' => 'required',
        'english' => 'required',
        'physics' => 'required',
        'chemistry' => 'required',
        'biology' => 'required'
      ]);

      $result = Result::create([
          'student_id' =>$request->student_id,
          'exam_type' => $request->exam_type,
          'exam_no' => $request->exam_no,
          'mathematics' => $request->mathematics,
          'english' => $request->english,
          'physics' => $request->physics,
          'chemistry' => $request->chemistry,
          'biology' => $request->biology
      ]);
      $notification = Alert::alertMe('Result Added!', 'success');
      return redirect()->route('students.index')->with($notification);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::get();
        $states = State::get();
        return view('admin.students.create', ['section' => 'students',
        'sub_section' => 'create', 'states' => $states, 'departments' => $departments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'last_name' => 'required|string|max:255',
          'first_name' => 'required|string|max:255',
          'middle_name' => 'required|string|max:255',
          'dob' => 'required|before:15 years ago',
          'sex' => 'required',
          'email' => 'required|string|email|max:255|unique:users',
          'password' => 'required|string|min:8',
          'phone' => 'required|string|min:11|unique:users',
          'address' => 'required|string|max:255',
          'city' => 'required|string|max:25',
          'state' => 'required',
          'lga' => 'required',
          'matric_no' => 'required|min:4|string',
          'admission_no' => 'required|string|max:20',
          'department' =>'required|integer',
          'marital_status' =>'required|string',
          'sponsors_name' => 'required|string|max:50',
          'sponsors_phone' => 'required|string|min:11',
          //'dob_upload' => 'required|image|max:150',
          'pport_upload' => 'required|image|max:150',
          //'lga_upload' => 'required|image|max:150',
          //'exam_no' => 'required|string|max:20',
        ], [
            'dob.after' => 'The date of birth should be a date before January 1st 2004',
            //'pport_upload.image' => 'The file should not be more than 70kb',
            'state.required' => 'Select a State of origin',
            'lga.required' => 'Select a local government'
        ]);

      $user = User::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'sex' => $request->sex,
            'email' => $request->email,
            'phone' => $request->phone,
            'dob' => $request->dob,
            'state_id' => $request->state,
            'location_id' => $request->lga,
            'city' => $request->city,
            'password' => bcrypt($request->password),
            'address' => $request->address
        ]);

        $student = $user->student()->create([
            'department_id' => $request->department,
            'matric_no' => $request->matric_no,
            'marital_status' => $request->marital_status,
            'admission_no' => $request->admission_no,
            'sponsors_name' => $request->sponsors_name,
            'sponsors_phone' => $request->sponsors_phone
        ]);


        if ($request->has('pport_upload')){
            $imageData = $this->upload($request->pport_upload, 'students', 3600, '', 'auto');
            $user->images()->create([
                'url' => $imageData['secure_url']
            ]);
        }
        /*
         * Create user roles
         * use the user id to create the role
         */

        $user->roles()->sync([(int) $request->role]);
          $notification = Alert::alertMe('Student Added!', 'success');
        return redirect()->route('students.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
      $students = $student->with('user', 'department')->first();
      $state = State::find($students->user->state_id);
      $lga = Location::find($students->user->location_id);
      $results = Result::where('student_id', $student->id)->first();
      return View('admin.students.edit', ['section' => 'students', 'student' => $students, 'lga' =>$lga, 'state' =>$state, 'result'=>$results]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $this->validate($request, [
            'phone' => 'required|digits:11|unique:users,phone,'.$student->user->id,
            'address' => 'required'
        ]);

        switch ($request->is_active) {
          case 'on':
            $request->is_active = 'ACTIVE';
            break;

          default:
              $request->is_active = 'DISABLED';
            break;
        }

       $student->user->update([
            'phone' => $request->phone,
            'address' => $request->address,
            'is_active' => $request->is_active
        ]);

          $notification = Alert::alertMe('Student Updated!', 'success');
        return redirect()->route('students.index')->with($notification);
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
