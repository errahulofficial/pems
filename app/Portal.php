<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portal extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'id';
	protected $table = 'portals';
	protected $fillable = array(
	    'shortcode',
	    'division_id',
		'city',
		'portal',
		'position',
		'inbound_url',
		'outbound_url',
		'url',
		'status',
		'date',
		'counts',
    );
	
	public $timestamps = true;
}
