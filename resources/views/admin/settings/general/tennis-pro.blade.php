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
             {{textbox($errors,'Banner Title <span class="cst-upper-star">*</span>','tennis_pro_page_title',$tennis_pro_page_title)}}

             <div class="form-group">
              <label class="label-file control-label">Banner Image  (1349 X 438)<span class="cst-upper-star">*</span></label>
              <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'tennis_pro_banner_image_src')" class="form-control" name="tennis_pro_banner_image">
             </div>
             <img id="tennis_pro_banner_image_src" src="{{ URL::asset('/uploads').'/'.$tennis_pro_banner_image }}" style="width: 100px;" />
          </div>
        </div>

        <!-- Section - 1 -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">SECTION - 1</h5>
             {{textarea($errors,'Description Content <span class="cst-upper-star">*</span>','tennis_pro_sec1_desc',$tennis_pro_sec1_desc)}}

             <div class="form-group">
              <label class="label-file control-label">Image 1<span class="cst-upper-star">*</span></label>
              <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'tennis_pro_sec1_img1_src')" class="form-control" name="tennis_pro_sec1_img1">
             </div>
             <img id="tennis_pro_sec1_img1_src" src="{{ URL::asset('/uploads').'/'.$tennis_pro_sec1_img1 }}" style="width: 100px;" />

             <div class="form-group">
              <label class="label-file control-label">Image - Upload PDF (200 X 150)<span class="cst-upper-star">*</span></label>
              <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'tennis_pro_sec1_img1_link_src')" class="form-control" name="tennis_pro_sec1_img1_link">
             </div>
             <a target="_blank" href="{{ URL::asset('/uploads').'/'.$tennis_pro_sec1_img1_link }}"/>View Uploaded PDF</a>

             <div class="form-group">
             </div>
             <!-- {{textbox($errors,'Image 1 - Link <span class="cst-upper-star">*</span>','tennis_pro_sec1_img1_link',$tennis_pro_sec1_img1_link)}} -->

             {{textbox($errors,'Button 1 - Text <span class="cst-upper-star">*</span>','tennis_pro_sec1_btn',$tennis_pro_sec1_btn)}}
             {{textbox($errors,'Button 1 - Link <span class="cst-upper-star">*</span>','tennis_pro_sec1_link',$tennis_pro_sec1_link)}}

             <div class="form-group">
              <label class="label-file control-label">Image 2<span class="cst-upper-star">*</span></label>
              <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'tennis_pro_sec1_img2_src')" class="form-control" name="tennis_pro_sec1_img2">
             </div>
             <img id="tennis_pro_sec1_img2_src" src="{{ URL::asset('/uploads').'/'.$tennis_pro_sec1_img2 }}" style="width: 100px;" />
             <br/>

             {{textbox($errors,'Image 2 - Link <span class="cst-upper-star">*</span>','tennis_pro_sec1_img2_link',$tennis_pro_sec1_img2_link)}}
           </div>
         </div>

        <!-- Images Section -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">IMAGES SECTION</h5>

             <div class="form-group">
              <label class="label-file control-label">Image 1 (200 X 150)<span class="cst-upper-star">*</span></label>
              <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'tennis_pro_img1_src')" class="form-control" name="tennis_pro_img1">
             </div>
             <img id="tennis_pro_img1_src" src="{{ URL::asset('/uploads').'/'.$tennis_pro_img1 }}" style="width: 100px;" />

             <div class="form-group">
              <label class="label-file control-label">Image 2 (200 X 150)<span class="cst-upper-star">*</span></label>
              <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'tennis_pro_img2_src')" class="form-control" name="tennis_pro_img2">
             </div>
             <img id="tennis_pro_img2_src" src="{{ URL::asset('/uploads').'/'.$tennis_pro_img2 }}" style="width: 100px;" />
          </div>
        </div>

        <!-- How it works -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">HOW IT WORKS - SECTION</h5>
             {{textbox($errors,'Title <span class="cst-upper-star">*</span>','tennis_pro_htw_title',$tennis_pro_htw_title)}}
             {{textarea($errors,'Description <span class="cst-upper-star">*</span>','tennis_pro_htw_desc',$tennis_pro_htw_desc)}}
          </div>
        </div>

        <!-- Last Section -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">LAST SECTION</h5>
             {{textarea($errors,'Description Content <span class="cst-upper-star">*</span>','ten_pro_lastsec_text',$ten_pro_lastsec_text)}}
             {{textbox($errors,'Button 1 - Text <span class="cst-upper-star">*</span>','ten_pro_lastsec_btn1_text',$ten_pro_lastsec_btn1_text)}}
             {{textbox($errors,'Button 1 - Link <span class="cst-upper-star">*</span>','ten_pro_lastsec_btn1_link',$ten_pro_lastsec_btn1_link)}}
             {{textbox($errors,'Button 2 - Text <span class="cst-upper-star">*</span>','ten_pro_lastsec_btn2_text',$ten_pro_lastsec_btn2_text)}}
             {{textbox($errors,'Button 2 - Link <span class="cst-upper-star">*</span>','ten_pro_lastsec_btn2_link',$ten_pro_lastsec_btn2_link)}}
           </div>
         </div>

        <!-- Course/Camp Linking Section -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>COURSE/CAMP LINKING SECTION</u></h5>
             {{textbox($errors,'Title <span class="cst-upper-star">*</span>', 'tennis_pro_sec_title', $tennis_pro_sec_title)}}
             {{textbox($errors,'Button Title <span class="cst-upper-star">*</span>', 'tennis_pro_sec_button_title', $tennis_pro_sec_button_title)}}
             {{textbox($errors,'Button Url <span class="cst-upper-star">*</span>', 'tennis_pro_sec_button_url', $tennis_pro_sec_button_url)}}
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
   CKEDITOR.replace('tennis_pro_sec1_desc', options);
   CKEDITOR.replace('tennis_pro_htw_desc', options);
</script>
@endsection