<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PortalCities extends Model
{
     protected $connection = 'mysql';
	protected $primaryKey = 'id';
	protected $table = 'portal_cities';
	protected $fillable = array(
	    'city_name',
		'division_id'
    );
	
	public $timestamps = true;
}
