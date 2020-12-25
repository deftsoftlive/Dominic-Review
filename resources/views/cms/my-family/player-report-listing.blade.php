@extends('inc.homelayout')

@section('title', 'DRH|Register')

@section('content')
@php 
  $country_code = DB::table('country_code')->get(); 
  $notification = DB::table('parent_coach_reqs')->where('coach_id',Auth::user()->id)->where('status',NULL)->count();
  $user = DB::table('users')->where('role_id',3)->where('id',Auth::user()->id)->first(); 
@endphp
<div class="account-menu acc_sub_menu">
  <div class="container">
    <div class="menu-title">
	  <span>Account</span> menu
	</div>
	<nav>
	  <ul>

      @php
        $user_id = \Auth::user()->role_id;
      @endphp

      @if($user_id == '2')

  	    @include('inc.parent-menu')
        
      @elseif($user_id == 3)

        <li><a href="{{ route('coach_profile') }}" class="{{ \Request::route()->getName() === 'coach_profile' ? 'active' : '' }}">My Profile</a></li>
        <li><a href="{{ route('coach_report') }}" class="{{ \Request::route()->getName() === 'coach_report' ? 'active' : '' }}">Reports</a></li>
        <!-- <li><a href="{{ route('qualifications') }}" class="{{ \Request::route()->getName() === 'qualifications' ? 'active' : '' }}">Qualifications</a></li> -->

        @if(!empty($user))
        @if($user->enable_inovice == 1)
          <li><a href="{{ route('upload_invoice') }}" class="{{ \Request::route()->getName() === 'upload_invoice' ? 'active' : '' || \Request::route()->getName() === 'add_upload_invoice' ? 'active' : '' }}">Invoices</a></li>
        @endif
        @endif
        
        <li><a href="{{ route('coach_player') }}" class="{{ \Request::route()->getName() === 'coach_player' ? 'active' : '' }}">My Players</a></li>
        <li><a href="{{ route('my-bookings') }}" class="{{ \Request::route()->getName() === 'my-bookings' ? 'active' : '' }}">My Bookings</a></li>
        <li><a href="{{ route('request_by_parent') }}" class="{{ \Request::route()->getName() === 'request_by_parent' ? 'active' : '' }}">Notifications <span class="notification-icon">({{$notification}})</span></a></li>
        <li><a href="{{ route('account_settings') }}" class="{{ \Request::route()->getName() === 'account_settings' ? 'active' : '' }}">Settings</a></li>
        <li><a href="{{ route('logout') }}" class="{{ \Request::route()->getName() === 'logout' ? 'active' : '' }}">Logout</a></li>
      @endif
	  </ul>
	</nav>
  </div>
</div>

<section class="member section-padding">
  <div class="container">
  <div class="pink-heading">
    <h2>Player Reports</h2>
  </div>

         <div class="col-md-12">

        @if(count($children)> 0)
        <div class="player-report-table tbl_shadow">
          <div class="report-table-wrap">
     

					  <div class="m-b-table">

					  <table>
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Report Type</th>
                      <th>Player</th>
                      <th>Season</th>
                      <th>Course</th>
                      <th>Term</th>
                      <th>Feedback</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                
                        <tbody>

                          @foreach($children as $rp)

                          @php 
                            $player_id = $rp->id;
                            $report = DB::table('player_reports')->where('player_id',$player_id)->get();
                          @endphp

                          @foreach($report as $sh)
                            <tr>
                                <td><p>@php echo date("d/m/Y", strtotime($sh->date)); @endphp</p></td>
                                <td><p>@if($sh->type == 'simple') End of Term Report @elseif($sh->type == 'complex') Player Report @endif</p></td>
                                <td><p>@php echo getUsername($sh->player_id); @endphp</p></td>
                                <td><p>@if($sh->season_id) @php echo getSeasonname($sh->season_id); @endphp @else - @endif</p></td>
                                <td><p>@if($sh->course_id) @php echo getCourseName($sh->course_id); @endphp @else - @endif</p></td>
                                <td><p>{{$sh->term}}</p></td>
                                <td><p>{!! Illuminate\Support\Str::words($sh->feedback, 5, ' ...') !!}</p></td>
                                <td><p><a href="{{url('user/player-report')}}/@php echo base64_encode($sh->id); @endphp">View Report</a></p></td> 
                            </tr>
                          @endforeach

                          @endforeach
                        </tbody>
                      </table>

					  </div>

            </div>
          </div>

            @else
              <div class="noData offset-lg-4 col-lg-4 offset-md-3 col-md-6 offset-sm-2 col-sm-8 sorry_msg">
                <div class="no_results">
                  <h3>Sorry, no results</h3>
                  <p>No Report Found</p>
                </div>
              </div>
            @endif


                    
        </div>
  </div>
</section>

@endsection