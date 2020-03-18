@extends('layouts.vendor')
@section('vendorContents')

                    


<div class="container-fluid">
    <div class="row">
       <div class="col-lg-12">
          <div class="card vendor-dash-card">
          <div class="card-header">My Store</div>
           <div class="card-body">
              <div class="row">
                      <div class="col-md-3">
                                <h4>{{$shop->name}} </h4>
                                @if($shop->logo !="")   
                                    <img src="{{url($shop->logo)}}" width="120">
                                @endif

                                <div>
                                  <a href="{{url(route('vendor.shop.index'))}}">Edit</a>
                                </div>
                      </div>

                      <div class="col-md-9">
                          <h4>Product Categories</h4>
                        <div class="row"> 

                           @foreach($ShopCategory->parentCategory($shop->id,0) as $cate)

                                    <div class="col-lg-6 col-md-6">
                                      <div class="product-cate-list-head">
                                        <h3>{{$cate->label}}</h3>
                                      </div> 
                                       <ul class="shop-category-list">
                                            @foreach($ShopCategory->parentCategory($shop->id,$cate->id) as $sub) 
                                                <li>
                                                  <div class="product-cate-checkbox custom-checkbox">
                                                           
                                                             <label class="custom-control-label">{{$sub->label}}
                                                           </label>
                                                       </div>
                                                </li>
                                            @endforeach
                                       </ul>
                                     </div>

                           @endforeach
                          </div>

                      </div>
               </div>
           </div>
        </div>
     </div>
   </div>
</div>





























@endsection

@section('scripts')
<script src="{{url('/js/validations/imageShow.js')}}"></script>
<script type="text/javascript" src="{{url('/js/vendors/shop.js')}}"></script>
 










@endsection