@extends('inc.homelayout')
@section('title', 'DRH|Listing')
@section('content')
@php
$base_url = \URL::to('/');
$custom_box = DB::table('custom_boxes')->where('status',1)->orderBy('sort','asc')->get();
@endphp
<section class="football-course-sec" style="z-index:9; background: url({{$base_url}}/public/uploads/{{ getAllValueWithMeta('camp_banner_image', 'camp-listing') }});">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="football-course-content">
                    <h2 class="f-course-heading">{{ getAllValueWithMeta('camp_page_title', 'camp-listing') }}</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="account-menu-sec multi-activities-sec">
    <div class="container">
        <div class="camp-logo-section">
            <div class="container">
                <!-- <div class="row">
               <div class="col-sm-12 text-center">
                 <a href="javascript:void(0);" class="inner-logo"><img src="{{URL::asset('/uploads')}}/{{ getAllValueWithMeta('camp_go_logo', 'camp-listing') }}"></a>
               </div>
               </div> -->
                <div class="camp-logo-section c-l-s-camp-listing">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4">
                                <a href="javascript:void(0);" class="inner-logo"><img src="{{URL::asset('/uploads')}}/{{ getAllValueWithMeta('camp_go_logo', 'camp-listing') }}"></a>
                            </div>
                            <div class="col-sm-8">
                                <div class="camp_list_title camp-logo-section">
                                    {!! getAllValueWithMeta('camp_go_title', 'camp-listing') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- <div class="account-menu-sec-heading">
               <h1>ACCOUNT menu</h1>
               </div> -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <nav>
                    <div class="nav nav-tabs account-menu-tabs activity-tab " id="nav-tab" role="tablist">
                        <a class="nav-item nav-link menu-tab-link active" id="nav-goals-tab" data-toggle="tab" href="#nav-goals" role="tab" aria-controls="nav-home" aria-selected="true"><span><i class="fa fa-home"></i></span>{!! getAllValueWithMeta('camp_tab_title1', 'camp-listing') !!}</a>
                        <a class="nav-item nav-link menu-tab-link" id="nav-badges-tab" data-toggle="tab" href="#nav-badges" role="tab" aria-controls="nav-profile" aria-selected="false"><span><i class="fa fa-info-circle"></i></span>{!! getAllValueWithMeta('camp_tab_title2', 'camp-listing') !!}</a>
                        <a class="nav-item nav-link menu-tab-link" id="nav-reports-tab" data-toggle="tab" href="#nav-reports" role="tab" aria-controls="nav-contact" aria-selected="false"><span><i class="fas fa-clipboard-list"></i></span>{!! getAllValueWithMeta('camp_tab_title3', 'camp-listing') !!}</a>
                        <a class="nav-item nav-link menu-tab-link" id="nav-family-tab" data-toggle="tab" href="#nav-family" role="tab" aria-controls="nav-home" aria-selected="false"><span><i class="fas fa-users"></i></span>{!! getAllValueWithMeta('camp_tab_title4', 'camp-listing') !!}</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade active show" id="nav-goals" role="tabpanel" aria-labelledby="nav-goals-tab">
                        <div class="outer-wrap">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="slider-and-info-wrap">
                                        <div class="owl-carousel owl-carousel3 owl-theme">
                                            <div class="item">
                                                <div class="inner-content">
                                                    <figure>
                                                        <img src="{{URL::asset('/uploads')}}/{{ getAllValueWithMeta('camp_tab1_image1', 'camp-listing') }}" alt="">
                                                    </figure>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="inner-content">
                                                    <figure>
                                                        <img src="{{URL::asset('/uploads')}}/{{ getAllValueWithMeta('camp_tab1_image2', 'camp-listing') }}" alt="">
                                                    </figure>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="inner-content">
                                                    <figure>
                                                        <img src="{{URL::asset('/uploads')}}/{{ getAllValueWithMeta('camp_tab1_image3', 'camp-listing') }}" alt="">
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="activitiy-info-content">
                                            {!! getAllValueWithMeta('camp_tab1_description', 'camp-listing') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="tab-points-wrap">
                                        @foreach($custom_box as $box)
                                        @if($box->type == 'camp-home')
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
                                                    <img src="{{URL::asset('/uploads')}}/{{ getAllValueWithMeta('camp_tab2_image', 'camp-listing') }}" alt="">
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="activitiy-info-content">
                                            <h4>{!! getAllValueWithMeta('camp_tab2_title', 'camp-listing') !!}</h4>
                                            <!-- <p class="challange-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit,</p> -->
                                        </div>
                                    </div>
                                    <!--<div class="col-md-12">
                              <div class="activity-sec-one">
                                {!! getAllValueWithMeta('camp_tab2_description', 'camp-listing') !!}
                              </div>
                              </div>-->
                                    <div class="tab-points-wrap">
                                        @foreach($camp_categories as $cat)
                                        <div class="tab-points-content">
                                            <div class="tab-points-container">
                                                <div class="row">
                                                    <div class="col-sm-7">
                                                        <div class="t-p-text desktop-cstm-cont">
                                                            <h2>{{$cat->title}}</h2>
                                                            {!! $cat->description !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5">
                                                         <div class="t-p-text resp-cstm-cont">
                                                            <h2>{{$cat->title}}</h2>
                                                          
                                                        </div>
                                                        <div class="t-p-img image-fit-cust">
                                                            <img src="{{URL::asset('/uploads')}}/{{$cat->image}}" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-points-container t-p-c-more">
                                                {!! $cat->description_more !!}
                                                <a class="less-cat" href="javascript:void(0);">Read less</a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Activities - Start Here -->
                        <section class="multi-sec events-sec">
                            <div class="container">
                                <div class="outer-wrap">
                                    <h2>{{ getAllValueWithMeta('act_heading', 'camp-listing') }}</h2>
                                    <p>{{ getAllValueWithMeta('act_sub_heading', 'camp-listing') }}</p>
                                    <div class="inner-wrap">
                                        <div class="inner-content">
                                            <ul>
                                                <li><img src="{{$base_url}}/public/uploads/{{ getAllValueWithMeta('act1_image', 'camp-listing') }}" alt=""></li>
                                                <li>
                                                    <h4>{{ getAllValueWithMeta('act1_title', 'camp-listing') }}</h4>
                                                </li>
                                                <li>
                                                    {!! getAllValueWithMeta('act1_description', 'camp-listing') !!}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="inner-content">
                                            <ul>
                                                <li><img src="{{$base_url}}/public/uploads/{{ getAllValueWithMeta('act2_image', 'camp-listing') }}" alt=""></li>
                                                <li>
                                                    <h4>{{ getAllValueWithMeta('act2_title', 'camp-listing') }}</h4>
                                                </li>
                                                <li>
                                                    {!! getAllValueWithMeta('act2_description', 'camp-listing') !!}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="inner-content">
                                            <ul>
                                                <li><img src="{{$base_url}}/public/uploads/{{ getAllValueWithMeta('act3_image', 'camp-listing') }}" alt=""></li>
                                                <li>
                                                    <h4>{{ getAllValueWithMeta('act3_title', 'camp-listing') }}</h4>
                                                </li>
                                                <li>
                                                    {!! getAllValueWithMeta('act3_description', 'camp-listing') !!}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="inner-content">
                                            <ul>
                                                <li><img src="{{$base_url}}/public/uploads/{{ getAllValueWithMeta('act4_image', 'camp-listing') }}" alt=""></li>
                                                <li>
                                                    <h4>{{ getAllValueWithMeta('act4_title', 'camp-listing') }}</h4>
                                                </li>
                                                <li>
                                                    {!! getAllValueWithMeta('act4_description', 'camp-listing') !!}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="inner-content">
                                            <ul>
                                                <li><img src="{{$base_url}}/public/uploads/{{ getAllValueWithMeta('act5_image', 'camp-listing') }}" alt=""></li>
                                                <li>
                                                    <h4>{{ getAllValueWithMeta('act5_title', 'camp-listing') }}</h4>
                                                </li>
                                                <li>
                                                    {!! getAllValueWithMeta('act5_description', 'camp-listing') !!}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Activities - End Here -->
                    </div>
                    <div class="tab-pane fade" id="nav-reports" role="tabpanel" aria-labelledby="nav-reports-tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="slider-and-info-wrap" style="margin-bottom: 30px;">
                                    <div class="item">
                                        <div class="inner-content">
                                            <figure>
                                                <img src="{{URL::asset('/uploads')}}/{{ getAllValueWithMeta('camp_tab3_image', 'camp-listing') }}" alt="">
                                            </figure>
                                        </div>
                                    </div>
                                    <div class="activitiy-info-content">
                                        <h4>{!! getAllValueWithMeta('camp_tab3_description', 'camp-listing') !!}</h4>
                                        <!-- <p class="challange-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit,</p> -->
                                    </div>
                                </div>
                            </div>
                            <div class="we-run-wrap d-f">
                                @foreach($camp_categories as $cat)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-12 club-wrap">
                                    <a href="{{url('camp-detail')}}/{{$cat->slug}}" class="we-run-container">
                                        <img src="{{URL::asset('/uploads')}}/{{$cat->image}}" alt="" />
                                        <div class="we-run-overlay">
                                            <p>{{$cat->title}}</p>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                            <div class="col-md-12">
                                <h2 style="margin-bottom: 15px; text-align: center;">Our upcoming Camps</h2>
                                <div class="player-report-table camp_table">
                                    <div class="report-table-wrap">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Camp Name</th>
                                                    <th>When</th>
                                                    <th>Location</th>
                                                    <th>Dates</th>
                                                    <!-- <th>Age Group</th> -->
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $camp = DB::table('camps')->where('status',1)->get();
                                                @endphp
                                                @foreach($camp as $ca)
                                                <tr>
                                                    <td>
                                                        <p>{{$ca->title}}</p>
                                                    </td>
                                                    <td>
                                                        <p>{{$ca->term}}</p>
                                                    </td>
                                                    <td>
                                                        <p>{{$ca->location}}</p>
                                                    </td>
                                                    <td>
                                                        <p>{{$ca->camp_date}}</p>
                                                    </td>
                                                    <!-- <td><p>3 - 20 Years</p></td> -->
                                                    <td>
                                                        <p>Available</p>
                                                    </td>
                                                    <td>
                                                        @if(Auth::check())
                                                            <p><a href="{{url('/book-a-camp')}}/{{$ca->slug}}">Book Now</a></p>
                                                        @else
                                                            <p><a href="{{url('login')}}">Book Now</a></p>
                                                        @endif
                                                        <!-- <p><a href="{{url('/book-a-camp')}}/{{$ca->slug}}">Book Now</a></p> -->
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-points-wrap">
                                    @foreach($custom_box as $box)
                                    @if($box->type == 'camp-book')
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
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-family" role="tabpanel" aria-labelledby="nav-family-tab">
                        <div class="o-i-tab">
                            <!--{!! getAllValueWithMeta('camp_tab4_description', 'camp-listing') !!}-->
                            <div class="row">
                                <div class="col-sm-7">
                                    <div class="o-i-accordion">
                                        <h2>Camp GO Parent info</h2>
                                        <div id="accordion">
                                            @foreach($accordian as $acc)
                                            <div class="card @if($acc->color == '#001642')blue @elseif($acc->color == '#00afef')sky-blue @elseif($acc->color == '#bea029')yellow @endif">
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
                                                        <img class="nb-icon" src="{{ URL::asset('images/nb-icon.png')}}">
                                                        <img class="b-icon" src="{{ URL::asset('images/b-icon.png')}}">
                                                    </figure>
                                                    <figcaption class="testimonial-caption">
                                                        <p>{{$test->description}}</p>
                                                        <div class="t-user">
                                                            <div class="round-arrow">
                                                                <img src="{{URL::asset('/images/round-arrow-img.png')}}">
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
                                    @if($box->type == 'camp-parent-info')
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
                                    <br /></br>
                                    <div class="account-menu-sec-heading">
                                        <h1>Our Childcare voucher providers</h1>
                                    </div>
                                    <div class="player-report-table p-i-table">
                                        <div class="report-table-wrap">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>Provider Name</th>
                                                        <th>Provider Code</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($providers as $pro)
                                                    <tr>
                                                        <td>{{$pro->provider_name}}</td>
                                                        <td>{{$pro->provider_code}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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
            <h4>{{ getAllValueWithMeta('camp_heading5', 'camp-listing') }}</h4>
            <p>{{ getAllValueWithMeta('camp_description5', 'camp-listing') }}</p>
        </div>
        <div class="inner-wrap">
            <div class="left-side-content">
                <h4>{{ getAllValueWithMeta('camp_heading6', 'camp-listing') }}</h4>
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
                <h4>{{ getAllValueWithMeta('camp_heading7', 'camp-listing') }}</h4>
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
    </div>
</section>
<section class="click-here-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="click-sec-content">
                    <h2 class="click-sec-tagline">Need help with kids camps or our coaching courses?</h2>
                    <ul class="click-btn-content">
                        <li>
                            <figure>
                                <img src="{{url('/')}}/public/images/click-btn-img.png" alt="">
                            </figure>
                        </li>
                        <li>
                            <a href="#" class="cstm-btn main_button">Click Here</a>
                        </li>
                        <li>
                            <figure>
                                <img src="{{url('/')}}/public/images/click-btn-img.png" alt="">
                            </figure>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection