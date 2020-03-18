@extends('layouts.frontend')
@section('content')

 <!--main section starts Here-->

        <section class="dash-wrapper" id="message-page">
            <div class="container">
                <div class="ham">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
                @include('frontend/dashboard/partials/dashboard_sidebar')
      		<div class="right-nav">
				<aside class="right-side">
				<!-- Content Header (Page header) -->
					<!-- Main content -->
					<section class="content">
						<div class="row">
							<!-- left column -->
							<div class="col-md-12">
								<!-- general form elements -->
								<div class="box box-primary">
									<div id="msgs">
										<div class="alert alert-success" id="success_msg" style="display:none;">
											User has been removed successfully.
										</div>
										<div class="alert alert-error" id="success_msg" style="display:none;">
											Error occured.
										</div>
										 @if(session('success'))
										 <div class="alert alert-success">
											{{ session('success') }}
										 </div>
										 @endif
									 </div>
									 <div class="box-header">
										<h3 class="box-title">User Details</h3>
									</div><!-- /.box-header -->

									<div class="user-details">
										<div class="details-box">
										<figure>
											<img src="/upload/images/{{$user->profile_picture}}" />
										</figure>
										<div class="details">
											<h3>Name <span>{{$user->fname}} {{$user->lname}}</span></h3>
											<h3>Email Address <span>{{$user->email}}</span></h3>
											 <h3>Contact Number <span>{{$user->contact_no}}</span></h3>
										  </div>
									  </div>
									</div>



								</div><!-- /.box -->
							</div><!--/.col (left) -->
							
							<!--Messaging-->
							<div class="col-md-12">
								<div id="message-frame">
									<div class="content">
										<div class="messages">
											<ul>
												@if( count($messages)>0 )
													@foreach($messages as $message)
														@if($message->from_id == $current_user_id)
														<!-- classes are reverted "sent"-->
															<li class="replies">
																<img src="/upload/images/{{App\User::where('id', $current_user_id)->pluck('profile_picture')->first()}}" alt="" />
																<p>{{ $message->message }}</p>
															</li>
														@endif
														@if($message->from_id == $user->id)
														<!-- classes are reverted "reply"-->
															<li class="sent">
																<img src="/upload/images/{{App\User::where('id', $user->id)->pluck('profile_picture')->first()}}" alt="" />
																<p>{{ $message->message }}</p>
															</li>
														@endif
													@endforeach
												@endif
											</ul>
										</div>
										<div class="message-input">
										<form method="POST" action="{{ route('message-store') }}" name="messageForm" class="needs-validation" id="messageForm">
											@csrf
											<div class="wrap">
												@if((count(App\Match::where(['user2_match_status' => 1, 'user1_match_status' => 1, 'user1_id' => Auth::user()->id, 'user2_id'=> $user->id, 'user1_block_status' => 0, 'user2_block_status' => 0])->get())>0) || (count(App\Match::where(['user2_match_status' => 1, 'user1_match_status' => 1, 'user2_id' => Auth::user()->id, 'user1_id'=> $user->id, 'user1_block_status' => 0,
												'user2_block_status' => 0])->get())>0)) 
												<input type="text" placeholder="Write your message..." name="message" id="mess"/>
												<input type="hidden" value="{{$current_user_id}}" name="from_id" />
												<input type="hidden" value="{{$user->slug}}" name="slug" />
												<input type="hidden" value="{{$user->id}}" name="to_id" />
												<button class="submit" id="messSubmit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
												@else
													@if((count(App\Match::where(['user2_match_status' => 1, 'user1_match_status' => 1, 'user1_id' => Auth::user()->id, 'user2_id'=> $user->id, 'user1_block_status' => 1, 'user2_block_status' => 0])->get())>0) || (count(App\Match::where(['user2_match_status' => 1, 'user1_match_status' => 1, 'user2_id' => Auth::user()->id, 'user1_id'=> $user->id, 'user1_block_status' => 1,
												'user2_block_status' => 1])->get())>0))
													<!-- <input type="text" placeholder="You have blocked this user" name="message" id="mess" disabled/> -->
													<input type="text" placeholder="Conversation Blocked" name="message" id="mess" disabled/>
													@else
													<!-- <input type="text" placeholder="You are blocked by this user" name="message" id="mess"disabled/> -->
													<input type="text" placeholder="Conversation Blocked" name="message" id="mess"disabled/>
													@endif
												@endif
												
											</div>
										</form>
										</div>
									</div>
								</div>
							</div>
							<!--Messaging-->
							
							<!-- right column -->
						</div>   <!-- /.row -->
					</section><!-- /.content -->
				</aside>

      		</div>
        </div>
       </section>
	   
@endsection

