<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Models\Admin;

class AdminController extends Controller
{
    /**
     * Shows admins in the system
     * 
     * @return View
     */
    public function index()
    {
        $admins = Admin::paginate(10);

        return View('admin.admins', ['section' => 'admins', 'admins' => $admins]);
    }
}
