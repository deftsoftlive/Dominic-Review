<!-- Header section -->
@extends('inc.homelayout')

@section('title', 'DRH|Listing')

@section('content')
@php 
$base_url = \URL::to('/');
$video_ids = [];
$season_id =[];
$active_season_ids =[];
//dd($active_seasons);
@endphp
@foreach($user_videos as $ids)
@php 
array_push($video_ids, $ids->video_id);
@endphp
@endforeach
@foreach($active_seasons as $ids)
@php 
array_push($active_season_ids, $ids->id);
@endphp
@endforeach


<section class="football-course-sec d-print-none" style="background: url({{$base_url}}/public/uploads/{{ getAllValueWithMeta('videos_banner', 'banners') }});">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="football-course-content">
                    <h2 class="f-course-heading">{{ getAllValueWithMeta('video_listing_title', 'video-listing') }}</h2>                     
                    <!-- <h2 class="f-course-heading">Videos</h2> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner section ends here -->
<section class="cst-vedio-sec">
	<div class="container">

		
		<div class="pink-heading">
	         <div class="sec-text-block mb-5">
	        <!--<p class="">{{ getAllValueWithMeta('video_listing_text', 'video-listing') }}</p> -->
	        	@php $met = getAllValueWithMeta('video_listing_text', 'video-listing'); echo $met; @endphp
    		</div>
      	</div>
      	@if(Auth::check())
		<div class="row">
			<div class="col-lg-12">
				<form role="form" method="post" id="videoFilterForm" action="{{route('home.videos.filter')}}">
					@csrf
					<div class="row">
						<div class="col-md-6">
							 <select class="form-control" id="video_category" name="category">
				                <option hidden value=''>Select Category</option>
				                 @foreach($categories as $category)
				                    <option value="{{$category->id}}" {{ $cat_id == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
				                  @endforeach
				              </select></br></br>
						</div>
						<div class="col-md-6">
							<input type="submit" name="submit" value="Submit" class="cstm-btn main_button">
						</div>
					</div>
				</form>
				
			</div>
			@if(!empty($videos)) 
			@php  $role_id = Auth::user()->role_id; @endphp
			@foreach($videos as $video)		

				@if(strcmp($video->users, 'all') == 0  && $role_id == 2)
					
					@php @endphp 
					<div class="col-lg-4 col-md-6 col-sm-12">
						<div class="inner-cont">
							<h3>{{$video->title}}</h3>
							@php $des = $video->description; echo $des; @endphp
							<div class="Vedio-wrap">
								@php $v = $video->url; 
								echo $v;
								@endphp

							</div>
						</div>
					</div>

				@elseif(strcmp($video->users, 'users') == 0)
				
					@if(in_array($video->id, $video_ids))
					<div class="col-lg-4 col-md-6 col-sm-12">
						<div class="inner-cont">
							<h3>{{$video->title}}</h3>
							@php $des = $video->description; echo $des; @endphp
							<div class="Vedio-wrap">
								@php $v = $video->url; 
								echo $v;
								@endphp
							</div>
						</div>
					</div>					

					@endif
				@elseif(strcmp($video->users, 'seasons') == 0)
					@foreach($existingSea as $ss)
						@if(in_array($ss, $active_season_ids))
							<div class="col-lg-4 col-md-6 col-sm-12">
								<div class="inner-cont">
									<h3>{{$video->title}}</h3>
									@php $des = $video->description; echo $des; @endphp
									<div class="Vedio-wrap">
										@php $v = $video->url; 
										echo $v;
										@endphp
									</div>
								</div>
							</div>	
						@endif
					@endforeach
				@endif
				@if($video->linked_coaches != '')
				@php 
				//$coaches = explode( ',', $video->linked_coaches );
				//dd(1);				

				if (strcmp($video->linked_coaches, 'all') == 0 ) {
					$coaches = [];
                  	$coaches_Data = \App\User::where(['role_id' => 3])->get();   
                  	foreach( $coaches_Data as $coac ){
                  		array_push( $coaches , $coac->id );
                  	}
                }else{            
                   	$coaches = explode( ',', $video->linked_coaches );
                }
				@endphp

					@if(in_array(Auth::user()->id, $coaches))
					<div class="col-lg-4 col-md-6 col-sm-12">
						<div class="inner-cont">
							<h3>{{$video->title}}</h3>
							@php $des = $video->description; echo $des; @endphp
							<div class="Vedio-wrap">
								@php $v = $video->url; 
								echo $v;
								@endphp

							</div>
						</div>
					</div>
					@endif
				@endif
			@endforeach
			
			@endif
		</div>
		@if(!isset($videos) || empty($videos))
		@php //dd($videos); @endphp 
			<p class="text-center">No video found.</p>
			@endif
		@else
			<h5 class="text-center" style="color: #666666;">Please login to see content.</h5>
		@endif
	</div>
</section>

@endsection
<!-- Footer Section-->