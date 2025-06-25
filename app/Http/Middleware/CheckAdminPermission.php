<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use App\Alert;
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
            if (!in_array(Auth::user()->admin->permission_level, $permission)) {
                $notification = Alert::alertMe('you are not permitted to make this change', 'error');
                return redirect()->route('dashboard.home')->with($notification);
            }
            return $next($request);
        }

        // Depending on the name of the route use this accordingly
        return redirect()->route('welcome');
    }
}
