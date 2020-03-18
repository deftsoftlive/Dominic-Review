
@if(Auth::check())


@foreach(Auth::user()->myShopWishList as $item)
<?php
                      $product = $item->product;
                      $variation = $product->ProductAssignedVariations->first();
                      $price = $product->product_type == 1 ? $variation->final_price : $product->final_price;
                      $reviews = ProductRate($product);
?>
    <tr class="wishlist__row">
                <td class="wishlist__column wishlist__column--image">
                    <a href="{{url(route('shop.product.detail.page',$item->product->slug))}}"><img src="{{url($item->product->thumbnail)}}" alt=""></a>
                </td>
                <td class="wishlist__column wishlist__column--product">
                    <a href="{{url(route('shop.product.detail.page',$item->product->slug))}}" class="wishlist__product-name">{{$item->product->name}}</a>
                    <div class="wishlist__product-rating">
                            @if($product->reviews != null && $product->reviews->count() > 0)  
                               {!!$reviews['rating']!!}

                            @endif
                    </div>
                </td>
                <td class="wishlist__column wishlist__column--stock">
                    <div class="stock-badge badge-success">In Stock</div>
                </td>
                <td class="wishlist__column wishlist__column--price">${{custom_format($price,2)}}</td>
               <!--  <td class="wishlist__column wishlist__column--tocart">
                    <button type="button" class="cstm-btn solid-btn btn-sm">Add To Cart</button>
                </td> -->
                <td class="wishlist__column wishlist__column--remove">
                     <a href="#" class="btn btn-light btn-sm btn-svg-icon cartItemQtys"
                                            data-type="remove"
                                            data-id="{{$item->id}}"
                                            data-disable="1">
                                           <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
    </tr>
@endforeach

@endif