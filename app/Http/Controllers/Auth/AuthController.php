<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

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

            return redirect()->route('dashboard.home');
        }
    }

    public function register(Request $request)
    {
        dd($request->all());
    }
}
