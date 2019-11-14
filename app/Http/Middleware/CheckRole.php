<?php

namespace App\Http\Middleware;

use Closure;
use Auth;


class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param array $roles
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (Auth::check()) {
            if (!$request->user()->hasRole($roles)) {
                abort(404);
            }

            return $next($request);
        }

        // Depending on the name of the route use this accordingly
        return redirect()->route('welcome');
    }
}
