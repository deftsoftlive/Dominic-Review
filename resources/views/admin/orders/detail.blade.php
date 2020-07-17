@extends('layouts.admin')
@section('content')

@php 
  $orderId = $order->orderID;
  $user_id = $order->user_id;
  $user_detail = DB::table('users')->where('id',$user_id)->first();	
  $cart_items = DB::table('shop_cart_items')->where('orderID', $orderId)->get(); 
@endphp
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Orders</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Orders</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>



<!-- [ breadcrumb ] end -->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ Hover-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                      <h5>
                         Orders ({{$order->orderID}})  <a href="{{url('/admin/orders/download')}}/{{$order->id}}" target="_blank" class="new-booking  mt-0 mr-0 mb-10  ml-10 nw_btn_three" style="color: #35486b">
                            <span class="des-view"> <i class="fa fa-download" aria-hidden="true"></i></span>
                        </a>
                      </h5> 
                      <div class="text-right">
                          <h4 class="">Order Total Amount : <b>&pound; {{$order->amount}}</b></h4>
                      </div>
                
                    </div> 

                  <div class="card-block table-border-style"> 
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr> 
                                    <th>Item</th>
                                    <th width="30%">Details</th>  
                                    <th>Coupon Details</th>
                                    <th>Price Details</th> 
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($cart_items as $cart)

                                  @if($cart->shop_type == 'product')
                                  @php 
                                    $pro_id = $cart->product_id;
                                    $product_detail = DB::table('products')->where('id',$pro_id)->first(); 
                                    $cat_id = getProductCatname($product_detail->category_id);
                                    $sub_cat_id = getProductCatname($product_detail->subcategory_id);

                                    $extra = getAllValueWithMeta('service_fee_amount', 'global-settings'); 
                                    $pro_amt = $order->amount - $extra;

                                    $variation = \App\Models\Products\ProductAssignedVariation::find($cart->variant_id);
                                  @endphp
                                    <tr>           
                                        <td><img src="{{url($product_detail->thumbnail)}}" width="100"></td>                               
                                        <td>
                                          @if(!empty($cart->voucher_details))
                                              
                                          @endif
                                          <h5>{{$product_detail->name}}</h5>
                                          @if(!empty($cart->voucher_code)) 
                                            <p><b>Voucher - {{$cart->voucher_code}}</b></p> 
                                          @endif
                                          <p>{{$cat_id}} | {{$sub_cat_id}}</p>
                                          <p>
                                            @if($product_detail->product_type == 1)
                                              @foreach($variation->hasVariationAttributes as $v)
                                                {{$v->parentVariation->variations->name}}: 
                                                  <b class="bText">{{$v->parentVariation->name}}</b> <br/>
                                              @endforeach
                                            @endif
                                          </p>
                                        </td>                               
                                        <td>{{isset($cart->discount_code) ? $cart->discount_code : '-'}}
                                        <br/>
                                        @if(!empty($cart->discount_code))
                                        	&pound;{{$cart->discount_price}} off on {{$product_detail->name}}
                                        @endif
                                        </td>                               
                                        <td>&pound;{{$cart->price}}
                                         <!--  @if($cart->price == $pro_amt)
                                            &pound;{{$cart->price}}
                                          @elseif($cart->price <= $pro_amt)
                                          @php $quantity = $pro_amt / $cart->price; @endphp
                                            {{$quantity}} x &pound;{{$cart->price}}
                                          @endif -->
                                          </td>                                
                                    </tr> 
                                  @elseif($cart->shop_type == 'course')
                                  @php 
                                    $course_id = $cart->product_id;
                                    $course = DB::table('courses')->where('id',$course_id)->first();  
                                    $child = DB::table('users')->where('id',$cart->child_id)->first();
                                  @endphp
                                    <tr>           
                                        <td>Course</td>                               
                                        <td>
                                          <h5>{{$course->title}}</h5>
                                          <p>{{$course->term}} | {{$course->day_time}}</p>
                                          <p><b>Child</b> :{{$child->name}}</p>
                                        </td>                               
                                        <td>{{isset($cart->discount_code) ? $cart->discount_code : '-'}}
                                        <br/>
                                        @if(!empty($cart->discount_code))
                                        	&pound;{{$cart->discount_price}} off on {{$course->title}}
                                        @endif
                                        </td>                                
                                        <td>&pound;{{$cart->price}}
                                          </td>                                
                                    </tr> 
                                  @elseif($cart->shop_type == 'camp')
                                  @php 
                                    $week = json_decode($cart->week); 
                                    $camp_id = $cart->product_id;
                                    $camp = DB::table('camps')->where('id',$camp_id)->first();  
                                    $child = DB::table('users')->where('id',$cart->child_id)->first();
                                  @endphp
                                    <tr>           
                                        <td>Camp</td>                               
                                        <td>
                                          <h5>{{$camp->title}}</h5>
                                          <p><b>Child</b> :{{isset($child->name) ? $child->name : 'No Child Selected'}}</p>
                                          <p>
                                            @foreach($week as $number=>$number_array)

                                            @foreach($number_array as $data=>$user_data)

                                              @foreach($user_data as $data1=>$user_data1)
                                                @php 
                                                  $split = explode('-',$user_data1);
                                                  $get_session = $split[2];
                                                @endphp
                                                @if($get_session == 'early')
                                                  {{$number}} - {{$data1}} - Early Drop Off<br/>
                                                @elseif($get_session == 'mor')
                                                  {{$number}} - {{$data1}} - Morning<br/>
                                                @elseif($get_session == 'noon')
                                                  {{$number}} - {{$data1}} - Afternoon<br/>
                                                @elseif($get_session == 'lunch')
                                                  {{$number}} - {{$data1}} - Lunch Club<br/>
                                                @elseif($get_session == 'late')
                                                  {{$number}} - {{$data1}} - Late Pickup<br/>
                                                @elseif($get_session == 'full')
                                                  {{$number}} - {{$data1}} - Full Day<br/>
                                                @endif
                                              @endforeach
                                            
                                              @endforeach

                                          @endforeach
                                          </p>
                                          
                                        </td>                               
                                        <td>{{isset($cart->discount_code) ? $cart->discount_code : '-'}}
                                        <br/>
                                        @if(!empty($cart->discount_code))
                                          &pound;{{$cart->discount_price}} off on {{$camp->title}}
                                        @endif
                                        </td>                                
                                        <td>&pound;{{$cart->price}}
                                          </td>                                
                                    </tr> 
                                  @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div> 

                    </div>
                                               
        @include('admin.error_message')


<!-- User Details - Start Here -->
<div class="col-xl-12 col-md-12 m-b-30">
         <div class="card">
            <div class="card-body">
               <div class="row">
                  <div class="col-lg-6">
               <div class="total-price-wrap full-invoice">
                  <div id="cartTotals">
                    <div class="total-price-wrap">
                    
                   <div id="cartTotals">
                      <div class="cart-totals ">
                                  <div class="text-center cst_heading">
                                  <h3>User Details</h3>
                                </div> 

                                  <table class="cart-table margin-top-5">
                                     
                                     
                                    <tbody>
                                      <tr>
                                        <th>Name</th>
                                        <td>
                                          <strong>{{$user_detail->name}}</strong>
                                        </td>
                                      </tr>
                                       
                                      <tr>
                                        <th>Email</th>
                                        <td>
                                          <strong>{{$user_detail->email}}</strong>
                                        </td>
                                      </tr>
                                       
                                      <tr>
                                        <th>Phone No.</th>
                                        <td><strong>{{$user_detail->phone_number}}</strong></td>
                                      </tr>
                                                   
                                  </tbody>
                                </table>
             
                      </div>
                   </div>
                     
                  </div>
                </div>
               </div>
              </div>
               <div class="col-lg-6">
                     <div class="total-price-wrap full-invoice">
                        <div id="cartTotals">
                          <div class="total-price-wrap">
                          
                         <div id="cartTotals">
                            <div class="cart-totals ">
                                        <div class="text-center cst_heading">
                                        <h3>Full Invoice</h3>
                                      </div> 

                                        <table class="cart-table margin-top-5">
                                           
                                           
                                          <tbody>
                                            <?php $extra = getAllValueWithMeta('service_fee_amount', 'global-settings'); 
                                              $pro_amt = $order->amount - $extra;
                                            ?>

                                            <tr>
                                              <th>Payment Method</th><td><strong></strong>{{$order->payment_by}}</td>
                                            </tr>

                                            @if(!empty($order->provider_id))
                                            @php 
                                              $provider = DB::table('childcare_vouchers')->where('id',$order->provider_id)->first();
                                            @endphp
                                            <tr>
                                              <th>Selected Provider</th><td><strong></strong>{{$provider->provider_name}}</td>
                                            </tr>
                                            @endif

                                            <tr>
                                              <th>Cart Subtotal</th>
                                              <td>
                                                <strong>&pound; {{$pro_amt}}</strong>
                                              </td>
                                            </tr>

                                           <!--  <tr>
                                                <th>Service Fee</th><td><strong><span class="plus-sign">+</span>{{$extra}}</strong></td>
                                            </tr> -->
                                             
                                            <tr>
                                              <th>Order Total</th>
                                              <td><strong>&pound; {{$order->amount}}</strong></td>
                                            </tr>
                                                         
                                        </tbody>
                                      </table>
                   
                            </div>
                         </div>
                           
                        </div>
                      </div>
                     </div>
                </div>
               </div>
           </div>
       </div>
   </div>
<!-- User Details - End Here -->

<!-- Shipping/Billing Address - Start Here -->

<?php 
  $shop_type = array(); 
  foreach($cart_items as $sh){
    $shop_type[] = $sh->shop_type;
  }

if (in_array('product', $shop_type, TRUE)){ ?> 
  <div class="col-xl-12 col-md-12 m-b-30">
         <div class="card">
            <div class="card-body">
               <div class="row">
               <div class="col-lg-6">
               <div class="total-price-wrap full-invoice">
                  <div id="cartTotals">
                    <div class="total-price-wrap">
                    
                   <div id="cartTotals">
                      <div class="cart-totals ">
                                  <div class="text-center cst_heading">
                                  <h3>Shipping Address</h3>
                                </div> 
                                @php 
                                  $shipping_add = json_decode($order->shipping_address); 
                                @endphp
                                  <table class="cart-table margin-top-5">
                                     
                                     
                                    <tbody>
                                      <tr>
                                          <th>Name</th><td><strong>{{$shipping_add->name}}</strong></td>
                                      </tr>

                                      <tr>
                                          <th>Email</th><td><strong>{{$shipping_add->email}}</strong></td>
                                      </tr>

                                      <tr>
                                          <th>Phone Number</th><td><strong>{{$shipping_add->phone_number}}</strong></td>
                                      </tr>
                                       
                                      <tr>
                                        <th>Address</th>
                                        <td><strong>{{$shipping_add->address}}, {{$shipping_add->country}}, {{ $shipping_add->state}}, {{ $shipping_add->city}}, Zipcode- {{$shipping_add->zipcode}}</strong></td>
                                      </tr>
                                              
                                       

                                         
                                  </tbody>
                                </table>
                                  
                                 
                      </div>
                   </div>
                     
                  </div>
                </div>
               </div>
              </div>
               <div class="col-lg-6">
               <div class="total-price-wrap full-invoice">
                  <div id="cartTotals">
                    <div class="total-price-wrap">
                    
                   <div id="cartTotals">
                      <div class="cart-totals  ">
                                  <div class="text-center cst_heading">
                                  <h3>Billing Address</h3>
                                </div> 
                                @php 
                                  $billing_add = json_decode($order->billing_address); 
                                @endphp
                                  <table class="cart-table margin-top-5">
                                     
                                     
                                    <tbody>
                                      <tr>
                                          <th>Name</th><td><strong>{{$billing_add->name}}</strong></td>
                                      </tr>

                                      <tr>
                                          <th>Email</th><td><strong>{{$billing_add->email}}</strong></td>
                                      </tr>

                                      <tr>
                                          <th>Phone Number</th><td><strong>{{$billing_add->phone_number}}</strong></td>
                                      </tr>
                                       
                                      <tr>
                                        <th>Address</th>
                                        <td><strong>{{$billing_add->address}}, {{$billing_add->country}}, {{ $billing_add->state}}, {{ $billing_add->city}}, Zipcode- {{$billing_add->zipcode}}</strong></td>
                                      </tr>

                                         
                                  </tbody>
                                </table>
                                  
                                 
                      </div>
                   </div>
                     
                  </div>
                </div>
               </div>
              </div>
               </div>
           </div>
       </div>
   </div>
<?php } ?>
<!-- Shipping/Billing Address - End Here -->



 </div>
</div>
</div>
</div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
 
 
 
</script>
     
@endsection