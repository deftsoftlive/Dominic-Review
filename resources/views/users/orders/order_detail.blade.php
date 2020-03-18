@extends('users.layouts.layout') 
@section('content')



<section class="content">
   <div class="row">
      <div class="col-xl-12 col-md-12 m-b-30">
         <div class="card">
            <div class="card-body">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="cart-items-wrap my-order-detail-card mobile-hide">
                        <div class="row no-gutters">
                           <div class="col-lg-2 col-md-2">
                              <div class="cart-col-wrap">
                                 <div class="cart-table-head">
                                    <h3>Event Image</h3>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-5 col-md-4">
                              <div class="cart-col-wrap">
                                 <div class="cart-table-head">
                                    <h3>Details</h3>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-2 col-md-2">
                              <div class="cart-col-wrap">
                                 <div class="cart-table-head">
                                    <h3>AddOns</h3>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-3 col-md-4">
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

                     @if(@sizeof($currentOrder))

                     @foreach($currentOrder->orderItems as $item)

                     @php $extraFees = getOrderExtraFeess($item); @endphp
                     
                     <div class="cart-items-wrap my-order-detail-card" id="CartItems">
                        <div class="row no-gutters">
                           <div class="col-lg-2 col-md-2 mb-4">
                              <div class="cart-col-wrap">
                                 <div class="cart-table-head dsk-hide">
                                    <h3>Event Image</h3>
                                 </div>
                  
                                 <div class="car-col-body">
                                    <figure class="cart-tab-img">
                                       <img src="{{ asset($item->event->event_picture) }}">
                                    </figure>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-5 col-md-4 mb-4">
                              <div class="cart-col-wrap">                                
                                 <div class="cart-table-head dsk-hide">
                                    <h3>Details</h3>
                                 </div>
                         
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
                           
                           <div class="col-lg-2 col-md-3 mb-4">
                              <div class="cart-col-wrap">
                                 <div class="cart-table-head dsk-hide">
                                    <h3>AddOns</h3>
                                 </div>
                      
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
                          
                           <div class="col-lg-3 col-md-3 mb-4">
                              <div class="cart-col-wrap ">                               
                                 <div class="cart-table-head dsk-hide">
                                    <h3>Price details
                                    </h3>                               
                              </div>
                                 <div class="car-col-body">

                                 	<div class="table-box-wrap">
                                    <table class="cart-table margin-top-5">
                                       <tbody>
                                          <tr>
                                             <th>Pkg Price</th>
                                             <td><strong>${{ $item->package->price }}</strong></td>
                                          </tr>
                                          <tr>
                                             <th>Service Fee</th>
                                             <td><strong><span class="plus-sign">+</span> ${{ $extraFees['service'] }}</strong></td>
                                          </tr>
                                          <tr>
                                             <th>Discount</th>
                                             <td><strong><span class="minus-sign">-</span>  ${{ $item->discount }}</strong></td>
                                          </tr>
                                          <tr class="price-row">
                                             <th>Total Price</th>
                                             <td><strong>${{ ($item->discounted_price + $extraFees['service']) }}</strong></td>
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
                     @endif
                     <!--  Second row -->
                     <!--  =========================== -->
                  </div>
               </div>
            </div>
         </div>
      </div>

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
                                          <strong>${{custom_format($currentOrder->orderItems->sum('package_price'),2)}}</strong>
                                        </td>
                                      </tr>


                                    @if($currentOrder->orderItems->sum('discount') > 0)
                                       <tr>
                                         <th>Discount</th>
                                        <td><strong><span class="minus-sign">-</span>  ${{custom_format($currentOrder->orderItems->sum('discount'),2)}}</strong></td>
                                       </tr>  
                                     @endif 
                                       
                                           
                                      <?php $extra = getOrderExtraFees($currentOrder->orderItems); ?>
                                        <tr>
                                          <th>Service Fee</th><td><strong><span class="plus-sign">+</span> ${{$extra['service']}}</strong></td>
                                      </tr>
                                       
                                      <tr>
                                          <th>Tax</th><td><strong><span class="plus-sign">+</span> ${{$extra['tax']}}</strong></td>
                                      </tr>



                                      <tr>
                                        <th>Order Total</th>
                                        <td><strong>${{custom_format($currentOrder->amount,2)}}</strong></td>
                                      </tr>
                                              
                                       

                                      
                                                                                      
                                              <tr>
                                                <td colspan="2" align="center"><p>You have saved <strong>${{custom_format($currentOrder->orderItems->sum('discount'),2)}} </strong>on this order.</p></td>
                                              </tr>
                                           
                                         
                                  </tbody>
                                </table>
                                  
                                 
                      </div>
                   </div>
                    <div class="cart-totals-bottom-block mt-4">
                    <div class="headline-wrap cart-totals text-center">
                            <h3 class="headline">We Accept</h3>
                            <span class="line"></span>
                     </div>
                     <div class="d-f justify-content-center w-100">
                          <img class="mr-2" src="http://49.249.236.30:8654/images/american-express.png" alt="visa">
                          <img class="mr-2" src="http://49.249.236.30:8654/images/discover.png" alt="master card">
                          <img src="http://49.249.236.30:8654/images/master-card.png" alt="cash on delivery">
                          <img src="http://49.249.236.30:8654/images/visa.png" alt="cash on delivery">
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
</section>


























@endsection