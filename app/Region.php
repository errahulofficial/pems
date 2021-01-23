<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
     protected $connection = 'mysql';
	protected $primaryKey = 'region_id';
	protected $table = 'regions';
	protected $fillable = array(
		'region_name'
    );
	
	public $timestamps = false;
	
    
}
