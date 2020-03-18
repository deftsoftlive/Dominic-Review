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
                    <li class="breadcrumb-item"><a href="">{{$shop->name}}</a></li>
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
                                            <h5>{{$shop->name}}</h5>
                                            <!-- <san class="d-block m-t-5">use class <code>table-hover</code> inside table element</span> -->
                                        </div>
                                        <div class="card-block table-border-style">
                                           
                                              @include('admin.error_message')









 
                  
                                <!-- <h4>{{$shop->name}} </h4>
                                  -->
                                <div class="store_info_card">
                                <div class="row">
                                  <div class="col-lg-9 col-md-8">  
                                    <div class="store_info_content"> 
                                      <div class="store_info_header">
                                        <h3>{{$shop->name}}</h3>
                                        
                                        <div class="E-shop-status">
                                          <h3>Shop Status  : <span class="ShopStatus"> {{$shop->stripe_account_status == 1 && $shop->status == 1 ? 'Active' : 'In-Active'}}</span></h3>
                                        </div>

                                      </div>
                                      <div class="eshop_payment_method">
                                      <h5>Payment Methods</h5>
                                      <p>
                                         Stripe Account :  <b>{{$shop->stripe_account_status == 1 ? $shop->stripe_account : 'N/A'}} </b>
                                                             </p>
                                        <p>Change Status : 
                                           @if($shop->approved_status == 1)
                                                   <b>Approved</b>
                                                   <a href="" class="btn btn-primary">Reject</a>
                                          @else

                                                 @if($shop->approved_status == 2)
                                                  <p class="alert alert-danger">Your Shop is rejected by reasons. So, please right the same and resubmit the shop.</p>
                                                 @else
                                                     <b>Awaiting for approval.</b>
                                                     <a href="{{url(route('admin.shop.approved',$shop->slug))}}" class="btn btn-warning">Approve</a>
                                                     <a href="{{url(route('admin.shop.rejection',$shop->slug))}}" class="btn btn-danger">Reject</a>
                                                 @endif
                                          @endif
                                        </p>
                                    </div>                                       
                                    </div>                               
                                  </div>
                                  <div class="col-lg-3 col-md-4">
                                    <div class="eshop_store_logo">
                                      <figure>
                                        <img src="{{url($shop->logo)}}" width="100%">
                                      </figure>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        <h3>Products <a href="{{url(route('admin.shop.products.listing',$shop->slug))}}" data-toggle="tooltip" data-placement="top" title="" class="add_btn" data-original-title="view"><i class="far fa-eye"></i></a></h3>
                        <div class="product_status_wrapper">
                          <div class="row">
                          <!-- <div class="col-md-6">
                            <table class="table ">
                               <tr>
                                 <th>Awaitiing</th><td>{{$shop->products != null ? $shop->products->where('approved_status',0)->count() : '0'}} products</td>
                               </tr>
                               <tr>
                                 <th>Approved </th><td>{{$shop->products != null ? $shop->products->where('approved_status',1)->count() : '0'}} products</td>
                               </tr>
                                <tr>
                                 <th>Rejected</th><td>{{$shop->products != null ? $shop->products->where('approved_status',2)->count() : '0'}} products</td>
                               </tr>
                               

                                <tr>
                                 <th>Total</th><td>{{$shop->products != null ? $shop->products->count() : 0}} products</td>
                               </tr>
                               

                            </table>
                          </div> -->
                          
                          <div class="col-md-6 col-xl-3">
                                    <div class="card daily-sales">
                                        <div class="card-block">
                                            <h6 class="mb-4 mini-card-heading">Awaitiing</h6>
                                            <div class="row d-flex align-items-center">
                                                <div class="col-9">
                                                    <h3 class="f-w-300 d-flex align-items-center m-b-0"><i class="feather icon-arrow-up text-c-green f-20 m-r-10"></i>{{$shop->products != null ? $shop->products->where('approved_status',0)->count() : '0'}} products</h3>
                                                </div>

                                                <div class="col-3 text-right">
                                                    <p class="m-b-0">67%</p>
                                                </div>
                                            </div>
                                            <div class="progress m-t-30" style="height: 7px;">
                                                <div class="progress-bar progress-c-theme" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="card daily-sales">
                                        <div class="card-block">
                                            <h6 class="mb-4 mini-card-heading">Approved</h6>
                                            <div class="row d-flex align-items-center">
                                                <div class="col-9">
                                                    <h3 class="f-w-300 d-flex align-items-center m-b-0"><i class="feather icon-arrow-down text-c-red f-20 m-r-10"></i>{{$shop->products != null ? $shop->products->where('approved_status',1)->count() : '0'}} products</h3>
                                                </div>

                                                <div class="col-3 text-right">
                                                    <p class="m-b-0">67%</p>
                                                </div>
                                            </div>
                                            <div class="progress m-t-30" style="height: 7px;">
                                                <div class="progress-bar progress-c-theme" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="card daily-sales">
                                        <div class="card-block">
                                            <h6 class="mb-4 mini-card-heading">Rejected</h6>
                                            <div class="row d-flex align-items-center">
                                                <div class="col-9">
                                                    <h3 class="f-w-300 d-flex align-items-center m-b-0"><i class="feather icon-arrow-up text-c-green f-20 m-r-10"></i>{{$shop->products != null ? $shop->products->where('approved_status',2)->count() : '0'}} products</h3>
                                                </div>

                                                <div class="col-3 text-right">
                                                    <p class="m-b-0">67%</p>
                                                </div>
                                            </div>
                                            <div class="progress m-t-30" style="height: 7px;">
                                                <div class="progress-bar progress-c-theme" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="card daily-sales">
                                        <div class="card-block">
                                            <h6 class="mb-4 mini-card-heading">Total</h6>
                                            <div class="row d-flex align-items-center">
                                                <div class="col-9">
                                                    <h3 class="f-w-300 d-flex align-items-center m-b-0"><i class="feather icon-arrow-up text-c-green f-20 m-r-10"></i>{{$shop->products != null ? $shop->products->count() : 0}} products</h3>
                                                </div>

                                                <div class="col-3 text-right">
                                                    <p class="m-b-0">67%</p>
                                                </div>
                                            </div>
                                            <div class="progress m-t-30" style="height: 7px;">
                                                <div class="progress-bar progress-c-theme" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
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
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>

@endsection

@section('scripts')
 
     
@endsection