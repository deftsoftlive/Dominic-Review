 


<?php $variationCount = !empty($$variationCount) ? $variationCount : 0 ?>
 <div class="col-md-12" id="variantListOfItems">
       
    <div class="variationItemOneOfList">
			 
			  <div class="row">
					         <div class="col-md-11">
					         	<div class="row variationLabeled">
						         	  @foreach($product->variationAttributes->where('product_variant',1) as $parent)
				                            <div class="col-md-3 text-center">
				                            	<label class="">{{$parent->type}}</label>
				                            </div>
						         	  @endforeach
					         	 </div>
					          </div>
			  </div>
			  
              
             
			@if($product->ProductAssignedVariations != null && $product->ProductAssignedVariations->count() > 0)

                @foreach($product->ProductAssignedVariations as $variationCountKey => $variant)
                      @php $variationCount = $variationCountKey; @endphp
                      @include('vendors.E-shop.products.variationBoxes.variation.item')

				@endforeach

			@endif


			<div class="row ">
				<div class="col-md-12 text-right">
				   <button type="button" class="btn btn-primary pull-right addMoreVariationAttributes" 
						   data-action="{{url(route('vendor.shop.variations.add.attributes',$product->id))}}"
						   data-count="{{$variationCount}}"
				   >Add More Variation</button>
			   </div>
			</div>
 




   </div>


</div>






 

































































