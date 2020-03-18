@extends('layouts.admin')
@section('content')
<aside class="right-side">
   
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Venue
            <small>Create</small>
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
                        <h3 class="box-title">Create Venue</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form method="POST" id="admin-create-venue" action="{{ route('admin.createVenue') }}" 
                    enctype="multipart/form-data" 
                    name="venueForm" class="needs-validation">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Name<span class="mandatory">*</span></label>
                                        <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="post_code">Post Code<span class="mandatory">*</span></label>
                                        <input type="text" value="{{ old('post_code') }}" name="post_code" class="form-control" id="post_code" placeholder="Post Code">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                    
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="address">Address<span class="mandatory">*</span> </label>
                                        <textarea name="address" class="form-control" id="address">{{ old('address') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group image-create-wrap">
                                        <div class="image-create-left">
                                            <label for="image">Venue Picture<span class="mandatory">*</span></label>
                                            <input required type="file" accept='image/*' name="image" onchange="ValidateSingleInput(this)" id="image">
                                        </div>
                                        <img class="img-circle" style="display: none; width: 100px; height: 100px;" id="image_src"/>
                                    </div>
                                </div>
                            </div>
                
                        </div>
                    </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button id="venueSubmitButtonCreate" type="submit" class="btn btn-primary">Create Venue</button>
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
<script src="{{ asset('admin/js/validations/userValidation.js') }}" type="text/javascript"></script>
@endsection
