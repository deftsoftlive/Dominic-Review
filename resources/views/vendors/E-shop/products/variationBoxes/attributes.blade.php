 
<h3>Product Attributes</h3>
 
<?php $allTypAlreadySaved = $product->variationAttributes->pluck('type')->toArray(); ?>

<div class="row">
     <div class="col-sm-6">
                <select name="variation" class="v-cstm-select form-control" id="loadAllVariationOfProduct">
               	                   <option value="">choose</option>  
                                  @foreach($product->subcategory->ProductVariations as $v)
	                                  <option 
	                                    value="{{$v->variations->type}}" 
	                                  	id="diabled-{{$v->variations->type}}"
	                                  	{{in_array($v->variations->type,$allTypAlreadySaved) ? 'disabled' : ''}}
	                                  	>
	                                  	{{$v->variations->name}}
	                                  </option>  
	                              @endforeach
		        </select>
		    </div>
		    <div class="col-sm-4">
                <button class="btn btn-primary" type="button" id="loadAllVariationOfProductBTN" data-route="{{url(route('vendor.shop.variation.types',$product->id))}}">Add</button>
			</div>
     </div>



<form class="row" id="saveAttributeProducts" data-action="{{url(route('vendor.shop.variation.attributes',$product->id))}}">
	 <div class="col-md-12 loadAllVariationOfProduct">
		 @include('vendors.E-shop.products.variationBoxes.attribute.list')	
	 </div>
	 <div class="col-md-12">
	 	<button class="btn btn-primary">Save Attributes</button>
	 </div>
</form>

