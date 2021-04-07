@extends('layouts.admin')
@section('content')

@php 
	$notifications = DB::table('notifications')->orderBy('created_at','desc')->get();
@endphp

@include('admin.error_message')
@foreach ($notifications as $notification)

@php 
	$notification_arr = json_decode($notification->data); 
@endphp
	@if( !empty( $notification_arr ) )
	    @if($notification_arr->send_to == 1)

		<div style="display: flex; justify-content: space-between; align-items: center;" class="alert_msg alert alert-primary admin_notify">


	    	<p><b style="color:#04a9f5;">@php echo date('d-m-Y',strtotime($notification->created_at)); @endphp</b> |  {{ $notification_arr->data }} </p>
	    	<!-- <a style="" href="{{url('/admin/users')}}" class="btn btn-primary">View All Users</a> -->
	    	<a style="" href="{{url('/admin/mark_as_read')}}/{{$notification->id}}" class="btn btn-primary">Mark as Read</a>

	    </div>

	    @endif


    @endif


@endforeach

@endsection

@section('scripts')

@endsection
