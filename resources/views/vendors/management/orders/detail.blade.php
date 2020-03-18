@extends('layouts.vendor')
@section('vendorContents')
<div class="container-fluid">

 <div class="page_head-card">
    <div class="page-info">
            <div class="page-header-title">
                <h3 class="m-b-10">{{$title}}</h3>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('vendor_dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                <li class="breadcrumb-item">Orders</li>
            </ul>
   </div>
     
</div>
@include('vendors.errors')

    <div class="row">
       <div class="col-lg-12">
          <div class="card vendor-dash-card">
           <div class="card-header"><h3>{{$title}}   </h3></div>
           <div class="card-body">
                <div id="faq-accordion" class="faq-accordion">
                <div class="col-md-12">   
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

   @php  $commission = 0; $service_fee = 0;  @endphp

    @foreach($orders as $item)

 

         @php $extraFees = getOrderExtraFeess($item); @endphp
                     
                     <div class="cart-items-wrap my-order-detail-card" id="CartItems">
                        <div class="row no-gutters">
                           <div class="col-lg-2 mb-4">
                              <div class="cart-col-wrap">
                                 <div class="car-col-body">
                                    <figure class="cart-tab-img">
                                       <img src="{{ asset($item->event->event_picture) }}">
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
                                             <th>Discount</th>
                                             <td><strong><span class="minus-sign">-</span>  ${{ custom_format($item->discount,2) }}</strong></td>
                                          </tr>

                                          <tr class="price-row">
                                             <th>Total Price</th>
                                             <td><strong>${{ custom_format($item->discounted_price,2) }}</strong></td>
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
                                    @php $extraFees = getOrderExtraFeess($orders->first()); @endphp
                                  <table class="cart-table margin-top-5">
                                     
                                     
                                       <tbody>
                                        <tr>
                                             <th>Pkg Price</th>
                                             <td><strong>${{custom_format($orders->sum('package_price'),2)}}</strong></td>
                                          </tr>
                                          <tr>
                                             <th>Service Fee</th>
                                             <td><strong><span class="minus-sign">-</span> ${{ custom_format($extraFees['service'],2) }}</strong></td>
                                          </tr>

                                          <tr>
                                             <th>Website Fee</th>
                                             <td><strong><span class="minus-sign">-</span> ${{ custom_format($extraFees['commission'],2) }}</strong></td>
                                          </tr>
                                         @if($orders->sum('discount') > 0)
                                          <tr>
                                             <th>Discount</th>
                                             <td><strong><span class="minus-sign">-</span>  ${{custom_format($orders->sum('discount'),2)}}</strong></td>
                                          </tr>
                                        @endif

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





 
   
@endsection


@section('scripts')

<script type="text/javascript">
  
  $(document).ready(function(){
  $("#faq-accordion").on("hide.bs.collapse show.bs.collapse", e => {
    $(e.target).prev().find("i:last-child").toggleClass("fa-minus fa-plus");
  });
  });    

</script>

@endsection
