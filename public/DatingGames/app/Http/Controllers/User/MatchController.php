<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\User;
use App\Booking;
use App\Event;
use Carbon\Carbon;
use App\Match;
use App\Venue;
use Image;

use App\Http\Controllers\Controller;

class MatchController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    	$user = \Auth::user()->id;
    	/*$mytime = Carbon::now()->toDateString();
    	$events = Booking::join('events', function($join) use ($user, $mytime)
            {
                $join->on('bookings.event_id', '=', 'events.id')
                     ->where('bookings.payment_status', '=', 1)
                     ->where('bookings.status', '=', 1)
                     ->where('bookings.user_id', '=', $user)
                     ->where('events.event_date', '<', $mytime);
            })->join('venues', function($join){
                $join->on('bookings.venue_id', 'venues.id');
            })->select('events.*', 'bookings.id as booking_id', 'bookings.status', 'venues.address')
          ->orderBy('events.id', 'desc')
          ->paginate(10); 
    	return view('frontend/dashboard/user_events', ['events' => $events]);*/

        $matches = Match::where(function($query) use ($user){
                $query->where('user1_id', '=', $user)
                      ->orWhere('user2_id', '=', $user);
            })->where(['user2_match_status' => 1,'user1_match_status' => 1,'user1_block_status' => 0,'user2_block_status' => 0])->get();
            
            $arr1 = $arr2= $main_arr = $users = array();
            foreach($matches as $match){
                if($user == $match->user1_id){
                    $arr1[] = $match->user2_id;
                }
                
                if($user == $match->user2_id){
                    $arr2[] = $match->user1_id;
                }
            }
            
            $main_arr = array_merge($arr1, $arr2);
            
            if( !empty($main_arr) ){
                $users = User::whereIn('id', $main_arr)->get();
            }
            return view('frontend/dashboard/matches', ['users' => $users]);
    }
    public function matchMaking($slug){
    	$user = \Auth::user()->id;
    	$event = Event::join('venues', function($join) use ($slug)
            {
                $join->on('events.venue_id', 'venues.id')
                     ->where('events.slug', $slug);
            })
          ->select('events.*', 'venues.address','venues.name as venue_name', 'venues.postcode')
          ->first();

    	$event_id = $event->id;
    	$matches = Match::where('event_id', $event_id)->where(function($query) use ($user)
        {
            $query->where('user1_id', '=', $user)
                  ->orWhere('user2_id', '=', $user);
        })->get();

        $rejected_arr1 = Match::where(['event_id' => $event_id, 'user1_id' => $user, 'user1_match_status' => 0])->pluck('user2_id')->toarray();
        $rejected_arr2 = Match::where(['event_id' => $event_id, 'user2_id' => $user, 'user2_match_status' => 0])->pluck('user1_id')->toarray();

        $rejected_users = array_merge($rejected_arr1, $rejected_arr2);

        $rejection_arr1 = Match::where(['event_id' => $event_id, 'user1_id' => $user, 'user2_match_status' => 0])->pluck('user2_id')->toarray();

        $rejection_arr2 = Match::where(['event_id' => $event_id, 'user2_id' => $user, 'user1_match_status' => 0])->pluck('user1_id')->toarray();

        $rejections = array_merge($rejection_arr1, $rejection_arr2);
    	$users = Booking::join('users', function($join) use ($event_id, $user)
            {
                $join->on('bookings.user_id', '=', 'users.id')
                     ->where('bookings.payment_status', '=', 1)
                     ->where('bookings.status', '=', 1)
                     ->where('bookings.user_id', '!=', $user)
                     ->where('bookings.event_id', '=', $event_id);
            })
          ->select('users.*')
          ->orderBy('users.id', 'desc')
          ->paginate(30);	
    	return view('frontend/dashboard/user_match', ['users' => $users, 'event' => $event, 'matches' => $matches, 'rejected_users' =>$rejected_users, 'rejections' => $rejections]);
    }

    public function noMatch(Request $request){
    	$user1_id 	= \Auth::user()->id;
    	$event_id 	= $request->event_id;
    	$user2_id 	= $request->id;
    	if($request->id){
	    	$match = Match::where('event_id', $event_id)->where(function($query) use ($user1_id)
	        {
	            $query->where('user1_id', $user1_id)
	                  ->orWhere('user2_id', $user1_id);
	        })->where(function($query) use ($user2_id)
	        {
	            $query->where('user1_id', $user2_id)
	                  ->orWhere('user2_id', $user2_id);
	        })->first();

	        if(isset($match->id)){
	        	if($user1_id == $match->user1_id){
	        	$match->update([
	        		'user1_match_status' => 0 ]);
	        	}
	        	else{
	        		$match->update([
	        		'user2_match_status' => 0 ]);
	        	}
	        }
	        else{
	        	$match = new \App\Match([
	        	'event_id' => $event_id,
	        	'user1_id' => $user1_id,
	        	'user2_id' => $user2_id,
	        	'user1_match_status' => 0,
	        	]);
	        	$match->save();
	        }
	        return response()->json(['message' => 'User has been removed successfully'], 200);
    	}else{
    		return response()->json(['message' => 'Error occured.'], 200);
    	}
    }

    public function makeAMatch(Request $request){
    	$user1_id 	= \Auth::user()->id;
    	$event_id 	= $request->event_id;
    	$user2_id 	= $request->id;
    	if($request->id){
	    	$match = Match::where('event_id', $event_id)->where(function($query) use ($user1_id)
	        {
	            $query->where('user1_id', '=', $user1_id)
	                  ->orWhere('user2_id', '=', $user1_id);
	        })->where(function($query) use ($user2_id)
	        {
	            $query->where('user2_id', '=', $user2_id)
	                  ->orWhere('user1_id', '=', $user2_id);
	        })->first();

	        if(isset($match->id)){
	        	if($user1_id == $match->user1_id){
	        	$match->update([
	        		'user1_match_status' => 1 ]);
	        	}
	        	else{
	        		$match->update([
	        		'user2_match_status' => 1 ]);
	        	}
	        }
	        else{
	        	$match = new \App\Match([
	        	'event_id' => $event_id,
	        	'user1_id' => $user1_id,
	        	'user2_id' => $user2_id,
	        	'user1_match_status' => 1,
	        	]);
	        	$match->save();
	        }
	        if((($match->user1_match_status) == 1) && (($match->user2_match_status) == 1)){
	        return response()->json(['message' => 'There is a match and you can now see their details.'], 200);
	    	}elseif((($match->user1_match_status) == 1) && (($match->user2_match_status) == '')){
	    		return response()->json(['message' => 'Your input has been recorder successfully. Please wait while user make a match with you.'], 200);
	    	}
	    }elseif((($match->user1_match_status) == 0) && (($match->user2_match_status) == 1)){
	    		return response()->json(['message' => 'better luck next time.'], 200);
    	}else{
    		return response()->json(['message' => 'Error occured.'], 200);
    	}
    }

    public function matchedUser($slug){
    	$user = User::findBySlugOrFail($slug);
    	return view('frontend/dashboard/user_detail', ['user' => $user]);
    }
    public function block($slug){
        $logged_in_user_id = \Auth::user()->id;
        $other_user_id = User::findBySlugOrFail($slug)->id;
        $match = Match::where(['user2_match_status'=>1,'user1_match_status'=>1])->where(function($query) use ($logged_in_user_id)
            {
                $query->where('user1_id', $logged_in_user_id)
                      ->orWhere('user2_id', $logged_in_user_id);
            })->where(function($query) use ($other_user_id)
            {
                $query->where('user2_id', $other_user_id)
                      ->orWhere('user1_id', $other_user_id);
            })->get();
            foreach($match as $matches){ 
                if($matches->user1_id == $logged_in_user_id){
                    $matches->update([
                        'user1_block_status' => 1,
                    ]);
                }
                else{
                    $matches->update([
                        'user2_block_status' => 1,
                    ]);
                }
            }
        return redirect()->back()->withSuccess("You have successfully blocked the User.");
    }

    public function unblock($slug){
       $logged_in_user_id = \Auth::user()->id;
        $other_user_id = User::findBySlugOrFail($slug)->id;
        $match = Match::where(['user2_match_status'=>1,'user1_match_status'=>1])->where(function($query) use ($logged_in_user_id)
            {
                $query->where('user1_id', $logged_in_user_id)
                      ->orWhere('user2_id', $logged_in_user_id);
            })->where(function($query) use ($other_user_id)
            {
                $query->where('user2_id', $other_user_id)
                      ->orWhere('user1_id', $other_user_id);
            })->get();
            
            foreach($match as $matches){ 
                if($matches->user1_id == $logged_in_user_id){
                    $matches->update([
                        'user1_block_status' => 0,
                    ]);
                }
                else{
                    $matches->update([
                        'user2_block_status' => 0,
                    ]);
                }
            }
        return redirect()->back()->withSuccess("You have successfully blocked the User.");
    }
}
