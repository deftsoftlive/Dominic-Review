@extends('layouts.admin')
 
@section('content')
 <div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">{{$name}}</h5>
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
                   
                   {{textbox($errors,'Name<span class="cst-upper-star">*</span>','name', $venue->name)}}
                   {{textarea($errors,'Description<span class="cst-upper-star">*</span>','description', $venue->description)}}

                  <div class="form-group">
                    <label class="control-label">Image</label>
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
                
                <!--   <div class="form-group">
                    <label class="control-label">End Date</label>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                    <input type="date" id="txtDate" name="end_date" value="{{$venue->end_date}}" class="form-control" required>
                  </div> -->

                  {{textbox($errors,'Points<span class="cst-upper-star">*</span>','points',$venue->points)}}

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
<script>
$(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var minDate= year + '-' + month + '-' + day;
    
    $('#txtDate').attr('min', minDate);
});
</script>
@endsection