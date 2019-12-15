<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Models\{Admin, Role};
use App\User;
use Illuminate\Auth\Access\Gate;

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
            'permission_level' => 'required|in:basic,intermediate,super',
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
        return View('admin.admins.edit', ['section' => 'admins', 'sub_section' => 'create', 'admin' => $admin]);
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
        $this->validate($request, [
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'password' => 'sometimes|same:c_password',
            'c_password' => 'sometimes|same:password',
            'permission_level' => 'required|in:basic,intermediate,super',
        ]);

        if ($admin->id != Auth::user()->admin->id & $admin->permission_level == 'super' & !empty($request->input('password'))) {
            return redirect()->route('admins.edit', $admin)->with('error', 'You can not change the password of another super admin!');
        } else if ($admin->permission_level == 'super' & $request->input('permission_level') != 'super') {
            return redirect()->route('admins.edit', $admin)->with('error', 'You can not demote a super admin, please contact the server admin!');
        }

        // Update the user record
        $user = $admin->user;
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->middle_name = $request->input('middle_name');
        if (!empty($request->has('password'))) {
            $user->password = password_hash($request->input('password'), PASSWORD_DEFAULT);
        }
        $user->save();

        // Update the admin record for the user
        $admin->permission_level = $request->input('permission_level');
        $admin->save();

        // Success
        return redirect()->route('admins.index')->with('success', 'Admin updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        if (Gate::allow('delete-admin')) {
            $admin->delete();
            return redirect()->route('admins.index')->with('success', 'Admin deleted');
        } else {
            return redirect()->route('admins.index')->with('error', 'You can not delete this admin');
        }
    }
}
