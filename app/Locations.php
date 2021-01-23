<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'id';
	protected $table = 'locations';
	protected $fillable = array(
		'state',
		'state_name',
		'city',
		'county',
		'zip',
		'lat',
		'long',
		'region_id',
		'division_id',
		'multi_county'
    );
	public $timestamps = false;
	
	public function loc_div() {
		return $this->hasMany('App\Division');
	}
	public function loc_reg() {
		return $this->hasMany('App\Region');
	}
}
