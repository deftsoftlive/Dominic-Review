<!-- Admin dashboard -->
@if(\Auth::user()->role_id == '1')

  <li class="nav-item pcoded-menu-caption">
               <label>Event Management</label>
            </li>
                    
            <li class="nav-item pcoded-hasmenu pcoded-trigger">
               <a href="javascript:" class="nav-link "><span class="pcoded-micon">
               <i class="feather icon-briefcase"></i></span><span class="pcoded-mtext">My Business</span></a>
               <ul class="pcoded-submenu" style="display: block">
                 
                  <li class="nav-item pcoded-hasmenu " >
                     <a href="javascript:" class="nav-link"  style="" ><span class="pcoded-micon">
                     <i class="feather icon-box"></i></span>Basic Features<span class="pcoded-mtext"></span></a>
                     <ul class="pcoded-submenu" style="">
                        <li class="">
                           <a style=" " href=""><span class="arrow-before"><i class="fa fa-arrow-right" aria-hidden="true"></i></span> Basic Information</a>
                        </li>


                         <li>
                           <a href="">
                              <span class="arrow-before"><i class="fa fa-arrow-right" aria-hidden="true"></i></span>
                               Orders
                            </a>
                        </li>



                        <li class="">
                           <a style="" href=""><span class="arrow-before"><i class="fa fa-arrow-right" aria-hidden="true"></i></span> Photo Gallery</a>
                        </li>
                        <li class="">
                           <a href=""> <span class="arrow-before"><i class="fa fa-arrow-right" aria-hidden="true"></i></span> Video Gallery</a>
                        </li>
                        <li class="">
                           <a style="" href=""><span class="arrow-before"><i class="fa fa-arrow-right" aria-hidden="true"></i></span> FAQs</a>
                        </li>
                        <li class="">
                           <a style="" href=""><span class="arrow-before"><i class="fa fa-arrow-right" aria-hidden="true"></i></span> Description</a>
                        </li>
                        <li class="">
                           <a style="" href=""><span class="arrow-before"><i class="fa fa-arrow-right" aria-hidden="true"></i></span> Styles</a>
                        </li>
                        <li class="">
                           <a style="" href=""><span class="arrow-before"><i class="fa fa-arrow-right" aria-hidden="true"></i></span> Services</a>
                        </li>
                        <li class="">
                           <a style="" href=""><span class="arrow-before"><i class="fa fa-arrow-right" aria-hidden="true"></i></span> Amenites & Games</a>
                        </li>
                        <li class="">
                           <a style="" href=""><span class="arrow-before"><i class="fa fa-arrow-right" aria-hidden="true"></i></span> Event Types </a>
                        </li>
                        </li>
                        <li class="">
                           <a style="" href=""><span class="arrow-before"><i class="fa fa-arrow-right" aria-hidden="true"></i></span> Seasons</a>
                        </li>
                        <li class="">
                           <a  href=""><span class="arrow-before"><i class="fa fa-arrow-right" aria-hidden="true"></i></span> Packages</a>
                        </li>
                        <li class="">
                           <a style="" href=""><span class="arrow-before"><i class="fa fa-arrow-right" aria-hidden="true"></i></span> 
                           Deal & Discounts</a>
                        </li>

                      
                        
                     </ul>
                  </li>

               </ul>
            </li>

            <li>
               <a href="{{ route('logout') }}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();" class="nav-link "><span class="pcoded-micon">
               <i class="feather icon-box"></i></span><span class="pcoded-mtext">Sign Out</span></a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     @csrf
               </form>
            </li>

<!-- Parent dashboard -->
@elseif(\Auth::user()->role_id == '2')

     <li class="nav-item pcoded-menu-caption">
               <label>Event Management</label>
            </li>
                    
            <li class="nav-item pcoded-hasmenu pcoded-trigger">
               <a href="javascript:" class="nav-link "><span class="pcoded-micon">
               <i class="feather icon-briefcase"></i></span><span class="pcoded-mtext">My Business</span></a>
               <ul class="pcoded-submenu" style="display: block">
                 
                  <li class="nav-item pcoded-hasmenu " >
                     <a href="javascript:" class="nav-link"  style="" ><span class="pcoded-micon">
                     <i class="feather icon-box"></i></span>Basic Features<span class="pcoded-mtext"></span></a>
                     <ul class="pcoded-submenu" style="">
                        <li class="">
                           <a style=" " href=""><span class="arrow-before"><i class="fa fa-arrow-right" aria-hidden="true"></i></span> Basic Information</a>
                        </li>
                
                     </ul>
                  </li>

               </ul>
            </li>

            <li>
               <a href="{{ route('logout') }}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();" class="nav-link "><span class="pcoded-micon">
               <i class="feather icon-box"></i></span><span class="pcoded-mtext">Sign Out</span></a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     @csrf
               </form>
            </li>

<!-- Coach dashboard -->
@elseif(\Auth::user()->role_id == '3')

     <li class="nav-item pcoded-menu-caption">
               <label>Courses & Childs Management</label>
            </li>
                    
            <li class="nav-item pcoded-hasmenu pcoded-trigger">
               <a href="javascript:" class="nav-link "><span class="pcoded-micon">
               <i class="feather icon-briefcase"></i></span><span class="pcoded-mtext">My Business</span></a>
               <ul class="pcoded-submenu" style="display: block">
                 
                  <li class="nav-item pcoded-hasmenu " >
                     <a href="javascript:" class="nav-link"  style="" ><span class="pcoded-micon">
                     <i class="feather icon-box"></i></span>Basic Features<span class="pcoded-mtext"></span></a>
                     <ul class="pcoded-submenu" style="">
                        <li class="">
                           <a style=" " href=""><span class="arrow-before"><i class="fa fa-arrow-right" aria-hidden="true"></i></span> Basic Information</a>
                        </li>
                
                     </ul>
                  </li>

               </ul>
            </li>

            <li>
               <a href="{{ route('logout') }}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();" class="nav-link "><span class="pcoded-micon">
               <i class="feather icon-box"></i></span><span class="pcoded-mtext">Sign Out</span></a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     @csrf
               </form>
            </li>

<!-- Child dashboard -->
@elseif(\Auth::user()->role_id == '4')

     <li class="nav-item pcoded-menu-caption">
               <label>Profile Management</label>
            </li>
                    
            <li class="nav-item pcoded-hasmenu pcoded-trigger">
               <a href="javascript:" class="nav-link "><span class="pcoded-micon">
               <i class="feather icon-briefcase"></i></span><span class="pcoded-mtext">My Business</span></a>
               <ul class="pcoded-submenu" style="display: block">
                 
                  <li class="nav-item pcoded-hasmenu " >
                     <a href="javascript:" class="nav-link"  style="" ><span class="pcoded-micon">
                     <i class="feather icon-box"></i></span>Basic Features<span class="pcoded-mtext"></span></a>
                     <ul class="pcoded-submenu" style="">
                        <li class="">
                           <a style=" " href=""><span class="arrow-before"><i class="fa fa-arrow-right" aria-hidden="true"></i></span> Basic Information</a>
                        </li>
                
                     </ul>
                  </li>

               </ul>
            </li>

            <li>
               <a href="{{ route('logout') }}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();" class="nav-link "><span class="pcoded-micon">
               <i class="feather icon-box"></i></span><span class="pcoded-mtext">Sign Out</span></a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     @csrf
               </form>
            </li>
@endif