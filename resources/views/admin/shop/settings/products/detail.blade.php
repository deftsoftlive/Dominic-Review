@extends('layouts.admin')

 
 
@section('content')
    

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">{{$title}}</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="">{{$product->name}}</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

                    <!-- [ breadcrumb ] end -->
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ Main Content ] start -->
                            <div class="row">
                                <!-- [ Hover-table ] start -->
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>{{$product->name}}</h5>
                                            <!-- <san class="d-block m-t-5">use class <code>table-hover</code> inside table element</span> -->
                                        </div>
                                        <div class="card-block table-border-style">
                                           
                                              @include('admin.error_message')

 
<div class="col-md-12">
<div class="row">

<!-- 
<div class="col-md-8">
        <h3>{{$product->name}}  </h3>
        <p>Product Type: <b>{{$product->product_type == 1 ? 'variable product' : 'simple product'}}</b></p>
        <h6>Status : <b>{{shopStatus($product)}}
         </b>  <br>{!!$product->RejectionReason != null && $product->RejectionReason->count() > 0 ? '<div class="cont" '.$product->RejectionReason->reason.'</div>' : '' !!}
      </h6>

       @if($product->approved_status != 1)
          <a href="{{route('admin.shop.products.approved',[$product->shop->slug,$product->slug])}}" class="btn btn-warning">Approved</a>
         @endif
         @if($product->approved_status != 2)
          <a href="{{route('admin.shop.products.rejection',[$product->shop->slug,$product->slug])}}" class="btn btn-danger">Rejected</a>
         @endif
          
         @if($product->product_type == 0)
            <h4>Price : {{$product->final_price}}</h4>
         @endif
        <h4>Short Description</h4>
        <p>{!!$product->short_description!!}</p>
        <h4>Description</h4>
        <p>{!!$product->short_description!!}</p>


         <td>
        
      </td>
 </div>
 <div class="col-md-4">
    <img src="{{url($product->thumbnail)}}" width="100">
    <h5>Thumbnail</h5>
 </div> -->



 <!-- new code -->
 <div class="store_info_card">
                                <div class="row">
                                  <div class="col-lg-9 col-md-8">  
                                    <div class="store_info_content"> 
                                      <div class="store_info_header">
                                        <h3>{{$product->name}} </h3>
                                        
                                        <div class="E-shop-status">
                                          
                                         <h3>Product Type: <span class="product_type"> {{$product->product_type == 1 ? 'variable product' : 'simple product'}}</span></h3>
                                        
                                        </div>

                                      </div>
                                      <div class="eshop_payment_method">
                                      <h5>Status :</h5>
                                    
                                        @if($product->approved_status != 1)
                                            <a href="{{route('admin.shop.products.approved',[$product->shop->slug,$product->slug])}}" class="btn btn-warning">Approve</a>
                                           @endif
                                           @if($product->approved_status != 2)
                                            <a href="{{route('admin.shop.products.rejection',[$product->shop->slug,$product->slug])}}" class="btn btn-danger">Reject</a>
                                           @endif  

                                           <h6 class="mt-3 alert alert-success"> <b>{!!shopStatus($product)!!}  </b>  <br>{!!$product->RejectionReason != null && $product->RejectionReason->count() > 0 ? '<div class="cont" '.$product->RejectionReason->reason.'</div>' : '' !!}</h6>                            
                                    </div>
                                       
                                    </div>                               
                                  </div>
                                  <div class="col-lg-3 col-md-4">
                                    <div class="eshop_store_logo">
                                      <figure>
                                         <img src="{{url($product->thumbnail)}}" width="100">
                                          
                                      </figure>
                                      <figcaption class="w-100 text-center"><h4>Thumbnail</h4></figcaption>
                                    </div>
                                  </div>
                                </div>
                              </div>
 <!-- ================ -->



<div class="eshop_store_card">
                                <div class="eshop_card_head">
                                  <h2>Short Description</h2>
                                </div>
                                    <div class="eshop_store_inn_card">                             
                                     <p>{!!$product->short_description!!}</p>
                                   </div>

                              </div>
                              <div class="eshop_store_card">
                                <div class="eshop_card_head">
                                  <h2>Description</h2>
                                </div>
                                    <div class="eshop_store_inn_card">                             
                                    <p>{!!$product->short_description!!}</p>
                                   </div>

                              </div>


<!--  ================================= -->





@if($product->subProducts != null && $product->subProducts->count() > 0)

<div class="col-md-12">


<div class="eshop_store_card">
                                <div class="eshop_card_head">
                                  <h2>Product Variant</h2>
                                </div>
                                    <div class="eshop_store_inn_card">                             
                                       <div class="table-responsive">
                                          <table class="table admin-cstm-table">
                                            <tr>
                                              <th>Thumbnail</th><th>Variant</th><th>Price</th><th>Status</th> 
                                            </tr>
                                            @foreach($product->subProducts as $p)
                                            <tr>
                                              <td>
                                                <img src="{{url($p->thumbnail)}}" width="100">
                                              </td>
                                              <td>
                                                <h5>{{$p->name}}</h5>                                                 
                                                 @if($p->getProductRelatedVariation != null && $p->getProductRelatedVariation->count() > 0)
                                                        <ul>
                                                            @foreach($p->getProductRelatedVariation as $v)
                                                                     <li>{{$v->parentVariation->variations->name}}: 
                                                                          <b class="bText">{{$v->parentVariation->name}}</b>
                                                                     </li>
                                                            @endforeach
                                                        </ul>
                                                 @endif                                                
                                              </td>
                                              <td>
                                                @if($p->sale_price > 0)
                                                <del>${{custom_format($p->price,2)}}</del>
                                                @endif
                                                <b>${{custom_format($p->final_price,2)}}</b>
                                              </td>
                                              <td>
                                                 {!!shopStatus($p)!!}
                                              </td>                                             
                                            </tr>
                                            @endforeach
                                          </table>
                                        </div>
                                   </div>
                              </div>
                          </div>
                          @endif


    <div class="col-lg-6 offset-lg-3">
        <div class="product-slider-wrap admin-product-slider">
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
     
</div>
                         










</div>


















                                               
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>

@endsection

@section('scripts')
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.0/jquery.flexslider.min.js"></script>
 <script type="text/javascript">
   // Product flex slider
$(window).load(function() {
  // The slider being synced must be initialized first
  $('#carousel').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: true,
    slideshow: true,
    itemWidth: 90,
    itemMargin: 5,
    asNavFor: '#slider'
  });
 
  $('#slider').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    sync: "#carousel"
  });
});
 </script>
     
@endsection