<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('portal.home')->with('department', Department::all());
    }

    public function store(Request $request)
    {
      $validator = Validator::make($request->all(), [
          'index_no' => 'required|min:10|string',
          'Admission_no' => 'required|string|max:20',
          'department' =>'required|integer',
          'marital_sta' =>'required|string',
          'sponsor' => 'required|string|max:50',
          'sponsor_num' => 'required|string|min:11',
          'dob_upload' => 'required|image',
          'lga_upload' => 'required|image',
          'exam_no' => 'required|string|max:20',
          'result_upload' => 'required|image',
          'mathematics' => 'required',
          'english' => 'required',
          'biology' => 'required',
          'physics' => 'required',
          'chemistry' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('post/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        //to store image files
          $featureddob = $request->dob_upload;
          $featurednewdob = time().$featureddob->getClientOriginalName();
          $featureddob->move('uploads/dob', $featurednewdob);

          $featuredlga = $request->lga_upload;
          $featurednewlga = time().$featuredlga->getClientOriginalName();
          $featuredlga->move('uploads/dob', $featurednewlga);

          $featuredresult = $request->result_upload;
          $featurednewresult = time().$featuredresult->getClientOriginalName();
          $featuredresult->move('uploads/dob', $featurednewresult);

        $student = Student::create([
          'user_id' => Auth::id(),
          'index_no' => $request->index_no,
          'reg_no' => $request->admission_no,
          'department_id' =>$request->department,
          'marital_sta' =>$request->marital_sta,
          'sponsor' => $request->sponsor,
          'sponsor_num' => $request->sponsor_num,
        ]);


    }
}
