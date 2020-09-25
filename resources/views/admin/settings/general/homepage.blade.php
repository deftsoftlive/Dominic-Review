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
            <h5 class="card-title"><u>META DATA</u></h5>
             {{textbox($errors,'Meta Title <span class="cst-upper-star">*</span>','meta_title', $meta_title)}}
             {{textbox($errors,'Meta Keyword <span class="cst-upper-star">*</span>','meta_keyword', $meta_keyword)}}
             {{textarea($errors,'Meta Description <span class="cst-upper-star">*</span>','meta_description', $meta_description)}}
          </div>
        </div>

        <!-- ********************************
        |
        |       SLIDER MANAGEMENT
        | 
        |************************************ -->

        <!-- Slide - 1 -->
        <!-- <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>SLIDER - 1</u></h5>
             {{textbox($errors,'Slider Title <span class="cst-upper-star">*</span>','slider_title1',$slider_title1)}}
             {{textbox($errors,'Slider Heading <span class="cst-upper-star">*</span>','slider_heading1',$slider_heading1)}}
             {{textbox($errors,'Slider Sub-Heading <span class="cst-upper-star">*</span>','slider_subheading1',$slider_subheading1)}}
             {{textarea($errors,'Slider Short Description <span class="cst-upper-star">*</span>','slider_description1',$slider_description1)}}
             {{textbox($errors,'Slider Button Title <span class="cst-upper-star">*</span>','slider_button_title1',$slider_button_title1)}}
             {{textbox($errors,'Slider Button Url <span class="cst-upper-star">*</span>','slider_button_url1',$slider_button_url1)}}

             <div class="form-group">
              <label class="label-file control-label">Slider-1 Image (1349 X 805) <span class="cst-upper-star">*</span></label>
              <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'slider_image1_src')" class="form-control" name="slider_image1">
             </div>
             <img id="slider_image1_src" src="{{ URL::asset('/uploads').'/'.$slider_image1 }}" style="width: 100px;" />
          </div>
        </div> -->

        <!-- Slide - 2 -->
       <!--  <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>SLIDER - 2</u></h5>
             {{textbox($errors,'Slider Title <span class="cst-upper-star">*</span>','slider_title2',$slider_title2)}}
             {{textbox($errors,'Slider Heading <span class="cst-upper-star">*</span>','slider_heading2',$slider_heading2)}}
             {{textbox($errors,'Slider Sub-Heading <span class="cst-upper-star">*</span>','slider_subheading2',$slider_subheading2)}}
             {{textarea($errors,'Slider Short Description <span class="cst-upper-star">*</span>','slider_description2',$slider_description2)}}
             {{textbox($errors,'Slider Button Title <span class="cst-upper-star">*</span>','slider_button_title2',$slider_button_title2)}}
             {{textbox($errors,'Slider Button Url <span class="cst-upper-star">*</span>','slider_button_url2',$slider_button_url2)}}

             <div class="form-group">
              <label class="label-file control-label">Slider-2 Image (1349 X 805) <span class="cst-upper-star">*</span></label>
              <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'slider_image2_src')" class="form-control" name="slider_image2">
             </div>
             <img id="slider_image2_src" src="{{ URL::asset('/uploads').'/'.$slider_image2 }}" style="width: 100px;" />
          </div>
        </div> -->

        <!-- Slide - 3 -->
       <!--  <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>SLIDER - 3</u></h5>
             {{textbox($errors,'Slider Title <span class="cst-upper-star">*</span>','slider_title3',$slider_title3)}}
             {{textbox($errors,'Slider Heading <span class="cst-upper-star">*</span>','slider_heading3',$slider_heading3)}}
             {{textbox($errors,'Slider Sub-Heading <span class="cst-upper-star">*</span>','slider_subheading3',$slider_subheading3)}}
             {{textarea($errors,'Slider Short Description <span class="cst-upper-star">*</span>','slider_description3',$slider_description3)}}
             {{textbox($errors,'Slider Button Title <span class="cst-upper-star">*</span>','slider_button_title3',$slider_button_title3)}}
             {{textbox($errors,'Slider Button Url <span class="cst-upper-star">*</span>','slider_button_url3',$slider_button_url3)}}

             <div class="form-group">
              <label class="label-file control-label">Slider-3 Image (1349 X 805) <span class="cst-upper-star">*</span></label>
              <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'slider_image3_src')" class="form-control" name="slider_image3">
             </div>
             <img id="slider_image3_src" src="{{ URL::asset('/uploads').'/'.$slider_image3 }}" style="width: 100px;" />
          </div>
        </div> -->

        <!-- About Us Section -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>ABOUT US - SECTION</u></h5>
             {{textbox($errors,'Title <span class="cst-upper-star">*</span>', 'section1_title', $section1_title)}}
             {{textarea($errors,'Description <span class="cst-upper-star">*</span>', 'section1_tagline', $section1_tagline)}}

             <div class="form-group">
              <label class="label-file">Section2 Image (540 X 360) <span class="cst-upper-star">*</span></label>
              <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'aboutus_image_src')" class="form-control" name="aboutus_image">
             </div>
             <img id="aboutus_image_src" src="{{ URL::asset('/uploads').'/'.$aboutus_image }}" style="width: 100px;" />

             {{textbox($errors,'Button Title <span class="cst-upper-star">*</span>', 'section1_button_title', $section1_button_title)}}
             {{textbox($errors,'Button Url <span class="cst-upper-star">*</span>', 'section1_button_url', $section1_button_url)}}
          </div>
        </div>

        <!-- Course/Camp Linking Section -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>COURSE/CAMP LINKING SECTION</u></h5>
             {{textbox($errors,'Title <span class="cst-upper-star">*</span>', 'section2_title', $section2_title)}}
             {{textbox($errors,'Button Title <span class="cst-upper-star">*</span>', 'section2_button_title', $section2_button_title)}}
             {{textbox($errors,'Button Url <span class="cst-upper-star">*</span>', 'section2_button_url', $section2_button_url)}}
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