@extends('layouts.admin')
@section('content')
<aside class="right-side">
   
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Blog Category
            <small>Create</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('admin.blogCat.showBlogCats')}}">Blog Categories Listing</a></li>
            <li class="active">Blog Category Create</li>
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
                        <h3 class="box-title">Create Blog Category</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('admin.blogCat.createBlogCats') }}" 
                    enctype="multipart/form-data" id="blogCatsForm" 
                    name="blogCatsForm" class="needs-validation">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Category Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter Blog Category Name">
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
                            <button id="blogCatsSubmitButton" type="submit" class="btn btn-primary">Create Blog Category</button>
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
@endsection
