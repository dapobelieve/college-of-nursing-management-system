<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Shows all roles
     * 
     * @return View
     */
    public function index()
    {
        $roles = Role::orderBy('name', 'ASC')->get();

        return View('admin.roles', ['section' => 'roles', 'roles' => $roles]);
    }
}
