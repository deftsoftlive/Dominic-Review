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
                    <li class="breadcrumb-item "><a href="{{ route($addLink) }}">View</a></li>
                    <li class="breadcrumb-item "><a href="javascript:void(0)">Edit</a></li>
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
       @include('admin.error_message')
 
            <div class="card-body">



<div class="col-md-12">

  <form role="form" method="post" id="signupForm" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="type" value="{{Request::route('id')}}">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Meta Data</h5>
           {{textbox($errors,'Meta Title*','meta_title', $meta_title)}}
           {{textbox($errors,'Meta Keyword*','meta_keyword', $meta_keyword)}}
           {{textarea($errors,'Meta Description*','meta_description', $meta_description)}}
        </div>
      </div>
      
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Sign Up</h5>
           {{textbox($errors, 'Title*', 'signup_title', $signup_title)}}
           {{textbox($errors, 'Heading*', 'heading', $heading)}}
           <div class="form-group">
            <label class="label-file">Sign Up Background Image*</label>
            <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'background_image_src')" class="form-control" name="signup_background_image">
           </div>

         <img src="{{ url('/uploads').'/'.$signup_background_image }}" id="background_image_src" style="width: 100px; height: 100px;"  />
         
            <div class="form-group">
            <label class="label-file">Sign Up Banner*</label>
            <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'image_src')" class="form-control" name="signup_banner">
           </div>

         <img src="{{ url('/uploads').'/'.$signup_banner }}" id="image_src" style="width: 100px; height: 100px;"  />
           {{textarea($errors, 'Description*', 'description', $description)}}
        </div>
        <div class="card-body">
          <h5 class="card-title">Section 1</h5>
           {{textbox($errors, 'Section 1 Title*', 'section1_title', $section1_title)}}
           <div class="form-group">
            <label class="label-file">Section1 Description*</label>
            <input type="text" class="form-control" value="{{$section1_tagline}}" name="section1_tagline">
          </div>

           <div class="form-group">
            <label class="label-file">Section1 Video Poster*</label>
            <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'section1_video_poster_src')" class="form-control" name="section1_video_poster">
          </div>

         <img id="section1_video_poster_src" style="width: 100px; height: 100px;" 
         src="{{ url('/uploads').'/'.$section1_video_poster }}">

         <div class="form-group">
            <label class="label-file">Section1 Video*</label>
            <input type="file" class="form-control" name="section1_video">
           </div>

           <video width="320" height="240" controls>
            <source src="{{ url('/uploads').'/'.$section1_video }}" type="video/mp4">
            <source src="{{ url('/uploads').'/'.$section1_video }}" type="video/ogg">
          </video>


        </div>

        <div class="card-body">
          <h5 class="card-title">Section 2</h5>
           {{textbox($errors, 'Section 2 Title*', 'section2_title', $section2_title)}}
        </div>
      </div>

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" id="signupFormBtn" class="btn btn-primary">Submit</button>
                </div>
 </form>


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
<script src="{{url('/admin-assets/js/validations/settings/vendorSignupPageValidation.js')}}"></script>
<script src="{{url('/js/validations/imageShow.js')}}"></script>
@endsection