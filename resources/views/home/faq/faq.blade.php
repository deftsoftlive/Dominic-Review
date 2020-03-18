@extends('layouts.home')

@section('title') Faq @endsection
@section('description') Faq @endsection
@section('keywords') Faq @endsection

@section('content')
<section class="log-sign-banner" style="background:url('/frontend/images/banner-bg.png');">
    <div class="container">
        <div class="page-title text-center">
            <h1>faq</h1>
        </div>
    </div>    
</section>
 <section class="faq-sec"> 
 	<div class="container"> 
 		<div class="sec-card"> 
	      <div class="faq-content"> 
	      	<div class="sec-heading dark-sec-heading text-center">
         <h2>Frequently Asked Questions</h2>
      </div>
  <div class="faq-tab-wrap">
  <ul class="nav nav-tabs faq-tabs" role="tablist">
	<li class="nav-item">
		<a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"><span class="tab-icon"><img src="/frontend/images/user-img.png"></span> User</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"><span class="tab-icon"><img src="/frontend/images/user-img.png"></span> Vendor</a>
	</li>
</ul><!-- Tab panes -->
<div class="tab-content">
	<div class="tab-pane active" id="tabs-1" role="tabpanel">
        <div class="faq-acc-wrap">
        	<div id="faq-pg-accordion" class="faq-pg-accordion">
        	 <div class="row">

        	
        	@foreach($faqs as $key => $faq)
	        	@if($faq->type === 'user')
	        	<div class="col-lg-12">
				  <div class="card">
				    <div class="card-header" id="heading{{$key}}">
				      <h2 class="mb-0">
				        <button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="false" aria-controls="collapse{{$key}}">
				          {{ $faq->question }}
				          <span class="fa-stack fa-2x">
				              <i class="fas fa-circle fa-stack-2x"></i>
				            <i class="fas fa-plus fa-stack-1x fa-inverse"></i>
				          </span>
				        </button>
				      </h2>
				    </div>
				    <div id="collapse{{$key}}" class="collapse" aria-labelledby="heading{{$key}}" data-parent="#faq-pg-accordion">
				      <div class="card-body">
				          {!! $faq->answer !!}
				      </div>
				    </div>
				  </div>
				</div>
				@endif
			@endforeach

		   </div>
			</div>
        </div> <!-- faq-acc-wrap -->

        	</div>
	<div class="tab-pane" id="tabs-2" role="tabpanel">
		 <div class="faq-acc-wrap">
        	<div id="faq-vendor-accordion" class="faq-pg-accordion">
        	 <div class="row">

			@foreach($faqs as $key => $faq)
	        	@if($faq->type === 'vendor')
		        	<div class="col-lg-12">
					  <div class="card">
					    <div class="card-header" id="heading-vendor-{{$key}}">
					      <h2 class="mb-0">
					        <button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapse-vendor-{{$key}}" aria-expanded="false" aria-controls="collapse-vendor-{{$key}}">
					          {{ $faq->question }}
					          <span class="fa-stack fa-2x">
					            <i class="fas fa-circle fa-stack-2x"></i>
					            <i class="fas fa-plus fa-stack-1x fa-inverse"></i>
					          </span>
					        </button>
					      </h2>
					    </div>
					    <div id="collapse-vendor-{{$key}}" class="collapse" aria-labelledby="heading-vendor-{{$key}}" data-parent="#faq-vendor-accordion">
					      <div class="card-body">
					        {!! $faq->answer !!}
					      </div>
					    </div>
					  </div>
					</div>
				@endif			
			@endforeach

		   </div>
			</div>
        </div> <!-- faq-acc-wrap -->
	</div>
</div>


	  </div>
	</div>
     </div>
    </div>
</section>


@endsection

@section('scripts')
<script type="text/javascript">
	$("#faq-pg-accordion").on("hide.bs.collapse show.bs.collapse", e => {
  $(e.target)
    .prev()
    .find("i:last-child")
    .toggleClass("fa-minus fa-plus");
});
</script>
@endsection
