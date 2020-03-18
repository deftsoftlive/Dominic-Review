<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Image;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Event;
use App\Venue;
use App\Match;
use App\User;
use App\Booking;

class EventController extends Controller
{
    //function to display events listing
    public function frontEvents(){
            $mytime = Carbon::now()->toDateString();
            $events = Event::join('venues', function($join) use ($mytime)
            {
                $join->on('events.venue_id', '=', 'venues.id')
                     ->where('events.status', '=', 1)
                     ->where('events.event_date', '>', $mytime);
            })
          ->select('events.*', 'venues.address', 'venues.name as venue_name', 'venues.image', 'venues.postcode')
          ->orderBy('events.event_date', 'asc')
          ->paginate(10); 
            /*$events  = Event::where('status', 1)->where('event_date','>', $mytime)->orderBy('event_date', 'asc')->paginate(9);*/
            if (Auth::check()) {
            $user_id    = \Auth::user()->id;
            $event_ids = Booking::where('user_id',$user_id)->where('payment_status',1)->where('status',1)->pluck('event_id')->toArray();
            return view('frontend/events', ['events' => $events, 'event_ids' => $event_ids]);
            }else{
            return view('frontend/events', ['events' => $events]);
        }
    }

    //function to display events detail
    public function detailEvent($slug){
        $event_id  = Event::findBySlugOrFail($slug)->id;
        $event = Event::join('venues', function($join) use ($event_id)
            {
                $join->on('events.venue_id', 'venues.id')
                     ->where('events.status', 1)
                     ->where('events.id', $event_id);
            })
          ->select('events.*', 'venues.address', 'venues.name as venue_name', 'venues.image', 'venues.postcode')
          ->first();
        $user   = \Auth::user();
        $error  = "";
        $dob    = $user->date_of_birth;
        $age    = Carbon::parse($dob)->age;
        $age_error = "";
        $availability_error = "";
        $i_blocked_user_arr1 = Match:: where('user1_id',$user->id)->where('user1_block_status', 1)->pluck('user2_id')->toArray();
        $i_blocked_user_arr2 = Match:: where('user2_id',$user->id)->where('user2_block_status', 1)->pluck('user1_id')->toArray();
        $i_blocked_user_arr = array_merge($i_blocked_user_arr1, $i_blocked_user_arr2);
        $block_user = array();
        foreach($i_blocked_user_arr as $check){
        $check_booking = Booking::where('event_id', $event_id)->where('user_id', $check)->where('status', 1)->where('payment_status', 1)->get();
            if(count($check_booking)>0){
                $user_name = User::where('id',$check)->pluck('fname');
                array_push($block_user, $user_name);
            }
        }
        if($event->min_age > $age){
            $age_error = "Your age is less than the minimum required age for this event.";
        }elseif($event->max_age < $age){
            $age_error = "Your age is more than the maximum age limit for this event.";
        }
        if($user->gender == "male"){
            if(($event->event_type == "SSF") || ($event->male_availability <= 0)){
                $availability_error = "We are sorry but at the moment there are no male spaces available.";
            }
        }
        elseif($user->gender == "female"){
            if(($event->event_type == "SSM") || ($event->female_availability <= 0)){
                $availability_error = "We are sorry but at the moment there are no female spaces available.";
            }
        }
        return view('frontend/dashboard/event_detail', ['event' => $event, 'user' => $user, 'age_error'=> $age_error, 'availability_error'=> $availability_error, 'block_user'=> $block_user]);
    }

    public function showEvents() {
        $mytime = Carbon::now()->toDateString();
        $events = Event::join('venues', function($join) use ($mytime)
            {
                $join->on('events.venue_id', '=', 'venues.id')
                     ->where('events.status', '=', 1)
                     ->where('events.event_date', '>=', $mytime);
            })
          ->select('events.*', 'venues.address')
          ->orderBy('events.event_date', 'ASC')->paginate(20, ['*'],'current_events_page'); 

        $completed_events = Event::join('venues', function($join) use ($mytime)
            {
                $join->on('events.venue_id', '=', 'venues.id')
                     ->where('events.status', '=', 1)
                     ->where('events.event_date', '<', $mytime);
            })
          ->select('events.*', 'venues.address')
          ->orderBy('events.event_date', 'DESC')->paginate(20, ['*'],'completed_events_page');  

        $cancelled_events = Event::join('venues', function($join) use ($mytime)
            {
                $join->on('events.venue_id', '=', 'venues.id')
                     ->where('events.status', '=', 0);
            })
          ->select('events.*', 'venues.address')
          ->orderBy('events.event_date', 'ASC')->paginate(20, ['*'],'cancelled_events_page');  

        return view('admin/events/event_show', ['events' => $events, 'completed_events' => $completed_events, 'cancelled_events' =>$cancelled_events]);
    }

    public function showCreateEvent() {
        $venues = Venue::all();
        return view('admin/events/event_create',['venues' => $venues]);
    }

    public function createEvent(Request $request) {
        $ev_date = $request->date;
        $event_date = Carbon::parse($ev_date)->format('Y-m-d');
        if($request['event_type'] =="MS" || $request['event_type'] =="BS"){
            $male_availability = $request['seats'];
            $female_availability = $request['seats'];
        }
        else if($request['event_type'] =="SSM"){
            $male_availability = $request['seats'];
            $female_availability = 0;
        }
        else{
            $male_availability = 0;
            $female_availability = $request['seats'];
        }
        $event = new \App\Event([
            'name'                  => $request['name'],
            'venue_id'              => $request['venue'],
            'event_date'            => $event_date,
            'event_time'            => $request['time'],
            'event_duration'        => $request['duration'],
            'price'                 => $request['price'],
            'min_age'               => $request['min_age'],
            'event_description'     => $request['content'],
            'max_age'               => $request['max_age'],
            'max_place'             => $request['seats'],
            'male_availability'     => $male_availability,
            'female_availability'   => $female_availability,
            'event_type'            => $request['event_type'],
            'status'                => '1'
        ]);
        $event->save();
        return redirect()->route('admin.showevents')->with('flash_message','Event has been added successfully');
    }

    /*public function searchEvent(Request $request){
    	$search_parameter = $request->search;
        
       if($search_parameter != "") {
        $filterEvents= Event::where( 'name', 'LIKE', '%' . $search_parameter . '%' )->where('status',1)
        ->orderBy('event_date', 'desc')->paginate(30)->setPath( '' );

        return view('admin/events/event_show', 
            [
            'events' => $filterEvents, 
            'search' => $request->search
            ]);
       }
       return $this->showEvents();
    }*/

    public function showEditEvent($slug) {
        $venues = Venue::all();
        $event_id  = Event::findBySlugOrFail($slug)->id;
        $event = Event::join('venues', function($join) use ($event_id)
            {
                $join->on('events.venue_id', 'venues.id')
                     ->where('events.status', 1)
                     ->where('events.id', $event_id);
            })
          ->select('events.*', 'venues.address')
          ->first();
        $booking_status = Booking::where('event_id',$event_id)->where('payment_status',1)->where('status',1)->first();
        return view('admin/events/event_edit', ['event' => $event, 'booking_status' => $booking_status, 'venues' => $venues]);
    }

    public function updateEvent(Request $request, $slug) {
        $ev_date = $request->date;
        $event_date = Carbon::parse($ev_date)->format('Y-m-d');
        $event = Event::findBySlugOrFail($slug);
        $booking_status = Booking::where('event_id',$event->id)->where('payment_status',1)->where('status',1)->first();
        $old_seats = $event->max_place;
        $new_seats = $request['seats'];
        if(empty($booking_status)){
                if($request['event_type'] =="MS" || $request['event_type'] =="BS"){
                    $male_availability = $request['seats'];
                    $female_availability = $request['seats'];
                }
                else if($request['event_type'] =="SSM"){
                    $male_availability = $request['seats'];
                    $female_availability = 0;
                }
                else{
                    $male_availability = 0;
                    $female_availability = $request['seats'];
                }

                $event->update([
                    'name'              => $request['name'],
                    'venue_id'          => $request['venue'],
                    'event_date'        => $event_date,
                    'event_time'        => $request['time'],
                    'event_duration'    => $request['duration'],
                    'price'             => $request['price'],
                    'min_age'           => $request['min_age'],
                    'event_description' => $request['content'],
                    'max_age'           => $request['max_age'],
                    'max_place'         => $request['seats'],
                    'male_availability' => $male_availability,
                    'female_availability' => $female_availability,
                    'event_type'        => $request['event_type'],
                    'status'            => $request['status']
                    ]);
            }
            else{
                if($old_seats != $new_seats){
                    if($old_seats > $new_seats){
                        $difference = $old_seats - $new_seats;           
                        if($event->event_type == "MS" || $event->event_type == "BS"){
                            $male_availability = $event->male_availability - $difference;
                            $female_availability = $event->female_availability - $difference;
                            if(($event->male_availability - $difference) < 0 || ($event->female_availability - $difference) < 0){
                                return redirect()->route('admin.showevents')
                                ->with('error_flash_message','Event can not have this much less seats.');
                            }
                        }
                        else if($event->event_type == "SSM"){
                            $male_availability = $event->male_availability - $difference;
                            $female_availability = 0;
                            if(($event->male_availability-$difference) < 0){
                                return redirect()->route('admin.showevents')
                                ->with('error_flash_message','Event can not have this much less seats.');
                            }
                        }
                        else{
                            $male_availability = 0;
                            $female_availability = $event->female_availability - $difference;
                            if(($event->male_availability-$difference) < 0){
                                return redirect()->route('admin.showevents')
                                ->with('error_flash_message','Event can not have this much less seats.');
                            }
                        }
                    }
                    else{
                        $difference = $new_seats - $old_seats;
                        if($event->event_type == "MS" || $event->event_type == "BS"){
                            $male_availability = $event->male_availability + $difference;
                            $female_availability = $event->female_availability + $difference;
                        }
                        else if($event->event_type == "SSM"){
                            $male_availability = $event->male_availability + $difference;
                            $female_availability = 0;
                        }
                        else{
                            $male_availability = 0;
                            $female_availability = $event->female_availability - $difference;
                        }
                    }
                }
                else{
                    $male_availability = $event->male_availability;
                    $female_availability = $event->female_availability;
                }
                $event->update([
                    'name'              => $request['name'],
                    'venue_id'          => $request['venue'],
                    'event_date'        => $event_date,
                    'event_time'        => $request['time'],
                    'event_duration'    => $request['duration'],
                    'price'             => $request['price'],
                    'event_description' => $request['content'],
                    'max_place'         => $request['seats'],
                    'male_availability' => $male_availability,
                    'female_availability' => $female_availability,
                    'min_age'           => $request['min_age'],
                    'max_age'           => $request['max_age'],
                    'status'            => $request['status']
                    ]);
            }
        return redirect()->route('admin.showevents')
        ->with('flash_message','Event has been updated successfully');
    }

    public function destroyEvent(Request $request){
    	if ($request->id) {
           $event = Event::find($request->id);
           
           $event->delete();
           return response()->json(['message' => 'Event has been deleted successfully'], 200);
        }
        return response()->json(['message' => 'Event Id is required'], 400);
    }
}
