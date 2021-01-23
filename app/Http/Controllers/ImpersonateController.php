<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class ImpersonateController extends Controller
{

public function __construct()
{
    $this->middleware('auth');

    if(Auth::check() && Auth::user()->role != 'superadmin') 
    {
        echo ' error not admin (nice try!).';
        die();
    }
}

public function impersonate($id)
{       
    Auth::logout(); 
    Auth::loginUsingId($id);

    return redirect('/');
}
}
