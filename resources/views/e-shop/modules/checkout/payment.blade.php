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
                        <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"><span class="tab-icon"><i class="fab fa-cc-paypal"></i></span>Childcare Vouchers</a>
                    </li>
                </ul><!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="tabs-1" role="tabpanel">
                        @include('e-shop.includes.checkout.stripe')
                    </div>
                    <div class="tab-pane" id="tabs-2" role="tabpanel">
                        <a href="javascript:void(0);" class="cstm-btn" data-toggle="modal" data-target="#exampleModal">Childcare Voucher</a>
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
                            <div class="modal-body">
                            	
                                <p>{{ getAllValueWithMeta('childcare_subheading', 'child-care-popup') }}</p>

                                {!! getAllValueWithMeta('childcare_content', 'child-care-popup') !!}

                                <form method="POST" id="childcare_form" action="{{route('save_childcare_voucher')}}" class="pick-option">
                                @csrf
                                  <p class="child_cont">{{ getAllValueWithMeta('providers_heading', 'child-care-popup') }}</p>

                                  @php 
                                    $providers = DB::table('childcare_vouchers')->where('status',1)->orderBy('id','asc')->get();
                                  @endphp
                                
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

                                <br/>
                                <div class="form-check button-check">
                                    <button id="submit-childcare" type="submit" class="cstm-btn">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <br />
                <div id="coupon_msg">
                </div>
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
                    <button type="submit" class="cstm-btn">Remove Coupon</button>
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
                            <button value="Apply coupon" id="submit_coupon" class="cstm-btn" title="Apply coupon" type="submit"><span>Apply coupon</span></button>
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
                <a href="{{$backward}}" class="cstm-btn">Back</a>
            </div>
        </div>
    </div>
</fieldset>
<!-- End -->
@endsection