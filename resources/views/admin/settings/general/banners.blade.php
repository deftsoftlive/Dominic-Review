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

        <!-- ********************************
        |
        |       Banners MANAGEMENT
        | 
        |************************************ -->

        <!-- Login Banner -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>Login Page - BANNER SECTION</u></h5>

             <div class="form-group">
              <label class="label-file control-label">Banner Image (1349 X 438)<span class="cst-upper-star">*</span></label>
              <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'login_banner_src')" class="form-control" name="login_banner">
             </div>
             <img id="login_banner_src" src="{{ URL::asset('/uploads').'/'.$login_banner }}" style="width: 100px;" />
          </div>
        </div>

        <!-- Reset Password Banner -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>Reset Password Page - BANNER SECTION</u></h5>

             <div class="form-group">
              <label class="label-file control-label">Banner Image (1349 X 438)<span class="cst-upper-star">*</span></label>
              <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'reset_pass_banner_src')" class="form-control" name="reset_pass_banner">
             </div>
             <img id="reset_pass_banner_src" src="{{ URL::asset('/uploads').'/'.$reset_pass_banner }}" style="width: 100px;" />
          </div>
        </div>

        <!-- Shop Banner -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>Shop Page - BANNER SECTION</u></h5>

             <div class="form-group">
              <label class="label-file control-label">Banner Image (1349 X 438)<span class="cst-upper-star">*</span></label>
              <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'shop_banner_src')" class="form-control" name="shop_banner">
             </div>
             <img id="shop_banner_src" src="{{ URL::asset('/uploads').'/'.$shop_banner }}" style="width: 100px;" />
          </div>
        </div>

        <!-- FAQ Banner -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>FAQ Page - BANNER SECTION</u></h5>

             <div class="form-group">
              <label class="label-file control-label">Banner Image (1349 X 438)<span class="cst-upper-star">*</span></label>
              <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'faq_banner_src')" class="form-control" name="faq_banner">
             </div>
             <img id="faq_banner_src" src="{{ URL::asset('/uploads').'/'.$faq_banner }}" style="width: 100px;" />
          </div>
        </div>

        <!-- Checkout Banner -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>Checkout Page - BANNER SECTION</u></h5>

             <div class="form-group">
              <label class="label-file control-label">Banner Image (1349 X 438)<span class="cst-upper-star">*</span></label>
              <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'checkout_banner_src')" class="form-control" name="checkout_banner">
             </div>
             <img id="checkout_banner_src" src="{{ URL::asset('/uploads').'/'.$checkout_banner }}" style="width: 100px;" />
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