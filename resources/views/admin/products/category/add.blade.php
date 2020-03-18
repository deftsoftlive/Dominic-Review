@extends('layouts.admin')
 
@section('content')

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Add Category</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item "><a href="{{ url($addLink) }}">View</a></li>
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

                    <form role="form" method="post" id="categoryForm" enctype="multipart/form-data">
                                  <div class="card-body">
<div class="row">
                                         @csrf
          <div class="col-md-6"> 
             {{select3($errors,'Parent','parent','label','0',$category)}}
           </div>
        <div class="col-md-6">
         {{select3($errors,'SubParent','subparent','label','0',array())}}
       </div>
        <div class="col-md-6"> 
        {{textbox($errors,'Name*','label')}}
      </div>

            <div class="col-md-6">
                   <div class="form-group" >

                          <label class="control-label">Featured | Not</label>

                          <select class="form-control" name="featured">
                            <option value="0">Unfeatured</option>
                            <option value="1">Featured</option>
                          </select>
                  </div>
                   
            </div>
           
 

            <div class="col-md-6">
                   <div class="form-group" >

                          <label class="control-label">Type - Course | Product</label>

                          <select class="form-control" name="type">
                            <option value="Course">Course</option>
                            <option value="Product">Product</option>
                          </select>
                  </div>
                   
            </div>



<div class="col-md-6">   {{textbox($errors,'Meta Title*','meta_title')}}</div>
  <div class="col-md-6">  {{textbox($errors,'Meta Tags*','meta_tag')}}</div>
  <div class="col-md-12">  {{textarea($errors,'Meta description*','meta_description')}}</div>
 <div class="col-md-12">
                     <!-- {{choosefilemultiple($errors,'Category Icon','image')}} -->
                    
         <img src="" id="image_src" style="width: 100px; height: 100px; display: none"/>

            <div class="form-group">
            <label class="label-file control-label">Image*</label>
            <input type="file" accept="image/*" id="cat_image" onchange="ValidateSingleInput(this, 'image_src')" class="form-control" name="image">
           </div>

            </div>
     </div>                                 
      </div>
      <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" id="categoryFormSbt" class="btn btn-primary">Submit</button>
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
 
  $('#parent').on('change',function(){

      var val = $( this ).val();

      getSubCategoryByCategoryId();

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
