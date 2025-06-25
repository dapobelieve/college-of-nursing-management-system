<?php

namespace App\Http\Controllers\Admission;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\CloudinaryUpload;
use App\Models\Studentapplicant;
use App\Models\Paymentapplicant;
use App\Models\SystemSetting;
use App\Models\Department;
use App\Alert;
use Session;

class UploadController extends Controller
{
     //use CloudinaryUpload;


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
          'pport_upload' => 'required|image|max:200|dimensions:min_width=100,max_width=200',
          'course' => 'required',
          'campus' => 'required'
        ],[
          'pport_upload.max' => 'Upload file less than 180kb',
          'pport_upload.dimensions' => 'Upload file should have maximum width of 200px'
        ]);

        $featuredpport = $request->pport_upload;
      $featurednewname = time().$featuredpport->getClientOriginalName();

        /*try {
             $imageData = $this->upload($featuredpport, 'applicants', 3600, '', 'auto');
           } catch (\Exception $e) {
             $note = $e->getMessage();
             $notification = Alert::alertMe($note, 'info');
             return redirect()->back()->with($notification);
           }*/


      $featuredpport->move('uploads/admissionPassport2', $featurednewname);
      $pic_url = 'uploads/admissionPassport2/'.$featurednewname;

      //update the date column for examination date
      // 1 represent general nursing department
      $dep = $request->course;
      //check for the number of students who has completed thier application
      $num = Studentapplicant::where([['reg_step', 'completed'], ['department_id', $dep]])->count();


      if($dep != '1'){
        $date = SystemSetting::where('name','admission_exam_date_midwifery')->first();
            if ($num <= 550 ) {
              $date=date_create($date->value);
            }else {
              $date=date('Y-m-d', strtotime($date->value. ' + 1 days'));
            }
      }else{
        $date = SystemSetting::where('name','admission_exam_date_nursing')->first();
           if ($num <= 500 ) {
              $date=date_create($date->value);
            }elseif ($num > 500 and $num <= 1000) {
              $date=date('Y-m-d', strtotime($date->value. ' + 1 days'));
            }elseif ($num > 1000 and $num <= 1500) {
              $date=date('Y-m-d', strtotime($date->value. ' + 2 days'));
            }elseif ($num > 1500 and $num <= 2100) {
              $date=date('Y-m-d', strtotime($date->value. ' + 3 days'));
            }else {
              $date=date('Y-m-d', strtotime($date->value. ' + 4 days'));
            }
          }
      //dd($request->course);
      $studentapplicant->update([
        'reg_step' => 'Completed',
        'pic_url' => $pic_url,
        'department_id' => $request->course,
        'campus' => $request->campus,
        'date_exam' => $date
      ]);


      $notification = Alert::alertMe('Passport Uploaded successfully! Proceed to print form', 'success');
      return redirect()->route('admission.dashboard')->with($notification);
    }
}
