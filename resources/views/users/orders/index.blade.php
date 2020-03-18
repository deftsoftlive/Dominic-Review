@extends('users.layouts.layout') 
@section('content')



<section class="content">
    <div class="row">
        <div class="col-xl-12 col-md-12 m-b-30">
            <div class="card">
                <div class="card-body">
                    <div class="row">

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

                            @if(@sizeof(Auth::user()->orders))
                                @foreach(Auth::user()->orders as $item)
                                @php $extraFees = getOrderExtraFees($item->orderItems); @endphp
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
                                                    <a href="{{ route('order_details', $item->id) }}" class="icon-btn" data-toggle="tooltip" title="" data-original-title="Detail"><i class="fas fa-eye"></i></a>
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
</section>

@endsection 
    @section('scripts') 
@endsection