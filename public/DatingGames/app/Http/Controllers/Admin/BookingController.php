<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use App\Http\Controllers\Controller;
use App\Event;
use App\Settings;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Venue;
use App\Booking;
use Srmklive\PayPal\Services\ExpressCheckout;
use App\Mail\user_booking_confirmation;
use App\Mail\AdminBookingConfirmation;
use App\Mail\CancelBooking;
use App\Mail\ActivateBooking;

class BookingController extends Controller
{	
	/**
     * @var ExpressCheckout
     */
    protected $provider;
    public function __construct()
    {
        $this->provider = new ExpressCheckout();
    }

    public function bookEvent(Request $request, $slug){
    	$event = Event::findBySlugOrFail($slug);
    	$user   = \Auth::user();

    	$booking = new \App\Booking([
            'user_id'               => $user->id,
            'event_id'              => $event->id,
            'venue_id'              => $event->venue_id,
            'payment_status'        => 0,
            'status'        		=> 0,
            'payer_id'        => ''
        ]);
        $booking->save();

        //paypal redirection code starts here------

        $data = [];
		$data['items'] = [
		    [
		        'name' => $event->id,
		        'price' => $event->price,
		        'desc'  => $booking->id,
		        'qty' => 1
		    ],
		];

		$data['invoice_id'] = $booking->id;
		$data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
		$data['return_url'] = url('/payment/success?amount='.$event->price.'&invoice_id='.$booking->id);
		$data['cancel_url'] = url('/payment/failed');
		$data['total'] = $event->price;
		$response = $this->provider->setExpressCheckout($data);
		return redirect($response['paypal_link']);
    }

    public function paymentSuccess(Request $request){
	    	$token = $request->get('token');
	    	$PayerID = $request->get('PayerID');


        $amount = $request->get('amount');
        $invoice_id = $request->get('invoice_id');
        $data = [];
        $data['total'] = $amount;
        $data['items'] = [
        [
            'name' => "",
            'price' => $amount,
            'desc'  => "Amount Deduction",
            'qty' => 1
          ],
        ];
        $data['invoice_id'] = $invoice_id;
        $data['invoice_description'] = "Fun & Games Dating Payment Invoice";

	        $response = $this->provider->getExpressCheckoutDetails($token);
	        $event_row = Event::where('id',$response['L_NAME0'])->first();
	        if(($response['ACK'] == "Success") && ($PayerID != "")){
          $payment_status = $this->provider->doExpressCheckoutPayment($data, $token, $PayerID);
		        $booking_id = $response['L_DESC0'];
		    	$booking = Booking::where('id' ,$booking_id)->first();
		    	$booking->update([
		            'payment_status' => 1,
		            'status' 		 => 1,
		            'payer_id' => $PayerID
		        ]);
		    	$event_id = $booking->event_id;
		    	$event = Event::where('id',$event_id)->first();
          $venue_id = $event->venue_id;
          $venue = Venue::find($venue_id)->first();
		    	$user   = \Auth::user();
		    	if($user->gender == "male"){
		    		$male_availability = $event->male_availability-1;
		    		$event->update([
		    			'male_availability' => $male_availability
		    		]);
		    	}
		    	else{
		    		$female_availability = $event->female_availability-1;
		    		$event->update([
		    			'female_availability' => $female_availability
		    		]);
		    	}
		    	$email_id = \Auth::user()->email;
		    	$admin_email = Settings::first()->email_id;
          $username = \Auth::user()->fname;
		    	\Mail::to($email_id)->send(new user_booking_confirmation($event,$venue, $username));
		    	\Mail::to($admin_email)->send(new AdminBookingConfirmation($event,$venue));
          Session::flash('success', 'Thank you, Your Booking Has Been Confirmed.');
		    	return redirect('/user-events');
	    	}
	    	else{
	    		Session::flash('error', 'Error processing PayPal payment for Order');
	    		$event_slug = $event_row->slug;
	    	return redirect()->route('frontend.detailEvent',['slug'=>$event_slug]);
	    	}
    }
    public function paymentFailed(Request $request){
    	$token = $request->get('token');
	        $response = $this->provider->getExpressCheckoutDetails($token);
	        $event_row = Event::where('id',$response['L_NAME0'])->first();
	        $event_slug = $event_row->slug;
	        Session::flash('error', 'Error processing PayPal payment for Order try again after some time');
	    	return redirect()->route('frontend.detailEvent',['slug'=>$event_slug]);
    }
    
    //function to display bookings at backend
    public function showBooking(){
    	/*$bookings = Booking::join('users', function($join)
            {
                $join->on('bookings.user_id', '=', 'users.id')
                     ->where('bookings.payment_status', '=', 1);
            })
    ->join('events', function($join)
            {
                $join->on('bookings.event_id', '=', 'events.id')
                     ->where('bookings.payment_status', '=', 1);
            })
    ->select('bookings.*', 'users.name as user_name','users.email','users.gender','events.name','events.event_date','events.event_time')
    ->orderBy('bookings.id', 'desc')
    ->paginate(10);
        return view('admin/bookings/booking_show', ['bookings' => $bookings, 'search' => '']);*/
        $mytime = Carbon::now()->toDateString();
        $events = Event::join('venues', function($join) use ($mytime)
            {
                $join->on('events.venue_id', '=', 'venues.id')
                     ->where('events.status', '=', 1)
                     ->where('events.event_date', '>=', $mytime);
            })
          ->select('events.*', 'venues.address')
          ->orderBy('events.event_date', 'ASC')->paginate(20, ['*'], 'current_events_page'); 

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

        return view('admin/bookings/booking_show', ['events' => $events, 'completed_events' => $completed_events, 'cancelled_events' =>$cancelled_events]);
    }

    public function viewEvent($slug){

      $event_id = Event::findBySlugOrFail($slug)->id;
      $users = Booking::join('users', function($join) use ($event_id)
            {
                $join->on('bookings.user_id', '=', 'users.id')
                     ->where('bookings.payment_status', '=', 1)
                     ->where('bookings.event_id', '=', $event_id);
            })
          ->select('users.*', 'bookings.id as booking_id', 'bookings.status')
          ->orderBy('gender','ASC')->orderBy('lname', 'ASC')
          ->paginate(30); 
      $venue =  Event::join('venues', function($join) use ($event_id)
            {
                $join->on('events.venue_id', 'venues.id')
                     ->where('events.id', $event_id);
            })
          ->select('events.*', 'venues.address', 'venues.name as venue_name', 'venues.postcode')
          ->first();
          return view('admin/bookings/booked_user', ['users' => $users, 'venue' => $venue]);
    }

    /*public function searchBooking(Request $request){
    	$search_parameter = $request->search;
        
       if($search_parameter != "") {
        $filterEvents= Event::where( 'name', 'LIKE', '%' . $search_parameter . '%' )
        ->paginate(10)->setPath( '' );

        return view('admin/bookings/booking_show', 
            [
            'events' => $filterEvents, 
            'search' => $request->search
            ]);
       }
       return $this->showBooking();
    }*/
    public function cancelBooking(Request $request){
    	if ($request->id) {
           $booking = Booking::find($request->id);
           $user 	= User::where('id', '=', $booking->user_id)->first();
           $event 	= Event::where('id', '=', $booking->event_id)->first();
           $male_availability = $event->male_availability;
           $female_availability = $event->female_availability;
           $booking->update([
           		'status' => 0
           ]);
           if($user->gender == "male"){
	           $event->update([
	           		'male_availability' => $male_availability+1
	           ]);
       		}
       		else{
       			$event->update([
	           		'female_availability' => $female_availability+1
	           ]);
       		}
       		$email_id = $user->email;
       		\Mail::to($email_id)->send(new CancelBooking($booking, $user ,$event));
           return response()->json(['message' => 'Booking has been Cancelled successfully'], 200);
        }
        return response()->json(['message' => 'Booking Id is required'], 400);
    }

    public function activateBooking(Request $request){
    	if ($request->id) {
           $booking = Booking::find($request->id);
           $user 	= User::where('id', '=', $booking->user_id)->first();
           $event 	= Event::where('id', '=', $booking->event_id)->first();
           $male_availability = $event->male_availability;
           $female_availability = $event->female_availability;
           $booking->update([
           		'status' => 1
           ]);
           if($user->gender == "male"){
	           $event->update([
	           		'male_availability' => $male_availability-1
	           ]);
       		}
       		else{
       			$event->update([
	           		'female_availability' => $female_availability-1
	           ]);
       		}
       		$email_id = $user->email;
       		\Mail::to($email_id)->send(new ActivateBooking($booking, $user ,$event));
           return response()->json(['message' => 'Booking has been Activated successfully'], 200);
        }
        return response()->json(['message' => 'Booking Id is required'], 400);
    }

    public function collectBooking($slug){
      $event = Event::findBySlugOrFail($slug);
      return view('admin/bookings/add_booking', ['event' => $event]);
    }

    public function createBooking(Request $request,$slug){
      $event = Event::findBySlugOrFail($slug);
      $venue_id = $event->venue_id;
      $venue = Venue::find($venue_id)->first();
      $user = User::where('email',$request['username'])->first();
      $dob    = $user['date_of_birth'];
      $error = 0;
      $age    = Carbon::parse($dob)->age;
      if(empty($user)){
        return Redirect::back()->with('error_flash_message','User does not found');
      }
      else{
        if($event->min_age > $age){
          return Redirect::back()->with('error_flash_message','Your age is less than the minimum required age for this event.');
        }
        if($event->max_age < $age){
          return Redirect::back()->with('error_flash_message','Your age is more than the maximum age limit for this event.');
        }
        if($user['gender'] == "male"){
            if(($event->event_type == "SSF") || ($event->male_availability <= 0)){
              return Redirect::back()->with('error_flash_message','We are sorry but at the moment there are no male spaces available.');
            }
        }
        if($user['gender'] == "female"){
            if(($event->event_type == "SSM") || ($event->female_availability <= 0)){
              return Redirect::back()->with('error_flash_message','We are sorry but at the moment there are no female spaces available.');
            }
        }
          $booking = Booking::where('user_id',$user['id'])->where('payment_status',1)->where('status',1)->where('event_id',$event->id)->first();
          if(empty($booking)){
            $new_booking = new \App\Booking([
            'user_id'               => $user['id'],
            'event_id'              => $event->id,
            'venue_id'              => $event->venue_id,
            'payment_status'        => 1,
            'status'            => 1,
            'payer_id'        => ''
            ]);
            $new_booking->save();
            if($user['gender'] == "male"){
             $event->update([
                'male_availability' => $event->male_availability-1
             ]);
            }
            else{
              $event->update([
                  'female_availability' => $event->female_availability-1
               ]);
            }
            $username = $user['fname'];
            \Mail::to($user['email'])->send(new user_booking_confirmation($event, $venue, $username));
            return redirect()->route('admin.viewEvent',['slug' => $event->slug])->with('flash_message','You have sccessfully added the user to this event.');  
          }
          else{
            return Redirect::back()->with('error_flash_message','User has already booked onto this event.');
          }
        }
    }
}
