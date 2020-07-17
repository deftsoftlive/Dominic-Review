@extends('inc.homelayout')

@section('title', 'DRH|Register')

@section('content')

@php 
  $country_code = DB::table('country_code')->get(); 
  $notification = DB::table('parent_coach_reqs')->where('coach_id',Auth::user()->id)->where('status',NULL)->count();
  $user = DB::table('users')->where('role_id',3)->where('id',Auth::user()->id)->first();
@endphp
<div class="account-menu">
  <div class="container">
    <div class="menu-title">
      <span>Account</span> menu
    </div>
    <nav>
      <ul>
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
      </ul>
    </nav>
  </div>
</div>

<section class="my-players section-padding cst-plyer section-padding coach_listing request-parent">
  <div class="container">
    <div class="pink-heading">
         <h2>My Players</h2>
      </div>
    <div class="all-members">
	  <div class="row">

	  	@if(count($player)> 0)
		  	@foreach($player as $pl)

		  	@php 
		  		$child = DB::table('users')->where('id',$pl->child_id)->first();
          $parent = DB::table('users')->where('id',$pl->parent_id)->first();
		  	@endphp
        <div class="col-lg-4 col-md-6">
               <div class="activity-card text-center">
                  <figure class="activity-card-img">

                    @if(!empty($child->profile_image))
                      <img id="image_src" style="width: 100px; height: 100px;" src="{{URL::asset('/uploads')}}/{{$child->profile_image}}">
                    @else
                      <img id="image_src" style="width: 100px; height: 100px;" src="{{URL::asset('/images/default.jpg')}}">
                    @endif
                    
                  </figure>
                  <figcaption class="activity-caption">
                      <p>Child Name: <span class="request-name">{{$child->name}}</span></p>
                      <p>Parent Name: <span class="request-name">{{$parent->name}}</span></p>

                      <!-- @if($pl->status == '0')
                      <div class="profile-status">Request Status: <span class="p-s-not-verified"><i class="fas fa-times-circle"></i> Did not accept</span></div>
                      <br/> -->
                     <!-- @elseif($pl->status == '1')
                      <div class="profile-status">Request Status: <span class="p-s-verified"><i class="fas fa-check-circle"></i> Accepted</span></div> 
                      <br/>
                     @elseif($pl->status == '')
                     <div id="parent_request" class="request-actions">
                     </div>
                     @endif  -->
                      <br>
                       @if($pl->status == '0')
                          <div class="profile-status">Request Status: <span class="p-s-not-verified"><i class="fas fa-times-circle"></i> Did not accept</span></div>
                          <br/>
                          <form action="{{route('undo_reject_request')}}" class="reject_req" method="POST">
                          @csrf
                          <input type="hidden" name="id" value="{{$pl->id}}">
                          <button type="submit" class="cstm-btn">Enable Link</button>
                          </form>
                       @elseif($pl->status == '1')
                          <div class="profile-status">Request Status: <span class="p-s-verified"><i class="fas fa-check-circle"></i> Accepted</span></div> 
                          <br/>
                          <form action="{{route('undo_reject_request')}}" class="reject_req" method="POST">
                          @csrf
                          <input type="hidden" name="id" value="{{$pl->id}}">
                          <button type="submit" class="cstm-btn">Unlink</button>
                          </form>
                       @elseif($pl->status == '')
                          <div id="parent_request" class="request-actions par-req-{{$child_id}}">
                            <a href="javascript:void(0);" child="{{$child_id}}" parent="{{$parent_id}}" req="1" class="cstm-btn">Accept</a>
                            <div class="reject-view" data-toggle="modal" data-target="#reject-detail-{{$pl->id}}">
                              <a href="javascript:void(0);" class="cstm-btn">Unable To Accept</a>
                            </div>
                          </div>
                       @endif
                    </figcaption>

               </div>
            </div>
		    
			@endforeach
		@else
			<div class="noData offset-md-4 col-md-4 sorry_msg">
                <div class="no_results">
                  <h3>Sorry, no results</h3>
                  <p>No Player Found</p>
                </div>
              </div>
		@endif
					 
	  </div>
	</div>
  </div>
</section>
@endsection