@extends('vendors.management.layout')
@section('vendorContents')
<div class="container-fluid">


<div class="page_head-card">
    <div class="page-info">
            <div class="page-header-title">
                <h3 class="m-b-10">{{$title}}</h3>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('vendor_dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">List</a></li>
            </ul>
        </div>
        <div class="side-btns-wrap">
          <a href="{{url(route($addLink, $slug))}}" class="add_btn"><i class="fa fa-plus"></i></a>
        </div>
  </div>
@include('vendors.errors')

    <div class="row">
       <div class="col-lg-12">
          <div class="card vendor-dash-card">
       <div class="card-header"><h3>Videos </h3></div>
           <div class="card-body">

<div class="row">

  @if(count($videos) == 0)
                  <div class="col-md-12">
                       <div class="alert alert-warning" role="alert">No Videos.</div>
                  </div>
  @endif
 
    @foreach($videos as $img)
 
      <?php $arr = (array)json_decode($img->keyValue); ?>

      <div class="col-md-6">
           <div class="gallery-card">
            <div class="video-gallery-container">
             <div class="video-container">

              <iframe width="661" height="372" src="{{$arr['link']}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

            </div>
              <div class="card-info">
                <h4>{{$arr['title']}}</h4>
                <ul class="acrdn-action-btns">
                  <li><a data-toggle="tooltip" title="Edit" href="{{url(route('vendor_category_videos_edit_management',[$slug,$img->id]))}}" class="action_btn primary-btn"><i class="fas fa-pencil-alt"></i></a></li>  
                  <li><a data-toggle="tooltip" title="Delete" onclick="deleteItem(this)" href="javascript:void(0)" data-delurl="{{url(route('vendor_category_videos_delete_management',[$slug,$img->id]))}}" class="action_btn danger-btn"><i class="fas fa-trash-alt"></i></a></li>
             </ul>
              </div>
            </div>
        </div>
    </div>

    @endforeach

  <div class="col-md-12">
    {{$videos->links()}}
</div>
 
</div>
</div>
</div>
</div>
</div>
</div>
@endsection