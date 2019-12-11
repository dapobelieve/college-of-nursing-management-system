<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class CheckAdminPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, string ...$permission)
    {
        if (Auth::check()) {
            if (!in_array(Auth::user()->permission_level, $permission)) {
                return redirect()->route('dashboard.home');
            }

            return $next($request);
        }

        // Depending on the name of the route use this accordingly
        return redirect()->route('welcome');
    }
}
