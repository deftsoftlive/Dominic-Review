<!-- Nav menu start here -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
              <div class="navbar-header">
                <a class="navbar-brand" href="{{url('/')}}">
                  <img src="{{ URL::asset('uploads')}}/{{ getAllValueWithMeta('website_logo', 'general-setting') }}">
                </a>
              </div>  
              <div class="header-right">
                <ul class="header-top">
                  <li>
                   <a href="javascript:void(0);" class="top-nav-link"><span><i class="fas fa-envelope"></i></span>{{ getAllValueWithMeta('website_email', 'general-setting') }}</a>
                  </li>
                  <li>
                    <a href="javascript:void(0);" class="top-nav-link"><span><i class="fas fa-mobile-alt"></i></span>{{ getAllValueWithMeta('website_phone_number', 'general-setting') }}</a>
                  </li>
                  <li>
                    <ul class="social-meadia-icons">
                      <li>
                        <a href="{{ getAllValueWithMeta('facebook_link', 'general-setting') }}" class="social-icon-link"><i class="fab fa-facebook-f"></i></a>
                      </li>
                      <li>
                        <a href="{{ getAllValueWithMeta('instagram_link', 'general-setting') }}" class="social-icon-link"><i class="fab fa-instagram"></i></a>
                      </li>
                      <li>
                        <a href="{{ getAllValueWithMeta('google_link', 'general-setting') }}" class="social-icon-link"><i class="fab fa-google-plus"></i></a>
                      </li>
                    </ul>
                  </li>
                </ul>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <div class="menu-title-wrap">
                    <a href="javascript:void(0);">menu</a>
                  </div>
                  <ul class="navbar-nav mr-auto">
                    <li><a href="{{url('/')}}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a></li>
                    <li><a href="javascript:void(0);" class="nav-link">About Us</a></li>
                    <li><a href="javascript:void(0);" class="nav-link"> Shop</a></li>
                    <li><a href="{{route('listing')}}" class="nav-link {{ request()->is('course-listing') ? 'active' : '' }}">Courses</a></li>
                    <li><a href="javascript:void(0);" class="nav-link">Camps</a></li>
                    <li><a href="javascript:void(0);" class="nav-link">FAQs</a></li>
                    <li><a href="{{route('contact-us')}}" class="nav-link {{ request()->is('contact') ? 'active' : '' }}">Contact Us</a></li>
                  </ul>
                  <ul class="serch-login-signup">
                    <li>
                        <div class="search-icon">
                <i class="fas fa-search"></i>
              </div>
              <input type="text" class="form-control search-field" placeholder="Search">
              <div class="responsive-search-icon">
                <input type="text" class="form-control search-field" placeholder="Search">
              </div>
                    </li>
                    <li>
                        <a href="{{route('login')}}" class="cstm-btn">Login</a>
                    </li>
                    <li>
                      <div class="dropdown show">
                        <a class="cstm-btn signup dropdown-toggle" href="{{route('register')}}" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Sign UP
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                          <a class="dropdown-item" href="{{route('register')}}">Signup As Parent/Adult</a>
                          <a class="dropdown-item" href="{{route('register-as-coach')}}">Signup As Coach</a>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" onclick="openNav()">              
                  <span class="sr-only">Toggle navigation</span>
                  <span class="navbar-toggler-icon"></span>
                  <span class="icon-bar rotate_cross"></span>
                  <span class="icon-bar rotate_cross_2"></span>
                </button>           
             </nav>
             </div>
        </div>
    </div>
</header>
<!-- Nav menu end here -->