@extends('layouts.vendor')
@section('vendorContents')

             
<div class="container-fluid">



<!-- header -->

<div class="page_head-card">
    <div class="page-info">
            <div class="page-header-title">
                <h3 class="m-b-10">Shop :: Products </h3>
            </div>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="http://49.249.236.30:8654/vendors"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Add</a></li>
            </ul>
        </div>
        <div class="side-btns-wrap">
        <a href="{{url(route('vendor.shop.products.index'))}}" class="add_btn"><i class="fa fa-eye"></i></a>
        </div>
  </div>


<!-- header -->
<input type="hidden" id="cateCheck" value="{{$product->childcategory == null || $product->childcategory->count() == 0 ? 0 : 1 }}">
  


    <div class="row">
       <div class="col-lg-12">
          <div class="card vendor-dash-card">
                  <div class="card-header">Assign Categories</div>
		           <div class="card-body">
                      <form method="post" enctype="multipart/form-data">
		           	       <div class="row">
                          <div class="col-md-12">
                                      <div class="form-group text-right">
                                            <button class="cstm-btn btn-submit next">Save</button>
                                      </div>
                           </div>
                           <div class="col-md-6">
                                 <label>Product Category</label>
                                 <a href="javascript:void(0)" class="categoryAssign form-control">
                                 	{{$product->category != null && $product->category->count() > 0 ? $product->category->label : ''}} |
                                 	{{$product->subcategory != null && $product->subcategory->count() > 0 ? $product->subcategory->label : ''}} |
                                 	{{$product->childcategory != null && $product->childcategory->count() > 0 ? $product->childcategory->label : ''}}
                                 </a>
                           </div>

                           <div class="col-md-6">
                                 {{textbox($errors,'Product Name','name',$product->name)}}
                           </div>

                            <div class="col-md-12">
            
                              <div class="form-group ">
                                <div class="profile-image">
                                  <label class="label-file">Product Main Thumbnail*</label>
                                           <input type="file" name="thumbnail" accept="image/*" onchange="ValidateSingleInput(this, 'image_src')" id="image" class="form-control">
                                           
                <img id="image_src" class="img-radius" style="display:{{$product->thumbnail != null ? 'block' : 'none'}}; width: 100px; height: 100px; margin-top: 6px;" src="{{$product->thumbnail != "" ? url($product->thumbnail) : ''}}"> 

                                            @if ($errors->has('thumbnail'))
                                                <div class="error">{{ $errors->first('thumbnail') }}</div>
                                            @endif
                                     </div>
                                 </div>
                             </div>
                           <div class="col-md-12">
                                 {{textarea($errors,'Short Description','short_description',$product->short_description)}}
                           </div>
                           <div class="col-md-12">
                                 {{textarea($errors,'Description','description',$product->description)}}
                           </div>

                     </div>
                   </form>



                    <div class="col-md-12">
                       {{choosefilemultiple($errors,'Product Images','images[]')}}
                          <script type="text/javascript">
                                     $('#product_images').fileinput({
                                             'theme': 'explorer-fas',
                                              // headers: {
                                              //      // 'X-CSRF-TOKEN': $('input[name=_token]').val(),
                                              //      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                              // },
                                             'uploadUrl': "{{url(route('vendor.shop.products.ajax.imageUploading',$product->id))}}",
                                              overwriteInitial: false,
                                              initialPreviewAsData: true,
                                              initialPreview: [],
                                              initialPreviewConfig: [],
                                              uploadExtraData: { '_token': $('meta[name="csrf-token"]').attr('content') },
                                });
                           </script>    
                    </div>








                    <div class="row">
                           <div class="col-md-12">
                              @if($product->category != null && $product->category->count() > 0)
                                @include('vendors.E-shop.products.variations')
                              @endif

                           </div>

                    

                         
                        </div>
                   </div>
         </div>
     </div>
   </div>
 </div>

 




<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Product Category</h4>
      </div>
      <div class="modal-body">
             <form id="productCategories" action="{{url(route('vendor.shop.products.saveCategory',$product->id))}}">
             	<input type="hidden" id="categoryAjaxRoute" value="{{url(route('vendor.shop.products.ajax.categories'))}}">
             	<div class="col-md-12">
                      <div class="form-group">
                      	  <label>Category</label>
                      	  <select class="form-control" name="category_id">
                      	  	  <option value="">select</option>
                      	  	  @foreach($category as $cate)
	                      	  	  <option value="{{$cate->id}}" {{$cate->id == $product->category_id ? 'selected' : ''}}>{{$cate->label}}</option>
                      	  	  @endforeach
                      	  </select>
                      </div>

                       <div class="form-group">
                      	  <label>Sub Category</label>
                      	  <select class="form-control" name="subcategory_id" id="subCategory">
                      	  	  <option value="">select</option>
                      	  	  @if($product->category != null && $product->category->count() > 0 )
	                      	  	  @foreach($ShopCategory->parentCategory($shop->id,$product->category->id) as $cate)
		                      	  	  <option value="{{$cate->id}}" {{$cate->id == $product->subcategory_id ? 'selected' : ''}}>{{$cate->label}}</option>
	                      	  	  @endforeach
                      	  	  @endif
                      	  </select>
                      </div>

                      <div class="form-group">
                      	  <label>Child Category</label>
                      	  <select class="form-control" name="childcategory_id" id="childCategory">
                      	  	  <option value="">select</option>
                      	  	  @if($product->subcategory != null && $product->subcategory->count() > 0 )
	                      	  	  @foreach($product->subcategory->childCategory as $cate)
		                      	  	  <option value="{{$cate->id}}" {{$cate->id == $product->childcategory_id ? 'selected' : ''}}>{{$cate->label}}</option>
	                      	  	  @endforeach
                      	  	  @endif
                      	  </select>
                      </div>

                        <div class="form-group">
                             <button class="cstm-btn btn-submit next">Save</button>
                       </div>
                </div>
             </form>
      </div>
       
    </div>
  </div>
</div>


@endsection
@section('scripts')

         
<script src="{{url('/js/validations/imageShow.js')}}"></script>
<script type="text/javascript" src="{{url('/js/shop/vendors/products/category.js')}}"></script>
<script type="text/javascript" src="{{url('/js/shop/vendors/products/variation/basic.js')}}"></script>
<script type="text/javascript" src="{{url('/js/shop/vendors/products/variation/attributes.js')}}"></script>
<script type="text/javascript" src="{{url('/js/shop/vendors/products/variation/inventory.js')}}"></script>
<script type="text/javascript">

	@if($product->category == null || $product->category->count() == 0)
	                  var $modal = $("body").find('#myModal');
                          $modal.modal({backdrop: 'static', keyboard: false});
	@endif

   var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserWindowWidth  : 800,
        filebrowserWindowHeight : 500,
        uiColor: '#eda208',
        removePlugins: 'save, newpage',
        allowedContent:true,
        fillEmptyBlocks:true,
        extraAllowedContent:'div, a, span, section, img'
      };
  CKEDITOR.replace('description', options);


</script>





@endsection