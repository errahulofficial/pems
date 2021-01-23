<?php

namespace App;

use Cache;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function isOnline()
{
    return Cache::has('user-is-online-' . $this->id);
}

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'careersUserId',
        'fname',
        'lname',
        'email',
        'phone',
        'city',
        'state',
        'zip',
        'division_id',
		'cnpj',
		'gender',
		'home_address',
		'home_city',
		'home_state',
		'home_zip',
		'home_country',
		'business_address',
		'business_city',
		'business_state',
		'business_zip',
		'business_country',
		'confirm',
        'resume',
        'resume_folder',
        'docs',
        'docs_folder',
        'docs',
        'password',
        'skypeid',
		'manager_assign',
		'last_login',
		'password_text'
    ];
  

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
