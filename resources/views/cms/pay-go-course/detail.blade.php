@extends('inc.homelayout')

@section('title', 'DRH|Listing')

@section('content')


@php 
    $cour_id = $course->id; 
    $purchased_courses = DB::table('shop_cart_items')->where('shop_type','paygo-course')->where('product_id',$cour_id)->where('type','order')->count();  
    $booked_courses = !empty($purchased_courses) ? $purchased_courses : '0';
    //dd($booked_courses);


@endphp

@php $base_url = \URL::to('/');
//dd($course);
@endphp

@if(!empty($course->image))
  <section class="football-course-sec" style="background: url({{$base_url}}/public/uploads/{{$course->image}});">
@else
  <section class="football-course-sec" style="background: url({{$base_url}}/public/uploads/1583997335banner_image.png);">
@endif
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="football-course-content">
          <h2 class="f-course-heading">{{$course->title}}</h2>
        </div>
      </div>
    </div>
  </div>
</section>



<section class="course-list-detail  course-inner-page">

  
  <div class="container">

    @if(Session::has('success'))
      <div class="alert_msg alert alert-success">
          <p>{{ Session::get('success') }} </p>
      </div>
      @endif
      @if(Session::has('error'))
      <div class="alert_msg alert alert-danger">
          <p>{{ Session::get('error') }} </p>
      </div>
      @endif


      <div class="row">

          <div class="col-md-12 sports-text">
            @php 
              $remainingSeats = 0;
              $course_dates = \DB::table('paygocourse_dates')->where('course_id',$course->id)->where('display_course',1)->get();
            @endphp
            @foreach($course_dates as $date)
              @if( strtotime( $date->course_date ) >= strtotime( date( 'Y-m-d' ) ) )
                @php
                  $bookedDateCount = \App\PayGoCourseBookedDate::where('booked_date_id', $date->id)->count();
                  
                  $remainingSeats += (int)$date->seats - (int)$bookedDateCount;
                @endphp
              @endif
            @endforeach
            @if( $remainingSeats == 0 )
              <div class="alert_msg alert alert-danger">
                 <p><b>"{{$course->title}}"</b> - course is fully booked. </p>
              </div>
            @endif

          <!-- Show membership popup according to below condition after booking and before booking -->
          @if($course->membership_popup == 1 && $course->membership_price > 0 && $remainingSeats > 0)
            @if(empty(Session::get('membership_status')))
              <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
                  <script>
                    $(function(){
                      $('#membership').modal('show');
                    });
                  </script>
            @endif
          @elseif($course->membership_popup == 1 && $course->membership_price <= 0)
            @if(!empty(Session::get('popup')))
              <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
              <script>
                $(function(){
                  $('#membershipPopupAfterBooking').modal('show');
                });
              </script>
            @endif
          @endif
            <!-- @if($booked_courses >= $course->booking_slot)
              <div class="alert_msg alert alert-danger">
                 <p><b>"{{$course->title}}"</b> - course is fully booked. </p>
              </div>
            @endif -->

            <ul class="events-wrap">
              <li>
                <div class="event-card ul_course_design">
                  <div class="event-card-heading">
                      <h3>@php echo getSeasonname($course->season); @endphp - {{$course->day_time}}</h3>
                                </div>
                                
                                <div class="event-outer-wrap">
                                <div class="event-info-dt">
                                   <p>Age</p>
                                   <span>{{$course->age_group}} Years</span>
                                </div>
                                <div class="event-info-dt">
                                   <p>Location</p>
                                   <span>{{$course->location}}</span>
                                </div>
                                <div class="event-info-dt">
                                   <p>Day & Time</p>
                                   <span>{{$course->day_time}}</span>
                                </div>
                                <div class="event-info-dt">
                                   <p>Level</p>
                                   <span>{{$course->level}}</span>
                                </div>
                              </div>
                              <div class="event-card-heading sub_heading h-c-dates">
                               <h3>course-dates</h3>
                             </div>
                            <div class="event-card-form">
                            @if( $remainingSeats > 0 )
                            <form id="course-booking" action="{{route('paygo.course.booking')}}" method="POST">
                              @csrf
                              <input type="hidden" name="membership_status" value="{{ Session::get('membership_status') == 'Yes' ? 1 : 0 }}">
                              <div class="days-list">
<!--  
                                  <div class="owl-carousel owl-carousel2 owl-theme">
                                    @php 
                                      $today = Carbon\Carbon::now();
                                      $current_date = date('Y-m-d', strtotime($today)); 
                                    @endphp

                                    @foreach($course_dates as $date)

                                    @if($date->display_course == 1)
                                      <div class="item">
                                          <a href="javascript:void(0);" class="cstm-btn days-btn @if($date->course_date < $current_date) disable-btn @endif">{{ date('d/m/Y', strtotime($date->course_date)) }}</a>
                                      </div>
                                    @endif

                                    @endforeach
                                </div> -->

                                <div class="date_cstm_wrap">
                                  <ul class="days_list" id="checkboxMsgError">

                                  @php 
                                    $course_cat = $course->type; 

                                  @endphp

                                  @if($course_cat != 0)

                                  @php
                                    $cat = DB::table('product_categories')->where('id',$course_cat)->first();
                                    $early_bird_date = getAllValueWithMeta('early_bird_date', 'early-bird'); 
                                    $endDate = strtotime(date('Y-m-d',strtotime($early_bird_date)).' 23:59:00'); 
                                    $currntD = strtotime(date('Y-m-d H:i:s'));  
                                  @endphp

                                  @if($cat->slug == 'tennis')
                                    @php 
                                      $early_bird_enable = getAllValueWithMeta('check_tennis_percentage', 'early-bird');
                                      $percentage = getAllValueWithMeta('tennis_percentage', 'early-bird');
                                    @endphp
                                  @elseif($cat->slug == 'football')
                                    @php
                                      $early_bird_enable = getAllValueWithMeta('check_football_percentage', 'early-bird');
                                      $percentage = getAllValueWithMeta('football_percentage', 'early-bird');
                                    @endphp
                                  @elseif($cat->slug == 'schools')
                                    @php
                                      $early_bird_enable = getAllValueWithMeta('check_school_percentage', 'early-bird');
                                      $percentage = getAllValueWithMeta('school_percentage', 'early-bird');
                                    @endphp
                                  @endif

                                  @php 

                                  if($currntD >= $endDate){
                                    //Check membership status and show membership price
                                    if(Session::get('membership_status') == 'Yes'){
                                      $courseCost = number_format((float)$course->membership_price, 2, '.', '');
                                    }else{
                                      $courseCost = number_format((float)$course->price, 2, '.', '');
                                    }

                                  }else{
                                    if($early_bird_enable == '1'){
                                      //Check membership status and show membership discount price  
                                      if(Session::get('membership_status') == 'Yes'){
                                        $mem_cour_price = $course->membership_price;
                                        $courseCost = $mem_cour_price - (($mem_cour_price) * ($percentage/100));
                                      }else{
                                        $cour_price = $course->price;
                                        $courseCost = $cour_price - (($cour_price) * ($percentage/100));
                                      }
                                    }else{
                                      //Check membership status and show membership price
                                      if(Session::get('membership_status') == 'Yes'){
                                        $courseCost = number_format((float)$course->membership_price, 2, '.', '');
                                      }else{
                                        $courseCost = number_format((float)$course->price, 2, '.', '');
                                      }
                                    }
                                  }
                                  @endphp 

                                  @foreach($course_dates as $date)
                                  @php
                                  $remainingSeats_single_course = 0;
                                  if( strtotime( $date->course_date ) >= strtotime( date( 'Y-m-d' ) ) ){
                                  $advanceDays = (int)$course->advance_weeks;
                                  $bookedDateCount = \App\PayGoCourseBookedDate::where('booked_date_id', $date->id)->count();
                                  $dateNow = date("Y-m-d");
                                  $mod_date = strtotime($date->course_date."- $advanceDays days");
                                  //echo $dateNow .'>'. date( "Y-m-d", $mod_date );
                                  $remainingSeats_single_course = (int)$date->seats - (int)$bookedDateCount; 
                                  if( $remainingSeats_single_course == 0 ||  strtotime( $dateNow ) < $mod_date ){
                                  $disabled = 'disabled';

                                  }else{
                                    $disabled = '';
                                  }

                                  @endphp
                                    <li>
                                      <label class="main-wrap">
                                          <input class="day_none price_add" type="checkbox" value="{{$date->id}}" name="selected_date_ids[]" id="checkbox-{{$date->id}}" slots ="{{$date->seats}}" price = "{{$courseCost}}" {{ $disabled }}>


                                            <span class="checkmark {{ $disabled }}">
                                              <div class="inner-wrap ">
                                                <span>{{ date('d/m/Y', strtotime($date->course_date)) }}</span>                                     
                                                <!-- <p>{{ $date->seats }}</p> -->
                                                
                                                @if( $remainingSeats_single_course > 0 )                                      
                                                <p>{{ $remainingSeats_single_course }}</p>
                                                  @if( $remainingSeats_single_course == 1 )
                                                  <span>Space left</span>
                                                  @elseif( $remainingSeats_single_course >1 )
                                                  <span>Spaces left</span>
                                                  @endif
                                                @elseif( $remainingSeats_single_course == 0 )
                                                <span class="cst-full-booked">Fully Booked</span>
                                                @endif
                                                <p>£ {{ $courseCost }}</p>
                                            </div>
                                          </span>
                                        </label>                                      
                                    </li>
                                    @php 
                                    }
                                    @endphp
                                  @endforeach

                                  @if ($errors->has('selected_date_ids'))
                                      <div class="error">{{ $errors->first('selected_date_ids') }}</div>
                                  @endif
                                </ul>
                              </div>
                              </div>
                              <div class="event-text ul_course_design">
                                <h4>{!! $course->description !!}</h4>
                                <!-- <p>{{$course->more_info}}</p> -->
                              </div>
                              <div id="accordion-2" class="myaccordion">
                              <div class="card">
                                <div class="card-header" id="headingTwo">
                                  <h2 class="mb-0">
                                    <button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" type="button">
                                    More Information
                                     <span ><i class="fas fa-plus plus-dp"></i></span>
                                    </button>
                                  </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion-2">
                                  <div class="card-body">
                                    {!! $course->more_info !!}
                                  </div>
                                </div>
                              </div>
                            </div>

                            @if(Auth::check())
                            @else
                            <div class="notice-wrap">
                              <h4>Note :</h4><p>You have to login first to select a player.</p>
                            </div>
                            @endif
                            @php //dd($remainingSeats); @endphp

                          @if( $remainingSeats > 0 )
                              <div class="form-group">
                                  <p for="inputPlayer-3">Select Player</p>
                                  @php 
                                  if(Auth::check()){
                                    $children = DB::table('users')->where('parent_id',Auth::user()->id)->get();
                                  
                                  
                                    $selected_child = DB::table('shop_cart_items')->where('shop_type','paygo-course')->where('user_id',Auth::user()->id)->get();

                                    $child_id = array();
                                    foreach($selected_child as $ch)
                                    {
                                      $child_id[] = $ch->child_id;
                                    }
                                  }
                                  @endphp

                                  <div class="outer-slt">
                                    <select id="child" name="child" class="form-control event-dropdown">
                                      <option value="" selected="" disabled="">Select Player</option>
                                      @if(Auth::check())
                                          @php 
                                            $user = DB::table('users')->where('id',Auth::user()->id)->first();
                                          @endphp

                                          @php              
                                            $user_age = strtotime($user->date_of_birth);
                                            $current_date1 = strtotime(date('Y-m-d')); 
                                            $user_diff = abs($current_date1 - $user_age);
                                            $years1 = floor($user_diff / (365*60*60*24));

                                            $course_range1 = $course->age_group; 

                                            $check_age_group = substr_count($course->age_group, ' - '); 

                                            if($check_age_group > 0)
                                            {
                                              if(!empty($course_range1))
                                              {
                                                $range_arr1 = explode(' ',$course_range1);  

                                                if($range_arr1[1] == '-')
                                                {
                                                  $start_value1 = $range_arr1[0];
                                                  $end_value1 = $range_arr1[2];
                                                }
                                              }
                                            }
                                            

                                          @endphp
                                        @endif

                                        @if(!empty($start_value1) && !empty($end_value1))

                                          @if($start_value1 <= $years1 && $end_value1 >= $years1)
                                          <option {{$years1}} value="{{$user->id}}">{{$user->name}}</option>
                                          @endif

                                        @endif
                                      
                                      @if(Auth::check() && !empty($children))
                                        @foreach($children as $child)

                                          @php 
                                              $course_range = $course->age_group;
                                              

                                              $check_age_group1 = substr_count($course->age_group, ' - '); 

                                              if($check_age_group1 > 0)
                                              {
                                                if(!empty($course_range))
                                                {
                                                  $range_arr = explode(' ',$course_range);  

                                                  if($range_arr[1] == '-')
                                                  {
                                                    $start_value = $range_arr[0];
                                                    $end_value = $range_arr[2];
                                                  }
                                                }
                                              }
                                              
                                              $child_age = strtotime($child->date_of_birth);
                                              $current_date = strtotime(date('Y-m-d')); 
                                              $diff = abs($current_date - $child_age);
                                              $years = floor($diff / (365*60*60*24));
                                          @endphp

                                          @if(!empty($start_value) && !empty($end_value))

                                            @if($start_value <= $years && $end_value >= $years)

                                            @if(Auth::user()->id != $child->id)
                                              <option {{$years}} value="{{$child->id}}">{{$child->name}}</option>
                                            @endif

                                            @endif

                                          @endif

                                        @endforeach
                                      @endif
                                    </select>
                                  </div>

                                  
                              
                                  <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                  <p class="cst-fees"><span>£<input type="text" name="final_paygo_price" id = "final_paygo_price" value="{{ 0 }}" readonly>   </p>

                                  @endif

                                @if(Auth::check())
                                @php 
                                //dd($course->advance_weeks);
                                @endphp
                                  <button type="submit" id="course_book" class="cstm-btn event-booking-btn main_button">Book Now</button>

                                @else
                                  <a href="{{url('/login')}}" class="cstm-btn event-booking-btn main_button">Book Now</a>
                                @endif 

                                
                                                                                              
                                </div>   
                                                       
                            </form>
                            @endif

                          </div>
                          @endif
                    <div class="bottom_section event-alert-msg">
                      {!! $course->bottom_section !!} 
                    </div>   
                </div>
              </li>
            </ul>
          </div>
          
    </div>
  </div>

  
</section>


<section class="click-here-sec">
    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="click-sec-content">
            <h2 class="click-sec-tagline">Need help with kids camps or our coaching courses?</h2>
              <ul class="click-btn-content">
                <li>
                  <figure>
                  <img src="{{url('/')}}/public/images/click-btn-img.png">
              </figure>
              </li>
              <li>
                <a href="#" class="cstm-btn main_button">Click Here</a>
              </li>
              <li>
                  <figure>
                  <img src="{{url('/')}}/public/images/click-btn-img.png">
              </figure>
              </li>
              </ul>
          </div>
        </div>
       
      </div>
    </div>
</section>
    

  <!-- Modal -->
  <div class="modal fade" id="membership" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Is the person booking this course a current member of the tennis club?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="tect-wrap">
            {!! getAllValueWithMeta('membership_popup_text', 'general-setting') !!}
          </div>
          <div class="inner-warp">                 
            <form action="{{route('membership_status')}}" method="POST" id="membershipPopup" novalidate="novalidate">
              @csrf
              <!-- <div class="from-wrap">
                <p>Yes,this participant is a member of the tennis club</p>
                <input type="radio" id="memb" name="membership_status" value="Yes">
                <label for="memb" class="rad-checked"></label>                    
              </div>
              
              <hr class="from-line">
              <div class="from-wrap" id="radio_membership">
                <p>Not yet. They will become a member before classes commence </p>
                <input type="radio" id="memb1" name="membership_status" value="No">
                <label for="memb1" class="rad-checked"></label>
              </div> -->
              <div class="date_cstm_wrap">
                <ul class="days_list" id="radio_membership"> 
                  <li>
                    <label class="main-wrap">
                      <input class="day_none price_add" type="radio" value="Yes" name="membership_status">
                      <span class="checkmark ">
                        <div class="inner-wrap ">
                          <p>Yes</p>
                          <span>They are a current member of the tennis club</span>
                        </div>
                      </span>
                    </label>                                      
                  </li>
                  <li>
                    <label class="main-wrap">
                      <input class="day_none price_add" type="radio" value="No" name="membership_status">
                      <span class="checkmark ">
                        <div class="inner-wrap ">
                          <p>No</p>
                          <span>They are not a current member of the tennis club</span>
                        </div>
                      </span>
                    </label>                                      
                  </li>                                                                      
                </ul>
              </div>
              <div class="btn-wrap">
                <button class="wallet_confirm_order cstm-btn main_button" id="membershipPopupBtn">Confirm</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal After Booking -->
  <div class="modal fade modal-cust-des" id="membershipPopupAfterBooking" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLongTitle">Is this participant a member of the tennis club?</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
          </div>
          <div class="modal-body">
             <div class="tect-wrap">
              {!! getAllValueWithMeta('after_membership_popup_text', 'general-setting') !!}
            </div>
                <div class="inner-warp">
                   
                   <form action="{{route('membership_status_after_booking')}}" method="POST" novalidate="novalidate">
                    @csrf

                    <input type="hidden" name="shop_id" value="@if(old('shop_id')) {{ old('shop_id') }} @endif">

                    <div class="from-wrap">
                        <p>Yes,this participant is a member of the tennis club</p>
                      <input type="radio" id="memb" name="membership_status" value="1">
                      <label for="memb" class="rad-checked"></label>
                      
                    </div>
                    <hr class="from-line">
                    <div class="from-wrap">
                        <p>Not yet. They will become a member before classes commence </p>
                      <input type="radio" id="memb1" name="membership_status" value="0" checked>
                     <label for="memb1" class="rad-checked"></label>
                    </div>

                     <button class="wallet_confirm_order cstm-btn main_button">Book Now</button>
                   </form>
                </div>
             </div>
          </div>

          </div>
        </div>

<script src="{{ URL::asset('js/paygo-courses.js') }}"></script>
<script type="text/javascript">
  function validateCheckbox() {
    var checkbox= document.querySelector('input[name="selected_date_ids[]"]:checked');
    if(!checkbox) {
      alert('Please Select at least one date for booking.');
      return false;
    }      
  }
</script>
@endsection
