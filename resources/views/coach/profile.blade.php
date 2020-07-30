@extends('inc.homelayout')
@section('title', 'DRH|Register')
@section('content')
@php
$country_code = DB::table('country_code')->get();
$notification = DB::table('parent_coach_reqs')->where('coach_id',Auth::user()->id)->where('status',NULL)->count();
$user1 = DB::table('users')->where('role_id',3)->where('id',Auth::user()->id)->first(); 
@endphp
<style>
   .card.coach_profile {
   border: 4px solid #be298d;
   padding: 30px;
   box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.1);
   border-radius: 0;
   }
</style>
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
@if(Session::has('success'))
<div class="alert_msg alert alert-success">
   <p>{{ Session::get('success') }} </p>
</div>
@endif
<section class="register-sec cstm-reg-sec">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-8 col-md-10">
            <div class="card coach_profile">
               <div class="card-header">{{ __('My Profile') }}</div>
               <div class="card-body">
                  <form class="register-form" method="POST" enctype="multipart/form-data" action="{{route('update_coach_profile')}}">
                     @csrf
                     <input type="hidden" name="coach_id" value="{{ $logined_user }}">
                     <input type="hidden" name="coach_profile_id" value="{{ isset($user->id) ? $user->id : '' }}">
                     <div class="profile-status-text" style="margin-top:5px;">
                        {!! getAllValueWithMeta('form_head_content', 'my-profile') !!}
                     </div>
                     <div class="row">
                        <!-- Profile Name -->
                        <div class="form-group row f-g-full">
                           <label for="profile_name" class="col-md-12 col-form-label text-md-right">{{ __('My Profile Name') }}</label>
                           <div class="col-md-12">
                              <input id="profile_name" type="text" class="form-control{{ $errors->has('profile_name') ? ' is-invalid' : '' }}" name="profile_name" value="{{ isset($user->profile_name) ? $user->profile_name : '' }}" required autofocus placeholder="Please enter profile name">
                              @if ($errors->has('profile_name'))
                              <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('profile_name') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div>
                        <!-- Qualified Cubs -->
                        <div class="form-group row f-g-full">
                           <label for="qualified_clubs" class="col-md-12 col-form-label text-md-right">{{ __('My Tennis Club') }}</label>
                           <div class="col-md-12">
                              <input id="qualified_clubs" type="text" class="form-control{{ $errors->has('qualified_clubs') ? ' is-invalid' : '' }}" name="qualified_clubs" value="{{ isset($user->qualified_clubs) ? $user->qualified_clubs : '' }}" required autofocus placeholder="Please enter name of club(s) qualified">
                              @if ($errors->has('qualified_clubs'))
                              <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('qualified_clubs') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div>
                        <!-- Qualifications -->
                        <div class="form-group row f-g-full">
                           <label for="qualifications" class="col-md-12 col-form-label text-md-right">{{ __('My Qualifications') }}</label>
                           <div class="col-md-12">
                              <input id="qualifications" type="text" class="form-control{{ $errors->has('qualifications') ? ' is-invalid' : '' }}" name="qualifications" value="{{ isset($user->qualifications) ? $user->qualifications : '' }}" required autofocus placeholder="Please enter qualifications">
                              @if ($errors->has('qualifications'))
                              <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('qualifications') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div>
                        <!-- Address -->
                        <div class="form-group row address-detail">
                           <label for="personal_statement" class="col-md-12 col-form-label text-md-right">{{ __('My Personal Statement') }}</label>
                           <div class="col-md-12 label-textarea">
                              <textarea name="personal_statement">{{ isset($user->personal_statement) ? $user->personal_statement : '' }}</textarea>
                              @if ($errors->has('personal_statement'))
                              <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('personal_statement') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div>
                        <!-- Profile Picture -->
                        <div class="form-group">
                           <div class="col-sm-12">
                              <label>Profile Picture</label>
                              <input type="file" name="profile_image" id="selImage" accept="image/*" onchange="ValidateSingleInput(this, 'image_src')">
                              @if ($errors->has('profile_image'))
                              <div class="error">{{ $errors->first('profile_image') }}</div>
                              @endif
                           </div>
                        </div>
                        @if(!empty($user->image))
                        <img id="profile_image_src" style="width: 100px; height: 100px;" src="{{ URL::asset('/uploads').'/'.$user->image }}" />
                        @else
                        <img id="profile_image_src" style="width: 100px; height: 100px;" src="{{ URL::asset('/images').'/default.jpg' }}" />
                        @endif
                     </div>

                     <div class="profile-status-text">
                        {!! getAllValueWithMeta('form_footer_content', 'my-profile') !!}
                     </div>
                     @php
                     $coach_id = isset($user->coach_id) ? $user->coach_id : '';
                     $coach_user = DB::table('users')->where('id',$coach_id)->first();
                     @endphp
                     <div class="profile-status">
                        Profile Status:
                        @if(!empty($coach_user))
                        @if($coach_user->updated_status == '0')
                        <span class="p-s-not-verified"><i class="fas fa-times-circle"></i> Not yet verified</span>
                        @elseif($coach_user->updated_status == '1')
                        <span class="p-s-verified"><i class="fas fa-check-circle"></i> Verified</span>
                        @endif
                        @endif
                     </div>

                     <div class="form-button">
                        <div class="form-group row mb-0">
                           <div class="col-md-12 form-btn">
                              <button type="submit" class="cstm-btn">
                              {{ __('Submit') }}
                              </button>
                              <div class="profile-view" data-toggle="modal" data-target="#profile-detail">
                                 <a class="cstm-btn">View Profile</a>
                              </div>
                               <div class="profile-view">
                                 <a href="{{url('/user/coach-qualifications')}}" class="cstm-btn">Add Qualifications</a>
                              </div>
                           </div>
                        </div>
                        <!-- modal starts here -->
                        <div class="modal fade" id="profile-detail" role="dialog">
						<div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content">
						<div class="modal-header">
						   <button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
						<section class=" section-padding coach_detail">
						<div class="container">
						<div class="pink-heading">
						   <h2>Coach Profile</h2>
						</div>
						<div class="all-members">
						<div class="row">
						<div class="offset-lg-0 col-lg-3 offset-md-3 col-md-6 offset-sm-3 col-sm-6">
						   <div class="activity-card text-center">
						      <figure class="activity-card-img">
						        @if(!empty($user->image))
		                        <img id="image_src" style="width: 100px; height: 100px;" src="{{ URL::asset('/uploads').'/'.$user->image }}" />
		                        @else
		                        <img id="image_src" style="width: 100px; height: 100px;" src="{{ URL::asset('/images').'/default.jpg' }}" />
		                        @endif
						      </figure>
						      <figcaption class="activity-caption">
						         <h2>{{ isset($user->profile_name) ? $user->profile_name : '' }}</h2>
						      </figcaption>
						   </div>
						</div>
						<div class="col-lg-9 col-md-12">
						<div class="card coach_profile">
						<div class="row">
						   <div class=" col-md-12 coach details">
						      <ul>
						         <li>
						            <strong>Profile Name <span>:</span> </strong>
						            <span>{{ isset($user->profile_name) ? $user->profile_name : '' }}</span>
						         </li>
						         <li>
						            <strong>Tennis Club <span>:</span> </strong>
						            <span>{{ isset($user->qualified_clubs) ? $user->qualified_clubs : '' }}</span>
						         </li>
						         <li>
						            <strong> Qualifications <span>:</span> </strong>
						            <span>{{ isset($user->qualifications) ? $user->qualifications : '' }}</span>
						         </li>
						         <li>
						            <strong> Personal Statement <span>:</span> </strong>
						            <span>{{ isset($user->personal_statement) ? $user->personal_statement : '' }}</span>
						         </li>
						      </ul>
						      <br>
						   </div>
						   <br>
						</div>

					       </div> 
					     </div>
					   </div>
					  </div>
					</div></section>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- modal ends here -->
                     
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection