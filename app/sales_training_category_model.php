<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sales_training_category_model extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'sales_training_category_id';
	protected $table = 'sales_training_category';
	protected $fillable = array(
		'category_name',
		'category_title'
	);
	public function sales_training_database_model() {
		return $this->hasMany(sales_training_database_model::class, 'sales_training_category_id');
    }
	public $timestamps = false;
}
