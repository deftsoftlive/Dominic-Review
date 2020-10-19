@php
    $user = DB::table('users')->where('role_id',3)->where('id',Auth::user()->id)->first();
    $link_req_noti = DB::table('parent_coach_reqs')->where('coach_id',Auth::user()->id)->where('status',0)->where('dismiss_by_coach',NULL)->count();
@endphp

@if($user->role_id == '3')

@php 
    $notifications = DB::table('notifications')->orderBy('created_at','desc')->get();  
    $children = DB::table('users')->where('parent_id',Auth::user()->id)->get();
    $child_id = [];

    $count = 0;
@endphp

@foreach ($notifications as $notification)

	@php 
	    $notification_arr = json_decode($notification->data); 
	@endphp

	@if($notification_arr->send_to == Auth::user()->id)
		@php $count++; @endphp
	@endif

	@endforeach

@endif

@php $noti_count = $link_req_noti + $count; @endphp
<li><a href="{{ route('coach_profile') }}" class="{{ \Request::route()->getName() === 'coach_profile' ? 'active' : '' }}">My Profile</a></li>

<li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle {{ \Request::route()->getName() === 'coach_report' ? 'active' : '' || \Request::route()->getName() === 'competition_list' ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reports</a>
 	<div class="dropdown-menu" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="{{route('coach_report')}}">Report</a>
      <a class="dropdown-item" href="{{route('competition_list')}}">Matches</a>
      <a class="dropdown-item" href="{{route('goal_list')}}">Goals</a>
    </div>
</li>

@if(!empty($user))
@if($user->enable_inovice == 1)
    <li><a href="{{ route('upload_invoice') }}" class="{{ \Request::route()->getName() === 'upload_invoice' ? 'active' : '' }}">Invoices</a></li>
@endif
@endif

<li><a href="{{ route('coach_player') }}" class="{{ \Request::route()->getName() === 'coach_player' ? 'active' : '' }}">My Players</a></li>

<li><a href="{{ route('my-bookings') }}" class="{{ \Request::route()->getName() === 'my-bookings' ? 'active' : '' }}">My Bookings</a></li>

<li><a href="{{ route('request_by_parent') }}" class="{{ \Request::route()->getName() === 'request_by_parent' ? 'active' : '' }}">Notifications <span class="notification-icon">({{$noti_count}})</span></a></li>
<li><a href="{{ route('add_money_to_wallet') }}" class="{{ \Request::route()->getName() === 'add_money_to_wallet' ? 'active' : '' }}">Wallet </a></li>

<li><a href="{{ route('account_settings') }}" class="{{ \Request::route()->getName() === 'account_settings' ? 'active' : '' }}">Settings</a></li>

<li><a href="{{ route('logout') }}" class="{{ \Request::route()->getName() === 'logout' ? 'active' : '' }}">Logout</a></li>