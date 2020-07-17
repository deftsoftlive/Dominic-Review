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
                                            <!-- <span class="d-block m-t-5">use class <code>table-hover</code> inside table element</span> -->
                                        </div>
                                        <div class="card-block table-border-style">
                                            <div class="table-responsive">
                                              @include('admin.error_message')
                                                <table id="example2" class="table table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>Order ID</th>
                                                        <th>Customer Info</th>
                                                        <th>Order Date</th>
                                                        <th>Amount Paid</th>
                                                        <th>Payment Method</th>
                                                        <!-- <th>Order Type</th> -->
                                                        <th>Status</th>
                                                        <th width="145px;">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($orders as $ord)

                                                        @php 
                                                          $orderId = $ord->orderID;
                                                          $user_id = $ord->user_id; 
                                                          $user_detail = DB::table('users')->where('id',$user_id)->first(); 

                                                          $cart_items = DB::table('shop_cart_items')->where('orderID', $orderId)->get(); 
                                                        @endphp

                                                        <tr>
                                                            <td>{{$ord->orderID}}</td>
                                                            <td>
                                                              @if(!empty($user_detail))
                                                                <h5>{{$user_detail->name}}</h5>
                                                                <p>{{$user_detail->email}} | {{$user_detail->phone_number}}</p>
                                                              @else
                                                                -
                                                              @endif
                                                            </td>
                                                            <td>{{$ord->created_at}}</td>
                                                            <td>&pound; {{$ord->amount}}</td>
                                                            <td>{{$ord->payment_by}}</td>
                                                            <!-- <td>Shop</td> -->
                                                            <td>
                                                            @if($ord->status == 1)    
                                                            Completed
                                                            @elseif($ord->status == 2)
                                                            Cancelled
                                                            @endif</td>
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

                                                    </tbody>
                                                </table>
                                                {{ $orders->render() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>

@endsection
