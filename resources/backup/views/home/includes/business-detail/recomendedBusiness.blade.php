<div class="side-form-wrap">
     

</div>
<div class="rec-vendor-wrap">
<h3 class="form-heading">Recommended Vendor</h3>

@foreach($recommendedVendor as $business)


  <div class="recom-vendor-card text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000">
         
           <figure> 
           	<img src="{{url(getBasicInfo($business->vendors->id, $business->category_id,'basic_information','cover_photo'))}}"/>
           </figure>
            <div class="rec-detail">
            <h3 class="mb-2">{{ $business->title }}</h3>
                <p>{{ getBasicInfo($business->vendors->id, $business->category_id,'basic_information','short_description') }}</p>
          </div>
          <div class="btn-wrap mini-btn-wrap">
           <a href="{{ route('vendor_detail_page', ['catslug' => $business->category->slug, 'bslug' => $business->business_url]) }}" class="cstm-btn solid-btn" target="_blank">More Detail</a>
         </div>
 </div>


@endforeach
</div>


