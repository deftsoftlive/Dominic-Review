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
    <section class="content">
            <div class="row">
                <div class= "col-sm-5"> 
                    <a href="{{route('admin.showCreateEvent')}}">
                        <button class="btn btn-info bttn--height-right"><i class="fa fa-fw fa-plus-circle"></i> Add New Event</button>
                    </a>
                </div>
            </div>
        </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">                           
                
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
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($events as $event)
                                <tr id="row_{{$event->id}}">

                                    <td>{{$event->id}}</td>
                                    <td>{{ \Carbon\Carbon::parse($event->event_date)->format('D dS F Y')}}</td>
                                    <td>{{$event->name}}</td>
                                    <td>{{$event->event_type}}</td>
                                    <td>
                                        @if(($event->status == 1) && ((\Carbon\Carbon::now()->toDateString()) > ($event->event_date))) 
                                            <a href="javascript:void(0)" >
                                            <button id="{{$event->id}}" class="btn btn-success" disabled><i class="fa fa-fw fa-edit"></i>Edit</button>
                                            </a> 
                                        @else
                                            <a href="{{ route('admin.showEditEvent', ['slug' => $event->slug]) }}" >
                                                <button id="{{$event->id}}" class="btn btn-success"><i class="fa fa-fw fa-edit" ></i>Edit</button>
                                            </a>
                                        @endif
                                    <button type="button" id="{{$event->id}}" class="btn btn-danger rem_button" data-toggle="modal" data-target="#remove_event">
                                      <i class="fa fa-fw fa-times-circle"></i>Remove
                                    </button>
                                    </td>
                                </tr>
                                 @endforeach
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
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($completed_events as $completed_event)
                                <tr id="row_{{$completed_event->id}}">

                                    <td>{{$completed_event->id}}</td>
                                    <td>{{ \Carbon\Carbon::parse($completed_event->event_date)->format('D dS F Y')}}</td>
                                    <td>{{$completed_event->name}}</td>
                                    <td>{{$completed_event->event_type}}</td>
                                    <td>
                                        @if(($completed_event->status == 1) && ((\Carbon\Carbon::now()->toDateString()) >= ($completed_event->event_date))) 
                                            <a href="javascript:void(0)" >
                                            <button id="{{$completed_event->id}}" class="btn btn-success" disabled><i class="fa fa-fw fa-edit"></i>Edit</button>
                                            </a> 
                                        @else
                                            <a href="{{ route('admin.showEditEvent', ['slug' => $completed_event->slug]) }}" >
                                                <button id="{{$completed_event->id}}" class="btn btn-success"><i class="fa fa-fw fa-edit" ></i>Edit</button>
                                            </a>
                                        @endif
                                    <button type="button" id="{{$completed_event->id}}" class="btn btn-danger rem_button" data-toggle="modal" data-target="#remove_event">
                                      <i class="fa fa-fw fa-times-circle"></i>Remove
                                    </button>
                                    </td>
                                </tr>
                                 @endforeach
                            </tbody>
                        </table>
                    <!-- /.box-body -->
                </div><!-- /.box -->
            </div>
            <div class="facility--pagination"> {{ $completed_events->links() }}</div>
                @if (count ($completed_events) == 0)
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
                        <h3 class="box-title">Cancelled Events</h3>                                    
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped">
                                <!-- <table id="example1" class="table table-bordered table-striped"> -->
                            <thead>
                                <tr>
                                    <th>Event ID</th>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cancelled_events as $cancelled_event)
                                <tr id="row_{{$cancelled_event->id}}">

                                    <td>{{$cancelled_event->id}}</td>
                                    <td>{{ \Carbon\Carbon::parse($event->event_date)->format('D dS F Y')}}</td>
                                    <td>{{$cancelled_event->name}}</td>
                                    <td>{{$cancelled_event->event_type}}</td>
                                    <td>
                                        @if($cancelled_event->status == 1)
                                            @if((\Carbon\Carbon::now()->toDateString()) < ($cancelled_event->event_date))
                                                Active
                                            @else
                                                Complete
                                            @endif
                                        @else
                                            Cancelled
                                        @endif
                                    </td>
                                    <td>
                                        @if(($cancelled_event->status == 1) && ((\Carbon\Carbon::now()->toDateString()) >= ($cancelled_event->event_date))) 
                                            <a href="javascript:void(0)" >
                                            <button id="{{$cancelled_event->id}}" class="btn btn-success" disabled><i class="fa fa-fw fa-edit"></i>Edit</button>
                                            </a> 
                                        @else
                                            <a href="{{ route('admin.showEditEvent', ['slug' => $cancelled_event->slug]) }}" >
                                                <button id="{{$cancelled_event->id}}" class="btn btn-success"><i class="fa fa-fw fa-edit" ></i>Edit</button>
                                            </a>
                                        @endif
                                    <button type="button" id="{{$cancelled_event->id}}" class="btn btn-danger rem_button" data-toggle="modal" data-target="#remove_event">
                                      <i class="fa fa-fw fa-times-circle"></i>Remove
                                    </button>
                                    </td>
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
    </section><!-- /.content -->
    <div class="modal" id="remove_event" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <p>Are you sure, You want to delete this Event?</p>
                    </div>
                    <div class="modal-footer">
                        <button id="" onclick="removeEvent(this.id)" class="btn btn-primary confirm_button" data-dismiss="modal">OK</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
</aside>
@endsection

@section('customScripts')
<script src="{{ asset('admin/js/message.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.rem_button').click(function(){
            var eventid = $(this).attr('id');
            $('.confirm_button').attr('id', eventid);
        });
    });
    function removeEvent(id) {
        $(`#${id}`).prop('disabled', true);
        $.ajax({
           headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           url: "{{ route('admin.destroyEvent') }}",
            type: "post",
           dataType: "JSON",
            data: { 'id': id },
            success: function(res)
            {
                $('#suc_show').show();
                $('#res_mess').html(res.message);
                $(`#row_${id}`).remove();

                setTimeout(function() {
                    $('#suc_show').fadeOut('fast');
                }, 2000);
            },
            error: function(err) {
                $('#err_show').show();
                $('#err_mess').html(JSON.parse(err.responseText).message);
                $(`#${id}`).prop('disabled', false);

                setTimeout(function() {
                    $('#err_show').fadeOut('fast');
                }, 2000);
            }
        });
    }   
</script>
@endsection