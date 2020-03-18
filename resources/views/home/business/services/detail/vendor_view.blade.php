@extends('layouts.home')
@section('content')
<section class="log-sign-banner" style="background:url('/frontend/images/banner-bg.png');">
    <div class="container">
        <div class="page-title text-center">
            <h1>{{getBasicInfo($vendor->vendors->id, $vendor->category_id,'basic_information','business_name')}}</h1>
        </div>
    </div>    
</section>

    <section class="vendor-detail-header">
    	<div class="container lr-container">
		 <div class="sec-card">
		<div class="page-head">
				<div class="row">
					<div class="col-lg-8">
						<div class="page-header">
							<figure class="head-logo"><img src="/frontend/images/vendor-03.png"></figure>
							<div class="heading-details">
		              		<h2>{{getBasicInfo($vendor->vendors->id, $vendor->category_id,'basic_information','business_name')}}</h2>

								<p class="address-line"><span class="location-icon"><i class="fas fa-map-marker-alt"></i></span><?= getBasicInfo($vendor->vendors->id, $vendor->category_id,'basic_information','address')?></p>
                
                  <ul class="contact-links">
                   <li><a href="tel:{{getBasicInfo($vendor->vendors->id, $vendor->category_id,'basic_information','phone_number')}}" data-toggle="tooltip" title="Call {{getBasicInfo($vendor->vendors->id, $vendor->category_id,'basic_information','business_name')}}"><span class="contact-icons"><i class="fas fa-mobile-alt"></i></span></a></li>
                          <li><a target="_blank" href="{{getBasicInfo($vendor->vendors->id, $vendor->category_id,'basic_information','Visit Website')}}" data-toggle="tooltip" title="Website"><span class="contact-icons"><i class="fas fa-globe-americas"></i></span></a></li>
                  </ul>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="success-msg-wrap">
							<div class="success-message {{!empty($types) && $types == 'admin' ? 'hide' : ''}} @if($vendor->status == 4) reject-message @elseif($vendor->status == 2 || $vendor->status == 1) pending-message @endif">
                    <figure class="apporved-icon">
                     @if($vendor->status == 4)
                      <img src="/frontend/images/reject.png">
                     @elseif($vendor->status == 3)
                      <img src="/frontend/images/approve.png">
                     @elseif($vendor->status == 2 || $vendor->status == 1) 
                      <img src="/frontend/images/pending.png">
                     @elseif($vendor->status == 5)
                      <img src="/frontend/images/reject.png">
                     @endif                       
                    </figure>
                    <h4 class="success-message__title">{{ $currentStatus }}</h4>
                    
                </div>
						</div>
					</div>
				
			    </div>
			
		</div>

                     <div class="deatil-navigation-wrap">			
						 
             <div class="owl-carousel owl-theme nav-menu-slider">
                        <div class="item">
                          <a href="#" data-scroll="image-gallery"><!-- <span class="nav-icon"><i class="fas fa-camera-retro"></i></span> --> Photos</a>
                        </div> 
                        <div class="item">
                          <a href="#faq-sec" data-scroll="faq-sec"><!-- <span class="nav-icon"><i class="fas fa-question-circle"></i></span> --> FAQs</a>
                        </div> 
                        <div class="item">
                            <a href="#venue-sec" data-scroll="venue-sec"> <!-- <span class="nav-icon"><i class="fas fa-clipboard-list"></i></span> --> Venue</a>
                        </div>
                        <div class="item">
                           <a href="#description-sec" data-scroll="description-sec"> <!-- <span class="nav-icon"><i class="fas fa-clipboard-list"></i></span> --> Description</a>
                        </div>
                        <div class="item">
                          <a href="#AmenitiesGames-sec" data-scroll="AmenitiesGames-sec"><!--  <span class="nav-icon"><i class="fas fa-question-circle"></i></span> --> Amenities and Games</a>
                        </div>
                        <div class="item">
                         <a href="#deals-sec" data-scroll="deals-sec"><!--  <span class="nav-icon"><i class="fas fa-question-circle"></i></span> --> Deals</a>
                        </div>
                        <div class="item">
                          <a href="#review-sec" data-scroll="review-sec"><!-- <span class="nav-icon"><i class="fas fa-star"></i></span> --> Reviews</a>
                        </div>                        
                        <div class="item">
                          <a href="#package-sec" data-scroll="package-sec"><!-- <span class="nav-icon"><i class="fas fa-star"></i></span> --> Packages</a>
                        </div>
                    </div>
                </div>


        






		              </div>
								
	</div>
		</div>
	</section>

		

  <div class="main-detail">
    <div class="container lr-container">
			@include('vendors.errors')
		  <div class="row">
			<div class="col-lg-8">
		

 
 <?= notoficationBusinessFlash($types,$vendor->GalleryComment,$vendor->status) ?>
@include('home.vendors.services.detail.gallery')
@include('home.vendors.services.detail.faqs')
@include('home.vendors.services.detail.venue')
@include('home.vendors.services.detail.description')

 



<!-- 	End -->

  <div class="Amenities-card" id="AmenitiesGames-sec">
	<div class="pannel-card">
     <?= notoficationBusinessFlash($types,$vendor->AmentityComment,$vendor->status) ?>
		<div class="card-heading">
			<h3>Amenities and Games</h3>			
		</div>		
		 

       <div class="Amenities-content">
                     <div class="row">
                        <div class="col-lg-6">
                           <h4 class="faq-question">Amenities</h4>
                           <ul class="detail-listing">
                            
                              @foreach($vendor->VendorAmenity as $game)
                              
                                     @if(getSeasonOfBusiness($game->amenity_id,$game->category_id,'amenity') > 0)
                                        <li>{{$game->amenity->name}}</li>
                                     @endif
                              @endforeach
                           </ul>
                        </div>
                        <div class="col-lg-6">
                           <h4 class="faq-question">Games</h4>
                           <ul class="detail-listing">
                                @foreach($vendor->VendorGames as $game)   
                                            @if(getSeasonOfBusiness($game->amenity_id,$game->category_id,'game') > 0)             
                                              <li>{{$game->amenity->name}}</li>
                                            @endif
                              @endforeach

                           </ul>
                        </div>
                     </div>
                  </div>
   </div>
</div>







   <div class="summary-card" id="description-sec">
	<div class="pannel-card">



 <?= notoficationBusinessFlash($types,$vendor->prohibtionComment,$vendor->status) ?> 
		<div class="card-heading">
			<h3>Prohibtion & Restrictions</h3>			
		</div>		
		<div class="summary-details-content">
                 <div class="summary-details detail-listing">
					 
                     
         <?= ($vendor->prohibtion->count() > 0) ? $vendor->prohibtion->keyValue : 'No Prohibtion & Restrictions' ?>
                     
				</div>
			</div>
		</div>
	</div>
















<!-- ====================== -->
 <div class="Deals-card" id="deals-sec">
	<div class="pannel-card">
    <?= notoficationBusinessFlash($types,$vendor->dealComment,$vendor->status) ?>
		<div class="card-heading">
			<h3>Deals and Discount </h3>			
		</div>		
		<div class="Deals-content">


			    @if($vendor->DealsDiscount->count() > 0)

			    @foreach($vendor->DealsDiscount as $deal)

  <div class="deals-card">
    <figure class="deal-img">
      <img src="{{url($deal->image)}}">
      <figcaption class="discount-per"><span class="blink-text">
        @if($deal->deal_off_type == 0)
         {{$deal->amount}}% 
        @else
         ${{$deal->amount}} 
        @endif
        <small> OFF</small></span> </figcaption>      
    </figure>
     <div class="detal-card-details">
      <div class="dealls-dis-head">
        <a href="{{url( route('vendor_detail_page',[$deal->Business->category->slug,$deal->Business->business_url]))}}#deals-sec"> <h4>{{$deal->title}}</h4></a>

<p class="ser-text"> <span><i class="fas fa-calendar-alt"></i></span>
        @if($deal->deal_life == 0)
          Permanent Deal
        @else
                <span class="deal-starting-date">Stating:<strong> {{date('d-m-Y',strtotime($deal->start_date))}}</strong></span> <span class="deal-starting-date">Ending:<strong> {{date('d-m-Y',strtotime($deal->expiry_date))}}</strong></span>
        @endif
        </p>

        <p class="ser-text mt-1">
         <span><i class="fas fa-tag"></i></span> {{ $deal->Business->category->label }}
        </p>

        @if($deal->type_of_deal == '0')
        <a href="javascript:void(0);" class="coupon-code" data-toggle="tooltip" title="Copy to clipboard">
          <span class="code-text">{{ $deal->deal_code }}</span>
          <span class="get-code">Get Code</span>
        </a>
       @endif
      </div>
      <p class="deal-discription">
             <?php $description =  $deal->description; ?>
                                               {{substr($description,0,100)}} {{strlen($description) > 100 ? '...' : ''}}
        </p>
        <ul class="button-grp-wrap">
          <li><a href="{{url( route('vendor_detail_page',[$deal->Business->category->slug,$deal->Business->business_url]))}}#deals-sec" data-toggle="tooltip" title="Get Deal" class="icon-btn"><i class="fas fa-tags"></i></a></li>
          <li><a href="javascript:void(0);" class="icon-btn" data-title="{{$deal->Business->title}}"
                                             data-message="{{$deal->message_text}}"
                                             data-id="{{$deal->id}}"data-toggle="tooltip" title="Chat"><i class="fa fa-comment-dots"></i></a></li>
        </ul>
     </div>

  </div>
                  <!-- <div class="detail-in-breif">
                                <div class="row">
                                    <div class="col-lg-4 col-md-12">
                                        <div class="left-content">
                                            <img src="{{url($deal->image)}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="right-content">
                                            <p>{{$deal->title}}</p>
                                           
                                
                                            <hr>
                                            <p class="detail">
                                               <?= $deal->description ?> 
                                            </p>
                                            
                                        </div>
                                    </div>
                                </div>
                    </div> -->
                   @endforeach

                    @endif
                     
                    
			</div>
		</div>

    <!--  ============================= -->

	</div>
<!-- ============================ -->





@include('home.vendors.services.detail.reviews')



 
					
				</div>
			


@if(Auth::check() && Auth::user()->role == "vendor")

@include('home.vendors.services.detail.vendor_approval')

@else
@include('home.vendors.services.detail.admin_review_form')

@endif







		</div>
	</div>


	</div>












@include('home.vendors.services.detail.packages')
@include('home.vendors.services.detail.testimonial')


	
@endsection

@section('scripts')

<script>




    
jQuery(function(){

      
      jQuery("body").on('click','.play-model-video',function(e){
            e.preventDefault();

            var url = jQuery( this ).attr('data-link');
            var title = jQuery( this ).attr('data-title');

            $("body").find('#Video-Modal').find('.modal-title').html(title);
            $("body").find('#Video-Modal').find('iframe').attr('src',url+'?autoplay=1');
            $("body").find('#Video-Modal').modal('show');
      });


         $("body").find('#Video-Modal').on('hidden.bs.modal', function () {
                $('#Video-Modal').find('iframe').attr('src','');
         });

});

	/*----------------------------------------------   
 -Simple Scroll To Anchor
 -----------------------------------------------  */  	

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

setTimeout(()=>{
$('.test').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    autoplay: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
});
},0);



    $('.nav-menu-slider').owlCarousel({
       loop:false,
       autoWidth:true,
       nav:true,
       dots:false,
       mouseDrag:true
    })


</script>
@endsection
