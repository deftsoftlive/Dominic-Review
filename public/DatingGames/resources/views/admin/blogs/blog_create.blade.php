@extends('layouts.admin')
@section('content')
<aside class="right-side">
   
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Blog
            <small>Create</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('admin.blog.showBlogs')}}">Blogs Listing</a></li>
            <li class="active">Blog Create</li>
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
                        <h3 class="box-title">Create Blog</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('admin.blog.createBlog') }}" 
                    enctype="multipart/form-data" id="blogForm" 
                    name="blogForm" class="needs-validation">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label>Select</label>
                                <select name="category" class="form-control">
                                    <option value="">Select Blog Category</option>
                                    @foreach ($blogCats as $blogCat)
                                    <option value="{{$blogCat->id}}">{{$blogCat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Blog Title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Enter Blog Title">
                            </div>
                            <div class="form-group">
                                <label for="content">Blog Content</label>
                                <textarea class="form-control" id="content"  name="content"></textarea>
                            </div>
                            <div class="form-group image-create-wrap">
                                    <div class="image-create-left">
                                    <label for="image">Blog Image</label>
                                    <input required  accept='image/*' type="file" name="image" onchange="ValidateSingleInput(this)" id="image">
                                    </div>
                                    <div class="image-create-right">
                                    <img style="display: none; width: 100px; height: 100px;" id="image_src"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="metatitle">Blog Meta Title</label>
                                <input  type="text" name="metatitle" class="form-control" id="metatitle" placeholder="Enter Blog Meta Title">
                            </div>
                            <div class="form-group">
                                <label for="metakeywords">Blog Meta Keywords</label>
                                <input  type="text" name="metakeywords" class="form-control" id="metakeywords" placeholder="Enter Blog Meta Keywords">
                            </div>
                            <div class="form-group">
                                <label for="metadescription">Blog Meta Description</label>
                                <input  type="text" name="metadescription" class="form-control" id="metadescription" placeholder="Enter Blog Meta Description">
                            </div> 

                            {{-- <div class="form-group create-radio-bttn">
                                    <label for="status">Status  <span class="fac-colon">:</span></label>
                                    <input type="radio" class="form-control" name="status" id="status" checked value="1">
                                    Active 
                                    <span class="radio-bttn-text"><input type="radio" class="form-control" name="status" id="status" value="0">
                                        Inactive</span>
                                </div> --}}
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button id="blogSubmitButton" type="submit" class="btn btn-primary">Create Blog</button>
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
<script src="{{ asset('admin/js/validations/blogValidation.js') }}" type="text/javascript"></script>
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
        CKEDITOR.replace( 'content', options );
</script>
@endsection
