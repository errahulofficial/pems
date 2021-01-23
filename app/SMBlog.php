<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SMBlog extends Model
{
     protected $connection = 'mysql';
	protected $primaryKey = 'id';
	protected $table = 's_m_blogs';
	protected $fillable = array(
	    'title',
		'description'
    );
	
	public $timestamps = false;
}
