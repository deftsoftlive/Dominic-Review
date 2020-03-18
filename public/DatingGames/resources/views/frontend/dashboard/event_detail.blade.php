@extends('layouts.frontend')
@section('content')
<section class="dash-wrapper" id="myevent">
            <div class="container">
                <div class="ham">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
                @include('frontend/dashboard/partials/dashboard_sidebar')
      		<div class="right-nav">
      		<aside class="right-side">
				<section class="event-detail">
					<div class="inner-section">
						<h1 class="dash-title">My Events</h1>
						@if(count($block_user)>0)
							<div class="warning">
							<span class="inn-warning">The users 
							@foreach($block_user as $blocked)
							{{ $blocked }}
							@endforeach 
						Just to let you know, a user you have blocked - - has already booked onto this event. Only book onto this event if you are comfortable with this.</span>
							</div>
						@endif
						@if($age_error != "")
							<div class="warning">
							<span class="inn-warning">{{$age_error}}</span>
							</div>
							@endif
							@if($availability_error != "")
							<div class="warning">
							<span class="inn-warning">{{$availability_error}}</span>
							</div>
						@endif
						<h2 class="page-title">{{$event->name}}</h2>
						<div id="msgs">
							@if(session('success'))
							<div class="alert alert-success">
								{{ session('success') }}
							</div>
							@endif 
							@if(session('error'))
							<div class="alert alert-danger">
								{{ session('error') }}
							</div>
							@endif
							</div>
						<!-- custom book now details starts here -->
						
						<div class="custm-book-details">
							<figure class="details-image">
								<img src="{{asset('upload/images/'.$event->image)}}" />
							</figure>
							<div class="details-text">
								<span class="time">
									{{ \Carbon\Carbon::parse($event->event_date)->format('D dS F Y')}}
								</span>
											
								<div class="event-txt">
									<h3><a href="/our-venues">  <i class="fa fa-map-marker" aria-hidden="true"></i> {{$event->venue_name}}</a></h3>
                                	<h4>Venue Address: {{$event->address}}, {{$event->postcode}} </h4>
									<h4>Event Name: {{$event->name}}</h4>
									<h4>Event Type: 
										@if($event->event_type == 'MS')
											Mixed
										@elseif($event->event_type == 'BS')
											Bi-Sexual
										@elseif($event->event_type == 'SSM')
											Gay - Male
										@else
											Gay - Female
										@endif
									</h4>
									<h4>Start Time: {{ \Carbon\Carbon::parse($event->event_time)->format('H:i')}} </h4>
									<h4>Event Duration: {{$event->event_duration}}</h4>
									<h4>Age Group: {{$event->min_age}}-{{$event->max_age}}</h4>
									<h4>Women: 
                                    @if($event->event_type == "MS" || $event->event_type == "BS")

                                        @if($event->female_availability != 0)

                                            @if ($event->female_availability > (($event->max_place)/2))
                                                <span class="sp-green">Available</span>
                                            @else
                                                <span class="sp-yellow">
                                                LAST FEW PLACES
                                                </span>
                                            @endif
                                        @else
                                            <span class="sp-red">
                                            FULL 
                                            </span>
                                        @endif
                                    @elseif($event->event_type == "SSF")
                                        @if($event->female_availability != 0)
                                            @if($event->female_availability > (($event->max_place)/2))
                                                <span class="sp-green">
                                                Available
                                                </span>   
                                            @else
                                                <span class="sp-yellow">
                                                    LAST FEW PLACES
                                                </span>
                                            @endif
                                        @else
                                            <span class="sp-red">
                                            FULL 
                                            </span>
                                        @endif
                                    @else
                                        <span class="sp-red">
                                        N/A 
                                        </span>
                                    @endif
                                    </h4>
                                    
                                <h4>Men: 
                                    @if($event->event_type == "MS" || $event->event_type == "BS")

                                    @if($event->male_availability != 0)

                                        @if ($event->male_availability > (($event->max_place)/2))
                                            <span class="sp-green">Available</span>
                                        @else
                                            <span class="sp-yellow">
                                            LAST FEW PLACES
                                            </span>
                                        @endif
                                    @else
                                        <span class="sp-red">
                                        FULL 
                                        </span>
                                    @endif
                                @elseif($event->event_type == "SSM")
                                    @if($event->male_availability != 0)
                                        @if($event->male_availability > (($event->max_place)/2))
                                            <span class="sp-green">
                                            Available
                                            </span>   
                                        @else
                                            <span class="sp-yellow">
                                                LAST FEW PLACES
                                            </span>
                                        @endif
                                    @else
                                        <span class="sp-red">
                                        FULL 
                                        </span>
                                    @endif
                                @else
                                    <span class="sp-red">
                                    N/A 
                                    </span>
                                @endif
                                
                            </h4>
									<h4>Price: £{{$event->price}} </h4>
								</div>
						</div>
					</div>
						<div class="row">
						<div class="col-md-12">
							<div class="custom-bookk-form">
								<div class="header">Description</div>
									{!!$event->event_description!!}
								<div class="form-box" id="login-box">
									@if(($age_error == "") && ($availability_error == "")) 
										<div class="header">{{ __('Booking Confirmation') }}
										</div>
										<form method="POST" id="booking-form" action="{{ route('bookEvent',['slug' => $event->slug]) }}">
										@csrf
											<p>You are about to book this event at the cost of £{{$event->price}}</p>
											<div class="login-btn-sec">
												<button type="submit" id="bookingSubmitButton" class="custm-btn bookingSubmitButton btn-block" >{{ __('Continue to Payment') }}</button>                    
											</div>
									@endif
										</form>   
									</div>
								</div>
						</div>
					</div>

				</div>
				</section>
				</aside>
      		</div>
        </div>
       </section>
@endsection