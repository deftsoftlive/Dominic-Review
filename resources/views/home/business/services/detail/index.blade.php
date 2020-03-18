@extends('layouts.home')
@section('stylesheet')

 <style type="text/css">



 </style>
@endsection
@section('content')
<section class="log-sign-banner" style="background:url('/frontend/images/banner-bg.png');">
   <div class="container">
      <div class="page-title text-center">
         <h1>{{getBasicInfo($vendor->vendors->id, $vendor->category_id,'basic_information','business_name')}}</h1>
      </div>
   </div>
</section>

<section class="vendor-detail-header">
   <div class="container lr-container">
      <div class="sec-card">
         <div class="page-head">
            <div class="row">
               <div class="col-lg-9 col-md-8">
                   <div class="row">
                     <div class="col-lg-7">
                  <div class="page-header">
                     <figure class="head-logo">
                        <img src="{{url(getBasicInfo($vendor->vendors->id, $vendor->category_id,'basic_information','cover_photo'))}}">
                     </figure>
                     <div class="heading-details">
                        <h2>{{getBasicInfo($vendor->vendors->id, $vendor->category_id,'basic_information','business_name')}}</h2>
                        <p class="address-line"><span class="location-icon"><i class="fas fa-map-marker-alt"></i></span><?= getBasicInfo($vendor->vendors->id, $vendor->category_id,'basic_information','address')?></p>
                        <ul class="contact-links">
                          <li><a href="tel:{{getBasicInfo($vendor->vendors->id, $vendor->category_id,'basic_information','phone_number')}}" data-toggle="tooltip" title="Call {{getBasicInfo($vendor->vendors->id, $vendor->category_id,'basic_information','business_name')}}"><span class="contact-icons"><i class="fas fa-mobile-alt"></i></span></a></li>
                          <li><a target="_blank" href="{{getBasicInfo($vendor->vendors->id, $vendor->category_id,'basic_information','Visit Website')}}" data-toggle="tooltip" title="Website"><span class="contact-icons"><i class="fas fa-globe-americas"></i></span></a></li>                          
                        </ul>                        
                     </div>                  

                  </div>
               </div>

                  <div class="col-lg-5">
                  <!-- weather details for venues -->
                     @include('home.vendors.services.detail.weather')

               </div>
                  
               </div>
            </div>
               


 

 
              <div class="col-lg-3 col-md-4 sticky-form-sidebar">
                  <div class="cstm-btn-grp text-right">
                     <a href="javascript:void(0);" class="cstm-btn"><span class="btn-icon"><i class="fas fa-handshake"></i></span> Hired?</a>
                     <!-- <a href="javascript:void(0);" class="cstm-btn"><span class="btn-icon"><i class="fas fa-heart"></i></span> Save</a> -->
                  </div>
                  <div class="share-icons-wrap">
                     <ul class="social-icons">
                        <li>
                           <a target="_blank" href="<?= \Share::load(url()->full(),$vendor->title)->facebook() ?>">
                           <img src="https://yauzer.com/images/icon-fb.png" alt="Facebook">
                        </a>
                       </li>
                        <li>
                           <a target="_blank" href="<?= \Share::load(url()->full(),$vendor->title)->twitter() ?>">
                              <img src="https://yauzer.com/images/icon-twitter.png" alt="Twitter">
                           </a>
                        </li>
                        <li>
                           <a target="_blank" href="<?= \Share::load(url()->full(),$vendor->title)->gplus() ?>">
                              <img src="https://yauzer.com/images/icon-gplus.png" alt="Google Plus">
                           </a>
                        </li>
                        <li>
                           <a target="_blank" href="<?= \Share::load(url()->full(),$vendor->title)->linkedin() ?>">
                              <img src="https://yauzer.com/images/linkedin-icon.png" alt="Linkedin">
                           </a>
                        </li>
                        <li>
                           <a target="_blank" href="<?= \Share::load(url()->full(),$vendor->title)->pinterest() ?>">
                              <img src="https://yauzer.com/images/icon-Pinterest.png" alt="Pinterest">
                           </a>
                        </li>
                     </ul>
                      
                  </div>
               </div>
               
            </div>
         </div>
      <div class="deatil-navigation-wrap">
         
         <div class="owl-carousel owl-theme nav-menu-slider">
            <div class="item">
               <a href="#" data-scroll="image-gallery">
                    Photos
               </a>
            </div>
            <div class="item">
               <a href="#faq-sec" data-scroll="faq-sec">
                  FAQs
               </a>
            </div>
            <div class="item">
               <a href="#venue-sec" data-scroll="venue-sec">
                 Venue
               </a>
            </div>
            <div class="item">
               <a href="#description-sec" data-scroll="description-sec">
                  Description
               </a>
            </div>
            <div class="item">
               <a href="#AmenitiesGames-sec" data-scroll="AmenitiesGames-sec">
                Amenities and Games
               </a>
            </div>
            <div class="item">
               <a href="#deals-sec" data-scroll="deals-sec">
                  Deals
               </a>
            </div>
            <div class="item">
               <a href="#review-sec" data-scroll="review-sec">
                   Reviews
               </a>
            </div>
            <div class="item">
              <a href="#package-sec" data-scroll="package-sec">  Packages</a>
            </div>            
         </div>
      </div>
   </div>
   </div>
   </div>
</section>
<div class="main-detail">
   <div class="container lr-container">
      <div class="row">
         <div class="col-lg-8">
            @include('home.vendors.services.detail.gallery')
            <div class="faq-sec" id="faq-sec">
               <div class="pannel-card">
                  <div class="card-heading">
                     <h3>FAQ</h3>
                  </div>
                  <div class="faq-content">
                     @if($vendor->faqs->count() > 0)
                     @foreach($vendor->faqs as $faq)
                     <div class="faq-block">
                        <h4 class="faq-question"> <span class="que-count">Q:</span>{{$faq->question}}</h4>
                        <div class="faq-ans detail-listing">
                           <div class="faq_ans"><span class="ans-count">A:</span><?= $faq->answer ?></div>
                        </div>
                     </div>
                     @endforeach
                     @endif
                  </div>
               </div>
            </div>
            @include('home.vendors.services.detail.venue')
            <div class="summary-card" id="description-sec">
               <div class="pannel-card">
                  <div class="card-heading">
                     <h3>Description</h3>
                  </div>
                  <div class="summary-details-content">
                     <div class="summary-details detail-listing">
                        <?= ($vendor->description->count() > 0) ? $vendor->description->keyValue : 'No Description' ?>
                     </div>
                <?php
                  $facebook_url = getBasicInfo($vendor->vendors->id, $vendor->category_id,'basic_information','facebook_url');
                  $linkedin_url = getBasicInfo($vendor->vendors->id, $vendor->category_id,'basic_information','linkedin_url');
                  $twitter_url =  getBasicInfo($vendor->vendors->id, $vendor->category_id,'basic_information','twitter_url');
                  $instagram_url = getBasicInfo($vendor->vendors->id, $vendor->category_id,'basic_information','instagram_url');
                  $pinterest_url = getBasicInfo($vendor->vendors->id, $vendor->category_id,'basic_information','pinterest_url');

                  $followus = empty($facebook_url) && empty($linkedin_url) && empty($twitter_url) && empty($instagram_url) && empty($pinterest_url) ? 'hide' : '';
                ?> 
             <ul class="social-links listing-social {{$followus}}">
                        <li><p><strong>Follow us:</strong></p></li>
                  <li class="{{empty($facebook_url) ? 'hide' : ''}}">
                  <a href="<?= $facebook_url ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                  </li>
                  <li class="{{empty($linkedin_url)? 'hide' : ''}}">
                  <a href="<?= $linkedin_url ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                  </li>
                  <li class="{{empty($twitter_url) ? 'hide' : ''}}">
                  <a href="<?= $twitter_url ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                  </li>
                  <li class="{{empty($instagram_url) ? 'hide' : ''}}">
                  <a href="<?= $instagram_url ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                  </li>
                  <li class="{{empty($pinterest_url) ? 'hide' : ''}}">
                  <a href="<?= $pinterest_url ?>" target="_blank"><i class="fab fa-pinterest"></i></a>
                  </li>
                </ul>
                  </div>
               </div>
            </div>
            <!--  End -->
            <div class="Amenities-card" id="AmenitiesGames-sec">
               <div class="pannel-card">
                  <div class="card-heading">
                     <h3>Amenities and Games</h3>
                  </div>
                  <div class="Amenities-content">
                     <div class="row">
                        <div class="col-lg-6">
                           <h4 class="faq-question">Amenities</h4>
                           <ul class="detail-listing">
                            
                              @foreach($vendor->VendorAmenity as $game)
                              
                                     @if(getSeasonOfBusiness($game->amenity_id,$game->category_id,'amenity') > 0)
                                        <li>{{$game->amenity->name}}</li>
                                     @endif
                              @endforeach
                           </ul>
                        </div>
                        <div class="col-lg-6">
                           <h4 class="faq-question">Games</h4>
                           <ul class="detail-listing">
                                @foreach($vendor->VendorGames as $game)   
                                            @if(getSeasonOfBusiness($game->amenity_id,$game->category_id,'game') > 0)             
                                              <li>{{$game->amenity->name}}</li>
                                            @endif
                              @endforeach

                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="summary-card" id="description-sec">
               <div class="pannel-card">
                  <div class="card-heading">
                     <h3>Prohibtion & Restrictions</h3>
                  </div>
                  <div class="summary-details-content">
                     <div class="summary-details detail-listing">
                        <?= ($vendor->prohibtion->count() > 0) ? $vendor->prohibtion->keyValue : 'No Prohibtion & Restrictions' ?>
                     </div>
                  </div>
               </div>
            </div>
            <!-- ====================== -->
            <div class="Deals-card" id="deals-sec">
               <div class="pannel-card">
                  <div class="card-heading">
                     <h3>Deals and Discount</h3>
                  </div>
                  <div class="Deals-content">
                     @if($vendor->DealsDiscount->count() > 0)
                    
                       <?php
                           $name = Auth::check() && Auth::user()->role == "user" ? Auth::user()->name : '';
                            $email = Auth::check() && Auth::user()->role == "user" ? Auth::user()->email : '';
                            $phone = Auth::check() && Auth::user()->role == "user" ? Auth::user()->phone_number : '';
                            $event_date = '';



                            $discount_deals = $vendor->DealsDiscount->filter(function($d){
                               if($d->deal_life == 1 ){
                                    $cDate = strtotime(date('Y-m-d'));
                                    $start = strtotime($d->start_date);
                                    $end = strtotime($d->expiry_date);
                                    if($cDate >= $start && $cDate <= $end){
                                         return $d;
                                    }
                                   }elseif($d->deal_life == 0){
                                    return $d;
                                   }
                              
                               
                          });
                         ?>
                        @include('home.includes.deals.list')

                     @endif
                  </div>
               </div>
               <!--  ============================= -->
            </div>
            <!-- ============================ -->
            @include('home.vendors.services.detail.reviews')
         </div>
         <div class="col-lg-4">
            <aside>
       







        @include('home.includes.business-detail.requestForm')
        @include('home.includes.business-detail.recomendedBusiness')








            </aside>
         </div>
      </div>
   </div>
</div>
 


 
@include('home.includes.deals.package')
@include('home.includes.modals.cart_popup')
@include('home.includes.modals.chat')
@include('home.includes.modals.login')
@include('home.vendors.services.detail.compare')












<!--Testimonial Page starts here-->
<section class="testimonial" id="review-sec">
   <div class="container lr-container" data-aos="fade-left" data-aos-duration="3000">
      <div class="sec-heading text-center">
         <h2>what people are saying about us</h2>
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






@include('home.includes.business-detail.chatbox')











@endsection





@section('scripts')
 <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDULjv0UAVmj_zgc9GjBhJNh9fNuEj87LQ&libraries=places"></script>  
<script type="text/javascript" src="{{url('/js/deals/cart.js')}}"></script>
<script type="text/javascript" src="{{url('/js/deals/deals.js')}}"></script>
<script type="text/javascript" src="{{url('/js/comparePackage.js')}}"></script>
<script type="text/javascript" src="{{url('/js/business/requestForm.js')}}"></script>
<script type="text/javascript" src="{{url('/js/weather-custom.js')}}"></script>
<script>
 jQuery("body").on('click','.play-model-video2',function(e) {

   e.preventDefault();

   var url = jQuery( this ).attr('data-link');
   var title = jQuery( this ).attr('data-title');

   $("body").find('#Video-Modal').find('.modal-title').html(title);
   $("body").find('#Video-Modal').find('iframe').attr('src',url+'?autoplay=1');
   $("body").find('#Video-Modal').modal('show').css('display','block');
 });

// modal view video popup
 
$("body").find('#Video-Modal').on('hidden.bs.modal', function () {
       $('#Video-Modal').find('iframe').attr('src','');
});

 
   
    /*----------------------------------------------   
    -Simple Scroll To Anchor
    -----------------------------------------------  */   
   
   document.querySelectorAll('a[href^="#"]').forEach(anchor => {
       anchor.addEventListener('click', function (e) {
           e.preventDefault();
   
           document.querySelector(this.getAttribute('href')).scrollIntoView({
               behavior: 'smooth'
           });
       });
   });
   
   setTimeout(()=>{
   $('.test').owlCarousel({
       loop: true,
       margin: 10,
       nav: true,
       autoplay: true,
       responsive: {
           0: {
               items: 1
           },
           600: {
               items: 1
           },
           1000: {
               items: 1
           }
       }
   });
   },0);
   
   
   
 $('.nav-menu-slider').owlCarousel({
    loop:false,
    autoWidth:true,
    nav:true,
    dots:false,
    mouseDrag:true
 });


function getWeatherData() {

const venue_weather_route = $('#venue_weather_route').val();
  $.ajax({
    type: "GET",
    url: venue_weather_route,
    cache: true,
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
    },

    success: function(forecast) {
      if(forecast.code === 400 || forecast.code === 403) return;

      $('#weather-loader').css('display', 'none');
      $('#open_weather_modal').css('opacity', '1');
      setForecast(forecast);
      startClock(forecast.currently.time);
    },
    error: function(error) {
      $('#weather-loader').css('display', 'none');
      console.log("Error with ajax: "+ error);
    }
  });
}
const d = new Date();
$('#weatherDatePicker').val(`${d.getFullYear()}-${d.getMonth()+1}-${d.getDate()}`);
getWeatherData();

function startClock(time) {
   
    $("#localTime").text(new Date(time).toLocaleTimeString());
   
}

function setForecast(forecast) {
   var today = forecast.daily.data[0];
   let countryUs = '';

   if(forecast.timezone === 'America/New_York') countryUs = 'toFerenheit';

if(forecast.daily.data.length > 1) {
  $("#tempDescription").text(today.summary);
  $("#humidity").text(today.humidity);
  $("#wind").text(today.windSpeed);
  $("#localDate").text(getFormattedDate(today.time));
  $("#main-icon").attr('src', `/frontend/DarkSky-icons/SVG/${today.icon}.svg`);
  $("#mainTemperature").text(countryUs ? toFerenheit(forecast.currently.temperature)+'°F' : toCelcius(forecast.currently.temperature)+'°C');
  
}

// // // modal
 $("#modal-main-icon").attr('src', `/frontend/DarkSky-icons/SVG/${today.icon}.svg`);
 $("#modal-localDate").text(getFormattedDate(today.time));
 $("#modal-mainTemperature").text(countryUs ? toFerenheit(forecast.currently.temperature)+'°F' : toCelcius(forecast.currently.temperature)+'°C');


 let we = '';
 let data = forecast.daily.data.length > 1 ? forecast.daily.data : forecast.hourly.data;
 for (var i = 1; i < data.length; i++) {
      const f = data[i];

      let temp = '';
      if(countryUs) {
         temp = f.temperature ? `${toFerenheit(f.temperature)}°F` : `${toFerenheit(f.temperatureLow)}°F - ${toFerenheit(f.temperatureHigh)}°F`;
      } else {
      temp = f.temperature ? `${toCelcius(f.temperature)}°C` : `${toCelcius(f.temperatureLow)}°C - ${toCelcius(f.temperatureHigh)}°C`;
      }

      let time = f.temperature ? `${new Date(f.time).getHours()} : ${new Date(f.time).getMinutes()}` : `${getFormattedDate(f.time)}`;
      we += `<div class="weakly-weather-item">
              <p class="mb-0"> ${time} </p> <img id="modal-main-icon" src="/frontend/DarkSky-icons/SVG/${f.icon}.svg">
              <p class="mb-0"> ${temp} </p>
          </div>`;
 }
 
 $('#w-hourly').empty();
 $('#w-hourly').append(we);
}


function searchWeather() {
   $('#weather-loader').css('display', 'block');
   let date = $('#weatherDatePicker').val();
   let url = $('#venue_weather_route').val();
   $('#venue_weather_route').val(`${url}&time=${date}`);
   getWeatherData();
}

$("#weatherModal").on("hidden.bs.modal", function () {
   const venue_weather_route = $('#venue_weather_route').val();
   $('#venue_weather_route').val(venue_weather_route.split('&time')[0]);
   // $('#open_weather_modal').css('opacity', '0');
   getWeatherData();
});


 

// // Applies the following format to date: WeekDay, Month Day, Year
function getFormattedDate(date) {
  var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
  return new Date(date * 1000).toLocaleDateString("en-US", options);
}

// // // Formats the text to CamelCase
function toCamelCase(str) {
  var arr = str.split(" ").map(
    function(sentence){
      return sentence.charAt(0).toUpperCase() + sentence.substring(1);
    }
  );
  return arr.join(" ");
}

// // Converts to Celcius
function toCelcius(val) {
  return Math.round((val - 32) * (5/9));
}

// Converts to Farenheit
function toFerenheit(val) {
  var degrees = (val * 1.8) + 32;
  var rounded = Math.round(degrees);
  return rounded;
}
 
   //tooltip
 $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});

 $('.coupon-code').click(function() {
  /* Get the text field */
  var text = $(this).parent().find('.code-text').text();
  var copyText = document.createElement("textarea");
  document.body.appendChild(copyText);
  copyText.value = text;

  /* Select the text field */
  copyText.select(); 
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");
  document.body.removeChild(copyText);
  $(this).attr('data-original-title', `Copied ${copyText.value}`);
  
});
</script>
@endsection
