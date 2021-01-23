<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'id';
	protected $table = 'reports';
	protected $fillable = array(
	    'week_no',
	    'monday',
		'tuesday',
		'wednesday',
		'thrusday',
		'friday',
		'saturday',
		'sunday',
		'start_date',
		'end_date',
		'created_by',
		'division_id',
    );
	
	public $timestamps = true;
}
