<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class addinterviewer_jobpositions extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'position_token';
	protected $table = 'add_interviewer_jobpositions';
	protected $fillable = array(
		'position_name',
		'job_position_main_id',
		'position_token',
		'add_interview_token'
	);
	public function addinterviewer_jobpositions_steps() {
		return $this->hasMany(addinterviewer_jobpositions_steps::class, 'position_token');
  }
	public $timestamps = false;
}
