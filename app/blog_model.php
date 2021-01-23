<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blog_model extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'id';
	protected $table = 'blog';
	protected $fillable = array(
		'title',
		'descp',
        'retail_consultants',
        'sales_managers',
        'regional_sales_managers'
    );
    public $timestamps = false;
}
