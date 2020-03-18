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
            <h5 class="card-title">META DATA</h5>
             {{textbox($errors,'Meta Title <span class="cst-upper-star">*</span>','meta_title', $meta_title)}}
             {{textbox($errors,'Meta Keyword <span class="cst-upper-star">*</span>','meta_keyword', $meta_keyword)}}
             {{textarea($errors,'Meta Description <span class="cst-upper-star">*</span>','meta_description', $meta_description)}}
          </div>
        </div>

        <!-- ********************************
        |
        |       COURSES PAGE MANAGEMENT
        | 
        |************************************ -->

        <!-- Banner -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">BANNER SECTION</h5>
             {{textbox($errors,'Banner Title <span class="cst-upper-star">*</span>','page_title',$page_title)}}

             <div class="form-group">
              <label class="label-file">Banner Image <span class="cst-upper-star">*</span></label>
              <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'banner_image_src')" class="form-control" name="banner_image">
             </div>
             <img id="banner_image_src" src="{{ URL::asset('/uploads').'/'.$banner_image }}" style="width: 100px;" />
          </div>
        </div>

        <!-- Section - 1 -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>SECTION - 1</h5>
             {{textbox($errors,'Heading <span class="cst-upper-star">*</span>','heading1',$heading1)}}
             {{textarea($errors,'Description <span class="cst-upper-star">*</span>','description1',$description1)}}
          </div>
        </div>

        <!-- Section - 2 -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>SECTION - 2</u></h5>
             {{textbox($errors,'Heading <span class="cst-upper-star">*</span>','heading2',$heading2)}}
             {{textarea($errors,'Description <span class="cst-upper-star">*</span>','description2',$description2)}}
          </div>
        </div>

        <!-- Section - 3 -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>SECTION - 3</u></h5>
             {{textbox($errors,'Heading <span class="cst-upper-star">*</span>','heading3',$heading3)}}
             {{textarea($errors,'Description <span class="cst-upper-star">*</span>','description3',$description3)}}
          </div>
        </div>

        <!-- Course/Camp Linking Section -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>COURSE/CAMP LINKING SECTION</u></h5>
             {{textbox($errors,'Title <span class="cst-upper-star">*</span>', 'section4_title', $section4_title)}}
             {{textbox($errors,'Button Title <span class="cst-upper-star">*</span>', 'section4_button_title', $section4_button_title)}}
             {{textbox($errors,'Button Url <span class="cst-upper-star">*</span>', 'section4_button_url', $section4_button_url)}}
          </div>
        </div>

        <!-- PDF -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>UPLOAD PDF</u></h5>
             <div class="form-group">
              <label class="label-file">PDF <span class="cst-upper-star">*</span></label>
              <input type="file" accept="pdf/*" onchange="ValidateSingleInput(this, 'pdf_upload_src')" class="form-control" name="pdf_upload">
             </div>
             <!-- <img id="pdf_upload_src" src="{{ URL::asset('/uploads').'/'.$pdf_upload }}" style="width: 100px;" /> -->

             @php 
                $pdf = getAllValueWithMeta('pdf_upload', 'course-listing');
             @endphp

            @if(!empty($pdf))
              <a target="_blank" href="{{URL::asset('/uploads')}}/{{ getAllValueWithMeta('pdf_upload', 'course-listing') }}" class="btn">View PDF</a>
            @endif

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