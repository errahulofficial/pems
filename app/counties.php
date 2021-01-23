<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class counties extends Model
{
     protected $connection = 'mysql';
	protected $primaryKey = 'county_id';
	protected $table = 'counties';
	protected $fillable = array(
		'division_id',
		'county_name'
    );
	
	public $timestamps = false;
	
	public function county() {
		return $this->hasMany('App\counties');
	}
}
