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
          <h5 class="card-title">Vendor Submit Business</h5>
          <div class="col-md-12">
            <form role="form" method="post" action="{{ route('admin.emails.update', $emails[0]->id) }}" id="businessSubForm" enctype="multipart/form-data">
            @csrf
              <div class="card-body">
              <div class="form-group label-floating is-focused">
                <label class="control-label">Subject*</label>
                <input type="text" class="form-control " name="subject" value="{{$emails[0]->subject}}" id="subject1">
              </div>

              <div class="form-group label-floating is-focused">
                <label class="control-label">Title*</label>
                <input type="text" class="form-control " name="title" value="{{$emails[0]->title}}" id="title">
              </div>

              <div class="form-group">
                <label>Body*</label>
                <textarea class="form-control" id="body" name="body">{{$emails[0]->body}}</textarea>
              </div>
              </div>
              <div class="card-footer">
              <button type="submit" id="businessSubFormBtn" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>


<div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Approve Business</h5>
          <div class="col-md-12">
            <form role="form" method="post" action="{{ route('admin.emails.update', $emails[1]->id) }}" id="emailAppForm" enctype="multipart/form-data">
            @csrf
              <div class="card-body">              
              <div class="form-group label-floating is-focused">
                <label class="control-label">Subject*</label>
                <input type="text" class="form-control " name="subject" value="{{$emails[1]->subject}}" id="subject1">
              </div>

              <div class="form-group label-floating is-focused">
                <label class="control-label">Title*</label>
                <input type="text" class="form-control " name="title" value="{{$emails[1]->title}}" id="title1">
              </div>

              <div class="form-group">
                <label>Body*</label>
                <textarea class="form-control" id="body1" name="body">{{$emails[1]->body}}</textarea>
              </div>

              </div>
              <div class="card-footer">
              <button type="submit" id="emailAppFormBtn" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Reject Business</h5>
          <div class="col-md-12">
            <form role="form" method="post" action="{{ route('admin.emails.update', $emails[2]->id) }}" id="emailRejForm" enctype="multipart/form-data">
            @csrf
              <div class="card-body">
              <div class="form-group label-floating is-focused">
                <label class="control-label">Subject*</label>
                <input type="text" class="form-control " name="subject" value="{{$emails[2]->subject}}" id="subject2">
              </div>

              <div class="form-group label-floating is-focused">
                <label class="control-label">Title*</label>
                <input type="text" class="form-control " name="title" value="{{$emails[2]->title}}" id="title2">
              </div>

              <div class="form-group">
                <label>Body*</label>
                <textarea class="form-control" id="body2" name="body">{{$emails[2]->body}}</textarea>
              </div>
              </div>
              <div class="card-footer">
              <button type="submit" id="emailRejFormBtn" class="btn btn-primary">Update</button>
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
