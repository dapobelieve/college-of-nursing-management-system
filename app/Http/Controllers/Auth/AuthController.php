<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required',
        ]);
        if(!Auth::attempt(
            [
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ])){

            return redirect()->back()->with('error','Could not sign you in. Invalid Details');
        }else  {
          if (Auth::check()) {
            //check if user is DISABLED
            if ($request->user()->is_active === 'DISABLED') {
              session()->flush();
              return redirect()->back()->with('error', 'Contact the Administrator');
            }
            //check roles
            $userrole = $request->user()->roles->first();
            if ($userrole->name == "Student") {
              return redirect()->route('portal.dashboard');
            }
          }
            return redirect()->route('dashboard.home');
        }
    }

    public function register(Request $request)
    {
        dd($request->all());
    }

    public function logout()
    {
        Auth::logout();
        //delete all sessions here
        return redirect()->route('welcome');
    }
}
