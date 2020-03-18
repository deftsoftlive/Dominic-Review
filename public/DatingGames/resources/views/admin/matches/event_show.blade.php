@extends('layouts.admin')
@section('content')

<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{$user->fname}}'s Events
            <small>Listing</small>
        </h1>
    </section>
    
    @include('partials/removeMessage')
    @include('partials/message')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">                           
                
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Events that MAKE YOUR MATCHES: </h3>                                    
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped">
                                <!-- <table id="example1" class="table table-bordered table-striped"> -->
                            <thead>
                                <tr>
                                    <th>Booking ID</th>
                                    <th>Event Name</th>
                                    <th>Event Date</th>
                                    <th>Event Time</th>
                                    <th>Event Venue</th>
                                    <th>Event Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($events as $event)
                                <tr>
                                    <td>{{$event->booking_id}}</td>
                                    <td>{{$event->name}}</td>
                                    <td>{{Carbon\Carbon::parse($event->event_date)->format('d-m-Y')}}</td>
                                    <td>{{$event->event_time}}</td>
                                    <td>{{$event->address}}</td>
                                    <td>{{$event->event_type}}</td>
                                    <td>
                                    <a href="{{route('admin.viewUserMatches',['slug' => $event->slug, 'id' => $user->id])}}" class="btn btn-primary">
                                        View Event
                                    </a>
                                    </td>
                                </tr>
                                 @endforeach
                            </tbody>
                        </table>
                        <div class="facility--pagination"> {{$events->links() }}</div>
                        @if (count ($events) == 0)
                            <div class="facilities-nodata-text">
                               <p > No Data Found</p>
                            </div>
                        @endif
                    </div>
                    <!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </section><!-- /.content -->
</aside>
@endsection