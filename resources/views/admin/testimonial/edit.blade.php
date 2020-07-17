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
                        <option value="home-page" {{ $venue->page_title == 'home-page' ?  'selected' : '' }}>Home Page</option>
                        <option value="course-listing" {{ $venue->page_title == 'course-listing' ?  'selected' : '' }}>Courses Page</option>
                        <option value="course-listing/football" {{ $venue->page_title == 'course-listing/football' ?  'selected' : '' }}>Football Courses Page</option>
                        <option value="course-listing/tennis" {{ $venue->page_title == 'course-listing/tennis' ?  'selected' : '' }}>Tennis Courses Page</option>
                        <option value="course-listing/school" {{ $venue->page_title == 'course-listing/school' ?  'selected' : '' }}>School Courses Page</option>
                        <option value="camp-listing" {{ $venue->page_title == 'camp-listing' ?  'selected' : '' }}>Camp Page</option>
                        <option value="camp-detail" {{ $venue->page_title == 'camp-detail' ?  'selected' : '' }}>Camp Detail</option>
                        <option value="football-landing" {{ $venue->page_title == 'football-landing' ?  'selected' : '' }}>Football Coaching</option>
                        <option value="tennis-landing" {{ $venue->page_title == 'tennis-landing' ?  'selected' : '' }}>Tennis Coaching</option>
                        <option value="school-landing" {{ $venue->page_title == 'school-landing' ?  'selected' : '' }}>School Clubs</option>
                        <option value="badges" {{ $venue->page_title == 'badges' ?  'selected' : '' }}>Badges Page</option>
                    </select><br/>
                  
                   {{textbox($errors,'Title<span class="cst-upper-star">*</span>','title', $venue->title)}}
                   {{textarea($errors,'Description<span class="cst-upper-star">*</span>','description', $venue->description)}}

                  <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" id="selImage" accept="image/*" onchange="ValidateSingleInput(this, 'image_src')">
                    @if ($errors->has('image'))
                        <div class="error">{{ $errors->first('image') }}</div>
                    @endif
                  </div>

                  @if($venue->image)
                    <img id="image_src" style="width: 100px; height: 100px;" src="{{ URL::asset('/uploads').'/'.$venue->image }}" />
                  @else
                    <img id="image_src" style="width: 100px; height: 100px;" src="{{ URL::asset('/images').'/default.jpg' }}" />
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
<!-- <script type="text/javascript">
  $(document).ready(function(){
   // Add Department Form
  $('#venueForm').validate({
    onfocusout: function (valueToBeTested) {
      $(valueToBeTested).valid();
    },
  
    highlight: function(element) {
      $('element').removeClass("error");
    },
  
    rules: {
      "title": { 
          required: true,          
      },
      "description": { 
          required: true,          
      },
      valueToBeTested: {
          required: true,
      }
    },
    });   
  
    // Add Department Submitting Form 
    $('#btnVanue').click(function()
    {
      if($('#venueForm').valid())
      {
        $('#btnVanue').prop('disabled', true);
        $('#venueForm').submit();
      } else {
        return false;
      }
    });
    
});

</script> -->
@endsection