 <section class="featured-product-sec related-product-sec">
         <div class="container">
             <div class="sec-heading text-center">
                <h2>RELATED PRODUCTS</h2>
            </div>
            <div class="featured-product-wrap">
                    <div class="owl-carousel owl-theme featured-product-slider">

                           @foreach($relatedProduct as $product)
                                <?php
                                    $complete1 = $product->ProductAssignedVariations != null && $product->ProductAssignedVariations->count() > 0 ? 1 : 0;
                                    $complete2 = $product->product_type == 0 && $product->price > 0 ? 1 : 0;
                                    $complete = $product->product_type == 0 ? $complete2 : $complete1;
                                    $type = $complete == 0 ? 'Comming Soon' : 'Hot';
                                    $url = $complete == 1 ? url(route('shop.product.detail.page',$product->slug)) : 'javascript:void(0)';
                                ?>

 
 

                              <a href="{{$url}}" class="item"> 
                                  <div class="featured-product-card">
                                    <figure class="f-product-img">
                                        <img src="{{$product->thumbnail != null ? url($product->thumbnail) : ''}}">
                                    </figure>
                                     <div class="f-product-detail">
                                         <h4>{{$product->name}}</h4>
                                         <div class="f-product-price text-center">
                                             @php $price = $product->productPrice(); @endphp
                                                {!!$price['html']!!}
                                         </div>
                                     </div>
                                 </div>
                               </a>

                            @endforeach
                       
                         
                       
                     </div>
                    
                </div>
            
         </div>
     </section>