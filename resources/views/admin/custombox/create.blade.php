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

             <label class="control-label">Type<span class="cst-upper-star">*</span></label>
              <select class="select-player" name="type">
                <option value="camp-home">Camp - Home</option>
                <option value="camp-book">Camp - Book a camp</option>
                <option value="camp-parent-info">Camp - Parent info</option>
                <option value="tennis-landing-home">Tennis Coaching - Home</option>
                <option value="tennis-landing-club-info">Tennis Coaching - Club Info</option>
                <option value="tennis-landing-parent-info">Tennis Coaching - Parent info</option>
                <option value="school-landing-home">School Coaching - Home</option>
                <option value="school-landing-club-info">School Coaching - Club Info</option>
                <option value="school-landing-parent-info">School Coaching - Parent info</option>
                <option value="football-landing-home">Football Coaching - Home</option>
                <option value="football-landing-club-info">Football Coaching - Club Info</option>
                <option value="football-landing-parent-info">Football Coaching - Parent info</option>
                <option value="tennis-pro">DRH Tennis Pro</option>
              </select><br/>

                    <label class="control-label">Position<span class="cst-upper-star">*</span></label>
                    <select class="select-player" name="position">
                      <option value="0">Left-Text | Right-Image</option>
                      <option value="1">Left-Image | Right-Text</option>
                    </select><br/>
                  
                   {{textbox($errors,'Title*','title')}}
                   {{textarea($errors,'Description*','description')}}
                   {{textarea($errors,'More Text*','more_text')}}

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
<script src="{{ asset('js/cke_config.js') }}"></script>
<script type="text/javascript">
   CKEDITOR.replace('description', options);
   CKEDITOR.replace('more_text', options);
</script>
@endsection
