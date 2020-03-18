@extends('layouts.home')

@section('title') {{ getAllValueWithMeta('meta_title', 'login') }} @endsection
@section('description') {{ getAllValueWithMeta('meta_description', 'login') }} @endsection
@section('keywords') {{ getAllValueWithMeta('meta_keyword', 'login') }} @endsection

@section('content')


<section class="log-sign-banner aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000" style="background:url('/frontend/images/banner-bg.png');">
    <div class="container">
        <div class="page-title text-center">
            <h1>{{ getAllValueWithMeta('login_title', 'login') }}</h1>
        </div>
    </div>    
</section> 
  <section class="form-sec aos-init aos-animate" data-aos="fade-down" data-aos-duration="3000">
      <div class="container">         
        <div class="signUp-form-wrap mr-top sec-card">                
                 <div class="form-card">
                    <div class="row no-gutters">          
                        <div class="col-lg-6">
                            <figure class="form-img-wrap">
                                <img src="{{ url('/uploads').'/'.getAllValueWithMeta('login_banner', 'login') }}">
                                <figcaption class="overlay-text">
                                    <h1>{{ getAllValueWithMeta('heading', 'login') }} </h1>
                                    <p>{{ getAllValueWithMeta('description', 'login') }}</p>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="col-lg-6">
                            <form class="signUp-form" id="loginForm" method="POST" action="{{ url(route('ajax_login')) }}">
                              <div class="messages"></div>

                                @csrf

                                @if(Session::has('verified') && Session::get('status'))
                                {{Session::get('status')}}
                                @endif

                                @include('vendors.errors')

                               <div class="row">                  
                
                                   <div class="col-lg-12">                          
                                       <div class="form-group">
                                           
                                           <input type="text" formControlName="email" name="email" required="" placeholder="Email Id" class="form-control"  />
                                           <span class="input-icon"><i class="fas fa-envelope"></i></span>
                                           
                                       </div>                              
                                   </div>
                
                                   <div class="col-lg-12">
                                       <div class="form-group">
                                        <input type="password" name="password" required="" formControlName="password" placeholder="Password" class="form-control" />
                                        <span class="input-icon"><i class="fas fa-lock"></i></span>
                                       
                                       </div>
                                   </div>
                
                               </div>
                @if(Request::has('redirectLink'))
                <input type="hidden" value="{{Request::get('redirectLink')}}" name="redirectLink">
                @endif
                                
                               <div class="form-links">
                                         @if (Route::has('password.request'))
                                                <a class="normal-link mb-3" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif  
                                        <p> 
                                            Do not have a account please click to register as a
                                            <a href="/register" class="normal-link">User</a>
                                            or 
                                            <a href="/vendor/register" class="normal-link">Vendor</a>
                                        </p>
                                </div>
                                    <div class="btn-wrap">
                                            <button class="cstm-btn solid-btn">Login</button>

                                             <img  class="pl-3 loading hide" src="{{url('/images/small-loader.gif')}}" style="display: none;" />                                            

                                            
                                           
                                        </div>
                            </form>
                        </div>                    
                </div>  
                </div>
                </div>
                </div>
</section>  

<section class="how-its-work-sec aos-init aos-animate" data-aos="fade-right" data-aos-duration="3000">
   <div class="container">
      <div class="sec-heading text-center">
         <h4>{{ getAllValueWithMeta('section1_title', 'login') }}</h4>
         <h2>{{ getAllValueWithMeta('section1_tagline', 'login') }}</h2>
      </div>
      <div class="row">
         <div class="col-lg-10 offset-lg-1">
            <div class="video-container">
               <figure>
                  <video class="video" id="bVideo" loop="" style="width: 100% !important;" height="100%" poster="{{ url('/uploads').'/'.getAllValueWithMeta('section1_video_poster', 'login') }}">
                     <source src="{{ url('/uploads').'/'.getAllValueWithMeta('section1_video', 'login') }}" type="video/mp4">
                  </video>
                  <div id="playButton" class="playButton" onclick="playPause()">
                     <span><i class="fas fa-play-circle"></i></span>
                  </div>
               </figure>
            </div>
         </div>
      </div>
   </div>
</section>

<section class="testimonial">
   <div class="container aos-init" data-aos="fade-left" data-aos-duration="3000">
      <div class="sec-heading text-center">
         <h2>{{ getAllValueWithMeta('section2_title', 'login') }}</h2>
      </div>
      <div class="test owl-carousel owl-theme owl-loaded owl-drag">
         
         
         
      <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-4480px, 0px, 0px); transition: all 0.25s ease 0s; width: 7840px;"><div class="owl-item cloned" style="width: 1110px; margin-right: 10px;"><div class="item">
            <div class="wrap">
               <figure>
                  <img class="commas" src="/frontend/images/commas.png" alt="">
                  <img src="/frontend/images/test.png" alt="">
               </figure>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
               <p class="name">John Smith</p>
            </div>
         </div></div><div class="owl-item cloned" style="width: 1110px; margin-right: 10px;"><div class="item">
            <div class="wrap">
               <figure>
                  <img class="commas" src="/frontend/images/commas.png" alt="">
                  <img src="/frontend/images/test.png" alt="">
               </figure>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
               <p class="name">John Smith</p>
            </div>
         </div></div><div class="owl-item" style="width: 1110px; margin-right: 10px;"><div class="item">
            <div class="wrap">
               <figure>
                  <img class="commas" src="/frontend/images/commas.png" alt="">
                  <img src="/frontend/images/test.png" alt="">
               </figure>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
               <p class="name">John Smith</p>
            </div>
         </div></div><div class="owl-item" style="width: 1110px; margin-right: 10px;"><div class="item">
            <div class="wrap">
               <figure>
                  <img class="commas" src="/frontend/images/commas.png" alt="">
                  <img src="/frontend/images/test.png" alt="">
               </figure>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
               <p class="name">John Smith</p>
            </div>
         </div></div><div class="owl-item active" style="width: 1110px; margin-right: 10px;"><div class="item">
            <div class="wrap">
               <figure>
                  <img class="commas" src="/frontend/images/commas.png" alt="">
                  <img src="/frontend/images/test.png" alt="">
               </figure>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
               <p class="name">John Smith</p>
            </div>
         </div></div><div class="owl-item cloned" style="width: 1110px; margin-right: 10px;"><div class="item">
            <div class="wrap">
               <figure>
                  <img class="commas" src="/frontend/images/commas.png" alt="">
                  <img src="/frontend/images/test.png" alt="">
               </figure>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
               <p class="name">John Smith</p>
            </div>
         </div></div><div class="owl-item cloned" style="width: 1110px; margin-right: 10px;"><div class="item">
            <div class="wrap">
               <figure>
                  <img class="commas" src="/frontend/images/commas.png" alt="">
                  <img src="/frontend/images/test.png" alt="">
               </figure>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
               <p class="name">John Smith</p>
            </div>
         </div></div></div></div><div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div><div class="owl-dots"><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot active"><span></span></button></div></div>
   </div>
</section>
 
 
@endsection



@section('scripts')

<script type="text/javascript" src="{{url('/frontend/js/register.js')}}"></script>

@endsection