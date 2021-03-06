<!-- Header section -->
@extends('inc.homelayout')

@section('title', 'DRH|Listing')

@section('content')

@php $base_url = \URL::to('/'); @endphp
    <section class="football-course-sec" style="background: url({{$base_url}}/public/uploads/{{ getAllValueWithMeta('banner_image', 'contact-us') }});">
      <script src="https://www.google.com/recaptcha/api.js" async defer></script>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="football-course-content">
              <h2 class="f-course-heading">{{ getAllValueWithMeta('page_title', 'contact-us') }}</h2>
            </div>
          </div>
        </div>
      </div>
    </section>

    

    <section class="services-sec contact_us_section">
      <div class="container">

        @if(Session::has('success'))
        <div class="alert_msg alert alert-success">
            <p>{{ Session::get('success') }} </p>
        </div>
        @endif
          
        <div class="row">
          
           <div class="col-lg-9 col-md-12">
                  <div class="demo-form">   
                    <h1 class="demo-form-heading">Send Us An Email</h1>
                    
                    <form action="{{ route('save-contact-us') }}" id="contact_form" method="POST" class="cstm-cont-page">
                      @csrf
                      <input type="hidden" name="type" value="contact">
                      <div class="form-group upper-input-row">
                          <input type="text" class="form-control" name="participant_name" placeholder="Enter Name">
                      </div>
                      <!-- <div class="form-group">
                          <input type="date" class="form-control" name="participant_dob" placeholder="Enter Participant DOB">
                      </div>

                       <div class="form-group row gender-opt contact-gender">  
                      
                          <div class="col-md-12 det-gender-opt">
                                <label for="gender" class="col-form-label text-md-right">{{ __('Gender') }}</label>
                          
                              <input type="radio" id="male" name="participant_gender" value="male">
                              <label for="male">Male</label>
                              <input type="radio" id="female" name="participant_gender" value="female">
                              <label for="female">Female</label>  
                             

                              <div id="gender"></div>
                              @if ($errors->has('gender'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('gender') }}</strong>
                                  </span>
                              @endif 
                      </div>

                          
                      </div> -->
                      <!-- <div class="form-group">
                          <input type="text" class="form-control" name="parent_name" placeholder="Enter Parent Name">
                      </div> -->
                      <div class="form-group upper-input-row">
                         <input type="email" class="form-control" name="parent_email" placeholder="Enter Email">
                      </div>
                      <div class="form-group upper-input-row">
                          <input type="text" class="form-control" name="parent_telephone" placeholder="Enter Telephone">
                      </div>
                      <div class="form-group cont-feedback">
                        <input type="text" class="form-control" name="subject" placeholder="Enter Subject">
                      </div>
                      <div class="form-group cont-feedback">
                        <textarea class="form-control demo-textarea" name="message" rows="3" placeholder="Enter Message"></textarea>
                      </div>
                      <!-- <div class="form-group cont-feedback">
                        <textarea class="form-control demo-textarea" name="message" rows="3" placeholder="Class you’d like to try "></textarea>
                      </div> -->
                      <div class="g-recaptcha" data-sitekey="6Len3mIaAAAAAFDNJoUvCb1KEty7ul3vnlCQM41K"></div>
                      <input type="hidden" id="captchaValue" name="captcha" value="">
                      <button id="disable_contact_us_btnn" class="cstm-btn main_button disable_contact_us_btnn">Send Message</button>
                    </form>
                  </div>
                </div>
           <div class="col-lg-3 col-md-12">
            <div class="cst-contact-oyer-wrap">
              <div class="address_detail">
                 <h4>{{ getAllValueWithMeta('heading1', 'contact-us') }}</h4>
                 <p>{{ getAllValueWithMeta('description1', 'contact-us') }}</p>
                 <!-- <p>Dominic Ross-Hurst</p>
                 <p>The Pavilion,</p>
                 <p>Woughton on the Green,</p>
                 <p>Milton Keynes</p>
                 <p>MK6 3EA,</p>
                 <p>UK</p>    -->           
              </div>
              <div class="conatct-detail">
                <h4>{{ getAllValueWithMeta('heading2', 'contact-us') }}</h4>
                 <p>Phone: <span>{{ getAllValueWithMeta('phone_number', 'contact-us') }}</span></p>   
                 <p>Email: <span>{{ getAllValueWithMeta('email', 'contact-us') }}</span></p>                       
              </div>
              <div class="social-links">
                <h4>{{ getAllValueWithMeta('heading3', 'contact-us') }}</h4>
                <!-- <p>{{ getAllValueWithMeta('description2', 'contact-us') }}</p> -->
              <ul class="social-media">
                  <li>
                    <a href="{{ getAllValueWithMeta('facebook', 'contact-us') }}" class="s-link"><i class="fab fa-facebook-f"></i></a>
                  </li>
                  <li>
                    <a href="{{ getAllValueWithMeta('instagram', 'contact-us') }}" class="s-link"><i class="fab fa-instagram"></i></a>
                  </li>
                  <li>
                    <a href="{{ getAllValueWithMeta('google', 'contact-us') }}" class="s-link"><i class="fab fa-google-plus"></i></a>
                  </li>
                </ul>
          </div> 
        </div>
        </div>
          <div class="col-md-12">
            <div class="demo-slider owl-carousel owl-theme">
                  <div class="item">
                    <figure class="demo-slider-img">
                      <img src="{{ URL::asset('/images/demo-img-1.png')}}">
                    </figure>
                  </div>
                  <div class="item">
                    <figure class="demo-slider-img">
                      <img src="{{ URL::asset('/images/demo-img-2.png')}}">
                    </figure>
                  </div>
                  <div class="item">
                    <figure class="demo-slider-img">
                      <img src="{{ URL::asset('/images/demo-img-3.png')}}">
                    </figure>
                  </div>
                  <div class="item">
                    <figure class="demo-slider-img">
                      <img src="{{ URL::asset('/images/demo-img-1.png')}}">
                    </figure>
                  </div>
                  <div class="item">
                    <figure class="demo-slider-img">
                      <img src="{{ URL::asset('/images/demo-img-2.png')}}">
                    </figure>
                  </div>
                  <div class="item">
                    <figure class="demo-slider-img">
                      <img src="{{ URL::asset('/images/demo-img-3.png')}}">
                    </figure>
                  </div>
                </div>
          </div>
        </div>
      </div>
    </section>


    <section class="click-here-sec">
      <div class="container">
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="click-sec-content">
              <h2 class="click-sec-tagline">{{ getAllValueWithMeta('section4_title', 'contact-us') }}</h2>
                <ul class="click-btn-content">
                  <li>
                    <figure>
                    <img src="{{ URL::asset('/images/click-btn-img.png')}}">
                </figure>
                </li>
                <li>
                  <a href="{{ getAllValueWithMeta('section4_button_url', 'contact-us') }}" class="cstm-btn main_button">{{ getAllValueWithMeta('section4_button_title', 'contact-us') }}</a>
                </li>
                <li>
                    <figure>
                    <img src="{{ URL::asset('/images/click-btn-img.png')}}">
                </figure>
                </li>
                </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
<script type="text/javascript">
  var onloadCallback = function() {
    //alert("grecaptcha is ready!");
  };

  function checkRecaptcha(){ 

    var response = grecaptcha.getResponse();
    if(response.length == 0) 
    { 
      //reCaptcha not verified
      alert("please verify you are Human!"); 
      $("#captchaValue").val("");
      return false;
    }else{
      $("#captchaValue").val("Yes");
      return true;
    }
    //captcha verified
    //do the rest of your validations here
    
  }
</script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
    async defer>
</script>

@endsection
<!-- Footer Section -->