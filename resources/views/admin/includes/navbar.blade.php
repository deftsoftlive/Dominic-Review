    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar d-print-none {{ \Request::route()->getName() === 'camp_reg_temp' ? 'navbar-collapsed' : '' }}">
        <div class="navbar-wrapper">
            <div class="navbar-brand header-logo">
                <a href="{{url(route('admin_dashboard'))}}" class="b-brand">
                    <div class="b-bg">
                        <img src="{{URL::asset('/images/DRH-SPORT1.png')}}">
                    </div>
                    <span class="b-title">DRH Admin</span>
                </a>
                <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
            </div>
            <div class="navbar-content scroll-div">
                <ul class="nav pcoded-inner-navbar">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Dashboard</label>
                    </li>
                    <li class="nav-item {{ \Request::route()->getName() === 'admin_dashboard'
                 ? 'nav-item active' : 'nav-item' }}">
                        <a href="{{url(route('admin_dashboard'))}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>


 
 @if(Session::has('currentLink') && Session::get('currentLink') == 'e-shop')          
     <!-- @include('admin.includes.e-shop') -->
 @else
     @include('admin.includes.eventLink')
 @endif




              




               <!--  <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu <?= ActiveMenu(['admin_settings'],'pcoded-trigger') ?>" >
                <a href="javascript:" class="nav-link "><span class="pcoded-micon">
                    <i class="feather icon-box"></i></span><span class="pcoded-mtext">Settings</span></a>
                <ul class="pcoded-submenu" style="display: <?= ActiveMenu(['admin_settings'],'block') ?>;">
                    <li class="<?= ActiveMenu(['admin_settings'],'active') ?>"><a href="{{ route('admin_settings') }}" class="">Profile</a></li>
                    <li class="<?= ActiveMenu(['admin_logout'],'active') ?>"><a href="{{ route('admin_logout') }}" class="">Logout</a></li>
                </ul>
                </li> -->

                </ul>
            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end