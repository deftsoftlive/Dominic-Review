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
                  {!! textarea($errors,'Description<span class="cst-upper-star">*</span>','description', $venue->description) !!}


                  <div class="form-group" >
                      <label class="control-label">Season</label>
                        <select class="select-player" name="season">
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

                  <div class="form-group"> 
                      {{select3($errors,'Type','type','label','0',$category,$venue->type)}}
                  </div>
                  <div class="form-group">
                      {{select3($errors,'Sub Type','subtype','label','0',$subcategory,$venue->subtype)}}
                  </div>

                  <div class="form-group">
                    <label class="label-file control-label">Level</label>
                    <select name="level" class="select-player">
                      <option value="Beginner" {{$venue->level == 'Beginner' ? 'selected' : ''}}>Beginner</option>
                      <option value="Intermediate" {{$venue->level == 'Intermediate' ? 'selected' : ''}}>Intermediate</option>
                      <option value="Advanced" {{$venue->level == 'Advanced' ? 'selected' : ''}}>Advanced</option>
                    </select>
                  </div>

                  {{textbox($errors,'Age Group (i.e. 3-7)<span class="cst-upper-star">*</span>','age_group', $venue->age_group)}}
                  
                 <!--  {{textbox($errors,'Age<span class="cst-upper-star">*</span>','age', $venue->age)}}-->
                  {{textbox($errors,'Course dates <span class="cst-upper-star">*</span>','session_date', $venue->session_date)}}
                  {{textbox($errors,'Location<span class="cst-upper-star">*</span>','location', $venue->location)}}
                  {{textbox($errors,'Day Time<span class="cst-upper-star">*</span>','day_time', $venue->day_time)}}
                  {{textbox($errors,'Booking Slot<span class="cst-upper-star">*</span>','booking_slot', $venue->booking_slot)}}
                  {!! textarea($errors,'More Info<span class="cst-upper-star">*</span>','more_info', $venue->more_info) !!}

                  {{textbox($errors,'Price<span class="cst-upper-star">*</span>','price', $venue->price)}}
                  {!! textarea($errors,'Bottom Section<span class="cst-upper-star">*</span>','bottom_section', $venue->bottom_section) !!}
                  <!-- {{textbox($errors,'Early Birth Price<span class="cst-upper-star">*</span>','early_birth_price', $venue->early_birth_price)}} -->
                  <div class="form-group">
                    <label class="label-file control-label">Linked Coach</label>
                      <select name="linked_coach" class="select-player">
                        <option selected="" disabled="">Select Coach</option>
                        @php 
                          $coach = DB::table('users')->where('role_id',3)->get(); 
                        @endphp
                        @foreach($coach as $co)
                        <option value="{{$co->id}}" @if($co->id = $venue->linked_coach) selected @endif >{{$co->name}}</option>
                        @endforeach
                      </select>
                  </div>

                  {{textbox($errors,'Coach Cost','coach_cost', $venue->coach_cost)}}

                  <div class="form-group">
                        <label class="control-label" for="timelsots">Dates of course</label>

                        <table class="add_on_services">
                          <thead>
                            <tr>
                                <th>Date</th>
                                <th>Display</th> 
                                <th><a onclick="addnewsection();" href="javascript:void(0);"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></th>
                            </tr>
                          </thead>
                          <tbody>

                          <!-- ******************************
                          |
                          |     Course Dates
                          |
                          | ********************************* -->
                          
                            @if(isset($course_dates_data))  

                            <input type="hidden" id="noOfQuetion" value="{{$count_course_dates}}">
                            <div class="mainQuestions" id="mainQuestions">


                            @foreach($course_dates_data as $time => $number)
                            <tr class="timeslots slots{{$time+1}}" value={{$time+1}}>
                              <td><input type="date" name="course_date[{{$time+1}}]" class="form-control"  value="{{$number->course_date}}" required></td>
                              <td><input class="course_content_center" type="checkbox" name="display_course[{{$time+1}}]" value="@php if(isset($number->display_course)){ @endphp {{$number->display_course}} @php }else{ @endphp 1 @php } @endphp" @if($number->display_course) checked @endif ></td>
                              <td><a onclick="removeSection({{$time+1}});" href="javascript:void(0);"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></td>                                  
                            </tr>
                            @endforeach  

                            </div>

                            @else

                            <input type="hidden" id="noOfQuetion" value="{{$count_course_dates}}">
                            <div class="mainQuestions" id="mainQuestions">

                            <tr class="timeslots slots{{$count}}" value={{$count}}>
                              <td><input type="date" name="course_date[{{$count}}]" class="form-control" required></td>
                              <td><input type="checkbox" name="display_course[{{$count}}]" class="course_content_center" value="1"></td>
                              <td><a onclick="removeSection({{$count}});" href="javascript:void(0);"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></td>
                                  
                              </tr>

                            </div>

                            @endif

                          
                            </tbody>
                        </table>
                      </div>

                <div class="card-footer pl-0">
                  <button type="submit" id="btnVanue" class="btn btn-primary">Submit</button>
                </div>
      </form>
      <br/>
      @php 
        $check_excel = DB::table('test_scores')->where('season_id',$venue->season)->where('course_id',$venue->id)->first();
      @endphp

      @if(!empty($check_excel))
        <a target="_blank" class="btn btn-primary" href="{{url('/admin/view_test_score/excel/season')}}/{{$venue->season}}/course/{{$venue->id}}">View Test Score</a>
        <a class="btn btn-primary" href="{{URL::asset('/uploads/test-excel')}}/{{$check_excel->excel_file}}">View already uploaded test score</a>
        <a class="btn btn-primary" href="{{url('/admin/excel_export/excel/season')}}/{{$venue->season}}/course/{{$venue->id}}">Export Excel</a>
      @endif

      <br/><br/>

        <form role="form" method="post" action="{{route('import_excel')}}" enctype="multipart/form-data">
                
              @csrf
                <!-- <input type="hidden" name="test_id" value="{{$venue->id}}"> -->
                <input type="hidden" name="season_id" value="{{$venue->season}}">
                <input type="hidden" name="course_id" value="{{$venue->id}}">
                <input type="hidden" name="test_cat_id" value="{{$venue->subtype}}">
                <label class="control-label">Import Test Score<span class="cst-upper-star">*</span></label>
                <input type="file" name="excel_file" class="form-control">

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
<script src="{{ asset('/admin-assets/js/validations/faqValidation.js') }}"></script>
<script src="{{ asset('js/cke_config.js') }}"></script>

<script type="text/javascript">
   CKEDITOR.replace('description', options);
   CKEDITOR.replace('more_info', options);
   CKEDITOR.replace('bottom_section', options);
</script>


<!-- Course Dates Management -->
<script type="text/javascript">

        function addnewsection(){
            //noOfattribute
            var number = parseInt($("#noOfQuetion").val());  
            var newnumber =number+1;                        
            $("#noOfQuetion").val(newnumber);

            var mainHtml='<tr class="timeslots slots'+newnumber+'" value="'+newnumber+'"><td><input type="date" name="course_date['+newnumber+']" class="form-control" required></td>';

            mainHtml+='<td><input type="checkbox" class="course_content_center" name="display_course['+newnumber+']" class="form-control" value="1"></td>';

            mainHtml+='<td><a href="javascript:void(0);" onclick="removeSection('+newnumber+');"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></td></tr>';


            $(".add_on_services").append(mainHtml);
        }


        function removeSection(counter){
            //noOfattribute
            var number = parseInt($("#noOfQuetion").val());  
            $(".slots"+ counter).remove();
        }

</script>


<script src="{{url('/admin-assets/js/validations/categoryValidation.js')}}"></script>
<script src="{{url('/js/validations/imageShow.js')}}"></script>

<script type="text/javascript">
 
  $('#type').on('change',function(){
     var val = $( this ).val();
     featuredCategoryTemplate2();
      getSubCategoryByCategoryId();

  });


   $('#subtype').on('change',function(){
     var val = $( this ).val();
     featuredCategoryTemplate2();

   });


featuredCategoryTemplate();
featuredCategoryTemplate2();

  function featuredCategoryTemplate() {
      var $id  = $('#featuredCategory').val();
      var $templateFeatured = $('#templateFeatured');
      if(parseInt($id) == 0){
         $templateFeatured.hide();
      }else{
         $templateFeatured.show();

      }
  }


  function featuredCategoryTemplate2() {
      var $id  = $('#parent').val();
      var $sub  = $('#subparent').val();
      var $templateFeatured = $('#hasFeatured');
      if(parseInt($id) > 0 && parseInt($sub) == 0){
         $templateFeatured.show();
      }else{
         $templateFeatured.hide();

      }
  }



$('#featuredCategory').on('change',function(){
   featuredCategoryTemplate();
});

  function getSubCategoryByCategoryId() {
 
   var val = $('select#parent option:selected').val();

    
    
    $.ajax({
     url: "<?= url(route('admin.products.category.data')) ?>" ,
     data:{
        'parent': val,
        'subparent':'0'
     },
     dataTYPE: 'json',
     success: function(result){

          var text ='<option value="0">select</option>';

           
          $.each(result, function( index, key ) {
                text +='<option value="'+key.id+'">'+key.label+'</option>';
           });


          $("#subparent").html(text);
     }});

  }
</script>
@endsection