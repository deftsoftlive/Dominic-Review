<!-- Header section -->
@extends('inc.homelayout')

@section('title', 'DRH|Listing')

@section('content')

@php $base_url = \URL::to('/'); @endphp

<!-- ***********************************
|   Football Courses Banner Section
|*************************************** -->
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

        <!-- ***********************************
        |   Accordian Management - Start Here
        |*************************************** -->
          <div class="col-lg-6 col-md-12">
            <ul class="services-description">

              @foreach($accordian as $accor)
                <li>
                  <div id="accordion-1" class="myaccordion">
                      <div class="card cd-one">
                        <div class="card-header ch-one" id="headingone" style="background: {{$accor->color}};">
                          <h2 class="mb-0">
                            <button class="d-flex align-items-center justify-content-between btn btn-link collapsed" >
                             <h2>{{ $accor->title }}</h2>
                             <div class="inner-icons">

                              @if(!empty($accor->pdf))
                                <a target="_blank" href="{{URL::asset('/uploads')}}/{{$accor->pdf}}" class="course-pdf-icon"><i class="fas fa-file-pdf"></i></a>
                              @else
                                <a target="_blank" href="#" class="course-pdf-icon"><i class="fas fa-file-pdf"></i></a>
                              @endif
                              
                             <span data-toggle="collapse" data-target="#collapseone{{$accor->id}}" aria-expanded="false" aria-controls="collapseFirst"><i class="fas fa-plus plus-dp"></i>
                             <!--  <i class="fas fa-minus minus-dp"></i> --></span>
                           </div>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseone{{$accor->id}}" class="collapse" aria-labelledby="headingFirst" data-parent="#accordion-1">
                          <div class="card-body">
                            <p>{!! $accor->description !!}</p> 

                            @php 
                              $accor_id = $accor->id;
                              $accor_pdfs = \DB::table('accordian_pdfs')->where('accordian_id',$accor_id)->get();
                            @endphp
                            @foreach($accor_pdfs as $pdf)
                             <a target="_blank" href="{{URL::asset('/uploads/accordian')}}/{{$pdf->pdf}}" class="course-pdf-icon"><i class="fa fa-file-pdf"></i>{{$pdf-> accordian_title}}</a>
                            @endforeach
                            
                          </div>
                        </div>
                      </div>
                  </div>
                </li>
              @endforeach
            </ul>
          </div>
          <!-- ***********************************
          |   Accordian Management - End Here
          |*************************************** -->


          <!-- ***********************************
          |   Taster Form - Start Here
          |*************************************** -->
          <div class="col-lg-6 col-md-12">
            <div class="demo-form"> 
              <h1 class="demo-form-heading">Book a Free Taster Class</h1>
                 <form action="{{route('save-contact-us')}}" id="contact_form" method="POST" class="cstm-cont-page cst_course_form taster_form">
                      @csrf
                      <input type="hidden" name="type" value="course">
                      <div class="form-group">
                          <input type="text" class="form-control" name="participant_name" placeholder="Enter Participant Name">
                      </div>
                      <div class="form-group">
                          <input type="date" id="date_of_birth" class="form-control" name="participant_dob" placeholder="Enter Participant DOB">
                         <!--  <input type="date" class="form-control" name="participant_dob" placeholder="Enter Participant DOB"> -->
                      </div>
                      <div class="form-group row gender-opt contact-gender courses-gender">  
                      
                          <div class="col-md-12 det-gender-opt">

                            <div class="cstm-gender">
                              <label for="gender" class="col-form-label text-md-right">{{ __('Gender  ') }} </label>
                              <input type="radio" id="male111" name="participant_gender" value="male">
                              <label for="male111">Male</label>
                            </div>

                            <div class="cstm-gender">
                              <input type="radio" id="female111" name="participant_gender" value="female">
                              <label for="female111">Female</label>  
                            </div>

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
                        <textarea class="form-control demo-textarea" name="class" rows="3" placeholder="Class you’d like to try "></textarea>
                      </div>
                      <button type="submit" id="disable_contact_us_btnn" class="cstm-btn">Request Taster Class</button>
                    </form>
            </div>
          </div>
          <!-- ***********************************
          |   Taster Form - End Here
          |*************************************** -->


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
    <sectiion class="events-sec event-sec-page">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <form action="{{route('listing')}}" method="POST" class="cst-selection">
            @csrf
            <div class="form-row course_search_form">
              <div class="form-group col-lg-4 col-md-4">
                      <!-- <label for="inputCity">Search Course</label>
                      <input type="text" class="form-control" id="course_search" name="course" placeholder="Course A" value="{{ isset($course_name) ? $course_name : ''}}">
                      <ul id="course_dropdown"></ul> -->
                      <label for="inputCity">Search Course</label>
                      <select id="people" name="course" class="form-control">
                    
                      <option value="" disabled="" selected="">Please Select Course</option>
                      @foreach($course as $cour)
                        <option value="{{$cour->title}}">{{$cour->title}}</option>
                      @endforeach
                    </select>

                    </div>
                    <div class="form-group col-lg-3 col-md-4">
                      <label for="inputAge">Select Age Group</label>
                      <select id="inputAge" name="subtype" class="form-control event-dropdown">
                        <option disabled="" selected="" value="">Please Select Age Group</option>
                        @if(isset($subtype))
                            @foreach($subtype as $type)
                                <option value="{{$type->id}}" {{ $subtype == $type->label ?  'selected' : '' }}>{{$type->label}}</option>
                            @endforeach
                        @else
                            @foreach($subtype as $type)
                                <option value="{{$type->id}}">{{$type->label}}</option>
                            @endforeach
                        @endif
                      </select>
                    </div>
                    <input type="hidden" id="selected_course_name" name="selected_course_name">
                    <div class="form-group col-lg-3 col-md-4">
                      <label for="inputLevel">Select Level</label>
                      <select id="inputLevel" name="level" class="form-control event-dropdown">
                        @if(isset($level))
                          <option disabled="" selected="" value="">Please Select Level</option>
                          <option value="Beginner">Beginner</option>
                          <option value="Intermediate">Intermediate</option>
                          <option value="Advanced">Advanced</option>
                        @else
                          <option disabled="" selected="" value="">Please Select Level</option>
                          <option value="Beginner">Beginner</option>
                          <option value="Intermediate">Intermediate</option>
                          <option value="Advanced">Advanced</option>
                        @endif
                      </select>
                    </div>
                  
                  <div class="form-group col-lg-1 col-md-2 col-sm-6 col-6">
                    <button type="submit" class="cstm-btn" id="course_search_submit">Submit</button>
                  </div>
                  <div class="form-group col-lg-1 col-md-2 col-sm-6 col-6">
                    <button type="submit" id="course_search_submit" onclick="myFunction();" class="cstm-btn">Reset</button>
                  </div>
                  </div>
                  </form>
          </div>

          @php 
            $early_bird_enable = getAllValueWithMeta('check_early_bird', 'early-bird'); 
          @endphp

          @if($early_bird_enable == '1')
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
          @endif

        <!--   <div class="col-md-2">
              <div class="Countdown-pfd-wrap">
                @php 
                  $pdf = getAllValueWithMeta('pdf_upload', 'course-listing');
                @endphp

                @if(!empty($pdf))
                  <a target="_blank" href="{{URL::asset('/uploads')}}/{{ getAllValueWithMeta('pdf_upload', 'course-listing') }}"><i class="fas fa-file-pdf"></i></a>
                @endif 
              </div>
          </div> -->

          <!-- *********************************
          |     Courses Management - Start Here
          |************************************* -->
          @if(count($course)> 0)
          @foreach($course as $cour)
           <div class=" col-lg-4 col-md-4 col-md-6 col-sm-12">
             <ul class="events-wrap">
                <li>
                  <div class="event-card ul_course_design">
                    <div class="event-card-heading">
                      <h3>{{$cour->title}}</h3>
                    </div>
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
                    <h1 class="event-booking-price"><span>Price : </span>£{{$cour->price}}</h1>
                    <a href="{{url('course-detail')}}/@php echo base64_encode($cour->id); @endphp" class="cstm-btn">More Info</a>
                  </div>
                  </div>
                </li>
              </ul>
          </div>
          @endforeach
          @else
            <tr><td colspan="8"><div class="offset-md-4 col-md-4 sorry_msg"><div class="no_results"><h3>Sorry, no results</h3><p>No Course Found</p></div></div></td></tr>
          @endif
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
    <!-- ******************************
    |   Testimonial - End Here
    |********************************** -->

    <!-- ********************************************
    |   Courses & Camp Contact Linking - Start Here
    |************************************************ -->
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
    <!-- *******************************************
    |   Courses & Camp Contact Linking - End Here
    |*********************************************** -->

@endsection
<!-- Footer Section-->

