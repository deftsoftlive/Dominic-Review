@extends('layouts.admin')
 
@section('content')

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Edit Category</h5>
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
                                <div class="row">
                                         @csrf
                                        <div class="col-md-6"> 
                                           {{select3($errors,'Parent','parent','label','0',$category,$cate->parent)}}
                                         </div>
                                         <div class="col-md-6">
                                            {{select3($errors,'SubParent','subparent','label','0',$subcategory,$cate->subparent)}}
                                         </div>
                                         <div class="col-md-6"> 
                                             {{textbox($errors,'Name*','label',$cate->label)}}
                                         </div>

                                        
                                        <div class="col-md-6" >

                                                      <label class="control-label">Type - Course | Product</label>

                                                      <select class="form-control" id="featuredCategory" name="type">
                                                        <option value="Course" {{$cate->type == 'Course' ? 'selected' :''}}>Course</option>
                                                        <option value="Product" {{$cate->type == 'Product' ? 'selected' :''}}>Product</option>
                                                      </select>
                                              </div>


                        <div class="col-md-6" id="hasFeatured">
                           <div class="form-group" >

                                                      <label class="control-label">Featured | Not</label>

                                                      <select class="form-control" id="featuredCategory" name="featured">
                                                        <option value="0" {{$cate->featured == 0 ? 'selected' :''}}>Unfeatured</option>
                                                        <option value="1" {{$cate->featured == 1 ? 'selected' :''}}>Featured</option>
                                                      </select>
                                              </div>

                                              

                            <!-- <div class="row templateFeatured form-group" id="templateFeatured">
                              <div class="col-md-8">
                                  <h4>Choose Template</h4>
                                  <div class="row">
                                       <div class="col-md-6">
                                        <div class="checkbox-template"> 
                                          <input type="radio" id="template-1" name="template" value="1" {{$cate->template_id == 1 ? 'checked' : ''}}>
                                           <label for="template-1"><img src="{{url('images/admin/product-cate-img-1.png')}}" width="100%"></label>
                                        </div>
                                       </div>
                                        <div class="col-md-6">
                                           <div class="checkbox-template"> 
                                              <input type="radio" id="template-2" name="template" value="2" {{$cate->template_id == 2 ? 'checked' : ''}}>
                                               <label for="template-2"><img src="{{url('images/admin/product-cate-img-2.png')}}" width="100%"></label>
                                            </div>
                                       </div>
                                        <div class="col-md-12">
                                        <div class="checkbox-template"> 
                                          <input type="radio" id="template-3" name="template" value="3" {{$cate->template_id == 3 ? 'checked' : ''}}>
                                           <label for="template-3"><img src="{{url('images/admin/product-cate-img-3.png')}}" width="100%"></label>
                                        </div>
                                       </div>
                                   </div>
                                </div>
                                  <div class="col-md-4">
                                     <div class="checkbox-template"> 
                                          <input type="radio" id="template-4" name="template" value="4" {{$cate->template_id == 4 ? 'checked' : ''}}>
                                           <label for="template-4"><img src="{{url('images/admin/product-cate-img-4.png')}}" width="100%"></label>
                                        </div>
                                  </div>
                            </div> -->
                        </div>       
                                      <div class="col-md-6">  
                                        {{textbox($errors,'Meta Title*','meta_title',$cate->meta_title)}}
                                      </div>
                                        <div class="col-md-6">  
                                          {{textbox($errors,'Meta Tags*','meta_tag',$cate->meta_tag)}}
                                        </div>
                                        <div class="col-md-12">  
                                          {{textarea($errors,'Meta description*','meta_description',$cate->meta_description)}}
                                        </div>
                                         <div class="col-md-12">

                                          <div class="form-group">
                                                         <label class="label-file control-label">Image*</label>
                                                          <input type="file" accept="image/*" id="cat_image" onchange="ValidateSingleInput(this, 'image_src')" class="form-control" name="category_image">
                                                    </div>
                                                             <!-- {{choosefilemultiple($errors,'Category Icon','image')}} -->
                                                             <div class="form-group">
                                                  @if($cate->image != "")          
                                                 <img src="{{url($cate->image)}}" id="image_src" style="width: 100px; height: 100px; display: block;"/>
                                                 @else
                                                 <img src="" id="image_src" style="width: 100px; height: 100px; display: none"/>

                                                 @endif
                                               </div>
                                                    

                                        </div>
                                      </div>                                 
                                 
      <!-- /.card-body -->
            <div class="card-footer pl-0">
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
     featuredCategoryTemplate2();
      getSubCategoryByCategoryId();

  });


   $('#subparent').on('change',function(){
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
