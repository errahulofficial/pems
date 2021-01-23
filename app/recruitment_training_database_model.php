<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class recruitment_training_database_model extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'recruitment_training_id';
	protected $table = 'recruitment_training';
	protected $fillable = array(
        'recruitment_training_category_id',
		'title',
        'duration',
        'video',
        'documents',
        'completed',
    );
    public function recruitment_training_category_model() {
        return $this->belongsTo(recruitment_training_category_model::class, 'recruitment_training_category_id');
	}
    public $timestamps = false;
}
