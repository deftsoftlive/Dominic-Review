@extends('e-shop.layouts.checkout')
@section('checkContent')



      <fieldset class="step-content" >
                    <div class="step-form-content">
                        <h2 class="step-content-title">Cart Review</h2>
                     <div class="row">
                           <div class="col-lg-8">                            
                              <div class="cart block">               
                             <table class="cart__table cart-table">
                                    <thead class="cart-table__head">
                                        <tr class="cart-table__row">
                                            <th class="cart-table__column cart-table__column--image">Image</th>
                                            <th class="cart-table__column cart-table__column--product">Product</th>
                                            <th class="cart-table__column cart-table__column--quantity">Quantity</th>
                                            <th class="cart-table__column cart-table__column--total">Total</th>                                           
                                        </tr>
                                    </thead>
                                    <tbody class="cart-table__body">

                                        @foreach($cart as $item)
                                        <?php 
                                                $product = $item->product;
                                                $variation = \App\Models\Products\ProductAssignedVariation::find($item->variant_id);
                                        ?>
    
                                            <tr class="cart-table__row">
                                                <td class="cart-table__column cart-table__column--image">
                                                    <a href=""><img src="{{url($product->thumbnail)}}" alt=""></a>
                                                </td>
                                                <td class="cart-table__column cart-table__column--product"><a href="" class="cart-table__product-name">{{$item->product->name}}</a>
                                                     <h4>Product Type: {{$product->product_type == 1 ? 'Variable' : 'Simple'}}</h4>
                                                     <h4>Price: ${{custom_format($item->price,2)}}</h4>
                                                    @if($product->product_type == 1)
                                                      <ul class="cart-table__options">
                                                          @foreach($variation->hasVariationAttributes as $v)
                                                          <li>{{$v->parentVariation->variations->name}}: 
                                                              <b class="bText">{{$v->parentVariation->name}}</b>
                                                          </li>
                                                          @endforeach
                                                          
                                                      </ul>
                                                   @endif
                                                </td>
                                                
                                                <td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
                                                    <span class="Quantity_number">{{$item->quantity}}</span>
                                                </td>
                                                <td class="cart-table__column cart-table__column--total" data-title="Total">${{custom_format($item->total,2)}}</td>                                        
                                            </tr>
                                        @endforeach
                                     
                                    </tbody>
                                </table>
                                </div>
                    </div> 

                     <div class="col-lg-4" id="priceCartSideBar">
                        @include('e-shop.includes.checkout.priceCartSidebar')
                     </div>         
                   
                    <div class="col-lg-12">
                            <div class="multistep-footer mt-4 text-right"> 
                                <a href="{{$backward}}" type="submit" class="cstm-btn">Back</a>
                                <a href="{{$farward}}" type="submit" class="cstm-btn solid-btn">Save &amp; Continue</a>
                              </div>            
                     </div>
                   </div>
                  </div>
              </fieldset>
                    <!-- End here -->




@endsection