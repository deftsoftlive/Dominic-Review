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
                <li class="breadcrumb-item"><a href="{{ route($addLink , $slug) }}">List</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Add Video</a></li>
            </ul>
        </div>
  </div>
@include('vendors.errors')

    <div class="row">
       <div class="col-lg-12">
          <div class="card vendor-dash-card">
       <div class="card-header"><h3>Edit a video </h3></div>
           <div class="card-body">

<div class="row">
 
     

<div class="col-md-12">
  <form method="post" id="videoForm" enctype="multipart/form-data">
    <?php $data = json_decode($video->keyValue); ?>
   {{textbox($errors,'Title','title',$data->title)}}
   {{choosefilemultiple($errors,'Video Cover Photo','cover_photo')}}
   <img src="{{url($data->image)}}" width="120">
   {{textbox($errors,'Video Link (please paste here youtube video link)','video_link',$data->link)}}
@csrf
<button class="cstm-btn">Update</button>
</form>
</div>



 
</div>
</div>
</div>
</div>
</div>
</div>
@endsection

@section('scripts')
<script src="{{url('/js/validations/videoValidation.js')}}"></script>
@endsection
