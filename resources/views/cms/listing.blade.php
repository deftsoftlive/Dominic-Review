<!-- Header section -->
@extends('inc.homelayout')

@section('title', 'DRH|Listing')

@section('content')

@php $base_url = \URL::to('/'); @endphp
    <section class="football-course-sec" style="background: url({{$base_url}}/public/uploads/{{ getAllValueWithMeta('banner_image', 'course-listing') }});">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="football-course-content">
              <h2 class="f-course-heading">{{ getAllValueWithMeta('page_title', 'course-listing') }}</h2>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="services-sec">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-12">
            <ul class="services-description">
          <li>

              <div id="accordion-1" class="myaccordion">
                  <div class="card cd-one">
                    <div class="card-header ch-one" id="headingone">
                      <h2 class="mb-0">
                        <button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapseone" aria-expanded="false" aria-controls="collapseFirst">
                         <h2>{{ getAllValueWithMeta('heading1', 'course-listing') }}</h2>
                        </button>
                      </h2>
                    </div>
                    <div id="collapseone" class="collapse" aria-labelledby="headingFirst" data-parent="#accordion-1">
                      <div class="card-body">
                        <p>{{ getAllValueWithMeta('description1', 'course-listing') }}</p>
                      </div>
                    </div>
                  </div>
              </div></li>
              <li>

              <div id="accordion-1" class="myaccordion">
                  <div class="card cd-sec">
                    <div class="card-header ch-sec" id="headingsec">
                      <h2 class="mb-0">
                        <button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapsesec" aria-expanded="false" aria-controls="collapseFirst">
                         <h2>{{ getAllValueWithMeta('heading2', 'course-listing') }}</h2>
                        </button>
                      </h2>
                    </div>
                    <div id="collapsesec" class="collapse" aria-labelledby="headingFirst" data-parent="#accordion-1">
                      <div class="card-body">
                        <p>{{ getAllValueWithMeta('description2', 'course-listing') }}</p>
                      </div>
                    </div>
                  </div>
                </div>

              </li><li>

              <div id="accordion-1" class="myaccordion">
                  <div class="card cd-third">
                    <div class="card-header ch-third" id="headingthird">
                      <h2 class="mb-0">
                        <button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapsethird" aria-expanded="false" aria-controls="collapseFirst">
                        <h2>{{ getAllValueWithMeta('heading3', 'course-listing') }}</h2>
                        </button>
                      </h2>
                    </div>
                    <div id="collapsethird" class="collapse" aria-labelledby="headingFirst" data-parent="#accordion-1">
                      <div class="card-body">
                        <p>{{ getAllValueWithMeta('description3', 'course-listing') }}</p>
                      </div>
                    </div>
                  </div>
                </div>

              </li>
              
            </ul>
          </div>
          <div class="col-lg-6 col-md-12">
            <div class="demo-form"> 
              <h1 class="demo-form-heading">Book a Free Taster Class</h1>
                 <form action="{{route('save-contact-us')}}" id="contact_form" method="POST" class="cstm-cont-page cst_course_form">
                      @csrf
                      <div class="form-group">
                          <input type="text" class="form-control" name="participant_name" placeholder="Enter Participant Name">
                      </div>
                      <div class="form-group">
                          <input type="date" class="form-control" name="participant_dob" placeholder="Enter Participant DOB">
                      </div>
<div class="form-group row gender-opt contact-gender courses-gender">  
                      
                          <div class="col-md-12 det-gender-opt">
                                <label for="gender" class="col-form-label text-md-right">{{ __('Gender  ') }} </label>
                          
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

                          
                      </div>
                      <div class="form-group">
                          <input type="text" class="form-control" name="parent_name" placeholder="Enter Parent Name">
                      </div>
                      <div class="form-group">
                         <input type="email" class="form-control" name="parent_email" placeholder="Enter Parent Email">
                      </div>
                      <div class="form-group cst-telephone-row">
                          <input type="text" class="form-control" name="parent_telephone" placeholder="Enter Telephone">
                      </div>
                      <div class="form-group cont-feedback">
                        <textarea class="form-control demo-textarea" name="message" rows="3" placeholder="Class you’d like to try "></textarea>
                      </div>
                      <button type="submit" id="disable_contact_us_btnn" class="cstm-btn">Request Demo</button>
                    </form>
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
    <sectiion class="events-sec">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <form action="" method="POST">
            <div class="form-row course_search_form">
              <div class="form-group col-md-4">
                      <label for="inputCity">Search Course</label>
                      <input type="text" class="form-control" id="course_search" placeholder="Course A">
                      <ul id="course_dropdown"></ul>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputAge">Select Age Group</label>
                      <select id="inputAge" class="form-control event-dropdown">
                        <option value="8-11" selected>8-11</option>
                        <option value="3-10">3-10</option>
                        <option value="8-11">6-10</option>
                        <option value="3-10">9-17</option>
                        <option value="8-11">4-8</option>
                        <option value="3-10">3-7</option>
                      </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputLevel">Select Level</label>
                      <select id="inputLevel" class="form-control event-dropdown">
                        <option selected>Beginner</option>
                        <option>Intermediate</option>
                        <option>Advanced</option>
                      </select>
                    </div>
                  
                  <div class="form-group col-md-2">
                    <button type="submit" class="cstm-btn" id="course_search_submit">Submit</button>
                  </div>
                  </div>
                  </form>
          </div>
          <div class="col-md-12">
            <div class="event-sec-heading">
              <h1>Early Bird Discount</h1>
            </div>
          </div>
          <div class="col-md-8 offset-md-2">
            <div class="Countdown-timer-content">
                <h2 class="Countdown-heading">Prices Go Up When The Timer Hits Zero!</h2>
                <div class="Countdown-timer-wrap">
                  <ul class="Countdown-timer">
                            <li><span id="days"></span>Days</li>
                            <li><span id="hours"></span>Hrs</li>
                            <li><span id="minutes"></span>Mins</li>
                            <li><span id="seconds"></span>Secs</li>
                          </ul>
                        </div>
                    </div>
          </div>
          <div class="col-md-2">
              <div class="Countdown-pfd-wrap">
                @php 
                  $pdf = getAllValueWithMeta('pdf_upload', 'course-listing');
                @endphp

                @if(!empty($pdf))
                  <a target="_blank" href="{{URL::asset('/uploads')}}/{{ getAllValueWithMeta('pdf_upload', 'course-listing') }}"><i class="fas fa-file-pdf"></i></a>
                @endif 
              </div>
          </div>

          <!-- *********************************
          |     Courses Management - Start Here
          |************************************* -->
          <div id="course_list">
            @foreach($course as $cour)
            <div class="col-md-6">
              <ul class="events-wrap">
                <li>
                  <div class="event-card">
                    <div class="event-card-heading">
                        <h3>{{$cour->title}}</h3>
                                  </div>
                                  <div class="event-info">
                                    <p><span>Age :</span>{{$cour->age}}</p>
                                    <p><span>Session dates (12 weeks) :</span>{{$cour->session_date}}</p>
                                    <p><span>Location :</span>{{$cour->location}}</p>
                                    <p><span>Day/Time :</span> {{$cour->day_time}}</p>
                                    <p>{{$cour->description}}</p>
                                  </div>
                                  <div id="accordion-1" class="myaccordion">
                    <div class="card">
                      <div class="card-header" id="headingFirst">
                        <h2 class="mb-0">
                          <button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFirst{{$cour->id}}" aria-expanded="false" aria-controls="collapseFirst{{$cour->id}}">
                           More Information
                          </button>
                        </h2>
                      </div>
                      <div id="collapseFirst{{$cour->id}}" class="collapse" aria-labelledby="headingFirst" data-parent="#accordion-1">
                        <div class="card-body">
                          {{$cour->more_info}} 
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="event-card-form">
                      <form>
                        <div class="form-group">
                                            <label for="inputPlayer-3">Select Player</label>
                                            <select id="inputPlayer-3" class="form-control event-dropdown">
                                              <option selected value="{{$cour->player}}">{{$cour->player}}</option>
                                              <!-- <option>...</option> -->
                                            </select>                                                               
                                          </div>                                  
                      </form>
                    </div>
                  <div class="event-booking">
                    <h1 class="event-booking-price"><span>£</span>{{$cour->price}}</h1>
                    <a href="javascript:void(0);" class="cstm-btn">Book Now</a>&nbsp;
                    <a href="{{url('course-detail')}}/@php echo base64_encode($cour->id); @endphp" class="cstm-btn">Read More</a>
                  </div>
                  </div>
                </li>
              </ul>
            </div>  
            @endforeach
          </div>

          <!-- ********************************
          |     Courses Management - End Here
          |************************************ -->


        </div>
      </div>
    </sectiion>


    <!-- ******************************
    |   Testimonial - Start Here
    |********************************** -->
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
              <div class="testimonial-card alt-testimonial-card">
                <figure class="testimonial-img-wrap">
              <img src="{{ URL::asset('/images/testimonial-card-img-2.png')}}">
              </figure>
                <figcaption class="testimonial-caption">
                    <p>{{$test->description}}</p>
                    <div class="t-user">
                      <div class="round-arrow">
                        <img src="{{ URL::asset('/images/round-arrow-img.png')}}">
                      </div>
                      <h3>{{$test->title}}</h3>
                      <span>
                        <img src="{{ URL::asset('uploads')}}/{{$test->image}}">
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
    <!-- ******************************
    |   Testimonial - End Here
    |********************************** -->


    <section class="click-here-sec">
      <div class="container">
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="click-sec-content">
              <h2 class="click-sec-tagline">{{ getAllValueWithMeta('section4_title', 'course-listing') }}</h2>
                <ul class="click-btn-content">
                  <li>
                    <figure>
                    <img src="{{ URL::asset('/images/click-btn-img.png')}}">
                </figure>
                </li>
                <li>
                  <a href="{{ getAllValueWithMeta('section4_button_url', 'login') }}" class="cstm-btn">{{ getAllValueWithMeta('section4_button_title', 'course-listing') }}</a>
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

@endsection
<!-- Footer Section -->