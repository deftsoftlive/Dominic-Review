@extends('layouts.admin')

 
 
@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Disputes</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item">Disputes</li>
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
                                            <h5>Disputes</h5>
                                            <!-- <span class="d-block m-t-5">use class <code>table-hover</code> inside table element</span> -->
                                        </div>
                                        <div class="card-block table-border-style">
                                            <div class="table-responsive">
                                              @include('admin.error_message')



                                                <table class="table">

                                                    <tr>
                                                        <th>Reason of Dispute</th>
                                                        <td>{{$data->reason}}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Email </th>
                                                        <td>{{$data->email}}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Phone </th>
                                                        <td>{{$data->phone_number}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Summary </th>
                                                        <td>{{$data->summary}}</td>
                                                    </tr>

                                                     <tr>
                                                        <th>Event Detail </th>
                                                        <td>{{$data->orderEvent->event->title}}</td>
                                                    </tr>

                                                     <tr>
                                                        <th>By </th>
                                                        <td>{{$data->user->name}}</td>
                                                    </tr>

                                                    <tr>
                                                        <th></th>
                                                        <td>
                                                            @if($data->status == 2)

                                                             <h4>The Vendor is blocked.</h4>

                                                            @else
                                                            <a href="{{url(route('admin.vendor.dispute.block',$data->id))}}" class="btn btn-primary">Block The Vendor</a>
                                                            @endif
                                                        </td>
                                                    </tr>

                                                </table>




 
<!-- ============================================================= -->


<div class="vendorVen-service-detail">

<h3>Order ID : {{$order->OrderID}}</h3>
<div class="row">
<div class="col-md-12">
    <div class="vendor-ver-head">
    <h4>Business Detail</h4>
</div>
    <div class="row">
       <div class="col-md-3">
        <figure class="vendor-ver-img"> 
        @if($order->vendor->category && $order->vendor->category->cover_type == 1)
               <img src="{{url(getBasicInfo($order->vendor->vendors->id, $order->vendor->category_id,'basic_information','cover_photo'))}}">
                              
         @else
              <img src="{{url(getBasicInfo($order->vendor->vendors->id, $order->vendor->category_id,'basic_information','cover_video_image'))}}">
 
        @endif
    </figure>
       </div>
       <div class="col-md-5">
        <h3>{{$order->vendor->title}} <span class="hiredVendor">Hired</span></h3>
        <h6><span class="icon"><i class="far fa-calendar-alt"></i></span><strong> From </strong> {{date('Y-m-d',strtotime($event->start_date))}}<strong> To </strong> {{date('Y-m-d',strtotime($event->end_date))}}</h6>
        <h6><strong>Vendor Name :</strong> {{$order->vendor->vendors->name}}</h6>
        <h6><strong>Package :</strong> {{$order->package->title}}</h6>
        <h6><strong>Package Price:</strong> ${{custom_format($order->package_price,2)}}</h6>
             @if($order->discount > 0)
                 
                         <div class="cart-price-line">
                                  <span class="off-price"> ${{custom_format($order->discounted_price,2)}} 
                                @if($order->discounted_price < $order->package->price && $order->deal != null && $order->deal->count() > 0)     
                                  <del class="main-price">${{custom_format($order->package->price,2)}} {{$order->addon_price > 0 ? '+ $'.$order->addon_price : ''}} </del>
                                @endif   
                                  </span>

                                                            @if($order->deal != null && $order->deal->count() > 0)
                                                                <p> {!! dealInfoInCart($order) !!}
                                                                  <div class="demo-app hasToggle"> 
                                                                    <i class=" blink-text fas fa-info-circle"></i> 
                                                                    <span class="toggle-info-dropdown">
                                                                    {!! dealToggledownBox($order) !!}
                                                                    </span>
                                                                 </div>
                                                                </p> 
                                                            @endif
                               </div>
                      
             @endif
             


       </div>


          <div class="col-md-3">
                              <div>
                                 <div>
                                    <h3>AddOns</h3>
                                 </div>
                      
                                 <div>
                                    <ul class="cart-addon-listing">
                                    @if($order->addons !="")    
                                       {!!addonsInCarts($order)!!}
                                    @else
                                        <p>N/A</p>
                                    @endif   
                                    </ul>
                                 </div>
                              </div>
           </div>







      </div>



 <div class="vendorVen-service-price">
      <div class="row">
                     <div class="col-md-6"></div>
                     <div class="col-md-6">
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
                                             @php $extraFees = getOrderExtraFeess($order); @endphp
                                             <th>Pkg Price</th>
                                             <td><strong>${{ $order->package->price }}</strong></td>
                                          </tr>
                                          <tr>
                                             <th>Service Fee</th>
                                             <td><strong><span class="plus-sign">+</span> ${{ $extraFees['service'] }}</strong></td>
                                          </tr>
                                          <tr>
                                             <th>Discount</th>
                                             <td><strong><span class="minus-sign">-</span>  ${{ $order->discount }}</strong></td>
                                          </tr>
                                          <tr class="price-row">
                                             <th>Total Price</th>
                                             <td><strong>${{ ($order->discounted_price + $extraFees['service']) }}</strong></td>
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




 
<!-- ============================================================= -->


 
                                              
                                                
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
 
     
@endsection