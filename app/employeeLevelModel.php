<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employeeLevelModel extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'employeelevelid';
	protected $table = 'employeelevel';
	protected $fillable = array(
		'name',
	);
	public $timestamps = false;
}
