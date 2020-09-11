 
@if($product->product_type == 1)
 <?php
  $assigned = $product->cartOptions();
  $i=0;
 
  $producthasVariant = $pro->getChildVariationAccordingSubProduct(); 
 ?>


  <div class="preview col-lg-6">
              <div class="product-slider-wrap cst_flexslider">
                  <div id="slider" class="flexslider">
                      <ul class="slides">
                        @php 
                          $product_variation = DB::table('product_assigned_variations')->where('product_id',$product->id)->where('type','!=', '')->where('attribute_id','!=','')->get();
                        @endphp
                          @foreach($product->ProductImages as $img)
                          <li>
                              <img src="{{url($pro->thumbnail)}}" />
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

          @if($product->variant_id == 1)
          <div class="details col-lg-6">
              <h3 class="product-title">{{$product->name}}</h3>

              <div class="price-rating-wrap">
                  @if($product->product_type == 1)
                  <h4 class="price"><span>{!!$pro->productPrice()['html']!!}</span></h4>
                  @else
                  <h4 class="price"><span>{!!$product->productPrice()['html']!!}</span></h4>
                  @endif
              </div>

              <p class="product-description">{{$product->short_description}}</p>
          @endif

              @if(Auth::check())
                <form id="ADDToCART" action="{{url(route('shop.ajax.addToCart',$product->id))}}">
              @else
                <form action="{{url('login')}}">
              @endif
                  <div id="ProductDetailFilter">
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
                  </div>
 
@endif