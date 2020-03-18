@extends('layouts.vendor')
@section('vendorContents')
<div class="container-fluid">

 <div class="page_head-card">
    <div class="page-info">
            <div class="page-header-title">
                <h3 class="m-b-10">Shop's Orders</h3>
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
           <div class="card-header"><h3>Shop's Orders  </h3></div>
           <div class="card-body">
                <div id="faq-accordion" class="faq-accordion">
                     @if($orders->count() == 0)
                        <div class="col-md-12">
                          <div class="alert alert-warning" role="alert">There is no Order.</div>
                        </div>
                     @endif


                     <div class="col-lg-12">
                            <div class="cart-items-wrap my-order-detail-card">
                                <div class="row no-gutters">
                                    <div class="col-lg-4">
                                        <div class="cart-col-wrap">
                                            <div class="cart-table-head">
                                                <h3>Order Id</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="cart-col-wrap">
                                            <div class="cart-table-head">
                                                <h3>Details</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="cart-col-wrap">
                                            <div class="cart-table-head">
                                                <h3>Service Fee</h3>
                                            </div>
                                        </div>
                                    </div>

                                     <div class="col-lg-2">
                                        <div class="cart-col-wrap">
                                            <div class="cart-table-head">
                                                <h3>Tax</h3>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-1">
                                        <div class="cart-col-wrap">
                                            <div class="cart-table-head">
                                                <h3>Action</h3>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- start Heading -->

                            @if(@sizeof($orders))
                                @foreach($orders as $im)
                                @php
                                $item = $im->order;

                                 $extraFees = $item->getPaymentDetails(); @endphp
                            <div class="cart-items-wrap my-order-detail-card" id="CartItems">
                                <div class="row no-gutters">
                                    <div class="col-lg-4 mb-4">
                                        <div class="cart-col-wrap">

                                            <div class="car-col-body">
                                                <h4>{{ $item->orderID }}</h4>
                                            </div>

                                        </div>
                                    </div>
                                  <div class="col-lg-3 mb-4">
                                        <div class="cart-col-wrap">
                                            <div class="car-col-body">
                                                <h4>${{ $item->amount }}</h4>
                                            </div>
                                        </div>

                                    </div>
                                     <div class="col-lg-2 mb-4">
                                        <div class="cart-col-wrap">
                                            <div class="car-col-body">
                                                <h4>${{ $extraFees['service'] }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 mb-4">
                                        <div class="cart-col-wrap">
                                            <div class="car-col-body">

                                            <h4>${{ $extraFees['tax'] }}</h4>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-1 mb-4">
                                        <div class="cart-col-wrap">

                                            <div class="car-col-body">

                                                <div class="action-btn-wrap1">
                                                    <a href="{{ route('vendor.shop.orders.detail',$item->id) }}" class="icon-btn" data-toggle="tooltip" title="" data-original-title="Detail"><i class="fas fa-eye"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                                @endforeach
                            @else
                              <div class="alert alert-info closer-step mb-3 mt-4" role="alert">
                                 <i class="fa fa-info-circle"></i> No Orders Found
                              </div>
                            @endif
                
                          <!--  =========================== -->
                        </div>













                </div> 
           </div>
         </div>
      </div>
    </div>
</div>





 
   
@endsection

 