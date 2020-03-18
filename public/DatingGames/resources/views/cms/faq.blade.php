@extends('layouts.frontend')
@section('content')
@include('layouts/slider')
<section>
	<div class="container">
		<div class="inner-content">
		
					@if(@sizeof($faqs))
					@foreach($faqs as $faq)
						<div class="cust-acc">
							<button class="accordion">{{$faq->title}}</button>
							<div class="panel">
							<p>{!! $faq->description !!}</p>
							</div>
						</div>
					@endforeach
					<div class="cust-page"> 
					{{ $faqs->links() }}</div>
					@endif
			
		</div>
	</div>
</section>
@endsection
