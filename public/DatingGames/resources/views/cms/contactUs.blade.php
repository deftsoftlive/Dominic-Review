@extends('layouts.frontend')
@section('content')
@include('layouts/slider')
<section>
	<div class="container">
		<div id="msgs">
			 @if(session('success'))
			 <div class="alert alert-success">
			  {{ session('success') }}
			</div>
			@endif 
			@if(session('error'))
			 <div class="alert alert-danger">
			  {{ session('error') }}
			</div>
			@endif
		</div>
		<div class="inner-content">
			<div class="contact-us-page">
				<h1 class="site-title">Fun and Games Dating</h1>
				<h2 class="page-title">How to Contact Us:</h2>

				<h3>Our Contact Details</h3>

				<p class="border-none">Please call us on <a href="tel:{{$settings->contact_no}}">{{$settings->contact_no}}</a> or email us at <a href="mailto:{{$settings->email_id}}">{{$settings->email_id}}</a></p>

				<h2>Social Media</h2>

				<h3>Our Facebook Page:</h3>

				<p><a href="{{$settings->facebook_id}}" target="blank">Click Here</a></p>

				<h3>Our Twitter Account:</h3>

				<p><a href="{{$settings->twitter_id}}" target="blank">Click Here</a></p>

				<h3>Find us on Instragram:</h3>

				<p><a href="{{$settings->insta_id}}" target="blank">Click Here</a></p>

				<h3>Check out our videos on our Youtube channel:</h3>

				<p class="border-none"><a href="http://www.youtube.com/channel/UCg2Xkk7xev5UsfqAtnnG0Ig" target="blank">Click Here</a></p>

				<div class="col-sm-12">
					<div class="profile-content contact-page">
					    <div class="card">
					        <div class="content">
					        	<div class="row">
					        	<div class="col-md-offset-2 col-md-8">
					        	<div class="contact-us-sec">
					        		<div class="card-header">Contact Us</div>
					            <form id="contact_form" name="contact_form" method="POST" action="{{ route('contact') }}" enctype="multipart/form-data" novalidate="novalidate">
					               {{ csrf_field() }}
					               <div class="row">
					               	<div class="col-md-6">
					                    <div class="form-group">
					                        <label>Name<span class="mandatory">*</span></label>
					                        <input type="text" class="form-control border-input" placeholder="Name" name="name" value="{{ old('name') }}">
					                    </div>
					                  </div>
					                    <div class="col-md-6">
					                    <div class="form-group">
					                        <label>Email Address<span class="mandatory">*</span></label>
					                        <input type="text" class="form-control border-input" placeholder="Email Address" value="{{ old('email') }}" name="email">
					                    </div> 
					                   </div>
					                    <div class="col-sm-12">                    
					                    <div class="form-group">
					                        <label>Message<span class="mandatory">*</span></label>
					                        <textarea class="form-control" placeholder="Type Your Message Here" rows="4" name="message">{{ old('message') }}</textarea>
					                    </div> 
					                </div>
					                    </div>                    
						                <div class="text-center">
						                  <button id="submit_contact_form" type="submit" class="btn custm-btn btn-fill btn-wd">Submit</button>
						                </div>
					            </form>
					        </div>
					    </div>
					    </div>
					            
					        </div>
					    </div>
					</div>
				</div>
			</div>	

		</div>
	</div>
</section>
@endsection
