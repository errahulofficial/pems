<?php

namespace App\Http\Middleware;

use Closure;
use Auth; 

class superadmin_salesmanager
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
        if (Auth::check() && Auth::user()->role == 'superadmin' || Auth::check() && Auth::user()->role == 'salesmanager' || Auth::check() && Auth::user()->role == 'salesperson' || Auth::check() && Auth::user()->role == 'hr' || Auth::check() && Auth::user()->role == 'applicant') {
            return $next($request);
        }
        else{
            return redirect('/');
        }
    }
}
