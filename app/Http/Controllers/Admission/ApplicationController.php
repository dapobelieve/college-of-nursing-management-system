<?php

namespace App\Http\Controllers\Admission;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Studentapplicant;
use App\Models\Cardapplicant;
use App\Alert;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $card_id = "";//recieve session of auth
        $reg_no = '';
        $student = Studentapplicant::where('card_id', $card_id)->first();
        if ($student == null) {
          return view('admission.application', ['section' => 'application']);
        }else {
          $notification = Alert::alertMe('That part has been registered!', 'info');
          return redirect()->route('admission.applicationtwo')->with($notification);
        }
    }

    public function store(Request $request)
    {
      $this->validate($request, [
          'surname' => 'string|required',
          'first_name' => 'string|required',
          'middle_name' => 'string|required',
          'gender' => 'required',
          'phone' => 'required|digits:11|unique:users,phone',
          'dob' => 'required|date|before:15 years ago',
          'email' => 'required|email|unique:studentapplicants,email',
          'home_address' => 'string|required',
          'state' => 'required',
          'lga' => 'required',
          'state_of_origin' => 'required',
          'religion' => 'required',
          'marital_status' => 'required',
      ], [
          'dob.before' => 'The date of birth should be 15years upward',
          'state.required' => 'select your present state',
          'state_of_origin.required' => 'Select a State of origin',
          'lga.required' => 'Select a local government'
      ]);
      // $reg_step is to determine the first insert into the Studentapplicant table
        $reg_step = 'First';
        $card_id = ""; //session
      $student = studentapplicants::create([
          'card_id' => $card_id,
          'surname' => $request->surname,
          'first_name' => $request->first_name,
          'middle_name' => $request->last_name,
          'gender' => $request->gender,
          'email' => $request->email,
          'phone' => $request->phone,
          'dob' => $request->dob,
          'home_address' => $request->home_address,
          'state' => $request->state,
          'lga' => $request->lga,
          'state_of_origin' => $request->state_of_origin,
          'religion' => $request->religion,
          'marital_status' => $request->marital_status,
          'reg_status' => $reg_step
      ]);

    }

  /*  public function steptwo()
    {

        return view('admission.applicationtwo');
    }
*/
}
