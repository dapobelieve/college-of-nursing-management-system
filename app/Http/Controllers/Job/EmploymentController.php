<?php

namespace App\Http\Controllers\Job;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\State;
use App\Model2\Applicant;
use App\Model2\education;
use App\Model2\Referee;
use App\Model2\Emphistory;
use PDF;

class EmploymentController extends Controller
{
  public function index()
  {
        $state = State::all();
        return view('employment/register', ['section' => 'application', 'states' => $state]);
  }

  public function store(Request $request)
  {

      //dd($request->all());
      $this->validate($request, [
          'title' => 'string|required',
          'full_name' => 'string|required',
          'sex' => 'string|required',
          'dob' => 'required',
          'phone' => 'required|digits:11|unique:mysql2.applicants',
          'email' => 'required|email|unique:mysql2.applicants',
          'city' => 'string|required',
          'state' => 'string|required',
          'drug' => 'required',
          'lga' => 'required',
          'position' => 'string|required',
          'desire' => 'string|required',
          'passport' => 'required|image|max:300|dimensions:min_width=100,max_width=400',
          'school0' => 'string|required',
          'location0' => 'string|required',
          'start_date0' => 'required|date',
          'end_date0' => 'required|date',
          'degree0' => 'string|required',
          'major0' => 'string|required',
          'R_title0' => 'string|required',
          'R_full_name0' => 'string|required',
          'R_position0' => 'string|required',
          'R_company0' => 'string|required',
          'R_address0' => 'string|required',
          'R_phone0' => 'required|digits:11',
          'R_title1' => 'string|required',
          'R_full_name1' => 'string|required',
          'R_position1' => 'string|required',
          'R_company1' => 'required',
          'R_address1' => 'string|required',
          'R_phone1' => 'required|digits:11',
          'E_employer0' => 'required',
          'E_title0' => 'required',
          'E_address0' => 'string|required',
          'E_date0' => 'required|date',

      ], [
          'state.required' => 'Select a State of origin',
          'lga.required' => 'Select a local government',
          'passport.max' => 'Upload file less than 300kb',
          'Passport.dimensions' => 'Upload file should have maximum width of 400px'
      ]);
//inserrt into appllocants table
      $arr = explode(",",$request->state);
      $request->state = $arr[1];

      //mve ppassport iinto a folder
      $featuredpport = $request->passport;
      $featurednewname = time().$featuredpport->getClientOriginalName();
      $featuredpport->move('uploads/jobPassport2', $featurednewname);
      $pic_url = 'uploads/jobPassport2/'.$featurednewname;


        $applicant = Applicant::create([
          'full_name' => $request->title.' '.$request->full_name,
           'sex' => $request->sex,
           'phone' => $request->phone,
           'email' => $request->email,
           'address' => $request->address,
           'city' => $request->city,
           'state' => $request->state,
           'drug_test' => $request->drug,
           'lga' => $request->lga,
           'position' => $request->position,
           'emp_type' => $request->desire,
           'pic_url' => $pic_url,
           'dob' => $request->dob,
        ]);

//ensure if education fom has multiple data
        if ($request->school1 == null || $request->degree1 == null || $request->major1 == null  || $request->location1 == null ) {
          $count = 1;
        }else {
          $count = 2;
        }
        for ($i=0; $i < $count ; $i++) {
          $str = (string)$i;
          $applicant->education()->create([
            'schoolname' => $request['school'.''.$str],
            'location' => $request['location'.''.$str],
            'start_date' => $request['start_date'.''.$str],
            'end_date' => $request['end_date'.''.$str],
            'certified' => $request['degree'.''.$str],
            'major' => $request['major'.''.$str]
          ]);
        }
//ensure if employer foom has multiple data
        if ($request->E_employer1 == null || $request->E_title1 == null || $request->E_address1 == null  ) {
          $count = 1;
        }else {
          $count = 2;
        }

        for ($i=0; $i < $count; $i++) {
          $str = (string)$i;
          $applicant->emphistory()->create([
            'employer' => $request['E_employer'.''.$str],
            'job_title' => $request['E_title'.''.$str],
            'emp_date' => $request['E_date'.''.$str],
            'address' => $request['E_address'.''.$str]
          ]);
        }

        for ($i=0; $i < 2 ; $i++) {
          $str = (string)$i;
          $applicant->referee()->create([
            'name' => $request['R_title'.''.$str].' '.$request['R_full_name'.''.$str],
            'position' => $request['R_position'.''.$str],
            'company' => $request['R_company'.''.$str],
            'address' => $request['R_address'.''.$str],
            'phone' => $request['R_phone'.''.$str]
          ]);
        }
        //dd($request);


      return view('employment/register', ['section' => 'apply']);
  }


  public function PDF(Request $request)
  {
      $applicant = Applicant::where('email', $request->email)->first();
      if ($applicant == null) {
        $state = State::all();
        return redirect('/job-application')->with(['error' =>'Could not find email address']);
          }else {
        $education = $applicant->education;
        $referee = $applicant->referee;
        $employ = $applicant->emphistory;
        //dd($education);
        $pdf = PDF::loadView('employment/pdfEmploy', compact('applicant','education', 'referee', 'employ'));

        return $pdf->download('jobapplicant.pdf');

      }


  }


}
