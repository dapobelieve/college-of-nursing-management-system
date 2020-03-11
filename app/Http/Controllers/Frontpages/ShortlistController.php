<?php

namespace App\Http\Controllers\Frontpages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Studentapplicant;

class ShortlistController extends Controller
{
    public function index(){
      $student = Studentapplicant::where('admission_status', 'YES')->get();
      //dd($student);
      return view('applicationguide')->with('students', $student);
    }
}
