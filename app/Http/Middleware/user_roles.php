<?php

namespace App\Http\Middleware;

use Closure;

class user_roles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $roles)
    {
       // Return Not Authorized error, if user has not logged in
    //    if (!$request->user) {
    //     App::abort(401);
    //     }
  
        $roles = explode(',', $roles);
        foreach ($roles as $role) {
        // if user has given role, continue processing the request
        if ($request->user->hasRole($role)) {
          return $next($request);
        }
      }
      // user didn't have any of required roles, return Forbidden error
      App::abort(403);
    }
}
