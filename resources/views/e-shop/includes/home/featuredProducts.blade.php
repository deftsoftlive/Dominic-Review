<?php

$featuredProducts = \App\Models\Products\Product::featuredProducts();
?>
@if($featuredProducts->count() > 0)
 <section class="featured-product-sec section-padding">
         <div class="container">
             <div class="pink-heading">
                <h2>FEATURED PRODUCTS</h2>
            </div>
            <div class="featured-product-wrap">
                    <div class="row">
                       
                     
 


@foreach($featuredProducts->take(10)->get() as $pro)

  
      <?php
        $product = $pro;
        $stock = $pro->parent > 0 ? $pro->checkStock() : $product->checkStock();
        $RS =  $product->subProducts->count() > 0 ? $product->subProducts->first() : $product;
        $complete1 = $product->ProductAssignedVariations != null && $product->ProductAssignedVariations->count() > 0 ? 1 : 0;
        $saleImage = $RS->sale_price > 0 ? 'On Sale' : 'Hot';
        $complete2 = $product->product_type == 0 && $product->price > 0 ? 1 : 0;
        $complete = $product->product_type == 0 ? $complete2 : $complete1;
        $type = $complete == 0 ? 'Comming Soon' : $saleImage;
        $url = $complete == 1 ? url(route('shop.product.detail.page',$RS->slug)) : 'javascript:void(0)';
 
      ?>

 

       <div class="{{$featuredProducts->count() < 5 ? 'col-md-3' : 'item'}} "> 

                  <div class="product-card">
                      {!!checkInStock($stock)!!}
                    <div class="badge">{!!$type!!}</div>
                     <a href="{{$url}}"  class="product-tumb">
                        <img src="{{$pro->thumbnail != null ? url($pro->thumbnail) : ''}}" alt="">            
                     </a>
                    <div class="product-details">                              
                        <a href="{{$url}}"> 
                                            <h4>{{$product->name}}</h4>
                                            <p>{{$product->short_description}}</p>
                        </a>
                        <div class="product-bottom-details">
                            <h5>Start From</h5>
                          @php $price = $RS->productPrice(); @endphp
                               {!!$price['html']!!}
                           <div class="product-links">
                                                    <!--<a href="javascript:void(0)" 
                                                        class="wishlist {{$product->hasInWishlist()}}"
                                                       data-url="{{url(route('shop.wishlist.create',$product->id))}}"
                                                       ><i class="fa fa-heart"></i>
                                                     </a>-->
                                <a href="{{$url}}"><i class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                    </div>
                
            </div>
       </div>

      
       

 
@endforeach




















           </div>
        </div>
     </div>
   </div>
</section>



@endif


