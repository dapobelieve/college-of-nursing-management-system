<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Models\Student;

class AdminController extends Controller
{
    /**
     * Shows admins in the system
     * 
     * @return View
     */
    public function index()
    {
        $admins = Student::paginate(10); // Stub
        return View('admin.admins', ['section' => 'admins', 'admins' => $admins]);
    }
}
