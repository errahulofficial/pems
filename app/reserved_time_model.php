<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reserved_time_model extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'id';
	protected $table = 'interviewer_reserved_time';
	protected $fillable = array(
		'interviewer_id',
		'from_date',
		'to_date',
		'reason',
	);
	public $timestamps = false;
}
