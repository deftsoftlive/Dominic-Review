 
@if($product->product_type == 1)
 <?php
   $assigned = $product->cartOptions();
   $i=0;
 
   $producthasVariant = $pro->getChildVariationAccordingSubProduct();
  
 ?>
@foreach($assigned as $type => $val)
       <?php $attributes = App\Models\Products\ProductVariation::whereIn('id',$val)->where('type',$type); ?>
  <h5 class="sizes">
     {{$type}}
            <ul class="ctm-type-{{$type}}">
                @foreach($attributes->get() as $k => $item)
                   
                {!! getProductDetailPageFilterItem($product,$pro,$i,$type,$item) !!}
                         

                @endforeach
            </ul>
 </h5> 

<?php $i++; ?>
@endforeach




 
@endif