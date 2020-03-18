@extends('layouts.home')

@section('title') {{ getAllValueWithMeta('meta_title', 'homepage') }} @endsection
@section('description') {{ getAllValueWithMeta('meta_description', 'homepage') }} @endsection
@section('keywords') {{ getAllValueWithMeta('meta_keyword', 'homepage') }} @endsection

@section('content')
<!-- side toggle calender sec starts here -->
<!-- side toggle calender sec starts here -->
<!-- banner section starts here here -->
<!-- user status sidebar -->
<a href="javascript:void(0);" id="user-status"><i class="fas fa-user-clock"></i></a>
<aside class="user-status-content">
  <div class="sidebar-header">
  	 <h3>User Status</h3>
  	 <a href="javascript:void(0);" class="close-sidebar"><i class="fas fa-times-circle"></i></a>
  </div>	
</aside>
<!-- user status sidebar Ends here -->

<section class="main-banner home-main-banner" style="background:url({{$slider_video_url ? url('/uploads').'/'.$slider_video_url : '/frontend/images/banner-bg.png'}});">
   <div class="container">
      <video src="{{$slider_video_url ? url('/uploads').'/'.$slider_video_url : '/frontend/videos/background-vdo.mp4'}}" autoplay muted loop></video>
      <div class="banner-content">
         <h1>{{$slider_title}}</h1>
         <p>{{$slider_tagline}}</p>
         <a href="{{$slider_button_url}}" class="cstm-btn solid-btn">{{$slider_button_title}}</a>
      </div>
   </div>
</section>
<!-- banner section starts Ends here -->
<!--Tabs Section starts here-->



@include('home.includes.homepage_search')

<!--Tabs Section ends here-->
<!--Popular event starts here-->
<section class="home-event-types" style="background:url('/frontend/images/event-back.png');">
   <div class="container">
      <div class="sec-heading text-center">
         <h4>{{ $section1_title }}</h4>
         <h2>{{ $section1_tagline }}</h2>
      </div>
      <!--Row One-->
      <div class="event-slider owl-carousel owl-theme owl-loaded owl-drag" id="event-slider-1">
         <div class="item">
            <a href="javascript:void(0)">
               <div class="event-wrap">
                  <figure>
                     <img src="/frontend/images/vendor-03.png">
                  </figure>
                  <h3>Wedding</h3>
               </div>
            </a>
         </div>
         <div class="item">
            <a href="javascript:void(0)">
               <div class="event-wrap">
                  <figure>
                     <img src="/frontend/images/vendor-03.png">
                  </figure>
                  <h3>Retreat</h3>
               </div>
            </a>
         </div>
         <div class="item">
            <a href="javascript:void(0)">
               <div class="event-wrap">
                  <figure>
                     <img src="/frontend/images/vendor-03.png">
                  </figure>
                  <h3>Team Building</h3>
               </div>
            </a>
         </div>
         <div class="item">
            <a href="javascript:void(0)">
               <div class="event-wrap">
                  <figure>
                     <img src="/frontend/images/vendor-03.png">
                  </figure>
                  <h3>Reception</h3>
               </div>
            </a>
         </div>
         <div class="item">
            <a href="javascript:void(0)">
               <div class="event-wrap">
                  <figure>
                     <img src="/frontend/images/vendor-03.png">
                  </figure>
                  <h3>Baby Shower</h3>
               </div>
            </a>
         </div>
         <div class="item">
            <a href="javascript:void(0)">
               <div class="event-wrap">
                  <figure>
                     <img src="/frontend/images/vendor-03.png">
                  </figure>
                  <h3>Date Night</h3>
               </div>
            </a>
         </div>
         <div class="item">
            <a href="javascript:void(0)">
               <div class="event-wrap">
                  <figure>
                     <img src="/frontend/images/vendor-03.png">
                  </figure>
                  <h3>Birth Day</h3>
               </div>
            </a>
         </div>
         <div class="item">
            <a href="javascript:void(0)">
               <div class="event-wrap">
                  <figure>
                     <img src="/frontend/images/vendor-03.png">
                  </figure>
                  <h3>Sports Events (Golf)</h3>
               </div>
            </a>
         </div>
         <div class="item">
            <a href="javascript:void(0)">
               <div class="event-wrap">
                  <figure>
                     <img src="/frontend/images/vendor-03.png">
                  </figure>
                  <h3>Meetup</h3>
               </div>
            </a>
         </div>
         <div class="item">
            <a href="javascript:void(0)">
               <div class="event-wrap">
                  <figure>
                     <img src="/frontend/images/vendor-03.png">
                  </figure>
                  <h3>Product Launching</h3>
               </div>
            </a>
         </div>
         <div class="item">
            <a href="javascript:void(0)">
               <div class="event-wrap">
                  <figure>
                     <img src="/frontend/images/vendor-03.png">
                  </figure>
                  <h3>Graduations</h3>
               </div>
            </a>
         </div>
         <div class="item">
            <a href="javascript:void(0)">
               <div class="event-wrap">
                  <figure>
                     <img src="/frontend/images/vendor-03.png">
                  </figure>
                  <h3>Seminars and Conference</h3>
               </div>
            </a>
         </div>
         <div class="item">
            <a href="javascript:void(0)">
               <div class="event-wrap">
                  <figure>
                     <img src="/frontend/images/vendor-03.png">
                  </figure>
                  <h3>Conclave</h3>
               </div>
            </a>
         </div>
         <div class="item">
            <a href="javascript:void(0)">
               <div class="event-wrap">
                  <figure>
                     <img src="/frontend/images/vendor-03.png">
                  </figure>
                  <h3>Concert</h3>
               </div>
            </a>
         </div>
      </div>
      <!--Row Two-->
      <div class="event-slider owl-carousel owl-theme owl-loaded owl-drag">
         <div class="item">
            <a href="javascript:void(0)">
               <div class="event-wrap">
                  <figure>
                     <img src="/frontend/images/vendor-03.png">
                  </figure>
                  <h3>Conventions (Breakout Sessions)</h3>
               </div>
            </a>
         </div>
         <div class="item">
            <a href="javascript:void(0)">
               <div class="event-wrap">
                  <figure>
                     <img src="/frontend/images/vendor-03.png">
                  </figure>
                  <h3>Gala and Appreciation Events</h3>
               </div>
            </a>
         </div>
         <div class="item">
            <a href="javascript:void(0)">
               <div class="event-wrap">
                  <figure>
                     <img src="/frontend/images/vendor-03.png">
                  </figure>
                  <h3>Cookout</h3>
               </div>
            </a>
         </div>
         <div class="item">
            <a href="javascript:void(0)">
               <div class="event-wrap">
                  <figure>
                     <img src="/frontend/images/vendor-03.png">
                  </figure>
                  <h3>Meetings</h3>
               </div>
            </a>
         </div>
         <div class="item">
            <a href="javascript:void(0)">
               <div class="event-wrap">
                  <figure>
                     <img src="/frontend/images/vendor-03.png">
                  </figure>
                  <h3>Parties (Lunch/Dinner)</h3>
               </div>
            </a>
         </div>
         <div class="item">
            <a href="javascript:void(0)">
               <div class="event-wrap">
                  <figure>
                     <img src="/frontend/images/vendor-03.png">
                  </figure>
                  <h3>Funeral</h3>
               </div>
            </a>
         </div>
         <div class="item">
            <a href="javascript:void(0)">
               <div class="event-wrap">
                  <figure>
                     <img src="/frontend/images/vendor-03.png">
                  </figure>
                  <h3>Workshop/Classes</h3>
               </div>
            </a>
         </div>
         <div class="item">
            <a href="javascript:void(0)">
               <div class="event-wrap">
                  <figure>
                     <img src="/frontend/images/vendor-03.png">
                  </figure>
                  <h3>Networking</h3>
               </div>
            </a>
         </div>
         <div class="item">
            <a href="javascript:void(0)">
               <div class="event-wrap">
                  <figure>
                     <img src="/frontend/images/vendor-03.png">
                  </figure>
                  <h3>VIP Experience</h3>
               </div>
            </a>
         </div>
         <div class="item">
            <a href="javascript:void(0)">
               <div class="event-wrap">
                  <figure>
                     <img src="/frontend/images/vendor-03.png">
                  </figure>
                  <h3>Bridal Shower</h3>
               </div>
            </a>
         </div>
         <div class="item">
            <a href="javascript:void(0)">
               <div class="event-wrap">
                  <figure>
                     <img src="/frontend/images/vendor-03.png">
                  </figure>
                  <h3>Trade Shows/Expos</h3>
               </div>
            </a>
         </div>
         <div class="item">
            <a href="javascript:void(0)">
               <div class="event-wrap">
                  <figure>
                     <img src="/frontend/images/vendor-03.png">
                  </figure>
                  <h3>Trade Fair/Job Fairs</h3>
               </div>
            </a>
         </div>
         <div class="item">
            <a href="javascript:void(0)">
               <div class="event-wrap">
                  <figure>
                     <img src="/frontend/images/vendor-03.png">
                  </figure>
                  <h3>Business Expos</h3>
               </div>
            </a>
         </div>
         <div class="item">
            <a href="javascript:void(0)">
               <div class="event-wrap">
                  <figure>
                     <img src="/frontend/images/vendor-03.png">
                  </figure>
                  <h3>Anniversaries</h3>
               </div>
            </a>
         </div>
         <div class="item">
            <a href="javascript:void(0)">
               <div class="event-wrap">
                  <figure>
                     <img src="/frontend/images/vendor-03.png">
                  </figure>
                  <h3>Family Get-together /Family Events</h3>
               </div>
            </a>
         </div>
         <div class="item">
            <a href="javascript:void(0)">
               <div class="event-wrap">
                  <figure>
                     <img src="/frontend/images/vendor-03.png">
                  </figure>
                  <h3>Others</h3>
               </div>
            </a>
         </div>
      </div>
   </div>
</section>
<!--Popular event ends here-->
<!-- Plan togather section starts here -->
<section class="plan-togather-sec">
   <div class="budget-plan-banner" style="background: url({{ $section2_image ? url('/uploads').'/'.$section2_image : '/frontend/images/budget-plan-bg.png' }});">
      <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000">
         <div class="sec-heading text-center">
            <h4>{{ $section2_title }}</h4>
            <h2>{{ $section2_tagline }}</h2>
         </div>
         <div class="budget-btn-wrap text-center">
            <a href="javascript:void(0);" class="budget-btn">
               <span class="bdgt-icon"><img src="/frontend/images/budget-plan-icon.png"></span>
               <h3>{{$section2_image_tagline}}</h3>
               <span class="down-indi-arrow">
               <img src="/frontend/images/down-lg-arrow.png">
               </span>
            </a>
         </div>
      </div>
   </div>
   <div class="budget-packages-container">
      <div class="container">
         <div class="sec-card">
            <div class="tab-wrap aos-init aos-animate" data-aos="fade-down" data-aos-duration="3000">
               <div class="packages-slider owl-carousel owl-theme">
                  <div class="item">
                     <div class="tab-button">
                        <div class="package-item wow bounceInDown" data-wow-delay="500ms">
                           <a href="javascript:void();" data-tag="t-one" class="activelink">
                              <span class="service-icon">                     
                                 <img class="category_icon" src="/frontend/images/venue.png">
                              </span>
                              <h3>Venues</h3>
                           </a>
                        </div>
                     </div>
                  </div>
                  <div class="item">
                     <div class="tab-button">
                        <div class="package-item wow bounceInDown" data-wow-delay="1000ms">
                           <a href="javascript:void();" data-tag="t-two" class="">
                              <span class="service-icon">
                                 <img class="category_icon" src="/frontend/images/photography.png">
                              </span>
                              <h3>Photography</h3>
                           </a>
                        </div>
                     </div>
                  </div>
                  <div class="item">
                     <div class="tab-button">
                        <div class="package-item wow bounceInDown" data-wow-delay="1500ms">
                           <a href="javascript:void();" data-tag="t-three" class="">
                              <span class="service-icon">
                                 <img class="category_icon" src="/frontend/images/catering.png">
                              </span>
                              <h3>caterers</h3>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="tab-content">
               <!-- tab 1 content -->
               <div class="tab-data" id="t-one">
                  <div class="row packages-row aos-init aos-animate" data-aos="fade-left" data-aos-duration="3000">
                     <div class="col-lg-3 col-md-4">
                        <a href="javascript:void(0);" class="main-package-card">
                           <figure>
                              <img src="/frontend/images/package-img-1.png">
                           </figure>
                           <figcaption class="text-center">
                              <h3 class="pkg-heading">town rec. centre</h3>
                              <h4 class="pkg-price">$100.00</h4>
                           </figcaption>
                           <span class="distance">
                              <h4>25</h4>
                              <p> Miles</p>
                           </span>
                        </a>
                     </div>
                     <div class="col-lg-3 col-md-4">
                        <a href="javascript:void(0);" class="main-package-card">
                           <figure>
                              <img src="/frontend/images/package-img-2.png">
                           </figure>
                           <figcaption class="text-center">
                              <h3 class="pkg-heading">First Bapist Church</h3>
                              <h4 class="pkg-price">$100.00</h4>
                           </figcaption>
                           <span class="distance">
                              <h4>30</h4>
                              <p> Miles</p>
                           </span>
                        </a>
                     </div>
                     <div class="col-lg-3 col-md-4">
                        <a href="javascript:void(0);" class="main-package-card">
                           <figure>
                              <img src="/frontend/images/package-img-3.png">
                           </figure>
                           <figcaption class="text-center">
                              <h3 class="pkg-heading">Manassas Hall</h3>
                              <h4 class="pkg-price">$100.00</h4>
                           </figcaption>
                           <span class="distance">
                              <h4>10</h4>
                              <p> Miles</p>
                           </span>
                        </a>
                     </div>
                     <div class="col-lg-3 col-md-4">
                        <a href="javascript:void(0);" class="main-package-card">
                           <figure>
                              <img src="/frontend/images/package-img-4.png">
                           </figure>
                           <figcaption class="text-center">
                              <h3 class="pkg-heading">rockledge Mansion</h3>
                              <h4 class="pkg-price">$100.00</h4>
                           </figcaption>
                           <span class="distance">
                              <h4>5</h4>
                              <p> Miles</p>
                           </span>
                        </a>
                     </div>
                  </div>
                  <div class="price-card aos-init aos-animate" data-aos="fade-rigth" data-aos-duration="3000">
                     <div class="cal-content">
                        <div class="row">
                           <div class="col-lg-4">
                              <div class="selected-ser-card selected text-center">
                                 <span class="service-icon"><i class="fas fa-utensils"></i></span>
                                 <div class="prc-heading">
                                    <h3>Town Rec. Centre</h3>
                                    <h4 class="price">$100.00</h4>
                                 </div>
                                 <span class="calc-icon">+</span>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="selected-ser-card text-center">
                                 <span class="service-icon"><i class="fas fa-camera"></i></span>
                                 <div class="prc-heading">
                                    <h3>Select Photography</h3>
                                 </div>
                                 <span class="calc-icon">+</span>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="selected-ser-card text-center">
                                 <span class="service-icon"><i class="fas fa-stop"></i></span>
                                 <div class="prc-heading">
                                    <h3>Select Caterers</h3>
                                 </div>
                                 <span class="calc-icon">=</span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="total-price-col">
                        <div class="price-content">
                           <div class="total-price">
                              <label>Total:<span class="t-amount">$100.00</span>
                              </label>
                           </div>
                           <a href="javascript:void(0);" class="cstm-btn solid-btn book-now-btn">Book Now</a>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- tab 2 content -->
               <div class="tab-data hide" id="t-two">
                  <div class="row packages-row">
                     <div class="col-lg-3 col-md-4">
                        <a href="javascript:void(0);" class="main-package-card">
                           <figure>
                              <img src="/frontend/images/package-img-1.png">
                           </figure>
                           <figcaption class="text-center">
                              <h3 class="pkg-heading">town rec. centre</h3>
                              <h4 class="pkg-price">$100.00</h4>
                           </figcaption>
                           <span class="distance">
                              <h4>25</h4>
                              <p> Miles</p>
                           </span>
                        </a>
                     </div>
                     <div class="col-lg-3 col-md-4">
                        <a href="javascript:void(0);" class="main-package-card">
                           <figure>
                              <img src="/frontend/images/package-img-2.png">
                           </figure>
                           <figcaption class="text-center">
                              <h3 class="pkg-heading">First Bapist Church</h3>
                              <h4 class="pkg-price">$100.00</h4>
                           </figcaption>
                           <span class="distance">
                              <h4>30</h4>
                              <p> Miles</p>
                           </span>
                        </a>
                     </div>
                     <div class="col-lg-3 col-md-4">
                        <a href="javascript:void(0);" class="main-package-card">
                           <figure>
                              <img src="/frontend/images/package-img-3.png">
                           </figure>
                           <figcaption class="text-center">
                              <h3 class="pkg-heading">Manassas Hall</h3>
                              <h4 class="pkg-price">$100.00</h4>
                           </figcaption>
                           <span class="distance">
                              <h4>10</h4>
                              <p> Miles</p>
                           </span>
                        </a>
                     </div>
                     <div class="col-lg-3 col-md-4">
                        <a href="javascript:void(0);" class="main-package-card">
                           <figure>
                              <img src="/frontend/images/package-img-4.png">
                           </figure>
                           <figcaption class="text-center">
                              <h3 class="pkg-heading">rockledge Mansion</h3>
                              <h4 class="pkg-price">$100.00</h4>
                           </figcaption>
                           <span class="distance">
                              <h4>5</h4>
                              <p> Miles</p>
                           </span>
                        </a>
                     </div>
                  </div>
                  <div class="price-card">
                     <div class="cal-content">
                        <div class="row">
                           <div class="col-lg-4">
                              <div class="selected-ser-card selected text-center">
                                 <span class="service-icon"><i class="fas fa-utensils"></i></span>
                                 <div class="prc-heading">
                                    <h3>Town Rec. Centre</h3>
                                    <h4 class="price">$100.00</h4>
                                 </div>
                                 <span class="calc-icon">+</span>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="selected-ser-card text-center">
                                 <span class="service-icon"><i class="fas fa-camera"></i></span>
                                 <div class="prc-heading">
                                    <h3>Select Photography</h3>
                                 </div>
                                 <span class="calc-icon">+</span>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="selected-ser-card text-center">
                                 <span class="service-icon"><i class="fas fa-stop"></i></span>
                                 <div class="prc-heading">
                                    <h3>Select Caterers</h3>
                                 </div>
                                 <span class="calc-icon">=</span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="total-price-col">
                        <div class="price-content">
                           <div class="total-price">
                              <label>Total:<span class="t-amount">$100.00</span>
                              </label>
                           </div>
                           <a href="javascript:void(0);" class="cstm-btn solid-btn book-now-btn">Book Now</a>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- tab 3 content -->
               <div class="tab-data hide" id="t-three">
                  <div class="row packages-row">
                     <div class="col-lg-3 col-md-4">
                        <a href="javascript:void(0);" class="main-package-card">
                           <figure>
                              <img src="/frontend/images/package-img-1.png">
                           </figure>
                           <figcaption class="text-center">
                              <h3 class="pkg-heading">town rec. centre</h3>
                              <h4 class="pkg-price">$100.00</h4>
                           </figcaption>
                           <span class="distance">
                              <h4>25</h4>
                              <p> Miles</p>
                           </span>
                        </a>
                     </div>
                     <div class="col-lg-3 col-md-4">
                        <a href="javascript:void(0);" class="main-package-card">
                           <figure>
                              <img src="/frontend/images/package-img-2.png">
                           </figure>
                           <figcaption class="text-center">
                              <h3 class="pkg-heading">First Bapist Church</h3>
                              <h4 class="pkg-price">$100.00</h4>
                           </figcaption>
                           <span class="distance">
                              <h4>30</h4>
                              <p> Miles</p>
                           </span>
                        </a>
                     </div>
                     <div class="col-lg-3 col-md-4">
                        <a href="javascript:void(0);" class="main-package-card">
                           <figure>
                              <img src="/frontend/images/package-img-3.png">
                           </figure>
                           <figcaption class="text-center">
                              <h3 class="pkg-heading">Manassas Hall</h3>
                              <h4 class="pkg-price">$100.00</h4>
                           </figcaption>
                           <span class="distance">
                              <h4>10</h4>
                              <p> Miles</p>
                           </span>
                        </a>
                     </div>
                     <div class="col-lg-3 col-md-4">
                        <a href="javascript:void(0);" class="main-package-card">
                           <figure>
                              <img src="/frontend/images/package-img-4.png">
                           </figure>
                           <figcaption class="text-center">
                              <h3 class="pkg-heading">rockledge Mansion</h3>
                              <h4 class="pkg-price">$100.00</h4>
                           </figcaption>
                           <span class="distance">
                              <h4>5</h4>
                              <p> Miles</p>
                           </span>
                        </a>
                     </div>
                  </div>
                  <div class="price-card">
                     <div class="cal-content">
                        <div class="row">
                           <div class="col-lg-4">
                              <div class="selected-ser-card selected text-center">
                                 <span class="service-icon"><i class="fas fa-utensils"></i></span>
                                 <div class="prc-heading">
                                    <h3>Town Rec. Centre</h3>
                                    <h4 class="price">$100.00</h4>
                                 </div>
                                 <span class="calc-icon">+</span>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="selected-ser-card text-center">
                                 <span class="service-icon"><i class="fas fa-camera"></i></span>
                                 <div class="prc-heading">
                                    <h3>Select Photography</h3>
                                 </div>
                                 <span class="calc-icon">+</span>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="selected-ser-card text-center">
                                 <span class="service-icon"><i class="fas fa-stop"></i></span>
                                 <div class="prc-heading">
                                    <h3>Select Caterers</h3>
                                 </div>
                                 <span class="calc-icon">=</span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="total-price-col">
                        <div class="price-content">
                           <div class="total-price">
                              <label>Total:<span class="t-amount">$100.00</span>
                              </label>
                           </div>
                           <a href="javascript:void(0);" class="cstm-btn solid-btn book-now-btn">Book Now</a>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- tab 4 content -->
               <div class="tab-data hide" id="t-four">
                  <div class="row packages-row">
                     <div class="col-lg-3 col-md-4">
                        <a href="javascript:void(0);" class="main-package-card">
                           <figure>
                              <img src="/frontend/images/package-img-1.png">
                           </figure>
                           <figcaption class="text-center">
                              <h3 class="pkg-heading">town rec. centre</h3>
                              <h4 class="pkg-price">$100.00</h4>
                           </figcaption>
                           <span class="distance">
                              <h4>25</h4>
                              <p> Miles</p>
                           </span>
                        </a>
                     </div>
                     <div class="col-lg-3 col-md-4">
                        <a href="javascript:void(0);" class="main-package-card">
                           <figure>
                              <img src="/frontend/images/package-img-2.png">
                           </figure>
                           <figcaption class="text-center">
                              <h3 class="pkg-heading">First Bapist Church</h3>
                              <h4 class="pkg-price">$100.00</h4>
                           </figcaption>
                           <span class="distance">
                              <h4>30</h4>
                              <p> Miles</p>
                           </span>
                        </a>
                     </div>
                     <div class="col-lg-3 col-md-4">
                        <a href="javascript:void(0);" class="main-package-card">
                           <figure>
                              <img src="/frontend/images/package-img-3.png">
                           </figure>
                           <figcaption class="text-center">
                              <h3 class="pkg-heading">Manassas Hall</h3>
                              <h4 class="pkg-price">$100.00</h4>
                           </figcaption>
                           <span class="distance">
                              <h4>10</h4>
                              <p> Miles</p>
                           </span>
                        </a>
                     </div>
                     <div class="col-lg-3 col-md-4">
                        <a href="javascript:void(0);" class="main-package-card">
                           <figure>
                              <img src="/frontend/images/package-img-4.png">
                           </figure>
                           <figcaption class="text-center">
                              <h3 class="pkg-heading">rockledge Mansion</h3>
                              <h4 class="pkg-price">$100.00</h4>
                           </figcaption>
                           <span class="distance">
                              <h4>5</h4>
                              <p> Miles</p>
                           </span>
                        </a>
                     </div>
                  </div>
                  <div class="price-card">
                     <div class="cal-content">
                        <div class="row">
                           <div class="col-lg-4">
                              <div class="selected-ser-card selected text-center">
                                 <span class="service-icon"><i class="fas fa-utensils"></i></span>
                                 <div class="prc-heading">
                                    <h3>Town Rec. Centre</h3>
                                    <h4 class="price">$100.00</h4>
                                 </div>
                                 <span class="calc-icon">+</span>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="selected-ser-card text-center">
                                 <span class="service-icon"><i class="fas fa-camera"></i></span>
                                 <div class="prc-heading">
                                    <h3>Select Photography</h3>
                                 </div>
                                 <span class="calc-icon">+</span>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="selected-ser-card text-center">
                                 <span class="service-icon"><i class="fas fa-stop"></i></span>
                                 <div class="prc-heading">
                                    <h3>Select Caterers</h3>
                                 </div>
                                 <span class="calc-icon">=</span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="total-price-col">
                        <div class="price-content">
                           <div class="total-price">
                              <label>Total:<span class="t-amount">$100.00</span>
                              </label>
                           </div>
                           <a href="javascript:void(0);" class="cstm-btn solid-btn book-now-btn">Book Now</a>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- tab 5 content -->
               <div class="tab-data hide" id="t-five">
               </div>
               <!-- tab 6 content -->
               <div class="tab-data hide" id="six">
                  <form class="services-form">
                     <div class="row">
                        <div class="col-lg-4">
                           <div class="form-group">
                              <input type="text" id="" class="form-control" placeholder="Location">
                              <span class="input-icon"><i class="fas fa-map-marker-alt"></i></span>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <input type="text" id="" class="form-control" placeholder="Event Type">
                              <span class="input-icon"><i class="fas fa-glass-cheers"></i></span>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <input type="text" id="" class="form-control" placeholder="Suggested Vendor">
                              <span class="input-icon"><i class="fas fa-user"></i></span>
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="form-group">
                              <input type="text" id="" class="form-control" placeholder="Amenties">
                              <span class="input-icon"><i class="fas fa-concierge-bell"></i></span>
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="form-group">
                              <input type="text" id="" class="form-control" placeholder="Guest#">
                              <span class="input-icon"><i class="fas fa-map-marker-alt"></i></span>
                           </div>
                        </div>
                     </div>
                     <div class="btn-wrap text-center">
                        <a href="{{url(route('home_vendor_listing_page'))}}" class="cstm-btn solid-btn">Search <span><i class="fas fa-search"></i></span></a>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Plan togather section ends here -->
<!-- How its work section starts here -->
<section class="how-its-work-sec">
   <div class="container aos-init aos-animate" data-aos="fade-right" data-aos-duration="3000">
      <div class="sec-heading text-center">
         <h4>{{$section3_title}}</h4>
         <h2>{{$section3_tagline}}</h2>
      </div>
      <div class="row">
         <div class="col-lg-10 offset-lg-1">
            <div class="video-container">
               <figure>
                  <video class="video" id="bVideo" loop="" width="100%" height="100%" poster="{{ $section3_video_poster ? url('/uploads').'/'.$section3_video_poster : '/frontend/images/video-poster.png'}}">
                     <source src="{{ $section3_video ? url('/uploads').'/'.$section3_video : '/frontend/videos/Dummy Video.mp4' }}" type="video/mp4">
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
<!-- How its work section ends here -->
<!--Get to knw section starts here-->
<section class="home-get" style="background: url( {{ $section4_image ? url('/uploads').'/'.$section4_image : '/frontend/images/budget-plan-bg.png' }});">
   <div class="container">
      <div class="sec-heading text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000">
         <h4>{{$section4_title1}}</h4>
         <h2>{{$section4_tagline1}}</h2>
      </div>
      <div class="aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000">
      <p>{{$section4_description}}</p>
      <p class="get-text">
         <span>{{$section4_title2}}</span>{{$section4_tagline2}}
      </p>
      <a href="{{$section4_button_url}}" class="cstm-btn solid-btn">
      {{$section4_button_title}}
      </a>
     </div>
   </div>
</section>
<!--Get to knw section ends here-->
<!--Testimonial Page starts here-->
<section class="testimonial">
   <div class="container aos-init aos-animate" data-aos="fade-left" data-aos-duration="3000">
      <div class="sec-heading text-center">
         <h2>{{$section5_title}}</h2>
      </div>
      <div class="test owl-carousel owl-theme owl-loaded owl-drag">
         <div class="item">
            <div class="wrap">
               <figure>
                  <img class="commas" src="/frontend/images/commas.png" alt="" />
                  <img src="/frontend/images/test.png" alt="" />
               </figure>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
               <p class="name">John Smith</p>
            </div>
         </div>
         <div class="item">
            <div class="wrap">
               <figure>
                  <img class="commas" src="/frontend/images/commas.png" alt="" />
                  <img src="/frontend/images/test.png" alt="" />
               </figure>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
               <p class="name">John Smith</p>
            </div>
         </div>
         <div class="item">
            <div class="wrap">
               <figure>
                  <img class="commas" src="/frontend/images/commas.png" alt="" />
                  <img src="/frontend/images/test.png" alt="" />
               </figure>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
               <p class="name">John Smith</p>
            </div>
         </div>
      </div>
   </div>
</section>


@endsection

@section('scripts')




<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAg4nmuh6JxGuULACc9L6AllFwIhCqjL4&libraries=places&callback=initAutocomplete"
        async defer> -->

 <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDULjv0UAVmj_zgc9GjBhJNh9fNuEj87LQ&libraries=places"></script>
   

<script type="text/javascript" src="{{url('js/validations/home_searching.js')}}"></script>

<script>
 
   $( document ).ready(function() {

      setTimeout(() => {
     // jQuery().find('.custom-loading').hide();
         $('#event-slider-1').css('display', 'block');   
      }, 1500)
});
</script>

@endsection
