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

                @php
                  $count=1;  
                @endphp
                  
                  {{textbox($errors,'Title*','title')}}
                  {{textbox($errors,'Term*','term')}}
                  {{textarea($errors,'Description*','description')}}

                  <div class="form-group">
                    <label class="label-file control-label">Type</label>

                    <select name="season" class="select-player">
                      @php 
                        $season = DB::table('seasons')->where('status',1)->get();
                      @endphp
                      @if(!empty($season))
                        @foreach($season as $se)
                          <option value="{{$se->id}}">{{$se->title}}</option>
                        @endforeach
                      @endif
                    </select>
                    
                  </div>

                  <div class="form-group"> 
                      {{select3($errors,'Parent','parent','label','0',$category)}}
                  </div>
                  <div class="form-group">
                      {{select3($errors,'SubParent','subparent','label','0',array())}}
                  </div>

                  <div class="form-group">
                    <label class="label-file control-label">Level</label>
                    <select name="level" class="select-player">
                      <option value="Beginner">Beginner</option>
                      <option value="Intermediate">Intermediate</option>
                      <option value="Advanced">Advanced</option>
                    </select>
                  </div>

                  {{textbox($errors,'Age Group (i.e. 3-7)*','age_group')}}
                  
                  <!-- {{textbox($errors,'Age*','age')}}-->
                  {{textbox($errors,'Course dates*','session_date')}}
                  {{textbox($errors,'Location*','location')}}
                  {{textbox($errors,'Day Time*','day_time')}}
                  {{textbox($errors,'Booking Slot*','booking_slot')}}
                  {{textarea($errors,'More Info*','more_info')}}
                  {{textbox($errors,'Price*','price')}}
                  {{textarea($errors,'Bottom Section*','bottom_section')}}
                  <!-- {{textbox($errors,'Early Birth Price*','early_birth_price')}} -->

                  <div class="form-group">
                    <label class="label-file control-label">Linked Coach</label>
                    <select name="linked_coach" class="select-player">
                      <option selected="" disabled="">Select Coach</option>
                      @php 
                        $coach = DB::table('users')->where('role_id',3)->get();
                      @endphp
                      @foreach($coach as $co)
                      <option value="{{$co->id}}">{{$co->name}}</option>
                      @endforeach
                    </select>
                  </div>

                  <table class="add_on_services">
                    <thead>
                      <tr>
                          <th>Date</th>
                          <th class="course_content_center">Display</th>
                          <th><a onclick="addnewsection();" href="javascript:void(0);"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></th>
                      </tr>
                    </thead>
                    <tbody>

                       

                      <div class="form-group">
                        <label class="control-label" for="timelsots">Dates of course</label>

                          <!-- ******************************
                          |     Courses Dates
                          | ********************************* -->
                        
                            <input type="hidden" id="noOfQuetion" value="{{$count}}">
                            <div class="mainQuestions" id="mainQuestions">

                            <tr class="timeslots slots{{$count}}" value={{$count}}>
                              <td><input type="date" name="course_date[{{$count}}]" class="form-control" required></td>
                              <td><input class="course_content_center" type="checkbox" name="display_course[{{$count}}]" value="1"></td>
                              <td><a onclick="removeSection({{$count}});" href="javascript:void(0);"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></td>
                                  
                              </tr>
                            </div>
                            </tbody>
                        </table>
                      </div>

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

            mainHtml+='<td><input type="checkbox" class="course_content_center" name="display_course['+newnumber+']" value="1"></td>';

            mainHtml+='<td><a href="javascript:void(0);" onclick="removeSection('+newnumber+');"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></td></tr>';


            $(".add_on_services").append(mainHtml);
        }


        function removeSection(counter){
            //noOfattribute
            var number = parseInt($("#noOfQuetion").val());  
            $(".slots"+ counter).remove();
        }

</script>


<script type="text/javascript">

  function fetch() {
  var get=document.getElementById("get").value;
  let color = document.getElementById("color");
  color.value = get;
  color.focus();
} 

  $('#parent').on('change',function(){

      var val = $( this ).val();

      getSubCategoryByCategoryId();

  });



  function getSubCategoryByCategoryId() {
 
   var val = $('select#parent option:selected').val();
    
    $.ajax({
     url: "<?= url('get-subcategory-by-parent') ?>" ,
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
