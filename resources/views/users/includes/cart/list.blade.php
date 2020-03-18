@if(Auth::check() && Auth::user()->role == 'user' && $CartItems->count() > 0) 
@foreach($CartItems as $item)

 <div class="row no-gutters" data=id="{{$item->id}}" onclick="location.href='javascript:void(0);'">
                <div class="col-lg-2 col-md-3">
                  <div class="cart-col-wrap">
                   <div class="cart-table-head dsk-hide">
                                 <h3>Event Image</h3>
                              </div>  
                    <div class="car-col-body">
                      <figure class="cart-tab-img">
                        <img src="{{asset($item->event->event_picture)}}">
                      </figure>
                    </div>

                  </div>
                </div>
                <div class="{{$item->addons !='' ? 'col-lg-7 col-md-6' : 'col-lg-10 col-md-9'}}">
                  <div class="cart-col-wrap">
                               <div class="cart-table-head dsk-hide">
                                 <h3>Event detail</h3>
                              </div> 
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


                   <div class="action-btn-wrap mt-2">

                        <form action="{{url(route('cart.addToWishList'))}}" id="addToWishListForm-{{$item->id}}">
                            @csrf
                              <input type="hidden" name="package_id" id="package_id" value="{{$item->package_id}}">
                              <input type="hidden" name="deal_id" id="deal_id" value="{{$item->deal_id}}">
                              <input type="hidden" name="event_type" id="event_type" value="{{$item->event_id}}">
                            
                               <button 
                                 type="button"
                                 data-form="#addToWishListForm-{{$item->id}}"
                                 data-action="{{url(route('cart.addToWishList'))}}"
                                 class="icon-btn wishlist-icon" data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                                  <span><i class="fas fa-heart"></i></span>
                                </button>
                          </form>


                       <a data-toggle="tooltip" data-placement="top" title="Remove from Cart" href="javascript:;" class="icon-btn danger-btn ml-1 remove-from-cart" data-url="{{url(route('cart.delete',$item->id))}}"><i class="fas fa-trash-alt"></i></a>


                    </div>

                      </div>
                    </div>
                  </div>
                </div>
                @if($item->addons !="")
                <div class="col-lg-3 col-md-3">
                  <div class="cart-col-wrap">
                      <div class="cart-table-head dsk-hide">
                                 <h3>Add Ons</h3>
                              </div>               
                    <div class="car-col-body">
                        {!!addonsInCarts($item)!!}
                    </div>
                  </div>
                </div>
                @endif
               
              </div>
@endforeach  
@endif 

<script type="text/javascript">
   $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();   
   });
</script>
