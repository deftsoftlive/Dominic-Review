@extends('layouts.admin')
@section('content')

<aside class="right-side">               
    <section class="content-header">
        <h1>
            Slides
            <small>Listing</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Slides Listing</li>
        </ol>
    </section>

    @include('partials/removeMessage')
    @include('partials/message')

    <section class="content">
        <a href="{{route('admin.showCreateSlide')}}">
            <button class="btn btn-info page-accordian-bttn"><i class="fa fa-fw fa-plus-circle"></i> Add New Slide</button>
        </a>
    </section>
</aside>
@endsection