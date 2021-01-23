<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'sub_id';
	protected $table = 'subcategory';
	protected $fillable = array(
		'cat_id','sub_name'
    );
    public function category() {
        return $this->belongsTo(Category::class, 'cat_id');
      }
}
