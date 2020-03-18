<section class="services-tab-sec">
   <div class="container">
      <div class="sec-card">
         <div class="tab-wrap">
            <div class="form-tab-slider owl-carousel owl-theme">
               <div class="item wow bounceInDown">
                  <div class="tab-button">
                     <div class="tab-item">
                        <a href="javascript:void();" data-tag="twenty-three" class="activelink getCategory" data-id="0"
                           data-url="{{ url(route('get_homepage_formdata',0)) }}">
                           <span class="service-icon">
                           <img class="category_icon" src="{{url('frontend/images/all.png')}}" />
                           </span>
                           <h3>all</h3>
                        </a>
                     </div>
                  </div>
               </div>

               @foreach($categories as $key => $category)
               <div class="item wow bounceInDown" data-wow-delay="{{ $key*500+500}}ms">
                  <div class="tab-button">
                     <div class="tab-item">
                        <a href="javascript:void();" data-tag="twenty-three" class="getCategory" data-id="{{$category->id}}"
                           data-url="{{ url(route('get_homepage_formdata',$category->id)) }}">
                           <span class="service-icon">
                           <img class="category_icon" src="{{url($category->image)}}"/>
                           </span>
                           <h3>{{ $category->label }}</h3>
                        </a>
                     </div>
                  </div>
               </div>
               @endforeach

            </div>
         </div>
         <div class="tab-content" data-aos="fade-right" data-aos-duration="3000">
            <div class="tab-data " id="twenty-three">
               <form class="services-form" action="{{url(route('home_vendor_listing_page'))}}">
                  <input type="hidden" name="category_id" id="vendor_category_id" value="">
                 <!--  <input type="hidden" name="category_id" value="0"> -->
                  <div class="row">
                     <div class="col-lg-4 addressColumn">
                        <div class="form-group">
                           <input type="text"  class="form-control" placeholder="Location" id="address" autocomplete="off">

                           <input type="hidden" name="latitude" id="latitude" value="">
                           <input type="hidden" name="longitude" id="longitude" value="">

                           <span class="input-icon"><i class="fas fa-map-marker-alt"></i></span>
                        </div>
                     </div>
                     <div class="col-lg-4 eventColumn">
                        <div class="form-group">
                           <select class="form-control select2 eventType" name="event_type[]" data-placeholder="Event Type" id="EventSelect">
                              <option></option>
                           </select>
                           <span class="input-icon"><i class="fas fa-glass-cheers"></i></span>
                        </div>
                     </div>
                     <div class="col-lg-4 vendorColumn">
                        <div class="form-group">
                            
                           <select class="form-control select2 SuggestedVendors" id="SuggestedVendors" multiple="multiple" name="vendors[]" data-placeholder="Select Vendors">
                              <option></option>
                           </select>
                           <span class="input-icon"><i class="fas fa-user"></i></span>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                             <select class="form-control select2 amenitiesAndGames" name="amenities[]" id="amenities" multiple="multiple" data-placeholder="Amenities & Games">
                              <option></option>
                           </select>
                           <span class="input-icon"><i class="fas fa-concierge-bell"></i></span>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <input type="text" id="" class="form-control" placeholder="Number of Guest" name="guest_capacity">
                           <span class="input-icon"><i class="fas fa-users"></i></span>
                        </div>
                     </div>
                  </div>
                  <div class="btn-wrap text-center">
                    <!--  <a href="" class="cstm-btn solid-btn">Search <span><i class="fas fa-search"></i></span></a> -->

                     <button class="cstm-btn solid-btn">Search <span><i class="fas fa-search"></i></span></button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>