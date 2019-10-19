<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        dd($request->all());
    }

    public function register(Request $request)
    {
        dd($request->all());
    }
}
