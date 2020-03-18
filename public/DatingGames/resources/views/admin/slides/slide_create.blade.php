@extends('layouts.admin')
@section('content')
<aside class="right-side">
   
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Slides
            <small>Create</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('admin.showFaqs')}}">Slides Listing</a></li>
            <li class="active">Slide Create</li>
        </ol>
    </section>
</aside>
@endsection