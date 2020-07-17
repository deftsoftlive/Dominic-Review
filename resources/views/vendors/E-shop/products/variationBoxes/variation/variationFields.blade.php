<div class="row">
<?php

$price = !empty($variant) ? $variant->price : '';
$sale_price = !empty($variant) ? $variant->sale_price : '';
$stock_status = !empty($variant) ? $variant->stock_status : '';
$hasStockManage = !empty($variant) ? $variant->stock_managable : '';
$weight = !empty($variant) ? $variant->weight : '';
$height = !empty($variant) ? $variant->height : '';
$width = !empty($variant) ? $variant->width : '';
$length = !empty($variant) ? $variant->length : '';
$sku = !empty($variant) && $variant->inventoryWithVariation != null && $variant->inventoryWithVariation->count() > 0 ? $variant->inventoryWithVariation->sku : '';
$stock = !empty($variant) && $variant->inventoryWithVariation != null && $variant->inventoryWithVariation->count() > 0 ? $variant->inventoryWithVariation->stock : '';
$lowInStock = !empty($variant) && $variant->inventoryWithVariation != null && $variant->inventoryWithVariation->count() > 0 ? $variant->inventoryWithVariation->lowInStock : '';


$thumbnail = !empty($variant) && $variant->thumbnail != null && $variant->thumbnail != "" ? $variant->thumbnail : null;

$thumbnailDivID = !empty($variant) ? 'image_src-'.$variant->id : 'image_src-0';
$thumbnailValidation = !empty($variant) && $thumbnail != null ? '' : 'required';
?>
 
<!-- field start -->
<div class="col-md-7">
<div class="form-group ">
    <div class="profile-image">
      <label class="label-file">Product Thumbnail*</label>
               <input type="file" name="thumbnail" accept="image/*" onchange="ValidateSingleInput(this, '{{$thumbnailDivID}}')" id="image" class="form-control" {{$thumbnailValidation}}>
               
                       <img id="{{$thumbnailDivID}}" class="img-radius" style="display:{{$thumbnail != null ? 'block' : 'none'}}; width: 100px; height: 100px; margin-top: 6px;" src="{{$thumbnail != "" ? url($thumbnail) : ''}}"> 

                
          
     </div>
 </div>
</div>


  <div class="col-md-6">
  	  <div class="form-group">
  	  	  <label>Price(£) <small>(According to Variation)</small></label>
  	  	  <input type="number" min="0" name="price" value="{{$price}}" class="form-control" id="Reqularprice">
  	  </div>
  </div>
<!-- field start -->
<!-- field start -->
  <div class="col-md-6">
  	  <div class="form-group">
  	  	  <label>Sale discount amount(£) <small>(According to Variation)</small></label>
  	  	  <input type="number" min="0" name="sale_price" class="form-control" value="{{$sale_price}}">
  	  </div>
  </div>
<!-- field start -->

<!-- field start -->
  <div class="col-md-12">
  	  <div class="form-group">
  	  	  <label>Status <small>(In Stock | Out of Stock)</small></label>
  	  	  <select name="stock_status" class="form-control">
  	  	  	 <option value="1" {{$stock_status == 1 ? 'selected' : ''}}>In Stock</option>
  	  	  	 <option value="2" {{$stock_status == 1 ? 'selected' : ''}}>Out Of Stock</option>
  	  	  </select>
  	  </div>



<!-- field start -->
	<div class="form-group">
	     <label>Manage stock ?</label>
	     <div class="form-check">
			       <input 
			        class="form-check-input"
			        type="checkbox"
			        value="1" 
			        data-id="hasStockManage" 
			        name="hasStockManage"
			        {{$hasStockManage == 1 ? 'checked' : ''}}
                    >
		           <label class="form-check-label" for="hasStockManage">
				         Enable stock management at product level <i class="fas fa-question-circle"></i>
				   </label>
			 
	    </div>
	 </div>
<!-- field start -->
</div>


<div class="col-md-12 hasStockManage">
	<div class="row">
         <div class="col-md-12">
            <h4>Stock Management</h4>
         </div>
           <div class="col-md-12">
             <!-- field start -->
				<div class="form-group ">
				 
				    <label> SKU
				    	<span class="q-mark"><i class="fas fa-question-circle"></i></span>
				    </label>
				     <input 
					      type="text" 
					      class="form-control " 
					      name="sku"
					      data-url="{{url(route('vendor.shop.variations.checkSkU'))}}?type={{$product->product_type}}&product_id={{$product->id}}{{!empty($variation) ? '&variation_id='.$variation->id : ''}}"
					      value="{{$sku}}" 
					  >
				</div>
				<!-- field start -->
		   </div>

		    <div class="col-md-6">
             <!-- field start -->
				<div class="form-group ">
				 
				    <label>Product Quantity <small>(In Stock)</small>
				    	<span class="q-mark"><i class="fas fa-question-circle"></i></span>
				    </label>
				     <input 
					      type="number" 
					      min="1" 
					      class="form-control" 
					      name="stock"
					       value="{{$stock}}" 
					  >
				</div>
				<!-- field start -->
		   </div>

		   <div class="col-md-6">
             <!-- field start -->
				<div class="form-group ">
				 
				    <label>Low Stock <small>(Out of Stock)</small>
				    	<span class="q-mark"><i class="fas fa-question-circle"></i></span>
				    </label>
				     <input 
					      type="number" 
					      min="1" 
					      class="form-control " 
					      name="lowInStock"
					       value="{{$lowInStock}}" 

					  >
				</div>
				<!-- field start -->
		   </div>


    </div>
  </div>
<!-- field start -->
<!-- field start -->



<div class="col-md-12">
   <div class="row">
       <div class="col-md-12">
            <h4>For Shipping Information</h4>
       </div>
       <div class="col-md-12">
            <div class="form-group">
                 <label>Product Weight(KG)</label>
                 <input type="number" name="weight" value="{{$weight}}" class="form-control" min="1">
            </div>
       </div>
       <div class="col-md-12">
            <h6>Dimensions (L×W×H) (cm)</h6>
       </div>
       <div class="col-md-4">
            <div class="form-group">
                 <label>Product Height</label>
                 <input type="number" name="height" value="{{$height}}" class="form-control" min="1">
            </div>
       </div>
       <div class="col-md-4">
            <div class="form-group">
                 <label>Product Width</label>
                 <input type="number" name="width" value="{{$width}}" class="form-control" min="1">
            </div>
       </div>
       <div class="col-md-4">
            <div class="form-group">
                 <label>Product Length</label>
                 <input type="number" name="length" value="{{$length}}" class="form-control" min="1">
            </div>
       </div>


   </div>
</div>









<!-- field start -->










<div class="col-md-12">
       <div class="form-group">
       	    <button class="btn btn-primary">Save Variation</button>
       	      	<div class="messages"></div>
       </div>
</div>


</div>