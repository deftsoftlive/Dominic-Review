@extends('e-shop.layouts.layout')
@section('content')

<!-- banner section starts here here -->
    <section class="inner-main-banner" style="background-image:url({{url('/e-shop/images/product-listing-banner-bg.png')}});">
        <div class="container">
            <div class="inner-banner-content text-center">
                <h1>{{$page->title}}</h1>
            </div>
        </div>
    </section>
    <main class="products-layout-wrap">
        <div class="container">
            <div class="row">
                {!! $page->description !!}
            </div>
        </div>
    </main>




  @endsection



@section('jscript')
<script type="text/javascript" src="{{url('/e-shop/js/products/filters.js')}}"></script>
<script type="text/javascript">
  

</script>

@endsection