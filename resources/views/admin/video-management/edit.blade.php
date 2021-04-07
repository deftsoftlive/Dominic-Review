@extends('layouts.admin')
 
@section('content')
 <div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                    
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

            <form role="form" method="post" id="videoForm" enctype="multipart/form-data" action="{{route('admin.update.video', $video->id)}}">             
              @csrf
                
               {{textbox($errors,'Title<span class="cst-upper-star">*</span>','title', $video->title)}}

               {{textarea($errors,'Video Iframe<span class="cst-upper-star">*</span>','url',$video->url)}}
               
               {{textareackeditor($errors,'Description<span class="cst-upper-star"></span>','description',$video->description)}}

              @php 
              $video_cate = explode(',',$video->video_category);
              @endphp 
              <label class="control-label">Video Category<span class="cst-upper-star"></span></label>
              <select class="form-control" id="video_category" name="category[]" multiple>
                <option hidden value=''>Select Category</option>
                 @foreach($categories as $category)
                    @php
                    if(in_array($category->id,$video_cate)){
                      $selectedDefault  = 'selected';
                    }else{
                        $selectedDefault  = '';
                    }
                    @endphp

                    <option {{$selectedDefault}} value="{{$category->id}}">{{$category->name}}</option>
                   <!--  <option value="{{$category->id}}" @if($video->video_category == $category->id) @php echo 'selected'; @endphp @endif>{{$category->name}}</option> -->
                  @endforeach
              </select></br> </br>

              <label class="control-label">Assign Video<span class="cst-upper-star"></span></label>
              <select class="form-control" id="select_user" name="users" onchange="activateUsers(this.value)">
                <option hidden value="">Select</option>
                <option value="all" @if($video->users == 'all') @php echo "selected" @endphp @endif>All Users</option>
                <option value="users" @if($video->users == 'users') @php echo "selected" @endphp @endif>Individual User</option>
                <option value="seasons" @if($video->users == 'seasons') @php echo "selected" @endphp @endif>Seasons</option>
                
              </select> </br>

               @php 
                $sel =[];
               @endphp
               @if(isset($selected_parents))
                 @foreach($selected_parents as $k)
                 @php
                  array_push($sel,$k->user_id);
                  @endphp
                 @endforeach
                @endif
                @php 
                //dd($video);
                @endphp

                <label class="control-label">Select Parent<span class="cst-upper-star"></span></label>
                          
                  <select class="form-control" id="parentId" name="parent[]" multiple @if($video->users == 'users') @else @php echo "disabled" @endphp @endif>
                    <option disabled disabled hidden value="">Select User</option>
                    @if(isset($parents))
                      @foreach($parents as $co)
                           @php
                             if(in_array($co->id,$sel)){
                                $selectedDefault  = 'selected';
                             }else{
                                $selectedDefault  = '';
                             }
                           @endphp

                          <option {{$selectedDefault}} value="{{$co->id}}">@php echo getUsername($co->id); echo ' - '; echo getUseremail($co->id); @endphp</option>
                      @endforeach                                        
                    @endif

                  </select></br></br>
                <!-- <label class="control-label">Users<span class="cst-upper-star">*</span></label>
                <select class="form-control" name="title_color">
                      <option value="#ffffff">Test</option>
                     
                </select><br/> -->

                <!-- <label class="control-label">Season<span class="cst-upper-star">*</span></label>
                <select class="form-control" name="heading_color">
                      <option value="#ffffff">Test</option>
                </select><br/> -->
                @php 
                $ses =[];
               @endphp
               @if(isset($selected_seasons))
                 @foreach($selected_seasons as $k)
                 @php
                  array_push($ses,$k->season_id);
                  @endphp
                 @endforeach
                @endif
                
                <label class="control-label">Season<span class="cst-upper-star"></span></label>
                <select class="form-control" id="seasonId" name="season[]" multiple @if($video->users == 'seasons') @else @php echo "disabled" @endphp @endif>
                  <option disabled hidden value="">Select Season</option>


                  @if(isset($seasons))
                    @foreach($seasons as $co)
                         @php
                           if(in_array($co->id,$ses)){
                              $selectedDefault  = 'selected';
                           }else{
                              $selectedDefault  = '';
                           }
                         @endphp

                        <option {{$selectedDefault}} value="{{$co->id}}">@php echo $co->title; @endphp</option>
                    @endforeach                                        
                  @endif


                </select></br></br>
                @php 
                //dd($video->linked_coaches);
                if (strcmp($video->linked_coaches, 'all') == 0 ) {
                  $selectedDefault = 'selected';
                  $selectedDefaultInd  = '';
                  $linked_coaches = [];
                }else{            
                    $selectedDefaultInd  = 'selected';
                    $selectedDefault  = '';
                    $linked_coaches = explode(',',$video->linked_coaches);
                }
                @endphp
                  
                <label class="control-label">Assing Video to Coaches<span class="cst-upper-star"></span></label>
                <select class="form-control" id="select_coaches" name="select_coaches" onchange="activateCoaches(this.value)">
                  <option hidden value="">Select</option>
                  <option value="all" {{ $selectedDefault }}>All Coaches</option>
                  <option value="individual_coach" {{ $selectedDefaultInd }}>Individual Coach</option>
                </select></br>

                <label class="control-label"> Select Coaches <span class="cst-upper-star"></span></label>             
                <select class="form-control" id="coachId" name="linked_coaches[]" multiple {{ (strcmp($video->linked_coaches, 'all') == 0 ) ? 'disabled': ''}} >
                  <option disabled hidden value="">Select Coach</option>
                   @if(isset($coaches) && !empty($coaches))
                      @foreach($coaches as $co)
                           @php
                             if(in_array($co->id,$linked_coaches)){
                                $selectedDefault  = 'selected';
                             }else{
                                $selectedDefault  = '';
                             }
                           @endphp

                          <option {{$selectedDefault}} value="{{$co->id}}">@php echo getUsername($co->id); echo ' - '; echo getUseremail($co->id); @endphp</option>
                      @endforeach                                        
                    @endif
                </select></br>
                <!-- <input type="checkbox" id="select_all_coaches" >Select All -->
                
              <div class="card-footer pl-0">
                <button type="submit" id="videoSubmitButton" class="btn btn-primary">Submit</button>
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
<script src="{{URL:: asset('/admin-assets/js/validations/valueValidation.js')}}"></script>
<script src="{{URL:: asset('/js/validations/imageShow.js')}}"></script>
<!-- <script type="text/javascript">
  $('#selImage').on('change', function (){
    $(this).parent().find('label').css('display', 'none');
  });
</script> -->
<script type="text/javascript">
  
var inp1 = document.getElementById("parentId");

var inp2 = document.getElementById("seasonId");

inp1.onkeyup = function() { inputValidation(this, inp2); }

inp2.onkeyup = function() { inputValidation(this, inp1); }

function inputValidation(origin, lock) {
  var response = hasValue(origin.value);
  lock.disabled = response;
}

function hasValue(value) {
  return value != "" && value.length > 0;
}

function activateUsers(val){
  console.log(val);
  $(this).val(val);
  if (val == 'users') {
    $('#parentId').removeAttr("disabled");
    $("#seasonId").attr("disabled", true);
  }else if (val == 'all') {
    $("#parentId").attr("disabled", true);
    $("#seasonId").attr("disabled", true);
  }else if(val == 'seasons'){
    $('#seasonId').removeAttr("disabled");
    $("#parentId").attr("disabled", true);
  }

}
$(document).ready(function(){
  $("#parentId").select2();
});

function activateCoaches(val){
  $(this).val(val);
  if (val == 'individual_coach') {
  console.log(val);
    $('#coachId').removeAttr("disabled");    
  }else if (val == 'all') {
    $("#coachId").attr("disabled", true);
  }

}




</script>
@endsection
