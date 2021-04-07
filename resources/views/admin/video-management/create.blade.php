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

            <form role="form" method="post" id="videoForm" enctype="multipart/form-data" action="{{route('admin.store.video')}}">             
              @csrf
                
               {{textbox($errors,'Title<span class="cst-upper-star">*</span>','title')}}

               {{textarea($errors,'Video Iframe<span class="cst-upper-star">*</span>','url')}}
               
               {{textareackeditor($errors,'Description<span class="cst-upper-star"></span>','description')}}

              <label class="control-label">Video Category<span class="cst-upper-star"></span></label>
              <select class="form-control" id="video_category" name="category[]" multiple>
                <option hidden value=''>Select Category</option>
                 @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
              </select></br></br>

              <label class="control-label">Assign Video<span class="cst-upper-star"></span></label>
              <select class="form-control" id="select_user" name="users" onchange="activateUsers(this.value)">
                <option hidden value=''>Select</option>
                <option value="all">All Users</option>
                <option value="users">Individual User</option>
                <option value="seasons">Seasons</option>
                
              </select></br>


                <label class="control-label">Select Parent<span class="cst-upper-star"></span></label>
                         <!--  @php 
                            $parents = \App\User::where(['role_id' => 2])->get();
                          @endphp
 -->
                          <select class="form-control" id="parentId" name="parent[]" multiple disabled>
                            <option disabled hidden value="">Select User</option>
                            @foreach($parents as $sh)
                              <option value="{{$sh->id}}">@php echo getUsername($sh->id); echo ' - '; echo getUseremail($sh->id); @endphp</option>
                            @endforeach
                          </select></br>
                          <!-- <input type="hidden" id="parent" class="" name="parent_id"> --></br>
                <!-- <label class="control-label">Users<span class="cst-upper-star">*</span></label>
                <select class="form-control" name="title_color">
                      <option value="#ffffff">Test</option>
                     
                </select><br/> -->

                <!-- <label class="control-label">Season<span class="cst-upper-star">*</span></label>
                <select class="form-control" name="heading_color">
                      <option value="#ffffff">Test</option>
                </select><br/> -->
                <label class="control-label">Season<span class="cst-upper-star"></span></label>
                <select class="form-control" id="seasonId" name="season[]" multiple disabled>
                  <option disabled hidden value="">Select Season</option>
                  @foreach($seasons as $sha)
                    <option value="{{$sha->id}}">@php echo $sha->title; @endphp</option>
                  @endforeach
                </select> </br>
                <!-- <input type="hidden" id="season" class="" name="season_id"> --></br></br>
                 <label class="control-label">Assing Video to Coaches<span class="cst-upper-star"></span></label>
                <select class="form-control" id="select_coaches" name="select_coaches" onchange="activateCoaches(this.value)">
                  <option hidden value="">Select</option>
                  <option value="all">All Coaches</option>
                  <option value="individual_coach">Individual Coach</option>
                </select></br>


                <label class="control-label">Select Coaches <span class="cst-upper-star"></span></label>               
                <select class="form-control" id="coachId" name="linked_coaches[]" multiple>
                            <option disabled hidden value="">Select Coach</option>
                            @foreach($coaches as $sh)
                              <option value="{{$sh->id}}">@php echo getUsername($sh->id); echo ' - '; echo getUseremail($sh->id); @endphp</option>
                            @endforeach
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
