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
                  
                  {{textbox($errors,'Title<span class="cst-upper-star">*</span>','title')}}
                  {{textarea($errors,'Description<span class="cst-upper-star">*</span>','description')}}

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

                  <!-- <div class="form-group"> 
                      {{select3($errors,'Parent','parent','label','0',$category)}}
                  </div>
                  <div class="form-group">
                      {{select3($errors,'SubParent','subparent','label','0',array())}}
                  </div> -->

                  <div class="form-group">
                    <label class="label-file control-label">Parent</label>
                        <select id="people11" name="type" class="form-control">
                      
                        @php $course_cat = DB::table('product_categories')->where('parent','0')->where('subparent','0')->where('type','Course')->get(); @endphp
                        <option value="" disabled="" selected="">Select Parent Category</option>
                        @foreach($course_cat as $cour)
                          <option value="{{$cour->id}}">{{$cour->label}}</option>
                        @endforeach
                      </select>
                  </div>

                  <div class="form-group">
                        <label class="label-file control-label">Sub Parent</label>
                        <select id="inputAge11" name="subtype" class="form-control event-dropdown">
                          <option value="1" selected="" disabled="">Select Age Group</option>
                        </select>
                  </div>

                  @php 
                    $course_category = DB::table('link_course_and_categories')->where('status',1)->get();
                  @endphp 

                  <div class="form-group">
                      <label class="label-file control-label">Course Category</label>
                      
                      <select name="course_category" class="form-control event-dropdown">
                          <option value="" disabled="" selected="">Select Course Category</option>
                          @foreach($course_category as $course_cat)
                            <option value="{{$course_cat->id}}">{{$course_cat->title}}</option>
                          @endforeach
                      </select>
                  </div>

                  <div class="form-group">
                    <label class="label-file control-label">Level</label>
                    <select name="level" class="select-player">
                      <option value="Beginner">Beginner</option>
                      <option value="Intermediate">Intermediate</option>
                      <option value="Advanced">Advanced</option>
                    </select>
                  </div>

                  <label class="control-label">Account Name<span class="cst-upper-star">*</span></label>
                  @php $stripe_accounts = DB::table('stripe_accounts')->where('status',1)->orderby('id','desc')->get(); @endphp
                  <select class="form-control" id="select_account" name="account_id">
                    <option disabled selected="" value="">Select Account</option>
                    @foreach($stripe_accounts as $acc)
                      <option value="{{$acc->id}}">{{$acc->account_name}}</option>
                    @endforeach
                  </select>

                  {{textbox($errors,'Age Group (i.e. 3 - 7)<span class="cst-upper-star">*</span>','age_group')}}
                  
                  <!-- {{textbox($errors,'Age*','age')}}-->
                  {{textbox($errors,'Course dates<span class="cst-upper-star">*</span>','session_date')}}
                  {{textbox($errors,'Location<span class="cst-upper-star">*</span>','location')}}
                  {{textbox($errors,'Day Time<span class="cst-upper-star">*</span>','day_time')}}
                  {{textbox($errors,'Booking Slot<span class="cst-upper-star">*</span>','booking_slot')}}
                  {{textarea($errors,'More Info<span class="cst-upper-star">*</span>','more_info')}}

                  {{textarea($errors,'Information Email Content<span class="cst-upper-star">*</span>','info_email_content')}}

                  {{textnumber($errors,'Price<span class="cst-upper-star">*</span>','price')}}
                  {{textarea($errors,'Bottom Section<span class="cst-upper-star">*</span>','bottom_section')}}
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

                  {{textbox($errors,'Coach Cost<span class="cst-upper-star">*</span>','coach_cost')}}

                  {{textbox($errors,'Court/Venue Cost<span class="cst-upper-star">*</span>','venue_cost')}}
                  {{textbox($errors,'Equipment Cost<span class="cst-upper-star">*</span>','equipment_cost')}}
                  {{textbox($errors,'Other Cost<span class="cst-upper-star">*</span>','other_cost')}}
                  {{textbox($errors,'Tax/Vat Cost<span class="cst-upper-star">*</span>','tax_cost')}}

                  <div class="form-group">
                    <label class="label-file control-label">End Date</label>
                    <input type="date" name="end_date" class="form-control">
                  </div>

                  <div class="form-group">
                      <label class="control-label">Image</label>
                      <input type="file" required accept="image/*" onchange="ValidateSingleInput(this, 'image_src')" name="image" id="selImage1">
                      @if ($errors->has('image'))
                      <div class="error">{{ $errors->first('image') }}</div>
                      @endif
                  </div>
                  <img src="" id="image_src" style="width: 100px; height: 100px; display: none" />
                  <br/>

                  <div class="form-group">
                    <label class="label-file control-label">Membership Popup</label>
                    <select name="check_early_bird" class="select-player">
                      <option value="1">Enable</option>
                      <option value="0">Disable</option>
                    </select>
                  </div><br/>

                  {{textnumber($errors,'Membership Price<span class="cst-upper-star">*</span>','membership_price')}}

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

                        <div class="card-footer pl-0">
                  <button type="submit" id="btnVanue" class="btn btn-primary">Submit</button>
                </div>
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
   CKEDITOR.replace('info_email_content', options);
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

function myFunction() {
        $("#all_course_listing")[0].click();
      }


$(document).ready(function(){
    $("select#people11").change(function(){
        var selectedCat = $(this).children("option:selected").val();
        $.ajax({
            url:"http://demo.drhsports.co.uk/admin/selectedCat/",
            method:'GET',
            data:{selectedCat:selectedCat},
            dataType:'json',
            success:function(data)
            {   
                $('#inputAge11').html(data.option);
            },      
        })
    });
    });

</script>
@endsection
