@extends('layouts.home')

@section('title') {{ $page->title }} @endsection
@section('description') {{ $page->meta_description }} @endsection
@section('keywords') {{ $page->meta_keyword }} @endsection

@section('content')
<section class="log-sign-banner" style="background:url('/frontend/images/banner-bg.png');">
    <div class="container">
        <div class="page-title text-center">
            <h1>{{$page->title}}</h1>
        </div>
    </div>    
</section>
 <section class="term-and-conditon-sec"> 
 	<div class="container"> 
 		<div class="sec-card"> 
	      <div class="term-content"> 
	      {!! $page->body !!}
	  </div>
     </div>
    </div>
</section>

@endsection