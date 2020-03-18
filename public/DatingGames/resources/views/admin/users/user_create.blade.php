@extends('layouts.admin')
@section('content')
<aside class="right-side">
   
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User
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
                        <h3 class="box-title">Create User</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form method="POST" id="admin-create-user" action="{{ route('admin.createUser') }}" 
                    enctype="multipart/form-data" 
                    name="userForm" class="needs-validation">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="fname">First Name<span class="mandatory">*</span></label>
                                <input type="text" value="{{ old('fname') }}" name="fname" class="form-control" id="fname" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="lname">Last Name<span class="mandatory">*</span></label>
                                <input type="text" value="{{ old('lname') }}" name="lname" class="form-control" id="lname" placeholder="Last Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="nick_name">Optional Nick Name</label>
                                <input type="text" value="{{ old('nick_name') }}" name="nick_name" class="form-control" id="nick_name" placeholder="Nick Name">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">

                            <div class="form-group custm-date">
                                <label for="date_of_birth" class="col-form-label text-md-right">{{ __('Date of Birth') }}<span class="mandatory">*</span></label>
                                    <input type="text" class="form-control @error('date_of_birth') is-invalid @enderror" id='date_of_birth' name="date_of_birth" value="{{ old('date_of_birth') }}" autocomplete="date_of_birth">
                            
                                @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                            <label for="gender" class="col-form-label text-md-right">{{ __('Gender') }}<span class="mandatory">*</span></label></br>
                            <input type="radio" value="male" name="gender" class="form-control" id="male" {{ old('gender') == 'male' ? 'checked' : '' }} checked><label for="male" >Male</label>
                            <input type="radio" value="female" name="gender" class="form-control" id="female" {{ old('gender') == 'female' ? 'checked' : '' }}><label for="female">Female</label>
                            </div>
                        </div>
                         <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                            <label for="role" class="col-form-label text-md-right">{{ __('Role') }}<span class="mandatory">*</span></label></br>
                            <input type="radio" value="1" name="role" class="form-control" id="role1" {{ old('role') == '1' ? 'checked' : '' }} checked><label for="role1" >Fun and Games Admin</label>
                            <input type="radio" value="2" name="role" class="form-control" id="role2" {{ old('role') == '2' ? 'checked' : '' }}><label for="role2">User</label>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                       <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="contact_no">Contact Number<span class="mandatory">*</span></label>
                            <input type="text" value="{{ old('contact_no') }}" name="contact_no" class="form-control" id="contact_no">
                            @error('contact_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> 

                            
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="interesting_facts">Optional Interesting Fact</label>
                            <textarea name="interesting_facts" class="form-control" id="interesting_facts">{{ old('interesting_facts') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">

                            <div class="form-group">
                                <label for="email">Email<span class="mandatory">*</span></label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email" placeholder="Enter User Email">
                            @if ($errors->has('email'))
                                <span class="error">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                            <div class="form-group image-create-wrap">
                                <div class="image-create-left">
                                <label for="profile_picture">Profile Picture</label>
                                <input type="file" accept='image/*' name="profile_picture" onchange="ValidateSingleInput(this)" id="profile_picture">
                                </div>
                                <img class="img-circle" style="display: none; width: 100px; height: 100px;" id="image_src"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="password">Password<span class="mandatory">*</span></label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter User Password">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password<span class="mandatory">*</span></label>
                                <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Enter User Confirm Password">
                            </div>
                        </div>
                    </div>
                        </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button id="userSubmitButtonCreate" type="submit" class="btn btn-primary">Create User</button>
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
