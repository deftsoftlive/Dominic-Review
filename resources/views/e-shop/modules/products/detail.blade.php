@extends('e-shop.layouts.layout')
@section('content')
@php  $stock = $pro->parent > 0 ? $pro->checkStock() : $product->checkStock(); $reviews = ProductRate($product); @endphp

 
 <!-- banner section starts here here -->
    <section class="inner-main-banner" style="background-image:url({{url('/e-shop/images/product-listing-banner-bg.png')}});">
        <div class="container">
            <div class="inner-banner-content text-center">
                <h1>Product Details</h1>
            </div>
        </div>
    </section>
    <section class="product-detail-sec">
      <div class="container">
          <!-- product detail card -->
          <div class="card mb-5">
      <div class="container-fliud">
        <div class="wrapper row">
          <div class="preview col-lg-6">
             <div class="product-slider-wrap">
               <div id="slider" class="flexslider">
          <ul class="slides">

            @foreach($product->ProductImages as $img)
             <li>
              <img src="{{url($img->image)}}" />
            </li>   
            @endforeach        
          </ul>
        </div>
        <div id="carousel" class="flexslider">
          <ul class="slides">
              @foreach($product->ProductImages as $img)
             <li>
              <img src="{{url($img->image)}}" />
            </li>   
            @endforeach       
          </ul>
        </div>
             </div>
            
          </div>
          <div class="details col-lg-6">
            <h3 class="product-title">{{$product->name}}</h3>


            <div class="price-rating-wrap">
                    @if($product->product_type == 1)
                       <h4 class="price"><span>{!!$pro->productPrice()['html']!!}</span></h4>  
                    @else
                       <h4 class="price"><span>{!!$product->productPrice()['html']!!}</span></h4>  
                    @endif
                    {!!$reviews['rating']!!}
            </div>
            
            <p class="product-description">{{$product->short_description}}</p>

              <!--  <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
 -->
      @if($stock != null && $stock->stock > 0)
               <p class="vote"><strong>Stock : </strong> {{$stock->stock > 0 ? 'In Stock' : 'Out Of Stock'}} 
                
                {!!$stock->stock > 0 && $stock->lowInStock >= $stock->stock ? '<strong>('.$stock->stock.' items)</strong>' : ''!!}
              </p>
      @endif

      



        <form id="ADDToCART" data-action="{{url(route('shop.ajax.addToCart',$product->id))}}">
         

          <div id="ProductDetailFilter">
               @include('e-shop.includes.products.addToCartForm')
          </div>
           <!--  <h5 class="colors">colors:
              <span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>
              <span class="color green"></span>
              <span class="color blue"></span>
            </h5> -->

            <div class="action btn-wrap mt-3">

                   <button class="cstm-btn solid-btn cartButton" type="submit">add to cart</button>
                                 <a href="javascript:void(0)" 
                                                       class="wishlist {{$product->hasInWishlist()}} cstm-wishlist-btn"
                                                       data-url="{{url(route('shop.wishlist.create',$product->id))}}"
                                                       ><span class="fa fa-heart"></span>
                                                     </a>
                   <div id="errorMessageBox"></div>
            </div>

          </form>

        


          </div>
        </div>
      </div>
    </div>
         <!--  End -->
      </div>
    </section>
    <section class="product-description-sec">
      <div class="container">
      <div class="product-des-container">
        <ul class="nav nav-tabs row" role="tablist">
          <li class="nav-item col-6">
            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Product Description</a>
          </li>
          <li class="nav-item col-6">
            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Specification</a>
          </li>
          
        </ul><!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active" id="tabs-1" role="tabpanel">
            <div class="description-content">
              <h3>Product Description</h3>
               {!!$product->description!!} 
            </div>
          </div>
          <div class="tab-pane" id="tabs-2" role="tabpanel">
            <div class="description-content">
              <div class="row">
                <div class="col-lg-6">
                  <figure class="product-specification-img">
                    <img src="{{url($product->thumbnail)}}">
                  </figure>
                </div>
                <div class="col-lg-6">
                  <div class="specification-head">
                    <h3>Specification</h3>
                  </div>
              <table class="table specification-table" id="tblProductSpecifics">
                     <tbody>
                  <?php
                      $specification = $product->ProductAttributeVariableProduct->where('product_view',1);
 
                  ?>                    
 
                        @foreach($specification as $attribute)

                         <tr>
                              <td class="ItemSpecificName">{{$attribute->type}}</td>
                                
                                <td class="ItemSpecificValue">
                                          @foreach($attribute->childAttributes as $sp)
                                                 <span>{{$sp->variation->name}}</span>
                                          @endforeach
                                </td>
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
    </section>


    @if($product->reviews != null && $product->reviews->count() > 0)

   <!--  reviews and rating sec starts here -->



<section class="reviewsAndRating-sec">
  <div class="container">
    <div class="sec-heading text-center">
                <h2>Reviews</h2>
            </div>
<div class="cstm-rating-wrap">
   <div class="rating-head">
          <span class="heading">User Rating</span>
          <div>
            {!!$reviews['rating']!!}

          </div>
          <p>{{ $reviews['rate']}} average based on {{ $reviews['count']}} reviews.</p>
   </div>
   <hr style="border:3px solid #f1f1f1">

   {!! $reviews['overall']!!}
 </div>

 

<div class="customers-reviws-wrap">


@foreach($product->reviews as $r)
  <div class="review-card">
    <div class="testimonial">
                   <h4>{{$r->title}}</h4>
                  <p>{{$r->review}}</p>
                </div>
                <div class="media">
                  <figure class="media-left client-img">
                    @if($r->user->profile_image != "")
                    <img src="{{url($r->user->profile_image)}}" alt=""> 
                    @endif                  
                  </figure>
                  <div class="media-body">
                    <div class="overview">
                      <div class="name"><b>{{$r->user->name}}</b></div>
                                        
                      <div class="star-rating">
                        {!!ProductReviewRate($r->rating)!!}
                      </div>
                    </div>                    
                  </div>
                </div>
  </div>
  @endforeach
 
</div>
</div>
</section>
   <!-- ========================================== -->
@endif
  
  
  <!--related products starts here-->
    @include('e-shop.includes.products.relatedProducts')
  <!--Featured section ends here-->
 

@endsection



@section('jscript')
<script type="text/javascript" src="{{url('/e-shop/js/products/cart.js')}}"></script>
<script type="text/javascript">

 $(document).ready(function(){
      var $loader = $("body").find('.custom-loading');
          $loader.show();
 
   
  });

</script>

@endsection