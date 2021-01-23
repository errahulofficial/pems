<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blackListModel extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'blacklistid';
	protected $table = 'blacklist';
	protected $fillable = array(
		'fname',
		'lname',
        'email',
        'phone',
        'city',
        'state',
		'zip',
		'note',
		'resume',
        'resume_folder',
        'docs',
        'docs_folder',
	);
	public function users() {
		return $this->hasMany('App\User');
	}
	
	public $timestamps = false;
}
