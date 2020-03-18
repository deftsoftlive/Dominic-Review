@extends('layouts.admin')
 
@section('content')
 <div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">{{$title}}</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item "><a href="javascript:void(0);">List</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

@include('admin.error_message')

<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">{{$email->title}}</h5>
          <div class="col-md-12">

            <form role="form" method="post" action="{{ route('admin.emails.update', $email->id) }}" id="businessSubForm" enctype="multipart/form-data">
            @csrf
              
              <div class="form-group label-floating is-focused">
                <label class="control-label">Subject*</label>
                <input type="text" class="form-control " name="subject" value="{{$email->subject}}" id="subject1">
              </div>
               <div class="form-group">
                <label>Body*</label>
                <textarea class="form-control" id="body" name="body">{{$email->body}}</textarea>
              </div>
              
              <div class="card-footer">
              <button type="submit" id="businessSubFormBtn" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
 

  </div>
</section>

 
@endsection

@section('scripts')
<script src="{{url('/admin-assets/js/validations/emailValidation.js')}}"></script>
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
   CKEDITOR.replace('body', options);
   CKEDITOR.replace('body1', options);
   CKEDITOR.replace('body2', options);
</script>
@endsection
