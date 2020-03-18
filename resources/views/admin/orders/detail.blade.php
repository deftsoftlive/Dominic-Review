@extends('layouts.admin')
@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Orders</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item">Orders</li>
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
                                           Orders ({{$order->orderID}}) 
                                        </h5>

                                    
                                                <div class="col-md-12 text-right">
                                                    <span class="">Order Total Amount : <b>${{custom_format($order->amount,2)}}</b></span>
                                                </div>
                                    
                                            <!-- <span class="d-block m-t-5">use class <code>table-hover</code> inside table element</span> -->
                                        </div>
 <div class="card-block table-border-style">


    <div class="cart-items-wrap my-order-detail-card">
                        <div class="row no-gutters">
                           <div class="col-lg-2">
                              <div class="cart-col-wrap">
                                 <div class="cart-table-head">
                                    <h3>Event Image</h3>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-5">
                              <div class="cart-col-wrap">
                                 <div class="cart-table-head">
                                    <h3>Details</h3>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-2">
                              <div class="cart-col-wrap">
                                 <div class="cart-table-head">
                                    <h3>AddOns</h3>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-3">
                              <div class="cart-col-wrap">
                                 <div class="cart-table-head">
                                    <h3>Price details
                                    </h3>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- start Heading -->
                                               
        @include('admin.error_message')
        @foreach($order->orderItems as $item)
           @php $extraFees = getOrderExtraFeess($item); @endphp
               <div class="cart-items-wrap my-order-detail-card" id="CartItems">
                        <div class="row no-gutters">
                           <div class="col-lg-2 mb-4">
                              <div class="cart-col-wrap">
                                 <div class="car-col-body">
                                    <figure class="cart-tab-img">
                                       <img src="{{ asset($item->event->event_picture) }}" width="100%">
                                    </figure>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-5 mb-4">
                              <div class="cart-col-wrap">
                                 <div class="car-col-body">
                                    <a href="javascript:void(0);" class="cart-item-link">{{ $item->event->title }}</a>
                                    <div class="cart-item-des">
                                       <p class="color-highlight">Package: <strong>{{ $item->package->title }}</strong></p>
                                       <div class="vendor-del-rating right-content">
                                          <p>Vendor: <strong>{{$item->vendor->title}}</strong></p>
                                          <ul class="inner-list rating-stars">
                                             <li><a href="javascript:void(0);"><i class="fas fa-star"></i></a></li>
                                             <li><a href="javascript:void(0);"><i class="fas fa-star"></i></a></li>
                                             <li><a href="javascript:void(0);"><i class="fas fa-star"></i></a></li>
                                             <li><a href="javascript:void(0);"><i class="fas fa-star"></i></a></li>
                                             <li><a href="javascript:void(0);"><i class="far fa-star"></i></a>
                                             </li>
                                          </ul>
                                       </div>

                                       @if($item->discount > 0)
                                       <div class="cart-price-line">
                                          <span class="off-price"> ${{custom_format($item->discounted_price,2)}} 
                                        @if($item->discounted_price < $item->package->price && $item->deal != null && $item->deal->count() > 0)     
                                          <del class="main-price">${{custom_format($item->package->price,2)}} {{$item->addon_price > 0 ? '+ $'.$item->addon_price : ''}} </del>
                                        @endif   
                                          </span>

                                        @if($item->deal != null && $item->deal->count() > 0)
                                            <p> {!! dealInfoInCart($item) !!}

                                            <div class="demo-app hasToggle"> 
                                            <i class=" blink-text fas fa-info-circle"></i> 
                                            <span class="toggle-info-dropdown">
                                            {!! dealToggledownBox($item) !!}
                                            </span>
                                            </div>
                                            </p> 
                                        @endif
                                       </div>
                                       @else
                                        <div class="cart-price-line">
                                          <span class="off-price"> ${{custom_format($item->discounted_price,2)}} 
                                       </div>
                                       @endif
                                    </div>
                                 </div>
                              </div>
                           </div>
                           
                           <div class="col-lg-2 mb-4">
                              <div class="cart-col-wrap">
                                 <div class="car-col-body">
                                    <ul class="cart-addon-listing">
                                    @if($item->addons !="") 
                                       {!!addonsInCarts($item)!!}
                                    @else
                                        <p>N/A</p>
                                    @endif   
                                    </ul>
                                 </div>
                              </div>
                           </div>
                          
                           <div class="col-lg-3 mb-4">
                              <div class="cart-col-wrap">
                                 <div class="car-col-body">

                                    <div class="table-box-wrap">
                                    <table class="cart-table margin-top-5">
                                       <tbody>
                                          <tr>
                                             <th>Pkg Price</th>
                                             <td><strong>${{ custom_format($item->package->price,2) }}</strong></td>
                                          </tr>
                                          <tr>
                                             <th>Service Fee</th>
                                             <td><strong><span class="minus-sign">-</span> ${{ custom_format($extraFees['service'],2) }}</strong></td>
                                          </tr>
                                            <tr>
                                             <th>Website Fee</th>
                                             <td><strong><span class="minus-sign">-</span> ${{ custom_format($extraFees['commission'],2) }}</strong></td>
                                          </tr>
                                          <tr>
                                             <th>Discount</th>
                                             <td><strong><span class="minus-sign">-</span>  ${{ custom_format($item->discount,2) }}</strong></td>
                                          </tr>
                                          <tr class="price-row">
                                             <th>Total Price</th>
                                             <td><strong>${{ custom_format($extraFees['payable'],2) }}</strong></td>
                                          </tr>
                                       </tbody>
                                    </table>
                                </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  @endforeach









<div class="col-xl-12 col-md-12 m-b-30">
         <div class="card">
            <div class="card-body">
               <div class="row">
                  <div class="col-lg-6 offset-lg-3">
               <div class="total-price-wrap full-invoice">
                  <div id="cartTotals">
                    <div class="total-price-wrap">
                    
                   <div id="cartTotals">
                      <div class="cart-totals mt-2">
                                  <div class="headline-wrap text-center">
                                  <h3 class="headline">Full Invoice</h3>
                                </div>
                                  <span class="line"></span><div class="clearfix"></div>

                                  <table class="cart-table margin-top-5">
                                     
                                     
                                    <tbody>
                                          <tr>
                                        <th>Cart Subtotal</th>
                                        <td>
                                          <strong>${{custom_format($order->orderItems->sum('package_price'),2)}}</strong>
                                        </td>
                                      </tr>


                                    @if($order->orderItems->sum('discount') > 0)
                                       <tr>
                                         <th>Discount</th>
                                        <td><strong><span class="minus-sign">-</span>  ${{custom_format($order->orderItems->sum('discount'),2)}}</strong></td>
                                       </tr>  
                                     @endif 
                                       
                                           
                                      <?php $extra = getOrderExtraFees($order->orderItems); ?>
                                        <tr>
                                          <th>Service Fee</th><td><strong><span class="plus-sign">+</span> ${{$extra['service']}}</strong></td>
                                      </tr>
                                       
                                      <tr>
                                          <th>Commission Fee</th><td><strong><span class="minus-sign">-</span> ${{$extra['commission']}}</strong></td>
                                      </tr>

                                       <tr>
                                          <th>Tax</th><td><strong><span class="plus-sign">+</span> ${{$extra['tax']}}</strong></td>
                                      </tr>




                                      <tr>
                                        <th>Order Total</th>
                                        <td><strong>${{custom_format($order->amount,2)}}</strong></td>
                                      </tr>
                                              
                                       

                                      
                                                                                      
                                              <tr>
                                                <td colspan="2" align="center"><p>You have saved <strong>${{custom_format($order->orderItems->sum('discount'),2)}} </strong>on this order.</p></td>
                                              </tr>
                                           
                                         
                                  </tbody>
                                </table>
                                  
                                 
                      </div>
                   </div>
                     



    </div>                  </div>
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
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>

@endsection

@section('scripts')
<script type="text/javascript">
 
 
 
</script>
     
@endsection