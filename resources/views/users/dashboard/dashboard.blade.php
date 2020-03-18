@extends('users.layouts.layout') @section('content')

<style type="text/css">

</style>

@if(\Auth::user()->email_verified_at == '')
@else
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
@endif

<section class="content">
    <div class="row">

        @if(\Auth::user()->email_verified_at == '')
            <p>Your account is not verified. Please check your email to verify your account.</p>
        @else
        <!-- [ rating list ] end-->
        <div class="col-xl-12 col-md-12">
            <div class="content-main-wrap">
              <div class="card-heading">
                     <h3>Upcoming Camps</h3>
                  </div>
                                
              <!--   Upcoming event -->
              @if(count($events) > 0)
                @foreach($events as $k => $event)     
                  @php  
                    $start_time = \Carbon\Carbon::now();  
                    $finish_time = \Carbon\Carbon::parse($event->end_date); 
                    $result = $start_time->diffInDays($finish_time, false);
                  @endphp

                @if($result > 0)                           
                <div class="card-media  mt-4 wow bounceInRight" data-wow-delay="{{100 * ($k + 0.5)}}ms">
                    <!-- media container -->
                    <div class="card-media-object-container">
                        <div class="card-media-object" style="background-image: url({{url($event->event_picture)}});">
                            <div class="date-ribbon">
                                <h2>Dec</h2>
                                <h1>13</h1></div>
                        </div>
                        <span class="card-media-object-tag subtle {{ str_slug(EventCurrentStatus($event->start_date,$event->end_date)) }}"><?= EventCurrentStatus($event->start_date,$event->end_date) ?></span>
                    </div>
                    <!-- body container -->
                    <div class="card-media-body">
                        <div class="card-media-body-top">
                            <span class="subtle">
                                <strong>{{ ucfirst($event->title) }}</strong></br>
                                 {{ \Carbon\Carbon::parse($event->start_date)->format('l') }}, {{ \Carbon\Carbon::parse($event->start_date)->formatLocalized('%b') }} {{ \Carbon\Carbon::parse($event->start_date)->formatLocalized('%d') }}, {{ \Carbon\Carbon::parse($event->start_time)->format('g:i A') }}</span>
                            <div class="card-media-body-top-icons u-float-right">
                                <div class="sm-countdown-wrap">
                                <ul class="count-down-timer">
                                    <input type="hidden" value="{{$event->start_date}}" id="start_date_{{$event->id}}" class="timerWatch" data-days="#days_{{$event->id}}" data-hours="#hours_{{$event->id}}" data-minutes="#minutes_{{$event->id}}" data-seconds="#seconds_{{$event->id}}" />
                                    <li><span id="days_{{$event->id}}"></span>days</li>
                                    <li><span id="hours_{{$event->id}}"></span>Hours</li>
                                    <li><span id="minutes_{{$event->id}}"></span>Minutes</li>
                                    <li><span id="seconds_{{$event->id}}"></span>Seconds</li>
                                </ul>
                            </div>

                            </div>
                        </div>
                        <span class="card-media-body-heading">{{ $event->description }}</span>
                        <div class="card-media-body-supporting-bottom">
                            <span class="card-media-body-supporting-bottom-text subtle">{{ $event->location }}</span>
                            <span class="card-media-body-supporting-bottom-text subtle u-float-right">Event Budget &ndash; ${{ $event->event_budget }}</span>
                        </div>
                        <div class="card-media-body-supporting-bottom card-media-body-supporting-bottom-reveal">
                            <span class="card-media-body-supporting-bottom-text subtle ">@foreach($event->eventCategories as $loopingTags)#{{ $loopingTags->eventCategory->label }} @if (!$loop->last)
        , @endif @endforeach</span>
                            <a href="{{route('user_show_detail_event', $event->slug)}}" class="card-media-body-supporting-bottom-text card-media-link u-float-right">VIEW DETAILS</a>
                        </div>
                    </div>
                </div>
                  @endif
                @endforeach
               @else
                  <div class="alert alert-info closer-step mb-3" role="alert">
                     <i class="fa fa-info-circle"></i> No Camps Found
                  </div>
               @endif

                <!-- ============================== -->

            </div>
        </div>

        {{ $events->links() }}
        @endif
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

<input type="hidden" id="login_count" value="{{Auth::user()->login_count}}"> @endsection @section('scripts')
<script src="{{URL::asset('clockface/js/clockface.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('/js/comingsoon.js')}}"></script>
<script src="{{URL::asset('/js/setLatLong.js')}}"></script>
<script src="{{URL::asset('/js/welcome_popup.js')}}"></script>
<script type="text/javascript">
    var login_count = $("body").find('#login_count').val();

    if (parseInt(login_count) == 0) {
        $('#firstUserModal').modal('show');
    }
</script>

@endsection