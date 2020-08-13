@php
    $user = DB::table('users')->where('role_id',3)->where('id',Auth::user()->id)->first();
    $notification = DB::table('parent_coach_reqs')->where('coach_id',Auth::user()->id)->where('status',NULL)->count();
@endphp
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

<li><a href="{{ route('request_by_parent') }}" class="{{ \Request::route()->getName() === 'request_by_parent' ? 'active' : '' }}">Notifications <span class="notification-icon">({{$notification}})</span></a></li>
<li><a href="{{ route('add_money_to_wallet') }}" class="{{ \Request::route()->getName() === 'add_money_to_wallet' ? 'active' : '' }}">Wallet </a></li>

<li><a href="{{ route('account_settings') }}" class="{{ \Request::route()->getName() === 'account_settings' ? 'active' : '' }}">Settings</a></li>

<li><a href="{{ route('logout') }}" class="{{ \Request::route()->getName() === 'logout' ? 'active' : '' }}">Logout</a></li>