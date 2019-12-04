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
      $card_id = 1;//recieve session of auth
      $reg_step = 'First';
      $student = Cardapplicant::find($card_id)->student;
      $students = $student->where('reg_step', $reg_step)->first();
      if ($students != null) {
        return view('admission.applicationtwo', ['section' => 'applicationtwo', 'id'=>$student->id]);
      }else {
        $notification = Alert::alertMe('You need to complete step one!', 'info');
        return redirect()->route('admission.application')->with($notification);
      }
  }

  public function update(Request $request, Update $studentapplicant)
  {
    $this->validate($request, [
        'sponsor_type' => 'string|required',
        'sponsor_name' => 'string|required',
        'sponsor_phone' => 'required|digits:11',
        'sponsor_email' => 'required|email',
        'sponsor_add' => 'required|string',
        'exan_type' => 'required',
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
        'exan_type' => $request->exam_type,
        'exam_no' => $request->exam_no,
        'mathematics' => $request->mathematics,
        'english' => $request->english,
        'biology' => $request->biology,
        'physics' => $request->physics,
        'chemistry' => $request->chemistry,
        'reg_step' => $reg_step
    ]);

  }

}
