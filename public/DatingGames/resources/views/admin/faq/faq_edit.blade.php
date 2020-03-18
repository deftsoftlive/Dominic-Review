@extends('layouts.admin')
@section('content')
<aside class="right-side">
   
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Faq
            <small>Edit</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('admin.showFaqs')}}">Faqs Listing</a></li>
            <li class="active">Faq Edit</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Edit Faq</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('admin.updateFaq', ['slug' => $faq->slug]) }}" 
                    enctype="multipart/form-data" id="faqForm" 
                    name="faqForm" class="needs-validation">
                        @csrf
                        <div class="box-body">
                            
                            <div class="form-group">
                                <label for="title">Faq Title</label>
                                <input type="text" name="title" value="{{$faq->title}}" class="form-control" id="title" placeholder="Enter Faq Title">
                            </div>

                            <div class="form-group">
                                <label for="description">Faq Description</label>
                            <textarea class="form-control" id="description"  name="description">{{$faq->description}}</textarea>
                            </div>
                                
                            <div class="form-group create-radio-bttn">
                                    <label for="status">Status <span class="fac-colon">:</span></label>
                                    <input required type="radio" class="form-control" name="status" id="status" value="1"
                                    {{ $faq->status == '1' ? 'checked' : '' }}> Active
                                    <span class="radio-bttn-text"> <input required type="radio" class="form-control" name="status" id="status" value="0"
                                    {{ $faq->status == '0' ? 'checked' : '' }}> Inactive </span>
                            </div> 
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button id="faqSubmitButton" type="submit" class="btn btn-primary">Update Faq</button>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div><!--/.col (left) -->
            <!-- right column -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</aside>
@endsection
@section('customScripts')
<script src="{{ asset('admin/js/validations/faqValidation.js') }}" type="text/javascript"></script>
<script>
        var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        // filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        // filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        // filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
        filebrowserWindowWidth  : 800,
        filebrowserWindowHeight : 500,
        uiColor: '#00ccff',
        removePlugins: 'save, newpage',

      };
        CKEDITOR.replace( 'description', options );
</script>
@endsection
