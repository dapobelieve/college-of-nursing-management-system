<?php

namespace App\Http\Controllers\Frontpages;

use App\Models\Lecturer;
use App\Models\Student;
use App\Models\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
      $lect = Lecturer::all()->count();
      return view('about')->with('lecturer', $lect)
                          ->with('student', Student::all()->count())
                          ->with('course', Course::all()->count());
    }
}
