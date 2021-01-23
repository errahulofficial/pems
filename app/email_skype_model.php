<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class email_skype_model extends Authenticatable
{
    protected $connection = 'mysql';
	protected $primaryKey = 'id';
	protected $table = 'email_skype';
	protected $fillable = array(
		'id',
		'descp'
    );
}
