@extends('layouts.admin')
@section('content')
<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Profile
                        <small>Edit</small>
                    </h1>
                </section>
                @include('partials/message')  
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Edit Profile</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form method="POST" id="profileForm" enctype="multipart/form-data" action="{{ route('admin.updateProfile') }}">
                                    @csrf
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputName">Name</label>
                                            <input required type="text" name="fname" value="{{ $profile->fname }}" class="form-control" 
                                            id="exampleInputName" placeholder="Enter FName">
                                        </div>
                                        
                                        <div class="form-group image-create-wrap">
                                                <div class="image-create-left">
                                                <label for="profile_picture">Profile Picture</label>
                                                <input type="file" accept='image/*' name="profile_picture" onchange="ValidateSingleInput(this)" id="profile_picture">
                                                </div>
                                                <img style="width: 100px; height: 100px;" src="{{ asset('/upload/images').'/'.$profile->profile_picture }}" id="image_src"/>
                                        </div>
            
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" id="profileSubmitButton" class="btn btn-primary">Update Profile</button>
                                    </div>
                                </form>
                            </div><!-- /.box -->
                        </div><!--/.col (left) -->
                        <!-- right column -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->

                <section class="content">
                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-12">
                                <!-- general form elements -->
                                <div class="box box-primary">
                                    <div class="box-header">
                                        <h3 class="box-title">Change Password</h3>
                                    </div><!-- /.box-header -->
                                    <!-- form start -->
                                    <form method="POST" id="changePasswordForm" action="{{ route('admin.updatePassword') }}">
                                        @csrf
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="oldpassword">Old Password</label>
                                                <input type="password" name="oldpassword" class="form-control" 
                                                id="oldpassword" placeholder="Enter Old Password">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">New Password</label>
                                                <input type="password" name="password" class="form-control" 
                                                id="password" placeholder="Enter New Password">
                                            </div>
                                            <div class="form-group">
                                                <label for="conpassword">Confirm Password</label>
                                                <input type="password" name="conpassword" class="form-control" 
                                                id="conpassword" placeholder="Enter Confirm Password">
                                            </div>
                                        </div><!-- /.box-body -->
    
                                        <div class="box-footer">
                                            <button type="submit" id="passwordSubmitButton" class="btn btn-primary">Update Password</button>
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
