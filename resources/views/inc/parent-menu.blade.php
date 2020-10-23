<li><a href="{{ route('my-family') }}" class="{{ \Request::route()->getName() === 'my-family' ? 'active' : '' || \Request::route()->getName() === 'add-family-member' ? 'active' : '' || \Request::route()->getName() === 'edit-family-member' ? 'active' : '' }}">My family</a></li>

<!-- <li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle {{ \Request::route()->getName() === 'coach_report' ? 'active' : '' || \Request::route()->getName() === 'competition_list' ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reports</a>
 	<div class="dropdown-menu" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="{{route('coach_report')}}">Report</a>
      <a class="dropdown-item" href="{{route('competition_list')}}">Matches</a>
    </div>
</li>
 -->
<!-- <li><a href="{{ route('coach_report') }}" class="{{ \Request::route()->getName() === 'coach_report' ? 'active' : '' }}">Reports</a></li> -->

<li><a href="{{ route('my-bookings') }}" class="{{ \Request::route()->getName() === 'my-bookings' ? 'active' : '' }}">My Bookings</a></li>

<li><a href="{{ route('badges') }}" class="{{ \Request::route()->getName() === 'badges' ? 'active' : '' }}">DRH Tennis Pro</a></li>

<li><a href="{{ route('linked_coaches') }}" class="{{ \Request::route()->getName() === 'linked_coaches' ? 'active' : '' }}">My Coaches</a></li>


@if(Auth::user()->role_id == '2')

	@php 
	    $notifications = DB::table('notifications')->orderBy('created_at','desc')->get(); 	
	    $children = DB::table('users')->where('parent_id',Auth::user()->id)->get();
	    $child_id = [];

	    $i = 0;
	@endphp

	@foreach($children as $child)
        @php $child_id[] = $child->id; @endphp
    @endforeach


	@foreach ($notifications as $notification)

	@php 
	    $notification_arr = json_decode($notification->data);  
	    
	@endphp

	@if(!empty($notification_arr))

        @if(in_array($notification_arr->send_to,$child_id))

            @php $i++; @endphp

        @elseif($notification_arr->send_to == Auth::user()->id)

            @php $i++; @endphp

        @endif
        
    @endif

	@endforeach

@endif

<li><a href="{{ route('notification_timeline') }}" class="{{ \Request::route()->getName() === 'notification_timeline' ? 'active' : '' }}">Notifications ({{isset($i) ? $i : '0'}}) <span class="notification-icon"></span></a></li>

<!-- <li><a href="{{ route('parent_notifications') }}" class="{{ \Request::route()->getName() === 'parent_notifications' ? 'active' : '' }}">Notifications <span class="notification-icon"></span></a></li> -->

<li><a href="{{ route('add_money_to_wallet') }}" class="{{ \Request::route()->getName() === 'add_money_to_wallet' ? 'active' : '' }}">Wallet </a></li>

<li><a href="{{ route('account_settings') }}" class="{{ \Request::route()->getName() === 'account_settings' ? 'active' : '' }}">Settings</a></li>

<li><a href="{{ route('logout') }}" class="{{ \Request::route()->getName() === 'logout' ? 'active' : '' }}">Logout</a></li>