@if(\Auth::user()->role_id == '2')
        <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar">
        <div class="navbar-wrapper">
            <div class="navbar-brand header-logo">
                <a href="/" target="_blank" class="b-brand">
                    <div class="b-bg">
                        <img src="{{URL::asset('/images/fav-icon.png')}}">
                    </div>
                    <span class="b-title">DRH Parent</span>
                </a>
        <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
            </div>
            <div class="navbar-content scroll-div">
                <ul class="nav pcoded-inner-navbar">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Dashboard</label>
                    </li>
                    <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item {{ ActiveMenu(['user_dashboard'], 'active') }}">
                        <a href="{{url(route('user_dashboard'))}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>

                

                <!-- <li class="nav-item pcoded-menu-caption">
                    <label>User Events</label>
                </li>

                <li class="nav-item {{ ActiveMenu(['user_events', 'user_show_create_event', 'user_show_edit_event', 'user_show_detail_event'], 'active') }}">
                    <a href="{{ route('user_events') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-calendar"></i></span><span class="pcoded-mtext">My Events</span></a>
                </li>              

                <li class="nav-item {{ ActiveMenu(['user_orders'], 'active') }}">
                    <a href="{{ route('user_orders') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-calendar"></i></span><span class="pcoded-mtext">My Orders</span></a>
                </li> 

                <li class="nav-item">
                    <a href="{{url(route('deal_discount_chats'))}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-inbox"></i></span><span class="pcoded-mtext">My Inbox</span> <span class="msg-count">{{Auth::user()->newMessages->count()}}</span></a>
                </li> 

                <li class="nav-item {{ ActiveMenu(['user_show_favourite_vendors'], 'active') }}">
                    <a href="{{ route('user_show_favourite_vendors') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-inbox"></i></span><span class="pcoded-mtext">My Favourite Vendors</span></a>
                </li> 

                <li class="nav-item {{ ActiveMenu(['user.inviting.vendors'], 'active') }}">
                    <a href="{{ route('user.inviting.vendors') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-inbox"></i></span><span class="pcoded-mtext">Invite Vendors</span></a>
                </li>
                
                <li class="nav-item {{ ActiveMenu(['user.inviting.users'], 'active') }}">
                    <a href="{{ route('user.inviting.users') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-inbox"></i></span><span class="pcoded-mtext">Invite Users</span></a>
                </li> -->
                

                @if(\Auth::user()->email_verified_at == '')

                @else

                <li class="nav-item pcoded-menu-caption">
                    <label>E-Shop</label>
                </li>

                  <li class="nav-item {{ ActiveMenu(['users.shop.orders'], 'active') }}">
                    <a href="{{ route('users.shop.orders') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-inbox"></i></span><span class="pcoded-mtext">Orders</span></a>
                </li>
                @endif

                </ul>
            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->
@elseif(\Auth::user()->role_id == '3')
            <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar">
        <div class="navbar-wrapper">
            <div class="navbar-brand header-logo">
                <a href="/" target="_blank" class="b-brand">
                    <div class="b-bg">
                        <img src="{{URL::asset('/images/fav-icon.png')}}">
                    </div>
                    <span class="b-title">DRH Coach</span>
                </a>
        <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
            </div>
            <div class="navbar-content scroll-div">
                <ul class="nav pcoded-inner-navbar">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Dashboard</label>
                    </li>
                    <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item {{ ActiveMenu(['user_dashboard'], 'active') }}">
                        <a href="{{url(route('user_dashboard'))}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>

                

                <!-- <li class="nav-item pcoded-menu-caption">
                    <label>User Events</label>
                </li>

                <li class="nav-item {{ ActiveMenu(['user_events', 'user_show_create_event', 'user_show_edit_event', 'user_show_detail_event'], 'active') }}">
                    <a href="{{ route('user_events') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-calendar"></i></span><span class="pcoded-mtext">My Events</span></a>
                </li>              

                <li class="nav-item {{ ActiveMenu(['user_orders'], 'active') }}">
                    <a href="{{ route('user_orders') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-calendar"></i></span><span class="pcoded-mtext">My Orders</span></a>
                </li> 

                <li class="nav-item">
                    <a href="{{url(route('deal_discount_chats'))}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-inbox"></i></span><span class="pcoded-mtext">My Inbox</span> <span class="msg-count">{{Auth::user()->newMessages->count()}}</span></a>
                </li> 

                <li class="nav-item {{ ActiveMenu(['user_show_favourite_vendors'], 'active') }}">
                    <a href="{{ route('user_show_favourite_vendors') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-inbox"></i></span><span class="pcoded-mtext">My Favourite Vendors</span></a>
                </li> 

                <li class="nav-item {{ ActiveMenu(['user.inviting.vendors'], 'active') }}">
                    <a href="{{ route('user.inviting.vendors') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-inbox"></i></span><span class="pcoded-mtext">Invite Vendors</span></a>
                </li>
                
                <li class="nav-item {{ ActiveMenu(['user.inviting.users'], 'active') }}">
                    <a href="{{ route('user.inviting.users') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-inbox"></i></span><span class="pcoded-mtext">Invite Users</span></a>
                </li> -->

                @if(\Auth::user()->role_id == '2')

                @else

                 <li class="nav-item pcoded-menu-caption">
                    <label>Profile Management</label>
                </li>

              

                  <li class="nav-item {{ ActiveMenu(['coach.profile.listing'], 'active') }}">
                    <a href="{{ route('coach.profile.listing') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-inbox"></i></span><span class="pcoded-mtext">Profile Listing</span></a>
                </li>

                @endif

                </ul>
            </div>
        </div>
    </nav>
@endif