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
                <li class="breadcrumb-item"><a href="{{url(route($addLink ,$slug))}}">List</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Add</a></li>
            </ul>
        </div>
  </div>

@include('vendors.errors')

    <div class="row">
       <div class="col-lg-12">
          <div class="card vendor-dash-card">
            <div class="card-header"><h3>{{$title}}</h3></div>
                <div class="card-body">

 

     <div class="col-md-12"> 
          <form method="post" id="prohibtionForm">
			@csrf
			    <input type="hidden" name="type" value="prohibtion">
			    {{textarea($errors,'Prohibtion & Restrictions','prohibtion',$prohibtion)}}
            <button class="cstm-btn" id="prohibtionFormBtn">Save</button>
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
<script src="{{url('/js/validations/prohibtionValidation.js')}}"></script>

<script type="text/javascript">
  var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserWindowWidth  : 800,
        filebrowserWindowHeight : 500,
        uiColor: '#eda208',
        removePlugins: 'save, newpage',
        allowedContent:true,
        fillEmptyBlocks:true,
        extraAllowedContent:'div, a, span, section, img'
      };
  CKEDITOR.replace('prohibtion', options);
</script>
@endsection
