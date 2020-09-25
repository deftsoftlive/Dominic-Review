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
                        <h5>Courses</h5>
                        <div class="print_logo">
                            <img height="70px;" width="120px;" src="{{url('/')}}/public/uploads/pdf-logo.png">
                        </div>
                        <!-- <button class="btn btn-primary d-print-none" onclick="window.print();" id="print_btn">Print</button> -->
                        <!-- <button class="btn btn-primary d-print-none" id="print_btn">Print</button> -->
                    </div>
                    <br/>
                    <div class="row d-print-none">
                        <div class="col-sm-1" style="margin-left:10px">
                            <a href="" onclick="window.print();" class="btn btn-primary">Print</a>
                        </div>
                        <div class="col-sm-1">
                            <a href="{{url('admin/revenue/courses')}}" class="btn btn-primary">Reset</a>
                        </div>
                    </div>
                    <br/>
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
                $course_price = [];
            @endphp

            @foreach($purchased_courses as $co)
                @php $course_price[] = $co->total; @endphp
            @endforeach

            @php $course_total_price = array_sum($course_price); @endphp

            <h5>Revenue : &pound;{{$course_total_price}}</h5>

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
</div>


<div class="card-block table-border-style">
    <div class="table-responsive">
      @include('admin.error_message')
        <table class="table table-hover gender_colors">

            @php 
                $total_revenue = [];
                $total_cost = [];
            @endphp

            @foreach($purchased_courses as $co)

                @php 
                    $course = DB::table('courses')->where('id',$co->product_id)->first();
                    $shop = DB::table('shop_cart_items')->where('shop_type','course')->where('product_id',$co->product_id)->where('type','order')->get();
                    $total_cost[] = $course->coach_cost + $course->venue_cost + $course->other_cost + $course->equipment_cost + $course->tax_cost;
                @endphp

                @foreach($shop as $bc)
                    @php 
                        $total_revenue[] = $bc->total; 
                    @endphp
                @endforeach
            
            @endforeach

            @php 
                $sum_revenue = array_sum($total_revenue);   
                $total_costs = array_sum($total_cost);
                $total_profit = $sum_revenue - $total_costs;
            @endphp

            <h5>Total Revenue : &pound;{{$sum_revenue}}</h5>
            <h5>Total Cost : &pound;{{$total_costs}}</h5>
            <h5>Total Profit : &pound;{{$total_profit}}</h5>

            <thead>
            <tr> 
                <th>Name</th>
                <th>Season</th>
                <th>Lead Coach</th>
                <th>Attendees</th>
                <th>Revenue</th>
                <th>Costs</th> 
                <th>Profit</th>
                <th class="d-print-none">Action</th>
            </tr>
            </thead>
            <tbody>

            @if(count($purchased_courses)>0)

            @foreach($purchased_courses as $co)
                <tr>
                    @php 
                        $course = DB::table('courses')->where('id',$co->product_id)->first();
                        $participants = DB::table('shop_cart_items')->where('shop_type','course')->where('product_id',$co->product_id)->where('type','order')->count();
                        $shop = DB::table('shop_cart_items')->where('shop_type','course')->where('product_id',$co->product_id)->where('type','order')->get();
                    @endphp

                    @php 
                        $total_revenue = [];
                        $male_user = [];
                        $female_user = [];
                    @endphp
                    @foreach($shop as $bc)
                        @php 
                            $total_revenue[] = $bc->total; 
                            $male_user[] = DB::table('users')->where('id',$bc->child_id)->where('gender','male')->count();
                            $female_user[] = DB::table('users')->where('id',$bc->child_id)->where('gender','female')->count();
                        @endphp
                    @endforeach

                    @php 
                        $sum_revenue = array_sum($total_revenue); 
                        $get_revenue = $sum_revenue - $course->coach_cost;  

                        $total_male_user = array_sum($male_user); 
                        $total_female_user = array_sum($female_user);
                    @endphp

                    <td>@php echo getCourseName($co->product_id); @endphp</td>
                    <td>@php echo getSeasonname($co->course_season); @endphp</td>
                    <td>@if(!empty($course->linked_coach)) @php echo getUsername($course->linked_coach); @endphp @else - @endif</td>
                    <td>{{$participants}}</td>
                    <td>&pound;{{$sum_revenue}}</td>
                   <!--  <td>@if(!empty($course->coach_cost)) &pound;{{$course->coach_cost}} @else - @endif</td> 
                    <td>&pound;{{$get_revenue}}</td> -->
                    <td>
                    @php 
                        $cumulative_sum = ($course->coach_cost)+($course->venue_cost)+($course->equipment_cost)+($course->other_cost)+($course->tax_cost); 
                    @endphp
                    &pound;{{$cumulative_sum}}
                    </td> 
                    <td>
                        @php 
                            $profit = $sum_revenue - $cumulative_sum; 
                        @endphp 
                        &pound;{{$profit}}
                    </td>
                    <td class="d-print-none"><a href="{{url('admin/revenue/courses')}}/{{$co->product_id}}">View Report</a></td>

                </tr>
            @endforeach
            @else
                <tr><td colspan="8"><div class="no_results"><h3>No result found</h3></div></td></tr>
            @endif

            </tbody>
        </table>
    </div>
</div>

@endsection

