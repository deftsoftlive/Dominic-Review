@extends('inc.homelayout')
@extends('e-shop.layouts.checkout')
@section('checkContent')

<style>
header.Eshop-header {
    display: none;
}
</style>
      <fieldset class="step-content" >
                    <div class="step-form-content">
                        <h2 class="step-content-title">Cart Review</h2>
                     <div class="row">
                           <div class="col-lg-8">                            
                              <div class="cart block">               
                             <table class="cart__table cart-table">
                                    <thead class="cart-table__head">
                                        <tr class="cart-table__row">
                                            <th class="cart-table__column cart-table__column--image">Item</th>
                                            <th class="cart-table__column cart-table__column--product">Product</th>
                                            <th class="cart-table__column cart-table__column--quantity">Quantity</th>
                                            <th class="cart-table__column cart-table__column--total">Total</th>                                           
                                        </tr>
                                    </thead>
                                    <tbody class="cart-table__body">

                                        @foreach($cart as $item)

                                        @if($item->shop_type == 'product')
                                        @php 
                                            $product = $item->product;
                                            $variation = \App\Models\Products\ProductAssignedVariation::find($item->variant_id);
                                        @endphp
    
                                            <tr class="cart-table__row">
                                                <td class="cart-table__column cart-table__column--image">
                                                    <a href=""><img src="{{url($product->thumbnail)}}" alt=""></a>
                                                </td>
                                                <td class="cart-table__column cart-table__column--product"><a href="" class="cart-table__product-name">{{$item->product->name}}</a>
                                                  @if(!empty($item->voucher_details))
                                                     <h4>Product Type: Voucher</h4>
                                                  @else
                                                     <h4>Product Type: {{$product->product_type == 1 ? 'Variable' : 'Simple'}}</h4>
                                                  @endif
                                                     <h4>Price: &pound;{{custom_format($item->price,2)}}</h4>
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
                                                <td class="cart-table__column cart-table__column--total" data-title="Total">&pound;{{custom_format($item->total,2)}}</td>                                        
                                            </tr>

                                        @elseif($item->shop_type == 'course')
                                        @php 
                                          $course_id = $item->product_id;
                                          $course = DB::table('courses')->where('id',$course_id)->first();  
                                          $child = DB::table('users')->where('id',$item->child_id)->first();
                                        @endphp
                                          <tr class="cart-table__row">
                                                <td class="cart-table__column cart-table__column--image"><b>Course </b></td>

                                                <td class="cart-table__column cart-table__column--product"><a href="" class="cart-table__product-name">{{$course->title}}</a>
                                                  <ul class="cart-table__options">
                                                    <li>Participant: 
                                                      <b class="bText">{{isset($child->name) ? $child->name : 'No child selected'}}</b>
                                                    </li>                 
                                                  </ul>
                                                </td>
                                                
                                                <td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
                                                    <span class="Quantity_number">{{$item->quantity}}</span>
                                                </td>
                                                <td class="cart-table__column cart-table__column--total" data-title="Total">&pound;{{custom_format($item->total,2)}}</td>                                        
                                            </tr>

                                        @elseif($item->shop_type == 'camp')
                                        @php 
                                          $camp_id = $item->product_id;
                                          $camp = DB::table('camps')->where('id',$camp_id)->first(); 
                                          $child = DB::table('users')->where('id',$item->child_id)->first();
                                          $week = json_decode($item->week); 
                                        @endphp
                                          <tr class="cart-table__row">
                                                <td class="cart-table__column cart-table__column--image"><b>Camp </b></td>

                                                <td class="cart-table__column cart-table__column--product"><a href="" class="cart-table__product-name">{{$camp->title}}</a>
                                                  <ul class="cart-table__options">
                                                    <li>Participant: 
                                                      <b class="bText">{{isset($child->name) ? $child->name : 'No child selected'}}</b>
                                                    </li>                 
                                                  </ul>
                                               
                                                <br/>
                                                
                                                  @foreach($week as $number=>$number_array)

                                                      @foreach($number_array as $data=>$user_data)

                                                        @foreach($user_data as $data1=>$user_data1)
                                                          @php 
                                                            $split = explode('-',$user_data1);
                                                            $get_session = $split[2];
                                                          @endphp
                                                          @if($get_session == 'early')
                                                            <li>{{$number}} - {{$data1}} - Early Drop Off<br/></li>
                                                          @elseif($get_session == 'mor')
                                                            <li>{{$number}} - {{$data1}} - Morning<br/></li>
                                                          @elseif($get_session == 'noon')
                                                            <li>{{$number}} - {{$data1}} - Afternoon<br/></li>
                                                          @elseif($get_session == 'lunch')
                                                            <li>{{$number}} - {{$data1}} - Lunch Club<br/></li>
                                                          @elseif($get_session == 'late')
                                                            <li>{{$number}} - {{$data1}} - Late Pickup<br/></li>
                                                          @elseif($get_session == 'full')
                                                            <li>{{$number}} - {{$data1}} - Full Day<br/></li>
                                                          @endif
                                                        @endforeach
                                                      
                                                        @endforeach

                                                    @endforeach
                                              </td>
                                                
                                                <td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
                                                    <span class="Quantity_number">{{$item->quantity}}</span>
                                                </td>
                                                <td class="cart-table__column cart-table__column--total" data-title="Total">&pound;{{custom_format($item->total,2)}}</td>                                        
                                            </tr>
                                        @endif

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
                               <!--  <a href="{{$backward}}" type="submit" class="cstm-btn">Back</a> -->
                                <a href="{{url('/shop/cart')}}" type="submit" class="cstm-btn main_button solid-btn">Back to basket</a>
                                <a href="{{$farward}}" type="submit" class="cstm-btn main_button solid-btn">Save &amp; Continue</a>
                              </div>            
                     </div>
                   </div>
                  </div>
              </fieldset>
                    <!-- End here -->




@endsection