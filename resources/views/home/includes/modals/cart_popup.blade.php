<div class="modal fade cart-modal" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
         <div class="modal-body">
            <div class="row">
               <div class="col-lg-6">

                  <figure class="about-event-img">
                     <img src="{{ asset('/frontend/images/event-form-img.png') }}">
                     <div class="form-img-cont">
                        <h1 class="pkg-pop-head text-center">Package Information</h1>
                        <h2 class="modal-title modal-package-title">Package Title</h2>
                        <h2 class="modal-title-price modal-package-price">Package Price</h2>
                        <h2 class="modal-title-capacity">Package Capacity</h2>
                        <div class="modal-package-description">Description</div>
                     </div>
                  </figure>
               </div>
               <div class="col-lg-6">
                  <div class="first-user-form">
                     <div class="card-heading">
                        <h3>Choose Your Event.</h3>  
                    </div>
                        <form data-action="" id="AddToCart">
                     <div class="cart-pop-inn">      
                     <div class="row">
                       <div class="col-md-12"><div class="messageNotofications"></div></div>

                      <!--   <div class="messageNotofications"></div> -->
                           <input type="hidden" name="package_id" id="package_id" value="0">
                           <input type="hidden" name="deal_id" id="deal_id" value="0">
                        <div class="col-lg-12">
                           <div class="form-group">
                              <select class="form-control select2 eventType"
                                 name="event_type"
                                 data-placeholder="Event Type"
                                 id="cart-select"
                                 deal-id="{{!empty($deal) ? $deal->id : 0}}"
                                 data-action="{{url(route('cart.eventCategories'))}}">
                                 <option></option>
                              </select>
                              <span class="input-icon"><i class="fas fa-glass-cheers"></i></span>
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="form-group">
                              
                              <div id="eventAllCategories"></div>
                           </div>
                        </div>
                     
                        @csrf
                     </div>
                  </div>
                     <div class="row">
                           <div class="col-lg-12">                       

                          <ul class="button-grp-wrap">
                                <li class="mb-2"> <button 
                                 type="button" 
                                 class="btn CartButton cstm-btn solid-btn"
                                 id="btn-addCartButton" 
                                 data-action="{{url(route('cart.addToCart'))}}">
                                 <i class="fas fa-cart-plus"></i> Add To Cart
                                 </button>
                                 </li>

                                <li class="mb-2"> <button 
                                 type="button" 
                                 class="btn CartButton cstm-btn"
                                 id="btn-addWishListButton" 
                                 data-action="{{url(route('cart.addToWishList'))}}">
                                 <i class="fas fa-heart"></i> Add To WishList
                                 </button>
                                 </li>
                                 <li class="mb-2">
                                    <button 
                                      type="button" 
                                      class="btn CartButton cstm-btn"
                                      id="btn-addWishListButton" 
                                      data-action="{{url(route('cart.directToBuy'))}}"
                                      > <i class="fas fa-money-check-alt"></i> 
                                      Direct Checkout
                                    </button>
                                    
                                 </li>
                                 
                          </ul>

                        </div>
                     </div>
                     </form>

                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>







