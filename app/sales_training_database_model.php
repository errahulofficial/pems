<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sales_training_database_model extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'sales_training_id';
	protected $table = 'sales_training';
	protected $fillable = array(
        'sales_training_category_id',
		'title',
        'duration',
        'video',
        'documents',
        'completed',
    );
    public function sales_training_category_model() {
        return $this->belongsTo(sales_training_category_model::class, 'sales_training_category_id');
	}
    public $timestamps = false;
}
