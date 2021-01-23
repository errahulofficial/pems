<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cache;
use App\User;

class UserController extends Controller
{

    /**
     * Show user online status.
     *
     */
    public function userOnlineStatus()
    {
        $users = User::get();

                return view("whoisonline",['users'=>$users]);
    }
}