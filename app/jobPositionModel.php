<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jobPositionModel extends Model
{
   protected $connection = 'mysql';
	protected $primaryKey = 'jobPositionId';
	protected $table = 'jobposition';
	protected $fillable = array(
		'name',
		'desc',
		'status'
	);
	public $timestamps = false;

	public function jobPositionsStepModel() {
		return $this->hasMany(jobPositionsStepModel::class, 'jobPositionId');
  }
  
}
