<?php

namespace App\Http\Controllers\Admission;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Studentapplicant;
use App\Models\Cardapplicant;
use App\Alert;

class ApplicationtwoController extends Controller
{
  public function index()
  {
      $card_id = session()->get('auth');//recieve session of auth
      $reg_step = 'First';
      $student = Cardapplicant::find($card_id)->studentapplicant;
      //dd($student);
      if ($student != null) {

        if ($student->reg_step === "Completed") {
          $notification = Alert::alertMe('All sections are completed!! Proceed by printing your form', 'success');
          return redirect()->route('admission.dashboard')->with($notification);
        }

        $students = $student->where('reg_step', $reg_step)->first();
        if ($students == null) {
          $notification = Alert::alertMe('Step one and two has been completed!!!', 'info');
          return redirect()->route('upload.index')->with($notification);
        }

        session()->put('studapp_id', $student->id);
        return view('admission.applicationtwo', ['section' => 'applicationtwo', 'id'=>$student->id]);
      }else {
        $notification = Alert::alertMe('You need to complete step one!', 'info');
        return redirect()->route('application.index')->with($notification);
      }
  }

  public function update(Request $request, Studentapplicant $studentapplicant)
  {
    $this->validate($request, [
        'sponsor_type' => 'string|required',
        'sponsor_name' => 'string|required',
        'sponsor_phone' => 'required|digits:11',
        'sponsor_email' => 'required|email',
        'sponsor_add' => 'required|string',
        'exam_type' => 'required',
        'exam_no' => 'required',
        'mathematics' => 'required',
        'english' => 'required',
        'biology' => 'required',
        'physics' => 'required',
        'chemistry' => 'required'
    ], [

        'sponsor_type.required' => 'Note: all field is required'
    ]);

    $reg_step = 'Second';
    $studentapplicant->update([
        'sponsor_type' => $request->sponsor_type,
        'sponsor_name' => $request->sponsor_name,
        'sponsor_phone' => $request->sponsor_phone,
        'sponsor_email' => $request->sponsor_email,
        'sponsor_add' => $request->sponsor_add,
        'exam_type' => $request->exam_type,
        'exam_no' => $request->exam_no,
        'mathematics' => $request->mathematics,
        'english' => $request->english,
        'biology' => $request->biology,
        'physics' => $request->physics,
        'chemistry' => $request->chemistry,
        'reg_step' => $reg_step
    ]);
    $notification = Alert::alertMe('Step two completed successfully!!!', 'success');
    return redirect()->route('upload.index')->with($notification);
  }

}
