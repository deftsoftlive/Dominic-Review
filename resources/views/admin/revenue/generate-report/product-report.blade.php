@extends('layouts.admin')

@section('content')

<style>
.print_data{
    display: none!important;
}
</style>

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

                        <h5>Products</h5>
                        <!-- <button class="btn btn-primary d-print-none" id="print_btn" >Print</button> -->
                        
                        <div class="print_logo">
                            <img height="70px;" width="120px;" src="{{url('/')}}/public/uploads/pdf-logo.png">
                        </div>
                    </div>
                    <br/>

                    <div class="row d-print-none">
                        <div class="col-sm-1" style="margin-left:10px">
                            <a href="" onclick="window.print();" class="btn btn-primary">Print</a>
                        </div>
                        <div class="col-sm-1">
                            <a href="{{url('admin/revenue/products')}}" class="btn btn-primary">Reset</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>

<div class="card-block table-border-style print_data" id="print_data">
    <div class="table-responsive">
      @include('admin.error_message')
        <table class="table table-hover">

            @php   
                $product_price = [];
            @endphp

            @foreach($purchased_product as $co)
                @php $product_price[] = $co->total; @endphp
            @endforeach

            @php $product_total_price = array_sum($product_price); @endphp

            <h5>Revenue : &pound{{$product_total_price}}</h5>

            <thead>
            <tr> 
                <th>Player</th>
                <th>Purchased Product</th> 
                <th>Cousre Price</th>
            </tr>
            </thead>
            <tbody>
            @if(count($purchased_product)>0)
            @foreach($purchased_product as $co)
                @php $product = DB::table('products')->where('id',$co->product_id)->first(); @endphp
                <tr>
                    <td>@php echo getUsername($co->user_id); @endphp</td>
                    <td>{{$product->name}}</td>
                    <td>&pound{{$co->total}}</td>
                </tr>
            @endforeach
            @else
                <tr><td colspan="4"><div class="no_results"><h3>No result found</h3></div></td></tr>
            @endif
            </tbody>
        </table>
    </div>
</div>

<div class="card-block table-border-style">
    <div class="table-responsive">
      @include('admin.error_message')
        <table class="table table-hover">

            @php
                $product_price = [];
            @endphp

            @if(count($purchased_product)>0)
                @foreach($purchased_product as $co)
                    @php $product_price[] = $co->total; @endphp
                @endforeach

                @php $product_total_price = array_sum($product_price); @endphp
            
            <h5>Revenue : &pound{{$product_total_price}}</h5>
            @endif

            <thead>
            <tr> 
                <!-- <th>Date</th> -->
                <th>Player</th>
                <th>Purchased Product</th> 
                <th>Price</th>
            </tr>
            </thead>
            <tbody>

            @if(count($purchased_product)>0)
                @foreach($purchased_product as $co)
                    @php $product = DB::table('products')->where('id',$co->product_id)->first(); @endphp
                    <tr>
                        <!-- <td>@php echo date('d-m-Y',strtotime($co->updated_at)); @endphp</td> -->
                        <td>@php echo getUsername($co->user_id); @endphp</td>
                        <td>{{$product->name}}</td>
                        <td>&pound{{$co->total}}</td>
                    </tr>
                @endforeach
            @else
                <tr><td colspan="3"><div class="no_results"><h3>No result found</h3></div></td></tr>
            @endif

            </tbody>
        </table>
    </div>
</div>

@endsection
