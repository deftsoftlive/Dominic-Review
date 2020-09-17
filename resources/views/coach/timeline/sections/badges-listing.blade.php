@extends('inc.homelayout')
@section('title', 'DRH|Listing')
@section('content')

<div class="account-menu">
  <div class="container">
    <div class="menu-title">
      <span>Account</span> menu
    </div>
    <nav>
      <ul>
        @include('inc.coach-menu')
      </ul>
    </nav>
  </div>
</div>

<section class="section-padding cst-plyer section-padding coach_listing request-parent">
  <div class="container">
    <div class="pink-heading">
        <h2>My Badges</h2>
    </div>

    <h5><b>Player Name</b> - @php echo getUsername($player_id); @endphp</h5>

    <div class="all-members">
      <div class="row">

        <div class="col-md-12">
              <div class="school-bages-card">
                  <div class="day-content">
                      <p class="day-wise">Badges</p>
                  </div>
                  @php
                  $selected_badges = explode(',',$badges->badges);
                  $all_badges = DB::table('badges')->get()->toArray();
                  @endphp
                  @foreach($all_badges as $badge)
                  @if(in_array($badge->id,$selected_badges))
                  @php
                  $sort_id = $badge->sort;
                  $next_id = $sort_id+1;
                  $next_badges = DB::table('badges')->where('sort',$next_id)->get();
                  @endphp
                  <div class="row">
                      <div class="col-md-3">
                          <div class="school-card">
                              <figure>
                                  <!-- <img class="badge-img" src="{{URL::asset('/uploads')}}/{{$badge->image}}"> -->
                              </figure>
                              <p>{{$badge->name}}</p>
                          </div>
                      </div>
                      <div class="col-md-6 offset-md-1">
                          <div class="school-details">
                              <!-- <p><span>Venu :</span> xyz school, uk</p>
          <p><span>Date :</span> Mon 10 February 2020</p>
          <p><span>Result :</span> Lorem Ipsum is simply dummy text of the printing</p> -->
                              <p>{!! $badge->description !!}</p>
                          </div>
                      </div>
                      <div class="col-md-2">
                          <div class="day-medal-wrap">
                              <figure>
                                  <img src="{{URL::asset('/uploads')}}/{{$badge->image}}">
                              </figure>
                          </div>
                      </div>
                  </div><br />
                  @endif
                  @endforeach
              </div>
          </div>


    </div>
    </div>

</div>
</section>

@endsection