@extends('layouts.frontend')
@section('content')
@include('layouts/slider')
    <!--banner section starts here-->
    <!--Fun-dating section starts here-->
    <section class="fun-dating">
        <div class="container">
            <div class="heading">
                <h3>Fun and Games Dating</h3>
                <h4>Real Life Fun Activities Where <span>Singles</span> Can <span>Meet</span></h4>
                <p>Fun and Games Dating offers singles a chance to meet in a relaxing environment whilst playing awesome indoor and outdoor activities. We are based in Greater Manchester, UK</p>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="fun-date1">
                    <figure>
                        <img src="{{asset('upload/images/FG_Front_021.jpg')}}" alt="" />
                        <a href="javascript:void(0);">
                        <div class="icon-btn">
                           <i class="fa fa-camera-retro" aria-hidden="true"></i>
                        </div>
                        </a>
                    </figure>
                </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="fun-date1">
                    <figure>
                        <img src="{{asset('upload/images/FG_Front_008.jpg')}}" alt="" />
                         <a href="javascript:void(0);">
                        <div class="icon-btn">
                           <i class="fa fa-camera-retro" aria-hidden="true"></i>
                        </div>
                        </a>
                    </figure>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="fun-date1">
                    <figure>
                        <img src="{{asset('upload/images/FG_Front_107.jpg')}}" alt="" />
                         <a href="javascript:void(0);">
                        <div class="icon-btn">
                            <i class="fa fa-camera-retro" aria-hidden="true"></i>
                        </div>
                        </a>
                    </figure>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="fun-date1">
                    <figure>
                        <img src="{{asset('frontend/images/fun-activity-01.png')}}" alt="" />
                         <a href="javascript:void(0);">
                        <div class="icon-btn">
                           <i class="fa fa-camera-retro" aria-hidden="true"></i>
                        </div>
                        </a>
                    </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Fun-dating section starts here-->
    
    <!-- What is fun dating Section starts here -->
    <!-- @if(session('success'))

                
                <div class="custm-verify-msg">
                    <div class="thanku-text">
                                <div class="cross">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </div>
                        <img alt="" src="/photos/1/icons.gif" />
                <p>{{ session('success') }}</p>
                </div>

                </div>

               

            @endif 
            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif -->



    <section class="game-dating">
        <div class="container">
              <div class="heading">
                <h3>
                    What is Fun and Games Dating?
                </h3>
              </div>      
            <p>Are you tired of endless swiping? Struggling to craft a profile that makes you sound smart, emotionally stable and not at all braggy? Speaking online to people who are either super keen to meet up, or weirdly content with never meeting? Endless worst ever conversations? Any first dates are often a case of grabbing drinks or dinner at bars and restaurants you’ve been to many times before ... </p>
            <p>Dating should be fun!</p>
            <p>We offer real life activities that are great fun in an environment where meeting other singles is so easy.<br> We do all the hard work you have all the fun and who knows what may happen after the event.</p>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                   <div class="fun-date1">
                    <figure>
                        <img src="{{asset('upload/images/FG_Front_019.jpg')}}" alt="">
                    </figure>
                </div>
                </div>

                <div class="col-md-4 col-sm-4 col-xs-12">
                   <div class="fun-date1">
                    <figure>
                        <img src="{{asset('upload/images/FG_Front_009.jpg')}}" alt="">
                    </figure>
                </div>
                </div>

                <div class="col-md-4 col-sm-4 col-xs-12">
                   <div class="fun-date1">
                    <figure>
                        <img src="{{asset('upload/images/FG_Front_001.jpg')}}" alt="">
                    </figure>
                </div>
                </div>

            </div>
        </div>
    </section>


    <!-- What is fun dating Section ends here -->
   
    <!--Find match section starts here-->
    <section class="find-match">
        <div class="container">
            <div class="heading">
                <h3>Steps To Find Your Match</h3>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="find-wrap">
                        <a href="register"><figure>
                            <img src="{{asset('frontend/images/resume.svg')}}" alt="" />
                        </figure>
                        <h3>Create Profile</h3></a>
                        <p>We value your privacy and do not ask for too many details.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="find-wrap">
                        <a href="events"><figure>
                            <img src="{{asset('frontend/images/relationship.svg')}}" alt="" />
                        </figure>
                        <h3>Attend Events</h3></a>
                        <p>Book online onto an event you would like to attend, turn up and you'll meet everyone whilst having great fun.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="find-wrap">
                        <figure>
                            <img src="{{asset('frontend/images/speech-bubble.svg')}}" alt="" />
                        </figure>
                        <h3>Make Your Matches</h3>
                        <p>After the event logon to your profile and make your matches. If there is a mutual match, then you both see each other’s full profile and are able to message each other.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Find match section starts here-->

    <!-- Our Activities Section Starts here -->
    <section class="our-activities">
        <div class="container">
            <div class="heading">
                <h3>Our Activities</h3>
             </div>   
             <h4 class="no-border"> Battlefield Live Outdoor Laser Quest</h4>     
                <figure class="new-fig">
                        <img src="{{asset('upload/images/FG_Front_100.jpg')}}" alt="">
                </figure>
            <p>
                Battlefield Live is an exhilarating outdoor laser adventure game that is played using wireless electronic guns that fire infra-red beams, so there is no pain, paint or impact. We use realistic guns with red dot scopes. We play within a large wood. We will have a short round of free for all, where all players are targets, before putting players into two teams and starting the team missions. We will play Team Death Match and Storm the Bunker.

            </p>
            <h4>Disc Golf</h4>
             <figure class="new-fig">
                        <img src="{{asset('upload/images/FG_Front_106.jpg')}}" alt="">
                </figure>
            <p> The basic aim is to send the golf disc from tee to basket in the fewest throws. As well as individual rounds we do speed golf, team relay races and 4 ball.</p>
            <h4>Body Zorbing</h4>
             <figure class="new-fig">
                        <img src="{{asset('upload/images/FG_Front_103.jpg')}}" alt="">
                </figure>
            <p> Our BodyZorbs are large inflatable balls that you slide into, so they fit above your knees and over your head. You can then crash and bump into other BodyZorb players. BodyZorbing allows you to run, walk, jump, flip, back roll and bounce into other BodyZorbs. As your legs are outside the Zorb you are free to move and do what your legs want to. We play some free for all at the start before playing British Bulldog in the zorbs.</p>
            <h4> Mental Puzzle Challenges</h4>
             <figure class="new-fig">
                        <img src="{{asset('upload/images/FG_Front_101.jpg')}}" alt="">
                </figure>
            <p> A chance to use your minds to great effect. We have a sit down session using range of group activities that will test your mental strengths - in a light hearted fun way of course. We have lots of different challenges that are captivating and engaging.</p>
            <h4>Scavenger Hunt</h4>
             <figure class="new-fig">
                        <img src="{{asset('upload/images/FG_Front_105.jpg')}}" alt="">
                </figure>
            <p> Each task in our scavenger hunt is worth a certain number of points and the team with the most points accrued at the end of the game are named the winners. There is a collection of easy tasks to harder tasks worth more points but also more time. Your team decides the priority of the tasks.</p>
            <h4>Small Group Meets</h4>
             <figure class="new-fig">
                        <img src="{{asset('upload/images/FG_Front_104.jpg')}}" alt="">
                </figure>
            <p>In between each activity we make up small groups for guests to have a chance to talk to everyone. We move groups around the room. Don't worry, there are no awkward silences. We use a number of questions that are great ice breakers. None of the questions are designed to trip you up or embarrass you, they are just great conversation starters.</p>
            <h4>Guess the Interesting Fact</h4>
             <figure class="new-fig">
                        <img src="{{asset('upload/images/FG_Front_026.gif')}}" alt="">
                </figure>
            <p> When you sign up you are asked to put in an optional interesting fact. On the day we will display any facts on a board and at the end of the session, we ask everyone to try and match the fact to a person. Don't worry if you can not think of one, it is just a bit of fun.</p>
            <p class="block-p">
                Whether or not you meet a potential partner, or even just meet a new friend you’d like to meet up with later, you’ll be sure of having a great time with us.
            </p>
        </div>
      </section>
    <!-- Our Activities Section ends here -->

    <!--Upcoming events section starts here-->
    <section class="upcoming-events">
        <div class="container">
            <div class="heading">
                <h3>Upcoming Events</h3>
            </div>

            <div class="owl-carousel owl-theme events">
                @foreach($event_data as $event)
                <div class="item">
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
            </div>
        </div>
    </section>   
@endsection