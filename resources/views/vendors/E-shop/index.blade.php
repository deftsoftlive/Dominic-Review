@extends('layouts.vendor')
@section('vendorContents')

              


<div class="container-fluid">
    <div class="row">
       <div class="col-lg-12">
          <div class="card vendor-dash-card">
          <div class="card-header"><h5>My Store</h5></div>
           <div class="card-body">
              <div class="row">
                      <div class="col-md-12">
                                <!-- <h4>{{$shop->name}} </h4>
                                  -->
                                <div class="store_info_card">
                                <div class="row">
                                  <div class="col-lg-9 col-md-8">  
                                    <div class="store_info_content"> 
                                      <div class="store_info_header">
                                        <h3>{{$shop->name}} <a href="{{url(route('vendor.shop.index'))}}" data-toggle="tooltip" data-placement="top" title="" class="add_btn" data-original-title="Edit"><i class="fa fa-pencil-alt"></i></a> </h3>
                                        
                                        <div class="E-shop-status">
                                          <h3>Shop Status : <span class="ShopStatus"> {{$shop->stripe_account_status == 1 && $shop->status == 1 ? 'Active' : 'In-Active'}}</span></h3>

                                        
                                        </div>

                                      </div>
                                      <div class="eshop_payment_method">
                                      <h5>Payment Methods</h5>
                                      <p>
                                         Stripe Account :  {{$shop->stripe_account_status == 1 ? $shop->stripe_account : 'N/A'}} 
                                                            <a href="{{ route('stripeSettings') }}" class="normal-link">{{$shop->stripe_account_status == 1 ? 'Change' : 'Add'}}</a></p>
                                        <p>Change Status : 
                                           @if($shop->approved_status == 1)
                                               <a href="{{url(route('vendor.shop.changeStatus'))}}" class="btn">
                                                 {{$shop->status == 0 ? 'Active' : 'In-Active'}}
                                               </a>
                                          @else

                                                 @if($shop->approved_status == 2)
                                                  <p>Your Shop is rejected by reasons. So, please right the same and resubmit the shop.</p>
                                                 @else
                                                     <b>Awaiting for approval from admin side.</b>
                                                 @endif
                                          @endif
                                        </p>

                                          <h5>
                                              Shop Approval Status :<b class="ShopStatus" data-toggle="tooltip" title="{{$shop->RejectionReason != null && $shop->RejectionReason->count() > 0 ? $shop->RejectionReason->reason : ''}}"> 
                                                {!!shopStatus($shop)!!} <i class="fa fa-info-circle"></i></b>
                                          </h5>
                                    </div>
                                       
                                    </div>                               
                                  </div>
                                  <div class="col-lg-3 col-md-4">
                                    <div class="eshop_store_logo">
                                      <figure>
                                        <img src="{{url($shop->logo)}}">
                                      </figure>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
 
                           <h3>Product Categories</h3>

                         @foreach($ShopCategory->parentCategory($shop->id,0) as $cate)
                              <div class="eshop_store_card">
                                <div class="eshop_card_head">
                                  <h2>{{$cate->label}}</h2>
                                </div>
                                    <div class="eshop_store_inn_card">
                                        
                                      
                                      <div class="eshop_product_category">
                                          <ul class="selected-categories-list">
                                            @foreach($ShopCategory->parentCategory($shop->id,$cate->id) as $sub) 
                                                <li> {{$sub->label}}</li>
                                            @endforeach
                                          </ul>
                                     </div>
                                   </div>

                              </div>
                           @endforeach
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