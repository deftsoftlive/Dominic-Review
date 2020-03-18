@extends('layouts.admin')
@section('content')

<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Events
            <small>Listing</small>
        </h1>
    </section>
    
    @include('partials/removeMessage')
    @include('partials/message')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">                           
                <a href="{{Request::url()}}"><button class="btn btn-primary refresh">Refresh</button></a>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Current Events</h3>                                    
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped">
                                <!-- <table id="example1" class="table table-bordered table-striped"> -->
                            <thead>
                                <tr>
                                    <th>Event ID</th>
                                    <th>Event Name</th>
                                    <th>Event Date</th>
                                    <th>Event Time</th>
                                    <th>Event Venue</th>
                                    <th>Event Type</th>
                                    <th>Event Fee</th>
                                    <th>Male</th>
                                    <th>Female</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(count($events) > 0)
                                @foreach($events as $event)
                                <tr id="row_{{$event->id}}">
                                    <td> {{$event->id}} </td>
                                    <td> {{$event->name}} </td>
                                    <td> {{ \Carbon\Carbon::parse($event->event_date)->format('D dS F Y')}} </td>
                                    <td> {{$event->event_time}} </td>
                                    <td> {{$event->address}} </td>
                                    <td> {{$event->event_type}} </td>
                                    <td> {{$event->price}} </td>
                                     @if($event->event_type == "MS" || $event->event_type == "BS")
                                        <td>{{($event->max_place)- $event->male_availability}}/{{ ($event->max_place) }}</td>
                                        <td>{{($event->max_place)-$event->female_availability}}/{{($event->max_place) }}</td>
                                    @elseif($event->event_type == "SSM")
                                        <td>{{($event->max_place)- $event->male_availability}}/{{$event->max_place}}</td>
                                        <td>0/0</td>
                                    @else
                                        <td>0/0</td>
                                        <td>{{($event->max_place)- $event->female_availability}}/{{$event->max_place}}</td>
                                    @endif
                                    
                                    <td> <a href="{{route('admin.viewEvent',['slug' => $event->slug])}}" class="btn btn-primary">View Bookings</a> </td>
                                </tr>
                                 @endforeach
                            @endif
                            </tbody>
                        </table>
                    <!-- /.box-body -->
                </div><!-- /.box -->
            </div>
            <div class="facility--pagination"> {{ $events->links() }}</div>
                        @if (count ($events) == 0)
                            <div class="facilities-nodata-text">
                               <p > No Data Found</p>
                            </div>
                        @endif
                        
                    </div>
        </div>

    </section><!-- /.content -->

    <section class="content">
        <div class="row">
            <div class="col-xs-12">                           
                
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Completed Events</h3>                                    
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped">
                                <!-- <table id="example1" class="table table-bordered table-striped"> -->
                            <thead>
                                <tr>
                                    <th>Event ID</th>
                                    <th>Event Name</th>
                                    <th>Event Date</th>
                                    <th>Event Time</th>
                                    <th>Event Venue</th>
                                    <th>Event Type</th>
                                    <th>Event Fee</th>
                                    <th>Male Availability</th>
                                    <th>Female Availability</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($completed_events as $completed_event)
                                <tr id="row_{{$completed_event->id}}">
                                    <td> {{$completed_event->id}} </td>
                                    <td> {{$completed_event->name}} </td>
                                    <td> {{ \Carbon\Carbon::parse($completed_event->event_date)->format('D dS F Y')}} </td>
                                    <td> {{$completed_event->event_time}} </td>
                                    <td> {{$completed_event->address}} </td>
                                    <td> {{$completed_event->event_type}} </td>
                                    <td> {{$completed_event->price}} </td>
                                    @if($completed_event->event_type == "MS" || $completed_event->event_type == "BS")
                                        <td>{{($completed_event->max_place)- $completed_event->male_availability}}/{{ ($completed_event->max_place) }}</td>
                                        <td>{{($completed_event->max_place)-$completed_event->female_availability}}/{{($completed_event->max_place) }}</td>
                                    @elseif($completed_event->event_type == "SSM")
                                        <td>{{($completed_event->max_place)- $completed_event->male_availability}}/{{$completed_event->max_place}}</td>
                                        <td>0/0</td>
                                    @else
                                        <td>0/0</td>
                                        <td>{{($completed_event->max_place)- $completed_event->female_availability}}/{{$completed_event->max_place}}</td>
                                    @endif
                                    <td> <a href="{{route('admin.viewEvent',['slug' => $completed_event->slug])}}" class="btn btn-primary">View Bookings</a> </td>
                                </tr>
                                 @endforeach
                            </tbody>
                        </table>
                    <!-- /.box-body -->
                </div><!-- /.box -->
                <div class="facility--pagination"> {{ $completed_events->links() }}</div>
                        @if (count ($completed_events) == 0)
                            <div class="facilities-nodata-text">
                               <p > No Data Found</p>
                            </div>
                        @endif
                        
                    </div>
            </div>
        </div>

    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">                           
                
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Cancelled Events</h3>                                    
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped">
                                <!-- <table id="example1" class="table table-bordered table-striped"> -->
                            <thead>
                                <tr>
                                    <th>Event ID</th>
                                    <th>Event Name</th>
                                    <th>Event Date</th>
                                    <th>Event Time</th>
                                    <th>Event Venue</th>
                                    <th>Event Type</th>
                                    <th>Event Fee</th>
                                    <th>Male Availability</th>
                                    <th>Female Availability</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cancelled_events as $cancelled_event)
                                <tr id="row_{{$cancelled_event->id}}">
                                    <td> {{$cancelled_event->id}} </td>
                                    <td> {{$cancelled_event->name}} </td>
                                    <td> {{ \Carbon\Carbon::parse($cancelled_event->event_date)->format('D dS F Y')}} </td>
                                    <td> {{$cancelled_event->event_time}} </td>
                                    <td> {{$cancelled_event->address}} </td>
                                    <td> {{$cancelled_event->event_type}} </td>
                                    <td> {{$cancelled_event->price}} </td>
                                    @if($cancelled_event->event_type == "MS" || $cancelled_event->event_type == "BS")
                                        <td>{{($cancelled_event->max_place)- $cancelled_event->male_availability}}/{{ ($cancelled_event->max_place) }}</td>
                                        <td>{{($cancelled_event->max_place)-$cancelled_event->female_availability}}/{{($cancelled_event->max_place) }}</td>
                                    @elseif($cancelled_event->event_type == "SSM")
                                        <td>{{($cancelled_event->max_place)- $cancelled_event->male_availability}}/{{$cancelled_event->max_place}}</td>
                                        <td>0/0</td>
                                    @else
                                        <td>0/0</td>
                                        <td>{{($cancelled_event->max_place)- $event->female_availability}}/{{$cancelled_event->max_place}}</td>
                                    @endif
                                    <td> <a href="{{route('admin.viewEvent',['slug' => $cancelled_event->slug])}}" class="btn btn-primary">View Bookings</a> </td>
                                </tr>
                                 @endforeach
                            </tbody>
                        </table>
                    <!-- /.box-body -->
                </div><!-- /.box -->
            </div>
            <div class="facility--pagination"> {{ $cancelled_events->links() }}</div>
                        @if (count ($cancelled_events) == 0)
                            <div class="facilities-nodata-text">
                               <p > No Data Found</p>
                            </div>
                        @endif
                        
                    </div>
        </div>

    </section>
</aside>
@endsection


