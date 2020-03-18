     <div class="total-price-wrap">
                  <div class="apply-coupon-field">
                     @if(Auth::check() && Auth::User()->CartItems->count() > 0)
                     <form action="{{url(route('cart.applyCoupon'))}}" 
                        method="get"
                        class="apply-coupon mini-btn-wrap"
                        id="CouponApply">
                        <input class="search-field" type="text" name="coupon_code" placeholder="Coupon Code" value="">
                        <button class="cstm-btn"><span><img src="{{url('200.gif')}}"></span>Apply</button>
                        
                     </form>
                     <p class="errorMSG cart-error-msz"></p>
                     @endif
                  </div>
                    
                   <div id="cartTotals">
                    <!-- Data Append Here Via Ajax Call -->
                   </div>

                   <div class="btn-outer-wrap text-right">
                      <div class="cart-btns mini-btn-wrap">
                         @if(Auth::check() && Auth::User()->CartItems->count() > 0)
                         <a href="{{url(route('checkout.billingAdress'))}}" class="cstm-btn solid-btn">Proceed to Checkout</a>
                         @endif
                         <a href="{{url(route('home_vendor_listing_page'))}}" class="cstm-btn solid-btn">Continue Shopping</a>
                      </div>
                   </div>
                     

                     <div class="cart-totals-bottom-block mt-4">
                   
                        <!-- <div class="col-lg-12 text-center mb-3">
                            <p class="futura-medium-bt text-uppercase">We Accept</p>
                        </div> -->
                       <div class="headline-wrap cart-totals text-center">
                            <h3 class="headline">We Accept</h3>
                            <span class="line"></span>
                          </div>


                    
                      <div class="d-f justify-content-center w-100">
                          <img class="mr-2" src="{{ asset('images/american-express.png') }}" alt="visa">
                          <img class="mr-2" src="{{ asset('images/discover.png') }}" alt="master card">
                          <img src="{{ asset('images/master-card.png') }}" alt="cash on delivery">
                          <img src="{{ asset('images/visa.png') }}" alt="cash on delivery">
                      </div>
                </div>



                  </div>