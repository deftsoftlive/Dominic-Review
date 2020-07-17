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

        <!-- Logo -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">LOGO SECTION</h5>

             <div class="form-group">
              <label class="label-file control-label">Camp go Logo<span class="cst-upper-star">*</span></label>
              <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'camp_detail_logo_src')" class="form-control" name="camp_detail_logo">
             </div>
             <img id="camp_detail_logo_src" src="{{ URL::asset('/uploads').'/'.$camp_detail_logo }}" style="width: 100px;" />
          </div>
        </div>
        
        <!-- Banner -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">BANNER SECTION</h5>
             {{textbox($errors,'Banner Title <span class="cst-upper-star">*</span>','camp_detail_title',$camp_detail_title)}}

             <div class="form-group">
              <label class="label-file control-label">Banner Image  (1920 X 350)<span class="cst-upper-star">*</span></label>
              <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'camp_detail_banner_image_src')" class="form-control" name="camp_detail_banner_image">
             </div>
             <img id="camp_detail_banner_image_src" src="{{ URL::asset('/uploads').'/'.$camp_detail_banner_image }}" style="width: 100px;" />
          </div>
        </div>

        <!-- Course/Camp Linking Section -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>COURSE/CAMP LINKING SECTION</u></h5>
             {{textbox($errors,'Title <span class="cst-upper-star">*</span>', 'camp_detail_title', $camp_detail_title)}}
             {{textbox($errors,'Button Title <span class="cst-upper-star">*</span>', 'camp_detail_button_title', $camp_detail_button_title)}}
             {{textbox($errors,'Button Url <span class="cst-upper-star">*</span>', 'camp_detail_button_url', $camp_detail_button_url)}}
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