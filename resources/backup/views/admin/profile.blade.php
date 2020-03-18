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
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">Profile</a></li>
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


       
 
            <div class="card-body">

              @include('admin.error_message')

<div class="row">

<div class="col-md-6">
<h3>Profile Image</h3>
  <form role="form" id="profileForm" action="{{url(route('post_admin_settings'))}}" method="post" enctype="multipart/form-data">
                <div class="profile-card">
                  @csrf
                   <div class="profile-image">
                         <input type="file" name="image" accept="image/*" onchange="ValidateSingleInput(this, 'image_src')" id="selImage" class="form-control" required>
                         
                         <img id="image_src" class="img-radius" style="width: 100px; height: 100px; margin-top: 6px;" src="{{ Auth::User()->profile_image ? asset('').'/'.Auth::User()->profile_image : asset('/images/user.jpg') }}">

                          @if ($errors->has('image'))
                              <div class="error">{{ $errors->first('image') }}</div>
                          @endif

                   </div>
                 
                    

                  
                </div>
                <!-- /.card-body -->

                <div class="profile-card-ftr">
                  <button type="submit" id="profileFormBtn" class="btn btn-primary">Change Profile Image</button>
                </div>
 </form>


</div>


<div class="col-md-6">
<h3>Password Settings</h3>
  <form role="form" id="passwordForm" action="{{url(route('post_admin_password_settings'))}}" method="post" enctype="multipart/form-data">
                <div class="profile-card">


                   @csrf
                    
                   {{password($errors,'Old Password*','old_password')}}
                   {{password($errors,'New Password*','password')}}
                   {{password($errors,'Confirm Password*','password_confirmation')}}  
                   
                  
                </div>
                <!-- /.card-body -->

                <div class="">
                  <button type="submit" id="passwordFormBtn" class="btn btn-primary">Change Password</button>
                </div>
 </form>


</div>



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
<script src="{{URL::asset('/admin-assets/js/validations/profileValidation.js')}}"></script>
<script src="{{URL::asset('/js/validations/imageShow.js')}}"></script>
<script type="text/javascript">
  $('#selImage').on('change', function () {
    $(this).parent().find('label').css('display', 'none');
  });
</script>
@endsection

