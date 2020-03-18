@extends('layouts.vendor')
@section('vendorContents')
<div class="container-fluid">

 <div class="page_head-card">
    <div class="page-info">
            <div class="page-header-title">
                <h3 class="m-b-10">{{$title}}</h3>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('vendor_dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                <li class="breadcrumb-item">Orders</li>
            </ul>
   </div>
     
</div>
@include('vendors.errors')

    <div class="row">
       <div class="col-lg-12">
          <div class="card vendor-dash-card">
           <div class="card-header"><h3>{{$title}}   </h3></div>
           <div class="card-body">
                <div id="faq-accordion" class="faq-accordion">
                     @if($orders->count() == 0)
                        <div class="col-md-12">
                          <div class="alert alert-warning" role="alert">FAQs has not been added yet.</div>
                        </div>
                     @endif


                  <table class="table">
                    <tr>
                       <th>ORDERID</th>
                       <th>EVENT DATES</th>
                       <th>AMOUNT</th>
                       <th>ACTION</th>
                    </tr>


                    @foreach($orders as $order)
                         <tr>
                            <td>
                              <strong>{{$order->OrderID}}</strong>
                            </td>
                            <td>
                               <div class="orderEvent">
                                  <h5>{{$order->event->title}}</h5>
                                  <h6><b>Dates :</b> From <b>{{date('d-m-Y',strtotime($order->start_date))}}</b>
                                    To <b>{{date('d-m-Y',strtotime($order->expiry_date))}}</b></h6>
                               </div>
                            </td>
                            <td>
                              <b> ${{custom_format($order->order->amount,2)}} </b>
                              
                            </td> 
                            <td>
                              <a href="{{url(route('vendor.orderDetail',[$slug,$order->order_id]))}}" class="icon-btn"><i class="fa fa-eye"></i></a>
                            </td>
                         </tr>
                        
                    @endforeach
                    
                  </table>
















                </div> 
           </div>
         </div>
      </div>
    </div>
</div>





 
   
@endsection


@section('scripts')

<script type="text/javascript">
  
  $(document).ready(function(){
  $("#faq-accordion").on("hide.bs.collapse show.bs.collapse", e => {
    $(e.target).prev().find("i:last-child").toggleClass("fa-minus fa-plus");
  });
  });    

</script>

@endsection
