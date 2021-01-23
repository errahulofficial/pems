<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employeeModel extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'employeeid';
	protected $table = 'employee';
	protected $fillable = array(
		'fname',
		'lname',
        'email',
        'level',
        'division',
        'apptcond'
	);
	public $timestamps = false;
}
