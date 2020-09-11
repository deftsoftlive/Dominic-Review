<div class="quick_view_modal">
<div class="modal fade" id="myModal1">
   <div class="modal-dialog modal-lg cust_scroll">
      <div class="modal-content">
         <div class="modal-header"> 
            <button type="button" onClick="closequickview();" class="close" data-dismiss="modal">&times;</button>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <section class="product-detail-sec featured-product-sec section-padding">
               <div class=" ">
                  <div class="card ">
                     <div class="container-fliud">
                        <div class="wrapper row">
                           <div class="preview col-lg-6">
                              <div class="product-slider-wrap cst_flexslider">
                                 <div id="slider" class="flexslider">
                                    <ul class="slides">
                                    @php 
                                        $product_variation = DB::table('product_assigned_variations')->where('product_id',$product->id)->first();
                                    @endphp
                                    @foreach($product->ProductImages as $img)
                                    <li>
                                        <img src="{{url($img->image)}}" />
                                    </li>
                                    @endforeach
                                </ul>
                                 </div>
                                 <div id="carousel" class="flexslider">
                                    <ul class="slides">
                                    
                                    @foreach($product->ProductImages as $img)
                                    <li class="imgid-{{$img->id}}" id="check-varition">
                                        <img src="{{url($img->image)}}" />
                                    </li>
                                    @endforeach
                                </ul>
                                 </div>
                              </div>
                           </div>
                           <div class="details col-lg-6">
                              <h3 class="product-title">{{$product->name}}</h3>
                              <div class="price-rating-wrap">
                                 <h4 class="price">
                                    <span>
                                      <div class="product-price">£{{$product->final_price}}</div>

                                    <!--   @if(!empty($product->sale_price))
                                      <div class="product-price">
                                          <small>£ {{$product->price}}</small>
                                            £ @php echo $product->price - $product->sale_price; @endphp
                                      </div>
                                      @else
                                      <div class="product-price">£ {{$product->final_price}}</div>
                                      @endif -->
                                    </span>
                                 </h4>
                              </div>
                              <p class="product-description">{!! $product->description !!}</p>
                              <!-- <p class="vote"><strong>Stock : </strong> In Stock
                              </p> -->
                              <br/>
                                <a href="{{url('/shop/product')}}/{{$product->slug}}">View Full Product Information</a>
                                @if(Auth::check())
                                    <form id="ADDToCART" action="{{url(route('shop.ajax.addToCart',$product->id))}}">
                                @else
                                    <form action="{{url('login')}}">
                                @endif
                                <!-- <div id="ProductDetailFilter">
                                    @include('e-shop.includes.products.addToCartForm')
                                </div> -->
                                
                                 <div class="action btn-wrap mt-3"> 
                                    <button class="cstm-btn solid-btn cartButton" type="submit">add to cart</button>  
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!--  End -->
               </div>
            </section>
         </div>
      </div>
   </div>
</div>
<div class="modal-backdrop fade"></div>
</div>