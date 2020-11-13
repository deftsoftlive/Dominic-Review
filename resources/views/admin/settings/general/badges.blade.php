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
             {{textbox($errors,'Banner Title <span class="cst-upper-star">*</span>','badges_heading',$badges_heading)}}

             <div class="form-group">
              <label class="label-file control-label">Banner Image  (1349 X 438)<span class="cst-upper-star">*</span></label>
              <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'badges_banner_img_src')" class="form-control" name="badges_banner_img">
             </div>
             <img id="badges_banner_img_src" src="{{ URL::asset('/uploads').'/'.$badges_banner_img }}" style="width: 100px;" />
          </div>
        </div>

        <!-- Badges Section - Description -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>MY BADGES</u></h5>
             {{textarea($errors,'Description <span class="cst-upper-star">*</span>', 'badges_desc', $badges_desc)}}
          </div>
        </div>

        <!-- Goals Section - Description -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>SET GOALS</u></h5>
             {{textarea($errors,'Description <span class="cst-upper-star">*</span>', 'goals_desc', $goals_desc)}}
          </div>
        </div>

        <!-- Stats Description Section -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>Stats</u></h5>
             {{textarea($errors,'Description <span class="cst-upper-star">*</span>', 'stats_desc', $stats_desc)}}
          </div>
        </div>

        <!-- Basic details of set goals section -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>BASIC DETAILS</u></h5>
             {{textbox($errors,'Specific - Title <span class="cst-upper-star">*</span>', 'specific_title', $specific_title)}}
             {{textarea($errors,'Specific - Short Description <span class="cst-upper-star">*</span>', 'specific_desc', $specific_desc)}}

             {{textbox($errors,'Measurable - Title <span class="cst-upper-star">*</span>', 'measurable_title', $measurable_title)}}
             {{textarea($errors,'Measurable - Short Description <span class="cst-upper-star">*</span>', 'measurable_desc', $measurable_desc)}}

             {{textbox($errors,'Achievable - Title <span class="cst-upper-star">*</span>', 'achievable_title', $achievable_title)}}
             {{textarea($errors,'Achievable - Short Description <span class="cst-upper-star">*</span>', 'achievable_desc', $achievable_desc)}}

             {{textbox($errors,'Realistic - Title <span class="cst-upper-star">*</span>', 'realistic_title', $realistic_title)}}
             {{textarea($errors,'Realistic - Short Description <span class="cst-upper-star">*</span>', 'realistic_desc', $realistic_desc)}}

             {{textbox($errors,'Timed - Title <span class="cst-upper-star">*</span>', 'timed_title', $timed_title)}}
             {{textarea($errors,'Timed - Short Description <span class="cst-upper-star">*</span>', 'timed_desc', $timed_desc)}}

             {{textarea($errors,'Confirmation Message <span class="cst-upper-star">*</span>', 'confirmation_msg', $confirmation_msg)}}
             {{textbox($errors,'Goals - Date <span class="cst-upper-star">*</span>', 'goals_date', $goals_date)}}

          </div>
        </div>

        <!-- Course/Camp Linking Section -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>COURSE/CAMP LINKING SECTION</u></h5>
             {{textbox($errors,'Title <span class="cst-upper-star">*</span>', 'badges_sec_title', $badges_sec_title)}}
             {{textbox($errors,'Button Title <span class="cst-upper-star">*</span>', 'badges_sec_button_title', $badges_sec_button_title)}}
             {{textbox($errors,'Button Url <span class="cst-upper-star">*</span>', 'badges_sec_button_url', $badges_sec_button_url)}}
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