<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employeeDivisionModel extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'employeedivisionid';
	protected $table = 'employeedivision';
	protected $fillable = array(
		'name',
	);
	public $timestamps = false;
}
