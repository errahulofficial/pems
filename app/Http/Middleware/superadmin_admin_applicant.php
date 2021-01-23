<?php

namespace App\Http\Middleware;

use Closure;
use Auth; 

class superadmin_admin_applicant
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
        if (Auth::check() && Auth::user()->role == 'superadmin' || Auth::check() && Auth::user()->role == 'admin' || Auth::check() && Auth::user()->role == 'applicant') {
            return $next($request);
        }
        else{
            return redirect('/');
        }
    }
}
