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
        $admins = Admin::orderBy('created_at', 'DESC')
            ->orderBy('updated_at', 'DESC')
            ->paginate(10);

        return View('admin.admins.index', ['section' => 'admins', 'sub_section' => 'all', 'admins' => $admins]);
    }

    /**
     * Shows the create admin page
     * 
     * @return View
     */
    public function create()
    {
    }

    /**
     * Handles admin creation ajax call
     * 
     * @param Request $request The HTTP request instance
     * @return array
     */
    public function store(Request $request)
    {
    }

    /**
     * Shows the edit admin page
     * 
     * @param Admin $admin The admin to be edited
     * @return View
     */
    public function edit(Admin $admin)
    {
    }

    /**
     * Handles admin editing ajax call
     * 
     * @param Request $request The HTTP request instance
     * @param Admin $admin The admin to be edited
     * @return array
     */
    public function update(Request $request, Admin $admin)
    {
    }
}
