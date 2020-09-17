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
            <h5 class="card-title">Camp Go</h5>

             <div class="form-group">
              <label class="label-file control-label">Camp go - Logo (250 X 130) <span class="cst-upper-star">*</span></label>
              <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'camp_go_logo_src')" class="form-control" name="camp_go_logo">
             </div>
             <img id="camp_go_logo_src" src="{{ URL::asset('/uploads').'/'.$camp_go_logo }}" style="width: 100px;" />

             {{ textarea($errors,'Camp Go - Title <span class="cst-upper-star">*</span>','camp_go_title', $camp_go_title) }}
          </div>
        </div>

        <!-- Banner -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">BANNER SECTION</h5>
             {{textbox($errors,'Banner Title <span class="cst-upper-star">*</span>','camp_page_title',$camp_page_title)}}

             <div class="form-group">
              <label class="label-file control-label">Banner Image  (1349 X 438)<span class="cst-upper-star">*</span></label>
              <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'camp_banner_image_src')" class="form-control" name="camp_banner_image">
             </div>
             <img id="camp_banner_image_src" src="{{ URL::asset('/uploads').'/'.$camp_banner_image }}" style="width: 100px;" />
          </div>
        </div>

        <!-- Tabs Section -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">TABS SECTION</h5>
            {{textbox($errors,'Heading <span class="cst-upper-star">*</span>','camp_tab_title',$camp_tab_title)}}
            <br/>

            <!-- ************************************
            |
            |     TAB SECTION - Start Here
            |
            |**************************************** -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="camp_info-tab" data-toggle="tab" href="#camp_info" role="tab" aria-controls="camp_info" aria-selected="false">Camp Info</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="book_a_camp-tab" data-toggle="tab" href="#book_a_camp" role="tab" aria-controls="book_a_camp" aria-selected="false">Book A Camp</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="parent_info-tab" data-toggle="tab" href="#parent_info" role="tab" aria-controls="parent_info" aria-selected="false">Parent Info</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <!-- Tab - 1 -->
                <h5 class="card-title">TAB - 1</h5>

                 <div class="form-group">
                  <label class="label-file control-label">Slider Image - 1 (1110 X 400) <span class="cst-upper-star">*</span></label>
                  <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'camp_tab1_image1_src')" class="form-control" name="camp_tab1_image1">
                 </div>
                 <img id="camp_tab1_image1_src" src="{{ URL::asset('/uploads').'/'.$camp_tab1_image1 }}" style="width: 100px;" />

                 <div class="form-group">
                  <label class="label-file control-label">Slider Image - 2 (1110 X 400) <span class="cst-upper-star">*</span></label>
                  <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'camp_tab1_image2_src')" class="form-control" name="camp_tab1_image2">
                 </div>
                 <img id="camp_tab1_image2_src" src="{{ URL::asset('/uploads').'/'.$camp_tab1_image2 }}" style="width: 100px;" />

                 <div class="form-group">
                  <label class="label-file control-label">Slider Image - 3 (1110 X 400) <span class="cst-upper-star">*</span></label>
                  <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'camp_tab1_image3_src')" class="form-control" name="camp_tab1_image3">
                 </div>
                 <img id="camp_tab1_image3_src" src="{{ URL::asset('/uploads').'/'.$camp_tab1_image3 }}" style="width: 100px;" />

                 {{ textarea($errors,'Description<span class="cst-upper-star">*</span>','camp_tab1_description', $camp_tab1_description) }}

              </div>
              <div class="tab-pane fade" id="camp_info" role="tabpanel" aria-labelledby="camp_info-tab">
                <!-- Tab - 2 -->
                 <h5 class="card-title">TAB - 2</h5>
                 {{textbox($errors,'Tab Title<span class="cst-upper-star">*</span>','camp_tab2_title',$camp_tab2_title)}}

                 <div class="form-group">
                  <label class="label-file control-label">Image (1110 X 400)<span class="cst-upper-star">*</span></label>
                  <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'camp_tab2_image_src')" class="form-control" name="camp_tab2_image">
                 </div>
                 <img id="camp_tab2_image_src" src="{{ URL::asset('/uploads').'/'.$camp_tab2_image }}" style="width: 100px;" />
                 {{ textarea($errors,'Description<span class="cst-upper-star">*</span>','camp_tab2_description', $camp_tab2_description) }}
              </div>
              <div class="tab-pane fade" id="book_a_camp" role="tabpanel" aria-labelledby="book_a_camp-tab">
                <!-- Tab - 3 -->
                 <h5 class="card-title">TAB - 3</h5>

                 <div class="form-group">
                  <label class="label-file control-label">Image (1110 X 400)<span class="cst-upper-star">*</span></label>
                  <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'camp_tab3_image_src')" class="form-control" name="camp_tab3_image">
                 </div>
                 <img id="camp_tab3_image_src" src="{{ URL::asset('/uploads').'/'.$camp_tab3_image }}" style="width: 100px;" />

                 {{ textarea($errors,'Description <span class="cst-upper-star">*</span>','camp_tab3_description', $camp_tab3_description) }}

                 
              </div>
              <div class="tab-pane fade" id="parent_info" role="tabpanel" aria-labelledby="parent_info-tab"><!-- Tab - 4 -->
                 <h5 class="card-title">TAB - 4</h5>
                 {{textbox($errors,'Title<span class="cst-upper-star">*</span>','camp_tab4_title',$camp_tab4_title)}}

                 
             </div>
            </div>
            <!-- ************************************
            |
            |     TAB SECTION - End Here
            |
            |**************************************** -->

          </div>
        </div>

        <!-- Activities Section -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>ACTIVITIES SECTION</u></h5>

             {{textbox($errors,'Main Heading <span class="cst-upper-star">*</span>','act_heading',$act_heading)}}

             {{textarea($errors,'Sub-Title <span class="cst-upper-star">*</span>','act_sub_heading',$act_sub_heading)}}
             <br/>
             
             <h5 class="card-title"><u>Activity - 1</u></h5>
             <div class="form-group">
              <label class="label-file control-label">Image (314 X 352)<span class="cst-upper-star">*</span></label>
              <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'act1_image_src')" class="form-control" name="act1_image">
             </div>
             <img id="act1_image_src" src="{{ URL::asset('/uploads').'/'.$act1_image }}" style="width: 100px;" />
             {{textbox($errors,'Heading <span class="cst-upper-star">*</span>','act1_title',$act1_title)}}
             {{textarea($errors,'Description <span class="cst-upper-star">*</span>','act1_description',$act1_description)}}

             <br/>

             <h5 class="card-title"><u>Activity - 2</u></h5>
             <div class="form-group">
              <label class="label-file control-label">Image (314 X 352)<span class="cst-upper-star">*</span></label>
              <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'act2_image_src')" class="form-control" name="act2_image">
             </div>
             <img id="act2_image_src" src="{{ URL::asset('/uploads').'/'.$act2_image }}" style="width: 100px;" />
             {{textbox($errors,'Heading <span class="cst-upper-star">*</span>','act2_title',$act2_title)}}
             {{textarea($errors,'Description <span class="cst-upper-star">*</span>','act2_description',$act2_description)}}

             <br/>

             <h5 class="card-title"><u>Activity - 3</u></h5>
             <div class="form-group">
              <label class="label-file control-label">Image (314 X 352)<span class="cst-upper-star">*</span></label>
              <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'act3_image_src')" class="form-control" name="act3_image">
             </div>
             <img id="act3_image_src" src="{{ URL::asset('/uploads').'/'.$act3_image }}" style="width: 100px;" />
             {{textbox($errors,'Heading <span class="cst-upper-star">*</span>','act3_title',$act3_title)}}
             {{textarea($errors,'Description <span class="cst-upper-star">*</span>','act3_description',$act3_description)}}

             <br/>

             <h5 class="card-title"><u>Activity - 4</u></h5>
             <div class="form-group">
              <label class="label-file control-label">Image (314 X 352)<span class="cst-upper-star">*</span></label>
              <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'act4_image_src')" class="form-control" name="act4_image">
             </div>
             <img id="act4_image_src" src="{{ URL::asset('/uploads').'/'.$act4_image }}" style="width: 100px;" />
             {{textbox($errors,'Heading <span class="cst-upper-star">*</span>','act4_title',$act4_title)}}
             {{textarea($errors,'Description <span class="cst-upper-star">*</span>','act4_description',$act4_description)}}

             <br/>

             <h5 class="card-title"><u>Activity - 5</u></h5>
             <div class="form-group">
              <label class="label-file control-label">Image (314 X 352)<span class="cst-upper-star">*</span></label>
              <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'act5_image_src')" class="form-control" name="act5_image">
             </div>
             <img id="act2_image_src" src="{{ URL::asset('/uploads').'/'.$act5_image }}" style="width: 100px;" />
             {{textbox($errors,'Heading <span class="cst-upper-star">*</span>','act5_title',$act5_title)}}
             {{textarea($errors,'Description <span class="cst-upper-star">*</span>','act5_description',$act5_description)}}

          </div>
        </div>

        <!-- Section - 2 -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>SECTION - 2</u></h5>
             {{textbox($errors,'Heading <span class="cst-upper-star">*</span>','camp_heading2',$camp_heading2)}}
             {{textarea($errors,'Description <span class="cst-upper-star">*</span>','camp_description2',$camp_description2)}}
          </div>
        </div>

        <!-- Section - 3 -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>SECTION - 3</u></h5>
             {{textbox($errors,'Heading <span class="cst-upper-star">*</span>','camp_heading3',$camp_heading3)}}
             {{textarea($errors,'Description <span class="cst-upper-star">*</span>','camp_description3',$camp_description3)}}

             <div class="form-group">
              <label class="label-file control-label">Image<span class="cst-upper-star">*</span></label>
              <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'camp_image3_src')" class="form-control" name="camp_image3">
             </div>
             <img id="camp_image3_src" src="{{ URL::asset('/uploads').'/'.$camp_image3 }}" style="width: 100px;" />
          </div>
        </div>

        <!-- Section - 4 -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>SECTION - 4</u></h5>
             
             <br/>

             <!-- Section 1 -->
             <div class="form-group">
              <label class="label-file control-label">Image - 1 (250 X 130)<span class="cst-upper-star">*</span></label>
              <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'camp_image4_src')" class="form-control" name="camp_image4">
             </div>
             <img id="camp_image4_src" src="{{ URL::asset('/uploads').'/'.$camp_image4 }}" style="width: 100px;" />

             {{textbox($errors,'Link Title - 1 <span class="cst-upper-star">*</span>','camp_link_title4',$camp_link_title4)}}
             {{textbox($errors,'Link - 1 <span class="cst-upper-star">*</span>','camp_link4',$camp_link4)}}
             <br/>

             <!-- Section 2 -->
             <div class="form-group">
              <label class="label-file control-label">Image - 2 (250 X 130)<span class="cst-upper-star">*</span></label>
              <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'camp_image4_src')" class="form-control" name="camp_image4">
             </div>
             <img id="camp_image4_src" src="{{ URL::asset('/uploads').'/'.$camp_image4 }}" style="width: 100px;" />

             {{textbox($errors,'Link Title - 2 <span class="cst-upper-star">*</span>','camp_link_title4',$camp_link_title4)}}
             {{textbox($errors,'Link - 2<span class="cst-upper-star">*</span>','camp_link4',$camp_link4)}}

          </div>
        </div>

        <!-- Section - 5 -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>SECTION - 5</u></h5>
             {{textbox($errors,'Heading <span class="cst-upper-star">*</span>','camp_heading5',$camp_heading5)}}
             {{textarea($errors,'Description <span class="cst-upper-star">*</span>','camp_description5',$camp_description5)}}
          </div>
        </div>

        <!-- Course/Camp Linking Section -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>COURSE/CAMP LINKING SECTION</u></h5>
             {{textbox($errors,'Title <span class="cst-upper-star">*</span>', 'camp_title', $camp_title)}}
             {{textbox($errors,'Button Title <span class="cst-upper-star">*</span>', 'camp_button_title', $camp_button_title)}}
             {{textbox($errors,'Button Url <span class="cst-upper-star">*</span>', 'camp_button_url', $camp_button_url)}}
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
<script src="{{ asset('js/cke_config.js') }}"></script>

<script type="text/javascript">
   CKEDITOR.replace('camp_tab1_description', options);
   CKEDITOR.replace('camp_tab2_description', options);
   CKEDITOR.replace('camp_tab3_description', options);
</script>
<script type="text/javascript">
  CKEDITOR.replace('camp_go_title', options);
</script>
@endsection