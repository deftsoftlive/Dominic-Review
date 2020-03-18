@extends('layouts.frontend')
@section('content')

 <!--main section starts Here-->
<section class="dash-wrapper" id="myprofile">
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
									@if(session('success'))
									<div class="alert alert-success">
										{{ session('success') }}
									</div>
									@endif
								</div>
								<div class="box-header">
									<h3 class="box-title">Your Inbox</h3>
								</div><!-- /.box-header -->
								<!-- form start -->
								@if( count($users)>0 )
							<div class="table-responsive">
								<table class="table table-bordered table-striped my-events">
											<!-- <table id="example1" class="table table-bordered table-striped"> -->
									<thead>
										<tr>
											<th>Profile Image</th>
											<th>Name</th>
											<th>Email</th>
											<th>Contact No</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($users as $user)
										<tr>
											<td><img src="{{ url('upload/images/'.$user->profile_picture) }}" alt="Image" width="50" height="50"/></td>
											<td>{{$user->fname}} {{$user->lname}}</td>
											<td>{{$user->email}}</td>
											<td>{{$user->contact_no}}</td>
											<td><a href="{{route('inbox-user-detail',['slug' => $user->slug])}}" class="event-btn-cust">View Message
											@if(count(App\Message::where('to_id',Auth::user()->id)->where('status',1)->get())>0)
		                                    ({{count(App\Message::where('to_id',Auth::user()->id)->where('from_id', $user->id)->where('status',1)->get())}})
		                                    @endif</a>
		                                    @if((count(App\Match::where(['user2_match_status' => 1, 'user1_match_status' => 1, 'user1_id' => Auth::user()->id, 'user2_id'=> $user->id, 'user1_block_status' => 1])->get())>0)|| (count(App\Match::where(['user2_match_status' => 1, 'user1_match_status' => 1, 'user2_id' => Auth::user()->id, 'user1_id'=> $user->id, 'user2_block_status' => 1])->get())>0)) 
									        <a href="{{route('unblock',['slug' => $user->slug])}}" class="event-btn-cust">Unblock</a>
									        @else
		                                    <a href="{{route('block',['slug' => $user->slug])}}" class="event-btn-cust">Block</a>
		                                    @endif
		                                	</td>
										</tr>
										 @endforeach
									</tbody>
								</table>
							</div>
									@else
									<h2>Once you have made some matches from any events you have attended, you'll be able to see them in here.</h2>
									@endif
							</div><!-- /.box -->
						</div><!--/.col (left) -->
						<!-- right column -->
					</div>   <!-- /.row -->
				</section><!-- /.content -->
			</aside>
		</div>
	</div>
</section>


@endsection

