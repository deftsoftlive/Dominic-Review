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
                    <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item "><a href="{{ route($addLink) }}">View</a></li>
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

  <form role="form" method="post" id="venueForm" enctype="multipart/form-data">
                
                   @csrf

                   <label class="control-label">Page Title<span class="cst-upper-star">*</span></label>
                    <select class="select-player" name="page_title">
                      <option value="home-page">Home Page</option>
                          <option value="course-listing">Courses Page</option>
                          <option value="course-listing/football">Football Courses Page</option>
                          <option value="course-listing/tennis">Tennis Courses Page</option>
                          <option value="course-listing/school">School Courses Page</option>
                          <option value="camp-listing">Camp Page</option>
                          <option value="camp-detail">Camp Detail</option>
                          <option value="football-landing">Football Coaching</option>
                          <option value="tennis-landing">Tennis Coaching</option>
                          <option value="school-landing">School Clubs</option>
                          <option value="badges">Badges Page</option>
                    </select><br/>
                  
                   {{textbox($errors,'Title*','title')}}
                   {{textarea($errors,'Description*','description')}}

                  <div class="form-group">
                    <label>Image</label>
                    <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'image_src')" name="image" id="selImage">
                    @if ($errors->has('image'))
                        <div class="error">{{ $errors->first('image') }}</div>
                    @endif
                  </div>
                  <img src="" id="image_src" style="width: 100px; height: 100px; display: none"/>
                  
                

                <div class="card-footer pl-0">
                  <button type="submit" id="btnVanue" class="btn btn-primary">Submit</button>
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
<script src="{{url('/admin-assets/js/validations/valueValidation.js')}}"></script>
<script src="{{url('/js/validations/imageShow.js')}}"></script>
<!-- <script type="text/javascript">
  $('#selImage').on('change', function (){
    $(this).parent().find('label').css('display', 'none');
  });
</script> -->
@endsection
