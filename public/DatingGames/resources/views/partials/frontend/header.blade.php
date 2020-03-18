<header>
        <div class="container">
            <nav class="navbar navbar-default">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ route('landingPage') }}">
                         
                        <img src="{{asset('upload/images/'.$settings->header_logo)}}" alt="" />
                        
                    </a>
                </div> 
                <h3 class="head-title">Fun and Games Dating, Manchester, UK</h3>
                 <ul class="headcontacts">

                        <li>
                            <a href="mailto:{{ $settings->email_id }}"><i class="fa fa-envelope" aria-hidden="true"></i> {{ $settings->email_id }} </a>
                        </li>
                        <li>
                            <a href="tel:{{ $settings->contact_no }}"><i class="fa fa-mobile" aria-hidden="true"></i> {{ $settings->contact_no }} </a>
                        </li>
                        <li>
                            <a href="{{ $settings->facebook_id }}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        </li>                        
                        <li>
                            <a href="{{ $settings->twitter_id }}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="{{ $settings->insta_id }}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                <div class="collapse navbar-collapse" id="myNavbar">
                   
                    <ul class="nav navbar-nav navbar-right">
                        <li class="{{ (\Request::route()->getName() == 'landingPage') || (\Request::route()->getName() == 'home') ? 'active' : '' }}"><a href="{{ route('landingPage') }}">Home</a></li>
                        
                        <li class="{{ (\Request::route()->getName() == 'frontend.events') ? 'active' : '' }}"><a href="{{ route('frontend.events') }}">Events</a></li>
                        @php 
                            if(!@sizeof($slug)){
                                $slug = "";
                            } 
                        @endphp
                        <li class="{{ ($slug == 'our-venues') ? 'active' : '' }}"><a href="/our-venues">Venues</a></li>
                        <!-- <li class="{{ (\Request::route()->getName() == 'faq') ? 'active' : '' }}"><a href="{{ route('faq')}}">FAQ'S</a></li> -->
                        
                        <li class="{{ ($slug == 'what-to-expect') ? 'active' : '' }}"><a href="/what-to-expect">What to Expect</a></li>
                        <li class="{{ (\Request::route()->getName() == 'contact') ? 'active' : '' }}"><a href="/contact-us">Contact Us</a></li>
                        @if (!Auth::user())
                        <li class="join">
                            <a href="{{ route('register') }}" class="custm-btn {{ (\Request::route()->getName() == 'register') ? 'active' : '' }}">Join</a>
                        </li>
                        <li class="log"><a href="{{ route('login') }}" class="custm-btn {{ (\Request::route()->getName() == 'login') ? 'active' : '' }}">login</a>
                        </li>
                        @else
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)" class="custm-btn">My Account<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('user.profile') }}" class="custm-btn">Profile</a>
                            </li>
                            <li>
                                <a href="{{route('user.myEvents')}}" class="custm-btn">Events</a>
                            </li>
                            <li>
                                <a href="{{route('user.match')}}" class="custm-btn">Matches</a>
                            </li>
                            <li>
                                <a href="{{route('inbox')}}" class="custm-btn">Inbox @if(count(App\Message::where('to_id',Auth::user()->id)->where('status',1)->get())>0)
                                    ({{count(App\Message::where('to_id',Auth::user()->id)->where('status',1)->get())}})
                                    @endif</a>
                            </li>
                            <li>
                                  <a class="custm-btn" href="{{ route('logout') }}"
                                      onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                      Logout
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      {{ csrf_field() }}
                                  </form>
                              </li>
                        </ul>
                        </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </header>