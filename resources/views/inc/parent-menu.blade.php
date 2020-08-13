<li><a href="{{ route('my-family') }}" class="{{ \Request::route()->getName() === 'my-family' ? 'active' : '' || \Request::route()->getName() === 'add-family-member' ? 'active' : '' || \Request::route()->getName() === 'edit-family-member' ? 'active' : '' }}">My family</a></li>

<li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle {{ \Request::route()->getName() === 'coach_report' ? 'active' : '' || \Request::route()->getName() === 'competition_list' ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reports</a>
 	<div class="dropdown-menu" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="{{route('coach_report')}}">Report</a>
      <a class="dropdown-item" href="{{route('competition_list')}}">Matches</a>
    </div>
</li>

<li><a href="{{ route('my-bookings') }}" class="{{ \Request::route()->getName() === 'my-bookings' ? 'active' : '' }}">My Bookings</a></li>

<li><a href="{{ route('badges') }}" class="{{ \Request::route()->getName() === 'badges' ? 'active' : '' }}">DRH Tennis Pro</a></li>

<li><a href="{{ route('linked_coaches') }}" class="{{ \Request::route()->getName() === 'linked_coaches' ? 'active' : '' }}">My Coaches</a></li>

<li><a href="{{ route('parent_notifications') }}" class="{{ \Request::route()->getName() === 'parent_notifications' ? 'active' : '' }}">Notifications <span class="notification-icon"></span></a></li>

<li><a href="{{ route('add_money_to_wallet') }}" class="{{ \Request::route()->getName() === 'add_money_to_wallet' ? 'active' : '' }}">Wallet </a></li>

<li><a href="" class="">Settings</a></li>

<li><a href="{{ route('logout') }}" class="{{ \Request::route()->getName() === 'logout' ? 'active' : '' }}">Logout</a></li>