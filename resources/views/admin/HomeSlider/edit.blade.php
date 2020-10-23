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

                <label class="control-label">Title Color<span class="cst-upper-star">*</span></label>
                <select class="form-control" name="title_color">
                      <option value="#ffffff" {{ $venue->title_color == '#ffffff' ?  'selected' : '' }}>White</option>
                      <option value="#000000" {{ $venue->title_color == '#000000' ?  'selected' : '' }}>Black</option>
                      <option value="#001642" {{ $venue->title_color == '#be298d' ?  'selected' : '' }}>Blue</option>
                      <option value="#00afef" {{ $venue->title_color == '#00afef' ?  'selected' : '' }}>Sky Blue</option>
                      <option value="#bea029" {{ $venue->title_color == '#bea029' ?  'selected' : '' }}>Yellow</option>
                </select><br/>

               {{textbox($errors,'Heading<span class="cst-upper-star">*</span>','heading', $venue->heading)}}

                <label class="control-label">Heading Color<span class="cst-upper-star">*</span></label>
                <select class="form-control" name="heading_color">
                      <option value="#ffffff" {{ $venue->heading_color == '#ffffff' ?  'selected' : '' }}>White</option>
                      <option value="#000000" {{ $venue->heading_color == '#000000' ?  'selected' : '' }}>Black</option>
                      <option value="#001642" {{ $venue->heading_color == '#be298d' ?  'selected' : '' }}>Blue</option>
                      <option value="#00afef" {{ $venue->heading_color == '#00afef' ?  'selected' : '' }}>Sky Blue</option>
                      <option value="#bea029" {{ $venue->heading_color == '#bea029' ?  'selected' : '' }}>Yellow</option>
                </select><br/>

               {{textbox($errors,'Subheading<span class="cst-upper-star">*</span>','subheading', $venue->subheading)}}

                <label class="control-label">Sub-Heading Color<span class="cst-upper-star">*</span></label>
                <select class="form-control" name="sub_heading_color">
                      <option value="#ffffff" {{ $venue->sub_heading_color == '#ffffff' ?  'selected' : '' }}>White</option>
                      <option value="#000000" {{ $venue->sub_heading_color == '#000000' ?  'selected' : '' }}>Black</option>
                      <option value="#001642" {{ $venue->sub_heading_color == '#be298d' ?  'selected' : '' }}>Blue</option>
                      <option value="#00afef" {{ $venue->sub_heading_color == '#00afef' ?  'selected' : '' }}>Sky Blue</option>
                      <option value="#bea029" {{ $venue->sub_heading_color == '#bea029' ?  'selected' : '' }}>Yellow</option>
                </select><br/>

               {{textarea($errors,'Description<span class="cst-upper-star">*</span>','description', $venue->description)}}

                <label class="control-label">Description Color<span class="cst-upper-star">*</span></label>
                <select class="form-control" name="description_color">
                      <option value="#ffffff" {{ $venue->description_color == '#ffffff' ?  'selected' : '' }}>White</option>
                      <option value="#000000" {{ $venue->description_color == '#000000' ?  'selected' : '' }}>Black</option>
                      <option value="#001642" {{ $venue->description_color == '#be298d' ?  'selected' : '' }}>Blue</option>
                      <option value="#00afef" {{ $venue->description_color == '#00afef' ?  'selected' : '' }}>Sky Blue</option>
                      <option value="#bea029" {{ $venue->description_color == '#bea029' ?  'selected' : '' }}>Yellow</option>
                </select><br/>

               {{textbox($errors,'Button Text<span class="cst-upper-star">*</span>','button_text', $venue->button_text)}}
               {{textbox($errors,'Button Link<span class="cst-upper-star">*</span>','button_link', $venue->button_link)}}

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