@extends('inc.homelayout')
@section('title', 'DRH|Register')
@section('content')

@php 
  $country_code = DB::table('country_code')->get(); 
  $notification = DB::table('parent_coach_reqs')->where('coach_id',Auth::user()->id)->where('status',NULL)->count();
  $user = DB::table('users')->where('role_id',3)->where('id',Auth::user()->id)->first();  
@endphp
<style>
.loading {
  height: 0;
  width: 0;
  margin-top: 15px;
  /*padding: 15px;*/
  border: 6px solid #ccc;
  border-right-color: #888;
  border-radius: 22px;
  -webkit-animation: rotate 1s infinite linear;
  /* left, top and position just for the demo! */
  position: absolute;
  left: 50%;
  top: 70%;
}

.parent-req-close {
    position: absolute;
    top: 5px;
    right: 10px;
    font-size: 20px;
    font-weight: 600
}

@-webkit-keyframes rotate {
  /* 100% keyframe for  clockwise. 
     use 0% instead for anticlockwise */
  100% {
    -webkit-transform: rotate(360deg);
  }
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

<!-- Coach Notifications -->
<section class="member section-padding">
    <div class="container">
        <div class="pink-heading">
            <h2>Notifications</h2>
            
        </div>
        <div class="row">
          <div class="textbox-manage ">
            <p>{!! getAllValueWithMeta('coach_notifications', 'textbox-management') !!}</p>
          </div>
        </div>
        <div class="row">
        <div class="col-md-12">
            <!-- <h2 class="cst_sub_heading">Player Name</h2> -->
            <div class="player-report-table tbl_shadow">
                <div class="report-table-wrap">
                    <div class="m-b-table">
                        <table class="notifictaion-timeline">
                            <thead>
                                <tr>
                                    <th width="23%">Date</th>
                                    <!-- <th>Parent Name</th> -->
                                    <th width="53%">Type</th>
                                    <th width="23%">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if($user->role_id == '3')

                                    @php 
                                        $notifications = DB::table('notifications')->orderBy('created_at','desc')->get();  
                                        $children = DB::table('users')->where('parent_id',Auth::user()->id)->get();
                                        $child_id = [];
                                    @endphp

                                    @foreach($children as $child)
                                        @php $child_id[] = $child->id; @endphp
                                    @endforeach


                                    @foreach ($notifications as $notification)

                                    @php 
                                        $notification_arr = json_decode($notification->data); 
                                    @endphp
                                    @if( !empty( $notification_arr ) )
                                      @if($notification_arr->send_to == Auth::user()->id)

                                          <tr>
                                              <td>
                                                  <p>@php echo date('d-m-Y',strtotime($notification->created_at)); @endphp </p>
                                              </td>
                                              <td>
                                                  <p>{{ $notification_arr->data }}</p>
                                              </td>
                                              <td class="view_option">
                                                 <p> <a style="" href="{{url('/user/mark_as_read')}}/{{$notification->id}}" >Mark as Read</a></p>
                                              </td>
                                          </tr>

                                      @endif
                                    @endif
                                    @endforeach

                                @endif
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
      </div>
        <br><br>
    </div>
</section>

<!-- Parent Coach Requests - Notifications -->
<section class="my-players section-padding coach_listing request-parent">
   <div class="container">
      <!-- <div class="pink-heading">
         <h2>Link Request Notifications</h2>
      </div> -->
      @php 
      	$requests = DB::table('parent_coach_reqs')->where('coach_id',Auth::user()->id)->where('dismiss_by_coach',NULL)->get();  
      @endphp
<div class="player-lik-wrap">
      <h5>Player Link Requests</h5>
      <a style="float:right;margin-bottom: 10px;" class="cstm-btn main_button" href="{{url('/user/parent-req/dismiss')}}">All dismissed link requests</a>
</div>
      @if(count($requests)> 0)
      <div class="all-members">
         <div class="row">
         	@foreach($requests as $req)
         	@php 
         		$child_id = $req->child_id; 
            $parent_id = $req->parent_id;
            $par_details = DB::table('users')->where('id',$parent_id)->first();
         		$details = DB::table('users')->where('id',$child_id)->first();
         	@endphp
            <div class="col-lg-4 col-md-6">
               <div class="activity-card text-center">
                  <figure class="activity-card-img">
          
                  @if(!empty($details->profile_image))
                    @php 
                        $check_icon = DB::table('icon_images')->where('icon_image',$details->profile_image)->first(); 
                    @endphp
                  @endif
                    
                    @if(!empty($details->profile_image))
                    @if(!empty($check_icon))
                        <img id="image_src" style="width: 100px; height: 100px;" src="{{URL::asset('/uploads/icons')}}/{{$details->profile_image}}" id="Image_Preview" alt="">
                    @else
                        <img id="image_src" style="width: 100px; height: 100px;" src="{{URL::asset('/uploads')}}/{{$details->profile_image}}" id="Image_Preview" alt="">
                    @endif
                    @endif

                  </figure>

                  <figcaption class="activity-caption">
                    <form method="POST" action="{{route('dismiss-request-coach')}}">
                      @csrf
                      <input type="hidden" name="id" value="{{$req->id}}">
                      <span class="parent-req-close"><button type="submit">x</button></span>
                    </form>
                     <p>Player Name: <span class="request-name">{{isset($details->name) ? $details->name : ''}}</span></p>
                     <p>Parent Name: <span class="request-name">{{isset($par_details->name) ? $par_details->name : ''}}</span></p>

                      @php 
                        $t1 = $req->updated_at;
                        $uk_time = timeutc_to_uk($t1); 
                      @endphp
                                        
                     <p>Date: <span class="request-name">@php echo date('d/m/Y',strtotime($req->updated_at)); @endphp ({{$uk_time}})</span></p>
                   

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
                        <form action="{{route('undo_reject_request')}}" class="reject_req" method="POST">
                          @csrf
                          <input type="hidden" name="id" value="{{$req->id}}">
                          <button type="submit" class="cstm-btn main_button">Unlink</button>
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
            </div>

          <!-- modal starts here -->
          <div class="modal fade rejection_box" id="reject-detail-{{$req->id}}" role="dialog">
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
                      <input type="hidden" name="request_id" value="{{$req->id}}">
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
      	<div class="noData offset-lg-4 col-lg-4 offset-md-3 col-md-6 offset-sm-2 col-sm-8 sorry_msg">
	        <div class="no_results">
	          <h3>Sorry, no results</h3>
	          <p>No Request Found</p>
	        </div>
	    </div>
      @endif
        
   </div>
</section>

@endsection