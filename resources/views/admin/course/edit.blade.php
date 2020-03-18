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
                  {{textbox($errors,'Term<span class="cst-upper-star">*</span>','term', $venue->term)}}
                  {{textarea($errors,'Description<span class="cst-upper-star">*</span>','description', $venue->description)}}

                  <!-- <div class="form-group" >
                      <label class="control-label">Type</label>
                        <select class="form-control" name="type">
                          <option value="Tennis" {{$venue->type == 'Tennis' ? 'selected' : ''}}>Tennis</option>
                          <option value="Football" {{$venue->type == 'Football' ? 'selected' : ''}}>Football</option>
                          <option value="School" {{$venue->type == 'School' ? 'selected' : ''}}>School</option>
                        </select>
                  </div> -->

                  <div class="form-group"> 
                      {{select3($errors,'Type','type','label','0',$category,$venue->type)}}
                  </div>
                  <div class="form-group">
                      {{select3($errors,'Sub Type','subtype','label','0',$subcategory,$venue->subtype)}}
                  </div>


                  <div class="form-group" >
                      <label class="control-label">Age Group</label>
                        <select class="form-control" name="age_group">
                          <option value="8-11" {{$venue->age_group == '8-11' ? 'selected' : ''}}>8-11</option>
                          <option value="3-10" {{$venue->age_group == '3-10' ? 'selected' : ''}}>3-10</option>
                          <option value="6-10" {{$venue->age_group == '6-10' ? 'selected' : ''}}>6-10</option>
                          <option value="9-17" {{$venue->age_group == '9-17' ? 'selected' : ''}}>9-17</option>
                          <option value="4-8" {{$venue->age_group == '4-8' ? 'selected' : ''}}>4-8</option>
                          <option value="3-7" {{$venue->age_group == '3-7' ? 'selected' : ''}}>3-7</option>
                        </select>
                  </div>
                  
                  {{textbox($errors,'Age<span class="cst-upper-star">*</span>','age', $venue->age)}}
                  {{textbox($errors,'Session Date<span class="cst-upper-star">*</span>','session_date', $venue->session_date)}}
                  {{textbox($errors,'Location<span class="cst-upper-star">*</span>','location', $venue->location)}}
                  {{textbox($errors,'Day Time<span class="cst-upper-star">*</span>','day_time', $venue->day_time)}}
                  {{textbox($errors,'Booking Slot<span class="cst-upper-star">*</span>','booking_slot', $venue->booking_slot)}}
                  {{textarea($errors,'More Info<span class="cst-upper-star">*</span>','more_info', $venue->more_info)}}
                  {{textbox($errors,'Price<span class="cst-upper-star">*</span>','price', $venue->price)}}
                  {{textbox($errors,'Early Birth Price<span class="cst-upper-star">*</span>','early_birth_price', $venue->early_birth_price)}}

                <div class="card-footer">
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