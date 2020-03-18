<footer class="site-footer">
    <div class="container">
        <div class="ftr-content">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-12">
                    <a href="{{ route('homepage') }}" class="ftr-logo"><img src="/frontend/images/logo.svg"></a>
                </div>
                <div class="col-lg-2 col-md-2 col-6">
                    <div class="ftr-links-wrap">
                        <h3>Envisiun</h3>
                        <ul class="ftr-links">
                            <li><a href="javascript:void(0);">Home</a></li>
                            @foreach($pages as $page)
                            <li><a href="{{ route('cmsPage', ['slug' => $page->slug]) }}">{{ $page->title }}</a></li>
                            @endforeach
                            <li><a href="{{ route('home.faq') }}">FAQ</a></li>
                            <li><a href="javascript:void(0);">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-6">
                    <div class="ftr-links-wrap">
                        <h3>Vendors</h3>
                        <ul class="ftr-links">
                            <li><a href="javascript:void(0);">Venues</a></li>
                            <li><a href="javascript:void(0);">Caterers</a></li>
                            <li><a href="javascript:void(0);">Photographers</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2 col-6">
                    <div class="ftr-links-wrap">
                        <h3>terms</h3>
                        <ul class="ftr-links">
                            <li><a href="{{ route('cmsPage', ['slug' => 'terms-and-condition']) }}">Terms And Conditions</a></li>
                            <li><a href="{{ route('cmsPage', ['slug' => 'privacy-policy']) }}">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2 col-6 res-full-width">
                    <div class="ftr-links-wrap">
                        <h3>Let's Connect</h3>
                        <ul class="social-links">
                            <li><a href="javascript:void(0);"><span><i class="fab fa-facebook-f"></i></span></a></li>
                            <li><a href="javascript:void(0);"><span><i class="fas fa-envelope"></i></span></a></li>
                            <li><a href="javascript:void(0);"><span><i class="fab fa-twitter"></i></span></a></li>
                            <li><a href="javascript:void(0);"><span><i class="fab fa-instagram"></i></span></a></li>
                            <li><a href="javascript:void(0);"><span><i class="fab fa-linkedin-in"></i></span></a></li>
                            <li><a href="javascript:void(0);"><span><i class="fab fa-skype"></i></span></a></li>
                            <li><a href="javascript:void(0);"><span><i class="fab fa-whatsapp"></i></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="ftr-bottom-bar">
            <p class="copy-right-text">© 2019 Envisiun.</p>
            <ul class="social-links">
                <li><a href="javascript:void(0);"><span><i class="fab fa-facebook-f"></i></span></a></li>
                <li><a href="javascript:void(0);"><span><i class="fab fa-twitter"></i></span></a></li>
                <li><a href="javascript:void(0);"><span><i class="fab fa-instagram"></i></span></a></li>
                <li><a href="javascript:void(0);"><span><i class="fab fa-linkedin-in"></i></span></a></li>
            </ul>
        </div>
    </div>
  </footer>





<!-- First User Modal -->
<!-- <div class="modal fade" id="firstUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Why are you here?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-heading">
      <h3>Lets talk about your event.</h3>     
    </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <label>Event Title <i class="fas fa-info-circle"></i></label>
              <div class="input-field-wrap">
              <input type="text" class="form-control" id="address">
              <span class="input-icon"><i class="fas fa-pencil-alt"></i></span>
            </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label>Short description <i class="fas fa-info-circle"></i></label>
              <div class="input-field-wrap">
              <input type="text" class="form-control" id="description">
              <span class="input-icon"><i class="fas fa-pencil-alt"></i></span>
            </div>
            </div>
          </div>
         <div class="col-lg-6">
            <div class="form-group">
              <label>Event Place <i class="fas fa-info-circle"></i></label>
              <div class="input-field-wrap">
              <input type="text" class="form-control" id="evt-place">
              <span class="input-icon"><i class="fas fa-map-marker-alt"></i></span>
            </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label>lorem ipsum <i class="fas fa-info-circle"></i></label>
              <div class="input-field-wrap">
              <input type="text" class="form-control" id="">
              <span class="input-icon"><i class="fas fa-map-marker-alt"></i></span>
            </div>
            </div>
          </div>
      </div>
    </div>
    </div>
  </div>
</div> -->





<!-- First User Modal -->
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
              <div class="form-img-cont text-center">
              <h2 class="modal-title">Lorem ipsum is simply dummy text</h2>
              <p>Lorem Ipsum is simply dummy text of the printing is simply dummy text of the printing</p>
            </div>
            </figure>
          </div>
          <div class="col-lg-6">
            <div class="first-user-form">

            <!-- <div class="card-heading">
      <h3>Lorem ipsum is simply</h3>     
    </div> -->

            <div class="row">
          <div class="col-lg-12">
            <div class="form-group">
                           <select class="form-control select2 eventType" name="event_type[]" data-placeholder="Event Type" id="EventSelect">
                              <option></option>
                           </select>
                           <span class="input-icon"><i class="fas fa-glass-cheers"></i></span>
                        </div>
            </div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group">
              <label>Short description <i class="fas fa-info-circle"></i></label>
              <div class="input-field-wrap">
              <input type="text" class="form-control" id="description">
            </div>
            </div>
          </div>
         <div class="col-lg-12">
            <div class="form-group">
              <label>Event Place <i class="fas fa-info-circle"></i></label>
              <div class="input-field-wrap">
              <input type="text" class="form-control" id="evt-place">
            </div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group">
              <label>lorem ipsum <i class="fas fa-info-circle"></i></label>
              <div class="input-field-wrap">
              <input type="text" class="form-control" id="">
            </div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="btn-wrap text-right">
              <button class="cstm-btn solid-btn">Back</button>
              <button class="cstm-btn solid-btn">Next</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    </div>
  </div>
</div>
     




  <!-- Modal -->
<div class="modal fade" id="VenuesCategoriesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Businesses</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: url('/frontend/images/business-modal-bg.jpg');">
         <div class="venues-categories-wrap">
           <ul class="venues-cat-list row">

         <?php $businessCategory = \App\Category::join('vendor_categories','vendor_categories.category_id','=','categories.id')
                               ->select('categories.*')
                               ->where('categories.status',1)
                               ->where('categories.parent',0)
                               ->where('vendor_categories.status',3)
                               ->where('vendor_categories.publish',1)
                               ->orderBy('sorting','ASC')
                               ->groupBy('categories.id')
                               ->get(); ?>   

          @foreach($businessCategory as $business)       

             <li class="col-lg-4">
               <a href="{{url(route('home_vendor_listing_page'))}}?category_id={{$business->id}}" class="category-link"><span class="cate-link-icon">
                <img src="{{ url($business->image)}}"></span>
                {{$business->label}} <b>({{$business->businesses->count()}})</b></a>
             </li>
             
           @endforeach
             
             
           </ul>
         </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
