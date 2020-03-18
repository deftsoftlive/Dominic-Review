@extends('layouts.admin')
 
@section('content')
 <div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Contact Us</h5>
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
        |       COURSES PAGE MANAGEMENT
        | 
        |************************************ -->

        <!-- Banner -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>BANNER SECTION</u></h5>
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
            <h5 class="card-title"><u>SECTION - 1</u></h5>
             {{textbox($errors,'Heading <span class="cst-upper-star">*</span>','heading1',$heading1)}}
             {{textarea($errors,'Description <span class="cst-upper-star">*</span>','description1',$description1)}}
          </div>
        </div>

        <!-- Section - 2 -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>SECTION - 2</u></h5>
             {{textbox($errors,'Heading <span class="cst-upper-star">*</span>','heading2',$heading2)}}
             {{textbox($errors,'Phone Number <span class="cst-upper-star">*</span>','phone_number',$phone_number)}}
             {{textbox($errors,'Email <span class="cst-upper-star">*</span>','email',$email)}}
          </div>
        </div>

        <!-- Section - 3 -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>SECTION - 3</u></h5>
             {{textbox($errors,'Heading <span class="cst-upper-star">*</span>','heading3',$heading3)}}
             {{textbox($errors,'Facebook Link <span class="cst-upper-star">*</span>','facebook',$facebook)}}
             {{textbox($errors,'Instagram Link <span class="cst-upper-star">*</span>','instagram',$instagram)}}
             {{textbox($errors,'Google Link <span class="cst-upper-star">*</span>','google',$google)}}
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