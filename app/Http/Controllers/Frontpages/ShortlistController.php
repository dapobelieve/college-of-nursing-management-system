<?php

namespace App\Http\Controllers\Frontpages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Studentapplicant;
use App\Models\SystemSetting;
use App\Models\Location;

class ShortlistController extends Controller
{
    public function index(){

      $chck = Studentapplicant::where('admission_status', 'MAYBE')->where('department_id', '=', '2')->orderByDesc('date_interview')->orderByDesc('campus')->orderBy('id')->get();
      $checkisYES=  Studentapplicant::where('admission_status', 'YES')->where('department_id', '=', '2')->orderByDesc('score')->get();
      $distinctdate=  Studentapplicant::where('department_id', '=', '2')->select('date_interview')->orderBy('date_interview')->distinct()->get();

          return view('applicationguide')->with('students', $chck)->with('checkisYES', $checkisYES)->with('distinctdate', $distinctdate);
    }
}
