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

  <form role="form" method="post" id="venueFormPaygoEdit" enctype="multipart/form-data">
                
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

                  <!-- <div class="form-group"> 
                      {{select3($errors,'Type','type','label','0',$category,$venue->type)}}
                  </div>
                  <div class="form-group">
                      {{select3($errors,'Sub Type','subtype','label','0',$subcategory,$venue->subtype)}}
                  </div> -->

                  <div class="form-group">
                    <label class="label-file control-label">Parent</label>
                        <select id="people11" name="type" class="form-control">
                      
                        @php $course_cat = DB::table('product_categories')->where('parent','0')->where('subparent','0')->where('type','Course')->orderBy('id','asc')->get(); @endphp
                        <option value="" disabled="" selected="">Select Parent Category</option>
                        @foreach($course_cat as $cour)
                          <option value="{{$cour->id}}" @if($venue->type == $cour->id) selected @endif>{{$cour->label}}</option>
                        @endforeach
                      </select>
                  </div>

                  @if(!empty($venue->subtype))
                    <div class="form-group">
                      <label class="label-file control-label">Selected Sub Parent</label> 
                      <input type="text" class="form-control" value="@php echo getProductCatname($venue->subtype); @endphp" readonly="">
                      <input type="hidden" class="form-control" name="exist_sub_cat" value="{{$venue->subtype}}">
                    </div>
                  @endif

                  <div class="form-group">
                    @php 
                      $course_cat = DB::table('product_categories')->where('parent','0')->where('subparent','0')->where('type','Course')->orderBy('id','asc')->first(); 
                      $course_sub_cat = DB::table('product_categories')->where('parent',$course_cat->id)->where('subparent',0)->where('type','Course')->get();
                    @endphp
                        <label class="label-file control-label">Change Sub Parent</label>
                        <select id="inputAge11" name="subtype" class="form-control event-dropdown">
                          <option value="1" selected="" disabled="">Select Age Group</option>

                          @foreach($course_sub_cat as $cat)
                            <option value="{{$cat->id}}">{{$cat->label}}</option>
                          @endforeach

                        </select>
                  </div>

                  @php 
                    $course_category = DB::table('link_course_and_categories')->where('status',1)->get();
                  @endphp 

                  <div class="form-group">
                      <label class="label-file control-label">Course Category<span class="cst-upper-star">*</span></label>
                      
                      <select name="course_category" class="form-control event-dropdown">
                          <option value="" disabled="" selected="">Select Course Category</option>
                          @foreach($course_category as $course_cat)
                            <option value="{{$course_cat->id}}" @if($venue->course_category == $course_cat->id) selected @endif>{{$course_cat->title}}</option>
                          @endforeach
                      </select>
                  </div>

                  <div class="form-group">
                    <label class="label-file control-label">Level</label>
                    <select name="level" class="select-player">
                      <option value="Beginner" {{$venue->level == 'Beginner' ? 'selected' : ''}}>Beginner</option>
                      <option value="Intermediate" {{$venue->level == 'Intermediate' ? 'selected' : ''}}>Intermediate</option>
                      <option value="Advanced" {{$venue->level == 'Advanced' ? 'selected' : ''}}>Advanced</option>
                    </select>
                  </div>

                  <label class="control-label">Account Name<span class="cst-upper-star">*</span></label>
                  @php $stripe_accounts = DB::table('stripe_accounts')->where('status',1)->orderby('id','desc')->get(); @endphp
                  <select class="form-control" id="select_account" name="account_id">
                    <option disabled selected="" value="">Select Account</option>
                    @foreach($stripe_accounts as $acc)
                      <option value="{{$acc->id}}" @if($acc->id == $venue->account_id) selected @endif>{{$acc->account_name}}</option>
                    @endforeach
                  </select>

                  {{textbox($errors,'Age Group (i.e. 3 - 7)<span class="cst-upper-star">*</span>','age_group', $venue->age_group)}}
                  
                 <!--  {{textbox($errors,'Age<span class="cst-upper-star">*</span>','age', $venue->age)}}-->
                  {{textbox($errors,'Course dates <span class="cst-upper-star">*</span>','session_date', $venue->session_date)}}
                  {{textbox($errors,'Location<span class="cst-upper-star">*</span>','location', $venue->location)}}
                  {{textbox($errors,'Day Time<span class="cst-upper-star">*</span>','day_time', $venue->day_time)}}
                  <!-- {{textbox($errors,'Booking Slot<span class="cst-upper-star">*</span>','booking_slot', $venue->booking_slot)}} -->
                  {!! textarea($errors,'More Info<span class="cst-upper-star">*</span>','more_info', $venue->more_info) !!}
                  {!! textarea($errors,'Information Email Content<span class="cst-upper-star">*</span>','info_email_content', $venue->info_email_content) !!}

                  {{textnumber($errors,'Price<span class="cst-upper-star">*</span>','price', $venue->price)}}
                  {!! textarea($errors,'Bottom Section<span class="cst-upper-star">*</span>','bottom_section', $venue->bottom_section) !!}

                  <!-- <label>Linked Coach</label> -->
                  <!-- <input type="text" disabled="" class="form-control" value="@php echo getUserName($venue->linked_coach); @endphp"> -->
                  <br/>
                  <div class="form-group">
                    <label class="label-file control-label">Change Linked Coach</label>
                      <select name="linked_coach" class="select-player">
                        <option selected="" disabled="">Select Coach</option>
                        @php 
                          $coach = DB::table('users')->where('role_id',3)->get(); 
                        @endphp
                        @foreach($coach as $co)
                        <option @if($co->id == $venue->linked_coach) selected @endif value="{{$co->id}}">{{$co->name}}</option>
                        @endforeach
                      </select>
                  </div>

                  <label class="control-label">Coach Cost<span class="cst-upper-star">*</span></label>
                  <input class="form-control" type="text" name="coach_cost" value="{{$venue->coach_cost}}">

                  <label class="control-label">Court/Venue Cost<span class="cst-upper-star">*</span></label>
                  <input class="form-control" type="text" name="venue_cost" value="{{$venue->venue_cost}}">

                  <label class="control-label">Equipment Cost<span class="cst-upper-star">*</span></label>
                  <input class="form-control" type="text" name="equipment_cost" value="{{$venue->equipment_cost}}">

                  <label class="control-label">Other Cost<span class="cst-upper-star">*</span></label>
                  <input class="form-control" type="text" name="other_cost" value="{{$venue->other_cost}}">

                  <label class="control-label">Tax/Vat Cost<span class="cst-upper-star">*</span></label>
                  <input class="form-control" type="text" name="tax_cost" value="{{$venue->tax_cost}}">

                  <div class="form-group">
                    <label class="label-file control-label">End Date</label>
                    <input type="date" name="end_date" class="form-control" value="{{isset($venue->end_date) ? $venue->end_date : ''}}">
                  </div>

                  <div class="form-group">
                    <label class="control-label">Image</label>
                    <input type="file" name="image" id="selImage1" accept="image/*" onchange="ValidateSingleInput(this, 'image_src')">
                    @if ($errors->has('image'))
                        <div class="error">{{ $errors->first('image') }}</div>
                    @endif
                  </div>
                  <img id="image_src" style="width: 100px; height: 100px;" src="{{ URL::asset('/uploads').'/'.$venue->image }}" />
                  <br/>

                  <div class="form-group">
                    <label class="label-file control-label">Membership Popup</label>
                    <select name="membership_popup" class="select-player">
                      <option value="1" {{$venue->membership_popup == '1' ? 'selected' : ''}}>Enable</option>
                      <option value="0" {{$venue->membership_popup == '0' ? 'selected' : ''}}>Disable</option>
                    </select>
                  </div><br/>

                  {{textnumber($errors,'Membership Price<span class="cst-upper-star">*</span>','membership_price', $venue->membership_price)}}

            <!--       {{textbox($errors,'Coach Cost<span class="cst-upper-star">*</span>','coach_cost', $venue->coach_cost)}}
                  
                  {{textbox($errors,'Court/Venue Cost<span class="cst-upper-star">*</span>','venue_cost', $venue->venue_cost)}}
                  {{textbox($errors,'Equipment Cost<span class="cst-upper-star">*</span>','equipment_cost', $venue->equipment_cost)}}
                  {{textbox($errors,'Other Cost<span class="cst-upper-star">*</span>','other_cost', $venue->other_cost)}}
                  {{textbox($errors,'Tax/Vat Cost<span class="cst-upper-star">*</span>','tax_cost', $venue->tax_cost)}} -->

                  <div class="form-group">
                    <label class="label-file control-label">Advance days booking</label>
                    <input type="number" name="advance_weeks" class="form-control" value="{{$venue->advance_weeks}}">
                  </div>

                  <div class="form-group">
                        <label class="control-label" for="timelsots">Dates of course</label>

                        <table class="add_on_services">
                          <thead>
                            <tr>
                                <th>Date</th>
                                <th>Seats</th>
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
                              <td><input type="number" name="seats[{{$time+1}}]" class="form-control"  value="{{$number->seats}}" required></td>
                              <td><input class="course_content_center" type="checkbox" name="display_course[{{$time+1}}]" value="@php if( $number->display_course == 1){ @endphp {{ 1 }} @php }else{ @endphp 0 @php } @endphp" @if($number->display_course) checked @endif ></td>
                              <td><a onclick="removeSection({{$time+1}});" href="javascript:void(0);"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></td>                                  
                            </tr>
                            @endforeach  

                            </div>

                            @else

                            <input type="hidden" id="noOfQuetion" value="{{$count_course_dates}}">
                            <div class="mainQuestions" id="mainQuestions">

                            <tr class="timeslots slots{{$count}}" value={{$count}}>
                              <td><input type="date" name="course_date[{{$count}}]" class="form-control" required></td>
                              <td><input type="number" name="seats[{{$time+1}}]" class="form-control" required></td>
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

            mainHtml+='<td><input type="number" name="seats['+newnumber+']" class="form-control" required></td>';

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

function myFunction() {
        $("#all_course_listing")[0].click();
      }


$(document).ready(function(){
    $("select#people11").change(function(){
        var selectedCat = $(this).children("option:selected").val();
        $.ajax({
            url:"<?php echo route('pay.go.selectedCat') ?>",
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