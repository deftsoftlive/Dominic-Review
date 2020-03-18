@extends('layouts.home')
@section('content')

   <section class="log-sign-banner" style="background:url('/frontend/images/banner-bg.png');">
    <div class="container">
        <div class="page-title text-center">
            <h1>Thank You</h1>
        </div>
    </div>    
</section>

       <section class="checklist-wrap">
        <div class="container">
            <div class="sec-card">

             <div class="thankyou-card">
              <div class="success-message text-center">
                    <figure class="apporved-icon">
                      <img src="/frontend/images/thank-you.jpg">                      
                    </figure>
<!--                     <h4 class="success-message__title">Thank You</h4> -->
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>                    
                </div>             

            </div>
            <div class="responsive-table">
              <table class="table table-striped order-list-table">
                       <thead>
                          <tr>
                              <th>#</th>
                              <th>Order Id</th>
                              <th>Payment Type</th>
                              <th>Price</th>
                          </tr>
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td>INVORD{{ $order->id }}</td>
                              <td>{{ $order->payment_by }}</td>
                              <td>${{ $order->amount }}</td>
                            </tr>
                          </tbody>
                        </thead>
                     </table>
            </div>

            @php $event_extra_info = json_decode($order->event_extra_info) @endphp

            <div class="order-summary-wrap">
              <div class="row">
                <div class="col-lg-6">
                  <div class="order-sum-card">
                     <div class="billing-addres-detail">
                      <h3 class="rec-heading">Billing Address</h3>
                     <!--  <table class="table billing-address-table">
                         <tr><th>Neme</th><td>XYZ</td></tr>
                         <tr><th>Street</th><td>3501  Millbrook Road</td></tr>
                         <tr><th>City</th><td>Chicago</td></tr>
                         <tr><th>State</th><td></td></tr>
                         <tr><th>Zip Code</th><td>60601</td></tr>
                         <tr><th>Phone Number</th><td>630-839-3110</td></tr>
                         <tr><th>Mobile Number</th><td>773-852-0060</td></tr>
                         <tr><th>Email</th><td>dummy@gmail.com</td></tr> 
                      </table> -->
                      <div class="billing-address-line">
                         <p><span><i class="fas fa-user"></i></span>{{ json_decode($order->billing_address)->name }}</p>
                         <p> <span> <i class="fas fa-map-marker-alt"></i> </span> {{ json_decode($order->billing_address)->address }}, {{ json_decode($order->billing_address)->city }}, {{ json_decode($order->billing_address)->state }} {{ json_decode($order->billing_address)->country }} {{ json_decode($order->billing_address)->zipcode }}</p>
                          <p> <span> <i class="fas fa-envelope"></i> </span> {{ json_decode($order->billing_address)->email }}</p>
                          <p><span><i class="fas fa-phone-alt"></i></span> {{ json_decode($order->billing_address)->phone_number }}</p>
                         </p> 
                      </div>
                  </div>
                </div>
              </div>

                <div class="col-lg-6">
                  <div class="order-sum-card">
                     <div class="billing-addres-detail">
                      <!-- <h3 class="rec-heading">Summary</h3>
                      <table class="table price-summary-table">
                         <tr><th>Package</th><td>10%</td></tr>
                         <tr><th>Deal</th><td>50%</td></tr>
                         <tr><th>Service</th><td>10%</td></tr>
                         <tr><th>Tax</th><td>$20</td></tr>
                         <tr><th>lorem ipsum</th><td>100%</td></tr>
                         <tr><th>ipsum</th><td>23%</td></tr>
                         <tr class="price-total-row"><th>Total</th><td>$3000</td></tr>                        
                         
                      </table> -->



           <div class="payment-sidebar cstm-sidebar">

        <h3 class="rec-heading">Payment Details</h3>
        <table id="payment-table" class="table payment-table">
            <tbody><tr>
                <th>
                    Price
                    <p>({{ json_decode($order->package_extra_info)->title }})</p>

                </th>
                <td>${{ json_decode($order->package_extra_info)->price }}</td>
            </tr>
            

            @if(@sizeof($order->packageAddons))
            <tr>
                <th colspan="2">
                    Addons 
                    <ul class="mini-inn-table">
                      @foreach(json_decode($order->packageAddons) as $addon)
                         <li><span class="labl"> {{ $addon->key }} </span><span> ${{ $addon->key_value }} </span></li>     
                      @endforeach              
                    </ul>
                </th>
            </tr>
            @endif
            

            <tr>
                <th>Tax</th>

                <td></i> $ {{ json_decode($order->extra_fee_info)->tax }}</td>
            </tr>

            <tr>
                <th>Service Fee</th>
                <td>$ {{ json_decode($order->extra_fee_info)->service_fee }}</td>
            </tr>
           
           
            <tr class="total-price-row">
                <th>Total Payable Amount</th>
                <td>$<span id="packagePrice">{{ $order->amount }}</span></td>
            </tr>

        </tbody></table>
        <!-- <section class="content-header">
    <div class="row" id="suc_show" style="display: none;">
        <div class="col-md-12">
              <div class="alert alert-success">
                      <strong>Success! </strong>
                      <span id="res_mess"></span>
                  </div>
        </div>
    </div>              
        
     <div class="row" id="err_show" style="display: none;">
        <div class="col-md-12">
              <div class="alert alert-danger">
                      <strong>Error! </strong>
                      <span id="err_mess"></span>
                  </div>         
        </div>
   </div>
  </section>                 -->
       
    </div>









                  </div>
                </div>
              </div>

              </div>
            </div>

            <div class="order-detail-view">
              <div class="row">
                <div class="col-lg-4">
                  <div class="order-view-card">
                    <span class="order-view-icon"><i class="fas fa-calendar-day"></i></span>
                    <h3 class=" order-heading">{{ json_decode($order->event_extra_info)->title }}</h3>     
                    <p class="evt-date"><i class="fas fa-calendar-alt"></i>

                      <span>{{ date('Y-m-d',strtotime(json_decode($order->event_extra_info)->start_date))
                      }} To {{ date('Y-m-d',strtotime(json_decode($order->event_extra_info)->end_date))
                      }}</span>
                    </p>             
                     <p>{{ json_decode($order->event_extra_info)->description }}</p>

                     <ul class="button-grp-wrap text-center">
                                  <li>
                                    <a href="{{route('user_show_detail_event', json_decode($order->event_extra_info)->slug)}}" target="_blank" class="icon-btn">
                                      <i class="fas fa-eye"></i>
                                    </a>
                                  </li>                   
                       </ul>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="order-view-card">
                      <span class="order-view-icon"><i class="fas fa-clipboard-list"></i></span>
                    <h3 class=" order-heading">{{ json_decode($order->package_extra_info)->title }}</h3>  
                    <p>Amount: ${{ json_decode($order->package_extra_info)->price }}</p>   

                    <p>{!! json_decode($order->package_extra_info)->description !!}</p>

                    @php $vendor_pack = json_decode($order->package_extra_info) @endphp

                    @if(!empty($vendor_pack->business->business_url))
                     <ul class="button-grp-wrap text-center">
                                  <li>
                                    <a href="{{ route('vendor_detail_page', [ $vendor_pack->business->category->slug, $vendor_pack->business->business_url ]) }}" class="icon-btn" target="_blank">
                                      <i class="fas fa-eye"></i>
                                    </a>
                                  </li>                   
                       </ul>
                      @endif

                  </div>

                </div>
                <div class="col-lg-4">                  
                  <div class="order-view-card">
                    <span class="order-view-icon"><i class="fas fa-business-time"></i></span>
                    <h3 class=" order-heading">{{ $vendor_pack->business->title }}</h3> 
                    <p><span><i class="fas fa-user"></i> </span> {{$vendor_pack->business->vendors->name}}</p> 
                    <p><span><i class="fas fa-tags"></i></span> {{ $vendor_pack->business->category->label }}</p> 

                    @if(!empty($vendor_pack->business->business_url))
                    <ul class="button-grp-wrap text-center">
                                  <li>
                                    <a href="{{ route('vendor_detail_page', [ $vendor_pack->business->category->slug, $vendor_pack->business->business_url ]) }}" class="icon-btn" target="_blank">
                                      <i class="fas fa-eye"></i>
                                    </a>
                                  </li>                   
                       </ul>    
                      @endif
                  </div>
                </div>
              </div>
            </div>

            <div class="button-wrap text-center">
              <a href="javascript:void(0);" class="cstm-btn solid-btn">Back to Home</a>
            </div>
        </div>
    </div>
</section>


@endsection
