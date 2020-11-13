@extends('layouts.admin')
 
@section('content')
 <div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">General Settings</h5>
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

        <!-- ********************************
        |
        |       COURSES PAGE MANAGEMENT
        | 
        |************************************ -->

        <!-- Admin Email -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>Admin Email</u></h5>
             {{textbox($errors,'Admin Email <span class="cst-upper-star">*</span>','admin_email',$admin_email)}}
          </div>
        </div>

        <!-- Website Logo -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>WEBSITE LOGO</u></h5>
               <div class="form-group">
                <label class="label-file">Image <span class="cst-upper-star">*</span></label>
                <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'website_logo_src')" class="form-control" name="website_logo">
               </div>
               <img id="website_logo_src" src="{{ URL::asset('/uploads').'/'.$website_logo }}" style="width: 100px;" />
          </div>
        </div>

        <!-- Headline - At the top of the website -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>HEADLINE - At the top of the website </u></h5>
               {{textarea($errors,'Headline <span class="cst-upper-star">*</span>','website_headline',$website_headline)}}


            <h5 class="card-title"><u>Enable/Disable Heading </u></h5>
               <select class="form-control" name="enable_heading">
                  <option @if($enable_heading == 'Enable') selected @endif name="Enable">Enable</option>
                  <option @if($enable_heading == 'Disable') selected @endif name="Disable">Disable</option>
               </select>
          </div>
        </div>


        <!-- Social Links -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>SOCIAL LINKS</u></h5>
             {{textbox($errors,'Facebook Link <span class="cst-upper-star">*</span>','facebook_link',$facebook_link)}}
             {{textbox($errors,'Instagram Link <span class="cst-upper-star">*</span>','instagram_link',$instagram_link)}}
             {{textbox($errors,'Google Link <span class="cst-upper-star">*</span>','google_link',$google_link)}}
          </div>
        </div>

        <!-- Email -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>EMAIL</u></h5>
             {{textbox($errors,'Email <span class="cst-upper-star">*</span>','website_email',$website_email)}}
          </div>
        </div>

        <!-- Phone Number -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>PHONE NUMBER</u></h5>
             {{textbox($errors,'Phone Number <span class="cst-upper-star">*</span>','website_phone_number',$website_phone_number)}}
          </div>
        </div>

        <!-- Footer Section -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>FOOTER SECTION</u></h5>
             {{textbox($errors,'Section - 1 <span class="cst-upper-star">*</span>','footer_section1',$footer_section1)}}
             {{textbox($errors,'Newsletter Content <span class="cst-upper-star">*</span>','newsletter_content',$newsletter_content)}}
          </div>
        </div>

        <!-- Copyright Section -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>COPYRIGHT SECTION</u></h5>
             {{textbox($errors,'Copyright Text <span class="cst-upper-star">*</span>','copyright_section',$copyright_section)}}
          </div>
        </div>

        <!-- Google Analytics -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>GOOGLE ANALYTICS</u></h5>
             {{textarea($errors,'Google Analytics Code <span class="cst-upper-star">*</span>','google_analytics',$google_analytics)}}
          </div>
        </div>

        <!-- Google Analytics -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>NOTIFICATION TEXT</u></h5>
             {{textarea($errors,'Notification Content <span class="cst-upper-star">*</span>','notification_content',$notification_content)}}
          </div>
        </div>

        <!-- Mailchimp Api Key -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>Mailchimp API Key</u></h5>
            {{textbox($errors,'Mailchimp API Key','mailchimp_api_key',$mailchimp_api_key)}}
          </div>
        </div>

        <!-- Thanku page text - Childcare -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>Thanku Page Text - For Childcare Vouchers</u></h5>
            {{textarea($errors,'Instructions Text','thanku_page_text',$thanku_page_text)}}
          </div>
        </div>

        <!-- Wallet text -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>Wallet Text</u></h5>
            {{textarea($errors,'Wallet Text','wallet_text',$wallet_text)}}
          </div>
        </div>

        <!-- Match Stats text -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>Match Stats Text</u></h5>
            {{textarea($errors,'Match Stats Text','match_stats_text',$match_stats_text)}}
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
  CKEDITOR.replace('thanku_page_text', options);
</script>
@endsection