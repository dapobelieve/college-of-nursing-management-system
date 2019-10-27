<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use Auth;
use Session;
use App\User;
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
      $student = Student::where('user_id', Auth::id())->first();
      //get level and semester with distinct
      $getLS = DB::table('courses')->select('level', 'semester')->groupBy('level','semester')->get();
       $arraydata = [];
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
                       AND `course_student`.`student_id` ="'.$student->id.'" GROUP BY `course_student`.`created_at`,`level`,`semester`');
                   $result = array_merge($arraydata, $result[$key]);
                    $getRes = $result;
                    $arraydata = $getRes;
           }

        return view('portal.reghistory')->with('user', $user)
                                      ->with('department', Department::find($student->department_id))
                                      ->with('student', $student)
                                      ->with('registered', $arraydata);
    }


    public function downloadPDF($id, $sem, $date)
    {
      $explode = explode(" ",$sem);
      $level = $explode[0];
      $semester = $explode[1];
      $course = Student::find($id)->courses->where('level', $level)->where('semester', $semester);
      $student = Student::find($id);
      $user = User::find(Auth::id());
      $dated = $date;
      $pdf = PDF::loadView('portal/pdfRegHistory', compact('course','student', 'user', 'dated'));
      return $pdf->download('invoice.pdf');

    }



  }
