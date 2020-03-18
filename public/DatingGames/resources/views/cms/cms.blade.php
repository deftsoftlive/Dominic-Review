@extends('layouts.frontend')
@section('content')
@include('layouts/slider')
<section>
	<div class="container">
		<div class="inner-content">
			<h1 class="site-title">Fun and Games Dating</h1>
			<h2 class="page-title">{{$page->name}}</h2> 
			{!!$page->body!!}
		</div>
	</div>
</section>
@endsection
