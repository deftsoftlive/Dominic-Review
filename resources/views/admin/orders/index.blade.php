@extends('layouts.admin')

@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Orders</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item">Orders</li>
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
                        <h5>Orders</h5>
                        <form action="{{route('download.orders')}}" method="POST">
                            @csrf
                            <input type="hidden" name="download_name" value="{{$user_name}}">
                            <input type="hidden" name="download_email" value="{{$user_email}}">
                            <input type="hidden" name="download_sd" value="{{$start_date}}">
                            <input type="hidden" name="download_ed" value="{{$end_date}}">
                            <button type="submit" class="btn btn-primary">Download Orders</button>
                        </form>
                    </div>
                    <br/>
                    <!-- Filter Section - Start -->
                    <form action="{{route('admin.orders')}}" class="cst-selection">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>User Name</label>
                                    <input type="text" name="u_name" class="form-control" value="{{isset($user_name) ? $user_name : ''}}" placeholder="Enter user name">
                                </div>
                                    
                                <div class="col-sm-3">
                                    <label>User Email</label>
                                    <input type="text" name="u_email" value="{{isset($user_email) ? $user_email : ''}}" class="form-control" placeholder="Enter email name">
                                </div>
                                
                                <div class="col-sm-3">
                                    <label>Start Date</label>
                                    @php $st_date = date("Y-m-d", strtotime($start_date)); @endphp
                                    <input type="date" name="start_date" class="form-control" value="{{!empty($start_date) ? $st_date : ''}}" placeholder="Enter start date">
                                </div>
                                    
                                <div class="col-sm-3" style="margin-bottom: 10px;">
                                    <label>End Date</label>
                                    @php $en_date = date("Y-m-d", strtotime($end_date)); @endphp
                                    <input type="date" name="end_date" class="form-control" value="{{!empty($end_date) ? $en_date : ''}}" placeholder="Enter end date">
                                </div>

                                <div class="col-sm-1" style="margin-right:10px;">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>

                                <div class="col-sm-1" style="margin-left:10px">
                                    <a href="{{ route('admin.orders') }}" class="btn btn-primary">Reset</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Filter Section - End -->
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                          @include('admin.error_message')
                            <table id="example2" class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Linked Account</th>
                                    <th>Season</th>
                                    <th>Customer Info</th>
                                    <th>Order Date</th>
                                    <th>Amount Paid</th>
                                    <th>Payment Method</th>
                                    <th>Order Type</th>
                                    <!-- <th>Status</th> -->
                                    <th style="width:155px;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($orders)>0)
                                    @foreach($orders as $ord)

                                    @php 
                                      $orderId = $ord->orderID; 
                                      $user_id = $ord->user_id; 
                                      $user_detail = DB::table('users')->where('id',$user_id)->first(); 

                                      $cart_items = DB::table('shop_cart_items')->where('orderID', $orderId)->get(); 

                                      $pk_cart_items = DB::table('shop_cart_items')->where('orderID', $orderId)->first();
                                      //dd($pk_cart_items); 
                                    @endphp

                                    <tr>
                                        <td>{{$ord->orderID}}</td>
                                        <td>@if(!empty($pk_cart_items->id))
                                                @php 
                                                    //dd($pk_cart_items->id);
                                                    $acc_id = ToGetAccountID($pk_cart_items->id,$pk_cart_items->user_id); 
                                                    $acc_name = DB::table('stripe_accounts')->where('id',$acc_id)->first();
                                                @endphp

                                                {{isset($acc_name->account_name) ? $acc_name->account_name : ''}}
                                            @endif
                                        </td>
                                        <td>@if( !empty($pk_cart_items) ) @php echo getSeasonname($pk_cart_items->course_season); @endphp @endif</td>
                                        <td>
                                          @if(!empty($user_detail))
                                            <h5>{{$user_detail->name}}</h5>
                                            <p>{{$user_detail->email}} | {{$user_detail->phone_number}}</p>
                                          @else
                                            -
                                          @endif
                                        </td>
                                        @php 
                                            $uk_time = utc_to_uk($ord->id); 
                                        @endphp

                                        <td>{{date('d/m/Y',strtotime($ord->updated_at))}} ({{$uk_time}})</td>
                                        <td>&pound; {{custom_format($ord->amount,2)}}</td>
                                        <td>{{$ord->payment_by}}</td>
                                        
                                        @php 
                                            $shop = DB::table('shop_cart_items')->where('orderID',$orderId)->where('manual',1)->get(); 

                                            //dd($shop);
                                            $shop_ty = [];
                                        @endphp

                                        @foreach($shop as $sh)
                                            @php $shop_ty[] = $sh->shop_type; @endphp
                                        @endforeach

                                        @php $order_shop_type = implode(', ',$shop_ty); @endphp
                                        <td>@php echo getShopType($orderId); @endphp</td>

                                        <!-- <td>
                                            @if($ord->status == 1)    
                                                Completed
                                            @elseif($ord->status == 2)
                                                Cancelled
                                            @endif
                                        </td> -->
                                        <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary">Action</button>
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span>
                                            </button>

                                            <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(82px, -64px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                <a href="{{url('admin/orders/detail')}}/{{$ord->id}}" class="dropdown-item">Details</a>
                                            </div>
                                        </div>
                                    </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr><td colspan="7"><div class="no_results"><h3>No result found</h3></div></td></tr>
                                @endif
                                </tbody>
                            </table>
                            @if(count($orders)>0)
                                {{ $orders->appends(['u_name' => $user_name, 'u_email' => $user_email, 'start_date' => $start_date_filter, 'end_date' => $end_date_filter])->links() }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>

@endsection
