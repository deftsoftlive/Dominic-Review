<!--   <li class="nav-item pcoded-menu-caption">
                    <label>Event Management</label>
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
                |       ORDER MANAGEMENT
                |
                |********************************* -->
                <li class="nav-item {{ \Request::route()->getName() === 'admin.orders' ? 'nav-item active' : 'nav-item' }}">
                <a href="{{url(route('admin.orders'))}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Orders Management</span></a>
                </li>


                <!-- ****************************
                |
                |       WALLET MANAGEMENT
                |
                |********************************* -->
                <li class="nav-item {{ \Request::route()->getName() === 'admin.wallet' ? 'nav-item active' : 'nav-item' }}">
                <a href="{{url(route('admin.wallet'))}}" class="nav-link "><span class="pcoded-micon"><i class="fas fa-envelope-open"></i></span><span class="pcoded-mtext">Wallet Management</span></a>
                </li>


                <!-- ****************************
                |
                |       REVENUE MANAGEMENT
                |
                |********************************* -->
                <li class="nav-item pcoded-hasmenu <?= ActiveMenu(['admin.revenue', 'admin.revenue.courses', 'admin.revenue.camps','admin.revenue.products'],'pcoded-trigger') ?>" >
                     <a href="javascript:" class="nav-link "><span class="pcoded-micon">
                           <i class="fas fa-adjust"></i></span><span class="pcoded-mtext">Revenue Management</span>
                     </a>
                <ul class="pcoded-submenu" style="display: <?= ActiveMenu(['admin.revenue', 'admin.revenue.courses', 'admin.revenue.camps','admin.revenue.products'], 'block') ?>;">
                    <li class="<?= ActiveMenu(['admin.revenue.courses'],'active') ?>"><a href="{{ route('admin.revenue.courses') }}" class="">Courses Revenue</a></li>
                    <li class="<?= ActiveMenu(['admin.revenue.camps'],'active') ?>"><a href="{{ route('admin.revenue.camps') }}" class="">Camps Revenue</a></li>
                    <li class="<?= ActiveMenu(['admin.revenue.products'],'active') ?>"><a href="{{ route('admin.revenue.products') }}" class="">Products Revenue</a></li>
                </ul>
                </li>


                <!-- ****************************
                |
                |       USER MANAGEMENT
                |
                |********************************* -->
                <li class="nav-item pcoded-hasmenu <?= ActiveMenu(['list_users', 'parent_users', 'coach_users','linked_coach_player','subscribed_users'],'pcoded-trigger') ?>" >
                <a href="javascript:" class="nav-link "><span class="pcoded-micon">
                    <i class="fas fa-users"></i></span><span class="pcoded-mtext">User Management</span></a>
                <ul class="pcoded-submenu" style="display: <?= ActiveMenu(['list_users', 'parent_users', 'coach_users','linked_coach_player','subscribed_users'], 'block') ?>;">
                    <li class="<?= ActiveMenu(['list_users'],'active') ?>">
                        <a href="{{ route('list_users') }}" class="">Users</a>
                    </li>
                    <li class="<?= ActiveMenu(['linked_coach_player'],'active') ?>">
                        <a href="{{ route('linked_coach_player') }}" class="">Linked Coaches</a>
                    </li>
                    <li class="<?= ActiveMenu(['subscribed_users'],'active') ?>">
                        <a href="{{ route('subscribed_users') }}" class="">Subscribed Users</a>
                    </li>
                </ul>
                </li>

                <!-- ****************************
                |
                |       TESTIMONIALS
                |
                |********************************* -->
                <li  class="nav-item pcoded-hasmenu <?= ActiveMenu(['admin.testimonial.list', 'admin.testimonial.showCreate', 'admin.testimonial.showEdit'],'pcoded-trigger') ?>" >
                     <a href="javascript:" class="nav-link "><span class="pcoded-micon">
                           <i class="fas fa-comments"></i></span><span class="pcoded-mtext">Testimonial Management</span>
                     </a>
                <ul class="pcoded-submenu" style="display: <?= ActiveMenu(['admin.testimonial.list', 'admin.testimonial.showCreate', 'admin.testimonial.showEdit'], 'block') ?>;">
                    <li class="<?= ActiveMenu(['admin.testimonial.list', 'admin.testimonial.showCreate', 'admin.testimonial.showEdit'],'active') ?>"><a href="{{ route('admin.testimonial.list') }}" class="">Testimonials</a></li>
                </ul>
                </li>


                <!-- ****************************
                |
                |       ACCORDIANS
                |
                |********************************* -->
                <li class="nav-item {{ \Request::route()->getName() === 'admin.accordian.list' ? 'nav-item active' : 'nav-item' }}">
                    <a href="{{url(route('admin.accordian.list'))}}" class="nav-link "><span class="pcoded-micon"><i class="fas fa-bars"></i></span><span class="pcoded-mtext">Accordians</span></a>
                </li>


                <!-- ****************************
                |
                |       ACTIVITIES
                |
                |********************************* -->
                <li class="nav-item {{ \Request::route()->getName() === 'child_activities' ? 'nav-item active' : 'nav-item' }}">
                    <a href="{{url(route('child_activities'))}}" class="nav-link "><span class="pcoded-micon"><i class="fas fa-circle"></i></span><span class="pcoded-mtext">Activities</span></a>
                </li>


                <!-- ****************************
                |
                |       CATEGORIES
                |
                |********************************* -->
                <li class="nav-item {{ \Request::route()->getName() === 'admin.products.category' ? 'nav-item active' : 'nav-item' }}">
                    <a href="{{url(route('admin.products.category'))}}" class="nav-link "><span class="pcoded-micon"><i class="fas fa-cog"></i></span><span class="pcoded-mtext">Categories</span></a>
                </li>


                <!-- ****************************
                |
                |       COURSES MANAGEMENT
                |
                |********************************* -->
                <li class="nav-item pcoded-hasmenu <?= ActiveMenu(['admin.course.list','admin.course.showCreate','admin.seasons.list','admin.seasons.showCreate'], 'pcoded-trigger') ?> {{ request()->is('admin/settings/general/edit/early-bird') ? 'active' : '' || \Request::route()->getName() === 'admin.course.list' ? 'active' : '' || \Request::route()->getName() === 'admin.seasons.list' ? 'active' : '' }} {{ request()->is('admin/course/create') ? 'active' : '' || request()->is('admin/course/*') ? 'active' : '' || request()->is('admin/seasons/create') ? 'active' : '' || request()->is('admin/seasons/*') ? 'active' : ''}} " >

                    <a href="javascript:" class="nav-link "><span class="pcoded-micon">
                    <i class="fas fa-cubes"></i></span><span class="pcoded-mtext">Courses Management</span></a>
                    <ul class="pcoded-submenu" style="display: <?= request()->is('admin/settings/general/edit/early-bird') ? 'block' : '' || request()->is('admin/course') ? 'block' : '' || request()->is('admin/course/create') ? 'block' : '' || request()->is('admin/course/*') ? 'block' : '' ?>;">

                        <li class="{{ \Request::route()->getName() === 'admin.course.list' ? 'active' : '' || request()->is('admin/course/create') ? 'active' : '' || request()->is('admin/course/*') ? 'active' : '' }}"><a href="{{url(route('admin.course.list'))}}" class="">Courses</a></li>

                        <li class="{{ \Request::route()->getName() === 'admin.seasons.list' ? 'active' : '' || request()->is('admin/seasons/create') ? 'active' : '' || request()->is('admin/seasons/*') ? 'active' : '' }}"><a href="{{url(route('admin.seasons.list'))}}" class="">Seasons</a></li>

                        <li class="{{ request()->is('admin/settings/general/edit/early-bird') ? 'active' : ''}} "><a href="{{url('admin/settings/general/edit/early-bird')}}" class="">Early Bird Management</a></li>
                    </ul>
                </li>


                <!-- ****************************
                |
                |       CAMPS
                |
                |********************************* -->
                <li  class="nav-item pcoded-hasmenu <?= ActiveMenu(['admin.camp.list', 'admin.camp.showCreate', 'admin.camp.showEdit'],'pcoded-trigger') ?>" >
                     <a href="javascript:" class="nav-link "><span class="pcoded-micon">
                           <i class="fas fa-bars"></i></span><span class="pcoded-mtext">Camp Management</span>
                     </a>
                <ul class="pcoded-submenu" style="display: <?= ActiveMenu(['admin.camp.list', 'admin.camp.showCreate', 'admin.camp.showEdit', 'admin.campcategory.list', 'admin.campcategory.showCreate', 'admin.campcategory.showEdit'], 'block') ?>;">
                    <li class="<?= ActiveMenu(['admin.campcategory.list', 'admin.camp.showCreate', 'admin.campcategory.showEdit'],'active') ?>"><a href="{{ route('admin.campcategory.list') }}" class="">Camp Category</a></li>
                    <li class="<?= ActiveMenu(['admin.camp.list', 'admin.camp.showCreate', 'admin.camp.showEdit'],'active') ?>"><a href="{{ route('admin.camp.list') }}" class="">Camps</a></li>
                    <li class="<?= ActiveMenu(['admin.ChildcareVoucher.list', 'admin.ChildcareVoucher.showCreate', 'admin.ChildcareVoucher.showEdit'],'active') ?>"><a href="{{ route('admin.ChildcareVoucher.list') }}" class="">Childcare Vouchures</a></li>
                   <!--  <li class="<?= ActiveMenu(['admin.Session.list', 'admin.Session.showCreate', 'admin.Session.showEdit'],'active') ?>"><a href="{{ route('admin.Session.list') }}" class="">Sessions</a></li> -->
                </ul>
                </li>

                <!-- ****************************
                |
                |       Badges Management 
                |
                |********************************* -->
                <li  class="nav-item pcoded-hasmenu <?= ActiveMenu(['admin.badge.list', 'admin.badge.showCreate', 'admin.badge.showEdit','players_list','assign_badge'],'pcoded-trigger') ?>" >
                     <a href="javascript:" class="nav-link "><span class="pcoded-micon">
                           <i class="fas fa-certificate"></i></span><span class="pcoded-mtext">Badges Management</span>
                     </a>
                <ul class="pcoded-submenu" style="display: <?= ActiveMenu(['admin.badge.list', 'admin.badge.showCreate', 'admin.badge.showEdit','players_list','assign_badge','admin.testcategory.list','admin.testcategory.showCreate','admin.test.list','admin.test.showCreate'], 'block') ?>;">
                    <li class="<?= ActiveMenu(['admin.badge.list', 'admin.badge.showCreate', 'admin.badge.showEdit'],'active') ?>"><a href="{{ route('admin.badge.list') }}" class="">Badges</a></li>
                    <li class="<?= ActiveMenu(['players_list','assign_badge'],'active') ?>"><a href="{{ route('players_list') }}" class="">Players</a></li>

                    <li class="<?= ActiveMenu(['admin.testcategory.list','admin.testcategory.showCreate'],'active') ?>"><a href="{{ route('admin.testcategory.list') }}" class="">Test Category</a></li>
                    <li class="<?= ActiveMenu(['admin.test.list','admin.test.showCreate'],'active') ?>"><a href="{{ route('admin.test.list') }}" class="">Test</a></li>
                </ul>
                </li>

                <!-- ****************************
                |
                |       Reports Management 
                |
                |********************************* -->
                <li  class="nav-item pcoded-hasmenu <?= ActiveMenu(['admin.reportquestion.list', 'admin.reportquestion.showCreate', 'admin.reportquestion.showEdit','admin.reportquestionopt.list', 'admin.reportquestionopt.showCreate', 'admin.reportquestionopt.showEdit', 'admin.player_reports.listing'],'pcoded-trigger') ?>" >
                     <a href="javascript:" class="nav-link "><span class="pcoded-micon">
                           <i class="fas fa-address-card"></i></span><span class="pcoded-mtext">Reports Management</span>
                     </a>
                <ul class="pcoded-submenu" style="display: <?= ActiveMenu(['admin.reportquestion.list', 'admin.reportquestion.showCreate', 'admin.reportquestion.showEdit','admin.reportquestionopt.list', 'admin.reportquestionopt.showCreate', 'admin.reportquestionopt.showEdit', 'admin.player_reports.listing', 'admin.matchReports.compList'], 'block') ?>;">
                    <li class="<?= ActiveMenu(['admin.reportquestion.list', 'admin.reportquestion.showCreate', 'admin.reportquestion.showEdit'],'active') ?>"><a href="{{ route('admin.reportquestion.list') }}" class="">Question Categories</a></li>
                    <li class="<?= ActiveMenu(['admin.reportquestionopt.list', 'admin.reportquestionopt.showCreate', 'admin.reportquestionopt.showEdit'],'active') ?>"><a href="{{ route('admin.reportquestionopt.list') }}" class="">Report Questions</a></li>
                    <li class="<?= ActiveMenu(['admin.player_reports.listing'],'active') ?>"><a href="{{ route('admin.player_reports.listing') }}" class="">Player Reports</a></li>
                    <li class="<?= ActiveMenu(['admin.matchReports.compList'],'active') ?>"><a href="{{ route('admin.matchReports.compList') }}" class="">Match Reports</a></li>
                </ul>
                </li>

                <!-- ****************************
                |
                |       GOAL MANAGEMENT
                |
                |********************************* -->
                <li class="nav-item {{ \Request::route()->getName() === 'admin.goal.list' ? 'nav-item active' : 'nav-item' }}">
                <a href="{{url(route('admin.goal.list'))}}" class="nav-link "><span class="pcoded-micon"><i class="fas fa-list-alt"></i></span><span class="pcoded-mtext">Goal Management</span></a>
                </li>


                <!-- ****************************
                |
                |    Coupon/Voucher Management
                |
                |********************************* -->
                <li class="nav-item {{ \Request::route()->getName() === 'admin.coupon.list'
                ? 'nav-item active' : 'nav-item' }}">
                <a href="{{url(route('admin.coupon.list'))}}" class="nav-link "><span class="pcoded-micon"><i class="fas fa-star"></i></span><span class="pcoded-mtext">Coupon Management</span></a>
                </li>

                <li class="nav-item <?= ActiveMenu(['admin.vochure.list', 'admin.vochure.showCreate', 'admin.vochure.showEdit'],'active') ?>">
                    <a href="{{url(route('admin.vochure.list'))}}" class="nav-link "><span class="pcoded-micon"><i class="fas fa-star"></i></span><span class="pcoded-mtext">Voucher Management</span></a>
                </li>


                <!-- ****************************
                |
                |       Custom Box 
                |
                |********************************* -->
                <li class="nav-item <?= ActiveMenu(['admin.custombox.list', 'admin.custombox.showCreate', 'admin.custombox.showEdit'],'active') ?>">
                    <a href="{{url(route('admin.custombox.list'))}}" class="nav-link "><span class="pcoded-micon"><i class="fas fa-th"></i></span><span class="pcoded-mtext">Custom Box</span></a>
                </li>

                <!-- ****************************
                |
                |       FAQ MANGEMENT 
                |
                |********************************* -->
                <li class="nav-item pcoded-hasmenu <?= ActiveMenu(['admin.faqs.lists', 'admin.faqs.showCreate', 'admin.faqs.edit'], 'pcoded-trigger') ?>" >
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon">
                    <i class="fas fa-server"></i></span><span class="pcoded-mtext">Faqs Management</span></a>
                    <ul class="pcoded-submenu" style="display: <?= ActiveMenu(['admin.faqs.lists', 'admin.faqs.showCreate', 'admin.faqs.edit'], 'block') ?>;">
                        <li class="{{ ((\Request::route()->getName() === 'admin.faqs.lists' || \Request::route()->getName() === 'admin.faqs.showCreate' || \Request::route()->getName() === 'admin.faqs.edit') && Request::route('type') === 'user' ) ? 'active' : '' }}"><a href="{{ route('admin.faqs.lists', ['type' => 'user']) }}" class="">Faqs</a></li>
                    </ul>
                </li>


                <!-- ****************************
                |
                |   Invoices Uploaded - By coach
                |
                |********************************* -->
                <li class="nav-item {{ \Request::route()->getName() === 'uploaded_invoice' ? 'nav-item active' : 'nav-item' }}">
                    <a href="{{url(route('uploaded_invoice'))}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Invoices Uploaded By Coach</span></a>
                </li>

                <!-- ****************************
                |
                |   Email Management
                |
                |********************************* -->
                <li class="nav-item pcoded-hasmenu <?= ActiveMenu(['admin.emails.index'],'pcoded-trigger') ?>" >
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon">
                        <i class="fas fa-envelope "></i></span><span class="pcoded-mtext">Email Management</span></a>
                    <ul class="pcoded-submenu" style="display: <?= ActiveMenu(['admin.emails.index'], 'block') ?>;">
                        <li class="<?= ActiveMenu(['admin.emails.index'],'active') ?>"><a href="{{ route('admin.emails.index') }}" class="">Business Emails</a></li>
                    </ul>
                </li>


                <!-- ****************************
                |
                |       CMS PAGES 
                |
                |********************************* -->
                <li class="nav-item <?= ActiveMenu(['admin.cms-pages.list', 'admin.cms-pages.showCreate', 'admin.cms-pages.edit'],'active') ?>">
                    <a href="{{url(route('admin.cms-pages.list'))}}" class="nav-link "><span class="pcoded-micon"><i class="fas fa-file"></i></span><span class="pcoded-mtext">Cms Pages</span></a>
                </li>


                <!-- ****************************
                |
                |       MENU MANAGEMENT
                |
                |********************************* -->
                <li  class="nav-item pcoded-hasmenu <?= ActiveMenu(['admin.Menu.list', 'admin.Menu.footer-list', 'admin.Menu.showCreate', 'admin.Menu.showEdit'],'pcoded-trigger') ?>" >
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon">
                        <i class="fas fa-bars"></i></span><span class="pcoded-mtext">Menu Management</span>
                    </a>
                <ul class="pcoded-submenu" style="display: <?= ActiveMenu(['admin.Menu.list', 'admin.Menu.footer-list', 'admin.Menu.showCreate', 'admin.Menu.showEdit'], 'block') ?>;">
                    <li class="<?= ActiveMenu(['admin.Menu.list', 'admin.Menu.showCreate', 'admin.Menu.showEdit'],'active') ?>"><a href="{{ route('admin.Menu.list') }}" class="">Header Menu</a></li>
                    <li class="<?= ActiveMenu(['admin.Menu.footer-list', 'admin.Menu.showCreate', 'admin.Menu.showEdit'],'active') ?>"><a href="{{ route('admin.Menu.footer-list') }}" class="">Footer Menu</a></li>
                </ul>
                </li>


                <!-- ****************************
                |
                |   E-Shop PAGES - Start Here
                |
                |********************************* -->
                <li class="nav-item pcoded-menu-caption">
                    <label>E-Shop</label>
                </li>

              <li class="nav-item {{ \Request::route()->getName() === 'admin.products.category'
             ? 'nav-item active' : 'nav-item' }}">
                    <a href="{{url(route('admin.products.category'))}}" class="nav-link "><span class="pcoded-micon"><i class="fas fa-briefcase"></i></span><span class="pcoded-mtext">Product Categories</span></a>
                </li>

                <li class="nav-item pcoded-hasmenu <?= ActiveMenu([
                        'admin.products.variation',
                        'admin.products.create.variations',
                        'admin.products.variations',
                        'admin.products.custom.fields.variations',
                        'admin.products.custom.fields.edit.variations',
                        'admin.products.variation.edit',
                        'admin.products.edit.variations'
                ],'pcoded-trigger') ?>" >
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon">
                         <i class="feather icon-box"></i></span><span class="pcoded-mtext">Product Variations</span></a>

                       <ul class="pcoded-submenu" style="display: <?= ActiveMenu([
                        'admin.products.variation',
                        'admin.products.create.variations',
                        'admin.products.variations',
                        'admin.products.custom.fields.variations',
                        'admin.products.custom.fields.edit.variations',
                        'admin.products.variation.edit',
                        'admin.products.edit.variations',
                        'admin.products.list.brands'
                        ],'block') ?>;">

                         <li class="<?= ActiveMenu(['admin.products.list.brands'],'active') ?>">
                              <a href="{{ route('admin.products.list.brands') }}" class="">Brand</a>
                        </li>
                                 
                                 <li class="<?= ActiveMenu(['admin.products.create.variations'],'active') ?>">
                                      <a href="{{ route('admin.products.create.variations') }}" class="">Add New Variations</a>
                                </li>

                                <?php $variationMenus = App\Models\Products\Variation::where('status',1)->orderBy('name','ASC')->get(); ?>

                                @foreach($variationMenus as $v)
                                    <li>
                                           <a href="{{ route('admin.products.variations',$v->type) }}" class="">{{$v->name}}</a>
                                   </li>
                                @endforeach
                                
                      </ul>
                </li>

                <li class="nav-item {{ \Request::route()->getName() === 'vendor.shop.products.index'
                ? 'nav-item active' : 'nav-item' }}">
                <a href="{{url(route('vendor.shop.products.index'))}}" class="nav-link "><span class="pcoded-micon"><i class="fas fa-bars"></i></span><span class="pcoded-mtext">Product Listing</span></a>


            <!--    <li class="nav-item {{ \Request::route()->getName() === 'admin.shop.listing'
                ? 'nav-item active' : 'nav-item' }}">
                <a href="{{url(route('admin.shop.listing'))}}" class="nav-link "><span class="pcoded-micon"><i class="fas fa-briefcase"></i></span><span class="pcoded-mtext">Shop Listing</span></a>
                </li> -->
          <!--       <li class="nav-item {{ \Request::route()->getName() === 'admin.shop.products.all.listing'
                ? 'nav-item active' : 'nav-item' }}">
                <a href="{{url(route('admin.shop.products.all.listing',5))}}" class="nav-link "><span class="pcoded-micon"><i class="fas fa-briefcase"></i></span><span class="pcoded-mtext">View Product Listing</span></a>
                </li> -->

                <!-- <li class="nav-item {{ \Request::route()->getName() === 'admin.shop.cms'
                ? 'nav-item active' : 'nav-item' }}">
                <a href="{{url(route('admin.shop.cms'))}}" class="nav-link "><span class="pcoded-micon"><i class="fas fa-briefcase"></i></span><span class="pcoded-mtext">CMS Pages</span></a>
                </li> -->


                <!-- ****************************
                |
                |    E-Shop PAGES - End Here
                |
                |********************************* -->


                <!-- ****************************
                |
                |       PAGE SETTINGS 
                |
                |********************************* -->
                <li class="nav-item pcoded-hasmenu {{ request()->is('admin/settings/general') ? 'active' : '' || request()->is('admin/settings/general/edit/general-setting') ? 'active' : '' || request()->is('admin/settings/general/edit/homepage') ? 'active' : '' || request()->is('admin/settings/general/edit/course-listing') ? 'active' : '' || request()->is('admin/settings/general/edit/contact-us') ? 'active' : ''}}" >
                <a href="javascript:" class="nav-link "><span class="pcoded-micon">
                    <i class="fas fa-cogs"></i></span><span class="pcoded-mtext">Settings</span></a>

                <ul class="pcoded-submenu" style="display: <?= request()->is('admin/settings/general') ? 'block' : '' || request()->is('admin/settings/general/edit/homepage') ? 'block' : '' || request()->is('admin/settings/general/edit/course-listing') ? 'block' : '' || request()->is('admin/settings/general/edit/contact-us') ? 'block' : '' || request()->is('admin/settings/general/edit/general-setting') ? 'block' : ''  ?>;">

                    <li class="{{ request()->is('admin/settings/general') ? 'active' : '' || request()->is('admin/settings/general/edit/homepage') ? 'active' : '' || request()->is('admin/settings/general/edit/course-listing') ? 'active' : '' || request()->is('admin/settings/general/edit/contact-us') ? 'active' : ''}}"><a href="{{ route('list_general_settings') }}" class="">Page Settings</a></li>

                    <li class="{{ request()->is('admin/settings/general/edit/general-setting') ? 'active' : ''}}"><a href="{{url('admin/settings/general/edit/general-setting')}}" class="">General Settings</a></li>

                    <li class="<?= ActiveMenu(['list_payment_settings'],'active') ?>"><a href="{{ route('list_payment_settings') }}" class="">Payment Settings</a></li>
                    <li class="<?= ActiveMenu(['global_settings'],'active') ?>">
                        <a href="{{ route('global_settings') }}" class="">Global Settings</a>
                    </li>
                </ul>
                </li> 

                

