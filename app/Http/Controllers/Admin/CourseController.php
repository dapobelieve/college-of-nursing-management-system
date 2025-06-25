<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use DemeterChain\C;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkAdminPermissions:super,intermediate')->except('index');
        $this->middleware('checkAdminPermissions:super')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::with('department:id,name')->orderBy('level')->paginate(15);
        return view('admin.courses.index')->with('courses', $courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('admin.courses.create')->with('departments', $departments);
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
            'title' => 'required',
            'code' => 'required|unique:courses,code',
            'units' => 'required|numeric',
            'semester' => 'required',
            'level' => 'required|numeric',
            'department_id' => 'required'
        ],[
            'department_id.required' => 'Select a department'
        ]);

        Course::firstOrCreate($request->except('_token'));
        return redirect()->route('courses.index')->with('success', 'Course created');

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
    public function edit(Course $course)
    {
        $departments = Department::all();
//        $course = $
        return view('admin.courses.edit')
            ->with('course', $course->load('department'))
            ->with('departments', $departments);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $this->validate($request, [
            'title' => 'required|unique:courses,title,'.$course->id,
            'code' => 'required|unique:courses,code,'.$course->id,
            'units' => 'required|numeric',
            'semester' => 'required',
            'level' => 'required|numeric',
            'department_id' => 'required'
        ],[
            'department_id.required' => 'Select a department'
        ]);

        $course->update($request->except('_token'));
        return redirect()->route('courses.index')->with('success', 'Course updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted');
    }
}
