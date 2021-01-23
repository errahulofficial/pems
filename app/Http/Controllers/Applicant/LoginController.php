<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\careers_users_model;
use App\careerStepsPage;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:applicant')->except('logout');
    }
	
	
	public function showApplicantLogin() {
		 return view('careers_views.login');
	}
	
	  public function login(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // Attempt to log the user in
        if (Auth::guard('applicant')->attempt($credential, $request->member)){
			
			$applicant = careers_users_model::where('email', $request->email)->first();
			$step = careerStepsPage::where('job_position_id', $applicant->job_position)->first();
			
            // If login succesful, then redirect to their intended location
            return redirect('careers/schedule-interview/'.$applicant->job_position.'/'.$step->random_token.'/'.$applicant->session_token);
        }

        // If Unsuccessful, then redirect back to the login with the form data
        return redirect('/careers/login')->withInput($request->only('email', 'remember'));
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::guard('applicant')->logout();

//        $request->session()->invalidate();

        return redirect('/careers/login');
    }
}
