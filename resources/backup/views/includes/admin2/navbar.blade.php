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
                <a href="{{url(route('admin_dashboard'))}}" class="b-brand">
                    <div class="b-bg">
                        <img src="{{URL::asset('/images/fav-icon.png')}}">
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
                    <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item {{ \Request::route()->getName() === 'admin_dashboard'
                 ? 'nav-item active' : 'nav-item' }}">
                        <a href="{{url(route('admin_dashboard'))}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>

                    <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item {{ \Request::route()->getName() === 'admin.business.index'
                 ? 'nav-item active' : 'nav-item' }}">
                        <a href="{{url(route('admin.business.index'))}}" class="nav-link "><span class="pcoded-micon"><i class="fas fa-briefcase"></i></span><span class="pcoded-mtext">Businesses Listing</span></a>
                    </li>

                <li class="nav-item pcoded-menu-caption">
                    <label>Management</label>
                </li>

                <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu <?= ActiveMenu(['list_category', 'category_variations', 'create_category','edit_category'],'pcoded-trigger') ?>" >
                <a href="javascript:" class="nav-link "><span class="pcoded-micon">
                    <i class="feather icon-box"></i></span><span class="pcoded-mtext">Category Management</span></a>
                <ul class="pcoded-submenu" style="display: <?= ActiveMenu(['list_category', 'category_variations', 'create_category','edit_category'],'block') ?>;">
                    <li class="<?= ActiveMenu(['list_category', 'category_variations', 'create_category','edit_category'],'active') ?>"><a href="{{ route('list_category') }}" class="">Categories</a></li>
                </ul>
                </li>

                <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu <?= ActiveMenu(['list_events', 'create_event_type', 'edit_event'],'pcoded-trigger') ?>" >
                <a href="javascript:" class="nav-link "><span class="pcoded-micon">
                    <i class="feather icon-box"></i></span><span class="pcoded-mtext">Event/Celebration Types</span></a>
                <ul class="pcoded-submenu" style="display: <?= ActiveMenu(['list_events', 'create_event_type', 'edit_event'],'block') ?>;">
                    <li class="<?= ActiveMenu(['list_events', 'create_event_type', 'edit_event'],'active') ?>"><a href="{{ route('list_events') }}" class="">Event Types</a></li>
                </ul>
                </li>

                <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu <?= ActiveMenu(['list_amenities', 'list_games', 'create_amenities_type', 'edit_amenity'],'pcoded-trigger') ?>" >
                <a href="javascript:" class="nav-link "><span class="pcoded-micon">
                    <i class="feather icon-box"></i></span><span class="pcoded-mtext">Amenities/Games Types</span></a>
                <ul class="pcoded-submenu" style="display: <?= ActiveMenu(['list_amenities', 'list_games', 'create_amenities_type', 'edit_amenity'],'block') ?>;">
                    <li class="<?= ActiveMenu(['list_amenities'],'active') ?>"><a href="{{ route('list_amenities') }}" class="">Amenities</a></li>
                    <li class="<?= ActiveMenu(['list_games'],'active') ?>"><a href="{{ route('list_games') }}" class="">Games</a></li>
                </ul>
                </li>


<li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu <?= ActiveMenu(['list_seasons', 'create_seasons', 'edit_seasons'],'pcoded-trigger') ?>" >
                <a href="javascript:" class="nav-link "><span class="pcoded-micon">
                    <i class="feather icon-box"></i></span><span class="pcoded-mtext"> Manage Seasons</span></a>
                <ul class="pcoded-submenu" style="display: <?= ActiveMenu(['list_seasons', 'create_seasons', 'edit_seasons', 'create_seasons', 'edit_seasons'],'block') ?>;">
                    <li class="<?= ActiveMenu(['list_seasons', 'create_seasons', 'edit_seasons'],'active') ?>"><a href="{{ route('list_seasons') }}" class="">Seasons</a></li>
                </ul>
                </li>


                <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu <?= ActiveMenu(['list_users', 'list_vendors', 'admin_vendor_business'],'pcoded-trigger') ?>" >
                <a href="javascript:" class="nav-link "><span class="pcoded-micon">
                    <i class="feather icon-box"></i></span><span class="pcoded-mtext">User/Vendor Management</span></a>
                <ul class="pcoded-submenu" style="display: <?= ActiveMenu(['list_users', 'list_vendors', 'admin_vendor_business'], 'block') ?>;">
                    <li class="<?= ActiveMenu(['list_users'],'active') ?>"><a href="{{ route('list_users') }}" class="">User Management</a></li>
                    <li class="<?= ActiveMenu(['list_vendors', 'admin_vendor_business'],'active') ?>"><a href="{{ route('list_vendors') }}" class="">Vendor Management</a></li>
                </ul>
                </li>

                <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu <?= ActiveMenu(['admin.venues.list', 'admin.venues.showCreate', 'admin.venues.showEdit'],'pcoded-trigger') ?>" >
                <a href="javascript:" class="nav-link "><span class="pcoded-micon">
                    <i class="feather icon-box"></i></span><span class="pcoded-mtext">Venues Management</span></a>
                <ul class="pcoded-submenu" style="display: <?= ActiveMenu(['admin.venues.list', 'admin.venues.showCreate', 'admin.venues.showEdit'], 'block') ?>;">
                    <li class="<?= ActiveMenu(['admin.venues.list', 'admin.venues.showCreate', 'admin.venues.showEdit'],'active') ?>"><a href="{{ route('admin.venues.list') }}" class="">Venues Management</a></li>
                </ul>
                </li>

                <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu <?= ActiveMenu(['admin.styles.list', 'admin.styles.showCreate', 'admin.styles.showEdit'],'pcoded-trigger') ?>" >
                <a href="javascript:" class="nav-link "><span class="pcoded-micon">
                    <i class="feather icon-box"></i></span><span class="pcoded-mtext">Styles Management</span></a>
                <ul class="pcoded-submenu" style="display: <?= ActiveMenu(['admin.styles.list', 'admin.styles.showCreate', 'admin.styles.showEdit'], 'block') ?>;">
                    <li class="<?= ActiveMenu(['admin.styles.list', 'admin.styles.showCreate', 'admin.styles.showEdit'],'active') ?>"><a href="{{ route('admin.styles.list') }}" class="">Styles Management</a></li>
                </ul>
                </li>


             <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu <?= ActiveMenu(['list_general_settings', 'add_general_settings', 'list_payment_settings', 'global_settings'],'pcoded-trigger') ?>" >
                <a href="javascript:" class="nav-link "><span class="pcoded-micon">
                    <i class="feather icon-box"></i></span><span class="pcoded-mtext">Settings</span></a>
                <ul class="pcoded-submenu" style="display: <?= ActiveMenu(['list_general_settings', 'add_general_settings', 'list_payment_settings', 'global_settings'], 'block') ?>;">
                    <li class="<?= ActiveMenu(['list_general_settings', 'add_general_settings'],'active') ?>"><a href="{{ route('list_general_settings') }}" class="">Page Settings</a></li>
                    <li class="<?= ActiveMenu(['list_payment_settings'],'active') ?>"><a href="{{ route('list_payment_settings') }}" class="">Payment Settings</a></li>
                    <li class="<?= ActiveMenu(['global_settings'],'active') ?>"><a href="{{ route('global_settings') }}" class="">Global Settings</a></li>
                </ul>
                </li>

                 <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu <?= ActiveMenu(['admin.emails.index'],'pcoded-trigger') ?>" >
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon">
                        <i class="feather icon-box"></i></span><span class="pcoded-mtext">Email Management</span></a>
                    <ul class="pcoded-submenu" style="display: <?= ActiveMenu(['admin.emails.index'], 'block') ?>;">
                        <li class="<?= ActiveMenu(['admin.emails.index'],'active') ?>"><a href="{{ route('admin.emails.index') }}" class="">Business Emails</a></li>
                    </ul>
                </li>

                <li class="nav-item <?= ActiveMenu(['admin.cms-pages.list', 'admin.cms-pages.showCreate', 'admin.cms-pages.edit'],'active') ?>">
                    <a href="{{url(route('admin.cms-pages.list'))}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Cms Pages</span></a>
                </li>


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