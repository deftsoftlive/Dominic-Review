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

  @if(!empty($notification_arr))
	@if($notification_arr->send_to == Auth::user()->id)
		@php $count++; @endphp
	@endif
  @endif

	@endforeach

@endif

@php 
  $noti_count = $link_req_noti + $count; 
  $freeze_acc = DB::table('freeze_coach_accounts')->where('coach_id',Auth::user()->id)->first();
@endphp

@if(isset($freeze_acc) && $freeze_acc->profile == 0)
<li><a href="{{ route('coach_profile') }}" class="{{ \Request::route()->getName() === 'coach_profile' ? 'active' : '' }}">My Profile</a></li>
@endif

<li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle {{ \Request::route()->getName() === 'coach_report' ? 'active' : '' || \Request::route()->getName() === 'competition_list' ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reports</a>
 	<div class="dropdown-menu" aria-labelledby="navbarDropdown">

    @if(isset($freeze_acc) && $freeze_acc->reports == 0)
      <a class="dropdown-item" href="{{route('coach_report')}}">Report</a>
    @endif

    @if(isset($freeze_acc) && $freeze_acc->matches == 0)
      <a class="dropdown-item" href="{{route('competition_list')}}">Matches</a>
    @endif

    @if(isset($freeze_acc) && $freeze_acc->goals == 0)
      <a class="dropdown-item" href="{{route('goal_list')}}">Goals</a>
    @endif

    </div>
</li>

<!-- @if(!empty($user))
@if($user->enable_inovice == 1)
    <li><a href="{{ route('upload_invoice') }}" class="{{ \Request::route()->getName() === 'upload_invoice' ? 'active' : '' }}">Invoices</a></li>
@endif
@endif -->

@if(isset($freeze_acc) && $freeze_acc->invoices == 0)
  <li><a href="{{ route('upload_invoice') }}" class="{{ \Request::route()->getName() === 'upload_invoice' ? 'active' : '' }}">Invoices</a></li>
@endif

@if(isset($freeze_acc) && $freeze_acc->players == 0)
  <li><a href="{{ route('coach_player') }}" class="{{ \Request::route()->getName() === 'coach_player' ? 'active' : '' }}">My Players</a></li>
@endif

@if(isset($freeze_acc) && $freeze_acc->bookings == 0)
  <li><a href="{{ route('my-bookings') }}" class="{{ \Request::route()->getName() === 'my-bookings' ? 'active' : '' }}">My Bookings</a></li>
@endif

@if(isset($freeze_acc) && $freeze_acc->notifications == 0)
  <li><a href="{{ route('request_by_parent') }}" class="{{ \Request::route()->getName() === 'request_by_parent' ? 'active' : '' }}">Notifications <span class="notification-icon">({{isset($noti_count) ? $noti_count : ''}})</span></a></li>
@endif

@if(isset($freeze_acc) && $freeze_acc->wallet == 0)
  <li><a href="{{ route('add_money_to_wallet') }}" class="{{ \Request::route()->getName() === 'add_money_to_wallet' ? 'active' : '' }}">Wallet </a></li>
@endif

@if(isset($freeze_acc) && $freeze_acc->settings == 0)
  <li><a href="{{ route('account_settings') }}" class="{{ \Request::route()->getName() === 'account_settings' ? 'active' : '' }}">Settings</a></li>
@endif

<li><a href="{{ route('logout') }}" class="{{ \Request::route()->getName() === 'logout' ? 'active' : '' }}">Logout</a></li>