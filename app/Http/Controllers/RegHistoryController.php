<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use Auth;
use Session;
use App\User;
use App\Alert;
use App\Models\Course;
use App\Models\Student;
use App\Models\Department;
use Illuminate\Http\Request;

class RegHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = User::find(Auth::id());
      //generate student ID
      $studentID = session()->get('st_id');
      if (Student::find($studentID)->courses->first() == null) {
        $notification = Alert::alertMe('No Course has been registered', 'info');
        return redirect('portal/coursereg')->with($notification);
      }

      //get level and semester with distinct
       $arraydata = [];
       $getLS = DB::select('SELECT `courses`.`level`, `courses`.`semester` FROM `course_student`
                              INNER JOIN `courses` ON `course_student`.`course_id` = `courses`.`id`
                               WHERE `student_id` = "'.$studentID.'" GROUP BY `courses`.`level`, `courses`.`semester`');

        foreach ($getLS as $key => $value)
        {
          $level = $value->level;
          $semester = $value->semester;
          $result[]= DB::select('SELECT `course_student`.`created_at`, `level`,`semester`,
                      SUM(`units`) as sum, COUNT(`course_student`.`course_id`)
                      as total FROM `courses` INNER JOIN `course_student`
                      ON `courses`.`id` = `course_student`.`course_id`
                       WHERE `courses`.`level` = "'.$level.'"
                       AND `courses`.`semester` = "'.$semester.'"
                       AND `course_student`.`student_id` ="'.$studentID.'" GROUP BY `course_student`.`created_at`,`level`,`semester`');
                   $result = array_merge($arraydata, $result[$key]);
                    $getRes = $result;
                    $arraydata = $getRes;
           }

        return view('portal.reghistory',  ['section' => 'reghistory'])->with('user', $user)
                                      ->with('dept', Department::find(session()->get('dept_id')))
                                      ->with('registered', $arraydata);
    }


    public function downloadPDF($sem, $date)
    {
      $explode = explode(" ",$sem);
      $level = $explode[0];
      $semester = $explode[1];
      $id = session()->get('st_id');

      $course = Student::find($id)->courses->where('level', $level)->where('semester', $semester);
      $student = Student::find($id);
      $user = User::find(Auth::id());
      $levelsem = $sem;
      $dated = $date;
      $pdf = PDF::loadView('portal/pdfRegHistory', compact('course','student', 'user', 'dated', 'sem'));

      return $pdf->download('Courseregistration.pdf');

    }



  }
