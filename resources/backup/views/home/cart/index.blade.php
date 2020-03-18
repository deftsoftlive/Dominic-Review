@extends('layouts.home')
@section('content')


<section class="log-sign-banner aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000" "="" style="background:url(http://49.249.236.30:8654/uploads/1574318396.png);">
    <div class="container">
            <div class="page-title text-center">
                     <h1>Cart</h1>
                </div>
            </div>    
        </section>


<section class="cart-sec">
	 <div class="container">
	   <div class="sec-card">
	      <div class="cart-card">
           <div class="card-heading">
                <h3>Shopping Cart</h3>
            </div>

            <div class="responsive-table">
            	<table class="table cart-table">
            		<thead>
            			<tr>
            				<th>Packages</th>
            				<th>Deals & Discount</th>
            				<th>Basic Price</th>
            				<th>Action</th>
            			</tr>
            		</thead>
            		<tbody>
            			<tr>
            				<td>lorem ipsim</td>
            				<td>30%</td>
            				<td>$300</td>
            				<td>
            					<div class="action-btn-wrap">
            					<a href="javascript:void(0);" class="icon-btn"><span><i class="fas fa-heart"></i></span></a>
                                <a href="javascript:void(0)" class="icon-btn danger-btn ml-1" data-toggle="tooltip" title="" data-original-title="Delete"><i class="fas fa-trash-alt"></i></a>
                            </div>
            				</td>
            			</tr>
            			<tr>
            				<td>lorem ipsim</td>
            				<td>30%</td>
            				<td>$300</td>
            				<td><div class="action-btn-wrap">
            					<a href="javascript:void(0);" class="icon-btn"><span><i class="fas fa-heart"></i></span></a>
                                <a href="javascript:void(0)" class="icon-btn danger-btn ml-1" data-toggle="tooltip" title="" data-original-title="Delete"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </td>
            			</tr>
            			<tr>
            				<td>lorem ipsim</td>
            				<td>30%</td>
            				<td>$300</td>
            				<td><div class="action-btn-wrap">
            					<a href="javascript:void(0);" class="icon-btn"><span><i class="fas fa-heart"></i></span></a>
                                <a href="javascript:void(0)" class="icon-btn danger-btn ml-1" data-toggle="tooltip" title="" data-original-title="Delete"><i class="fas fa-trash-alt"></i></a>
                            </div></td>
            			</tr>
            			<tr>
            				<td>lorem ipsim</td>
            				<td>30%</td>
            				<td>$300</td>
            				<td><div class="action-btn-wrap">
            					<a href="javascript:void(0);" class="icon-btn"><span><i class="fas fa-heart"></i></span></a>
                                <a href="javascript:void(0)" class="icon-btn danger-btn ml-1" data-toggle="tooltip" title="" data-original-title="Delete"><i class="fas fa-trash-alt"></i></a>
                            </div></td>
            			</tr>
            		</tbody>
            	</table>


            	<table class="cart-table bottom">

				<tbody><tr>
				<th>
					<form action="#" method="get" class="apply-coupon mini-btn-wrap">
						<input class="search-field" type="text" placeholder="Coupon Code" value="">
						<a href="javascript:void(0);" class="cstm-btn">Apply Coupon</a>
					</form>

					<div class="cart-btns mini-btn-wrap">
						<a href="checkout-billing-details.html" class="cstm-btn solid-btn">Proceed to Checkout</a>
						<a href="javascript:void(0);" class="cstm-btn solid-btn">Continue Shopping</a>
					</div>
				</th>
				</tr>

			</tbody>
		</table>

  <div class="row">
  	<div class="col-lg-6 offset-lg-6">
		<div class="cart-totals mt-5">
		<h3 class="headline">Cart Totals</h3><span class="line"></span><div class="clearfix"></div>

		<table class="cart-table margin-top-5">

			<tbody><tr>
				<th>Cart Subtotal</th>
				<td><strong>$178.00</strong></td>
			</tr>

			<tr>
				<th>Shipping and Handling</th>
				<td>Free Shipping</td>
			</tr>

			<tr>
				<th>Order Total</th>
				<td><strong>$178.00</strong></td>
			</tr>

		</tbody></table>
		<br>
		<!-- <a href="#" class="calculate-shipping"><i class="fa fa-arrow-circle-down"></i> Calculate Shipping</a> -->
	</div>
  </div>
</div>


            </div>

	      </div>
	  </div>
	</div>
</section>













@endsection