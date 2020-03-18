@extends('layouts.admin')
@section('content')
<div class="preloader">
                    <img src="{{asset('/admin/img/wait.gif')}}"/>
                </div>
<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Users
            <small>Listing</small>
        </h1>
    </section>
    
    @include('partials/removeMessage')
    @include('partials/message')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12"> 
                @if(($venue->event_date) >= (Carbon\Carbon::now()->toDateString())) 
                <div class="button-wrap not_printable">                         
                <a href="{{Request::url()}}"><button class="btn btn-primary refresh">Refresh</button></a>  
                <a href="{{route('admin.collectBooking',['slug' => $venue->slug])}}"><button class="btn btn-primary">Add Booking</button></a> 
                </div>             
                @endif
                <div class="box">
                    <div class="box-header not_printable">
                        <h3 class="box-title ">Users Participating in this Event</h3><button id="" onClick="window.print()" class="btn btn-primary data-btn not_printable">Print Bookings</button>                                    
                    </div><!-- /.box-header -->
                    <div class="event_det_information">
                        {{$venue->name}}: {{$venue->venue_name}}, {{$venue->address}}, {{$venue->postcode}} : {{\Carbon\Carbon::parse($venue->event_date)->format('dS F Y')}} - {{\Carbon\Carbon::parse($venue->event_time)->format('H:i')}}
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped">
                                <!-- <table id="example1" class="table table-bordered table-striped"> -->
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Nickname</th>
                                    <th>Gender</th>
                                    <th>Contact Number</th>
                                    <th>Interesting Fact</th>
                                    <th class="not_printable">Manage Booking</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td> {{$user->fname}} {{$user->lname}}</td>
                                    <td> {{$user->nick_name}} </td>
                                    <td> {{$user->gender}} </td>
                                    <td> {{$user->contact_no}} </td>
                                    <td> {{$user->interesting_facts}} </td>
                                    <td class="not_printable">@if($user->status == '0')<button id="{{$user->booking_id}}" onclick="activateBooking(this.id)" class="btn btn-success">Activate</button>
                                        @else
                                        <button id="{{$user->booking_id}}" onclick="cancelBooking(this.id)" class="btn btn-danger">Cancel</button>
                                        @endif</td>
                                </tr>
                                 @endforeach
                            </tbody>
                        </table>
                        <div class="facility--pagination"> {{$users->links() }}</div>
                        @if (count ($users) == 0)
                            <div class="facilities-nodata-text">
                               <p > No One participated in this event till now. </p>
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
@section('customScripts')
<script src="{{ asset('admin/js/message.js') }}" type="text/javascript"></script>
<script type="text/javascript">
        
    function cancelBooking(id) {
        $('.preloader').css('display','block');
        $(`#${id}`).prop('disabled', true);
        $.ajax({
           headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           url: "{{ route('admin.cancelBooking') }}",
            type: "post",
           dataType: "JSON",
            data: { 'id': id },
            success: function(res)
            {
                $('#suc_show').show();
                $('.preloader').css('display','none');
                $('#res_mess').html(res.message);
                $(`#${id}`).removeClass('btn-danger');
                $(`#${id}`).removeAttr('onclick');
                $(`#${id}`).attr("onclick", "activateBooking("+ id +")");
                $(`#${id}`).text("Activate");
                $(`#${id}`).removeAttr("disabled");
                $(`#${id}`).addClass('btn-success');
                setTimeout(function() {
                    $('#suc_show').fadeOut('fast');
                }, 2000);
            },
            error: function(err) {
                $('#err_show').show();
                $('.preloader').css('display','none');
                $('#err_mess').html(JSON.parse(err.responseText).message);
                $(`#${id}`).prop('disabled', false);

                setTimeout(function() {
                    $('#err_show').fadeOut('fast');
                }, 2000);
            }
        });
    }   
    function activateBooking(id) {
        $('.preloader').css('display','block');
        $(`#${id}`).prop('disabled', true);
        $.ajax({
           headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           url: "{{ route('admin.activateBooking') }}",
            type: "post",
           dataType: "JSON",
            data: { 'id': id },
            success: function(res)
            {
                $('#suc_show').show();
                $('.preloader').css('display','none');
                $('#res_mess').html(res.message);
                $(`#${id}`).removeClass('btn-sucess');
                $(`#${id}`).removeAttr('onclick');
                $(`#${id}`).attr("onclick", "cancelBooking("+ id +")");
                $(`#${id}`).text("Cancel");
                $(`#${id}`).removeAttr("disabled");
                $(`#${id}`).addClass('btn-danger');

                setTimeout(function() {
                    $('#suc_show').fadeOut('fast');
                }, 2000);
            },
            error: function(err) {
                $('#err_show').show();
                $('.preloader').css('display','none');
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

