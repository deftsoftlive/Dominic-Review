@extends('inc.homelayout')

@section('title', 'DRH|Listing')

@section('content')

@php 
$base_url = \URL::to('/'); 
$custom_box = DB::table('custom_boxes')->where('status',1)->orderBy('sort','asc')->get(); 
@endphp

<section class="football-course-sec" style="z-index:9; background: url({{$base_url}}/public/uploads/{{ getAllValueWithMeta('tennis_pro_banner_image', 'tennis-pro') }});">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="football-course-content">
                    <h2 class="f-course-heading">{{ getAllValueWithMeta('tennis_pro_page_title', 'tennis-pro') }}</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="account-menu-sec multi-activities-sec">
    <div class="container">
        <div class="camp-logo-section">
            <div class="container"> 
                <div class="camp-logo-section c-l-s-camp-listing">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4">
                                <a href="javascript:void(0);" class="inner-logo"><img src="{{URL::asset('/uploads')}}/{{ getAllValueWithMeta('tennis_pro_img1', 'tennis-pro') }}"></a>
                            </div>
                            <div class="col-sm-8">
                                <div class="camp_list_title camp-logo-section mb-0">
                                  <!--   <h2><span style="font-size:72px;"><strong>Tennis Pro</strong></span></h2> -->
                                    <img src="{{URL::asset('/uploads')}}/{{ getAllValueWithMeta('tennis_pro_img2', 'tennis-pro') }}" height="100px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 pb-30">
	        	<div class="tab-points-container">
	                <h3 class="text-center">{!! getAllValueWithMeta('tennis_pro_sec1_desc', 'tennis-pro') !!}</h3>
	             
	                <ul class="d-flex justify-content-center pdf_tennis align-items-center flex-md-row flex-column">
	                    <li>
	                        <a target="_blank" href="{{URL::asset('/uploads')}}/{{ getAllValueWithMeta('tennis_pro_sec1_img1_link', 'tennis-pro') }}" class="download_pdf"><img src="{{URL::asset('/uploads')}}/{{ getAllValueWithMeta('tennis_pro_sec1_img1', 'tennis-pro') }}" alt="download pdf"></a>
	                    </li>
	                    <li>
	                        <a href="{{ getAllValueWithMeta('tennis_pro_sec1_link', 'tennis-pro') }}" class="cst_tennis_btn blue">{{ getAllValueWithMeta('tennis_pro_sec1_btn', 'tennis-pro') }}</a>
	                    </li>
	                    <li>
	                        <a href="{{ getAllValueWithMeta('tennis_pro_sec1_img2_link', 'tennis-pro') }}"><img src="{{URL::asset('/uploads')}}/{{ getAllValueWithMeta('tennis_pro_sec1_img2', 'tennis-pro') }}" class="tennis_coach" alt="find your tennis coach"></a>
	                    </li>
	                </ul>
	            </div>
	        </div>
            <div class="col-md-12">

                <div class="tab-points-content">
                    <div class="tab-points-container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="t-p-text">
                                    <h2 class="text-center">{{ getAllValueWithMeta('tennis_pro_htw_title', 'tennis-pro') }}</h2>
                                    <p class="text-center">{!! getAllValueWithMeta('tennis_pro_htw_desc', 'tennis-pro') !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="outer-wrap">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tab-points-wrap">
                            @foreach($custom_box as $box)
                              @if($box->type == 'tennis-pro')
                              <div class="tab-points-content @if($box->position == 1) inverted @endif">
                                 <div class="tab-points-container">
                                    <div class="row">
                                       <div class="col-sm-7">
                                          <div class="t-p-text">
                                             <h2>{{$box->title}}</h2>
                                             <p>{!! $box->description !!}</p>
                                             <a class="more-about-camp" id="{{$box->id}}" href="javascript:void(0);">Read more</a>
                                          </div>
                                       </div>
                                       <div class="col-sm-5">
                                          <div class="t-p-img">
                                             <img src="{{url('/public/uploads')}}/{{$box->image}}" alt="" />
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="tab-points-container t-p-c-more">
                                    <p>{!! $box->more_text !!}</p>
                                    <a class="less-about-camp box-{{$box->id}}" id="{{$box->id}}" href="javascript:void(0);">Read less</a>
                                 </div>
                              </div>
                              @endif
                              @endforeach
                         
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="slider-and-info-wrap create_drh_account">
                                <div class="activitiy-info-content">
                                    <h4 style="text-align: center;">{{ getAllValueWithMeta('ten_pro_lastsec_text', 'tennis-pro') }}</h4>
                                    <ul class="d-flex justify-content-center flex-md-row flex-column align-items-center">
                                        <li>
                                            <a href="{{ getAllValueWithMeta('ten_pro_lastsec_btn1_link', 'tennis-pro') }}" class="cst_tennis_btn">{{ getAllValueWithMeta('ten_pro_lastsec_btn1_text', 'tennis-pro') }}</a>
                                        </li>
                                        <li>
                                            <a href="{{ getAllValueWithMeta('ten_pro_lastsec_btn2_link', 'tennis-pro') }}" class="cst_tennis_btn">{{ getAllValueWithMeta('ten_pro_lastsec_btn2_text', 'tennis-pro') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="click-here-sec">
   <div class="container">
      <div class="row">
         <div class="col-md-8 offset-md-2">
            <div class="click-sec-content">
               <h2 class="click-sec-tagline">{{ getAllValueWithMeta('tennis_pro_sec_title', 'tennis-pro') }}</h2>
               <ul class="click-btn-content">
                  <li>
                     <figure>
                        <img src="{{URL::asset('/images/click-btn-img.png')}}" alt="">
                     </figure>
                  </li>
                  <li>
                     <a href="{{ getAllValueWithMeta('tennis_pro_sec_button_url', 'tennis-pro') }}" class="cstm-btn main_button">{{ getAllValueWithMeta('tennis_pro_sec_button_title', 'tennis-pro') }}</a>
                  </li>
                  <li>
                     <figure>
                        <img src="{{URL::asset('/images/click-btn-img.png')}}" alt="">
                     </figure>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection 