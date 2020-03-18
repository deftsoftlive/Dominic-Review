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
    	<div class="content-main-wrap">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a href="{{url(route('user_events'))}}" class="nav-link  {{$status == 'all' ? 'active' : ''}} show">All Events</a>
            </li>
            <li class="nav-item">
                <a href="{{url(route('user_event','upcoming'))}}" class="nav-link {{$status == 'upcoming' ? 'active' : ''}}" id="upcoming-tab">Upcoming Events</a>
            </li>
            <li class="nav-item">
                <a href="{{url(route('user_event','ongoing'))}}" class="nav-link {{$status == 'ongoing' ? 'active' : ''}}" id="upcoming-tab">Ongoing Events</a>
            </li>
             <li class="nav-item">
                <a href="{{url(route('user_event','past'))}}" class="nav-link {{$status == 'past' ? 'active' : ''}}" id="expred-tab">Past Events</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active show" id="allevent" role="tabpanel" aria-labelledby="allevent-tab">
            
@if(count($events) > 0)              
@foreach($events as $k => $event)
  <div class="card-media  mt-4 wow bounceInRight" data-wow-delay="{{100 * ($k + 0.5)}}ms">
    <!-- media container -->
    <div class="card-media-object-container">
      <div class="card-media-object" style="background-image: url({{$event->event_picture !='' ? url($event->event_picture) : '' }});">
      	<div class="date-ribbon"><h2>{{ \Carbon\Carbon::parse($event->start_date)->formatLocalized('%b') }}</h2> <h1>{{ \Carbon\Carbon::parse($event->start_date)->formatLocalized('%d') }}</h1></div>
      </div>
      <span class="card-media-object-tag subtle {{ str_slug(EventCurrentStatus($event->start_date,$event->end_date)) }}">{{ EventCurrentStatus($event->start_date,$event->end_date)}}</span>
    </div>
    <!-- body container -->
    <div class="card-media-body">
      <div class="card-media-body-top">
        <span class="subtle">
          <strong>{{ ucfirst($event->title) }}</strong></br>
          {{ \Carbon\Carbon::parse($event->start_date)->format('l') }}, {{ \Carbon\Carbon::parse($event->start_date)->formatLocalized('%b') }} {{ \Carbon\Carbon::parse($event->start_date)->formatLocalized('%d') }}, {{ \Carbon\Carbon::parse($event->start_time)->format('g:i A') }}
        </span>
        <div class="card-media-body-top-icons u-float-right">
         
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
@endforeach
@else
<div class="alert alert-info closer-step mb-3 mt-4" role="alert">
  <i class="fa fa-info-circle"></i> No Events Found
</div>
@endif


            </div>
    

 
        </div>
        {{ $events->links() }}
    </div>
    </div>

</div>

<!-- /.row -->

</section>



@endsection



@section('scripts')
@endsection


