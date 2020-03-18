@extends('layouts.admin')
@section('content')
<aside class="right-side">
   
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Page
            <small>Edit</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Edit Page</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('admin.cmspages.updatePage', ['slug' => $page->slug]) }}" 
                    enctype="multipart/form-data" id="pageForm" 
                    name="pageForm"
                    class="needs-validation">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Enter New Page Name</label>
                            <input type="text" value="{{$page->name}}" name="name" class="form-control" id="name" placeholder="Enter Page Name">
                            </div>

                            <div class="form-group">
                                    <label for="body">Enter Accordian Description</label>
                                <textarea class="form-control" id="body" name="body">{{$page->body}}</textarea>
                                @if ($errors->has('body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                                </div> 

                            <div class="form-group">
                                <label for="metatitle">Enter Meta Title</label>
                            <input type="text" value="{{$page->metatitle}}" name="metatitle" class="form-control" id="metatitle" placeholder="Enter Meta Title">
                            </div>
                            <div class="form-group">
                                <label for="metakeywords">Enter Meta Keywords</label>
                            <input type="text" value="{{$page->metakeywords}}" name="metakeywords" class="form-control" id="metakeywords" placeholder="Enter Meta Keywords">
                            </div>
                            <div class="form-group">
                                <label for="metadescription">Enter Meta Description</label>
                            <input type="text" value="{{$page->metadescription}}" name="metadescription" class="form-control" id="metadescription" placeholder="Enter Meta Description">
                            </div>
                            <div class="form-group create-radio-bttn">
                                    <label for="status">Status <span class="fac-colon">:</span></label>
                                    <input required type="radio" class="form-control" name="status" id="status" value="1"
                                    {{ $page->status == '1' ? 'checked' : '' }}> Active
                                    <span class="radio-bttn-text"> <input required type="radio" class="form-control" name="status" id="status" value="0"
                                    {{ $page->status == '0' ? 'checked' : '' }}> Inactive </span>
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button id="pageSubmitButton" type="button" class="btn btn-primary">Update Page</button>
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
<script src="{{ asset('admin/js/validations/pageValidation.js') }}" type="text/javascript"></script>
        
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
    CKEDITOR.replace( 'body', options );
</script>
@endsection
