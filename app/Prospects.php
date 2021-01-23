<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prospects extends Model
{
     protected $connection = 'mysql';
	protected $primaryKey = 'id';
	protected $table = 'prospects';
	protected $fillable = array(
	    'project_id',
		'project_name',
		'website',
		'company_name',
		'company_address',
		'facebook_url',
		'whatsapp',
		'contact_phone',
		'contact_name',
		'contact_surname',
		'contact_email',
		'commit_stage',
		'commit_complete',
		'commit_schedule',
		'commit_confirm',
		'note_title',
		'note_description',
		'created_by'
    );
	
	public $timestamps = true;
}
