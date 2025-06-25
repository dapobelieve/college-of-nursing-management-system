<?php

namespace App\Http\Middleware;
use App\Models\SystemSetting;
use Closure;
use Illuminate\Support\Str;

use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode as Middleware;

class CheckForMaintenanceMode extends Middleware
{
   public function handle($request, Closure $next)
    {
        // Bypass for admin or specific routes
        if ($request->getRequestUri() == '/login' || $request->getRequestUri() == '/maintenance' || $request->getRequestUri() == '/signin' || Str::is('admin*', $request->path()) || $request->getRequestUri() == '/logout') {
            return $next($request);
        }

        // Get maintenance status from DB
        $maintenance = SystemSetting::where('name','maintenance')->select('value')->first();

        if ($maintenance->value == 'YES') {
            return redirect('/maintenance'); // or return a view
        }

        return $next($request);
    }
}
