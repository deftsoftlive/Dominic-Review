<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Booking;
use App\Event;
use Session;
use Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        if (Auth::check() && Auth::user()->role()->first()->role === 'admin') {
            return redirect()->route('admin.showUsers');
        } else if (Auth::check() && Auth::user()->role()->first()->role === 'user') {
                $user_id = \Auth::user()->id;
                $event_ids = Booking::where('user_id',$user_id)->where('payment_status',1)->where('status',1)->pluck('event_id')->toArray();
                /* if(Session::has('path')){
                    $url = Session::get('path');
                    if($url == "http://49.249.236.30:50/events"){
                    return Redirect::to($url);  
                    }
                    else{
                        return view('welcome', ['event_ids' => $event_ids]);
                    }              
                }else{
                    return view('welcome', ['event_ids' => $event_ids]);
                } */
				return redirect()->route('user.profile');
        } else {
            return redirect()->route('login');
        }
    }

    public function welcome(){
        if (Auth::check()) {
                $user_id = \Auth::user()->id;
                $event_ids = Booking::where('user_id',$user_id)->where('payment_status',1)->where('status',1)->pluck('event_id')->toArray();
                 return view('welcome', ['event_ids' => $event_ids]);
        }
        else{
            return view('welcome');
        }
    }
    
}
