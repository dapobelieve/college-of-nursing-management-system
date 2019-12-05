<?php

namespace App\Http\Controllers\Admission;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Studentapplicant;
use App\Alert;
use Session;

class DashboardController extends Controller
{
    public function index()
    {
  

      return View('admission.dashboard',['section'=>'dashboard']);
      //need to add logic to know whereby they have been given admission or not but first of all to show
      //the Instruction
    }
}
