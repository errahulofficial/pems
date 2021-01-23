<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class careersQuestionModel extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'questions_id';
	protected $table = 'careers_questions';
	protected $fillable = array(
		'question',
		'step5_token'
	);
	public $timestamps = false;
}
