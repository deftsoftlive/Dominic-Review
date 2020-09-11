@extends('inc.homelayout')

@section('title', 'DRH|Listing')

@section('content')

@php 
$base_url = \URL::to('/'); 
$custom_box = DB::table('custom_boxes')->where('status',1)->orderBy('sort','asc')->get(); 
@endphp

<section class="football-course-sec" style="z-index:9; background: url({{$base_url}}/public/uploads/{{ getAllValueWithMeta('foot_lan_camp_banner_image', 'football-landing') }});">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="football-course-content">
                    <h2 class="f-course-heading">{{ getAllValueWithMeta('foot_lan_camp_page_title', 'football-landing') }}</h2>
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
                                <a href="javascript:void(0);" class="inner-logo"><img src="{{URL::asset('/uploads')}}/{{ getAllValueWithMeta('foot_lan_camp_go_logo', 'football-landing') }}"></a>
                            </div>
                            <div class="col-sm-8">
                                <div class="camp_list_title camp-logo-section">
                                {!! getAllValueWithMeta('foot_lan_camp_go_title', 'football-landing') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <div class="row">
            <div class="col-md-12">
                <nav>
                    <div class="nav nav-tabs account-menu-tabs activity-tab " id="nav-tab" role="tablist">
                        <a class="nav-item nav-link menu-tab-link active" id="nav-goals-tab" data-toggle="tab" href="#nav-goals" role="tab" aria-controls="nav-home" aria-selected="true"><span><i class="fa fa-home"></i></span>{!! getAllValueWithMeta('foot_lan_tab_title1', 'football-landing') !!}</a>
                        <a class="nav-item nav-link menu-tab-link" id="nav-badges-tab" data-toggle="tab" href="#nav-badges" role="tab" aria-controls="nav-profile" aria-selected="false"><span><i class="fa fa-info-circle"></i></span>{!! getAllValueWithMeta('foot_lan_tab_title2', 'football-landing') !!}</a>
                        <a class="nav-item nav-link menu-tab-link" id="nav-reports-tab" data-toggle="tab" href="#nav-reports" role="tab" aria-controls="nav-contact" aria-selected="false"><span><i class="fas fa-clipboard-list"></i></span>{!! getAllValueWithMeta('foot_lan_tab_title3', 'football-landing') !!}</a>
                        <a class="nav-item nav-link menu-tab-link" id="nav-family-tab" data-toggle="tab" href="#nav-family" role="tab" aria-controls="nav-home" aria-selected="false"><span><i class="fas fa-users"></i></span>{!! getAllValueWithMeta('foot_lan_tab_title4', 'football-landing') !!}</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade active show" id="nav-goals" role="tabpanel" aria-labelledby="nav-goals-tab">
                        <div class="outer-wrap">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="slider-and-info-wrap">
                                        <div class="owl-carousel owl-carousel3 owl-theme owl-loaded owl-drag"> 
                                                <div class="item">
                                                    <div class="inner-content">
                                                        <figure>
                                                            <img src="{{URL::asset('/uploads')}}/{{ getAllValueWithMeta('foot_lan_camp_tab1_image1', 'football-landing') }}" alt="">
                                                        </figure>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="inner-content">
                                                        <figure>
                                                            <img src="{{URL::asset('/uploads')}}/{{ getAllValueWithMeta('foot_lan_camp_tab1_image2', 'football-landing') }}" alt="">
                                                        </figure>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="inner-content">
                                                        <figure>
                                                            <img src="{{URL::asset('/uploads')}}/{{ getAllValueWithMeta('foot_lan_camp_tab1_image3', 'football-landing') }}" alt="">
                                                        </figure>
                                                    </div>
                                                </div>
                                            </div> 

                                        <div class="activitiy-info-content">
                                            {!! getAllValueWithMeta('foot_lan_camp_tab1_description', 'football-landing') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="tab-points-wrap">
                                      @foreach($custom_box as $box)
                                      @if($box->type == 'football-landing-home')
                                      <div class="tab-points-content @if($box->position == 1) inverted @endif">
                                         <div class="tab-points-container">
                                            <div class="row">
                                               <div class="col-sm-7">
                                                  <div class="t-p-text">
                                                     <h2>{{$box->title}}</h2>
                                                     <p>{!! $box->description !!}</p>
                                                     <a class="more-about-camp read-more-less" id="{{$box->id}}" href="javascript:void(0);">Read more</a>
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
                                            <a class="read-more-less less-about-camp box-{{$box->id}}" id="{{$box->id}}" href="javascript:void(0);">Read less</a>
                                         </div>
                                      </div>
                                      @endif
                                      @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-badges" role="tabpanel" aria-labelledby="nav-badges-tab">
                        <div class="outer-wrap">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="slider-and-info-wrap">
                                        <div class="item">
                                            <div class="inner-content">
                                                <figure>
                                                    <img src="{{URL::asset('/uploads')}}/{{ getAllValueWithMeta('foot_lan_camp_tab2_image', 'football-landing') }}" alt="">
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="activitiy-info-content">
                                            <h4>{!! getAllValueWithMeta('ten_lan_camp_tab2_description', 'tennis-landing') !!}</h4>
                                        </div>
                                    </div> 
                                    
                                    <div class="tab-points-wrap">

                                            @foreach($custom_box as $box)
                                              @if($box->type == 'football-landing-club-info')
                                              <div class="tab-points-content @if($box->position == 1) inverted @endif">
                                                 <div class="tab-points-container">
                                                    <div class="row">
                                                       <div class="col-sm-7">
                                                          <div class="t-p-text">
                                                             <h2>{{$box->title}}</h2>
                                                             <p>{!! $box->description !!}</p>
                                                             <a class="more-about-camp read-more-less" id="{{$box->id}}" href="javascript:void(0);">Read more</a>
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
                                                    <a class="read-more-less less-about-camp box-{{$box->id}}" id="{{$box->id}}" href="javascript:void(0);">Read less</a>
                                                 </div>
                                              </div>
                                              @endif
                                            @endforeach
                                            
                                        </div>

                                </div>
                            </div>
                        </div>
                        <!-- Activities - Start Here -->
                        <section class="multi-sec events-sec">
                            <div class="container">
                                <div class="outer-wrap">
                                    <h2>{{ getAllValueWithMeta('foot_lan_act_heading', 'football-landing') }}</h2>
                                    <p>{{ getAllValueWithMeta('foot_lan_act_sub_heading', 'football-landing') }}</p>
                                    <div class="inner-wrap">
                                        <div class="inner-content">
                                            <ul>
                                                <li><img src="{{$base_url}}/public/uploads/{{ getAllValueWithMeta('foot_lan_act1_image', 'football-landing') }}" alt=""></li>
                                                <li>
                                                    <h4>{{ getAllValueWithMeta('foot_lan_act1_title', 'football-landing') }}</h4>
                                                </li>
                                                <li>
                                                    <p>{{ getAllValueWithMeta('foot_lan_act1_description', 'football-landing') }}</p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="inner-content">
                                            <ul>
                                                <li><img src="{{$base_url}}/public/uploads/{{ getAllValueWithMeta('foot_lan_act2_image', 'football-landing') }}" alt=""></li>
                                                <li>
                                                    <h4>{{ getAllValueWithMeta('foot_lan_act2_title', 'football-landing') }}</h4>
                                                </li>
                                                <li>
                                                    <p>{{ getAllValueWithMeta('foot_lan_act2_description', 'football-landing') }}</p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="inner-content">
                                            <ul>
                                                <li><img src="{{$base_url}}/public/uploads/{{ getAllValueWithMeta('foot_lan_act3_image', 'football-landing') }}" alt=""></li>
                                                <li>
                                                    <h4>{{ getAllValueWithMeta('foot_lan_act3_title', 'football-landing') }}</h4>
                                                </li>
                                                <li>
                                                    <p>{{ getAllValueWithMeta('foot_lan_act3_description', 'football-landing') }}</p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="inner-content">
                                            <ul>
                                                <li><img src="{{$base_url}}/public/uploads/{{ getAllValueWithMeta('foot_lan_act4_image', 'football-landing') }}" alt=""></li>
                                                <li>
                                                    <h4>{{ getAllValueWithMeta('foot_lan_act4_title', 'football-landing') }}</h4>
                                                </li>
                                                <li>
                                                    <p>{{ getAllValueWithMeta('foot_lan_act4_description', 'football-landing') }}</p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="inner-content">
                                            <ul>
                                                <li><img src="{{$base_url}}/public/uploads/{{ getAllValueWithMeta('foot_lan_act5_image', 'football-landing') }}" alt=""></li>
                                                <li>
                                                    <h4>{{ getAllValueWithMeta('foot_lan_act5_title', 'football-landing') }}</h4>
                                                </li>
                                                <li>
                                                    <p>{{ getAllValueWithMeta('foot_lan_act5_description', 'football-landing') }}</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="tab-points-wrap">

                                            @foreach($custom_box as $box)
                                              @if($box->type == 'football-landing-home')
                                              <div class="tab-points-content @if($box->position == 1) inverted @endif">
                                                 <div class="tab-points-container">
                                                    <div class="row">
                                                       <div class="col-sm-7">
                                                          <div class="t-p-text">
                                                             <h2>{{$box->title}}</h2>
                                                             <p>{!! $box->description !!}</p>
                                                             <a class="more-about-camp read-more-less" id="{{$box->id}}" href="javascript:void(0);">Read more</a>
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
                                                    <a class="read-more-less less-about-camp box-{{$box->id}}" id="{{$box->id}}" href="javascript:void(0);">Read less</a>
                                                 </div>
                                              </div>
                                              @endif
                                            @endforeach
                                            
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </section>
                        <!-- Activities - End Here -->
                    </div>
                    <div class="tab-pane fade" id="nav-reports" role="tabpanel" aria-labelledby="nav-reports-tab">
                        <div class="o-i-tab"> 
                            {!! getAllValueWithMeta('foot_lan_camp_tab3_description', 'football-landing') !!}
                        </div>
                        <br/>
                        <a style="float:right;" href="{{ getAllValueWithMeta('foot_lan_btn_link', 'football-landing') }}" class="cstm-btn">{{ getAllValueWithMeta('foot_lan_btn', 'football-landing') }}</a>
                    </div>
                    <div class="tab-pane fade" id="nav-family" role="tabpanel" aria-labelledby="nav-family-tab">
                        <div class="o-i-tab"> 
                            <div class="row">
                                <div class="col-sm-7">
                                    <div class="o-i-accordion">
                                        <h2>{{ getAllValueWithMeta('foot_lan_camp_tab4_title', 'football-landing') }}</h2>
                                        <div id="accordion">
                                            @foreach($accordian as $acc)
                                             <div class="card @if($acc->color == '#be298d')pink @elseif($acc->color == '#00afef')blue @elseif($acc->color == '#bea029')yellow @endif">
                                                <div class="card-header" id="headingOne">
                                                   <h5 class="mb-0">
                                                      <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$acc->id}}" aria-expanded="false" aria-controls="collapse{{$acc->id}}">
                                                      {{$acc->title}}
                                                      </button>
                                                   </h5>
                                                </div>
                                                <div id="collapse{{$acc->id}}" class="collapse" aria-labelledby="heading{{$acc->id}}" data-parent="#accordion">
                                                   <div class="card-body">
                                                      {!! $acc->description !!}
                                                      @php 
                                                      $acc_id = $acc->id;
                                                      $accor_pdfs = DB::table('accordian_pdfs')->where('accordian_id','=', $acc_id)->get(); 
                                                      @endphp
                                                      @if(count($accor_pdfs)> 0)
                                                      @foreach($accor_pdfs as $pdf)
                                                      <a target="_blank" href="{{URL::asset('/uploads/accordian')}}/{{$pdf->pdf}}" class="course-pdf-icon"><i class="fa fa-file-pdf"></i>{{$pdf->accordian_title}}</a>
                                                      @endforeach
                                                      @endif
                                                   </div>
                                                </div>
                                             </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="o-i-testimonials multi-testimonial">

                                    <div class="owl-carousel owl-carousel12 owl-theme">
                                    @foreach($testimonial as $test)
                                    <div class="item">
                                        <div class="testimonial-card">
                                         <figure class="testimonial-img-wrap">
                                            <img src="http://49.249.236.30:8654/dominic-new/public/images/testimonial-card-img-1.png">
                                         </figure>
                                         <figcaption class="testimonial-caption">
                                            <p>{{$test->description}}</p>
                                            <div class="t-user">
                                               <div class="round-arrow">
                                                  <img src="http://49.249.236.30:8654/dominic-new/public/images/round-arrow-img.png">
                                               </div>
                                               <h3>{{$test->title}}</h3>
                                               <span>
                                               @if($test->image)
                                               <img src="{{ URL::asset('uploads')}}/{{$test->image}}">
                                               @else
                                               <img src="{{ URL::asset('images/default.jpg')}}">
                                               @endif
                                               </span>   
                                            </div>
                                         </figcaption>
                                      </div>
                                    </div>
                                    @endforeach

                                    </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="tab-points-wrap">

                                    @foreach($custom_box as $box)
                                      @if($box->type == 'football-landing-parent-info')
                                      <div class="tab-points-content @if($box->position == 1) inverted @endif">
                                         <div class="tab-points-container">
                                            <div class="row">
                                               <div class="col-sm-7">
                                                  <div class="t-p-text">
                                                     <h2>{{$box->title}}</h2>
                                                     <p>{!! $box->description !!}</p>
                                                     <a class="more-about-camp read-more-less" id="{{$box->id}}" href="javascript:void(0);">Read more</a>
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
                                            <a class="read-more-less less-about-camp box-{{$box->id}}" id="{{$box->id}}" href="javascript:void(0);">Read less</a>
                                         </div>
                                      </div>
                                      @endif
                                    @endforeach

                                    <br><br>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="camp-down-sec">
    <div class="container">
        <div class="outer-wrap">
            <h4>{{ getAllValueWithMeta('foot_lan_camp_heading2', 'football-landing') }}</h4>
            <p>{{ getAllValueWithMeta('foot_lan_camp_description2', 'football-landing') }}</p>
        </div>
        <div class="inner-wrap">
            <div class="left-side-content">
                <h4>Download</h4>
                <ul>
                @foreach($accordian_download as $acc)
                   @if(isset($acc->description))
                   <li><a target="_blank" href="{!!$acc->description!!}">{{$acc->title}}</a></li>
                   @endif
                   @php 
                   $acc_id = $acc->id;
                   $pdf = DB::table('accordian_pdfs')->where('accordian_id','=', $acc_id)->get(); 
                   @endphp
                   @if(isset($pdf))
                   @foreach($pdf as $p)
                   <li><a target="_blank" href="{{URL::asset('/uploads/accordian')}}/{{$p->pdf}}">{{$p->accordian_title}}</a></li>
                   @endforeach
                   @endif
                @endforeach
                </ul>
            </div>
            <div class="right-side-content">
                <h4>Parents information</h4>
                <ul>
                @foreach($accordian_parent_info as $acc)
                   @if(isset($acc->description))
                   <li><a target="_blank" href="{!!$acc->description!!}">{{$acc->title}}</a></li>
                   @endif
                   @php 
                   $acc_id = $acc->id;
                   $pdf1 = DB::table('accordian_pdfs')->where('accordian_id','=', $acc_id)->get(); 
                   @endphp
                   @if(isset($pdf1))
                   @foreach($pdf1 as $p)
                   <li><a target="_blank" href="{{URL::asset('/uploads/accordian')}}/{{$p->pdf}}">{{$p->accordian_title}}</a></li>
                   @endforeach
                   @endif
                @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="click-here-sec">
   <div class="container">
      <div class="row">
         <div class="col-md-8 offset-md-2">
            <div class="click-sec-content">
               <h2 class="click-sec-tagline">{{ getAllValueWithMeta('foot_lan_camp_title', 'football-landing') }}</h2>
               <ul class="click-btn-content">
                  <li>
                     <figure>
                        <img src="http://49.249.236.30:8654/dominic-new/public/images/click-btn-img.png" alt="">
                     </figure>
                  </li>
                  <li>
                     <a href="{{ getAllValueWithMeta('foot_lan_camp_button_url', 'football-landing') }}" class="cstm-btn">{{ getAllValueWithMeta('foot_lan_camp_button_title', 'football-landing') }}</a>
                  </li>
                  <li>
                     <figure>
                        <img src="http://49.249.236.30:8654/dominic-new/public/images/click-btn-img.png" alt="">
                     </figure>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>

@endsection