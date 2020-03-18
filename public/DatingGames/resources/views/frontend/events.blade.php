@extends('layouts.frontend')
@section('content')
@include('layouts/slider')
	<section class="upcoming-events events-page">
        <div class="container">
            <h1 class="site-title">Fun and Games Dating</h1>
            <h2 class="page-title">Our Events</h2>
            <div class="paragraph-section">
            <p class="body-text">We offer real life activities that are awesome fun in an easy going <br>environment where you can meet other singles.</p>
            <p class="body-text">Check out our events. You'll need to create a simple profile before booking onto an event.</p>
        </div>
            @if(@sizeof($events))
                @foreach($events as $event)
                    <div class="col-md-4 col-sm-6 col-xs-6">
                        <div class="event-box">
                            <figure>
                                <img src="{{asset('upload/images/'.$event->image)}}" />
                                <span class="time">
                                    {{ \Carbon\Carbon::parse($event->event_date)->format('D dS F Y')}}
                                </span>
                            </figure>
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
                                @if(!empty($event_ids))
                                    @if(in_array($event->id,$event_ids))
                                        <a href="javascript::void(0)" class="custm-btn new-green-btn" disabled>Confirmed</a>
                                    @else
                                <a href="{{route('frontend.detailEvent',['slug' => $event->slug])}}" class="custm-btn">MORE DETAILS</a>
                                @endif
                                @else
                                <a href="{{route('frontend.detailEvent',['slug' => $event->slug])}}" class="custm-btn">MORE DETAILS</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
                @endif
            </div>           
        </div>
</section>
@endsection