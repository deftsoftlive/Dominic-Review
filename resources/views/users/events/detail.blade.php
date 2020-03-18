@extends('users.layouts.layout')
@section('content')


<style type="text/css">
  .seasonName{
    color: #fff !important;
  }
  .headline-wrap.text-center:before {
    content: "";
    position: absolute;
    height: 1px;
    background: #eda008 !important;
    width: 25%;
    left: 0;
    top: 11px;
}

.headline-wrap.text-center {
    position: relative;
    margin-bottom: 20px;
}

.headline-wrap.text-center.color-green, .headline-wrap.text-center.color-danger {
    position: relative;
    margin-bottom: 0px;
    margin-top: 20px;
}

.headline-wrap.text-center:after {
    content: "";
    position: absolute;
    height: 1px;
    background: #eda008 !important;
    width: 25%;
    right: 0;
    top: 11px;
}
.event-planning-table-wrap .cart-totals .line{
  display: none;
}

.event-planning-table-wrap .cart-totals .headline {
    background-color: #5372aa00;
    color: #eda008;
}
.event-planning-table-wrap {
    
    /* background-image: linear-gradient(to right, #6389ca 0%, #34486a 100%); */
    border: 4px solid #4472c4;
    padding: 15px;
    border-radius: 4px;
    max-width: 300px;
    width: 100%;
    animation: avatar-pulse 2s infinite;
    background-image: linear-gradient(to right, #6389ca 0%, #34486a 100%);
    animation: avatar-pulse 2s infinite;
    transition: background-color 0.5s;
    transition: 0.5s ease all;
}

.event-planning-table-wrap .cart-totals .cart-table th, .event-planning-table-wrap .cart-totals .cart-table td {
    width: auto;
    padding: 15px 10px;
    color: #fff;
    background: transparent;
    border-bottom: #ffffff29 1px solid !important;
}
</style>

<div class="page-header">
   <div class="page-block">
      <div class="row align-items-center">
         <div class="col-md-6">
            <div class="page-header-title">
               <h5 class="m-b-10">Detail Event</h5>
            </div>
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
               <li class="breadcrumb-item "><a href="{{ route('user_events') }}">Events</a></li>
               <li class="breadcrumb-item "><a href="javascript:void(0)">Detail Event</a></li>
            </ul>
         </div>
         <div class="col-md-6">
            <div class="btn-wrap text-right mb-3">
               <a href="{{ route('user_show_edit_event', $user_event->slug) }}" class="cstm-btn">edit Event</a>
            </div>
         </div>
      </div>
   </div>
</div>
<input type="hidden" id="start_date" value="{{$user_event->start_date}}">

<div class="pcoded-content p-0">
<div class="main-header" style="background-image: url({{ asset('images/event-bg.jpg') }}">
<div class="main-header__intro-wrapper">
<div class="main-header__welcome">
<div class="main-header__welcome-title text-light">Welcome, {{ Auth::user()->first_name }}<strong></strong></div>
<div class="main-header__welcome-subtitle text-light">How are you today?</div>
</div>
<div class="quickview">
<div class="quickview__item">
<div class="quickview__item-total">{{ Auth::user()->UpcomingEvents->count() }}</div>
<div class="quickview__item-description">
<i class="far fa-calendar-alt"></i>
<span class="text-light">Events</span>
</div>
</div>
<!-- <div class="quickview__item">
<div class="quickview__item-total">64</div>
<div class="quickview__item-description">
<i class="far fa-comment"></i>
<span class="text-light">Messages</span>
</div>
</div>
<div class="quickview__item">
<div class="quickview__item-total">27°</div>
<div class="quickview__item-description">
<i class="fas fa-map-marker-alt"></i>
<span class="text-light">Austin</span>
</div>
</div> -->
</div>
</div>

<div class="order-status-row">
   <article class="media order shadow delivered">
     <!--  <figure class="media-left">
         <i class="fas fa-thumbs-up"></i>
      </figure> -->
      <div class="media-content">
         <div class="content">
            <h3>
               <strong>{{$user_event->title}}</strong>
               <br>
               <small>{{$user_event->description}}
               </small>
            </h3>
         </div>
      </div>
      <div class="media-right">
        @php $eventStatus = EventCurrentStatus($user_event->start_date,$user_event->end_date) @endphp
         @if($eventStatus == 'Upcoming Event')        
          <div class="card-media-body-top-icons u-float-right">
            <div class="sm-countdown-wrap wt-countdown">
              <ul class="count-down-timer">
                  <input type="hidden" value="{{$user_event->start_date}}" id="start_date_{{$user_event->id}}" class="timerWatch" data-days="#days_{{$user_event->id}}" data-hours="#hours_{{$user_event->id}}" data-minutes="#minutes_{{$user_event->id}}" data-seconds="#seconds_{{$user_event->id}}" />
                  <li><span id="days_{{$user_event->id}}"></span>days</li>
                  <li><span id="hours_{{$user_event->id}}"></span>Hours</li>
                  <li><span id="minutes_{{$user_event->id}}"></span>Minutes</li>
                  <li><span id="seconds_{{$user_event->id}}"></span>Seconds</li>
              </ul>
            </div>
          </div>
         @else  
           <div class="tags has-addons">
              <span class="tag is-light">Status:</span>
              <span class="tag is-delivered">{{ $eventStatus }}</span>
           </div>
         @endif
      </div>
   </article>
</div>








</div>
</div>


<section class="events-detail-sec">
   <div class="row">
      <div class="col-lg-12 mb-30">
         <div class="card">
            <div class="card-block">
               <div class="event-card-head j-c-s-b">
                  <h3>Event Details</h3>
                  <!-- Shared Event Icon Html -->
                  <ul class="social-icons event-share-icons">
                    <li>
                       <a target="_blank" href="<?= \Share::load(url()->full(),'Check out '.$user_event->title.' on Envisiun User Please check it ASAP.')->facebook() ?>">
                       <img src="https://yauzer.com/images/icon-fb.png" alt="Facebook">
                    </a>
                   </li>
                    <li>
                       <a target="_blank" href="<?= \Share::load(url()->full(),'Check out '.$user_event->title.' on Envisiun User Please check it ASAP.')->twitter() ?>">
                          <img src="https://yauzer.com/images/icon-twitter.png" alt="Twitter">
                       </a>
                    </li>
                    <li>
                       <a target="_blank" href="<?= \Share::load(url()->full(),'Check out '.$user_event->title.' on Envisiun User Please check it ASAP.')->gplus() ?>">
                          <img src="https://yauzer.com/images/icon-gplus.png" alt="Google Plus">
                       </a>
                    </li>
                    <li>
                       <a target="_blank" href="<?= \Share::load(url()->full(),'Check out '.$user_event->title.' on Envisiun User Please check it ASAP.')->linkedin() ?>">
                          <img src="https://yauzer.com/images/linkedin-icon.png" alt="Linkedin">
                       </a>
                    </li>
                    <li>
                       <a target="_blank" href="<?= \Share::load(url()->full(),'Check out '.$user_event->title.' on Envisiun User Please check it ASAP.')->pinterest() ?>">
                          <img src="https://yauzer.com/images/icon-Pinterest.png" alt="Pinterest">
                       </a>
                    </li>
                  </ul>                      
                  <!-- Shared Event Icon Html End -->
               </div>
 
               <div class="row  cstm-flex-row">
                 <div class="col-lg-6">
                   <div class="event-detail-full-dec">
                     <h3 class="evt-title">{{ ucfirst($user_event->title) }}</h3>
                       <span class="evt-date">{{ \Carbon\Carbon::parse($user_event->start_date)->format('l') }}, {{ \Carbon\Carbon::parse($user_event->start_date)->formatLocalized('%b') }} {{ \Carbon\Carbon::parse($user_event->start_date)->formatLocalized('%d') }}, {{ \Carbon\Carbon::parse($user_event->start_time)->format('g:i A') }}</span>
                       <div class="evnt-full-detail">
                         <p>{{ $user_event->long_description }}</p>
                         <ul class="evt-more-dec">
                         <li><p><span class="icon"><i class="fas fa-map-marker-alt"></i></span>{{ $user_event->location }}</p></li>
                         <li><p class="evt-more-deatil"> <span class="icon"><i class="fas fa-tags"></i></span> @foreach($user_event->eventCategories as $loopingTags)#{{ $loopingTags->eventCategory->label }} @if (!$loop->last), @endif @endforeach</p></li>
                         <li><p class="evt-more-deatil"> <span class="icon"><i class="fas fa-dollar-sign"></i></span>${{ $user_event->event_budget }}</span></p></li>
                       </ul>
                       </div>
                   </div>
                 </div>
                 <div class="col-lg-6">
        <div class="event-detail-side-img">                   
        <div class="eggShape-wrap">
      <div class="eggShape-container eggShape-1"></div>
    <div class="eggShape-container eggShape-2"></div>
    <!-- <div class="eggShape-container eggShape-3"></div> -->
    <div class="egg-shape-img" style="background-image: url({{$user_event->event_picture !='' ? url($user_event->event_picture) : '' }});"></div>
    <div class="eggShape-container eggShape-5"></div>
  </div>
</div>
                 </div>
               </div>
            </div>
         </div>
      </div>

      <div class="col-lg-12 mb-30">
         <div class="card">
            <div class="card-block">
               <div class="event-card-head">
                  <h3>Event Theme</h3>
               </div>
               <div class="row">

                  
            <!-- weather section -->
            <div class="col-md-6" id="sidebar-weather" style="display: none">
            
            <div class="evt-theme-card bs mt-4 wow bounceInLeft" data-wow-delay="500ms" style="background-image: url({{ asset('frontend/images/weather.png') }})">
                      <div class="evt-theme-body">
                        <div class="form-group mb-0">
            <input type="date" min="{{date('Y-m-d', strtotime($user_event->start_date))}}" max="{{date('Y-m-d', strtotime($user_event->end_date))}}" value="{{date('Y-m-d', strtotime($user_event->start_date))}}" class="form-control" id="weatherDatePicker" placeholder="select date">
            </div>
            <div class="weather-mini-card mt-2">
              <div class="weather-info">
                <div class="weather-info-wrapper">
                  <div class="info-date">
                    <h1 id="sidebar-localTime"></h1>
                    <h5><span id="sidebar-localDate"></span></h5>
                  </div>                  
                  <div class="info-weather">
                    <div class="weather-wrapper">
                      <span class="weather-temperature" id="sidebar-mainTemperature"></span>
                      <div class="weather-sunny"><img id="sidebar-main-icon" src="{{ asset('/frontend/DarkSky-icons/SVG/clear-day.svg') }}"></div>
                    </div>        
                    <h4 class="seasonName">
                      <span class="weather-city">Season</span> 
                      <spam id="seasonName"></spam>
                    </h4>                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
            </div>
            <!-- weather section end -->

                  <!-- <div class="col-md-6">
                     <div class="evt-theme-card bs mt-4 wow bounceInLeft" data-wow-delay="500ms" style="background-image: url({{ asset('images/event-theme-bg.jpg') }})">
                      <div class="evt-theme-body">
                        <div class="title">Seasons</div>
                        <div class="value">{{$user_event->seasons}}</div>
                     </div>
                    </div>
                  </div> -->

                  <div class="col-md-6">
                     <div class="evt-theme-card bs mt-4 wow bounceInRight animated" data-wow-delay="800ms" style="background-image: url({{ asset('images/event-theme-bg-2.jpg') }})">
                      <div class="evt-theme-body">
                        @php $colours = (array)json_decode($user_event->colour); @endphp
                        <div class="title">Event Theme Color</div>
                        <!-- <div class="value">{{$user_event->colour}}<span class="theme-color-box" style="background: {{$user_event->colour}}"></span></div> -->
                        <ul class="event-theme-color">
                          @foreach($colours as $key => $colour)
                         <li>
                          <div class="theme-color-wrap"><span class="theme-color-box" style="background:{{ $colour->colour }}">{{ $colour->colourName }}</span>
                          </div>
                        </li>
                        @endforeach

                        <!--  <li><div class="theme-color-wrap"><span class="theme-color-box" style="background:#a864a8;">#a864a8</span></div></li>
                         <li><div class="theme-color-wrap"><span class="theme-color-box" style="background:#362f2d;">#362f2d</span></div></li> -->

                       </ul>
                     </div>
                   </div>
                  </div>
               </div>
            </div>
         </div>
      </div>   

  <!--  todo list html -->
   <div class="col-lg-12 mb-30">
         <div class="card">
            <div class="card-block">
               <div class="event-card-head j-c-s-b">
                  <h3><i class="fas fa-tasks"></i></span> Todo List  </h3>
               </div>
               <div class="todo-listing-wrap mt-4">
                  <ul class="Todo-item-list row wow bounceInRight" data-wow-delay="800ms">
<?php
$ToDoTask = $user_event->ToDoTasks();
 
$ToDoTasks = $ToDoTask->take(20)->get();
 
?>
              @foreach($ToDoTasks as $task)
                                 <li class="col-lg-12">
                                     <div class="todo-item">
                                       <span>{{$task->task}} </span>
                                        
                                        
                                     </div>
                                  </li>
              @endforeach                    
                    </ul>

                    <a href="{{url(route('user.tool.checklist',$user_event->slug))}}">View All</a>
               </div>
           </div>
       </div>
   </div>

 <!--  Event Planning tool -->
  <div class="col-lg-12 mb-30">
         <div class="card">
            <div class="card-block">
               <div class="event-card-head j-c-s-b">
                  <h3>My Event Planning Tool Box</h3>
               </div>
               <div class="row">
                <div class="col-lg-7">
               <div class="event-planning-navigation">
               <nav class="evt-plan-navigation">
               <ul>
                  <li>Welcome Back {{ Auth::user()->name }}! Lets continue Planning</li>
                  <li><a href="javascript:void(0);"><span class="plan-nav-icon"><i class="fas fa-list-alt"></i></span>Guest List</a></li>
                  <li><a href="javascript:void(0);"><span class="plan-nav-icon"><i class="fab fa-chrome"></i></span>Create <br/> Website</a></li>
                  <li><a href="javascript:void(0);"><span class="plan-nav-icon"><i class="fas fa-gift"></i></span>
                  Gift</a></li>
                  <li><a href="javascript:void(0);"><span class="plan-nav-icon"><i class="far fa-edit"></i></span>Create <br/> Event</a></li>
                  <li><a href="javascript:void(0);"><span class="plan-nav-icon"><i class="fas fa-couch"></i></span>Seating <br/> Chart</a></li>
                  <li><a href="javascript:void(0);"><span class="plan-nav-icon"><i class="fas fa-dollar-sign"></i></span>Budget</a></li>
                  <li><a href="{{url(route('user.tool.checklist',$user_event->slug))}}"><span class="plan-nav-icon"><i class="fas fa-tasks"></i></span>Checklist</a></li>
                  <li><a href="javascript:void(0);"><span class="plan-nav-icon"><i class="fas fa-comments"></i></span>Message <br/> Vendors</a></li>
               </ul>
            </nav>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="right-col-table">
          <div class="event-planning-table-wrap">
          <div class="cart-totals mt-2">
    <div class="headline-wrap text-center">
    <h3 class="headline">My Budget</h3>
  </div>
    <span class="line"></span><div class="clearfix"></div>

              <table class="cart-table margin-top-5">
                    @php  $b = getEventBudget($user_event) @endphp
                <tbody>
 
                  <tr>
                    <th>Total Budget</th>
                    <td><strong>${{custom_format($user_event->event_budget,2)}}</strong></td>
                  </tr>


                  <tr>
                    <th>Expenses on Vendor</th>
                    <td><strong><span class="minus-sign">-</span> ${{custom_format($b['spend'],2)}} </strong></td>
                  </tr>  

                  <tr>
                    <th>Remaining Balance</th>
                    <td><strong>${{custom_format($b['remain'],2)}}</strong></td>
                  </tr>              

                  <tr>
                    <th>Extra Expenses</th>
                    <td><strong>${{custom_format($b['over'],2)}}</strong></td>
                  </tr>

                </tbody>
              </table>
    <br>
    @if($b['over'] == 0)
    <div class="btn-wrap text-center">
       <h3 class="cstm-btn success-btn blink-text">On Budget</h3>
       <span class="line"></span><div class="clearfix"></div>
    </div>

  @else

   <div class="btn-wrap text-center">
     <h3 class="cstm-btn danger-btn blink-text">Over Budget</h3>
     <span class="line"></span><div class="clearfix"></div>
   </div>
   @endif
    <!-- <a href="#" class="calculate-shipping"><i class="fa fa-arrow-circle-down"></i> Calculate Shipping</a> -->
  </div>







</div>
        </div>
        </div>
      </div>
           </div>
       </div>
   </div>
<!-- ======================= -->


<!-- ======================= -->
      <div class="col-lg-12 mb-30">
         <div class="card">
            <div class="card-block">
               <div class="event-card-head j-c-s-b">
                  <h3>Vendors Services you choosed for your Event</h3>
                  <p class="bdgt-amout">Budget ${{$user_event->event_budget}}</p>
               </div>
                  <div class="table-responsive">
                    <table class="table event-table">
                     @foreach($user_event->eventCategories as $category)

                     <tr class="{{count( categoryOrders($category->eventCategory->id, $user_event->id) ) > 0 ? 'bg-success' : ''}}">
                        <td><label>{{$category->eventCategory->label}} </label></td>
                        <td>
                           <p class="hire-status">{{(count( categoryOrders($category->eventCategory->id, $user_event->id)) > 0) ? 'Hired' :'Not Hired'}}</p>
                        </td>
                        <td>
                           @if(count( categoryOrders($category->eventCategory->id, $user_event->id) ) > 0)
                           <span class="event-status color-green">
                           <i class="fas fa-check-circle"></i>
                           </span>
                           @else
                           <span class="event-status color-red">
                           <i class="fas fa-times-circle"></i>
                           </span>                    
                           @endif
                        </td>
                        @if(count( categoryOrders($category->eventCategory->id, $user_event->id) ) > 0)
                        <td class="action-td">
                          <a href="javascript:void(0);" 
                             data-url="{{url(route('getOrderDetailOfEvent',$user_event->id))}}?category_id={{$category->eventCategory->id}}"
                             data-categoryID="{{$category->eventCategory->id}}"
                             data-eventID="{{$category->eventCategory->id}}"
                             data-title="Hired Vendor Detail for {{$category->eventCategory->label}} Service"
                             class="action-btn detail-btn"><i class="fas fa-eye"></i>
                           </a>
                        </td>
                        @else
                        <td class="action-td"><a href="javascript:void(0);" class="action-btn"><i class="fas fa-eye-slash"></i></a></td>
                        @endif
                     </tr>
                     @endforeach
                  </table>
                </div>
           </div>
       </div>
      </div>


 <div class="col-md-12">
      <div class="card">
         <div class="card-body">
            <div class="cstm-card-head">
               <h5 class="card-title">Recommended Vendors for {{$user_event->title}}</h5>

          
            </div>
            <div class="recommended-vedors-wrap">
               @foreach($user_event->eventCategories as $category)
               <div class="rec-card">
                  <h3 class="rec-heading">{{$category->eventCategory->label}}</h3>
                  <div class="row">
                     @if(count($category->eventCategory->businesses) > 0)
                     @foreach($category->eventCategory->businesses as $business)

                     @php 
                        if(!empty(getBasicInfo($business->vendors->id, $business->category_id,'basic_information','cover_photo')))
                        {
                          $businessImage =  url(getBasicInfo($business->vendors->id, $business->category_id,'basic_information','cover_photo'));
                        }else{
                          $businessImage = url("images/vendors/settings/default.png");
                        } 
                     @endphp

                     <div class="col-lg-4">
                        <a href="{{ route('vendor_detail_page', ['catslug' => $category->eventCategory->slug, 'bslug' => $business->business_url]) }}" class="recommended-vedor" target="_blank">
                           <figure> <img src="{{ $businessImage }}"/></figure>
                           <div class="rec-detail">
                              <h3>{{ $business->title }}</h3>
                              <p>{{ getBasicInfo($business->vendors->id, $business->category_id,'basic_information','short_description') }}</p>
                           </div>
                        </a>
                     </div>
                     @endforeach
                     @else
                     <div class="col-lg-12">
                        <h5>No Recommended Vendor</h5>
                     </div>
                     @endif
                  </div>
                  <div class="row">
                     <div class="col-lg-4 col-md-6">
                        <div class="amt-list-wrap">
                           <label class="rec-heading">Amenities</label>
                           <ul class="pkg-listing-grp">
                              @if(count($category->eventCategory->CategoryAmenity) > 0)
                              @foreach($category->eventCategory->CategoryAmenity as $amenity)
                              <li class="pkg-listing">{{ $amenity->Amenity->name }}</li>
                              @endforeach
                              @else
                              <li class="pkg-listing">No Recommended Vendor Amenities</li>
                              @endif
                           </ul>
                        </div>
                     </div>
                     <div class="col-lg-4 col-md-6">
                        <div class="amt-list-wrap">
                           <label class="rec-heading">Games</label>
                           <ul class="pkg-listing-grp">
                              @if(count($category->eventCategory->CategoryGames) > 0)
                              @foreach($category->eventCategory->CategoryGames as $game)
                              <li class="pkg-listing">{{ $game->Games->name }}</li>
                              @endforeach
                              @else
                              <li class="pkg-listing">No Recommended Vendor Games</li>
                              @endif
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach          
            </div>
         </div>
      </div>
 </div>

    <div class="col-md-12">
      <div class="card">
         <div class="card-body">
            <div class="cstm-card-head">
               <h5 class="card-title">Idea Tracker / Event Diary</h5>
            </div>
<!-- open book sec -->
<div class="row">
<div class="col-md-12"> 
<form method="Post" action="{{ route('eventExtraDetail', $user_event->slug) }}">
  @csrf     
<div class="open-book-wrap">
   <section class="open-book">
            <header>
                <h1>Envisiun</h1>
                <h6>Envisiun</h6>
            </header>
            <article>
           
          <div class="row">
            <div class="col-lg-6">
              <div class="recommended-vedors-wrap ">
                <div class="rec-card">
                  <h3 class="rec-heading">Idea Tracker</h3>
                  <div class="row">
                     <div class="col-lg-12">
                        <div class='form-group'>{{textarea($errors, 'Ideas*', 'ideas', $user_event->ideas)}}<p class='error'></p></div>
                     </div>
                  </div>
               </div>  
              </div> 
                  </div>

                  <div class="col-lg-6">
                    <div class="recommended-vedors-wrap ">
               <div class="rec-card">
                  <h3 class="rec-heading">Event Diary</h3>
                  <div class="row">
                     <div class="col-lg-12">
                        <div class='form-group'><label>Event Diary*</label><textarea class='form-control  myTextEditor' id='notepad' name='notepad' rows='23' col='23'></textarea><p class='error'></p></div>
                     </div>
                  </div>
               </div>         
            </div>
                  </div>
                </div>
            </article>
            <footer>
                <ol id="page-numbers">
                    <li>1</li>
                    <li>2</li>
                </ol>
            </footer>
        </section>
      </div>
    <div class="card-footer w-100">
      <button type="submit" id="UserEventFormBtn" class="cstm-btn">Update</button>
    </div>             
    </form>      
    </div>
     </div>
<!-- Open book sec end here -->

        </div>
         </div>
      </div>


   </div>
</section>

<!-- Modal -->
<div id="cat_Modal" class="modal fade" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Modal Header</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <div class="modal-body" id="modal_body">
         </div>
      </div>
   </div>
</div>
@endsection
@section('scripts')
<script src="{{url('/js/weather-custom.js')}}"></script>
<script src="{{url('/js/comingsoon.js')}}"></script>
<script type="text/javascript">

CKEDITOR.replace('ideas');  

// weather start
function getWeather(lat, long, time) {
   const weather_route = "{{ route('get_venue_weather') }}";
   const url = `${weather_route}?latitude=${lat}&longitude=${long}&time=${time}`;
   getSideBarWeatherData(url);
}

getWeather('{{$user_event->latitude}}', '{{$user_event->longitude}}', '{{date('Y-m-d', strtotime($user_event->start_date))}}');

$('#seasonName').text(getSeasonSouthernHemisphere('{{date('Y-m-d', strtotime($user_event->start_date))}}'));

$('#weatherDatePicker').change(function() {
    const date = $(this).val();
    $("body").find('.custom-loading').show();
    $('#seasonName').text(getSeasonSouthernHemisphere(date));
    getWeather('{{$user_event->latitude}}', '{{$user_event->longitude}}', date);
});
// weather end
   
   function payments(paymentsData) {
     console.log('paymentsData ', paymentsData);
   
     let modal_data = '';
   for (var i = 0; i < paymentsData.length; i++) {
     
     modal_data += `<div class="order-booking-card">
   <div class="card-heading">
   <h3>Event Details</h3>
   </div>
   <div class="responsive-table">
   <table class="table table-striped order-list-table">
   <thead>
   <tr>
   <th>#</th>
   <th>Order Id</th>
   <th>Payment Type</th>
   <th>Price</th>
   </tr>
   </thead>
   <tbody>
   <tr>
   <td>1</td>
   <td>INVORD28</td>
   <td>paypal</td>
   <td>$556</td>
   </tr>
   </tbody>
   </table>
   </div>
   <div class="order-summary-wrap">
   <div class="row">
   <div class="col-lg-6">
   <div class="order-sum-card">
   <div class="billing-addres-detail">
   <h3 class="rec-heading">Billings Address</h3>
   
   <div class="billing-address-line">
   <p><span><i class="fas fa-user"></i></span>Narinder Singh</p>
   <p> <span> <i class="fas fa-map-marker-alt"></i> </span> sddsd, sdsdsd, Baretta, Punjab India wqewewe</p>
   <p> <span> <i class="fas fa-envelope"></i> </span> bajwa987647ss0491@gmail.com</p>
   <p><span><i class="fas fa-phone-volume"></i></span> 1212878777</p>
   <p></p> 
   </div>
   </div>
   </div>
   </div>
   
   <div class="col-lg-6">
   <div class="order-sum-card">
   <div class="billing-addres-detail">
   
   <div class="payment-sidebar cstm-sidebar">
   <h3 class="rec-heading">Payment Details</h3>
   <table id="payment-table" class="table payment-table">
   <tbody><tr>
   <th>
   Price
   <p>(Gold)</p>
   </th>
   <td>$1000</td>
   </tr>
   <tr>
   <th colspan="2">
   Addons 
   <ul class="mini-inn-table">
   <li><span class="labl"> Add On for two Large Portrait </span><span> $50 </span></li>     
   </ul>
   </th>
   </tr>
   <tr>
   <th>Tax</th>
   <td> $ 3</td>
   </tr>
   <tr>
   <th>Service Fee</th>
   <td>$ 3</td>
   </tr>
   <tr class="total-price-row">
   <th>Total Payable Amount</th>
   <td>$<span id="packagePrice">556</span></td>
   </tr>
   </tbody></table>
   <section class="content-header">
   <div class="row" id="suc_show" style="display: none;">
   <div class="col-md-12">
   <div class="alert alert-success">
   <strong>Success! </strong>
   <span id="res_mess"></span>
   </div>
   </div>
   </div>              
   <div class="row" id="err_show" style="display: none;">
   <div class="col-md-12">
   <div class="alert alert-danger">
   <strong>Error! </strong>
   <span id="err_mess"></span>
   </div>         
   </div>
   </div>
   </section>                
   </div>
   </div>
   </div>
   </div>
   </div>
   </div>
   </div>`;
   paymentsData[i]
   }
     $('#modal_body').html(modal_data);
    } 
   
</script>
<script>
   var radius = '';
    if(window.innerWidth < 767) {
      radius = '10em';
    } else {
     radius = '10em'; //distance from center
    }
   var type = 1, //circle type - 1 whole, 0.5 half, 0.25 quarter
     start = -90, //shift start from 0
     $elements = $('.event-planning-navigation li:not(:first-child)'),
     numberOfElements = (type === 1) ?  $elements.length : $elements.length - 1, //adj for even distro of elements when not full circle
     slice = 360 * type / numberOfElements;
   
   $elements.each(function(i) {
     var $self = $(this),
         rotate = slice * i + start,
         rotateReverse = rotate * -1;
     
     $self.css({
         'transform': 'rotate(' + rotate + 'deg) translate(' + radius + ') rotate(' + rotateReverse + 'deg)'
     });
   });





//###############################################################################################################


$("body").on('click','.detail-btn',function(e){
      e.preventDefault();
      var $this = $(this);
      getDetail($this);
});

//################################################################################################################


function getDetail($this) {

        var $model = $('#cat_Modal');
        var eventID = $this.attr('data-eventID');
        var categoryID = $this.attr('data-categoryID');
        var url = $this.attr('data-url');
        var title = $this.attr('data-title');
        $model.find('.modal-title').text(title);
        

     $.ajax({
               url : url,
               type: 'GET',   
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
               },
                beforeSend: function() {
                    $("body").find('.custom-loading').show();
                      

                },
                success: function (result) {
                       if(parseInt(result.status) == 1){
                           
                            $model.find('#modal_body').html(result.htm);
                            $model.modal('show');
                        $("body").find('.custom-loading').hide();
                       } 

               },
               complete: function() {
                        $("body").find('.custom-loading').hide();
               },
               error: function (jqXhr, textStatus, errorMessage) {
                     
               }

        });
}



</script>
@endsection