<!-- Header section -->
@extends('inc.homelayout')

@section('title', 'DRH|Listing')

@section('content')

<section class="football-course-sec" style="background: url(http://49.249.236.30:8654/dominic-new/public/uploads/1583997335banner_image.png);">
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
		<div class="row">
          <div class="col-md-12 sports-text">
            <ul class="events-wrap">
              <li>
                <div class="event-card ul_course_design">
                  <div class="event-card-heading">
                      <h3>{{$course->term}} - {{$course->day_time}}</h3>
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
                                   <span>Begineer</span>
                                </div>
                              </div>
                              <div class="event-card-heading sub_heading h-c-dates">
                               <h3>course-dates</h3>
                             </div>
                            
                              <div class="days-list">

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
                                    <button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
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
                          <div class="event-card-form">
                            <form id="course-booking" method="POST">
                              @csrf
                              <div class="form-group">
                                  <label for="inputPlayer-3">Select Player</label>
                                  @php 
                                  if(Auth::check()){
                                    $children = DB::table('users')->where('parent_id',Auth::user()->id)->get();
                                  
                                  
                                    $selected_child = DB::table('shop_cart_items')->where('shop_type','course')->where('user_id',Auth::user()->id)->get();

                                    $child_id = array();
                                    foreach($selected_child as $ch)
                                    {
                                      $child_id[] = $ch->child_id;
                                    }
                                  }
                                  @endphp
                                 <!--  <select id="inputPlayer-3" class="form-control event-dropdown">
                                    <option value="" selected="" disabled="">Select Child</option>
                                    @if(Auth::check() && !empty($children))
                                      @foreach($children as $child)
                                        <option  
                                        @if(in_array($child->id, $child_id))
                                          disabled
                                        @endif
                                        value="{{$child->id}}">{{$child->name}}</option>
                                      @endforeach
                                    @endif
                                  </select> --> 

                                  <select id="inputPlayer-3" name="child" class="form-control event-dropdown">
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
                                          
                                          if(!empty($course_range1))
                                          {
                                            $range_arr1 = explode('-',$course_range1);
                                            $start_value1 = $range_arr1[0];
                                            $end_value1 = $range_arr1[1];
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
                                          
                                          if(!empty($course_range))
                                          {
                                            $range_arr = explode('-',$course_range);
                                            $start_value = $range_arr[0];
                                            $end_value = $range_arr[1];
                                          }
                                          
                                          $child_age = strtotime($child->date_of_birth);
                                          $current_date = strtotime(date('Y-m-d')); 
                                          $diff = abs($current_date - $child_age);
                                          $years = floor($diff / (365*60*60*24));
                                      @endphp

                                      @if(!empty($start_value) && !empty($end_value))

                                        @if($start_value <= $years && $end_value >= $years)
                                        <option {{$years}} value="{{$child->id}}">{{$child->name}}</option>
                                        @endif

                                      @endif

                                      @endforeach
                                    @endif
                                  </select>

                                  @php 
                                    $course_cat = $course->type; 
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
                              
                                  <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                  <input type="hidden" name="child_id" id="child_id" value="">
                                  <label class="cst-fees"><span>£</span>

                                @if($currntD >= $endDate)
                                  {{$course->price}}
                                @else
                                  @if($early_bird_enable == '1')
                                    @php 
                                      $cour_price = $course->price;
                                      $dis_price = $cour_price - (($cour_price) * ($percentage/100));
                                    @endphp
                                    {{$dis_price}}
                                  @else
                                    {{$course->price}}
                                  @endif
                                @endif
                                  </label>

                                @if(Auth::check())
                                  <button type="submit" id="course_book" class="cstm-btn event-booking-btn">Book Now</button>
                                @else
                                  <a href="{{url('/login')}}" class="cstm-btn event-booking-btn">Book Now</a>
                                @endif 
                                                                                              
                                </div>   
                                                       
                            </form>

                          </div>

                    <div class="event-booking">
                      <h1 class="event-booking-price"><span>£</span>{{$course->price}}</h1> 
                      <a href="javascript:void(0);" class="cstm-btn">Book Now</a>
                    </div>
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
        		   	    <img src="http://49.249.236.30:8654/dominic-new/public/images/click-btn-img.png">
        			  </figure>
        		  	</li>
        		  	<li>
        		  		<a href="" class="cstm-btn">Click Here</a>
        		  	</li>
        		  	<li>
        	          <figure>
        		   	    <img src="http://49.249.236.30:8654/dominic-new/public/images/click-btn-img.png">
        			  </figure>
        		  	</li>
        		    </ul>
        		</div>
        	</div>
         
        </div>
      </div>
    </section>
@endsection