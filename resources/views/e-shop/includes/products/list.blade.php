@if(@sizeof($products))
      @foreach($products as $pro)
     <?php
        $product = $pro->parent > 0 ? $pro->getParentProductData : $pro;
        $stock = $pro->parent > 0 ? $pro->checkStock() : $product->checkStock();
        $complete1 = $product->ProductAssignedVariations != null && $product->ProductAssignedVariations->count() > 0 ? 1 : 0;
        $complete2 = $product->product_type == 0 && $product->price > 0 ? 1 : 0;
        $complete = $product->product_type == 0 ? $complete2 : $complete1;
         $saleImage = $pro->sale_price > 0 ? 'On Sale' : 'Hot';
        $type = $complete == 0 ? 'Comming Soon' : $saleImage;

        $url = $complete == 1 ? url(route('shop.product.detail.page',$pro->slug)) : 'javascript:void(0)';
 
      ?>

 

       <div class="col-lg-4 col-md-6">

                  <div class="product-card">
                    {!!checkInStock($stock)!!}
                  
                    <div class="badge sale-badge">{!!$type!!}</div>
                     <a href="{{$url}}"  class="product-tumb">
                        <img src="{{$pro->thumbnail != null ? url($pro->thumbnail) : ''}}" alt="">            
                     </a>
                    <div class="product-details">                              
                        <h4>{{$product->name}}</h4>
                        <p>{{$product->short_description}}</p>
                        <div class="product-bottom-details">
                          @php $price = $pro->productPrice(); @endphp
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


@else

@include('errors.not-found')

@endif




