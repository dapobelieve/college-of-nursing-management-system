<?php

namespace App\Http\Controllers\Admission;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Studentapplicant;
use App\Models\Cardapplicant;
use App\Models\State;
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
        $card_id = session()->get('auth');//recieve session of auth
        //$reg_no = '';
        $student = Studentapplicant::where('cardapplicant_id', $card_id)->first();
        if ($student->reg_step == null) {
          $state = State::all();
          return view('admission.application', ['section' => 'application', 'student' => $student, 'states' => $state]);
        }else {
          $notification = Alert::alertMe('Step one has been registered!', 'info');
          return redirect()->route('application.steptwo')->with($notification);
        }
    }

    public function update(Request $request, Studentapplicant $studentapplicant)
    {
      $this->validate($request, [
          'surname' => 'string|required',
          'first_name' => 'string|required',
          'middle_name' => 'string',
          'gender' => 'required',
          'phone' => 'required|digits:11',
          'dob' => 'required|date|before:16 years ago',
          'email' => 'required|email',
          'home_address' => 'string|required',
          'state' => 'required',
          'lga' => 'required',
          'state_of_origin' => 'required',
          'religion' => 'required',
          'marital_status' => 'required',
      ], [
          'dob.before' => 'The date of birth should be 16 years upward',
          'state.required' => 'select your present state',
          'state_of_origin.required' => 'Select a State of origin',
          'lga.required' => 'Select a local government'
      ]);
      // $reg_step is to determine the first insert into the Studentapplicant table
        $reg_step = 'First';
        $card_id = session()->get('auth');//session
      $studentapplicant->update([
          'surname' => $request->surname,
          'first_name' => $request->first_name,
          'middle_name' => $request->middle_name,
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
          'reg_step' => $reg_step
      ]);

      $notification = Alert::alertMe('Registered successful', 'success');
      return redirect()->route('application.steptwo')->with($notification);

    }

  /*  public function steptwo()
    {

        return view('admission.applicationtwo');
    }
*/
}
