@extends('layouts.frontend')
@section('content')

 <!--main section starts Here-->

        <section class="dash-wrapper" id="myprofile">
            <div class="container">
                <div class="ham">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
                @include('frontend/dashboard/partials/dashboard_sidebar')
      		<div class="right-nav">
      		<aside class="right-side">
   
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary  myevnts-custm">
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
                    <div class="box-header">
                        <h3 class="box-title">My Events</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <h3>Events You are Booked On</h3>
                    @if(count($booked_events)>0)

                    <div class="table-responsive">
                    <table class="table table-bordered table-striped my-events">
                                <!-- <table id="example1" class="table table-bordered table-striped"> -->
                            <thead>
                                <tr>
                                    <th>Event Date</th>
                                    <th>Event Name</th>
                                    <th>Location</th>
                                    <th>Type</th>
                                    <th>Ages</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($booked_events as $booked_event)
                                <tr>
                                    <td>{{Carbon\Carbon::parse($booked_event->event_date)->format('D dS F Y')}}</td>
                                    <td>{{$booked_event->name}}</td>
                                    <td>{{$booked_event->address}}</td>
                                    <td>
                                    @if($booked_event->event_type == 'MS')
                                        Mixed
                                    @elseif($booked_event->event_type == 'BS')
                                        Bi-Sexual
                                    @elseif($booked_event->event_type == 'SSM')
                                        Gay - Male
                                    @else
                                        Gay - Female
                                    @endif
                                    </td>
                                    <td>{{$booked_event->min_age}}-{{$booked_event->max_age}}</td>
                                    
                                </tr>
                                 @endforeach
                            </tbody>
                        </table>
                    </div>
                        @else
                        <h2>You are not booked on any event.</h2>
                        @endif
                        
                        

                         <h3>Future Events</h3>
                    @if(count($future_events)>0)

                    <div class="table-responsive">
                    <table class="table table-bordered table-striped my-events">
                                <!-- <table id="example1" class="table table-bordered table-striped"> -->
                            <thead>
                                <tr>
                                    <th>Event Date</th>
                                    <th>Event Name</th>
                                    <th>Location</th>
                                    <th>Type</th>
                                    <th>Ages</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($future_events as $future_event)
                                    @if(!(in_array($future_event->id, $booked_event_ids)))
                                        <tr>
                                            <td>{{Carbon\Carbon::parse($future_event->event_date)->format('D dS F Y')}}</td>
                                            <td>{{$future_event->name}}</td>
                                            <td>{{$future_event->address}}</td>
                                            <td>
                                            @if($future_event->event_type == 'MS')
                                                Mixed
                                            @elseif($future_event->event_type == 'BS')
                                                Bi-Sexual
                                            @elseif($future_event->event_type == 'SSM')
                                                Gay - Male
                                            @else
                                                Gay - Female
                                            @endif
                                            </td>
                                            <td>{{$future_event->min_age}}-{{$future_event->max_age}}</td>
                                            <td><a href="{{route('frontend.detailEvent',['slug'=>$future_event->slug])}}" class="btn event-btn-cust">MORE DETAILS</a></td>
                                            
                                        </tr>
                                    @endif
                                 @endforeach
                            </tbody>
                        </table>
                    </div>
                        @else
                        <h2>No Events to Display</h2>
                        @endif

                        <h3>Events You have Attended</h3>
                        <p>Please make your matches within 14 days of attending the event. After this time you will no longer be able to make any further matches.</p>
                    @if(count($attended_events)>0)

                    <div class="table-responsive">
                    <table class="table table-bordered table-striped my-events">
                                <!-- <table id="example1" class="table table-bordered table-striped"> -->
                            <thead>
                                <tr>
                                    <th>Event Date</th>
                                    <th>Event Name</th>
                                    <th>Location</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($attended_events as $attended_event)
                                    @if((Carbon\Carbon::parse($attended_event->event_date)->diffInDays(Carbon\Carbon::now()->toDateString())) < 14)
                                        <tr>
                                            <td>{{Carbon\Carbon::parse($attended_event->event_date)->format('D dS F Y')}}</td>
                                            <td>{{$attended_event->name}}</td>
                                            <td>{{$attended_event->address}}</td>
                                            <td>
                                                
                                                <a href="{{route('user.matchMaking',['slug' => $attended_event->slug])}}" class="btn event-btn-cust">View Matches</a></td> 
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                        @else
                        <h2>You have not attended any event till now.</h2>
                        @endif
                </div><!-- /.box -->

            </div><!--/.col (left) -->
            <!-- right column -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</aside>
      		</div>
        </div>
       </section>


@endsection

