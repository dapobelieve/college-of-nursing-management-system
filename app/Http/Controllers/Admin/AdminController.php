<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Models\{Admin, Role};
use App\User;

class AdminController extends Controller
{
    /**
     * Shows admins in the system
     *
     * @return View
     */
    public function index()
    {
        $admins = Admin::orderBy('updated_at', 'DESC')
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        return View('admin.admins.index', ['section' => 'admins', 'sub_section' => 'all', 'admins' => $admins]);
    }

    /**
     * Shows an admin's details
     *
     * @return View
     */
    public function show(Admin $admin)
    {
        //return View('admin.admins.show', ['section' => 'admins', 'admin' => $admin]);
    }

    /**
     * Shows the create admin page
     *
     * @return View
     */
    public function create()
    {
        return View('admin.admins.create', ['section' => 'admins', 'sub_section' => 'create']);
    }

    /**
     * Handles admin creation ajax call
     *
     * @param Request $request The HTTP request instance
     * @return array
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:c_password|min:6',
            'c_password' => 'required|same:password|min:6',
            'permission_level' => 'required|in:basic,intermediate',
        ]);

        // Make the user record
        $user = factory(User::class)->make();
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->middle_name = $request->input('middle_name');
        $user->email = $request->input('email');
        $user->password = password_hash($request->input('password'), PASSWORD_DEFAULT);
        $user->save();

        // Make the user an admin
        $role = Role::where('name', 'Admin')->first();
        $user->roles()->attach($role);

        // Create an admin record for the user
        $admin = new Admin;
        $admin->permission_level = $request->input('permission_level');
        $user->admin()->save($admin);

        // Success
        return redirect()->route('admins.index')->with('success', 'Admin created!');
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
