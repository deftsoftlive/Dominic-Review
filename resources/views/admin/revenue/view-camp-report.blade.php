@extends('layouts.admin')

@section('content')

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Revenue Management</h5>
                </div>

                <div style="text-align: right;" class="cst-admin-filter">
                    <a href="{{ route('admin.revenue.courses') }}" class="btn btn-primary d-print-none">Courses Revenue</a>
                    <a href="{{ route('admin.revenue.camps') }}" class="btn btn-primary d-print-none">Camps Revenue</a>
                    <a href="{{ route('admin.revenue.products') }}" class="btn btn-primary d-print-none">Products Revenue</a>
                </div>
                <br/>
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
                        <h5>Camp Report Detail</h5>
                        <button class="btn btn-primary d-print-none" onclick="window.print();" id="print_btn">Print</button>
                        <div class="print_logo">
                            <img height="70px;" width="120px;" src="{{url('/')}}/public/uploads/1584078701website_logo.png">
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>


@php 
    $shop = DB::table('shop_cart_items')->where('shop_type','camp')->where('product_id',$id)->where('type','order')->get(); 
    $camp = DB::table('camps')->where('id',$id)->first(); 
@endphp

@foreach($shop as $bc)
    @php $total_revenue[] = $bc->total; @endphp
@endforeach

@php 
    $sum_revenue = array_sum($total_revenue); 
    $get_revenue = $sum_revenue - $camp->coach_cost; 

    $shop = DB::table('shop_cart_items')->where('shop_type','camp')->where('product_id',$id)->where('type','order')->get();

    $total_revenue = [];
    $male_user = [];
    $female_user = [];
@endphp

@foreach($shop as $bca)
    @php 
        $total_revenue[] = $bca->total; 
        $male_user[] = DB::table('users')->where('id',$bca->child_id)->where('gender','male')->count();
        $female_user[] = DB::table('users')->where('id',$bca->child_id)->where('gender','female')->count();
    @endphp
@endforeach

@php 
    $sum_revenue = array_sum($total_revenue); 
    $get_revenue = $sum_revenue - $camp->coach_cost;  

    $total_male_user = array_sum($male_user); 
    $total_female_user = array_sum($female_user);
@endphp

<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="total-price-wrap full-invoice">
                            <div id="cartTotals">
                                <div class="total-price-wrap">
                                    <div id="cartTotals">
                                        <div class="cart-totals ">
                                            <div class="text-center cst_heading">
                                                <h3>Camp Detail</h3>
                                            </div>
                                            <table class="cart-table margin-top-5">
                                                <tbody>
                                                    <tr>
                                                        <th>Camp</th>
                                                        <td><strong>{{$camp->title}}</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Season</th>
                                                        <td><strong>&pound;{{$camp->term}}</strong></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="total-price-wrap full-invoice">
                            <div id="cartTotals">
                                <div class="total-price-wrap">
                                    <div id="cartTotals">
                                        <div class="cart-totals  ">
                                            <div class="text-center cst_heading">
                                                <h3>Attendees</h3>
                                            </div>
                                            <table class="cart-table margin-top-5">
                                                <tbody>
                                                    <tr>
                                                        <th>No of Boys</th>
                                                        <td><strong>{{$total_male_user}}</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <th>No of Girls</th>
                                                        <td><strong>{{$total_female_user}}</strong></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="total-price-wrap full-invoice">
                            <div id="cartTotals">
                                <div class="total-price-wrap">
                                    <div id="cartTotals">
                                        <div class="cart-totals ">
                                            <div class="text-center cst_heading">
                                                <h3>Cost Details</h3>
                                            </div>
                                            <table class="cart-table margin-top-5">
                                                <tbody>
                                                    <tr>
                                                        <th>Coach Cost</th>
                                                        <td><strong>&pound;{{$camp->coach_cost}}</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Court/Venue Cost</th>
                                                        <td><strong>&pound;{{$camp->venue_cost}}</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Equipment Cost</th>
                                                        <td><strong>&pound;{{$camp->equipment_cost}}</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Other Cost</th>
                                                        <td><strong>&pound;{{$camp->other_cost}}</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tax/vat Cost</th>
                                                        <td><strong>&pound;{{$camp->tax_cost}}</strong></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="total-price-wrap full-invoice">
                            <div id="cartTotals">
                                <div class="total-price-wrap">
                                    <div id="cartTotals">
                                        <div class="cart-totals  ">
                                            <div class="text-center cst_heading">
                                                <h3>Revenue Details</h3>
                                            </div>
                                            <table class="cart-table margin-top-5">
                                                <tbody>
                                                    <tr>
                                                        <th>Total Costs</th>
                                                        @php $cumulative_sum = ($camp->coach_cost)+($camp->venue_cost)+($camp->equipment_cost)+($camp->other_cost)+($camp->tax_cost); @endphp
                                                        <td><strong>&pound;{{$cumulative_sum}}</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total Income</th>
                                                        <td><strong>&pound;{{$sum_revenue}}</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Profit</th>
                                                        @php $profit = $sum_revenue - $cumulative_sum; @endphp
                                                        <td><strong>&pound;{{$profit}}</strong></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-block table-border-style rp_detail_sec d-print-none">
    <div class="table-responsive">
      @include('admin.error_message')
        <table class="table table-hover gender_colors">
            
            <thead>
            <tr> 
                <th>Date</th>
                <th>Participant Name</th>
                <th>Total Income</th>
            </tr>
            </thead>
            <tbody>

            @foreach($purchased_camp as $co)
                <tr>
                    @php 
                        $camp = DB::table('camps')->where('id',$co->product_id)->first(); 
                        $participants = DB::table('shop_cart_items')->where('shop_type','camp')->where('product_id',$co->product_id)->where('type','order')->count();
                    @endphp
                    
                    <td>@php echo date('d-m-Y',strtotime($co->updated_at)); @endphp</td>
                    <td>@if(!empty(getUserName($co->child_id))) @php echo getUserName($co->child_id); @endphp @else - @endif</td>
                    <td>&pound;{{$co->total}}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    {{ $purchased_camp->render() }}
</div>

@endsection