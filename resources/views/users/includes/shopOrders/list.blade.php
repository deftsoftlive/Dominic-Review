   
@foreach($orders->orderItems as $item)
<?php
    $product = $item->product;
    $variation = \App\Models\Products\ProductAssignedVariation::find($item->variant_id);
    $review = $item->orderReview();
 ?>

                         <tr class="cart-table__row">
                                <td class="cart-table__column cart-table__column--image">
                                    <a href="">
                                        <img src="{{url($product->thumbnail)}}" alt="" width="120">
                                    </a>
                                </td>
                                <td class="cart-table__column cart-table__column--product">
                                    <a href="" class="cart-table__product-name">{{$product->name}}</a>
                                    <h4>Product Type: {{$product->product_type == 1 ? 'Variable' : 'Simple'}}</h4>
                                   
                                  @if($product->product_type == 1)
                                    <ul class="cart-table__options">
                                        @foreach($variation->hasVariationAttributes as $v)
                                        <li>{{$v->parentVariation->variations->name}}: <b class="bText">{{$v->parentVariation->name}}</b></li>
                                        @endforeach
                                        
                                    </ul>
                                 @endif
                                 @if($orders->status == 3 && $review->count() == 0)
                                      <a href="{{route('users.shop.order.review',[$orders->id,$item->id])}}" class="btn btn-primary">Add Review About the Product</a>
                                 @endif


                                </td>
                                <td class="cart-table__column cart-table__column--price" data-title="Price">
                                   ${{custom_format($item->price,2)}}    

                                </td>
                                <td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
                                    <div class="input-number">
                                           {{$item->quantity}} {{$item->quantity > 1 ? 'Items' : 'Item'}}
                                    </div>
                                </td>
                                <td class="cart-table__column cart-table__column--total" data-title="Total">
                                        ${{custom_format(($item->price * $item->quantity),2)}} 
                                </td>
                                 
                          </tr>









 @endforeach


