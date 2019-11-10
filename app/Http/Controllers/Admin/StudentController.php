<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Shows all students
     * 
     * @return View
     */
    public function index()
    {
        $students = Student::orderBy('created_at', 'DESC')
            ->orderBy('updated_at', 'DESC')
            ->paginate(10);

        return View('admin.students', ['section' => 'students', 'students' => $students]);
    }
}
