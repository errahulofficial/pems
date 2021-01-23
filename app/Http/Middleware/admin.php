<?php

namespace App\Http\Middleware;

use Closure;
use Auth; 

class admin
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
        if (Auth::check() && Auth::user()->role == 'hr') {
            return $next($request);
        }
        elseif (Auth::check() && Auth::user()->role == 'superadmin') {
            return redirect('/');
        }
        elseif (Auth::check() && Auth::user()->role == 'applicant') {
            return redirect('/');
        }
        else{
            return redirect('/');
        }
    }
}
