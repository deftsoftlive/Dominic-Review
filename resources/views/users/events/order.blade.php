<style>
	.vendorVen-service-detail h3 {
    font-size: 20px;
    margin-bottom: 10px;
    color: #3f4d67;
}
.vendorVen-service-detail .vendor-ver-img {
    height: 170px;
    border-radius: 4px;
    overflow: hidden;
}
.vendorVen-service-detail .vendor-ver-img img{
	height: 100%;
	width: 100%;
	object-fit: cover;
	object-position: center center;
}
.vendorVen-service-detail .hiredVendor {
    padding: 2px 4px;
    background: #e4a118;
    border-radius: 5px;
    color: #fff;
    font-size: 12px;
}
.vendorVen-service-detail h6 {
    font-size: 14px;
    color: #292929;
    font-weight: 600;
}
.vendorVen-service-detail h6 strong {
    color: #6d6d6d;
    font-weight: 700;
    font-size: 13px;
}
.vendor-ver-head {
    display: block;
    padding: 10px;
    background: #efefef;
    margin-bottom: 13px;
}
.vendor-ver-head h4{
	margin-bottom: 0px;
	font-size: 18px;
}
.vendorVen-service-detail .icon {
    margin-right: 4px;
    color: #eea31e;
}
.vendorVen-service-price {
    margin-top: 17px;
    padding-top: 15px;
    border-top: 1px solid #ececec;
}
</style>

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
                              <div class="">
                                 <div class=" ">
                                    <h3>AddOns</h3>
                                 </div>
                      
                                 <div class="">
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
                                    

                                     @if(strtotime($event->end_date) < strtotime(date('Y-m-d h:i:s')))

                                         @if($order->disputes != null && $order->disputes->count() > 0)
                                             <h4>You have Disputed for this Vendor.</h4>
                                         @elseif($order->reviews != null && $order->reviews->count() > 0)
                                             <h4>Review is added by you.</h4>
                                         @else
                                          <a href="{{url(route('user.event.dispute',[$order->id]))}}" class="btn btn-primary">Dispute</a>
                                          <a href="{{url(route('user.event.review',[$order->id]))}}" class="btn btn-primary">Add Review</a>
                                        @endif
                                     @endif







                              </div>
                   </div>
 
     </div>
 </div>




</div>
</div>

</div>

 















































