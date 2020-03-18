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
                    <span class="b-title">DRH User</span>
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

                

                <li class="nav-item pcoded-menu-caption">
                    <label>User Events</label>
                </li>

                <li class="nav-item {{ ActiveMenu(['user_events', 'user_show_create_event', 'user_show_edit_event', 'user_show_detail_event'], 'active') }}">
                    <a href="{{ route('user_events') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-calendar"></i></span><span class="pcoded-mtext">My Events</span></a>
                </li> 

                <li class="nav-item">
                    <a href="{{url(route('deal_discount_chats'))}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-inbox"></i></span><span class="pcoded-mtext">My Inbox</span> <span class="msg-count">{{Auth::user()->newMessages->count()}}</span></a>
                </li> 

                <li class="nav-item {{ ActiveMenu(['user_show_favourite_vendors'], 'active') }}">
                    <a href="{{ route('user_show_favourite_vendors') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-inbox"></i></span><span class="pcoded-mtext">My Favourite Vendors</span></a>
                </li> 


               <!--  <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu <?= ActiveMenu(['list_category', 'category_variations', 'create_category','edit_category'],'pcoded-trigger') ?>" >
                <a href="javascript:" class="nav-link "><span class="pcoded-micon">
                    <i class="feather icon-box"></i></span><span class="pcoded-mtext">Category Management</span></a>
                <ul class="pcoded-submenu" style="display: <?= ActiveMenu(['list_category', 'category_variations', 'create_category','edit_category'],'block') ?>;">
                    <li class="<?= ActiveMenu(['list_category', 'category_variations', 'create_category','edit_category'],'active') ?>"><a href="{{ route('list_category') }}" class="">Categories</a></li>
                </ul>
                </li>
                -->

                

                </ul>
            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->