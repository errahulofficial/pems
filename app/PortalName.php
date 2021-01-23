<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PortalName extends Model
{
     protected $connection = 'mysql';
	protected $primaryKey = 'id';
	protected $table = 'portal_names';
	protected $fillable = array(
	    'portal_name',
		'portal_url',
		'accept_html',
		'can_post_url',
		'note',
    );
	
	public $timestamps = true;
}
