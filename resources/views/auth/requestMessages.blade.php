@extends('layouts.home')

@section('title') {{ getAllValueWithMeta('meta_title', 'signup') }} @endsection
@section('description') {{ getAllValueWithMeta('meta_description', 'signup') }} @endsection
@section('keywords') {{ getAllValueWithMeta('meta_keyword', 'signup') }} @endsection

@section('content')

<!-- <app-header></app-header> -->
<style type="text/css">
  span.status-icon {
    font-size: 66px;
    color: #fff;
    margin-bottom: 21px;
}
</style>
<section class="log-sign-banner aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000"" style="background:url({{ url('/uploads').'/'.getAllValueWithMeta('signup_background_image', 'vendor-signup')}});">
    <div class="container">
            <div class="page-title text-center">
                     <h1>Status Information</h1>
                </div>
            </div>    
        </section>
        <section class="form-sec aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000">
                <div class="container">         
                  <div class="signUp-form-wrap mr-top sec-card">  
                        <div class="row no-gutters">          
                                 <div class="col-lg-12">
                                    <figure class="form-img-wrap vendorRegister-img">
                                        <img src="/frontend/images/status-info-bg.jpg">
                                        <figcaption class="overlay-text">
                                          <div class="row">
                                              <div class="col-lg-8 offset-lg-2 j-c-c">
                                                <span class="status-icon"><i class="fas fa-exclamation-circle"></i></span>
                                              <p>{!!errorMessages($type)!!}</p>
                                              </div>
                                            </figcaption>
                                    </figure>
                                 </div>
                            <div class="col-lg-12">
                
                            </div>
                </div>
        </div> 
        </div>   
</section>

@endsection


@section('scripts')

<script type="text/javascript" src="{{url('/frontend/js/register.js')}}"></script>

@endsection