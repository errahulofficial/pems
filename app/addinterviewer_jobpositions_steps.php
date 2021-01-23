<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class addinterviewer_jobpositions_steps extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'id_steps';
	protected $table = 'add_interviewer_jobpositions_steps';
	protected $fillable = array(
		'jobPositionStep_name',
		'check_steps_name',
        'checked_not',
        'position_token',
	);
	public function addinterviewer_jobpositions() {
        return $this->belongsTo(addinterviewer_jobpositions::class, 'position_token');
	}
	
	
	
	public $timestamps = false;
}
