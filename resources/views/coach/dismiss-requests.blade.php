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
      
  	    @include('inc.parent-menu')

      @elseif($user_id == 3)

        @include('inc.coach-menu')

      @endif
	  </ul>
	</nav>
  </div>
</div>

@if(Session::has('success'))
<div class="alert_msg alert alert-success">
   <p>{{ Session::get('success') }} </p>
</div>
@endif

<section class="member section-padding">
  <div class="container">
  <div class="pink-heading">
    <h2>Dismiss Notifications</h2>
  </div>

    <div class="col-md-12">

        @if(count($req)> 0)
        <h2 class="cst_sub_heading">Parent Link Requests</h2>
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
                            <!-- <th>Action</th> -->
                          </tr>
                        </thead>
                        <tbody>
                        @if(!empty($req))
                        @foreach($req as $re)
                        @php 
                         $parent = DB::table('users')->where('id',$re->parent_id)->first(); 
                         $child = DB::table('users')->where('id',$re->child_id)->first();
                         $coach = DB::table('users')->where('id',$re->coach_id)->first();
                        @endphp

                          <tr>
                            <td><p>{{$re->updated_at}}</p></td>
                           <!--  <td><p>{{$parent->name}}</p></td> -->
                            <td><p>{{isset($child->name) ? $child->name : ''}}</p></td>
                            <td><p>{{isset($coach->name) ? $coach->name : ''}}</p></td>
                            <td><p>
                              @if($re->status == 1)
                                  <h6 style="color:green;"><b>Accepted</b></h6>
                              @elseif($re->status == 2)
                                  <h6 style="color:red;"><b>Coach is unable to accept your request</b></h6>
                              @elseif($re->status == 0)
                                  <h6 style="color:green;"><b>Request Sent</b></h6>
                              @endif
                            </p></td>
                            <td><p>{{isset($re->reason_of_rejection) ? $re->reason_of_rejection : '-'}}</p></td> 
                            <!-- <td>
                              <form action="{{route('dismiss-request-parent')}}" method="POST">
                                  @csrf
                                  <input type="hidden" name="id" value="{{$re->id}}">
                                  <button type="submit" class="cstm-btn main_button">Dismiss</button>
                              </form>
                            </td> -->
                          </tr>
                          @endforeach
                          @endif
                        </tbody>
                      </table>

					      </div>

            </div>
          </div>

            @else
              <div class="noData offset-md-4 col-md-4 sorry_msg">
                <div class="no_results">
                  <h3>Sorry, no results</h3>
                  <p>No result Found</p>
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
                          @php 
                            $purchase_course = \DB::table('shop_cart_items')->where('shop_type','course')->where('child_id','!=',NULL)->where('orderID','!=',NULL)->where('order_id','!=',NULL)->groupBy('child_id')->paginate(10);
                          @endphp
                          @if(count($purchase_course)>0)
                          @foreach($purchase_course as $bd)

                          @php 
                              $shop = DB::table('shop_cart_items')->where('child_id',$bd->child_id)->where('shop_type','course')->where('orderID','!=',NULL)->get();
                              $user = DB::table('users')->where('id',$bd->child_id)->first();
                              $user_badges = DB::table('user_badges')->where('user_id',$bd->child_id)->first();

                              $selected_badges = isset($user_badges->badges) ? explode(',',$user_badges->badges) : '';
                          @endphp
                           

                              <tr>
                                  <td><p>{{$bd->updated_at}}</p></td>
                                  <td><p>{{isset($user->name) ? $user->name : ''}}</p></td>
                                  <td>
                                     @php $course = array(); @endphp
                                     @foreach($shop as $sh)
                                          @php $course[] = getCourseName($sh->product_id); @endphp
                                     @endforeach 
                                     @php $course_name = implode(', ',$course); @endphp
                                     {{$course_name}}
                                  </td>
                                  <td>{{isset($user_badges->badges_points) ? $user_badges->badges_points : ''}}</td>
                                  <td>

                                    <ul class="leader-bord-bages">
                                      <li>
                                        <figure>
                                          @if(!empty($selected_badges))
                                          @foreach($selected_badges as $se)
                                              @php 
                                                  $badge = DB::table('badges')->where('id',$se)->first(); 
                                              @endphp
                                                  <img class="badge-img"  src="{{URL::asset('/uploads')}}/{{$badge->image}}">
                                          @endforeach
                                          @endif
                                        </figure>
                                    </li>
                                    </ul>
                                      
                                  </td>
                                 
                              </tr>

                          @endforeach
                          @else
                          <tr>
                              <td colspan="5">
                                  <div class="no_results">
                                      <h3>No result found.</h3>
                                  </div>
                              </td>
                          </tr>
                          @endif
                       
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