@extends('inc.homelayout')

@section('title', 'DRH|Register')

@section('content')

<style>
  img.badge-img {
    width: 8%;
}
</style>
<div class="account-menu acc_sub_menu">
  <div class="container">
    <div class="menu-title">
	  <span>Account</span> menu
	</div>
	<nav>
	  <ul>

      @php
        $user_id = \Auth::user()->role_id;
        $notification = DB::table('parent_coach_reqs')->where('coach_id',Auth::user()->id)->where('status',NULL)->count();
      @endphp

      @if($user_id == '2')
  	    <li><a href="{{ route('my-family') }}" class="{{ \Request::route()->getName() === 'my-family' ? 'active' : '' || \Request::route()->getName() === 'add-family-member' ? 'active' : '' || \Request::route()->getName() === 'edit-family-member' ? 'active' : '' }}">My family</a></li>
        <!-- <li><a href="{{ route('player_report_listing') }}" class="{{ \Request::route()->getName() === 'player_report_listing' ? 'active' : '' }}">Reports</a></li> -->
        <li><a href="{{ route('my-bookings') }}" class="{{ \Request::route()->getName() === 'my-bookings' ? 'active' : '' }}">My Bookings</a></li>
        <li><a href="{{ route('badges') }}" class="{{ \Request::route()->getName() === 'badges' ? 'active' : '' }}">DRH Tennis Pro</a></li>
        <li><a href="{{ route('linked_coaches') }}" class="{{ \Request::route()->getName() === 'linked_coaches' ? 'active' : '' }}">My Coaches</a></li>
        <li><a href="{{ route('parent_notifications') }}" class="{{ \Request::route()->getName() === 'parent_notifications' ? 'active' : '' }}">Notifications <span class="notification-icon"></span></a></li>
        <li><a href="" class="">Settings</a></li>
        <li><a href="{{ route('logout') }}" class="{{ \Request::route()->getName() === 'logout' ? 'active' : '' }}">Logout</a></li>
      @elseif($user_id == 3)
        <li><a href="{{ route('coach_profile') }}" class="{{ \Request::route()->getName() === 'coach_profile' ? 'active' : '' }}">My Profile</a></li>
        <!-- <li><a href="{{ route('qualifications') }}" class="{{ \Request::route()->getName() === 'qualifications' ? 'active' : '' }}">Qualifications</a></li> -->
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
    <h2>Notifications</h2>
  </div>

    <div class="col-md-12">

        @if(count($req)> 0)
        <h2 class="cst_sub_heading">Coach Link Requests</h2>
        <div class="player-report-table tbl_shadow">
         
          <div class="report-table-wrap">
     
					  <div class="m-b-table">

					  <table>
                        <thead>
                          <tr>
                            <th>Date</th>
                            <!-- <th>Parent Name</th> -->
                            <th>Player Name</th>
                            <th>Name Of Coach</th>
                            <th>Status</th>
                            <th>Further Details</th>
                          </tr>
                        </thead>
                        <tbody>
                        
                        @foreach($req as $re)
                        @php 
                         $parent = DB::table('users')->where('id',$re->parent_id)->first(); 
                         $child = DB::table('users')->where('id',$re->child_id)->first();
                         $coach = DB::table('users')->where('id',$re->coach_id)->first();
                        @endphp

                          <tr>
                            <td><p>{{$re->updated_at}}</p></td>
                           <!--  <td><p>{{$parent->name}}</p></td> -->
                            <td><p>{{$child->name}}</p></td>
                            <td><p>{{$coach->name}}</p></td>
                            <td><p>
                              @if($re->status == 1)
                                  <h6 style="color:green;"><b>Accepted</b></h6>
                              @elseif($re->status == 0)
                                  <h6 style="color:red;"><b>Coach is unable to accept your request</b></h6>
                              @elseif($re->status == 2)
                                  <h6 style="color:green;"><b>Request Sent</b></h6>
                              @endif
                            </p></td>
                            <td><p>{{isset($re->reason_of_rejection) ? $re->reason_of_rejection : '-'}}</p></td> 
                          </tr>
                          @endforeach
                        </tbody>
                      </table>

					      </div>

            </div>
          </div>

            @else
              <div class="noData offset-md-4 col-md-4 sorry_msg">
                <div class="no_results">
                  <h3>Sorry, no results</h3>
                  <p>No Booking Found</p>
                </div>
              </div>
            @endif
        
        </div>

    <br/><br/>

    <div class="col-md-12">
    @php 
      $purchase_course = \DB::table('shop_cart_items')->where('user_id',Auth::user()->id)->where('shop_type','course')->where('child_id','!=',NULL)->where('orderID','!=',NULL)->where('order_id','!=',NULL)->orderBy('id','asc')->paginate(10);
    @endphp
        @if(count($purchase_course)> 0)
         <h2 class="cst_sub_heading">New Player Achievements</h2>
        <div class="player-report-table tbl_shadow">
        
          <div class="report-table-wrap">

            <div class="m-b-table">

            <table>
                        <thead>
                          <tr>
                            <th>Date</th>
                            <th>Player Name</th>
                            <th>Course</th>
                            <th>Points</th>
                            <th>Assigned Badges</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                        @foreach($purchase_course as $re)
                        @php 
                         $child = DB::table('users')->where('id',$re->child_id)->first();
                         $course = DB::table('courses')->where('id',$re->product_id)->first();
                         $user_badges = DB::table('user_badges')->where('user_id',$re->child_id)->first();
                         $selected_badges = explode(',',$user_badges->badges);
                         $points = array();
                        @endphp

                        @foreach($selected_badges as $data=>$value)

                        @php 
                          $badge = DB::table('badges')->where('id',$value)->first(); 
                          $points[] = $badge->points;
                        @endphp

                        @endforeach

                        @php $total_points = array_sum($points); @endphp

                          <tr>
                            <td><p>{{$re->updated_at}}</p></td>
                            <td><p>{{$child->name}}</p></td>
                            <td><p>{{$course->title}}</p></td>
                            
                            <td><p>{{$total_points}}</p></td>
                            <td>
                            <ul class="leader-bord-bages">
                            <li>
                              <figure>
                                @foreach($selected_badges as $data=>$value)
                                @php $badge = DB::table('badges')->where('id',$value)->first(); @endphp
                                  <img class="badge-img" src="{{URL::asset('/uploads')}}/{{$badge->image}}">
                                @endforeach
                              </figure>
                          </li>
                          </ul></td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>

                </div>

            </div>
          </div>

          @endif


                    
        </div>

  </div>
</section>


@endsection