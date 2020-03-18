@extends('layouts.vendor')
@section('vendorContents')
<div class="container-fluid">

 <div class="page_head-card">
    <div class="page-info">
            <div class="page-header-title">
                <h3 class="m-b-10">Shop's Orders</h3>
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
           <div class="card-header"><h3>Shop's Order ({{$order->orderID}}) </h3></div>
           <div class="card-body">
                <div id="faq-accordion" class="faq-accordion">
                    


                     
                      <div class="col-lg-12">
                     <table class="cart__table cart-table">
                        <thead class="cart-table__head">
                            <tr class="cart-table__row">
                                <th class="cart-table__column cart-table__column--image">Image</th>
                                <th class="cart-table__column cart-table__column--product">Product</th>
                                <th class="cart-table__column cart-table__column--price">Price</th>
                                <th class="cart-table__column cart-table__column--quantity">Quantity</th>
                                <th class="cart-table__column cart-table__column--total">Total</th>
                                <th class="cart-table__column cart-table__column--remove"></th>
                            </tr>
                        </thead>
                        <tbody class="cart-table__body" id="loadCartItems">
 
                             @include('vendors.E-shop.includes.orders.list')
                          
                         
                        </tbody>
                    </table>
                     <!-- start Heading -->

                     

                     
                    
                     <!--  Second row -->
                     <!--  =========================== -->
                  </div>


















<div class="col-xl-12 col-md-12 m-b-30">
         <div class="card">
            <div class="card-body">
               <div class="row">
                  <div class="col-lg-6 offset-lg-3">
               <div class="total-price-wrap full-invoice">
                  <div id="cartTotals">
                    <div class="total-price-wrap">
                    
                   <div id="cartTotals">
                      <div class="cart-totals mt-2">
                                  <div class="headline-wrap text-center">
                                  <h3 class="headline">Full Invoice</h3>
                                </div>
                                  <span class="line"></span><div class="clearfix"></div>

                                  <table class="cart-table margin-top-5">
                                     
                                     
                                    <tbody>
                                          <tr>
                                        <th>Cart Subtotal</th>
                                        <td>
                                          <strong>${{custom_format($orders->sum('total'),2)}}</strong>
                                        </td>
                                      </tr>
                                       @php 

                                        $extra = $order->getPaymentDetails(Auth::user()->id);

                                           
                                        $total = ($orders->sum('total') - ($extra['service'] + $extra['commission']));

                                        @endphp
                                        <tr>
                                          <th>Service Fee</th><td><strong><span class="minus-sign">-</span> ${{$extra['service']}}</strong></td>
                                        </tr>
                                       
                                        <tr>
                                            <th>Application Fee</th><td><strong><span class="minus-sign">-</span> ${{$extra['commission']}}</strong></td>
                                        </tr>



                                      <tr>
                                        <th>Order Total</th>
                                        <td><strong>${{custom_format( $total,2)}}</strong></td>
                                      </tr>
                                              
                                       

                                      
                                                                                      
                                              
                                         
                                  </tbody>
                                </table>
                                  
                                 
                      </div>
                   </div>
                    <div class="cart-totals-bottom-block mt-4">
                    <div class="headline-wrap cart-totals text-center">
                            <h3 class="headline">We Accept</h3>
                            <span class="line"></span>
                     </div>
                     <div class="d-f justify-content-center w-100">
                          <img class="mr-2" src="http://49.249.236.30:8654/images/american-express.png" alt="visa">
                          <img class="mr-2" src="http://49.249.236.30:8654/images/discover.png" alt="master card">
                          <img src="http://49.249.236.30:8654/images/master-card.png" alt="cash on delivery">
                          <img src="http://49.249.236.30:8654/images/visa.png" alt="cash on delivery">
                       </div>
                     </div>



    </div>                  </div>
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
</div>





 
   
@endsection

 