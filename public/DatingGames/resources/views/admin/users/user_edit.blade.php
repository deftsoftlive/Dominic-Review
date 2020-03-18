@extends('layouts.admin')
@section('content')
<aside class="right-side">
   
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User
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
                        <h3 class="box-title">Edit User</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form method="POST" id ="admin-edit-user" action="{{ route('admin.updateUser', ['slug' => $user->slug ]) }}" 
                    enctype="multipart/form-data" id="userForm" 
                    name="userForm" class="needs-validation">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="fname">First Name<span class="mandatory">*</span></label>
                            <input type="text" value="{{$user->fname}}" name="fname" class="form-control" id="fname" placeholder="First Name">
                            </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="lname">Last Name<span class="mandatory">*</span></label>
                            <input type="text" value="{{$user->lname}}" name="lname" class="form-control" id="lname" placeholder="Last Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group custm-date">
                            <label for="date_of_birth" class="col-form-label text-md-right">{{ __('Date of Birth') }}<span class="mandatory">*</span></label>
                                    <input type="text" class="form-control @error('date_of_birth') is-invalid @enderror" id='date_of_birth' name="date_of_birth" value="{{Carbon\Carbon::parse($user->date_of_birth)->format('d-m-Y')}}" autocomplete="date_of_birth">
                            
                            </div>
                        </div>

                         <div class="col-xs-12 col-sm-6">

                            <div class="form-group">
                                <label for="email">Email<span class="mandatory">*</span></label>
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control" id="email" placeholder="Enter User Email">
                            @if ($errors->has('email'))
                                <span class="error">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                            <label for="gender" class="col-form-label text-md-right">{{ __('Gender') }}<span class="mandatory">*</span></label></br>
                            <input type="radio" value="male" name="gender" class="form-control" id="gender" {{ ($user->gender=="male")? "checked" : "" }}><label for="male" >Male</label>
                            <input type="radio" value="female" name="gender" class="form-control" id="gender" {{ ($user->gender=="female")? "checked" : "" }}><label for="female">Female</label>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">

                            <div class="form-group">
                                <label for="contact_no">Contact Number<span class="mandatory">*</span></label>
                            <input type="text" value="{{$user->contact_no}}" name="contact_no" class="form-control" id="contact_no">
                            </div> 
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="role" class="col-form-label text-md-right">{{ __('Role') }}<span class="mandatory">*</span></label></br>
                                <input type="radio" value="1" name="role" class="form-control" id="role1" {{ ($user->role_id == 1)? "checked" : "" }} checked><label for="role1" >Fun and Games Admin</label>
                                <input type="radio" value="2" name="role" class="form-control" id="role2" {{ ($user->role_id == 2)? "checked" : "" }}><label for="role2">User</label>
                            </div>
                        </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                <label for="interesting_facts">Optional Interesting Fact</label>
                            <textarea name="interesting_facts" class="form-control" id="interesting_facts">{{$user->interesting_facts}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group image-create-wrap">
                                <div class="image-create-left">
                                <label for="profile_picture"> Profile Picture</label>
                                <input type="file" accept='image/*' name="profile_picture" onchange="ValidateSingleInput(this)" id="profile_picture">
                                </div>
                                <img id="profile-pic" src="{{ asset('/upload/images').'/'.$user->profile_picture }}" style="width: 100px; height: 100px;" id="image_src"/>
                            </div>
                            <div id="myModal" class="modal popup-custimage">
                              <span class="close" data-dismiss="modal">&times;</span>
                              <img class="modal-img" id="modal-img" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                                <label for="fname">Nick Name</label>
                            <input type="text" value="{{$user->nick_name}}" name="nick_name" class="form-control" id="nick_name" placeholder="Nick Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group create-radio-bttn">
                                <label for="status">User Status <span class="mandatory">*</span><span class="fac-colon">:</span></label>
                                <input required type="radio" class="form-control" name="status" id="status3" value="2"
                                {{ $user->status == '2' ? 'checked' : '' }}><label for="status3"> Pending </label>
                                <input required type="radio" class="form-control" name="status" id="status1" value="1"
                                {{ $user->status == '1' ? 'checked' : '' }}><label for="status1"> Active </label>
                                <input required type="radio" class="form-control" name="status" id="status0" value="0"
                                {{ $user->status == '0' ? 'checked' : '' }}><label for="status0"> Suspend </label>
                            </div> 
                        </div>
                    </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button id="userSubmitButton" type="submit" class="btn btn-primary">Update User</button>
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
