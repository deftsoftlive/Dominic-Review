<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Booking;
use App\Event;
use App\Venue;
use Illuminate\Support\Facades\File;
use Image;
use Redirect;

class UserProfileController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	$user = \Auth::user();
        return view('frontend/dashboard/user_profile', ['user' => $user]);
    }

    public function update_user(Request $request){
    	$user = \Auth::user();
        $dob    = $request['date_of_birth'];
        $date_of_birth = Carbon::parse($dob)->format('Y-m-d');
        $user->update([
                'fname' => $request['fname'],
                'lname' => $request['lname'],
                'contact_no' => $request['contact_no'],
                'nick_name' => $request['nick_name'],
                'address' => $request['address'],
                'interesting_facts' => $request['interesting_facts']
            ]);
        return redirect()->back()->withSuccess('Your Profile has been updated successfully');
    }

    public function changePassword(){
        return view('frontend/dashboard/change_password');
    }
    public function updatePassword(Request $request){
        $user = \Auth::user();
        if(Hash::check($request['current_password'], $user->password)){
            $user->update([
                'password' =>Hash::make($request['password'])
            ]);
            return redirect('/profile')->withSuccess('Your Password has been updated successfully');
        }
        else{
            return redirect()->back()->withError('Current password does not match to existing password, Please try again.');
        }
    }
    public function editProfilePicture(Request $request){
        if($request->profile_pic){
            $user = \Auth::user();
            $image_path = public_path('/upload/images/'.$user->new_profile_picture);
            $pic = $request->file('profile_pic');
            $filename = time() . '.' . $pic->getClientOriginalExtension();
            $path = public_path('/upload/images/'.$filename);
            Image::make($pic->getRealPath())->save($path);
            $user->update([
                    'new_profile_picture' => $filename,
                    'profile_pic_status' => '0',
                ]);
            return response()->json($user->new_profile_picture);
        }
        else{
            return response()->json('error');
        }
    }

    public function myEvents(){
        $user = \Auth::user();
        $user_id = $user->id;
        $mytime = Carbon::today()->toDateString();
        $booked_events = Booking::join('events', function($join) use ($user_id,$mytime)
            {
                $join->on('bookings.event_id', '=', 'events.id')
                     ->where('bookings.payment_status', '=', 1)
                     ->where('bookings.status', '=', 1)
                     ->where('events.event_date', '>=', $mytime)
                     ->where('bookings.user_id', '=', $user_id);
            })->join('venues', function($join){
                $join->on('bookings.venue_id', 'venues.id');
            })
            ->select('events.*', 'bookings.id as booking_id', 'venues.address')
            ->orderBy('events.id', 'desc')
            ->get();

            $booked_event_ids = Booking::join('events', function($join) use ($user_id,$mytime)
            {
                $join->on('bookings.event_id', '=', 'events.id')
                     ->where('bookings.payment_status', '=', 1)
                     ->where('bookings.status', '=', 1)
                     ->where('events.event_date', '>=', $mytime)
                     ->where('bookings.user_id', '=', $user_id);
            })->pluck('events.id')->toarray();

        $attended_events = Booking::join('events', function($join) use ($user_id,$mytime)
            {
                $join->on('bookings.event_id', '=', 'events.id')
                     ->where('bookings.payment_status', '=', 1)
                     ->where('bookings.status', '=', 1)
                     ->where('events.event_date', '<', $mytime)
                     ->where('bookings.user_id', '=', $user_id);
            })->join('venues', function($join){
                $join->on('bookings.venue_id', 'venues.id');
            })->select('events.*', 'bookings.id as booking_id', 'venues.address')
            ->orderBy('events.id', 'desc')
            ->get();
            
        $future_events = Event::join('venues', function($join) use ($mytime)
            {
                $join->on('events.venue_id', '=', 'venues.id')
                     ->where('events.status', '=', 1)
                     ->where('events.event_date', '>', $mytime);
            })
          ->select('events.*', 'venues.address', 'venues.image')
          ->orderBy('events.event_date', 'asc')
          ->get();    
            return view('frontend/dashboard/my_events', ['booked_events' => $booked_events, 'attended_events' => $attended_events, 'future_events' => $future_events, 'booked_event_ids' => $booked_event_ids]);
    }
}
