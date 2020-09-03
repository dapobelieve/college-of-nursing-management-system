<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Lecturer;
use App\Models\Student;
use App\Models\Post;
use App\Model2\Applicant;
use PDF;


class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'section' => 'dashboard',
            'users' => User::all(),
            'students' => Student::all(),
            'admins' => Admin::all(),
            'lecturers' => Lecturer::all(),
            'posts' => Post::all()
        ]);
    }

    public function pdfRecruiment()
      {
        $applicants= Applicant::all();
        //dd($applicants[85]);
        $pdf = PDF::loadView('admin/dlRecruitpdf', compact('applicants'));

        return $pdf->download('RecruitmentList.pdf');
      }
}
