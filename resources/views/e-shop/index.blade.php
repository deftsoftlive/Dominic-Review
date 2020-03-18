@extends('e-shop.layouts.layout')
@section('content')




 <!-- banner section starts here here -->
    <section class="main-banner home-main-banner" style="background-image:url({{url('/e-shop/images/banner-bg.png')}});">
        <div class="container">
            <div class="banner-content">
                <div class="row cstm-flex-row">
                    <div class="col-lg-7 wow bounceInLeft" data-wow-delay=".40s">
                        <div class="banner-text">
                            <h1>
                             <small>Sed ut perspiciatis unde omnis</small>
                            vero eos et accusamus et iusto odio </h1>
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</p>
                        </div>
                        <div class="btn-wrap mt-4">
                            <a href="javascript:void(0);" class="cstm-btn solid-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="col-lg-5 wow bounceInRight" data-wow-delay=".40s">
                        <figure class="banner-product-img wow rubberBand" data-wow-delay=".45s">
                            <img src="{{url('e-shop/images/banner-product-img.png')}}">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner section starts Ends here -->

<div id="loadFeaturedCategory" data-route="{{url(route('shop.ajax.featuredCategory'))}}"></div>




     <!--Featured section starts here-->
      @include('e-shop.includes.home.featuredProducts')
     <!--Featured section ends here-->


    <!--Products section starts here-->
  @include('e-shop.includes.home.newProducts')
     <!-- Products section ends here-->

@endsection