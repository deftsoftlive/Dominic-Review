<!-- Header section -->
@extends('inc.homelayout')

@section('title', 'DRH|Listing')

@section('content')

@php 
  $base_url = \URL::to('/');
  $cat = $cat_id; 
  $url = 'course-listing/tennis?&cat='.$cat;  
  $course_cat = DB::table('link_course_and_categories')->where('id',$cat)->first();
@endphp

<!-- ***********************************
|   Tennis Courses Banner Section
|*************************************** -->
    <section class="football-course-sec" style="background: url({{$base_url}}/public/uploads/{{ $course_cat->image }});">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="football-course-content">
              <h2 class="f-course-heading">{{ getAllValueWithMeta('tennis_course_page_title', 'tennis-course-listing') }} - {{$course_cat->title}}</h2>
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
        
        <div class="row">

          <!-- ***********************************
          |   Accordian Management - Start Here
          |*************************************** -->
          <div class="col-lg-6 col-md-12">
            <ul class="services-description">

              @php 
                $accordian1 = DB::table('accordians')->where('page_title',$url)->where('status',1)->orderBy('sort','asc')->get();
              @endphp
              @foreach($accordian1 as $accor)
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
                        </div>
                        <div id="collapseone{{$accor->id}}" class="collapse" aria-labelledby="headingFirst" data-parent="#accordion-1">
                          <div class="card-body">
                            <p>{!! $accor->description !!}</p>

                            @php 
                              $accor_id = $accor->id;
                              $accor_pdfs = \DB::table('accordian_pdfs')->where('accordian_id',$accor_id)->get();
                            @endphp
                            @foreach($accor_pdfs as $pdf)
							               <a target="_blank" href="{{URL::asset('/uploads/accordian')}}/{{$pdf->pdf}}" class="course-pdf-icon"><i class="fa fa-file-pdf"></i>{{$pdf->accordian_title}}</a>
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
                          <!-- <input type="date" id="date_of_birth" class="form-control" name="participant_dob" placeholder="Enter Participant DOB"> -->
                          <input type="text" class="form-control textbox-n" name="participant_dob" placeholder="D.O.B - dd/mm/yyy" onfocus="(this.type='date')" id="date">
                      </div>
                   <div class="form-group row gender-opt contact-gender courses-gender">  
                      
                          <div class="col-md-12 det-gender-opt">
                                <div class="cstm-gender">
                                <label for="gender" class="col-form-label text-md-right">{{ __('Gender  ') }} </label>
                          
                              <input type="radio" id="male1" name="participant_gender" value="male">
                              <label for="male1">Male</label></div>
                              <div class="cstm-gender">
                              <input type="radio" id="female1" name="participant_gender" value="female">
                              <label for="female1">Female</label>  
                             
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
                      <button type="submit" id="disable_contact_us_btnn" class="cstm-btn main_button">Request Taster Class</button>
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
    <section class="events-sec inner-event-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <form action="{{route('tennis-listing')}}" method="POST" class="cst-selection">
            @csrf
            <input type="hidden" name="cat" value="{{isset($cat) ? $cat : ''}}">
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
                          <option value="Beginner" {{ $level == 'Beginner' ?  'selected' : '' }}>Beginner</option>
                          <option value="Intermediate" {{ $level == 'Intermediate' ?  'selected' : '' }}>Intermediate</option>
                          <option value="Advanced" {{ $level == 'Advanced' ?  'selected' : '' }}>Advanced</option>
                        @else
                          <option disabled="" selected="" value="">Please Select Level</option>
                          <option value="Beginner">Beginner</option>
                          <option value="Intermediate">Intermediate</option>
                          <option value="Advanced">Advanced</option>
                        @endif
                      </select>
                    </div>
                  
                  <div class="form-group col-lg-1 col-md-2 col-sm-6 col-6">
                    <button type="submit" class="cstm-btn main_button" id="course_search_submit">Submit</button>
                  </div>
                  <div class="form-group col-lg-1 col-md-2 col-sm-6 col-6">
                    <button type="submit" id="course_search_submit" onclick="myFunction();" class="cstm-btn main_button">Reset</button>
                  </div>
                  </div>
                  </form>
          </div>

          @php 
            $early_bird_enable = getAllValueWithMeta('check_tennis_percentage', 'early-bird');
            $early_bird_tennis_dis = getAllValueWithMeta('tennis_percentage', 'early-bird');
            $early_bird_date = getAllValueWithMeta('early_bird_date', 'early-bird'); 
            $early_bird_time = getAllValueWithMeta('early_bird_time', 'early-bird');

            $endDate = strtotime(date('Y-m-d',strtotime($early_bird_date)).' 23:59:00');
            $currntD = strtotime(date('Y-m-d H:i:s'));
            $diff = $endDate - $currntD;

            $years = floor($diff / (365*60*60*24));  
            $months = floor(($diff - $years * 365*60*60*24) 
                               / (30*60*60*24));  
            $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); 
            $hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60)); 
            $minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60);
            $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60)); 
          @endphp


        @if($currntD >= $endDate)

        @else
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
                    <div id="clockDiv_{{$early_bird_enable}}" class="Countdown-timer">

                          <span class="Cdays "> &nbsp;{{$days}} </span>&nbsp; Days : &nbsp;
                          <span class="Chr "> &nbsp;{{$hours}} </span>&nbsp; Hours : &nbsp;
                          <span class="Cmin "> &nbsp;{{$minutes}} </span>&nbsp; Mins : &nbsp;
                          <span class="Csec seconds_time " > &nbsp;{{$seconds}} </span>&nbsp; Secs

                      @php     
                        echo'<script>
                            var deadline = new Date(Date.parse(new Date()) +('. $diff.'* 1000)); 
                            initializeClock("clockDiv_'.$early_bird_enable.'", deadline);
                          </script>';
                      @endphp
                      </div>
                    </div>
                </div>
          </div>
          @endif   
        @endif    

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

                    @if($currntD >= $endDate)
                      <div class="product-price">£{{number_format((float)$cour->price, 2, '.', '')}}</div>
                    @else
                      @if($early_bird_enable == '1')
                        @php 
                          $cour_price = $cour->price;
                          $dis_price = $cour_price - (($cour_price) * ($early_bird_tennis_dis/100));
                        @endphp
                        <div class="product-price"><small>£{{$cour->price}}</small>£{{$dis_price}}</div>
                      @else
                        <div class="product-price">£{{$dis_price}}</div>
                      @endif
                    @endif
                    </h1>
                    <a href="{{url('course-detail')}}/@php echo base64_encode($cour->id); @endphp" class="cstm-btn main_button">More Info</a>
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
                    <img class="nb-icon" src="{{ URL::asset('images/nb-icon.png')}}">
                    <img class="b-icon" src="{{ URL::asset('images/b-icon.png')}}">
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

