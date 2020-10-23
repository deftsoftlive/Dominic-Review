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
                  
                   {{textbox($errors,'Title<span class="cst-upper-star">*</span>','title', $venue->title)}}
                   {{textarea($errors,'Description<span class="cst-upper-star">*</span>','description', $venue->description)}}

                   <div class="form-group">
                    <label class="label-file control-label">Linked Course</label>
                    <select name="linked_course_cat" class="select-player">
                      <option value="156" {{$venue->linked_course_cat == '156' ? 'selected' : ''}}>Tennis</option>
                      <option value="158" {{$venue->linked_course_cat == '158' ? 'selected' : ''}}>School</option>
                    </select>
                  </div>


                  <div class="form-group">
                    <label class="control-label">Image</label>
                    <input type="file" name="image" id="selImage" accept="image/*" onchange="ValidateSingleInput(this, 'image_src')">
                    @if ($errors->has('image'))
                        <div class="error">{{ $errors->first('image') }}</div>
                    @endif
                  </div>

                  @if(!empty($venue->image))
                    <img id="image_src" style="width: 100px; height: 100px;" src="{{ URL::asset('/uploads').'/'.$venue->image }}" />
                  @endif


                  <div class="form-group"><br/>
                    <label class="control-label">Image for school listing page (If you didn't select school category then you can skip this section)</label><br/>
                    <input type="file" name="school_image" id="selImage" accept="image/*" onchange="ValidateSingleInput(this, 'school_image_src')">
                    @if ($errors->has('school_image'))
                        <div class="error">{{ $errors->first('school_image') }}</div>
                    @endif
                  </div>

                  @if(!empty($venue->school_image))
                    <img id="school_image_src" style="width: 100px; height: 100px;" src="{{ URL::asset('/uploads').'/'.$venue->school_image }}" />
                  @endif


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