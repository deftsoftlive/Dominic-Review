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
        |   REPORT MANAGEMENT
        | 
        |************************************ -->

        <!-- Section - 1 -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>REPORT - 1</u></h5>
             {{textarea($errors,'Report 1 Content <span class="cst-upper-star">*</span>','report1_content',$report1_content)}}
          </div>
        </div>

        <!-- Section - 2 -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>REPORT - 2</u></h5>
             {{textarea($errors,'Report 2 Content <span class="cst-upper-star">*</span>','report2_content',$report2_content)}}
          </div>
        </div>

        <!-- Report Detail -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><u>REPORT DETAIL</u></h5>
             {{textarea($errors,'Report Detail Page - Content <span class="cst-upper-star">*</span>','report_detail',$report_detail)}}
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
   CKEDITOR.replace('report1_content', options);
   CKEDITOR.replace('report2_content', options);
   CKEDITOR.replace('report_detail', options);
</script>
@endsection