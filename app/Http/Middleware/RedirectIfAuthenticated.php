<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\careers_users_model;
use App\careerStepsPage;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
		
		switch ($guard)
        {
            case 'applicant':
                if(Auth::guard($guard)->check())
                {
					$applicant = careers_users_model::where('email', Auth::guard($guard)->user()->email)->first();
					if($applicant->job_position_step == '1')
						$step = careerStepsPage::where('job_position_id', $applicant->job_position)->where('step_id', $applicant->job_position_step)->first();
					else
						$step = careerStepsPage::where('job_position_id', $applicant->job_position)->first();
					
					// If login succesful, then redirect to their intended location
					return redirect('careers/schedule-interview/'.$applicant->job_position.'/'.$step->random_token.'/'.$applicant->session_token);
                }
                break;

            default:
                if(Auth::guard($guard)->check())
                {
                    return redirect('/');
                }
                break;
		}
        return $next($request);
    }
}
