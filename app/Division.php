<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
     protected $connection = 'mysql';
	protected $primaryKey = 'division_id';
	protected $table = 'divisions';
	protected $fillable = array(
		'region_id',
		'name',
		'state',
		'available',
		'support_email'
    );
	public $timestamps = false;
	
	public function division() {
		return $this->hasMany('App\Division');
	}
}
