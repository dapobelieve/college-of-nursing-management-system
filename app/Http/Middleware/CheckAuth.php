<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App\Alert;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if (!Session::has('auth')) {
        return redirect()->route('admission.login')->with('success', 'You need to Login!!!');
      }
        return $next($request);
    }
}
