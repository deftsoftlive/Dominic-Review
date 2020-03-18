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
                    <li class="breadcrumb-item">
                      <a href="{{url(route('admin_dashboard'))}}">
                      <i class="feather icon-home"></i></a>
                    </li>
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

  <form role="form" method="post" id="homePageForm" action="" enctype="multipart/form-data">
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
          <h5 class="card-title">Slider</h5>
           {{textbox($errors,'Slider Title*','slider_title',$slider_title)}}
           {{textbox($errors,'Slider Tagline*','slider_tagline',$slider_tagline)}}
           <div class="form-group">
            <label class="label-file">Slider Video Url*</label>
            <input type="file" class="form-control" name="slider_video_url">
           </div>

           <video width="320" height="240" controls>
            <source src="{{ url('/uploads').'/'.$slider_video_url }}" type="video/mp4">
            <source src="{{ url('/uploads').'/'.$slider_video_url }}" type="video/ogg">
          </video>

           {{textbox($errors,'Slider Button Title*','slider_button_title',$slider_button_title)}}
           {{textbox($errors,'Slider Button Url*','slider_button_url',$slider_button_url)}}


        </div>
      </div>

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Section 1</h5>
         {{textbox($errors,'Section1 Title*', 'section1_title', $section1_title)}}
         {{textbox($errors,'Section1 Tagline*', 'section1_tagline', $section1_tagline)}}
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Section 2</h5>
         {{textbox($errors,'Section2 Title*', 'section2_title', $section2_title)}}
         {{textbox($errors,'Section2 Tagline*', 'section2_tagline', $section2_tagline)}}

         <div class="form-group">
          <label class="label-file">Section2 Image*</label>
          <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'section2_image_src')" class="form-control" name="section2_image">
         </div>

         <img id="section2_image_src" src="{{ url('/uploads').'/'.$section2_image }}" style="width: 100px;" />

         {{textbox($errors,'Section2 Image Tagline*', 'section2_image_tagline', $section2_image_tagline)}}

      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Section 3</h5>
         {{textbox($errors,'Section3 Title*', 'section3_title', $section3_title)}}

         <div class="form-group">
          <label class="label-file">Section3 Tagline*</label>
          <input type="text" value="{{$section3_tagline}}" id="section3_tagline" class="form-control" name="section3_tagline">
         </div>

         <div class="form-group">
          <label class="label-file">Section3 Video Poster*</label>
          <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'video_poster_src')" class="form-control" name="section3_video_poster">
         </div>

         <img src="{{ url('/uploads').'/'.$section3_video_poster }}" id="video_poster_src" style="width: 100px;" />

          <div class="form-group">
          <label class="label-file">Section3 Video*</label>
          <input type="file" class="form-control" name="section3_video">
         </div>    
         <video width="320" height="240" controls>
            <source src="{{ url('/uploads').'/'.$section3_video }}" type="video/mp4">
            <source src="{{ url('/uploads').'/'.$section3_video }}" type="video/ogg">
          </video>     
      </div>
    </div>

     <div class="card">
      <div class="card-body">
        <h5 class="card-title">Section 4</h5>
         {{textbox($errors,'Section4 Title1*', 'section4_title1', $section4_title1)}}
         {{textbox($errors,'Section4 Tagline1*', 'section4_tagline1', $section4_tagline1)}}
         {{textarea($errors,'Section4 Description*', 'section4_description', $section4_description)}}
         {{textbox($errors,'Section4 Title2*', 'section4_title2', $section4_title2)}}
         {{textbox($errors,'Section4 Tagline2*', 'section4_tagline2', $section4_tagline2)}}
         {{textbox($errors,'Section4 Button Title*', 'section4_button_title', $section4_button_title)}}
         {{textbox($errors,'Section4 Button Url*', 'section4_button_url', $section4_button_url)}}
         <div class="form-group">
          <label class="label-file">Section4 Image*</label>
          <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'section4_image_src')" class="form-control" name="section4_image">
         </div>

         <img src="{{ url('/uploads').'/'.$section4_image }}" id="section4_image_src" style="width: 100px;" />
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Section 5</h5>
         {{textbox($errors,'Section5 Title*', 'section5_title', $section5_title)}}
      </div>
    </div>

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" id="homePageFormBtn" class="btn btn-primary">Submit</button>
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
<script src="{{url('/admin-assets/js/validations/settings/homePageValidation.js')}}"></script>
<script src="{{url('/js/validations/imageShow.js')}}"></script>
@endsection