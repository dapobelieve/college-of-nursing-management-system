<?php

namespace App\Http\Controllers\Admission;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Studentapplicant;
use App\Models\Paymentapplicant;
use App\Models\Department;
use App\Alert;
use Session;

class UploadController extends Controller
{
    public function index()
    {

        $student = Studentapplicant::where('cardapplicant_id', session()->get('auth'))->first();

        if ($student->reg_step == null) {
          $notification = Alert::alertMe('Complete step one', 'info');
          return redirect()->route('application.index')->with($notification);
        }

        if ($student->reg_step == 'First') {
          $notification = Alert::alertMe('Complete step two', 'info');
          return redirect()->route('application.steptwo')->with($notification);
        }

        session()->put('studapp_id', $student->id);

      if ($student->reg_step == 'Completed') {
        $notification = Alert::alertMe('All section are completed!! Proceed by printing your form', 'success');
        return redirect()->route('admission.dashboard')->with($notification);
      }
      $department = Department::all();
      return View('admission.upload', ['section' => 'upload', 'id' => session()->get('studapp_id'), 'dept' => $department]);


    }





    public function update(Request $request, Studentapplicant $studentapplicant)
    {
      $this->validate($request, [
          'pport_upload' => 'required|image|max:100|dimensions:min_width=80,max_width=150',
          'course' => 'required'
        ],[
          'pport_upload.max' => 'Upload file less than 100kb',
          'pport_upload.dimensions' => 'Upload file should have maximum width of 150px'
        ]);

      $featuredpport = $request->pport_upload;
      $featurednewname = time().$featuredpport->getClientOriginalName();
      $featuredpport->move('uploads/admissionPassport2', $featurednewname);
      $pic_url = 'uploads/admissionPassport2/'.$featurednewname;
      //dd($request->course);
      $studentapplicant->update([
        'reg_step' => 'Completed',
        'pic_url' => $pic_url,
        'department_id' => $request->course
      ]);


      $notification = Alert::alertMe('Passport Uploaded successfully! Proceed to print form', 'success');
      return redirect()->route('admission.dashboard')->with($notification);
    }
}
