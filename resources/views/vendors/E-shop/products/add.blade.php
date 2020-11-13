@extends('layouts.admin')
 
@section('content')

<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" /> 

<div class="container-fluid">

<!-- header -->

  <div class="page_head-card">
      <div class="page-info">
              <div class="page-header-title">
                  <h5 class="m-b-10">Shop :: Products </h5>
              </div>
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="http://49.249.236.30:8654/vendors"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                  <li class="breadcrumb-item"><a href="javascript:void(0)">Add</a></li>
              </ul>
          </div>
         <!--  <div class="side-btns-wrap">
          <a href="{{url(route('vendor.shop.products.index'))}}" class="add_btn"><i class="fa fa-eye"></i></a>
          </div> -->
  </div>

  <!-- header -->
  <input type="hidden" id="cateCheck" value="{{$product->childcategory == null || $product->childcategory->count() == 0 ? 0 : 1 }}">
  

  <div class="main-body">
      <div class="page-wrapper"> 
          <div class="row"> 
              <div class="col-xl-12">
                  <div class="card">
                      <div class="card-header"> 
                          <h5>Assign Categories</h5>
                          <div class="cst-admin-filter">
                             <a href="{{url(route('vendor.shop.products.index'))}}" class="btn btn-primary">View</a>
                          </div>   
                      </div>   

		                  <div class="card-body">
                          <form method="post" enctype="multipart/form-data">
        		           	       <div class="row">
                                    <div class="col-md-12">
                                            <div class="form-group text-right">
                                                  <button class="btn btn-primary next mr-0">Save</button>
                                            </div>
                                    </div>
                                    <div class="col-md-6">
                                         <label class="control-label">Product Category</label>
                                         <a href="javascript:void(0)" class="categoryAssign form-control">
                                         	{{$product->category != null && $product->category->count() > 0 ? $product->category->label : ''}} |
                                         	{{$product->subcategory != null && $product->subcategory->count() > 0 ? $product->subcategory->label : ''}} |
                                         	{{$product->childcategory != null && $product->childcategory->count() > 0 ? $product->childcategory->label : ''}}
                                         </a>
                                    </div>

                                    <div class="col-md-6">
                                      {{textbox($errors,'Tag','tag',$product->tag)}}            
                                    </div>

                                    <div class="col-md-6">
                                      <label class="control-label">Account Name<span class="cst-upper-star">*</span></label>
                                      @php $stripe_accounts = DB::table('stripe_accounts')->where('status',1)->orderby('id','desc')->get(); @endphp
                                      <select class="form-control" id="select_account" name="account_id">
                                          <option disabled selected="" value="">Select Account</option>
                                          @foreach($stripe_accounts as $acc)
                                            <option @if($product->account_id == $acc->id) selected @endif value="{{$acc->id}}">{{$acc->account_name}}</option>
                                          @endforeach
                                      </select>
                                      <br/>
                                    </div>

                                    <div class="col-md-6" id="vou_prod_type">
                                      <label class="control-label">Product Type </label> (Default - Normal Product)
                                      <select class="form-group form-control vou_prod_type" name="vou_prod_type">
                                        <option disabled="" selected="">Select Product Type</option>
                                        <option value="voucher" @if($product->vou_prod_type == 'voucher') selected @endif">Voucher Product</option>
                                        <option value="normal" @if($product->vou_prod_type == 'normal') selected @endif>Normal Product</option>
                                      </select>          
                                    </div>


                                    <div class="col-md-6" id="voucher_list" @if($product->vou_prod_type == 'voucher') style="display:block;" @else style="display:none;" @endif>      
                                      @php 
                                        $voucher = DB::table('vouchures')->where('status',1)->get();
                                      @endphp   
                                      <label class="control-label">Voucher </label>
                                      <select class="form-group form-control" name="voucher">
                                        <option disabled="" selected="">Select Voucher</option>
                                        @foreach($voucher as $vou)
                                          <option @if($vou->id == $product->voucher) selected @endif value="{{$vou->id}}">{{$vou->title}}</option>
                                        @endforeach
                                      </select> 
                                    </div>

                                    <div class="col-md-12">
                                         {{textbox($errors,'Product Name','name',$product->name)}}
                                    </div>

                                    <div class="col-md-12">
                    
                                      <div class="form-group ">
                                        <div class="profile-image">
                                          <label class="control-label label-file">Product Main Thumbnail*</label>
                                                   <input type="file" name="thumbnail" accept="image/*" onchange="ValidateSingleInput(this, 'image_src')" id="image" class="form-control">
                                                   
                                                        <img id="image_src" class="img-radius" style="display:{{$product->thumbnail != null ? 'block' : 'none'}}; width: 100px; height: 100px; margin-top: 6px;" src="{{$product->thumbnail != "" ? url($product->thumbnail) : ''}}"> 
                                                      @if($product->thumbnail != null)
                                                        <input type="hidden" name="thumbnail" value="{{$product->thumbnail}}">
                                                      @endif
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
                          
                          <div class="row">
                            <div class="col-md-12">
                               <!-- {{choosefilemultiple($errors,'Product Images','images[]')}} -->
                                <div class="form-group">
                                       <label>Product Images</label>
                                      <input type="file" name="images[]" id="product_images" accept="image/*">
                                </div>
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
                                                      allowedFileExtensions: ["jpg", "png", "gif", "jpeg"],
                                                      initialPreview: [
                                                         <?php foreach($product->ProductImages as $p): ?>
                                                             '{{url($p->image)}}',
                                                         <?php endforeach; ?>
                                                      ],
                                                      initialPreviewConfig: [

                                                          <?php foreach($product->ProductImages as $p): ?>
                                                              {
                                                                  'caption' : 'product_image',
                                                                  'url' : '<?= url(route('vendor.shop.products.ajax.DeleteImageUploading',[$product->id,$p->id])) ?>',
                                                                  'key' : 'image1'
                                                                },
                                                          <?php endforeach; ?>
                                                           
                                                      ],
                                                      uploadExtraData: { '_token': $('meta[name="csrf-token"]').attr('content')
                                                    },
                                        });
                                   </script>    
                            </div> 
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
  </div>
</div>

 


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title">Product Category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
             <form id="productCategories" action="{{url(route('vendor.shop.products.saveCategory',$product->id))}}">
             	<input type="hidden" id="categoryAjaxRoute" value="{{url(route('vendor.shop.products.ajax.categories'))}}">
             	<div class="col-md-12">
                      <div class="form-group">
                      	  <label>Category</label>
                      	  <select id="people" class="form-control" name="category_id">
                      	  	  <option value="">select</option>
                      	  	  @foreach($category as $cate)
	                      	  	  <option value="{{$cate->id}}" {{$cate->id == $product->category_id ? 'selected' : ''}}>{{$cate->label}}</option>
                      	  	  @endforeach
                      	  </select>
                      </div>

                      <div class="form-group">
                      	  <label>Sub Category</label>
                      	  <select class="form-control" name="subcategory_id" id="subCategory">
                      	  	  
                      	  </select>
                      </div> 

                      <!-- <div class="form-group">
                      	  <label>Child Category</label>
                      	  <select class="form-control" name="childcategory_id" id="childCategory">
                      	  	  <option value="">select</option>
                      	  	  @if($product->subcategory != null && $product->subcategory->count() > 0 )
	                      	  	  @foreach($product->subcategory->childCategory as $cate)
		                      	  	  <option value="{{$cate->id}}" {{$cate->id == $product->childcategory_id ? 'selected' : ''}}>{{$cate->label}}</option>
	                      	  	  @endforeach
                      	  	  @endif
                      	  </select>
                      </div> -->

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

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>         
<script src="{{URL::asset('/js/validations/imageShow.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('/js/shop/vendors/products/category.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('/js/shop/vendors/products/variation/basic.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('/js/shop/vendors/products/variation/attributes.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('/js/shop/vendors/products/variation/inventory.js')}}"></script>
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


$(document).ready(function(){
    $("select#people").change(function(){
        var selectedCat = $(this).children("option:selected").val();
        
        $base_url = $("#base_url").val();
        $.ajax({
            url:$base_url+"/admin/selectedCat/",
            method:'GET',
            data:{selectedCat:selectedCat},
            dataType:'json',
            success:function(data)
            {   
                $('#subCategory').html(data.option);
            },      
        })
    });
    });

</script>





@endsection