<header class="site-header">
   <!-- header starts here -->
   <div class="top-bar">
      <div class="container">
         <div class="top-menus-wrap">
            <button class="menu-toggle" type="button">
            <span><i class="fas fa-bars"></i></span> Menu
            </button>
            <a  href="{{url('/')}}" class="brand-name"><img src="/frontend/images/logo.svg"></a>
            <button class="toolbox mob-hide" type="button">
            <span><i class="fas fa-wrench"></i></span> Toolbox
            </button>
            <!-- only for mobile -->

              <ul class="mob-side-menus">
            @if(Auth::check()) 
                    <li class="user">

                        <span>
                            <i class="fas fa-user"></i>
                        </span>
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}} </a>
                             <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 36px, 0px); top: 0px; left: 0px; will-change: transform;">
                      <a class="dropdown-item" href="{{url(route(Auth::user()->role.'_dashboard'))}}"><span><i class="far fa-user"></i></span> Profile</a>
                         <a class="dropdown-item" href="/logout"><span><i class="fas fa-sign-out-alt"></i></span> Logout</a>
                     </div>
                        </div>
                    </li>
               @endif
                <li>
                <button class="toolbox" type="button">
                    <span><i class="fas fa-wrench"></i></span> Toolbox
                </button>
              </li>
              <li>
                  <div class="icon-grp">
                    

                    @include('includes.messageCountHeader')
                      
                      @if(Auth::Check() && Auth::User()->role === 'user')
                      <a href="javascript:void(0);" class="fav-list">
                            <i class="fas fa-heart"></i>
                            <sup id="fav_ven">{{Auth::User()->favouriteVendors->count()}}</sup>
                        </a>
                      @endif

                  </div>
              </li>

            </ul>




         </div>
         
      </div>
   </div>
   <div class="header-links-wrap">
      <div class="container">
         <ul class="head-links {{ Auth::check() ? 'userLoggedIn' : ''}}">
            <li class="mob-hide"><a href="/">Home</a></li>
            <!-- <li><a href="{{url(route('get_all_venues'))}}">Venues</a></li> -->
            <li class="mob-hide"><a href="javascript:void(0);" data-toggle="modal" data-target="#VenuesCategoriesModal">Businesses</a></li>
            <li class="mob-hide"><a href="{{url(route('all_deals'))}}">Deals & Discount</a></li>
            <li class="mob-hide"><a href="/vendor/register">New Vendors</a></li>
            
            @include('includes.messageCountHeader')

            @if(Auth::Check() && Auth::User()->role === 'user')
            <li class="mob-hide">
               <a href="javascript:void(0);" class="fav-list">
               <i class="fas fa-heart"></i>
               <sup id="fav_ven2">{{ Auth::User()->favouriteVendors->count() }}</sup>
               </a>
            </li>
            @endif

          @if(Auth::check())                       
             <li>                                       
                  <div class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                      <span class="nav-profile-img">
                        <i class="fas fa-user-circle"></i>
                      </span>
                      <div class="nav-profile-text">
                        <p class="user-name-text">{{Auth::user()->name}}</p>
                      </div>
                    </a>
                    <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 36px, 0px); top: 0px; left: 0px; will-change: transform;">
                      <a class="dropdown-item" href="{{url(route(Auth::user()->role.'_dashboard'))}}"><span><i class="far fa-user"></i></span> Profile</a>
                         <a class="dropdown-item" href="/logout"><span><i class="fas fa-sign-out-alt"></i></span> Logout</a>
                     </div>
                  </div>
            </li>
            @endif
            @if(!Auth::check()) 
                <li class="user header-btns">
                        <a href="{{url('/login')}}" class="cstm-btn solid-btn">Login</a>
                        <a href="{{url('/register')}}" class="cstm-btn">Sign Up</a>
                </li>
            @endif

  
            <!-- <li class="mob-hide">
               <div class="icon-grp">
                  <a href="javascript:void(0);" class=""><i class="fas fa-envelope"></i></a>
                  <a href="javascript:void(0);" class="fav-list">
                  <i class="fas fa-heart"></i>
                  <sup>2</sup>
                  </a>
               </div>
            </li> -->
         </ul>
      </div>
   </div>
    <!--For Menu-->
   <nav id="main-navigation" class="">
      <div class="container">
         <ul id="menus-list" class="menu-list">
            <li>
               <a href="/" style="background:url(/frontend/images/menu-home-img.png)">
                  <span class="nav-item-icon"><i class="fas fa-home"></i></span>
                  <h3>Home</h3>
               </a>
            </li>
            <li>
               <a href="{{ route('cmsPage', ['slug' => 'about-us']) }}" style="background:url(/frontend/images/menu-about.png)">
                  <span class="nav-item-icon"><i class="fas fa-address-card"></i></span>
                  <h3>About Us</h3>
               </a>
            </li>
            <li>
               <a href="javascript:void(0);" style="background:url(/frontend/images/menu-faq.png)">
                  <span class="nav-item-icon"><i class="fas fa-comment-dots"></i></span>
                  <h3>FAQ</h3>
               </a>
            </li>
            <li>
               <a href="javascript:void(0);" style="background:url(/frontend/images/menu-contact-us.png)">
                  <span class="nav-item-icon"><i class="fas fa-id-badge"></i></span>
                  <h3>Contact Us</h3>
               </a>
            </li>
            <li>
               <a href="{{ route('cmsPage', ['slug' => 'privacy-policy']) }}" style="background:url(/frontend/images/menu-policies.png)">
                  <span class="nav-item-icon"><i class="fas fa-clipboard"></i></span>
                  <h3>Polices</h3>
               </a>
            </li>
            <li>
               <a href="javascript:void(0);" style="background:url(/frontend/images/menu-forum.png)">
                  <span class="nav-item-icon"><i class="fas fa-users"></i></span>
                  <h3>Forum</h3>
               </a>
            </li>
            <li>
               <a href="javascript:void(0);" style="background:url(/frontend/images/menu-testimonial.png)">
                  <span class="nav-item-icon"><i class="fas fa-star"></i></span>
                  <h3>Testimonials</h3>
               </a>
            </li>
            <li>
               <a href="{{url('/vendor/register')}}" style="background:url(/frontend/images/menu-vendor.png)">
                  <span class="nav-item-icon"><i class="fas fa-star"></i></span>
                  <h3>Businesses</h3>
               </a>
            </li>
            <li>
               <a href="{{url('/vendor/register')}}" style="background:url(/frontend/images/menu-vendor.png)">
                  <span class="nav-item-icon"><i class="fas fa-star"></i></span>
                  <h3>Deals & Discount</h3>
               </a>
            </li>
            <li>
               <a href="{{url('/vendor/register')}}" style="background:url(/frontend/images/menu-vendor.png)">
                  <span class="nav-item-icon"><i class="fas fa-star"></i></span>
                  <h3>New Vendor</h3>
               </a>
            </li>
            <li>
               <a href="{{url('/register')}}" style="background:url(/frontend/images/menu-sign.png)">
                  <span class="nav-item-icon"><i class="fas fa-star"></i></span>
                  <h3>SignUp</h3>
               </a>
            </li>
            <li>
               <a href="{{url('/register')}}" style="background:url(/frontend/images/menu-sign.png)">
                  <span class="nav-item-icon"><i class="fas fa-star"></i></span>
                  <h3>Login</h3>
               </a>
            </li>
         </ul>
      </div>
      <a href="javascript:void(0);" (click)="close_nav()" class="nav-close-btn"><i class="fas fa-times"></i></a>
   </nav>
   <!--For toolbox-->
   <nav id="tool-nav" class="">
      <div class="container">
         <ul id="menus-list" class="menu-list">
            <li>
               <a href="javascript:void(0);">
                  <span class="nav-item-icon"><img src="/frontend/images/event-listing.png"/></span>
                  <h3>Event Checklist</h3>
               </a>
            </li>
            <li>
               <a href="javascript:void(0);">
                  <span class="nav-item-icon">
                  <img src="/frontend/images/budgeting-tool.png"/>
                  </span>
                  <h3>Budgeting tool</h3>
               </a>
            </li>
            <li>
               <a href="javascript:void(0);">
                  <span class="nav-item-icon">
                  <img src="/frontend/images/guest-list.png"/></span>
                  <h3>Guest List</h3>
               </a>
            </li>
            <li>
               <a href="javascript:void(0);">
                  <span class="nav-item-icon">
                  <img src="/frontend/images/calculators.png"/></span>
                  <h3>Calculator</h3>
               </a>
            </li>
            <li>
               <a href="javascript:void(0);">
                  <span class="nav-item-icon">
                  <img src="/frontend/images/forum.png"/></span>
                  <h3>Forum</h3>
               </a>
            </li>
            <li>
               <a href="javascript:void(0);">
                  <span class="nav-item-icon">
                  <img src="/frontend/images/vendor-manager.png"/></span>
                  <h3>Vendor Manager</h3>
               </a>
            </li>
            <li>
               <a href="javascript:void(0);">
                  <span class="nav-item-icon">
                  <img src="/frontend/images/favourite.png"/></span>
                  <h3>Favorite</h3>
               </a>
            </li>
         </ul>
      </div>
      <a href="javascript:void(0);" (click)="close_nav()" class="nav-close-btn"><i class="fas fa-times"></i></a>
   </nav>
   <a href="javascript:void(0);" id="calender-toggle"><span><i class="fas fa-calendar-alt"></i></span></a>

 
</header>