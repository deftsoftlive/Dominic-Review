@php
    $user = DB::table('users')->where('role_id',3)->where('id',Auth::user()->id)->first();
    $notification = DB::table('parent_coach_reqs')->where('coach_id',Auth::user()->id)->where('status',NULL)->count();
@endphp
<li><a href="{{ route('coach_profile') }}" class="{{ \Request::route()->getName() === 'coach_profile' ? 'active' : '' }}">My Profile</a></li>
<li><a href="{{ route('coach_report') }}" class="{{ \Request::route()->getName() === 'coach_report' ? 'active' : '' }}">Reports</a></li>
<!-- <li><a href="{{ route('qualifications') }}" class="{{ \Request::route()->getName() === 'qualifications' ? 'active' : '' }}">Qualifications</a></li> -->

@if(!empty($user))
@if($user->enable_inovice == 1)
    <li><a href="{{ route('upload_invoice') }}" class="{{ \Request::route()->getName() === 'upload_invoice' ? 'active' : '' || \Request::route()->getName() === 'add_upload_invoice' ? 'active' : '' }}">Invoices</a></li>
@endif
@endif

<li><a href="{{ route('coach_player') }}" class="{{ \Request::route()->getName() === 'coach_player' ? 'active' : '' }}">My Players</a></li>
<li><a href="{{ route('my-bookings') }}" class="{{ \Request::route()->getName() === 'my-bookings' ? 'active' : '' }}">My Bookings</a></li>
<li><a href="{{ route('request_by_parent') }}" class="{{ \Request::route()->getName() === 'request_by_parent' ? 'active' : '' }}">Notifications <span class="notification-icon">({{$notification}})</span></a></li>
<li><a href="{{ route('add_money_to_wallet') }}" class="{{ \Request::route()->getName() === 'add_money_to_wallet' ? 'active' : '' }}">Wallet </a></li>
<li><a href="{{ route('account_settings') }}" class="{{ \Request::route()->getName() === 'account_settings' ? 'active' : '' }}">Settings</a></li>
<li><a href="{{ route('logout') }}" class="{{ \Request::route()->getName() === 'logout' ? 'active' : '' }}">Logout</a></li>