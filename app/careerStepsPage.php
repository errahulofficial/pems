<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class careerStepsPage extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'step_id';
	protected $table = 'careers_steps_page';
	protected $fillable = array(
        'job_position_id',
        'introduction',
        'step1',
        'step1Type',
        'step2',
        'step3',
        'step3Type',
        'step4',
        'step5',
        'random_token',
        'available_status'
	);
	public $timestamps = false;
}
