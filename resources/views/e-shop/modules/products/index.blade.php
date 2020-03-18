@extends('e-shop.layouts.layout')
@section('content')

<!-- banner section starts here here -->
    <section class="inner-main-banner" style="background-image:url({{url('/e-shop/images/product-listing-banner-bg.png')}});">
        <div class="container">
            <div class="inner-banner-content text-center">
                <h1>Products</h1>
            </div>
        </div>
    </section>
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
                              <select class="form-control" id="">
                                <option>Sort By</option>
                                <option>low to high</option>
                                <option>high to low</option>
                                <option>Popularity</option>
                              </select>
                          </div></li>
<!--                           <li><a href="javascript:void(0);"><i class="fas fa-list"></i></a></li>
                          <li><a href="javascript:void(0);"><i class="fas fa-th"></i></a></li> -->
                        </ul>
                     </div>
                     <div class="product-wrapper">
                          <div class="row wow bounceInRight" id="loadProducts" data-wow-delay=".50s">
                             
                           
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




  @endsection



@section('jscript')
<script type="text/javascript" src="{{url('/e-shop/js/products/filters.js')}}"></script>
<script type="text/javascript">
  

</script>

@endsection