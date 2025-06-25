<?php

namespace App\Http\Controllers\Admin;

use App\Models\Fee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Validation\ValidationException;

class FeeController extends Controller
{

  public function __construct()
  {
      $this->middleware('checkAdminPermissions:super,intermediate')->except('index');
      $this->middleware('checkAdminPermissions:super')->only(['edit', 'destroy']);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fees = Fee::orderBy('created_at', 'DESC')->paginate();
        return view('admin.fees.index', ['sub_section' => 'all', 'section' => 'fees', 'fees' => $fees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('admin.fees.create', ['sub_section' => 'create', 'section' => 'fees', 'departments' => $departments]);
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
            'department_id' => 'required|numeric',
            'level' => 'required|in:100,200,300,400,500',
            'indigene' => 'required|numeric',
            'non_indigene' => 'required|numeric',
        ]);

        $count = Department::where('id', $request->input('department_id'))->count();
        if ($count != 1) {
            $error = ValidationException::withMessages([
                'department_id' => ['Invalid department']
            ]);
            throw $error;
        }

        Fee::create($request->only(['department_id', 'level', 'indigene', 'non_indigene']));

        return redirect()->route('fees.index')->with('success', 'Fee created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function show(Fee $fee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function edit(Fee $fee)
    {
        $departments = Department::all();
        return view('admin.fees.edit', ['fee' => $fee, 'departments' => $departments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fee $fee)
    {
        $this->validate($request, [
            'level' => 'required|in:100,200,300,400,500',
            'indigene' => 'required|numeric',
            'non_indigene' => 'required|numeric',
            'expiry_date' => 'required'
        ]);

        $count = Fee::where('department_id', $fee->department->id)
            ->where('level', $fee->level)
            ->where('id', '!=', $fee->id)
            ->count();
        if ($count != 0) {
            $error = ValidationException::withMessages([
                'level' => ['A department fee for this level already exists!']
            ]);
            throw $error;
        }

        $fee->update($request->only(['level', 'indigene', 'non_indigene', 'expiry_date']));

        return redirect()->route('fees.index')->with('success', 'Fee updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fee $fee)
    {
        $fee->delete();
        return redirect()->route('fees.index')->with('success', 'Fee deleted');
    }
}
