<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HandleInaccessibleRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role  The role required for the route
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (!auth()->user()->hasRole($role)) {
            return redirect('/userdashboard')->with('error', 'You do not have permission to access the admin dashboard.');
        }

        return $next($request);
    }
}
