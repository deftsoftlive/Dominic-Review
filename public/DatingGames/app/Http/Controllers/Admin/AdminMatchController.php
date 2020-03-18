<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Booking;
use App\Event;
use Carbon\Carbon;
use App\Match;
use Image;
use DB;
class AdminMatchController extends Controller
{
    public function index(){
    	$users = User::where('role_id', 2)->where('status', 1)->orderBy('lname', 'asc')->paginate(30);
    	return view('admin/matches/users_show', ['users' => $users, 'search' => '']);
    	}

   	public function userSearch(Request $request) {
        $search_parameter = $request->search;
        
       if($search_parameter != "") {
        $filterUsers = User::where('role_id',2)->where('status',1)->where(function($query) use ($search_parameter)
          {
              $query->where( 'fname', 'LIKE', '%' . $search_parameter . '%' )
                    ->orWhere( 'lname', 'LIKE', '%' . $search_parameter . '%' );
          })->orderBy('lname', 'asc')->paginate(30)->setPath( '' );
        return view('admin/matches/users_show', 
        [
            'users' => $filterUsers, 
            'search' => $request->search,
            ]);
       }
       return $this->index();
    }

    public function viewUserEvents($slug){
    	$user = User::findBySlugOrFail($slug);
      $mytime = Carbon::today()->toDateString();
    	$events = Booking::join('events', function($join) use ($user,$mytime)
            {
                $join->on('bookings.event_id', '=', 'events.id')
                     ->where('bookings.payment_status', '=', 1)
                     ->where('bookings.status', '=', 1)
                     ->where('events.event_date', '<', $mytime)
                     ->where('bookings.user_id', '=', $user->id);
            })->join('venues', function($join){
                $join->on('bookings.venue_id', 'venues.id');
            })->select('events.*', 'bookings.id as booking_id', 'venues.address')
          	->orderBy('events.id', 'desc')
          	->paginate(30);
          	return view('admin/matches/event_show', ['events' => $events, 'user' => $user]);
    }
    public function viewUserMatches($slug, $id){
    	$event_id = Event::findBySlugOrFail($slug)->id;
    	$user_id = $id;
    	$users = Booking::join('users', function($join) use ($event_id, $user_id)
            {
                $join->on('bookings.user_id', '=', 'users.id')
                     ->where('bookings.payment_status', '=', 1)
                     ->where('bookings.status', '=', 1)
                     ->where('bookings.user_id', '!=', $user_id)
                     ->where('bookings.event_id', '=', $event_id);
            })
          ->select('users.*')
          ->orderBy('users.id', 'desc')
          ->paginate(30); 
    	return view('admin/matches/match_show', ['event_id' => $event_id, 'user_id' => $user_id, 'users' => $users]);
    }

    public function createAMatch(Request $request){
    	$user1_id 	= $request->user_id;
    	$event_id 	= $request->event_id;
    	$user2_id 	= $request->id;
    	if($request->id){
	    	$match = Match::where('event_id', $event_id)->where(function($query) use ($user1_id)
	        {
	            $query->where('user1_id', '=', $user1_id)
	                  ->orWhere('user2_id', '=', $user1_id);
	        })->where(function($query) use ($user2_id)
	        {
	            $query->where('user1_id', '=', $user2_id)
	                  ->orWhere('user2_id', '=', $user2_id);
	        })->first();

	        if(isset($match->id)){
	        	$match->update([
	        		'user1_match_status' => 1,
	        		'user2_match_status' => 1 ]);
	        }
	        else{
	        	$match = new \App\Match([
	        	'event_id' => $event_id,
	        	'user1_id' => $user1_id,
	        	'user2_id' => $user2_id,
	        	'user1_match_status' => 1,
	        	'user2_match_status' => 1
	        	]);
	        	$match->save();
	        }
	        return response()->json(['message' => 'You have made a Match Successfully.'], 200);
	    	}
    		return response()->json(['message' => 'Error occured.'], 200);
    	}

    	public function removeAMatch(Request $request){
    	$user1_id 	= $request->user_id;
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
	        return response()->json(['message' => 'you have removed the match Successfully.'], 200);
    	}else{
    		return response()->json(['message' => 'Error occured.'], 200);
    	}
    }
}
