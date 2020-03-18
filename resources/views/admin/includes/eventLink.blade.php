<!--   <li class="nav-item pcoded-menu-caption">
                    <label>Event Management</label>
                </li> -->

                     <!--  <li class="nav-item {{ \Request::route()->getName() === 'admin.orders'
                                 ? 'nav-item active' : 'nav-item' }}">
                                        <a href="{{url(route('admin.orders'))}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Orders Management</span></a>
                     </li> -->

                <!-- <li class="nav-item pcoded-hasmenu <?= ActiveMenu(['list_category', 'category_variations', 'create_category','edit_category'],'pcoded-trigger') ?>" >
                <a href="javascript:" class="nav-link "><span class="pcoded-micon">
                    <i class="feather icon-box"></i></span><span class="pcoded-mtext">Category Management</span></a>
                        <ul class="pcoded-submenu" style="display: <?= ActiveMenu(['list_category', 'category_variations', 'create_category','edit_category'],'block') ?>;">
                            <li class="<?= ActiveMenu(['list_category', 'category_variations', 'create_category','edit_category'],'active') ?>"><a href="{{ route('list_category') }}" class="">Categories</a></li>
                        
                        </ul>
                </li> -->



                <!-- ****************************
                |
                |       USER MANAGEMENT
                |
                |********************************* -->
                <li class="nav-item pcoded-hasmenu <?= ActiveMenu(['list_users', 'parent_users', 'coach_users'],'pcoded-trigger') ?>" >
                <a href="javascript:" class="nav-link "><span class="pcoded-micon">
                    <i class="feather icon-box"></i></span><span class="pcoded-mtext">User Management</span></a>
                <ul class="pcoded-submenu" style="display: <?= ActiveMenu(['list_users', 'parent_users', 'coach_users'], 'block') ?>;">
                    <li class="<?= ActiveMenu(['list_users'],'active') ?>">
                        <a href="{{ route('list_users') }}" class="">Users</a>
                    </li>
                    <!-- <li class="<?= ActiveMenu(['parent_users'],'active') ?>">
                        <a href="{{ route('parent_users') }}" class="">Parents</a>
                    </li>
                    <li class="<?= ActiveMenu(['coach_users'],'active') ?>">
                        <a href="{{ route('coach_users') }}" class="">Coaches</a>
                    </li> -->
                </ul>
                </li>


                <!-- ****************************
                |
                |       TESTIMONIALS
                |
                |********************************* -->
                <li  class="nav-item pcoded-hasmenu <?= ActiveMenu(['admin.testimonial.list', 'admin.testimonial.showCreate', 'admin.testimonial.showEdit'],'pcoded-trigger') ?>" >
                     <a href="javascript:" class="nav-link "><span class="pcoded-micon">
                           <i class="feather icon-box"></i></span><span class="pcoded-mtext">Testimonial Management</span>
                     </a>
                <ul class="pcoded-submenu" style="display: <?= ActiveMenu(['admin.testimonial.list', 'admin.testimonial.showCreate', 'admin.testimonial.showEdit'], 'block') ?>;">
                    <li class="<?= ActiveMenu(['admin.testimonial.list', 'admin.testimonial.showCreate', 'admin.testimonial.showEdit'],'active') ?>"><a href="{{ route('admin.testimonial.list') }}" class="">Testimonials</a></li>
                </ul>
                </li>


                <!-- ****************************
                |
                |       CATEGORIES
                |
                |********************************* -->
                <li class="nav-item {{ \Request::route()->getName() === 'admin.products.category' ? 'nav-item active' : 'nav-item' }}">
                    <a href="{{url(route('admin.products.category'))}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Categories</span></a>
                </li>


                <!-- ****************************
                |
                |       COURSES MANAGEMENT
                |
                |********************************* -->
                <li class="nav-item pcoded-hasmenu <?= ActiveMenu(['admin.course.list'], 'pcoded-trigger') ?> {{ request()->is('admin/settings/general/edit/early-bird') ? 'active' : '' || \Request::route()->getName() === 'admin.course.list' ? 'active' : '' }} {{ request()->is('admin/course/create') ? 'active' : '' || request()->is('admin/course/*') ? 'active' : '' }} " >

                    <a href="javascript:" class="nav-link "><span class="pcoded-micon">
                    <i class="feather icon-box"></i></span><span class="pcoded-mtext">Courses Management</span></a>
                    <ul class="pcoded-submenu" style="display: <?= request()->is('admin/settings/general/edit/early-bird') ? 'block' : '' || request()->is('admin/course') ? 'block' : '' || request()->is('admin/course/create') ? 'block' : '' || request()->is('admin/course/*') ? 'block' : '' ?>;">

                        <li class="{{ \Request::route()->getName() === 'admin.course.list' ? 'active' : '' || request()->is('admin/course/create') ? 'active' : '' || request()->is('admin/course/*') ? 'active' : '' }}"><a href="{{url(route('admin.course.list'))}}" class="">Courses</a></li>

                        <li class="{{ request()->is('admin/settings/general/edit/early-bird') ? 'active' : ''}} "><a href="{{url('admin/settings/general/edit/early-bird')}}" class="">Early Bird Management</a></li>
                    </ul>
                </li>


                <!-- ****************************
                |
                |       FAQ MANGEMENT 
                |
                |********************************* -->
                <li class="nav-item pcoded-hasmenu <?= ActiveMenu(['admin.faqs.lists', 'admin.faqs.showCreate', 'admin.faqs.edit'], 'pcoded-trigger') ?>" >
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon">
                    <i class="feather icon-box"></i></span><span class="pcoded-mtext">Faqs Management</span></a>
                    <ul class="pcoded-submenu" style="display: <?= ActiveMenu(['admin.faqs.lists', 'admin.faqs.showCreate', 'admin.faqs.edit'], 'block') ?>;">
                        <li class="{{ ((\Request::route()->getName() === 'admin.faqs.lists' || \Request::route()->getName() === 'admin.faqs.showCreate' || \Request::route()->getName() === 'admin.faqs.edit') && Request::route('type') === 'user' ) ? 'active' : '' }}"><a href="{{ route('admin.faqs.lists', ['type' => 'user']) }}" class="">Faqs</a></li>
                    </ul>
                </li>

                <!-- ****************************
                |
                |       CMS PAGES 
                |
                |********************************* -->
                <li class="nav-item <?= ActiveMenu(['admin.cms-pages.list', 'admin.cms-pages.showCreate', 'admin.cms-pages.edit'],'active') ?>">
                    <a href="{{url(route('admin.cms-pages.list'))}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Cms Pages</span></a>
                </li>

                <!-- ****************************
                |
                |       PAGE SETTINGS 
                |
                |********************************* -->
                <li class="nav-item pcoded-hasmenu {{ request()->is('admin/settings/general') ? 'active' : '' || request()->is('admin/settings/general/edit/general-setting') ? 'active' : '' || request()->is('admin/settings/general/edit/homepage') ? 'active' : '' || request()->is('admin/settings/general/edit/course-listing') ? 'active' : '' || request()->is('admin/settings/general/edit/contact-us') ? 'active' : ''}}" >
                <a href="javascript:" class="nav-link "><span class="pcoded-micon">
                    <i class="feather icon-box"></i></span><span class="pcoded-mtext">Settings</span></a>

                <ul class="pcoded-submenu" style="display: <?= request()->is('admin/settings/general') ? 'block' : '' || request()->is('admin/settings/general/edit/homepage') ? 'block' : '' || request()->is('admin/settings/general/edit/course-listing') ? 'block' : '' || request()->is('admin/settings/general/edit/contact-us') ? 'block' : '' || request()->is('admin/settings/general/edit/general-setting') ? 'block' : ''  ?>;">

                    <li class="{{ request()->is('admin/settings/general') ? 'active' : '' || request()->is('admin/settings/general/edit/homepage') ? 'active' : '' || request()->is('admin/settings/general/edit/course-listing') ? 'active' : '' || request()->is('admin/settings/general/edit/contact-us') ? 'active' : ''}}"><a href="{{ route('list_general_settings') }}" class="">Page Settings</a></li>

                    <li class="{{ request()->is('admin/settings/general/edit/general-setting') ? 'active' : ''}}"><a href="{{url('admin/settings/general/edit/general-setting')}}" class="">General Settings</a></li>

                    <!-- <li class="<?= ActiveMenu(['list_payment_settings'],'active') ?>"><a href="{{ route('list_payment_settings') }}" class="">Payment Settings</a></li>
                    <li class="<?= ActiveMenu(['global_settings'],'active') ?>">
                        <a href="{{ route('global_settings') }}" class="">Global Settings</a>
                    </li> -->
                </ul>
                </li> 

                

