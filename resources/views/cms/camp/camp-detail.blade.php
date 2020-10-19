@extends('inc.homelayout')

@section('title', 'DRH|Listing')

@section('content')

@php 
  $base_url = \URL::to('/'); 
  $camp_cat_id = $camp_category->id; 
  $camp = DB::table('camps')->where('category',$camp_cat_id)->where('status',1)->get();
  $accordian = DB::table('accordians')->where('page_title', Request::path())->get();
@endphp

<style>
.c-d-book-now-date {
  font-size: 15px;
}
</style>

<section class="inner-banner i-b-camp-detail" style="background: url({{$base_url}}/public/uploads/{{$camp_category->image}});">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-banner-content">
              <h2 class="inner-banner-heading">{{$camp_category->title}}</h2>
            </div>
          </div>
        </div>
      </div>
    </section>
<section class="c-d-slider section-padding ">
  <div class="container">
  <div class="camp-logo-section">
	  <div class="container">
	    <div class="row">
		  <div class="col-sm-4">
		    <a href="javascript:void(0);" class="inner-logo"><img src="{{URL::asset('/uploads')}}/{{ getAllValueWithMeta('camp_detail_logo', 'camp-detail') }}"></a>
		  </div>
		  <div class="col-sm-8">
		    <div class="camp-logo-section">
			  <h2>Camp Name</h2>
			  <p>{{$camp_category->title}}</p>
			</div>
		  </div>
		</div>
	  </div>
	</div>
	<div class="c-d-img-text upper_text_wrap">
    <div class="row">
  <div class="col-lg-7 col-md-12 col-sm-12 left_text-wrap ">
    <div class="c-d-description">
      {!! $camp_category->description !!}
    </div>
  </div>
    <div class="col-lg-5 col-md-12 col-sm-12 right_text-wrap">
      <div class="owl-carousel owl-theme owl-c-d">
      <div class="item">
        <img src="{{URL::asset('/uploads')}}/{{$camp_category->slider_image1}}" alt="" />
      </div>
      <div class="item">
        <img src="{{URL::asset('/uploads')}}/{{$camp_category->slider_image2}}" alt="" />
      </div>
      <div class="item">
        <img src="{{URL::asset('/uploads')}}/{{$camp_category->slider_image3}}" alt="" />
      </div>
      <div class="item">
        <img src="{{URL::asset('/uploads')}}/{{$camp_category->slider_image4}}" alt="" />
      </div>
    </div>
    </div>
  </div>
  </div>
  <div class="c-d-accordion-slider">
  <div class="row">
  <div class="col-sm-8 @if(count($accordian)> 0) @else accord_nt_exist @endif">
  <div class="c-d-accordion">
  <div id="accordion">

@foreach($accordian as $acc)
                <div class="card @if($acc->color == '#be298d')pink @elseif($acc->color == '#00afef')blue @elseif($acc->color == '#bea029')yellow @endif">
                  <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse{{$acc->id}}" aria-expanded="false" aria-controls="collapse{{$acc->id}}">
                      {{$acc->title}}
                      </button>
                    </h5>
                  </div>
                  <div id="collapse{{$acc->id}}" class="collapse" aria-labelledby="heading{{$acc->id}}" data-parent="#accordion" style="">
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
    <div class="col-sm-4">
      <div class="c-d-testimonials">
      <div class="owl-carousel owl-theme owl-c-d-testimonials">
        @foreach($testimonial as $test)
            <div class="item">
                <div class="testimonial-card">
                  <figure class="testimonial-img-wrap">
                     <img class="nb-icon" src="{{ URL::asset('images/nb-icon.png')}}">
                    <img class="b-icon" src="{{ URL::asset('images/b-icon.png')}}"> 
                  </figure>
                  <figcaption class="testimonial-caption">
                    <p>{{$test->description}}</p>
                    <div class="t-user main_t_user">
                     <!--  <div class="round-arrow">
                         <img class="nb-icon" src="{{ URL::asset('images/nb-icon.png')}}">
                    <img class="b-icon" src="{{ URL::asset('images/b-icon.png')}}"> 
                      </div> -->
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
  </div>
</section>
<section class="c-d-book-now family_members">
  <div class="container">
    <div class="text-center">
    <div class="section-heading">
      <h1 class="sec-heading">Upcoming Camps</h1>
    </div>
  </div>

@foreach($camp as $ca)
  <div class="c-d-book-now-wrap d-f">
      <div class="c-d-book-now-date">
        {{$ca->camp_date}}
      <!--   {{\Carbon\Carbon::parse($ca->created_at)->format('d')}} <span>{{\Carbon\Carbon::parse($ca->created_at)->format('M')}}</span> -->
          </div>
      <div class="c-d-book-now-text">
        <h4>{{$ca->title}}</h4>
        {!! $ca->description !!}
      <!-- <a href="{{url('book-a-camp')}}/{{$ca->slug}}" class="cstm-btn">Book now</a> -->

      @if(Auth::check())
        <a href="{{url('book-a-camp')}}/{{$ca->slug}}" class="cstm-btn main_button">Book Now</a>
      @else
        <a href="{{url('login')}}" class="cstm-btn main_button">Book Now</a>
      @endif
      </div>
  </div>
@endforeach

</section>
<section class="click-here-sec">
      <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="click-sec-content">
                  <h2 class="click-sec-tagline">{{ getAllValueWithMeta('camp_detail_title', 'camp-detail') }}</h2>
                  <ul class="click-btn-content">
                    <li>
                      <figure>
                        <img src="{{url('/')}}/public/images/click-btn-img.png">
                      </figure>
                    </li>
                    <li>
                        <a href="{{ getAllValueWithMeta('camp_detail_button_url', 'camp-detail') }}" class="cstm-btn main_button">{{ getAllValueWithMeta('camp_detail_button_title', 'camp-detail') }}</a>
                    </li>
                    <li>
                      <figure>
                        <img src="{{url('/')}}/public/images/click-btn-img.png">
                      </figure>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
      </div>
    </section>
@endsection