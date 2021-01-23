<?php
use App\User;

View::composer('*', function ($view) {
    if (Auth::user()) {
        $email = Auth::user()->email;
        $data = User::where('email', $email)->get();
		if(Auth::user()->role == 'superadmin')
			Cookie::queue('admin', Auth::user()->id,60);
		$admin = Cookie::get('admin');
        $view->with(['data' => $data, 'admin'=> $admin]);
		
    }
});
// auth routes
Route::prefix('careers')->group(function() {
    Route::get('/login', 'Applicant\LoginController@showApplicantLogin')->name('applicant.login');
    Route::post('/login', 'Applicant\LoginController@login')->name('applicant.login.submit');
    Route::get('/logout', 'Applicant\LoginController@logout')->name('applicant.logout');
	Route::post('/score-update', array( 'before' => 'csrf', 'as' => 'score-update', 'uses' =>'ApplicantController@scoreupdate'));
	});
	
Route::get('/impersonate/{id}', 'ImpersonateController@impersonate');

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/register/{remember_token}', 'EmpRegister@index');
Route::post('/registerd', array( 'before' => 'csrf', 'as' => 'createregister', 'uses' => 'EmpRegister@store'));

Route::group(['middleware' => ['auth', 'superadmin_salesmanager']], function () {
    //Profile
    Route::get('profile', 'profile@index');
    Route::post('profile', array( 'before' => 'csrf', 'as' => 'profile', 'uses' => 'profile@update'));
    Route::get('profile/delete/resume/{resumename}', 'profile@deleteResume');
    Route::get('profile/delete/docs/{docsname}', 'profile@deleteDocs');
	
	Route::post('submit-note', array( 'before' => 'csrf', 'as' => 'submit_note', 'uses' => 'ApplicantController@submitNotes'));
	
	Route::post('score-save', array( 'before' => 'csrf', 'as' => 'score-save', 'uses' => 'ApplicantController@scoreSave'));
});

// Super Admin & Admin Middleware
// Job Positions
Route::group(['middleware' => ['auth', 'superadmin_admin']], function () {
	
	// Portals Cities 
	Route::get('portal-cities', 'PortalCitiesController@index');
	Route::get('pcity-del/{id}', 'PortalCitiesController@destroy');
	Route::post('portal-cities', array( 'before' => 'csrf', 'as' => 'portal-cities', 'uses' => 'PortalCitiesController@store'));
	
	// Portals Names
	Route::get('portal-name', 'PortalNameController@index');
	Route::get('pname-del/{id}', 'PortalNameController@destroy');
	Route::post('portal-name', array( 'before' => 'csrf', 'as' => 'portal-name', 'uses' => 'PortalNameController@store'));
	
	// Portals
	Route::get('portal', 'PortalController@index');
	Route::get('portal-del/{id}', 'PortalController@destroy');
	Route::post('portal', array( 'before' => 'csrf', 'as' => 'portal', 'uses' => 'PortalController@store'));
	Route::get('get-cities/{territory}', 'PortalController@getcity');
		
	//Job position
    
    Route::get('job-positions', 'jobPositions@index');
    Route::post('job-positions', array( 'before' => 'csrf', 'as' => 'job-positions', 'uses' => 'jobPositions@create'));
    Route::get('job-positions-delete/{id}', 'jobPositions@delete');
    Route::get('job-positions-edit/{id}', 'jobPositions@edit');
    Route::post('job-positions-update/{id}', array( 'before' => 'csrf', 'as' => 'job-positions-update', 'uses' => 'jobPositions@update'));
    // Job Positions Steps
    Route::get('job-positions-steps/{id}', 'jobPositionsSteps@index');
    Route::post('job-positions-steps/{id}', array( 'before' => 'csrf', 'as' => 'job-positions-step', 'uses' => 'jobPositionsSteps@create'));
    Route::get('job-positions-steps-delete/{id}', 'jobPositionsSteps@delete');
    Route::get('job-positions-steps-edit/{id}/{backid}', 'jobPositionsSteps@edit');
    Route::post('job-positions-steps-update/{id}', array( 'before' => 'csrf', 'as' => 'job-positions-steps-update', 'uses' => 'jobPositionsSteps@update'));
    Route::get('job-positions-steps/{id}/position/up', 'jobPositionsSteps@positionup');
    Route::get('job-positions-steps/{id}/position/down', 'jobPositionsSteps@positiondown');
    Route::get('job-positions-steps/{id}/time/up', 'jobPositionsSteps@timeup');
    Route::get('job-positions-steps/{id}/time/down', 'jobPositionsSteps@timedown');
    // Applicant
    Route::get('applicants', 'ApplicantController@index');
    Route::get('applicants-blacklist/{id}', 'ApplicantController@updateblacklist');
    // Black list
    Route::get('blacklist', 'blackListController@index');
    Route::post('blacklist', array( 'before' => 'csrf', 'as' => 'blacklist', 'uses' => 'blackListController@create'));
    Route::get('blacklist-delete/{id}', 'blackListController@delete');
    Route::get('blacklist-edit/{id}', 'blackListController@edit');
    Route::post('blacklist-update/{id}', array( 'before' => 'csrf', 'as' => 'blacklist-update', 'uses' => 'blackListController@update'));
    // Employee
    Route::get('employee', 'employeeController@index');
	Route::get('list-employee', 'employeeController@listemp');
	Route::get('not-completed', 'employeeController@notcomp');
	Route::get('not-register', 'employeeController@notreg');
	Route::get('without-email', 'employeeController@withoutemail');
	Route::get('without-skype', 'employeeController@withoutskype');
	Route::get('without-card', 'employeeController@withoutcard');
	Route::get('employee-del/{id}', 'employeeController@del');
	
	Route::get('sales-team', 'SalesManagerController@index');
	Route::post('sales-team', array( 'before' => 'csrf', 'as' => 'sales-team', 'uses' => 'SalesManagerController@store'));
	
    Route::post('employee', array( 'before' => 'csrf', 'as' => 'employee', 'uses' => 'employeeController@create'));
    Route::get('employee-delete/{id}', 'employeeController@delete');
    Route::get('employee-edit/{id}', 'employeeController@edit');
    Route::post('employee-update/{id}', array( 'before' => 'csrf', 'as' => 'employee-update', 'uses' => 'employeeController@update'));
    // Employee Level
    Route::get('employee-level', 'employeeLevelController@index');
    Route::post('employee-level', array( 'before' => 'csrf', 'as' => 'employee-level', 'uses' => 'employeeLevelController@create'));
    Route::get('employee-level-delete/{id}', 'employeeLevelController@delete');
    Route::get('employee-level-edit/{id}', 'employeeLevelController@edit');
    Route::post('employee-level/{id}', array( 'before' => 'csrf', 'as' => 'employee-level', 'uses' => 'employeeLevelController@update'));
    // Employee Divisions
    Route::get('employee-division', 'employeeDivisionController@index');
    Route::post('employee-division', array( 'before' => 'csrf', 'as' => 'employee-division', 'uses' => 'employeeDivisionController@create'));
    Route::get('employee-division-delete/{id}', 'employeeDivisionController@delete');
    Route::get('employee-division-edit/{id}', 'employeeDivisionController@edit');
    Route::post('employee-division/{id}', array( 'before' => 'csrf', 'as' => 'employee-division', 'uses' => 'employeeDivisionController@update'));
    // Interviewer
    Route::get('add-interviewer', 'interviewer@index');
    Route::post('add-interviewer', array( 'before' => 'csrf', 'as' => 'add-interviewer', 'uses' => 'interviewer@create'));
    Route::get('view-interviewers', 'interviewer@view');
    Route::get('view-interviewer/{id}', 'interviewer@viewOne');
    Route::post('update-interviewers/{id}', array( 'before' => 'csrf', 'as' => 'update-interviewers', 'uses' => 'interviewer@update'));
    Route::get('delete-interviewer/{id}', 'interviewer@destroy');
    Route::get('add-reserved-time/{id}', 'interviewer@reserved');
    Route::post('add-reserved-time-form', array( 'before' => 'csrf', 'as' => 'add-reserved-time-form', 'uses' => 'interviewer@reservedtime'));
    Route::get('delete-reserved-time/{id}', 'interviewer@destroyReservedTime');
    Route::get('interviewer/deactive/{id}', 'interviewer@deactivate');
    Route::get('interviewer/active/{id}', 'interviewer@activate');
    // Interviewer
    Route::get('interviews', 'interviews@index');
    Route::post('interviews/view', array( 'before' => 'csrf', 'as' => 'interviews', 'uses' => 'interviews@getInterviews'));
    Route::post('interviews/interviewer/change/{careers_usersId}', array( 'before' => 'csrf', 'as' => 'interviews/interviewer/change', 'uses' => 'interviews@changeInterviewer'));
    Route::get('interviews/view/{jobposition}/{status}/{interviewer}/{from_date}/{to_date}', 'interviews@viewInterviewsPage');
    Route::post('interviews/status/change/{careers_usersId}', array( 'before' => 'csrf', 'as' => 'interviews/status/change', 'uses' => 'interviews@changeStatus'));
    Route::get('interviews/view/{careers_usersId}/{jobposition}/{status}/{interviewer}/{from_date}/{to_date}/reschedule', 'interviews@reschedule');
    Route::get('interviews/view/{careers_usersId}/{jobposition}/{status}/{interviewer}/{from_date}/{to_date}/reschedule/date/{dateselected}/{dayselected}', 'interviews@rescheduleDate');
    Route::get('interviews/view/{careers_usersId}/{jobposition}/{status}/{interviewer}/{from_date}/{to_date}/reschedule/date/{dateselected}/{dayselected}/{timeselected}', 'interviews@rescheduleTime');
    Route::get('interviews/send/email/{careers_usersId}', 'interviews@soloEmailSend');
    // Interviewer Status
    Route::get('interviews-status', 'interviewStatus@index');
    Route::post('interviews-status', array( 'before' => 'csrf', 'as' => 'interviews-status', 'uses' => 'interviewStatus@store'));
    Route::get('interview-status/delete/{id}', 'interviewStatus@destroy');
    Route::get('interview-status/edit/{id}', 'interviewStatus@edit');
    Route::post('interview-status/update/{id}', array( 'before' => 'csrf', 'as' => 'interview-status', 'uses' => 'interviewStatus@update'));
    Route::get('interview-status-email/{id}', 'interviewStatus@email');
    Route::post('interview-status-email/{id}', array( 'before' => 'csrf', 'as' => 'interview-status-email', 'uses' => 'interviewStatus@updateEmail'));
    // GET Steps with Job Position in Interview Status
    Route::get('jobposition/get/{id}', 'JobPositionStepsGet@index');
    Route::get('jobposition/interviewer/get/{id}', 'JobPositionStepsGet@interviewerGet');
    Route::get('interviewer/get/{id}', 'JobPositionStepsGet@indexnew');
    // Blog
    Route::get('add-blog', 'blog_controller@index');
    Route::post('add-blog', array( 'before' => 'csrf', 'as' => 'add-blog', 'uses' => 'blog_controller@store'));
    Route::get('view-blog', 'blog_controller@view');
    Route::get('blog-edit/{id}', 'blog_controller@edit');
    Route::post('blog-edit/{id}', array( 'before' => 'csrf', 'as' => 'blog-edit', 'uses' => 'blog_controller@update'));
    Route::get('blog-delete/{id}', 'blog_controller@destroy');
    Route::get('general-blog', 'blog_controller@show');
    Route::get('view-blog-post/{id}', 'blog_controller@viewblog');
    // Interviewer Email Send
    Route::post('interview-mail-send', array( 'before' => 'csrf', 'as' => 'interview-mail-send', 'uses' => 'interviewerEmail@sendtest'));
    Route::get('phpmailer', 'interviewerEmail@index2');
    Route::get('vendor/mail/interviewerEmailTemplate', function () {
        return view('vendor/mail/mails/interviewerEmailTemplate');
    });
    Route::get('vendor/mail/mails/interviewerEmailTemplateView', function () {
        return view('vendor/mail/mails/interviewerEmailTemplateView');
    });
    // CAREERS QUESTIONS
    Route::get('add-careers-questions', 'careersQuestion@show');
    Route::post('add-careers-questions', array( 'before' => 'csrf', 'as' => 'add-careers-questions', 'uses' => 'careersQuestion@store'));
    Route::get('view-careers-questions', 'careersQuestion@viewQuestions');
    Route::get('view-careers-questions/delete/{id}', 'careersQuestion@destroy');
    Route::get('view-careers-questions/{id}', 'careersQuestion@edit');
    Route::post('update-careers-questions/{id}', array( 'before' => 'csrf', 'as' => 'update-careers-questions', 'uses' => 'careersQuestion@update'));
    // STEPS PAGE
    Route::get('add-steps-page', 'careersStepsPage@addSteps');
    Route::get('steps-page', 'careersStepsPage@index');
    Route::post('update-careers-steps/{id}', array( 'before' => 'csrf', 'as' => 'update-careers-steps', 'uses' => 'careersStepsPage@update'));
    Route::post('store-careers-steps', array( 'before' => 'csrf', 'as' => 'store-careers-steps', 'uses' => 'careersStepsPage@storeAll'));
    Route::get('view-steps-page', 'careersStepsPage@viewStepsPage');
    Route::get('view-steps-page/{jobPositionId}/{token}', 'careersStepsPage@viewStepsPageByPosition');
    Route::post('view-steps-page/{step_id}', array( 'before' => 'csrf', 'as' => 'view-steps-page', 'uses' => 'careersStepsPage@updatestepsall'));
    Route::get('view-steps-page/delete/{step_id}/{token}', 'careersStepsPage@destroy');
    Route::get('careers_jobposition/deactive/{id}', 'careersStepsPage@deactivate');
    Route::get('careers_jobposition/active/{id}', 'careersStepsPage@activate');
});

Route::group(['middleware' => ['auth', 'superadmin_admin']], function () {
    // TRAINING MATERIAL
    // Sales Category
    Route::get('sales-training-category', 'salesTrainingCategory@index');
    Route::post('sales-training-category', array( 'before' => 'csrf', 'as' => 'sales-training-category', 'uses' => 'salesTrainingCategory@create'));
    Route::get('sales-training-category/edit/{id}', 'salesTrainingCategory@edit');
    Route::post('sales-training-category/update/{id}', array( 'before' => 'csrf', 'as' => 'sales-training-category', 'uses' => 'salesTrainingCategory@update'));
    Route::get('sales-training-category/delete/{id}', 'salesTrainingCategory@destroy');
    // Add Sales Database
    Route::get('add-sales-training', 'salesTrainingDatabase@index');
    Route::post('add-sales-training', array( 'before' => 'csrf', 'as' => 'add-sales-training', 'uses' => 'salesTrainingDatabase@create'));
    Route::get('add-sales-training/edit/{id}', 'salesTrainingDatabase@edit');
    Route::post('add-sales-training/update/{id}', array( 'before' => 'csrf', 'as' => 'add-sales-training', 'uses' => 'salesTrainingDatabase@update'));
    Route::get('add-sales-training/delete/{id}', 'salesTrainingDatabase@destroy');
});

Route::group(['middleware' => ['auth', 'superadmin_salesmanager']], function () {
	
	// Reports
	Route::get('sales-reports', 'ReportsController@view');
    // Sales Training
    Route::get('sales-training', 'salesTrainingDatabase@mainpage');
	Route::get('email-skype-info', 'email_skype@index');
    Route::post('email-skype-info', array( 'before' => 'csrf', 'as' => 'email-skype-info', 'uses' => 'email_skype@update'));
});

Route::group(['middleware' => ['auth', 'superadmin_admin']], function () {
    // Recruitment Category
    Route::get('recruitment-training-category', 'recruitmentTrainingCategory@index');
    Route::post('recruitment-training-category', array( 'before' => 'csrf', 'as' => 'recruitment-training-category', 'uses' => 'recruitmentTrainingCategory@create'));
    Route::get('recruitment-training-category/edit/{id}', 'recruitmentTrainingCategory@edit');
    Route::post('recruitment-training-category/update/{id}', array( 'before' => 'csrf', 'as' => 'recruitment-training-category', 'uses' => 'recruitmentTrainingCategory@update'));
    Route::get('recruitment-training-category/delete/{id}', 'recruitmentTrainingCategory@destroy');
    // Add Recruitment Database
    Route::get('add-recruitment-training', 'recruitmentTrainingDatabase@index');
    Route::post('add-recruitment-training', array( 'before' => 'csrf', 'as' => 'add-recruitment-training', 'uses' => 'recruitmentTrainingDatabase@create'));
    Route::get('add-recruitment-training/edit/{id}', 'recruitmentTrainingDatabase@edit');
    Route::post('add-recruitment-training/update/{id}', array( 'before' => 'csrf', 'as' => 'add-recruitment-training', 'uses' => 'recruitmentTrainingDatabase@update'));
    Route::get('add-recruitment-training/delete/{id}', 'recruitmentTrainingDatabase@destroy');
});


Route::group(['middleware' => ['auth', 'superadmin']], function () {
    Route::get('/whoisonline', 'UserController@userOnlineStatus');
	//Divisions
	Route::get('divisions','DivisionController@index');
	Route::post('divisions', array( 'before' => 'csrf', 'as' => 'divisions', 'uses' => 'DivisionController@store'));
	Route::get('division-delete/{id}','DivisionController@destroy');
	
	//Locations
	
	Route::get('locations','LocationsController@index');
	Route::post('locations', array( 'before' => 'csrf', 'as' => 'locations', 'uses' => 'LocationsController@store'));
	Route::get('location-delete/{id}','LocationsController@destroy');
	
	//Counties
	
	Route::get('counties','CountiesController@index');
	Route::get('county-delete/{id}','CountiesController@destroy');
	Route::post('counties',array( 'before' => 'csrf', 'as' => 'counties', 'uses' => 'CountiesController@store'));
	
	//Regions
	Route::get('regions','RegionController@index');
	Route::post('regions', array( 'before' => 'csrf', 'as' => 'regions', 'uses' => 'RegionController@store'));
	Route::get('region-delete/{id}','RegionController@destroy');
});
Route::group(['middleware' => ['auth', 'superadmin_salesmanager']], function () {
    // Recruitment Training
    Route::get('recruitment-training', 'recruitmentTrainingDatabase@mainpage');
});

//Sales Managers 

Route::group(['middleware' => ['auth', 'salesmanager']],function() {
// Links
	Route::get('myteam', 'SalesManagerController@myteam');
	Route::get('sales-blog', 'SMBlogController@index');
	Route::get('view-smblog', 'SMBlogController@show');

	Route::get('smblog-delete/{id}','SMBlogController@destroy');
	Route::post('sales-blog', array( 'before' => 'csrf', 'as' => 'sales-blog', 'uses' => 'SMBlogController@store'));
	
	Route::get('team-reports', 'TeamReportsController@index');
});
//SalesPerson
Route::group(['middleware' => ['auth', 'salesperson']],function() {
// Links
	Route::get('my-manager', 'ToC@mymanager');

	Route::get('terms-conditions', 'ToC@index');
	Route::get('projects', 'ProjectsController@index');
	Route::post('projects', array( 'before' => 'csrf', 'as' => 'projects', 'uses' => 'ProjectsController@store'));
	Route::post('update-project/{id}', array( 'before' => 'csrf', 'as' => 'update-project', 'uses' => 'ProjectsController@update'));
	
	Route::get('prospects', 'ProspectsController@index');
	Route::post('prospects', array( 'before' => 'csrf', 'as' => 'prospects', 'uses' => 'ProspectsController@store'));
	
	
	Route::get('contacts', 'ProspectsController@contact');
	Route::get('contact-del/{id}', 'ProspectsController@destroy');
	Route::post('contacts-update/{id}', array( 'before' => 'csrf', 'as' => 'contacts-update', 'uses' => 'ProspectsController@update'));
	
	Route::get('1st-commit', 'ProspectsController@firstcommit');
	Route::get('2nd-commit', 'ProspectsController@secondcommit');
	Route::get('side-dish', 'ProspectsController@sidedish');
	Route::get('marked-sold', 'ProspectsController@markedsold');
	Route::get('marked-closed', 'ProspectsController@markedclosed');
	
	
	// Reports
	Route::get('reports', 'ReportsController@index');
	Route::post('reports', array( 'before' => 'csrf', 'as' => 'reports', 'uses' => 'ReportsController@store'));
	
	
});
// Salesperson and SalesManager
Route::group(['middleware' => ['auth', 'salesperson_manager']],function() {
// Links
		Route::get('my-territory', 'SalesManagerController@myterritory');
	
});


// CAREERS
Route::get('careers', 'careers_controller@index');
// user form
Route::get('careers/{id}/{random_token}', 'careers_controller@formPage');
Route::post('careers/{id}/{random_token}', array( 'before' => 'csrf', 'as' => 'careers/continue', 'uses' => 'careers_controller@continue'));
// steps page
Route::get('careers/steps/{id}/{random_token}', 'careers_controller@showsteps');
// survey page
Route::get('careers/survey/{id}/{random_token}/{steptimer}/{session_token}', 'careers_controller@survey');
Route::post('careers/survey/{id}/{random_token}', array( 'before' => 'csrf', 'as' => 'careers/step5', 'uses' => 'careers_controller@questionsSubmit'));
// calender date page
Route::get('careers/schedule-interview/{id}/{random_token}/{session_token}', 'careers_controller@scheduleInterview');
// date pick & save in careers users
Route::get('careers/schedule-interview/{id}/{random_token}/{session_token}/date/{date}/{day}', 'careers_controller@datepick');
// calender time page
Route::get('careers/schedule-time/{id}/{random_token}/{session_token}/{date}/{day}', 'careers_controller@scheduleTime');
// second last step (select time)
Route::post('careers/schedule-time/{id}/{random_token}/{session_token}/{date}/{day}', array('before' => 'csrf', 'as' => 'careers/schedule-time', 'uses' => 'careers_controller@timeSubmit'));
//Final step
Route::get('careers/scheduled/{id}/{random_token}/{session_token}/{date}/{day}/{weekday}/{timevalue}', 'careers_controller@finalRedirect');
// Last step
Route::get('careers/interview/scheduled/{id}/{random_token}/{s_token}', 'careers_controller@redirectToLandingPage');
// Cancel Interview
Route::get('careers/interview/cancel/{id}/{random_token}/{s_token}', 'careers_controller@cancelInterview');
Route::get('interviews/view/delete/{id}', 'careers_controller@deleteApplicant');
