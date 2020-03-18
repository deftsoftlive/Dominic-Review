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
                <li class="breadcrumb-item"><a href="{{ route($addLink, $slug) }}">List</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Add Images</a></li>
            </ul>
        </div>
  </div>
@include('vendors.errors')

    <div class="row">
       <div class="col-lg-12">
          <div class="card vendor-dash-card">
       <div class="card-header"><h3>Add images</h3></div>
           <div class="card-body">

<div class="row">
<div class="col-md-12">
  
 
                       {{choosefilemultiple($errors,'Gallery Image','gallery_image[]')}}


                          <script type="text/javascript">
                                     $('#gallery_image').fileinput({
                                             'theme': 'explorer-fas',
                                              // headers: {
                                              //      // 'X-CSRF-TOKEN': $('input[name=_token]').val(),
                                              //      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                              // },
                                             'uploadUrl': '{{ url(route("upload_vendor_image_gallery")) }}?category_id={{$category->category_id}}',
                                              overwriteInitial: false,
                                              initialPreviewAsData: true,
                                              initialPreview: [],
                                              initialPreviewConfig: [],
                                              uploadExtraData: { '_token': $('meta[name="csrf-token"]').attr('content') },
                                });
                          </script>    


</div>
</div>
</div>
</div>
</div>
</div>
</div>




 
@endsection