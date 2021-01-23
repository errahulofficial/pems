<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jobPositionsStepModel extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'jobPositionStepId';
	protected $table = 'jobpositionstep';
	protected $fillable = array(
		'stepno',
		'stepname',
		'timespan',
		'desc',
		'colorcode',
		'status'
	);
	public $timestamps = false;
	public function jobPositionModel() {
        return $this->belongsTo(jobPositionModel::class, 'jobPositionId');
    }
}
