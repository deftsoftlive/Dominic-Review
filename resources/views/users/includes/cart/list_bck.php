 @if(Auth::check() && Auth::user()->role == 'user')  


                   @if(empty($CartItems))       

                              <tr>
                                  <td class="text-center" colspan="6"> 
                                    <h4>Your Cart is Empty.</h4>
                                    
                                  </td>
                              </tr>

                  @endif
            			 
                   @foreach($CartItems as $item)
                			<tr>
                                <td>

                                    <div class="row cart-event-detail">
                                          <div class="col-md-12">
                                              <h4>{{$item->event->title}}</h4>
                                              <h6 class="packageCategory">${{$item->event->event_budget}} <b>Budget </b></h6>
                                               <div class="deal_life"> 
                                                From <b> {{date('d-m-Y',strtotime($item->event->start_date))}} 
                                                </b> 
                                                To 
                                                <b> {{date('d-m-Y',strtotime($item->event->end_date))}} </b> </div>

                                          </div>
                                    </div>

                                </td>
                                <td>
                                    <div class="row cart-packeg-detail">
                                         <div class="col-md-12">
                                          <h4>{{$item->package->title}}</h4>
                                          <h6 class="packageCategory"><b>Amount </b>${{custom_format($item->package->price,2)}}</h6>
                                        </div>
                                         <div class="col-md-12">

                                         <div class="row cart-business">
                                              <div class="col-sm-3">
                                                <div class="cart-business-image">
                                                    <img src="{{url(getBasicInfo($item->vendor->user_id, $item->category_id,'basic_information','cover_photo'))}}">
                                                </div>
                                              </div>
                                                <div class="col-sm-9">
                                                    <div class="cart-business-detail">
                                                            {{$item->vendor->title}}
                                                            <h6 class="packageCategory">{{$item->category->label}}</h6>
                                  
                                                      </div>
                                                </div>
                                                
                                           
                                         </div>
                                     </div>
                                    </div>
                                   
                                    
                                </td>
                                
                				<td>

                                    @if($item->deal != null && $item->deal->count() > 0)
                                       <div class="deal-cart-box row">

                                       <div class="col-md-3"> <div class="image"> <img src="{{url($item->deal->image)}}"></div></div>
                                       <div class="col-md-9">
                                        <div class="deal-detail-box">
                                           <h4>{{$item->deal->title}}</h4>
                                            <h6 class="packageCategory">{{$item->deal->deal_off_type == 0 ? $item->deal->amount.'%' : '$'.custom_format($item->deal->amount,2)}} Discount</h6>
                                            <div class="deal_life">{!!$item->deal->deal_life == 1 ? 'From <b>'.date('d-m-Y',strtotime($item->deal->start_date)).'</b> To <b>'.date('d-m-Y',strtotime($item->deal->expiry_date)).' </b>' : 'Permanent' !!}</div>
                                         @if($item->deal->type_of_deal == 0)

                                           @if($item->coupon_code != "")
                                                 <p>Coupon Applied <span>{{$item->coupon_code}}</span></p>
                                           @else
                                          <p>Discount will be applied after appling the <b>Promo Code</b></p>
                                           @endif
                                        
                                        @endif
                                    </div>
                                </div>
                                    </div>


                     @else

                      <h4>N/A</h4>

                      @endif


                        </td>
                        <td>${{custom_format($item->package->price,2)}}</td>
                        <td>${{custom_format($item->discounted_price,2)}}</td>
                				<td><div class="action-btn-wrap">

                          <form action="{{url(route('cart.addToWishList'))}}" id="addToWishListForm-{{$item->id}}">
                            @csrf
                              <input type="hidden" name="package_id" id="package_id" value="{{$item->package_id}}">
                              <input type="hidden" name="deal_id" id="deal_id" value="{{$item->deal_id}}">
                              <input type="hidden" name="event_type" id="event_type" value="{{$item->event_id}}">
                            
                				      	<button 
                                 type="button"
                                 data-form="#addToWishListForm-{{$item->id}}"
                                 data-action="{{url(route('cart.addToWishList'))}}"
                                 class="icon-btn wishlist-icon">
                                  <span><i class="fas fa-heart"></i></span>
                                </button>
                          </form>


                                    <a href="{{url(route('cart.delete',$item->id))}}" class="icon-btn danger-btn ml-1" data-toggle="tooltip" title="" data-original-title="Delete"><i class="fas fa-trash-alt"></i></a>
                                </div>
                            </td>
                			</tr>
                            @endforeach

                            @if(empty($CartItems))
                              <tr>
                                  <td colspan="5"> <h4>Your Cart is Empty.</h4>  </td>
                              </tr>
                            @endif


                     @else
                                <tr>
                                  <td class="text-center" colspan="6"> 
                                    <h4>Your Cart is Empty.</h4>
                                    <p> You are not logged in with customer Account.</p>  
                                  </td>
                              </tr>

                      @endif