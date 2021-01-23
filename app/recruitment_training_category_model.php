<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class recruitment_training_category_model extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'recruitment_training_category_id';
	protected $table = 'recruitment_training_category';
	protected $fillable = array(
		'category_name',
		'category_title'
	);
	public function recruitment_training_database_model() {
		return $this->hasMany(recruitment_training_database_model::class, 'recruitment_training_category_id');
    }
	public $timestamps = false;
}