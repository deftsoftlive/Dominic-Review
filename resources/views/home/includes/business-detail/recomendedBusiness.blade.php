<!-- <div class="side-form-wrap">
  <div class="min-btn-wrap">
  <button type="button" class="cstm-btn solid btn" data-toggle="modal" data-target="#CstmPackage">Custom Pkg</button>
</div>
</div> -->
<div class="rec-vendor-wrap mt-5">
<h3 class="form-heading">Recommended Vendor</h3>

@foreach($recommendedVendor as $business)


  <div class="recom-vendor-card text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000">
         
           <figure> 
           	<img src="{{url(getBasicInfo($business->vendors->id, $business->category_id,'basic_information','cover_photo'))}}"/>
           </figure>
            <div class="rec-vend-detail">
            <h3 class="mb-2">{{ $business->title }}</h3>
                <p>{{ getBasicInfo($business->vendors->id, $business->category_id,'basic_information','short_description') }}</p>
          </div>
          <div class="btn-wrap mini-btn-wrap">
           <a href="{{ route('vendor_detail_page', ['catslug' => $business->category->slug, 'bslug' => $business->business_url]) }}" class="cstm-btn solid-btn" target="_blank">More Detail</a>
         </div>
 </div>


@endforeach
</div>


<!-- custom package modal -->
<!-- The Modal -->
<div class="modal" id="CstmPackage">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <!-- <div class="modal-header">
        <h4 class="modal-title">Custom Package</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div> -->
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="cstm-pkg-banner" style="background: url('/frontend/images/status-info-bg.jpg');">
         <div class="cstm-pkg-content">
          <div class="pkg-mod-heading">
             <h2>Create Your Custom Package</h2>
           </div>
         </div>
      </div>

      <!-- Modal body -->
       <div class="modal-body">
      @include('home.includes.business-detail.customPackageForm')
      </div>

      <!-- Modal footer -->
     
    </div>
  </div>
</div>
<!-- =============================== -->

