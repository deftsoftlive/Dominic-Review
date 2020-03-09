<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class AdminController extends Controller
{

    /********************************
    |
    |		ADMIN CONTROLLER
    |
    |********************************/


    /*-------------------------------
    |	 Listing of all users
    |-------------------------------*/
    public function user_listing()
    {
    	$users = User::orderBy('id','desc')->paginate('10');
    	return view('admin.users.index',compact('users'));
    }
}
