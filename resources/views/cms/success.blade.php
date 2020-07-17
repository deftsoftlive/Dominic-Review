<!-- Header section -->
@extends('inc.homelayout')

@section('title', 'DRH|Listing')

@section('content')
<!-- <section class="account-sec"> -->
        <!-- <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="account-sec-content">
                        <h2 class="account-sec-heading">Success</h2>
                    </div>
                </div>
            </div>
        </div> -->
    <!-- </section> -->
    <br/><br/><br/><br/>
<section class="succes-page">
	<div class="container">
	
			<div class="drh-activity-heading text-center">
                <div class="section-heading">
                  <h1 class="sec-heading">SUCCESSFUL</h1>
                </div>
            </div>
            <div class="succes-content">
            	
			<p>You are succesfully registered on DRH sports. DRH Sports will contact you to oragnise taster class.</p>
			<a class="cstm-btn forgt" href="{{url('/')}}">
                                       Back to Website
                                    </a>			
		</div>
	</div>
</section>

@endsection
<!-- Footer Section -->