<?php

namespace App\Http\Middleware;

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
    public function handle($request, Closure $next, string $permission)
    {
        if (Auth::check()) {
            if (Auth::user()->permission_level != $permission) {
                return redirect()->route('dashboard.home');
            }

            return $next($request);
        }

        // Depending on the name of the route use this accordingly
        return redirect()->route('welcome');
    }
}
