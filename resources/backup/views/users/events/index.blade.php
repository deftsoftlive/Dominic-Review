@extends('users.layouts.layout')
@section('content')

<div class="page-header">
<div class="page-block">
<div class="row align-items-center">
<div class="col-md-6">
<div class="page-header-title">
<h5 class="m-b-10">My Events</h5>
</div>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
<li class="breadcrumb-item "><a href="javascript:void(0);">Events</a></li>
</ul>
</div>

<div class="col-md-6">
<div class="btn-wrap text-right mb-3">
<a href="{{ route('user_show_create_event') }}" class="cstm-btn">Create Event</a>
</div>
</div>

</div>
</div>
</div>
@include('admin.error_message')
<section class="content">
<div class="row">

<!-- [ rating list ] end-->
    <div class="col-xl-12 col-md-12 m-b-30">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active show" id="allevent-tab" data-toggle="tab" href="#allevent" role="tab" aria-controls="allevent" aria-selected="true">All Events</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="upcoming-tab" data-toggle="tab" href="#upcoming" role="tab" aria-controls="upcoming" aria-selected="false">Upcoming Events</a>
            </li>
             <li class="nav-item">
                <a class="nav-link" id="expred-tab" data-toggle="tab" href="#expired" role="tab" aria-controls="expred" aria-selected="false">Past Events</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active show" id="allevent" role="tabpanel" aria-labelledby="allevent-tab">
              @if(count($events) > 0)
                <table class="table table-hover">
                    
                    <tbody>
                        
                         @foreach($events as $event)
                        <tr>
                            <td>
                            @if($event->event_picture)
                              <figure class="coming-event-img">
                                  <img src="{{ url($event->event_picture) }} ">
                              </figure>
                            @endif
                              <a href="{{route('user_show_detail_event', $event->slug)}}">
                              <h4>{{ $event->title }} </h4>
                                <p class="m-0">{{ $event->description }}</p>
                              </a>
                            </td>
                            
                            <td class="text-right" style="white-space: nowrap;"><i class="fas fa-clock"></i>
          @php  
            $start_time = \Carbon\Carbon::today();  
            $finish_time = \Carbon\Carbon::parse($event->end_date); 
            $result = $start_time->diffInDays($finish_time, false);
          @endphp

          @if($result <= 0)
            Past Event
          @else
            {{ $result }} Days left
          @endif
             </td>
          </tr>
          @endforeach
                    </tbody>
                </table>
                @else
                 No Events Found
                @endif
            </div>
            <div class="tab-pane fade" id="upcoming" role="tabpanel" aria-labelledby="upcoming-tab">
                <table class="table table-hover">
                    <tbody>
                      @foreach($events as $event)
                        @php  
                          $start_time = \Carbon\Carbon::today();  
                          $finish_time = \Carbon\Carbon::parse($event->end_date); 
                          $result = $start_time->diffInDays($finish_time, false);
                        @endphp
                      @if($result > 0)
                        <tr>
                            <td>
                             @if($event->event_picture)
                              <figure class="coming-event-img">
                                  <img src="{{ url($event->event_picture) }} ">
                              </figure>  
                              @endif
                              <a href="{{route('user_show_detail_event', $event->slug)}}">
                              <h4>{{ $event->title }} </h4>
                                <p class="m-0">{{ $event->description }}</p>
                              </a>
                            </td>
                            <td class="text-right" style="white-space: nowrap;"><i class="fas fa-clock"></i> 
                              {{ $result }} Days left
                          </td>
                        </tr>
                        @endif
                        @endforeach
                       
                    </tbody>
                </table>

            </div>

            <div class="tab-pane fade" id="expired" role="tabpanel" aria-labelledby="expred-tab">
                <table class="table table-hover">
                    
                    <tbody>
                      @foreach($events as $event)
                        @php  
                          $start_time = \Carbon\Carbon::today(); 
                          $finish_time = \Carbon\Carbon::parse($event->end_date); 
                          $result = $start_time->diffInDays($finish_time, false);
                        @endphp
                      @if($result <= 0)
                        <tr>
                            <td>
                              <a href="{{route('user_show_detail_event', $event->slug)}}">
                              <h4>{{ $event->title }} </h4>
                                <p class="m-0">{{ $event->description }}</p>
                              </a>
                            </td>
                            <td class="text-right" style="white-space: nowrap;"><i class="fas fa-clock"></i>
                            Past Events {{ \Carbon\Carbon::parse($event->end_date)->format('Y-m-d') }}
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{ $events->links() }}
    </div>

   <!--  <div class="col-xl-4 col-md-12 m-b-30">

      <div class="card Upcoming-event-card">
            <div class="card-block">
              <div class="upcmg-evnt-head text-center">
              <h2>Upcoming Events</h2>
              <h3>Birthday Party</h3>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry Iooking at its layout.It is a long established fact.</p>

            </div>
              <div class="countdown-timer-container">
                <div class="countdown">
                <div class="bloc-time hours" data-init-value="24">
                  <span class="count-title">Hours</span>

                  <div class="figure hours hours-1">
                    <span class="top">2</span>
                    <span class="top-back">
                      <span>2</span>
                    </span>
                    <span class="bottom">2</span>
                    <span class="bottom-back">
                      <span>2</span>
                    </span>
                  </div>

                  <div class="figure hours hours-2">
                    <span class="top">4</span>
                    <span class="top-back">
                      <span>4</span>
                    </span>
                    <span class="bottom">4</span>
                    <span class="bottom-back">
                      <span>4</span>
                    </span>
                  </div>
                </div>

                <div class="bloc-time min" data-init-value="0">
                  <span class="count-title">Minutes</span>

                  <div class="figure min min-1">
                    <span class="top">0</span>
                    <span class="top-back">
                      <span>0</span>
                    </span>
                    <span class="bottom">0</span>
                    <span class="bottom-back">
                      <span>0</span>
                    </span>        
                  </div>

                  <div class="figure min min-2">
                   <span class="top">0</span>
                    <span class="top-back">
                      <span>0</span>
                    </span>
                    <span class="bottom">0</span>
                    <span class="bottom-back">
                      <span>0</span>
                    </span>
                  </div>
                </div>

                <div class="bloc-time sec" data-init-value="0">
                  <span class="count-title">Seconds</span>

                    <div class="figure sec sec-1">
                    <span class="top">0</span>
                    <span class="top-back">
                      <span>0</span>
                    </span>
                    <span class="bottom">0</span>
                    <span class="bottom-back">
                      <span>0</span>
                    </span>          
                  </div>

                  <div class="figure sec sec-2">
                    <span class="top">0</span>
                    <span class="top-back">
                      <span>0</span>
                    </span>
                    <span class="bottom">0</span>
                    <span class="bottom-back">
                      <span>0</span>
                    </span>
                  </div>
                </div>
              </div>
              </div>

            </div>
          </div>
    </div> -->
</div>

<!-- /.row -->

</section>



@endsection



@section('scripts')
@endsection


