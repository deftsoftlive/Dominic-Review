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
                  
                   {{textbox($errors,'Title*','title')}}
                   {{textarea($errors,'Description*','description')}}
                   <!-- {{textarea($errors,'Description - More Text*','description_more')}} -->

                  <div class="form-group">
                    <label class="control-label">Image</label>
                    <input type="file" required accept="image/*" onchange="ValidateSingleInput(this, 'image_src')" name="image" id="selImage">
                    @if ($errors->has('image'))
                        <div class="error">{{ $errors->first('image') }}</div>
                    @endif
                  </div>
                  <img src="" id="image_src" style="width: 100px; height: 100px; display: none"/>

                  <!-- Slider-Images - Start Here-->
                  <div class="form-group">
                    <label class="control-label">Slider Image - 1</label>
                    <input type="file" required accept="image/*" onchange="ValidateSingleInput(this, 'slider_image1_src')" name="slider_image1" id="selImage">
                    @if ($errors->has('slider_image1'))
                        <div class="error">{{ $errors->first('slider_image1') }}</div>
                    @endif
                  </div>
                  <img src="" id="slider_image1_src" style="width: 100px; height: 100px; display: none"/>

                  <div class="form-group">
                    <label class="control-label">Slider Image - 2</label>
                    <input type="file" required accept="image/*" onchange="ValidateSingleInput(this, 'slider_image2_src')" name="slider_image2" id="selImage">
                    @if ($errors->has('slider_image2'))
                        <div class="error">{{ $errors->first('slider_image2') }}</div>
                    @endif
                  </div>
                  <img src="" id="slider_image2_src" style="width: 100px; height: 100px; display: none"/>

                  <div class="form-group">
                    <label class="control-label">Slider Image - 3</label>
                    <input type="file" required accept="image/*" onchange="ValidateSingleInput(this, 'slider_image3_src')" name="slider_image3" id="selImage">
                    @if ($errors->has('slider_image3'))
                        <div class="error">{{ $errors->first('slider_image3') }}</div>
                    @endif
                  </div>
                  <img src="" id="slider_image3_src" style="width: 100px; height: 100px; display: none"/>

                  <div class="form-group">
                    <label class="control-label">Slider Image - 4</label>
                    <input type="file" required accept="image/*" onchange="ValidateSingleInput(this, 'slider_image4_src')" name="slider_image4" id="selImage">
                    @if ($errors->has('slider_image4'))
                        <div class="error">{{ $errors->first('slider_image4') }}</div>
                    @endif
                  </div>
                  <img src="" id="slider_image4_src" style="width: 100px; height: 100px; display: none"/>
                  <!-- Slider-Images - End Here-->

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

<script src="{{ asset('js/cke_config.js') }}"></script>
<script type="text/javascript">
   CKEDITOR.replace('description', options);
   CKEDITOR.replace('venue_info', options);
   CKEDITOR.replace('camp_go', options);
   CKEDITOR.replace('day_camp_info', options);
   CKEDITOR.replace('day_camp_sports', options);
   CKEDITOR.replace('times_costs', options);
   CKEDITOR.replace('child_need', options);
   CKEDITOR.replace('reviews', options);
   CKEDITOR.replace('location', options);
</script>
@endsection
