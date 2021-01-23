<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesManagerModel extends Model
{
     protected $connection = 'mysql';
	protected $primaryKey = 'teamid';
	protected $table = 'sales_team';
	protected $fillable = array(
		'sales_person_id',
		'sales_person_name',
		'sales_person_email',
		'sales_person_skype',
		'sales_person_phone',
		'assigned_manager_id'
	);
	public function users() {
		return $this->hasMany('App\User');
	}
	
}
