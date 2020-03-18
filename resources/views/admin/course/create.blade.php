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
                  
                  {{textbox($errors,'Title*','title')}}
                  {{textbox($errors,'Term*','term')}}
                  {{textarea($errors,'Description*','description')}}

                 <!--  <div class="form-group">
                    <label class="label-file control-label">Type</label>

                    <select name="type" class="form-control">
                      <option value="Tennis">Tennis</option>
                      <option value="Football">Football</option>
                      <option value="School">School</option>
                    </select>
                    
                  </div> -->

                  <div class="form-group"> 
                      {{select3($errors,'Parent','parent','label','0',$category)}}
                  </div>
                  <div class="form-group">
                      {{select3($errors,'SubParent','subparent','label','0',array())}}
                  </div>

                  <div class="form-group">
                    <label class="label-file control-label">Age Group</label>

                    <select name="age_group" class="form-control">
                      <option value="8-11">8-11</option>
                      <option value="3-10">3-10</option>
                      <option value="9-17">9-17</option>
                      <option value="4-8">4-8</option>
                      <option value="3-7">3-7</option>
                    </select>
                    
                  </div>
                  
                  {{textbox($errors,'Age*','age')}}
                  {{textbox($errors,'Session Date*','session_date')}}
                  {{textbox($errors,'Location*','location')}}
                  {{textbox($errors,'Day Time*','day_time')}}
                  {{textbox($errors,'Booking Slot*','booking_slot')}}
                  {{textarea($errors,'More Info*','more_info')}}
                  {{textbox($errors,'Price*','price')}}
                  {{textbox($errors,'Early Birth Price*','early_birth_price')}}

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
