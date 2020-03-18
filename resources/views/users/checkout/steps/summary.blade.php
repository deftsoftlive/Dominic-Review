
 

@if($orders->count() > 0)
 @foreach($orders->get() as $item)

 <div class="row no-gutters" data=id="{{$item->id}}">
                <div class="col-lg-2">
                  <div class="cart-col-wrap">
                     
                    <div class="car-col-body">
                      <figure class="cart-tab-img">
                        <img src="{{asset($item->event->event_picture)}}">
                      </figure>
                    </div>

                  </div>
                </div>
                <div class="{{$item->addons !='' ? 'col-lg-7' : 'col-lg-10'}}">
                  <div class="cart-col-wrap">
                                      
                    <div class="car-col-body">
                      <a href="javascript:void(0);" class="cart-item-link">{{$item->event->title}}</a>
                      <div class="cart-item-des">
                        <p class="color-highlight">Package: <strong>{{$item->package->title}}</strong></p>
                         
                          @if($item->package->package_addons->count() > 0)
                               <a 
                               href="javascript:void(0);" 
                               data-toggle="tooltip" 
                               title="Create Event" 
                               class="icon-btn add-pkg-icon package-addons-modal" 
                               data-orderID="{{$item->id}}" 
                               data-action="{{url(route('getPackageAddons',$item->package->id))}}"
                               data-id="{{$item->package->id}}">
                                    <i class="fas fa-plus"></i>
                               </a> 
                          @endif                 
                         
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
                        
              
              
           

                          <div class="cart-price-line">
                           <span class="off-price"> ${{custom_format($item->discounted_price,2)}} 

                              @if($item->discounted_price < $item->package->price && $item->deal != null && $item->deal->count() > 0) 
                                    <del class="main-price">${{custom_format($item->package->price,2)}} {{$item->addon_price > 0 ? '+ $'.$item->addon_price : ''}}</del> 
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


              

                      </div>
                    </div>
                  </div>
                </div>
                @if($item->addons !="")
                <div class="col-lg-3">
                  <div class="cart-col-wrap">
                                      
                    <div class="car-col-body">
                        {!!addonsInCarts($item)!!}
                    </div>
                  </div>
                </div>
                @endif
               
              </div>

  @endforeach
 




@if($orders->count() > 0)

	<div class="cart-totals mt-5">
		<h3 class="headline">Cart Totals</h3><span class="line"></span><div class="clearfix"></div>

		<table class="cart-table margin-top-5">
            <?php $Discount = ($orders->sum('package_price') - $orders->sum('discounted_price')); ?>
              <tbody>
		            <tr>
						   <th>Cart Subtotal</th>
						  <td><strong>${{custom_format($orders->sum('package_price'),2)}}</strong></td>
				  	</tr>

				  	 <tr>
						   <th>Discount</th>
						  <td><strong>${{custom_format($orders->sum('discount'),2)}}</strong></td>
				  	 </tr>

					 

					<tr>
						<th>Order Total</th>
						<td><strong>${{custom_format($orders->sum('discounted_price'),2)}}</strong></td>
					</tr>

		          
		   </tbody>
       </table>
	 <br>
		
<div class="row">
 <div class="col-md-8">
 	 @if($Discount > 0)
		    <p>You will save <strong>${{custom_format($Discount,2)}} </strong>on this order.</p>
	 @endif
 </div>
 <div class="col-md-4"><a href="{{url(route('checkout.paymentPage'))}}" class="cstm-btn solid-btn pull-right">Continue</a></div>
</div>

	</div>
@endif
 @else








@endif




























