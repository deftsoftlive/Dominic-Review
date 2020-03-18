<!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse1" href="javascript:"><span></span></a>
            <a href="/" target="_blank" class="b-brand">
                   <div class="b-bg">
                       <img src="/frontend/images/logo.svg">
                   </div>
                   <span class="b-title">DRH User</span>
               </a>
        </div>
        <a class="mobile-menu" id="mobile-header" href="javascript:">
            <i class="feather icon-more-horizontal"></i>
        </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li><a href="javascript:" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a></li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li>
                   <a class="header-filter-icons" href="{{url(route('my_cart'))}}"><span class="header-filter-icons"><i class="icon feather icon-shopping-cart"></i><em class="notification-count">{{ Auth::User()->CartItems->count() }}</em></span></a>
                </li>
                <li>
                   <a class="header-filter-icons" href="{{url(route('my_wishlist'))}}"><span class="header-filter-icons"><i class="icon feather icon-list"></i> <em class="notification-count">{{ Auth::User()->MyWishlist->count() }}</em> </span></a>
                </li>                
                <li>
                    <div class="dropdown drp-user">
                        <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="header-filter-icons"><i class="icon feather icon-settings"></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <div class="pro-head">
                                <img src="{{ userProfileImage(Auth::user()->id) }}" class="img-radius" alt="User-Profile-Image">
                                <span>{{ Auth::User()->name }}</span>
                                <a href="{{ route('logout') }}" class="dud-logout" title="Logout">
                                    <i class="feather icon-log-out"></i>
                                </a>
                            </div>
                            <ul class="pro-body">
                                <li><a href="{{ route('user_profile') }}" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <!-- [ Header ] end --> 