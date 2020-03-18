   <section class="products-sec">
        <div class="container">
            <div class="sec-heading text-center wow bounceInRight" data-wow-delay=".35s">
                <h2>PRODUCTS</h2>
            </div>
            <div class="product-wrapper wow bounceInUp" data-wow-delay=".40s">
                <div class="row">





<?php
   $newProducts = \App\Models\Products\Product::NewProducts();
?>
@foreach($newProducts as $pro)

     <?php
        $product = $pro->parent > 0 ? $pro->getParentProductData : $pro;
        $complete1 = $product->ProductAssignedVariations != null && $product->ProductAssignedVariations->count() > 0 ? 1 : 0;
        $RS =   $product->subProducts != null && $product->subProducts->count() > 0 ? $product->subProducts->first() : $product;
        $complete2 = $product->product_type == 0 && $product->price > 0 ? 1 : 0;
        $complete = $product->product_type == 0 ? $complete2 : $complete1;
        $saleImage = $RS->sale_price > 0 ? 'On Sale' : 'Hot';
        $type = $complete == 0 ? 'Comming Soon' : $saleImage;
        $url = $complete == 1 ? url(route('shop.product.detail.page',$RS->slug)) : 'javascript:void(0)';
        $stock = $pro->parent > 0 ? $pro->checkStock() : $product->checkStock();

   
      ?>

 

       <div class="col-lg-3 col-md-6">
       

                  <div class="product-card">
                      {!!checkInStock($stock)!!}
                            <div class="badge">{!!$type!!}</div>
                            <a href="{{$url}}"  class="product-tumb">
                              <img src="{{$RS->thumbnail != null ? url($RS->thumbnail) : ''}}" alt="">            
                            </a>
                            <div class="product-details">                              
                               <a href="{{$url}}">
                                <h4>{{$product->name}}</h4>
                                <p>{{$product->short_description}}</p>
                              </a>
                                <div class="product-bottom-details">
                                  <h5>Price Start From</h5>
                                  @php $price = $RS->productPrice(); @endphp
                                       {!!$price['html']!!}
                                   <div class="product-links">
                                                            <a href="javascript:void(0)" 
                                                                class="wishlist {{$product->hasInWishlist()}}"
                                                               data-url="{{url(route('shop.wishlist.create',$product->id))}}"
                                                               ><i class="fa fa-heart"></i>
                                                             </a>
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
    </section>