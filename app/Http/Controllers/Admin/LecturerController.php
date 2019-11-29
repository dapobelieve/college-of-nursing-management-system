<?php

namespace App\Http\Controllers\Admin;

use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lecturer;
use App\Models\Department;
use App\User;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lecturers = Lecturer::with('user','department')->get();
        return view('admin.lecturers.index')->with('lecturers', $lecturers);
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
        return view('admin.lecturers.create')
            ->with('states', $states)
            ->with('departments', $departments);
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
            'first_name' => 'string|required',
            'middle_name' => 'string|required',
            'last_name' => 'string|required',
            'sex' => 'required',
            'phone' => 'required|digits:11|unique:users,phone',
            'dob' => 'required|date|before:1st January 2000',
            'rank' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'state_id' => 'required',
            'lga' => 'required',
            'department_id' => 'required'
        ], [
            'dob.after' => 'The date of birth should be a date before January 1st 2000',
            'rank.required' => 'The lecturer\'s rank is required',
            'state.required' => 'Select a State of origin',
            'lga.required' => 'Select a local government'
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'sex' => $request->sex,
            'email' => $request->email,
            'phone' => $request->phone,
            'dob' => $request->dob,
            'state_id' => $request->state_id,
            'location_id' => $request->lga,
            'password' => bcrypt($request->password),
            'address' => $request->address
        ]);

        $lecturer = $user->lecturer()->create([
            'department_id' => $request->department_id,
            'rank' => $request->rank
        ]);

        /*
         * Create user roles
         * use the user id to create the role
         */

        $user->roles()->sync([(int) $request->role]);

        return redirect()->route('lecturers.index')->with('success', 'Lecturer added');
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
    public function edit(Lecturer $lecturer)
    {
        $departments = Department::get();
        $states = State::get();
        return view('admin.lecturers.edit')
            ->with('states', $states)
            ->with('lecturer', $lecturer)
            ->with('departments', $departments);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lecturer $lecturer)
    {
        $this->validate($request, [
            'first_name' => 'string|required',
            'middle_name' => 'string|required',
            'last_name' => 'string|required',
            'sex' => 'required',
            'phone' => 'required|digits:11|unique:users,phone,'.$lecturer->user->id,
            'dob' => 'required|date|before:1st January 2000',
            'rank' => 'required',
            'email' => 'required|email|unique:users,email,'.$lecturer->user->id,
            'state_id' => 'required',
            'lga' => 'required',
            'department_id' => 'required'
        ], [
            'dob.after' => 'The date of birth should be a date before January 1st 2000',
            'rank.required' => 'The lecturer\'s rank is required',
            'state.required' => 'Select a State of origin',
            'lga.required' => 'Select a local government'
        ]);

       $lecturer->user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'sex' => $request->sex,
            'email' => $request->email,
            'phone' => $request->phone,
            'dob' => $request->dob,
            'state_id' => $request->state_id,
            'location_id' => $request->lga,
            'address' => $request->address
        ]);

        $lecturer->update([
            'department_id' => $request->department_id,
            'rank' => $request->rank
        ]);

        return redirect()->route('lecturers.index')->with('success', 'Lecturer Updated');
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
