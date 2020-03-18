@extends('users.layouts.layout')
@section('content')

<style type="text/css">
 
</style>

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">My Dashboard</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item "><a href="javascript:void(0);">Dashboard</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

       <section class="content">
      <div class="row">

   
        <!-- [ rating list ] end-->
                                <div class="col-xl-12 col-md-12">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active show" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Upcoming Events</a>
                                        </li>
                                        
                                    </ul>
                                    <div class="tab-content main-outer-tab" id="">
                                      <div class="row">


                             @if(count($events) > 0)
                                      @foreach($events as $event)
                                        @php  
                                          $start_time = \Carbon\Carbon::now();  
                                          $finish_time = \Carbon\Carbon::parse($event->end_date); 
                                          $result = $start_time->diffInDays($finish_time, false);
                                        @endphp
                                      @if($result > 0)
                                         <div class="col-lg-6">
                                    <div class="card Upcoming-event-card">
                                        <div class="card-block">
                                          <div class="upcmg-evnt-head">

                                             @if($event->event_picture !="")
                                       <figure class="coming-event-img">
                                        <img src="{{url($event->event_picture)}}">
                                      </figure>
                                        @endif

                                        <div class="coming-evet-des">

                                          <a href="{{route('user_show_detail_event', $event->slug)}}"> <h2>Upcoming Events</h2>
                                      
                                          <h3>{{$event->title}}</h3>
                                        </a>
                                          <p>{{$event->description}}</p>
                                        </div>

                                        </div>
                                        <div class="countdown-timer-container">
                                          <input type="hidden" value="{{$event->end_date}}" id="end_date_{{$event->id}}" />
                                        <ul class="count-down-timer">
                                          <li><span id="days_{{$event->id}}"></span>days</li>
                                          <li><span id="hours_{{$event->id}}"></span>Hours</li>
                                          <li><span id="minutes_{{$event->id}}"></span>Minutes</li>
                                          <li><span id="seconds_{{$event->id}}"></span>Seconds</li>
                                        </ul>

                                        <script type="text/javascript">
                                          setTimeout(() => {
                                            comingsoon('end_date_{{$event->id}}', 'days_{{$event->id}}', 'hours_{{$event->id}}', 'minutes_{{$event->id}}', 'seconds_{{$event->id}}');
                                          }, 500);
                                        </script>

                                      </div>
                                        </div>
                                      </div>
                                </div>
                                @endif
                                                    @endforeach
                                          @else
                                             No Events Found
                                            @endif
                                                  </div>
{{ $events->links() }}
 
                                    </div>
                                </div>
                                
      </div>
      <!-- /.row -->
    </section>












 

<!-- First User Modal -->
<!-- <div class="modal fade" id="firstUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
 
      <div class="modal-body">
        
        <div class="row">
          <div class="col-lg-5">
            <figure class="about-event-img">
              <img src="{{ asset('/frontend/images/event-form-img.png') }}">
              <div class="form-img-cont text-center">
              <h2 class="modal-title">Why are you here?</h2>
              <p>Congratulation for using our Platform</p>
            </div>
            </figure>
          </div>
          <div class="col-lg-7">
            <div class="first-user-form">
            

            <section class="multi_step_form haveFiveSteps">
              <div id="msform"> 
                <ul id="progressbar">
                  <li class="step-item stp-1 active"></li>
                  <li class="step-item stp-2 "></li>
                  <li class="step-item stp-3 "></li>
                  <li class="step-item stp-4 "></li>
                  <li class="step-item stp-5 "></li>
                </ul>
              </div>
            </section>
            <input type="hidden" name="progressbar" value="1">

            <div class="card-heading">
                       <h3>Lets talk about your event.</h3>     
            </div>

            <div class="step1 stepForm">
                      @include('users.includes.welcome_popup.stepOne')
           </div>

            <div class="step2 stepForm">
                 @include('users.includes.welcome_popup.stepSecond')
              </div>


              <div class="step3 stepForm">
                 @include('users.includes.welcome_popup.step3')
              </div>

               <div class="step4 stepForm">
                 @include('users.includes.welcome_popup.step4')
              </div>


               <div class="step5 stepForm">
                 @include('users.includes.welcome_popup.step5')
              </div>



      </div>
    </div>
  </div>
       
    </div>
  </div>
</div>
</div> -->



 
<input type="hidden" id="login_count" value="{{Auth::user()->login_count}}">


@endsection


@section('scripts')
<script src="{{url('clockface/js/clockface.js')}}" type="text/javascript"></script>
<script src="{{url('/js/comingsoon.js')}}"></script>
<script src="{{url('/js/setLatLong.js')}}"></script>
<script src="{{url('/js/welcome_popup.js')}}"></script>
<script type="text/javascript">
 
 var login_count = $("body").find('#login_count').val();

 if(parseInt(login_count) >= 0){
      $('#firstUserModal').modal('show');
 }




 </script>






@endsection


