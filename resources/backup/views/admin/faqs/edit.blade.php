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
                    <li class="breadcrumb-item "><a href="{{ route($addLink) }}">View</a></li>
                    <li class="breadcrumb-item "><a href="javascript:void(0);">Edit</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

       <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
       @include('admin.error_message')
 
            <div class="card-body">



<div class="col-md-12">

  <form role="form" method="post" id="CmsPageForm" enctype="multipart/form-data">
    @csrf
      <div class="card-body">
         {{textbox($errors,'Meta Title*','meta_title', $faq->meta_title)}}
         {{textarea($errors,'Meta Description*','meta_description', $faq->meta_description)}}
         {{textbox($errors,'Meta Keywords*','meta_keywords', $faq->meta_keywords)}}
         {{textbox($errors, 'Question*', 'question', $faq->question)}}
         <div class="form-group">
          <label>Answer*</label>
          <textarea class="form-control" id="answer" name="answer">{{$faq->question}}</textarea>
        </div>

      </div>

      <div class="card-footer">
        <button type="submit" id="CmsPageFormBtn" class="btn btn-primary">Update</button>
      </div>
 </form>


</div>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

 
     
@endsection

@section('scripts')
<script src="{{url('/admin-assets/js/validations/faqValidation.js')}}"></script>
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
   CKEDITOR.replace('answer', options);
</script>
@endsection
