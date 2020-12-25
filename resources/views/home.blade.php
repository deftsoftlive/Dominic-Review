@extends('inc.homelayout')

@section('title', 'DRH')

@section('content')

@php $base_url = \URL::to('/'); @endphp
    <section class="site-banner">   
      <div class="banner-slider owl-carousel owl-theme">

        @php 
          $home_slides = DB::table('home_sliders')->where('status',1)->orderBy('sort','asc')->get();
        @endphp

        @foreach($home_slides as $slides)
        <div class="item" style="background: url({{$base_url}}/public/uploads/{{$slides->image}});">
          <div class="container">
            <div class="banner-content">

              <p class="banner-tag-line" style="color:{{isset($slides->title_color) ? $slides->title_color : ''}}">{{$slides->title}}</p>

              <h1 class="banner-heading" style="color:{{isset($slides->heading_color) ? $slides->heading_color : ''}}">{{$slides->heading}}</h1>

              <h1 class="banner-sub-heading" style="color:{{isset($slides->sub_heading_color) ? $slides->sub_heading_color : ''}}">{{$slides->subheading}}</h1>

              <p class="banner-text" style="color:{{isset($slides->description_color) ? $slides->description_color : ''}}">{{$slides->description}}</p>

              <a href="{{$slides->button_link}}" class="cstm-btn">{{$slides->button_text}}</a>

            </div>
          </div>
        </div>
        @endforeach

        <!-- <div class="item" style="background: url({{$base_url}}/public/uploads/{{$slider_image2}});">
          <div class="container">
            <div class="banner-content">
                <p class="banner-tag-line">{{$slider_title2}}</p>
              <h1 class="banner-heading">{{$slider_heading2}}</h1>
              <h1 class="banner-sub-heading">{{$slider_subheading2}}</h1>
              <p class="banner-text">{{$slider_description2}}</p>
              <a href="{{$slider_button_url2}}" class="cstm-btn">{{$slider_button_title2}}</a>
            </div>
          </div>
        </div>
        <div class="item" style="background: url({{$base_url}}/public/uploads/{{$slider_image3}});">
          <div class="container">
            <div class="banner-content">
                <p class="banner-tag-line">{{$slider_title3}}</p>
              <h1 class="banner-heading">{{$slider_heading3}}</h1>
              <h1 class="banner-sub-heading">{{$slider_subheading3}}</h1>
              <p class="banner-text">{{$slider_description3}}</p>
              <a href="{{$slider_button_url3}}" class="cstm-btn">{{$slider_button_title3}}</a>
            </div>
          </div>
        </div>   -->          
      </div>
    </section>
    <section class="about-us-sec">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="about-us-heading">
                <div class="section-heading">
                  <h1 class="sec-heading">{{$section1_title}}</h1>
                </div>
            </div>      
          </div>
          
          <div class="col-md-6">
            <div class="about-us-left">
              <p>{{$section1_tagline}}</p>
              <div class="know-more-btn-wrap">
                <a href="{{$section1_button_url}}" class="cstm-btn main_button"><span></span>{{$section1_button_title}}</a>
              </div>
            </div>  
          </div>
          <div class="col-md-6">
            <figure class="about-us-img-wrap">
                <img src="{{ URL::asset('/uploads')}}/{{$aboutus_image}}">
            </figure>
          </div>
        </div>
      </div>
    </section>
    <section class="drh-activity-sec">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="drh-activity-heading text-center">
                <div class="section-heading">
                  <h1 class="sec-heading">DRH ACTIVITIES</h1>
                </div>
            </div>      
          </div>
          <div class="col-md-12">
            <div class="activity-slider owl-carousel owl-theme">

              <!-- DRH Activity - Tennis Coaching -->

              @php $drh_activity = DB::table('drh_activities')->where('status',1)->orderBy('sort','asc')->get(); @endphp
              @foreach($drh_activity as $activity)
              <div class="item">
                <div class="activity-card text-center">
                  <figure class="activity-card-img">
                    <img src="{{ URL::asset('/uploads')}}/{{$activity->image}}">
                  </figure>
                  <a href="{{$activity->button_link}}" class="book-now-link">
                    <figcaption class="activity-caption"> 
                      <h2>{{$activity->title}}</h2>
                      <p>{{$activity->subtitle}}</p>

                      <span>{{$activity->button_text}}</span>   
                    </figcaption>
                  </a> 
                </div>
              </div>
              @endforeach

            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- ********************************
    |   Testimonial - Start Here
    | *********************************** -->
    <section class="testimonial-sec">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="testimonial-heading text-center">
                <div class="section-heading">
                  <h1 class="sec-heading">Testimonials</h1>
                </div>
            </div>      
          </div>
          <div class="col-md-12">
            <div class="testimonial-slider owl-carousel owl-theme">

              @foreach($testimonial as $test)
              <div class="item">
                <div class="testimonial-card">
                  <figure class="testimonial-img-wrap">
                    <img class="nb-icon" src="{{ URL::asset('images/nb-icon.png')}}">
                    <img class="b-icon" src="{{ URL::asset('images/b-icon.png')}}"> 
                  </figure>
                  <figcaption class="testimonial-caption">
                    <p>{{$test->description}}</p>
                    <div class="t-user">
                      <div class="round-arrow">
                        <img src="{{ URL::asset('images/round-arrow-img.png')}}">
                      </div>
                      <h3>{{$test->title}}</h3>
                      <span>
                        @if($test->image)
                          <img src="{{ URL::asset('uploads')}}/{{$test->image}}">
                        @else
                          <img src="{{ URL::asset('images/default.jpg')}}">
                        @endif
                      </span>   
                    </div>
                  </figcaption>
                </div>
              </div>
              @endforeach
              
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ********************************
    |   Testimonial - End Here
    | *********************************** -->


    <section class="click-here-sec">
      <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="click-sec-content">
                  <h2 class="click-sec-tagline">{{$section2_title}}</h2>
                  <ul class="click-btn-content">
                    <li>
                      <figure>
                        <img src="{{ URL::asset('images/click-btn-img.png')}}">
                      </figure>
                    </li>
                    <li>
                        <a href="{{$section2_button_url}}" class="cstm-btn main_button">{{$section2_button_title}}</a>
                    </li>
                    <li>
                      <figure>
                        <img src="{{ URL::asset('images/click-btn-img.png')}}">
                      </figure>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
      </div>
    </section>

@endsection