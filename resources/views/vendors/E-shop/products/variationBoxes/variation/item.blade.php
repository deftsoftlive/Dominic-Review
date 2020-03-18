  
 

  <div class="card">
  	  <form action="" 
  	    data-action="{{url(route('vendor.shop.variations.createNewVariationWithAttributeAndStockManagable',$product->id))}}"
  	    class="saveVariationStockForm" 
  	  >
			  <input type="hidden" 
			class="skuRouteValidation"
			value="{{url(route('vendor.shop.variations.checkSkU'))}}?type={{$product->product_type}}&product_id={{$product->id}}{{!empty($variant) ? '&variation_id='.$variant->id : ''}}">

         <div class="card-header" id="headingOne">
	        <div class="row variation-header-wraper">
		         <div class="col-md-11">
		         	 
			          <div class="row">

							@foreach($product->variationAttributes->where('product_variant',1) as $parent)
								@php 
						             $type = $parent->type;
								     $childAttributes = $parent->childAttributes->pluck('value')->toArray();
								     $variations = $product->subcategory->ProductVariationWithType->where('type',$type);
                                     
                                     $AssignedAttribute = !empty($variant) && $variant->hasVariationAttributes != null && $variant->hasVariationAttributes->count() > 0 && $variant->hasVariationAttributes->where('type',$type)->count() > 0 ? $variant->hasVariationAttributes->where('type',$type)->first()->attribute_id : 0;
                                                  
								@endphp




							        <div class="col-md-3">
							            <div class="form-group">
							                         <select name="variations[{{$type}}]" class="form-control" >
							                                    <option value="">{{$type}}</option>
									                         	@foreach($parent->childAttributes as $v)
									                         	     <option value="{{$v->variation->id}}" {{$AssignedAttribute == $v->variation->id ? 'selected' : ''}}>{{$v->variation->name}}</option>
									                         	@endforeach
							                         </select>
							            </div>
							        </div>
                            @endforeach
					   </div>
		         </div>
		         <div class="col-md-1 text-right">
		             <a href="#" data-toggle="collapse" data-target="#collapseTypeVariation{{$variationCount}}" aria-expanded="false" aria-controls="collapseTypeVariation{{$variationCount}}">
		               <i class="fas fa-list"></i>
		            </a>
		         </div>
	      </div>
         </div>

       <div id="collapseTypeVariation{{$variationCount}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
           <div class="card-body">

					@if(!empty($variant))
			              <input type="hidden" name="variation_id" value="{{$variant->id}}">
			        @endif
                    @include('vendors.E-shop.products.variationBoxes.variation.variationFields')
           </div>
       </div>

    </form>
    

</div>