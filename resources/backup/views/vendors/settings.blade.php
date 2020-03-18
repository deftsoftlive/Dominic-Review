@extends('layouts.vendor')
@section('vendorContents')
<div class="container-fluid">
    <div class="row">
       <div class="col-lg-6 offset-lg-3">
          <div class="card vendor-dash-card">
       <div class="card-header"><h3>PROFILE SETTINGS</h3></div>
           <div class="card-body">
@include('admin.error_message')
<div class="row">

<div class="col-md-12">

<form method="post" id="profileForm" enctype="multipart/form-data">
	@csrf

  {{textbox($errors,'Name','name',Auth::user()->name)}}
	{{textbox($errors,'Phone Number','phone_number',Auth::user()->phone_number)}}

    <!-- {{choosefile($errors,'Profile Image','image')}} -->

     <div class="form-group">
      <label class="label-file">Profile Picture*</label>
      <input type="file" accept="image/*" multiple onchange="ValidateSingleInput(this, 'image_src')" class="form-control" name="image">

      @if ($errors->has('image'))
          <div class="error">{{ $errors->first('image') }}</div>
      @endif
     </div>

    <!-- @if(Auth::user()->profile_image != "") -->
    <figure class="profile-img-upload text-center">
      <img src="{{url('/'.Auth::user()->profile_image)}}" style="display: {{ Auth::user()->profile_image ? 'block' : 'none'  }} " id="image_src" width="200"/>
       <!-- <img id="image_src" src="{{url('/'.Auth::user()->profile_image)}}" width="100"> -->
   </figure>
    <!-- @endif -->
   <div class="btn-wrap">
    <button id="profileFormBtn" class="cstm-btn">Update</button>
</div>
</form>

</div>
</div>
</div>
</div>
</div>
</div>
</div>

@endsection

@section('scripts')
<script src="{{url('/js/validations/profileValidation.js')}}"></script>
<script src="{{url('/js/validations/imageShow.js')}}"></script>
@endsection
