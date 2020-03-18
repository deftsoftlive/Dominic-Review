                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
@foreach($userCartContent->get() as $item)
<?php
    $product = $item->VariantProduct != null && $item->VariantProduct->count() > 0 ? $item->VariantProduct : $item->product;
    $product = $item->variant_id > 0 ? App\Models\Products\Product::where('variant_id',$item->variant_id)->first() : $item->product;
    $variation = \App\Models\Products\ProductAssignedVariation::find($item->variant_id);
    $stock = $product->checkStock();
    $TotalStock = $stock != null ? $stock->stock : 10;
    $availableStock = $TotalStock > 0 ? ($TotalStock - $item->quantity) : 0;
    $stockMessage = $availableStock <= 1 ? $availableStock == 0 ? 'no item' : $availableStock.' item left only' : $availableStock.' items left only';

  
 ?>

                         <tr class="cart-table__row">
                                <td class="cart-table__column cart-table__column--image">
                                    <a href=""><img src="{{url($product->thumbnail)}}" alt=""></a>
                                </td>
                                <td class="cart-table__column cart-table__column--product">
                                    <a href="" class="cart-table__product-name">{{$product->name}}</a>
                                    <h4>Product Type: {{$product->product_type == 1 ? 'Variable' : 'Simple'}}</h4>
                                   
                                  @if($product->product_type == 1)
                                    <ul class="cart-table__options">
                                        @foreach($variation->hasVariationAttributes as $v)
                                                <li>{{$v->parentVariation->variations->name}}: 
                                                    <b class="bText">{{$v->parentVariation->name}}</b>
                                                </li>
                                        @endforeach
                                        
                                    </ul>
                                 @endif


                                  @if($stock != null)
                                            
                                           <p class="vote"><strong>Stock : </strong> {{$availableStock == 0 ? 'Out Of Stock' : 'In Stock'}} 

                                           {!!$stock->lowInStock >= $availableStock ? '<strong>('.$stockMessage.')</strong>' :''!!}
                                          </p>
                                  @endif

                                </td>
                                <td class="cart-table__column cart-table__column--price" data-title="Price">
                                   ${{custom_format($item->price,2)}}    

                                </td>
                                <td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
                                    <div class="input-number">
                                        <input class="form-control input-number__input" 
                                        type="number" min="1" value="{{$item->quantity}}">
                                        <a class="input-number__sub cartItemQty {{$item->quantity == 1 ? 'disabled-type' : ''}}"
                                        data-type="sub"
                                        data-id="{{$item->id}}"
                                        data-disable="{{$item->quantity == 1 ? 0 : 1}}"
                                        >
                                          <i class="fas fa-minus"></i>
                                        </a>
                                        <a 
                                        class="input-number__add cartItemQty {{$availableStock == 0 ? 'disabled-type' : ''}}"
                                        data-type="add"
                                        data-id="{{$item->id}}"
                                        data-disable="{{$availableStock == 0 ? 0 : 1}}"
                                         >
                                         <i class="fas fa-plus"></i>
                                        </a>
                                    </div>
                                </td>
                                <td class="cart-table__column cart-table__column--total" data-title="Total">

                                        ${{($item->price * $item->quantity)}} 
                                </td>
                                <td class="cart-table__column cart-table__column--remove">
                                    <a href="javascript" class="btn btn-light btn-sm btn-svg-icon cartItemQty"
                                        data-type="remove"
                                        data-id="{{$item->id}}"
                                        data-disable="1"
                                    >
                                       <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                          </tr>









 @endforeach


