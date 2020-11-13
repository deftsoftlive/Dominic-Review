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
            @php
            $user_id = \Auth::user()->role_id;
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

<section class="my-players section-padding coach_listing request-parent">
   <div class="container">
      <div class="pink-heading">
         <h2>My Coaches</h2>
      </div>

      <!-- <h5>Player Link Requests</h5> -->

      @if(count($requests)> 0)
      <div class="all-members">
         <div class="row">
         	@foreach($requests as $req)
         	@php
         		$child_id = $req->child_id; 
            $coach_id = $req->coach_id;
            $coach_details = DB::table('users')->where('id',$coach_id)->first();
            $coach_profile = DB::table('coach_profiles')->where('coach_id',$coach_id)->first(); 
         		$details = DB::table('users')->where('id',$child_id)->first();
         	@endphp
            <div class="col-lg-4 col-md-6">
               <div class="activity-card text-center">
                  <figure class="activity-card-img">
                     @if(!empty($coach_profile->image))
                        <div data-toggle="modal" data-target="#profile-detail-{{$coach_id}}">
                          <img id="image_src" style="width: 100px; height: 100px;" src="{{ URL::asset('/uploads').'/'.$coach_profile->image }}" />
                        </div> 
                     @else
                         <img id="image_src" style="width: 100px; height: 100px;" src="{{ URL::asset('/images').'/default.jpg' }}" />
                     @endif
                  </figure>
                  <figcaption class="activity-caption">
                     <p>{{isset($details->type) ? $details->type : 'Account Holder'}} Name: <span class="request-name">{{$details->name}}</span></p>
                     <p>Coach Name: <span class="request-name">{{$coach_details->name}}</span></p>
                     <p>Date: <span class="request-name">@php echo date("d/m/Y (H:i)",strtotime($req->updated_at)); @endphp</span></p>

                     @if($req->status == '0')
                        <div id="parent_request" class="request-actions par-req-{{$child_id}}">
                          <a href="javascript:void(0);" child="{{$child_id}}" parent="{{$parent_id}}" req="1" class="cstm-btn main_button">Accept</a>
                          <div class="reject-view" data-toggle="modal" data-target="#reject-detail-{{$req->id}}">
                            <a href="javascript:void(0);" class="cstm-btn main_button">Unable To Accept</a>
                          </div>
                        </div>
                      @elseif($req->status == '1')
                        <div class="profile-status">Request Status: <span class="p-s-verified"><i class="fas fa-check-circle"></i> Accepted</span></div> 
                        <br/>
                        <form action="{{route('unlink_coach')}}" class="unlink_coach" method="POST">
                          @csrf
                          <input type="hidden" name="id" value="{{$req->id}}">
                          <button type="submit" class="cstm-btn main_button">Unlink Your Coach</button>
                        </form>
                      @elseif($req->status == '2' && !empty($req->reason_of_rejection))
                        <div class="profile-status">Request Status: <span class="p-s-not-verified"><i class="fas fa-times-circle"></i> Did not accept</span></div>
                        <br/>
                        <form action="{{route('undo_reject_request')}}" class="reject_req" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$req->id}}">
                        <button type="submit" class="cstm-btn main_button">Enable Link</button>
                        </form>
                      @endif
                  </figcaption>

               </div>

               <!-- modal starts here -->
                <div class="modal fade coach_profile" id="profile-detail-{{$coach_id}}" role="dialog">
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
                                @if(!empty($coach_profile->image))
                                        <img id="image_src" style="width: 100px; height: 100px;" src="{{ URL::asset('/uploads').'/'.$coach_profile->image }}" />
                                        @else
                                        <img id="image_src" style="width: 100px; height: 100px;" src="{{ URL::asset('/images').'/default.jpg' }}" />
                                        @endif
                              </figure>
                              <figcaption class="activity-caption">
                                 <h2>{{ isset($coach_profile->profile_name) ? $coach_profile->profile_name : '' }}</h2>
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
                                    <span>{{ isset($coach_profile->profile_name) ? $coach_profile->profile_name : '' }}</span>
                                 </li>
                                 <li>
                                    <strong>Tennis Club <span>:</span> </strong>
                                    <span>{{ isset($coach_profile->qualified_clubs) ? $coach_profile->qualified_clubs : '' }}</span>
                                 </li>
                                 <li>
                                    <strong> Qualifications <span>:</span> </strong>
                                    <span>{{ isset($coach_profile->qualifications) ? $coach_profile->qualifications : '' }}</span>
                                 </li>
                                 <li>
                                    <strong> Personal Statement <span>:</span> </strong>
                                    <span>{{ isset($coach_profile->personal_statement) ? $coach_profile->personal_statement : '' }}</span>
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
            </div>

          <!-- modal starts here -->
          <div class="modal fade" id="reject-detail" role="dialog">
           <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                 <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                 </div>
                 <div class="modal-body">
                    <div class="card coach_profile">
                    <form method="POST" id="reject_request" action="{{route('reject_request')}}">
                      @csrf
                      <input type="hidden" name="id" value="{{$req->id}}">
                      <div class="form-group">
                       <h4>Reason you are unable to accept :</h4>
                        <textarea name="reason_of_rejection" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                      </div>
                      <div class="form-group">
                        <p>The player will be able to see this message so please ensure that your are professional and respectful when stating your reasoning - Thank you</p>
                      </div>
                     
                      <button type="submit" id="rej_req" class="cstm-btn main_button">Submit</button>
                      
                    </form>
                    </div>
                    </div>
                 </div>
              </div>
           </div>
           <!-- modal ends here -->
            @endforeach

         </div>
      </div>
      @else
      	<div class="noData offset-md-4 col-md-4 sorry_msg">
	        <div class="no_results">
	          <h3>Sorry, no results</h3>
	          <p>No Request Found</p>
	        </div>
	    </div>
      @endif
        
   </div>
</section>

@endsection