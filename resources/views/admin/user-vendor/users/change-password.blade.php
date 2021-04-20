@extends('layouts.admin')
@section('content')

<div class="page-header">
   <div class="page-block">
      <div class="row align-items-center">
         <div class="col-md-12">
            <div class="page-header-title">
               <h5 class="m-b-10">Parent User</h5>
            </div>
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
               <li class="breadcrumb-item"><a href="{{route('parent_users')}}">Parent List</a></li>
               <li class="breadcrumb-item"><a href="javascript:void(0);">Change Password</a></li>
            </ul>
         </div>
      </div>
   </div>
</div>

@if(Session::has('success'))
    <div class="alert_msg alert alert-success">
      <p>{{ Session::get('success') }} </p>
    </div>
@endif

@if(Session::has('error'))
    <div class="alert_msg alert alert-danger">
      <p>{{ Session::get('error') }} </p>
    </div>
@endif

<section class="content">
   <div class="row">
     <div class="col-12">
       <div class="card">
         <div class="card-body">
            <div class="col-md-12">
               <form role="form" action="{{route('UpdateParentPassword')}}" method="post" id="ChangePassword" enctype="multipart/form-data">
                  @csrf
                  
                  <div class="form-group label-floating is-empty">
                     <label class="control-label">User Name
                     </label>
                     <input type="text" class="form-control" name="name" value="{{ $users->name }}" disabled>
                  </div>

                  <div class="form-group label-floating is-empty">
                     <label class="control-label">Password
                        <span class="cst-upper-star">*</span>
                     </label>
                     <input type="password" class="form-control" name="password" value="" id="password">
                  </div>

                  <div class="form-group label-floating is-empty">
                     <label class="control-label">Confirm Password
                        <span class="cst-upper-star">*</span>
                     </label>
                     <input type="password" class="form-control" name="conf_password" value="">
                  </div>

                  <input type="hidden" name="user_id" value="{{ $users->id }}">

                  <div class="card-footer">
                    <button type="submit" id="ChangePasswordBtn" class="btn btn-primary">Change Password</button>
                  </div>
               </form>
            </div>
         </div>
       </div>
     </div>
   </div>
</section>

@endsection

@section('scripts')

<script type="text/javascript">
    /*validation for the register form*/
     $('#ChangePassword').validate({

      rules: {         
         password: {
             required: true,
             minlength:8,
             maxlength:25,
             checkstrongpassword:true,
         }, 
         conf_password: {
             required: true,
             minlength:8,
             checkstrongpassword:true,
             equalTo:"#password",
             maxlength:25,
         },
      },

    messages:{
      password:{required:"This field is required."},
      password_confirmation:{
        required:"This field is required.",
        equalTo:"Password should be same."
      }

    },

      submitHandler: function(form) {        
        $("#ChangePasswordBtn").attr("disabled", true);
        form.submit();
      }

  });
</script>

@endsection
