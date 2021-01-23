<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
     protected $connection = 'mysql';
	protected $primaryKey = 'id';
	protected $table = 'projects';
	protected $fillable = array(
	    'project_name',
		'created_by'
    );
	
	public $timestamps = false;
}
