@extends('layouts.home')

@section('title') {{ $page->title }} @endsection
@section('description') {{ $page->meta_description }} @endsection
@section('keywords') {{ $page->meta_keyword }} @endsection

@section('content')
<!-- <section class="log-sign-banner" style="background:url('/frontend/images/banner-bg.png');">
    <div class="container">
        <div class="page-title text-center">
            <h1>{{$page->title}}</h1>
        </div>
    </div>    
</section> -->
 <section class="cms-pages"> 
 	<div class="container"> 
 		<div class="sec-card"> 
	      <div class="term-content"> 

        <div class="bg-light">
            <div class="container">
                <div class="row h-100 align-items-center">
                <div class="col-lg-12">
                   <h1 class="display-4">{{$page->title}}</h1>
	               {!! $page->body !!}
                </div>
            </div>
        </div>
	  </div>
     </div>
    </div>
</section>

@endsection