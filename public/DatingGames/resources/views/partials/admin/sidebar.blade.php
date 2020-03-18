<aside class="left-side sidebar-offcanvas">                
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('/upload/images').'/'.Auth::user()->profile_picture }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Hello, {{ Auth::user()->fname }} {{ Auth::user()->lname }}</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <!-- <li class="{{ (\Request::route()->getName() == 'admin.index' 
            || \Request::route()->getName() == 'admin.profile') ? 'active' : '' }}">
            <a href="{{ route('admin.index') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li> -->

            <li class="{{ (\Request::route()->getName() == 'admin.showUsers'
            || \Request::route()->getName() == 'admin.searchUsers'
            || \Request::route()->getName() == 'admin.showCreateUser'
            || \Request::route()->getName() == 'admin.showEditUser') ? 'active' : '' }}">
                <a href="{{ route('admin.showUsers') }}">
                    <i class="fa fa-user"></i> <span>Profile Management</span> 
                </a>
            </li>             
 
            <li class="{{ (\Request::route()->getName() == 'admin.cmspages.showpages'
            || \Request::route()->getName() == 'admin.cmspages.searchPage'
            || \Request::route()->getName() == 'admin.cmspages.showCreatePage'
            || \Request::route()->getName() == 'admin.cmspages.showEditPage') ? 'treeview active' : 'treeview' }}">
                <a href="#">
                    <i class="fa fa-tasks"></i>
                    <span>CMS Pages</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ (\Request::route()->getName() == 'admin.cmspages.showpages'
                    || \Request::route()->getName() == 'admin.cmspages.searchPage'
                    || \Request::route()->getName() == 'admin.cmspages.showCreatePage'
                    || \Request::route()->getName() == 'admin.cmspages.showEditPage') ? 'active' : '' }}">
                    <a href="{{ route('admin.cmspages.showpages')}}"><i class="fa fa-angle-double-right"></i> Manage Pages</a></li>
                </ul>                            
            </li>

            
            <!-- <li class="{{ (\Request::route()->getName() == 'admin.blog.showBlogs'
            || \Request::route()->getName() == 'admin.blog.search' 
            || \Request::route()->getName() == 'admin.blog.showCreateBlog' 
            || \Request::route()->getName() == 'admin.blog.showEditBlog'
            || \Request::route()->getName() == 'admin.blogCat.showBlogCats'
            || \Request::route()->getName() == 'admin.blogCat.search'
            || \Request::route()->getName() == 'admin.blogCat.showCreateBlogCats'
            || \Request::route()->getName() == 'admin.blogCat.showEditBlogCat'
            ) ? 'treeview active' : 'treeview' }}">
                    <a href="#">
                        <i class="fa fa-list"></i>
                        <span>Manage Blog</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ (\Request::route()->getName() == 'admin.blog.showBlogs'
                        || \Request::route()->getName() == 'admin.blog.search' 
                        || \Request::route()->getName() == 'admin.blog.showCreateBlog' 
                        || \Request::route()->getName() == 'admin.blog.showEditBlog') ? 'active' : '' }}">
                            <a href="{{ route('admin.blog.showBlogs')}}"><i class="fa fa-angle-double-right"></i> Blog</a></li>
                        <li class="{{ (\Request::route()->getName() == 'admin.blogCat.showBlogCats'
                        || \Request::route()->getName() == 'admin.blogCat.search'
                        || \Request::route()->getName() == 'admin.blogCat.showCreateBlogCats'
                        || \Request::route()->getName() == 'admin.blogCat.showEditBlogCat') ? 'active' : '' }}">
                            <a href="{{ route('admin.blogCat.showBlogCats')}}"><i class="fa fa-angle-double-right"></i> Blog Categories</a></li>
                    </ul>                            
                </li> -->
                
                <li class="{{ (\Request::route()->getName() == 'admin.showvenues'
            || \Request::route()->getName() == 'admin.searchVenue'
            || \Request::route()->getName() == 'admin.showCreateVenue'
            || \Request::route()->getName() == 'admin.showEditVenue') ? 'treeview active' : 'treeview' }}">
                <a href="#">
                    <i class="fa fa-map-marker"></i>
                    <span>Venue Management</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ (\Request::route()->getName() == 'admin.showvenues'
                    || \Request::route()->getName() == 'admin.searchVenue'
                    || \Request::route()->getName() == 'admin.showCreateVenue'
                    || \Request::route()->getName() == 'admin.showEditVenue') ? 'active' : '' }}">
                    <a href="{{ route('admin.showvenues')}}"><i class="fa fa-angle-double-right"></i> Manage Venues</a></li>
                </ul>                            
            </li>

                <li class="{{ (\Request::route()->getName() == 'admin.showevents'
            || \Request::route()->getName() == 'admin.cmspages.searchEvent'
            || \Request::route()->getName() == 'admin.cmspages.showCreateEvent'
            || \Request::route()->getName() == 'admin.cmspages.showEditEvent') ? 'treeview active' : 'treeview' }}">
                <a href="#">
                    <i class="fa fa-calendar"></i>
                    <span>Event Management</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ (\Request::route()->getName() == 'admin.showevents'
                    || \Request::route()->getName() == 'admin.cmspages.searchEvent'
                    || \Request::route()->getName() == 'admin.cmspages.showCreateEvent'
                    || \Request::route()->getName() == 'admin.cmspages.showEditEvent') ? 'active' : '' }}">
                    <a href="{{ route('admin.showevents')}}"><i class="fa fa-angle-double-right"></i> Manage Events</a></li>
                </ul>                            
            </li>


                <!-- <li class="{{ (\Request::route()->getName() == 'admin.showFaqs'
                || \Request::route()->getName() == 'admin.showCreateFaq'
                || \Request::route()->getName() == 'admin.showEditFaq') ? 'active' : '' }}">
                    <a href="{{ route('admin.showFaqs') }}">
                        <i class="fa fa-question-circle"></i> <span>Faq Management</span> 
                    </a>
                </li>  -->

                <li class="{{ (\Request::route()->getName() == 'admin.showbookings'
                    ) ? 'active' : '' }}">
                <a href="{{ route('admin.showbookings') }}">
                    <i class="fa fa-user"></i> <span>Booking Management</span> 
                </a>
                </li>

                <li class="{{ (\Request::route()->getName() == 'admin.matchUserList'
                    || \Request::route()->getName() == 'admin.viewUserEvents'
                    || \Request::route()->getName() == 'admin.viewUserMatches') ? 'active' : '' }}">
                <a href="{{ route('admin.matchUserList') }}">
                    <i class="fa fa-check"></i> <span>Matches</span> 
                </a>
                </li>

                <li class="{{ (\Request::route()->getName() == 'admin.inbox'
                    || \Request::route()->getName() == 'admin.messages'
                    || \Request::route()->getName() == 'admin.matchedUser') ? 'active' : '' }}">
                <a href="{{ route('admin.inbox') }}">
                    <i class="fa fa-envelope"></i> <span>Inbox</span> 
                </a>
                </li>

                <li class="{{ (\Request::route()->getName() == 'admin.settings'
                || \Request::route()->getName() == 'admin.update_settings') ? 'active' : '' }}">
                    <a href=" {{route('admin.settings')}} ">
                        <i class="fa fa-cogs"></i> <span>General Settings</span> 
                    </a>
                </li>



        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

