 
 
        
@include('vendors.E-shop.products.variationBoxes.variation.item')
 

<div class="row ">
	<div class="col-md-12 text-right">
	   <button type="button" class="btn btn-primary pull-right addMoreVariationAttributes" 
			   data-action="{{url(route('vendor.shop.variations.add.attributes',$product->id))}}"
			   data-count="{{$variationCount}}"
	   >Add More Variation</button>
   </div>
</div>

 