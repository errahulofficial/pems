<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $connection = 'mysql';
	protected $primaryKey = 'cat_id';
	protected $table = 'category';
	protected $fillable = array(
		'name',
	);
    public $timestamps = false;
    
    public function subcategory() {
        return $this->hasMany(Subcategory::class, 'cat_id');
    }
}
