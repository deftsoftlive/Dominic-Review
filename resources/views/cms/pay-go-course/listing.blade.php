@extends('inc.homelayout')

@section('title', 'DRH|Listing')

@section('content')

@php $base_url = \URL::to('/'); @endphp

<!-- ***********************************
|   Tennis Courses Banner Section
|*************************************** -->
<section class="football-course-sec" style="background: url({{$base_url}}/public/uploads/{{ getAllValueWithMeta('paygo_courses_banner', 'banners') }});">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="football-course-content">
          <h2 class="f-course-heading">Pay Go Courses</h2>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="services-sec">
  <div class="container">

    @if(Session::has('success'))
    <div class="alert_msg alert alert-success">
        <p>{{ Session::get('success') }} </p>
    </div>
    @endif

  </div>
</section>


<section class="events-sec inner-event-section">
  <div class="container">
    <div class="row">

      <!-- ********************************
      |     Courses Management - End Here
      |************************************ -->
      @if(count($course)> 0)
      @foreach($course as $cour)
       <div class=" col-lg-4 col-md-4 col-md-6 col-sm-12">
         <ul class="events-wrap">
            <li>
              <div class="event-card ul_course_design">
                <div class="event-card-heading">
                  <h3>{{$cour->title}}</h3>
                </div>

                @php 
                    $purchased_courses = DB::table('shop_cart_items')->where('shop_type','course')->where('product_id',$cour->id)->where('type','order')->count();
                    $booked_courses = !empty($purchased_courses) ? $purchased_courses : '0';
                @endphp

                @if($booked_courses >= $cour->booking_slot)
                  <div class="event-book">
                    <p>Fully Booked</p>
                  </div>
                @endif
                
                <div class="event-info">
                  <ul class="course-inner-list">
                    <li><p>Age :</p><span>{{$cour->age_group}} Years</span></li>
                    <li><p>Course dates :</p><span>{{$cour->session_date}}</span></li>
                    <li><p>Location :</p><span>{{$cour->location}}</span></li>
                    <li><p>Day/Time :</p><span>{{$cour->day_time}}</span></li>
                  </ul>
                </div>
                <div class="event-note">
                  <p>{!! $cour->description !!}</p>
                </div>
                <div class="event-booking">
                <h1 class="event-booking-price"><span>Price : </span>

                <div class="product-price">£{{number_format($cour->price,2)}}</div>
                </h1>
                <a href="{{route('user.paygo.course.details', base64_encode($cour->id)) }} " class="cstm-btn main_button">More Info</a>
              </div>
              </div>
            </li>
          </ul>
      </div>
      @endforeach
      @else
        <tr><td colspan="8"><div class="noData offset-lg-4 col-lg-4 offset-md-3 col-md-6 offset-sm-2 col-sm-8 sorry_msg"><div class="no_results"><h3>Sorry, no results</h3><p>No Course Found</p></div></div></td></tr>
      @endif


    </div>
  </div>
</section>


<!-- ********************************************
|   Courses & Camp Contact Linking - Start Here
|************************************************ -->
<section class="click-here-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="click-sec-content">
          <h2 class="click-sec-tagline">{{ getAllValueWithMeta('tennis_course_section4_title', 'tennis-course-listing') }}</h2>
            <ul class="click-btn-content">
              <li>
                <figure>
                <img src="{{ URL::asset('/images/click-btn-img.png')}}">
            </figure>
            </li>
            <li>
              <a href="{{ getAllValueWithMeta('section4_button_url', 'tennis-course-listing') }}" class="cstm-btn main_button">{{ getAllValueWithMeta('tennis_course_section4_button_title', 'tennis-course-listing') }}</a>
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
<!-- *******************************************
|   Courses & Camp Contact Linking - End Here
|*********************************************** -->

@endsection
<!-- Footer Section-->

