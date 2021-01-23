<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Notifications\AdminResetPasswordNotification;
use Illuminate\Database\Eloquent\Model;

class careers_users_model extends Authenticatable
{
    use Notifiable;
	
	protected $guard = 'applicant';
	
    protected $connection = 'mysql';
	protected $primaryKey = 'id';
	protected $table = 'careers_users';
	protected $fillable = array(
        'fname',
        'lname',
        'email',
        'phone',
        'zipcode',
        'city',
        'state',
        'resume',
        'blacklisted',
        'time_on_steps_page',
        'time_on_survey_page',
        'survey_questions_correct',
        'survey_questions_wrong',
        'session_token',
        'interview_date',
        'day',
        'employee_id',
        'job_position',
        'job_position_step',
        'interview_time_select',
        'note_for_interviewer',
        'interview_status_id',
        'created_at',
        'updated_at'
	);
	
	    protected $hidden = [
        'password', 'remember_token',
    ];
    public $timestamps = false;
    
}
