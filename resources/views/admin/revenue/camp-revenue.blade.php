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
                        <h5>Camps</h5>
                        <!-- <button class="btn btn-primary d-print-none" id="print_btn">Print</button> -->
                    </div>
                    <br/>

                    <!-- Filter Section - Start -->
                    <form action="{{route('admin.revenue.camps')}}" method="POST" class="cst-selection">
                    @csrf
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-3">
                                    <input class="form-control" type="text" name="camp_name" placeholder="Please enter camp name">
                                </div>
                                
                                <div class="col-sm-1" style="margin-right:10px;">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>

                                <div class="col-sm-1" style="margin-left:10px">
                                    <a href="" onclick="myFunction();" class="btn btn-primary">Reset</a>
                                </div>
                            </div><br/>
                        </div>
                    </form>
                    <!-- Filter Section - End -->

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

            <thead>
            <tr> 
                <th>Camp Name</th>
                <th>Attendees</th>
                <th>Revenue</th>
                <th>Coach Costs</th> 
                <th>Profit</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            @if(count($purchased_camp)>0)

            @foreach($purchased_camp as $co)
                <tr>
                    @php 
                        $camp = DB::table('camps')->where('id',$co->product_id)->first(); 
                        $shop = DB::table('shop_cart_items')->where('shop_type','camp')->where('product_id',$co->product_id)->where('type','order')->get();
                        $participants = DB::table('shop_cart_items')->where('shop_type','camp')->where('product_id',$co->product_id)->where('type','order')->count();
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
                        $get_revenue = $sum_revenue - $camp->coach_cost; 

                        $total_male_user = array_sum($male_user); 
                        $total_female_user = array_sum($female_user);
                    @endphp

                    <td>{{$camp->title}}</td>
                    <td>{{$participants}}</td>
                    <td>&pound;{{$sum_revenue}}</td>
                    <td>@if(!empty($camp->coach_cost)) {{$camp->coach_cost}} @else - @endif</td> 
                    <td>&pound;{{$get_revenue}}</td>
                    <td><a href="{{url('/admin/revenue/camps')}}/{{$co->product_id}}">View Report</a></td>
                </tr>
            @endforeach

            @else
                <tr><td colspan="6"><div class="no_results"><h3>No result found</h3></div></td></tr>
            @endif

            </tbody>
        </table>
    </div>
    {{ $purchased_camp->render() }}
</div>

@endsection

@section('scripts')

<script type='text/javascript'>
function printData()
{
   var divToPrint=document.getElementById("print_data");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('#print_btn').on('click',function(){
printData();
})
</script>

@endsection