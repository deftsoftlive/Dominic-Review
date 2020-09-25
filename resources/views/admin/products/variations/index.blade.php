@extends('inc.homelayout')
@extends('e-shop.layouts.layout')

<style>
header.Eshop-header,footer.site-footerss {display:none;}
</style>

 @php $base_url = \URL::to('/'); @endphp
 <!-- banner section starts here here -->
    <section class="football-course-sec" style="background: url({{$base_url}}/public/uploads/1584684865tennis_course_banner_image.png);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="football-course-content">
              <h2 class="f-course-heading">PRODUCTS</h2>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- banner section starts Ends here -->

    <main class="products-layout-wrap">
        <div class="container">
            <div class="row">
                @include('e-shop.includes.products.sidebar')
                <div class="col-lg-9">
                   <div class="product-listing-wrap">
                     <div class="products-head">
                        <h3 class="product-list-heading">Products</h3>
                        <ul class="serch-filter-wrap">
                          <li><a href="javascript:void(0);" id="FilterCategoryToggle"><i class="fas fa-filter"></i></a></li>
                          <li><div class="mini-field-wrap">
                             <!--  <select class="form-control" id="">
                                <option>Sort By</option>
                                <option>low to high</option>
                                <option>high to low</option>
                                <option>Popularity</option>
                              </select> -->

                             
                          </div></li>
<!--                           <li><a href="javascript:void(0);"><i class="fas fa-list"></i></a></li>
                          <li><a href="javascript:void(0);"><i class="fas fa-th"></i></a></li> -->
                        </ul>
                     </div>
                     <div class="product-wrapper">
                          <div class="row wow bounceInRight" id="loadProducts" data-wow-delay=".50s">
@php 
  $product = DB::table('products')->get();
@endphp                             
    @if(@sizeof($products))
      @foreach($products as $pro)
     <?php
        $product = $pro->parent > 0 ? $pro->getParentProductData : $pro;
        $stock = $pro->parent > 0 ? $pro->checkStock() : $product->checkStock();
        $complete1 = $product->ProductAssignedVariations != null && $product->ProductAssignedVariations->count() > 0 ? 1 : 0;
        $complete2 = $product->product_type == 0 && $product->price > 0 ? 1 : 0;
        $complete = $product->product_type == 0 ? $complete2 : $complete1;
         $saleImage = $pro->sale_price > 0 ? 'On Sale' : 'Hot';
        $type = $complete == 0 ? 'Comming Soon' : $saleImage;

        $url = $complete == 1 ? url(route('shop.product.detail.page',$pro->slug)) : 'javascript:void(0)';
 
      ?>

 

       <div class="col-lg-4 col-md-6">

                  <div class="product-card">
                    {!!checkInStock($stock)!!}
                  
                    <div class="badge sale-badge">{!!$type!!}</div>
                     <a href="{{$url}}"  class="product-tumb">
                        <img src="{{$pro->thumbnail != null ? url($pro->thumbnail) : ''}}" alt="">            
                     </a>
                    <div class="product-details">                              
                        <h4>{{$product->name}}</h4>
                        <p>{{$product->short_description}}</p>
                        <div class="product-bottom-details">
                          @php $price = $pro->productPrice(); @endphp
                               {!!$price['html']!!}
                           <div class="product-links">
                                                    <a href="javascript:void(0)" 
                                                        class="wishlist {{$product->hasInWishlist()}}"
                                                       data-url="{{url(route('shop.wishlist.create',$product->id))}}"
                                                       ><i class="fa fa-heart"></i>
                                                     </a>
                                <a href="{{$url}}"><i class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                    </div>
                
            </div>
       </div>

      
       
      @endforeach


@else

@include('errors.not-found')

@endif





                           
                          </div>
            </div>
          </div>
         <!--  Related Products section starts here -->
                  <!--  <div class="related-products-sec">
                     <div class="products-head j-c-c">
                        <h3 class="product-list-heading">Related Products</h3>                        
                     </div>
                   <div class="featured-product-wrap">
                      <div class="owl-carousel owl-theme related-product-slider">
                          <div class="item">                          
                           <div class="featured-product-card">
                              <figure class="f-product-img">
                                  <img src="images/f-product-img1.png">
                              </figure>
                               <div class="f-product-detail">
                                   <h4>Personalized Extra-Large Cotton Canvas Fabric Beach Tote Bag </h4>
                                   <div class="f-product-price text-center">
                                       <h3 class="after-discount-price">$30.00 </h3>
                                       <p class="original-price"><del>$50.00</del></p>
                                   </div>
                               </div>
                           </div>
                         </div>
                          <div class="item">                          
                           <div class="featured-product-card">
                              <figure class="f-product-img">
                                  <img src="images/f-product-img2.png">
                              </figure>
                               <div class="f-product-detail">
                                   <h4>Personalized Extra-Large Cotton Canvas Fabric Beach Tote Bag </h4>
                                   <div class="f-product-price text-center">
                                       <h3 class="after-discount-price">$30.00 </h3>
                                       <p class="original-price"><del>$50.00</del></p>
                                   </div>
                               </div>
                           </div>
                         </div>
                          <div class="item">                          
                           <div class="featured-product-card">
                              <figure class="f-product-img">
                                  <img src="images/f-product-img3.png">
                              </figure>
                               <div class="f-product-detail">
                                   <h4>Personalized Extra-Large Cotton Canvas Fabric Beach Tote Bag </h4>
                                   <div class="f-product-price text-center">
                                       <h3 class="after-discount-price">$30.00 </h3>
                                       <p class="original-price"><del>$50.00</del></p>
                                   </div>
                               </div>
                           </div>
                         </div>
                          <div class="item">                          
                           <div class="featured-product-card">
                              <figure class="f-product-img">
                                  <img src="images/f-product-img1.png">
                              </figure>
                               <div class="f-product-detail">
                                   <h4>Personalized Extra-Large Cotton Canvas Fabric Beach Tote Bag </h4>
                                   <div class="f-product-price text-center">
                                       <h3 class="after-discount-price">$30.00 </h3>
                                       <p class="original-price"><del>$50.00</del></p>
                                   </div>
                               </div>
                           </div>
                         </div>
                         <div class="item">                          
                           <div class="featured-product-card">
                              <figure class="f-product-img">
                                  <img src="images/f-product-img3.png">
                              </figure>
                               <div class="f-product-detail">
                                   <h4>Personalized Extra-Large Cotton Canvas Fabric Beach Tote Bag </h4>
                                   <div class="f-product-price text-center">
                                       <h3 class="after-discount-price">$30.00 </h3>
                                       <p class="original-price"><del>$50.00</del></p>
                                   </div>
                               </div>
                           </div>
                         </div>
                       </div>
                     </div>                 
                   </div> -->
                </div>
            </div>
        </div>
    </main>






@section('jscript')
<script type="text/javascript" src="{{URL::asset('/e-shop/js/products/filters.js')}}"></script>
<script type="text/javascript">
  

</script>

@endsection