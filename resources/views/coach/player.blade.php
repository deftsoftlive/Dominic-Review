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
        @include('inc.coach-menu')
      </ul>
    </nav>
  </div>
</div>

<section class="my-players section-padding cst-plyer section-padding coach_listing request-parent">
  <div class="container">
    <div class="pink-heading">
         <h2>My Players</h2>
      </div>

      <div class="row">
          <div class="textbox-manage ">
            <p>{!! getAllValueWithMeta('coach_my_players', 'textbox-management') !!}</p>
          </div>
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

                    @php 
                        $check_icon = DB::table('icon_images')->where('icon_image',$child->profile_image)->first(); 
                    @endphp
                    
                    @if(!empty($child->profile_image))
                    @if(!empty($check_icon))
                        <img id="image_src" style="width: 100px; height: 100px;" src="{{URL::asset('/uploads/icons')}}/{{$child->profile_image}}" id="Image_Preview" alt="">
                    @else
                        <img id="image_src" style="width: 100px; height: 100px;" src="{{URL::asset('/uploads')}}/{{$child->profile_image}}" id="Image_Preview" alt="">
                    @endif
                    @endif
                    
                  </figure>
                  <figcaption class="activity-caption">
                      <!-- <p>{{isset($child->type) ? $child->type : 'Account Holder'}} Name: <span class="request-name">{{isset($child->name) ? $child->name : ''}}</span></p>
                      <p>Parent Name: <span class="request-name">{{isset($parent->name) ? $parent->name : ''}}</span></p> -->

                      <p>Account Holder Name: <span class="request-name">{{isset($parent->name) ? $parent->name : ''}}</span></p>

                      <p>Player Name: <span class="request-name">{{isset($child->name) ? $child->name : ''}}</span></p>

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
                          <button type="submit" class="cstm-btn main_button">Enable Link</button>
                          </form>
                      @elseif($pl->status == '1')
                          <div class="profile-status">Request Status: <span class="p-s-verified"><i class="fas fa-check-circle"></i> Accepted</span></div> 
                          <br/>
                          <form action="{{route('undo_reject_request')}}" class="reject_req" method="POST">
                          @csrf
                          <input type="hidden" name="id" value="{{$pl->id}}">
                          <button type="submit" class="cstm-btn main_button">Unlink</button>
                          </form>
                      @elseif($pl->status == '')
                          <div id="parent_request" class="request-actions par-req-{{$child_id}}">
                            <a href="javascript:void(0);" child="{{$child_id}}" parent="{{$parent_id}}" req="1" class="cstm-btn">Accept</a>
                            <div class="reject-view" data-toggle="modal" data-target="#reject-detail-{{$pl->id}}">
                              <a href="javascript:void(0);" class="cstm-btn main_button">Unable To Accept</a>
                            </div>
                          </div>
                      @endif
                      <!-- <a style="margin-top: 5px;" href="{{url('/user/timeline-view/player')}}/@php echo base64_encode($pl->child_id); @endphp" class="cstm-btn main_button">View Details</a> -->
                    </figcaption>

               </div>
            </div>
		    
			@endforeach
		@else
			<div class="noData offset-lg-4 col-lg-4 offset-md-3 col-md-6 offset-sm-2 col-sm-8 sorry_msg">
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