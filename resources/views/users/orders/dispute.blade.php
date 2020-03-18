@extends('users.layouts.layout') 
@section('content')






<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Dispute</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item "><a href="{{ route('user_orders') }}">Orders</a></li>
                    <li class="breadcrumb-item "><a href="javascript:void(0)">Dispute</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>










<section class="content">
    <div class="row">
        <div class="col-xl-12 col-md-12 m-b-30">
            <div class="card">
                <div class="card-body">
                    <div class="row">



                        <div class="col-md-8">





<form method="post">
<div class="row">
       
       <div class="col-md-12">
           {{textbox($errors,'Reason','reason')}}
           {{textbox($errors,'Phone Number','phone_number',Auth::user()->phone_number)}}
           {{textbox($errors,'Email','email',Auth::user()->email)}}
           {{textarea($errors,'Summary','summary')}}
            @csrf
             <button class="btn btn-primary">Submit</button>

      </div>
</div>

</form>



















                        </div>




                        <div class="col-md-4">
                            <div class="row">
                                    <div class="col-md-12">
                                            <figure class="vendor-ver-img"> 
                                            @if($order->vendor->category && $order->vendor->category->cover_type == 1)
                                                   <img src="{{url(getBasicInfo($order->vendor->vendors->id, $order->vendor->category_id,'basic_information','cover_photo'))}}">
                                                                  
                                             @else
                                                  <img src="{{url(getBasicInfo($order->vendor->vendors->id, $order->vendor->category_id,'basic_information','cover_video_image'))}}">
                                     
                                            @endif
                                        </figure>
                                    </div>
                                   <div class="col-md-12">
                                            <h3>{{$order->vendor->title}} <span class="hiredVendor">Hired</span></h3>
                                            <h6><span class="icon"><i class="far fa-calendar-alt"></i></span><strong> From </strong> {{date('Y-m-d',strtotime($event->start_date))}}<strong> To </strong> {{date('Y-m-d',strtotime($event->end_date))}}</h6>
                                            <h6><strong>Vendor Name :</strong> {{$order->vendor->vendors->name}}</h6>
                                            <h6><strong>Package :</strong> {{$order->package->title}}</h6>
                                            <h6><strong>Package Price:</strong> ${{custom_format($order->package_price,2)}}</h6>
                                    </div>


                            </div>        
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection 
    @section('scripts') 
@endsection