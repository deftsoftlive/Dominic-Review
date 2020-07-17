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
                    <a href="{{ route('admin.revenue') }}" class="btn btn-primary">All Revenues</a>
                    <a href="{{ route('admin.revenue.courses') }}" class="btn btn-primary">Courses Revenue</a>
                    <a href="{{ route('admin.revenue.camps') }}" class="btn btn-primary">Camps Revenue</a>
                    <a href="{{ route('admin.revenue.products') }}" class="btn btn-primary">Products Revenue</a>
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

                        <h5>Courses</h5>

                    </div>
                    
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>

<div class="card-block table-border-style">
    <div class="table-responsive">
      @include('admin.error_message')
        <table class="table table-hover">

            @php 
                $purchased_courses1 = \DB::table('shop_cart_items')->where('shop_type','course')->where('type','order')->get();
                $course_price = [];
            @endphp

            @foreach($purchased_courses1 as $co)
                @php $course_price[] = $co->total; @endphp
            @endforeach

            @php $course_total_price = array_sum($course_price); @endphp

            <h5>Revenue : &pound{{$course_total_price}}</h5>

            <thead>
            <tr> 
                <th>Player</th>
                <th>Purchased Course</th> 
                <th>Cousre Price</th>
            </tr>
            </thead>
            <tbody>
            @foreach($purchased_courses as $co)
                <tr>
                    <td>@php echo getUsername($co->child_id); @endphp</td>
                    <td>@php echo getCourseName($co->product_id); @endphp</td>
                    <td>&pound{{$co->total}}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    {{ $purchased_courses->render() }}
</div>

@endsection