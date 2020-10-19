@extends('layouts.home')

@section('title') Faq @endsection
@section('description') Faq @endsection
@section('keywords') Faq @endsection

@section('content')

@php $base_url = \URL::to('/'); @endphp
<section class="football-course-sec" style="background: url({{$base_url}}/public/uploads/{{ getAllValueWithMeta('faq_banner', 'banners') }});">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="football-course-content">
          <h2 class="f-course-heading">FAQ's</h2>
        </div>
      </div>
    </div>
  </div>
</section>

 <section class="faq-sec"> 
 	<div class="container"> 
 		<div class="sec-card"> 

  <div class="faq-tab-wrap">

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
					         <!--  <span class="icon_wrapss">
					            
					            <i class="fas fa-plus fa-stack-1x fa-inverse"></i>
					          </span> -->
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
