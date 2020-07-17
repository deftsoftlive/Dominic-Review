@extends('layouts.admin')
 
@section('content')

<style>
div#selectator_multiple {
    min-height: 0px!important;
}
</style>
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

                   <label class="control-label">Test Category<span class="cst-upper-star">*</span></label>
                    @php 
                      $testcategory = DB::table('test_categories')->orderBy('id','asc')->get();
                    @endphp
                    <select class="select-player" name="test_cat_id">
                      @foreach($testcategory as $te)
                      <option @if($venue->test_cat_id == $te->id) 'selected' @endif value="{{$te->id}}">{{$te->title}}</option>
                      @endforeach
                    </select><br/>

                    <div class="form-group" >
                      <label class="control-label">Season</label>
                        <select id="season_id" class="select-player" name="season">
                          <option selected="" disabled="">Please Select Season</option>
                          @php 
                            $season = DB::table('seasons')->where('status',1)->get();
                          @endphp
                          @if(!empty($season))
                            @foreach($season as $se)
                              <option value="{{$se->id}}" {{$se->id == $venue->season ? 'selected' : ''}}>{{$se->title}}</option>
                            @endforeach
                          @endif
                        </select>
                    </div>

                    <div class="form-group" >
                      <label class="control-label">Selected Course </label>
                      <input type="text" class="form-control" disabled="" value="@php echo getCourseName($venue->courses); @endphp">
                    </div>

                    <div class="form-group" >
                      <label class="control-label">Change Course</label>
                        <select id="course" class="select-player" name="course">
                        </select>
                    </div>

                   <!-- <label class="control-label">Course<span class="cst-upper-star">*</span></label>
                   @php 
                    $courses = DB::table('courses')->orderBy('id','asc')->get();
                   @endphp
                    <select class="form-control" name="course">
                      @foreach($courses as $te)
                      <option value="{{$te->id}}" @if($te->id == $venue->course) 'selected' @endif>{{$te->title}}</option>
                      @endforeach
                    </select> -->

                    <!-- <div class="cst-user-add-property">
                      <div class="cst-select-close-opt cst-select-close-opt-ipad">
                        <link rel="stylesheet" type="text/css" href="https://harvesthq.github.io/chosen/chosen.css">
                        <script src="https://harvesthq.github.io/chosen/chosen.jquery.js"></script> 
                            <div id="user--output"></div>

                              <script>
                                    document.getElementById('user--output').innerHTML = location.search;
                                    $(".chosen-select--user").chosen();
                              </script>
                              <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
                              <link href="https://www.jqueryscript.net/demo/Select-Replacement-Plugin-jQuery-Selectator/fm.selectator.jquery.css" rel="stylesheet" type="text/css">


                              @php 
                                $selected_courses = explode(',',$venue->courses);
                                $courses = DB::table('courses')->where('status','1')->get();
                              @endphp

                              <label class="control-label">Courses</label>
                              <select id="multiple" class="form-control" name="courses[]" multiple> 

                                  @if(isset($courses))
                                    @foreach($courses as $co)
                                         @php
                                           if(in_array($co->id,$selected_courses)){
                                              $selectedDefault  = 'selected';
                                           }else{
                                              $selectedDefault  = '';
                                           }
                                         @endphp

                                        <option name="courses[]" {{$selectedDefault}} value="{{$co->id}}">{{$co->title}}</option>
                                    @endforeach                                        
                                  @endif

                              </select>

                              <script src="https://www.jqueryscript.net/demo/Select-Replacement-Plugin-jQuery-Selectator/fm.selectator.jquery.js"></script> 
                            <script>
                            $('#multiple').selectator({
                              showAllOptionsOnFocus: true,
                              searchFields: 'value text subtitle right'
                            });
                            </script>
                      </div>
                  </div> -->
                  
                   {{textbox($errors,'Title<span class="cst-upper-star">*</span>','title', $venue->title)}}
                   {{textarea($errors,'Description<span class="cst-upper-star">*</span>','description', $venue->description)}}

                <div class="card-footer pl-0">
                  <button type="submit" id="btnVanue" class="btn btn-primary">Submit</button>
                </div>
        </form>

      <br/><br/>

      <!-- @php 
        $check_excel = DB::table('test_scores')->where('season_id',$venue->season)->where('course_id',$venue->courses)->where('test_id',$venue->id)->where('test_cat_id',$venue->test_cat_id)->first();
      @endphp

      @if(!empty($check_excel))
        <a target="_blank" class="form_control" href="{{URL::asset('/uploads/test-excel')}}/{{$check_excel->excel_file}}">View already uploaded test score</a>
      @endif

      <br/><br/>

        <form role="form" method="post" action="{{route('import_excel')}}" enctype="multipart/form-data">
                
              @csrf
                <input type="hidden" name="test_id" value="{{$venue->id}}">
                <input type="hidden" name="season_id" value="{{$venue->season}}">
                <input type="hidden" name="course_id" value="{{$venue->courses}}">
                <input type="hidden" name="test_cat_id" value="{{$venue->test_cat_id}}">
                <label class="control-label">Import Test Score<span class="cst-upper-star">*</span></label>
                <input type="file" name="excel_file" class="form-control">

                <div class="card-footer pl-0">
                  <button type="submit" id="btnVanue" class="btn btn-primary">Submit</button>
                </div>
        </form> -->


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