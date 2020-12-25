@extends('inc.homelayout')
@extends('e-shop.layouts.checkout')
@section('checkContent')
<style>
header.Eshop-header {
    display: none;
}

</style>
<!-- fourth step content starts here -->
<fieldset class="step-content">
    <h2 class="step-content-title">Payment</h2>
    <div class="row">
        <div class="col-lg-8">
            <div class="Payment-block">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"><span class="tab-icon"><i class="fas fa-credit-card"></i></span>Card</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"><span class="tab-icon"><i class="fas fa-id-card"></i></span>Childcare Vouchers & Tax-Free Childcare</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"><span class="tab-icon"><i class="fas fa-envelope-open"></i></span>Wallet</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="tabs-1" role="tabpanel">
                        @include('e-shop.includes.checkout.stripe')

                        <a id="zero_pay_button" style="display: none;" href="javascript:void(0);" class="cstm-btn main_button" data-toggle="modal" data-target="#stripePopup">Place Order</a>

                        <!-- Modal -->
                        <div class="modal fade" id="stripePopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Confirm your order</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                      
                                    <div class="tect-wrap">
                                      <p>Are you sure you wish to confirm your order?</p>
                                      <br/>

                                        <!-- <button type="button" class="btn btn-primary cstm-btn main_button">
                                            Conform Order
                                        </button> -->

                                        <form id="save_wallet" action="{{route('save_wallet')}}" method="POST">
                                            @csrf
                                            <button class="wallet_confirm_order cstm-btn main_button" >Confirm Order</button>
                                        </form>
                                    </div>
                              
                              </div>
                             
                            </div>
                          </div>
                        </div>

                    </div>
                    <div class="tab-pane" id="tabs-2" role="tabpanel">
                        @php 
                            $shop_cart = DB::table('shop_cart_items')->where('user_id',Auth::user()->id)->where('type','cart')->get();
                            $shop_items = [];
                            $courses = [];
                            $camps = [];
                        @endphp
                        
                        @foreach($shop_cart as $shop)
                            @php $shop_items[] = $shop->shop_type; @endphp

                            @if($shop->shop_type == 'course')
                                @php $courses[] = $shop->product_id; @endphp
                            @endif

                            @if($shop->shop_type == 'camp')
                                @php $camps[] = $shop->product_id; @endphp
                            @endif
                        @endforeach
                        
                        @if(in_array('product',$shop_items))
                            <div class="alert_msg alert alert-danger shop_items">
                                <p>Shop items can never be paid using vouchers</p>
                            </div>
                        @else
                        @endif
                            @php 
                                $link_course_camp = DB::table('childcare_vouchers')->first();

                                $selected_courses = explode(',',$link_course_camp->linked_course);
                                $selected_camps = explode(',',$link_course_camp->linked_camp);
                            @endphp

                            @if(!empty($selected_courses) && !empty($courses))

                            @foreach($courses as $co)
                                @if(in_array($co,$selected_courses))   

                                @else
                                    <div class="alert_msg alert alert-danger course_items">
                                        <p>Course present in cart is not linked with childcare vouchers.</p>
                                    </div>
                                @endif
                            @endforeach
                            @endif

                            @if(!empty($selected_camps) && !empty($camps))

                            @foreach($camps as $ca)
                                @if(in_array($ca,$selected_camps))   

                                @else
                                    <div class="alert_msg alert alert-danger camp_items">
                                        <p>Camp present in cart is not linked with childcare vouchers.</p>
                                    </div>
                                @endif
                            @endforeach
                            @endif

                         <a id="childcare_btn" style="display: none;" href="javascript:void(0);" class="cstm-btn main_button" data-toggle="modal" data-target="#exampleModal">Pay with vouchers or Tax-Free Childcare</a>

                    </div>
                    <div class="tab-pane" id="tabs-3" role="tabpanel">
                        @php 
                            $wallet = DB::table('wallets')->where('user_id',Auth::user()->id)->first(); 

                            $shop = DB::table('shop_cart_items')->where('user_id',Auth::user()->id)->where('type','cart')->where('orderID',NULL)->get();   

                            $cart_price = [];
                        @endphp

                        @if(!empty($wallet))
                        @php
                            $wallet_amount = $wallet->money_amount; 
                        @endphp
                        @endif

                        @foreach($shop as $sh)
                            @php $cart_price[] = $sh->total; @endphp
                        @endforeach

                        @php
                            $cart_total = array_sum($cart_price);
                        @endphp

                        @if(!empty($wallet_amount))
                        
                        @if(!empty($cart_total) && ($cart_total <= $wallet_amount))
                            <!-- <form action="{{route('save_wallet')}}" method="POST">
                                @csrf
                                <button class="cstm-btn main_button" >Pay With Wallet</button>
                            </form> -->

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary cstm-btn main_button" data-toggle="modal" data-target="#wallet_payment">
                              Confirm payment with wallet funds
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="wallet_payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Pay with Wallet</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                          <ul>
                                              <li><p>Wallet Amount:<span> &pound;{{isset($wallet_amount) ? $wallet_amount : ''}}</span></p></li>
                                              <li><p>Cart Amount:<span> &pound;{{$cart_total}}</span></p></li>
                                          </ul>
                                        <div class="tect-wrap">
                                          <p>Are you sure you wish to pay using wallet funds?</p>

                                            <!-- <button type="button" class="btn btn-primary cstm-btn main_button">
                                                Conform Order
                                            </button> -->

                                            <form id="save_wallet" action="{{route('save_wallet')}}" method="POST">
                                                @csrf
                                                <button class="wallet_confirm_order cstm-btn main_button" >Confirm Order</button>
                                            </form>
                                        </div>
                                  
                                  </div>
                                 
                                </div>
                              </div>
                            </div>

                        @elseif($cart_total > $wallet_amount)

                            <p>Wallet Amount - &pound;{{isset($wallet_amount) ? $wallet_amount : ''}}</p>
                            <p>Cart Total - &pound;{{$cart_total}}</p>
                            <br/>
                            <div class="alert_msg alert alert-danger">
                                <p>Your wallet has insufficient amount. You have to pay the rest amount from your card.</p><br/>
                                <a target="_blank" href="{{url('/user/add-money-to-wallet')}}" class="cstm-btn main_button">Add Wallet Money</a>
                            </div>
                            <br/>
                        @else
                        
                        @endif
                        
                        @elseif(isset($wallet_amount) && $wallet_amount == 0)
                        <div class="alert_msg alert alert-danger">
                            <p>Your wallet has no money. Please use another payment gateway for purchase.</p><br/>
                            <a target="_blank" href="{{url('/user/add-money-to-wallet')}}" class="cstm-btn main_button">Add Wallet Money</a>
                        </div>
                        @else($wallet_amount == '')
                        <div class="alert_msg alert alert-danger">
                            <p>Your wallet has no money. Please use another payment gateway for purchase.</p><br/>
                            <a target="_blank" href="{{url('/user/add-money-to-wallet')}}" class="cstm-btn main_button">Add Wallet Money</a>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="modal fade child-voc" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="pink-heading">
                                    <h2>{{ getAllValueWithMeta('childcare_heading', 'child-care-popup') }}</h2>
                                </div>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                            </div>

                            <form method="POST" id="childcare_form" action="{{route('save_childcare_voucher')}}" class="pick-option"> @csrf
                            <div class="modal-body">
                                <p>{{ getAllValueWithMeta('childcare_subheading', 'child-care-popup') }}</p>
                                {!! getAllValueWithMeta('childcare_content', 'child-care-popup') !!}

                                <div class="form-check child_check_wrap">
                                    <div class="cstm-check">
                                        <input id="checkbox1" class="checkbox-style col-1-W1 " type="checkbox" value="1">
                                        <label for="checkbox1" class="checkbox-style-3-label"></label>
                                        <input type="hidden" id="checkbox1" name="checkbox1" value="1">I have read all the information.
                                    </div>
                                    <!-- <input type="checkbox" name="accept" id="accept" > I have read all the information. -->
                                </div>
                                <br/>
                            </div>
                            <div class="modal-footer">
                                    <p class="child_cont">{{ getAllValueWithMeta('providers_heading', 'child-care-popup') }}</p>
                                    @php
                                    $providers = DB::table('childcare_vouchers')->where('status',1)->orderBy('id','asc')->get();
                                    @endphp
                                    <p class="pink-line"></p>
                                    <div class="form-inner-wrap">
                                        @foreach($providers as $pr)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="provider" id="exampleRadios1" value="{{$pr->id}}">
                                            <label class="form-check-label" for="exampleRadios1">
                                                {{$pr->provider_name}}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                    
                                    
                                    <div class="form-check button-check">
                                        <button id="submit-childcare" type="submit" class="cstm-btn main_button">Confirm Order</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <br />
                <div id="coupon_msg"></div>
                @php
                    $coupon = DB::table('shop_cart_items')->where('user_id',Auth::user()->id)->where('orderID', '=', NULL)->where('discount_code','!=',NULL)->get();
                @endphp

                @if(count($coupon)> 0)
                <h5>Coupon Applied On - </h5>
                <br />

                @foreach($coupon as $co)
                @php
                    $discount_code = $co->discount_code;
                    $coupon_details = \DB::table('coupons')->where('coupon_code',$discount_code)->first();
                    $voucher_details = \DB::table('shop_cart_items')->where('voucher_code',$discount_code)->first();
                @endphp

                @if($co->shop_type == 'product')
                @php
                    $prod_id = $co->product_id;
                    $prod = DB::table('products')->where('id',$prod_id)->first();
                @endphp
                - {{$prod->name}}
                (
                @if(!empty($coupon_details))
                @if($coupon_details->discount_type == 0)
                    &pound
                @endif

                @php echo intval($coupon_details->flat_discount) @endphp

                @if($coupon_details->discount_type == 1) % OFF @endif

                @elseif(!empty($voucher_details))

                @php
                    $voucher = DB::table('vouchures')->where('id',$voucher_details->voucher_id)->first();
                @endphp

                @if($voucher->discount_type == 0)
                    &pound
                @endif

                @php echo intval($voucher->flat_discount) @endphp

                @if($voucher->discount_type == 1) % OFF @endif
                @endif
                )
                <br />
                @elseif($co->shop_type == 'course')
                @php
                    $course_id = $co->product_id;
                    $prod = DB::table('courses')->where('id',$course_id)->first();
                @endphp
                - {{$prod->title}}
                (
                @if(!empty($coupon_details))
                @if($coupon_details->discount_type == 0)
                    &pound
                @endif
                @php echo intval($coupon_details->flat_discount) @endphp
                @if($coupon_details->discount_type == 1) % OFF @endif
                @elseif(!empty($voucher_details))

                @php
                    $voucher = DB::table('vouchures')->where('id',$voucher_details->voucher_id)->first();
                @endphp

                @if($voucher->discount_type == 0)
                    &pound
                @endif
                @php echo intval($voucher->flat_discount) @endphp
                @if($voucher->discount_type == 1) % OFF @endif
                @endif
                )
                <br />
                @elseif($co->shop_type == 'camp')
                @php
                $camp_id = $co->product_id;
                $prod = DB::table('camps')->where('id',$camp_id)->first();
                @endphp
                - {{$prod->title}}
                (
                @if(!empty($coupon_details))
                @if($coupon_details->discount_type == 0)
                &pound
                @endif
                @php echo intval($coupon_details->flat_discount) @endphp
                @if($coupon_details->discount_type == 1) % OFF @endif
                @elseif(!empty($voucher_details))
                @php
                $voucher = DB::table('vouchures')->where('id',$voucher_details->voucher_id)->first();
                @endphp
                @if($voucher->discount_type == 0)
                &pound
                @endif
                @php echo intval($voucher->flat_discount) @endphp
                @if($voucher->discount_type == 1) % OFF @endif
                @endif
                )
                <br />
                @endif
                <br />
                <form action="{{route('removeCoupon')}}" method="POST">
                    @csrf
                    <input type="hidden" name="shop_id" value="{{$co->id}}">
                    <button type="submit" class="cstm-btn main_button">Remove Coupon</button>
                </form>
                <br />
                @endforeach
                @else
                @if(Session::has('remove'))
                <div class="alert_msg alert alert-success">
                    <p>{{ Session::get('remove') }} </p>
                </div>
                @endif
                <form action="{{url('/submit-coupon')}}" method="POST" id="discount-coupon-form">
                    @csrf
                    <label for="coupon_code">Enter your coupon code if you have one.</label>
                    <div class="row">
                        <div class="col-sm-7">
                            <input type="text" name="coupon_code" id="coupon_code" class="form-control">
                        </div>
                        <div class="col-sm-5">
                            <button value="Apply coupon" id="submit_coupon" class="cstm-btn main_button" title="Apply coupon" type="submit"><span>Apply coupon</span></button>
                        </div>
                    </div>
                </form>
                @endif
            </div>
        </div>
        <div class="col-lg-4" id="priceCartSideBar">
            @include('e-shop.includes.checkout.priceCartSidebar')
        </div>
        <div class="col-md-12">
            <!-- <button class="cstm-btn solid-btn">Continue</button> -->
            <div class="multistep-footer mt-4 text-right">
                <a href="{{$backward}}" class="cstm-btn main_button">Back</a>
            </div>
        </div>
    </div>
</fieldset>
<!-- End -->
@endsection