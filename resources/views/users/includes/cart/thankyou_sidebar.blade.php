     <div class="total-price-wrap">
                    
                   <div id="cartTotals">
                      <div class="cart-totals mt-2">
                                  <div class="headline-wrap text-center">
                                  <h3 class="headline">Cart Totals</h3>
                                </div>
                                  <span class="line"></span><div class="clearfix"></div>

                                  <table class="cart-table margin-top-5">
                                     
                                     
                                    <tbody>
                                          <tr>
                                        <th>Cart Subtotal</th>
                                        <td>
                                          <strong>${{custom_format($CartItems->sum('package_price'),2)}}</strong>
                                        </td>
                                      </tr>


                                    @if($CartItems->sum('discount') > 0)
                                       <tr>
                                         <th>Discount</th>
                                        <td><strong><span class="minus-sign">-</span>  ${{custom_format($CartItems->sum('discount'),2)}}</strong></td>
                                       </tr>  
                                     @endif  
                                           
                                      <?php $extra = getOrderExtraFees($CartItems); ?>

                                        <tr>
                                          <th>Service Fee</th><td><strong><span class="plus-sign">+</span> ${{$extra['service']}}</strong></td>
                                      </tr>
                                       
                                      <tr>
                                          <th>Tax</th><td><strong><span class="plus-sign">+</span> ${{$extra['tax']}}</strong></td>
                                      </tr>



                                      <tr>
                                        <th>Order Total</th>
                                        <td><strong>${{custom_format($order->amount,2)}}</strong></td>
                                      </tr>
                                              
                                       

                                      
                                        @if($CartItems->sum('discount') > 0)
                                              
                                              <tr>
                                                <td colspan="2"><p>You have saved <strong>${{custom_format($CartItems->sum('discount'),2)}} </strong>on this order.</p></td>
                                              </tr>
                                           
                                         @endif

                                  </tbody>
                                </table>
                                  
                                 
                      </div>
                   </div>
                    <div class="cart-totals-bottom-block mt-4">
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