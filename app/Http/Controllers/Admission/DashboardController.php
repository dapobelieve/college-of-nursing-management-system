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

      $student = Studentapplicant::where('cardapplicant_id', session()->get('auth'))->first();

      if($student == null)
      {
        //assign an object inorder to decieve the login
        $student = '{"score":null, "admission_status" :null, "first_name":null, "pic_url":null}';
        $student = json_decode($student);
        //dd($student);
      return View('admission.dashboard',['section'=>'dashboard', 'student' => $student]);
      }
      return View('admission.dashboard',['section'=>'dashboard', 'student' => $student]);
    }

    public function logout()
    {
      session()->flush();
      return redirect()->route('admission.login');
    }

}
