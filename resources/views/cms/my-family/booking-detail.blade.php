@extends('inc.homelayout')

@section('title', 'DRH|Register')

@section('content')

@php 
  $orderId = $order->orderID;
  $user_id = $order->user_id;
  $user_detail = DB::table('users')->where('id',$user_id)->first();	
  $cart_items = DB::table('shop_cart_items')->where('orderID', $orderId)->get(); 

  $country_code = DB::table('country_code')->get(); 
  $notification = DB::table('parent_coach_reqs')->where('coach_id',Auth::user()->id)->where('status',NULL)->count();

  $user = DB::table('users')->where('role_id',3)->where('id',Auth::user()->id)->first();
@endphp

<div class="account-menu acc_sub_menu">
  <div class="container">
    <div class="menu-title">
	  <span>Account</span> menu
	</div>
	<nav>
	  <ul>

	  @php
        $user_id = \Auth::user()->role_id;
      @endphp
	  @if($user_id == '2')
  	    <li><a href="{{ route('my-family') }}" class="{{ \Request::route()->getName() === 'my-family' ? 'active' : '' || \Request::route()->getName() === 'add-family-member' ? 'active' : '' || \Request::route()->getName() === 'edit-family-member' ? 'active' : '' }}">My family</a></li>
  	    <!-- <li><a href="{{ route('player_report_listing') }}" class="{{ \Request::route()->getName() === 'player_report_listing' ? 'active' : '' }}">Reports</a></li> -->
        <li><a href="{{ route('my-bookings') }}" class="{{ \Request::route()->getName() === 'my-bookings' ? 'active' : '' }}">My Bookings</a></li>
        <li><a href="{{ route('badges') }}" class="{{ \Request::route()->getName() === 'badges' ? 'active' : '' }}">DRH Tennis Pro</a></li>
        <li><a href="{{ route('linked_coaches') }}" class="{{ \Request::route()->getName() === 'linked_coaches' ? 'active' : '' }}">My Coaches</a></li>
        <li><a href="{{ route('parent_notifications') }}" class="{{ \Request::route()->getName() === 'parent_notifications' ? 'active' : '' }}">Notifications <span class="notification-icon"></span></a></li>
        <li><a href="" class="">Settings</a></li>
        <li><a href="{{ route('logout') }}" class="{{ \Request::route()->getName() === 'logout' ? 'active' : '' }}">Logout</a></li>
      @elseif($user_id == 3)
        <li><a href="{{ route('coach_profile') }}" class="{{ \Request::route()->getName() === 'coach_profile' ? 'active' : '' }}">My Profile</a></li>
        <li><a href="{{ route('coach_report') }}" class="{{ \Request::route()->getName() === 'coach_report' ? 'active' : '' }}">Reports</a></li>
            <!-- <li><a href="{{ route('qualifications') }}" class="{{ \Request::route()->getName() === 'qualifications' ? 'active' : '' }}">Qualifications</a></li> -->

            @if(!empty($user))
            @if($user->enable_inovice == 1)
            	<li><a href="{{ route('upload_invoice') }}" class="{{ \Request::route()->getName() === 'upload_invoice' ? 'active' : '' || \Request::route()->getName() === 'add_upload_invoice' ? 'active' : '' }}">Invoices</a></li>
            @endif
            @endif

            <li><a href="{{ route('coach_player') }}" class="{{ \Request::route()->getName() === 'coach_player' ? 'active' : '' }}">My Players</a></li>
            <li><a href="{{ route('my-bookings') }}" class="{{ \Request::route()->getName() === 'my-bookings' ? 'active' : '' }}">My Bookings</a></li>
            <li><a href="{{ route('request_by_parent') }}" class="{{ \Request::route()->getName() === 'request_by_parent' ? 'active' : '' }}">Notifications <span class="notification-icon">({{$notification}})</span></a></li>
            <li><a href="{{ route('account_settings') }}" class="{{ \Request::route()->getName() === 'account_settings' ? 'active' : '' }}">Settings</a></li>
            <li><a href="{{ route('logout') }}" class="{{ \Request::route()->getName() === 'logout' ? 'active' : '' }}">Logout</a></li>
      @endif
	  </ul>
	</nav>
  </div>
</div>


<!-- Success Message -->
@if(Session::has('success'))               
    <div class="alert_msg alert alert-success">
        <p>{{ Session::get('success') }} </p>
    </div>
@endif

<section class="member section-padding">   
	<div class="container"> 

      	<div class="pink-heading">
		    <h2 class="text-left">Order Details&nbsp;&nbsp;  </h2>
		 </div>
			<div class="accordian_summary">

			    <div class="card">
			      	<div class="card-header">
				        <a class="collapsed card-link" data-toggle="collapse" href="#Summary">
						   <span>1</span>     Summary
				      	</a>
			      	</div>
				    <div id="Summary" class="collapse show" >
				        <div class="card-body">
				          	<div class="o-b-summary">
							    <table>
								  <thead>
								    <tr>
									  <th scope="row">Order #ID : </th>
									  <td> {{$order->orderID}}</td>
									</tr>
									<tr>
									  <th scope="row">Order Date : </th>
									  <td> {{$order->created_at}}</td>
									</tr>
									<tr>
									  <th scope="row">Order Total: </th>
									  <td> &pound;{{$order->amount}}</td>
									</tr>
									<tr>
									  <th scope="row">Payment Method : </th>
									  <td> {{$order->payment_by}}</td>
									</tr>

									@if(!empty($order->provider_id))
                                    @php 
                                      $provider = DB::table('childcare_vouchers')->where('id',$order->provider_id)->first();
                                    @endphp
									<tr>
									  <th scope="row">Selected Provider : </th>
									  <td> {{$provider->provider_name}}</td>
									</tr>
									@endif
								  </thead>
								</table>
							</div>
							<div class="download_order">
								<a href="{{url('/user/order/invoice/download')}}/@php echo base64_encode($order->id); @endphp" target="_blank" class="new-booking  mr-0 mb-10  ml-10 nw_btn_three">
					    		<span class="des-view"> <i class="fa fa-download" aria-hidden="true"></i></span> Download Order
								</a>
								&nbsp;&nbsp;

								<!-- @if($order->status == '1')
								<a href="{{url('/user/order/cancel')}}/{{$order->id}}" class="cstm-btn" onclick="return confirm('Are you sure you cancel this booking?')" >Cancel Booking</a>
								@elseif($order->status == '2')
								<br/>
								<div class="col-md-12 form-btn"> 
                                    <div class="profile-status"><span class="p-s-verified"> Booking cancelled successfully.</span></div> 
                                </div>
								@endif -->
							</div>
				        </div>
				    </div>
			    </div>
			    <div class="card">
			      	<div class="card-header">
				        <a class="card-link" data-toggle="collapse" href="#Product">
				          <span>2</span> Product & Payment details
				        </a>
			      	</div>
			      	<div id="Product" class="collapse  " >
				        <div class="card-body"> 
					  	 	<div class="order_right_sec">
						  	   	<div class="o-item-details mt-0">
							  	   	<div class="table_overflow cst_detail_page_des">
									    <table>
										  <thead>
										    <tr>
											  <th>Name</th>
											  <th>Item Details</th>
											  <th>Order Type</th>
											  <th>Price</th>
											</tr>
										  </thead>
										  <tbody>

										  @foreach($cart_items as $cart)

										  @if($cart->shop_type == 'product')
			                                @php 
			                                    $pro_id = $cart->product_id;
			                                    $user_id = DB::table('users')->where('id',$cart->user_id)->first();
			                                    $product_detail = DB::table('products')->where('id',$pro_id)->first(); 
			                                    $cat_id = getProductCatname($product_detail->category_id);
			                                    $sub_cat_id = getProductCatname($product_detail->subcategory_id);

			                                    $extra = getAllValueWithMeta('service_fee_amount', 'global-settings'); 
			                                    $pro_amt = $order->amount - $extra;

			                                    $variation = \App\Models\Products\ProductAssignedVariation::find($cart->variant_id);
			                                 @endphp

										    <tr>
										      <td style="width: 30%; text-align: left;"><b>Account Holder</b> : {{$user_id->name}}</td><!-- <td style="width: 20%;"><img src="{{url($product_detail->thumbnail)}}" alt="" /></td>
											  <td style="width: 40%;">
											  	<h5>{{$product_detail->name}}</h5>
		                                          <p>{{$cat_id}} | {{$sub_cat_id}}</p>
		                                      </td> -->
		                                      <td>
		                                      	<div class="row">
		                                      	<div class="col-sm-8">	
			                                      	<h5>{{$product_detail->name}}</h5>
			                                      	@if(!empty($cart->voucher_code)) 
			                                            <p><b>Voucher - {{$cart->voucher_code}}</b></p> 
			                                        @endif
			                                        <p>{{$cat_id}} | {{$sub_cat_id}}</p>
			                                        <p>
			                                            @if($product_detail->product_type == 1)
			                                              @foreach($variation->hasVariationAttributes as $v)
			                                                {{$v->parentVariation->variations->name}}: 
			                                                  <b class="bText">{{$v->parentVariation->name}}</b> <br/>
			                                              @endforeach
			                                            @endif
			                                          </p>
			                                    </div>
			                                    <div class="col-sm-4">
		                                        	<img src="{{url($product_detail->thumbnail)}}" alt="" />
		                                        </div>
		                                    	</div>
		                                      </td>
											  <td>Product<br/>
											  	@if(!empty($cart->discount_code))
												  	<p><b>Applied Coupon -</b> {{isset($cart->discount_code) ? $cart->discount_code : '-'}}</p>
												  	<p>&pound;{{$cart->discount_price}} off on {{$product_detail->name}}</p>
												@endif
											  </td>
											  <td>&pound; {{$cart->price}}</td>
											</tr>
											@elseif($cart->shop_type == 'course')
											@php 
			                                    $course_id = $cart->product_id;
			                                    $course = DB::table('courses')->where('id',$course_id)->first();  
			                                    $child = DB::table('users')->where('id',$cart->child_id)->first();
			                                @endphp
											<tr>
											  <td style="width: 30%; text-align: left;"><b>Child : </b>{{isset($child->name) ? $child->name : 'No child selected'}}</td>
											  <td style="width: 40%;">
											  	<h5>{{$course->title}}</h5>
											  	<p>{{$course->term}} | {{$course->day_time}}</p>
		                                      </td>
		                                      <td>Course
		                                      	@if(!empty($cart->discount_code))
												  	<p><b>Applied Coupon -</b> {{isset($cart->discount_code) ? $cart->discount_code : '-'}}</p>
												  	<p>&pound;{{$cart->discount_price}} off on {{$course->title}}</p>
												@endif
		                                      </td>
											  <!-- <td>1</td> -->
											  <td>&pound; {{$cart->price}}</td>
											</tr>
											@elseif($cart->shop_type == 'camp')
											@php 
												$week = json_decode($cart->week);	
			                                    $camp_id = $cart->product_id;
			                                    $camp = DB::table('camps')->where('id',$camp_id)->first(); 
			                                    $child = DB::table('users')->where('id',$cart->child_id)->first();
			                                @endphp
											<tr>
											  <td style="width: 30%; text-align: left;"><b>Child : </b>{{isset($child->name) ? $child->name : 'No child selected'}}</td>
											  <td style="width: 40%;">
											  	<h5>{{$camp->title}}</h5>

											  	@if(!empty($week))
											  	<p>
												@foreach($week as $number=>$number_array)

													@foreach($number_array as $data=>$user_data)

														@foreach($user_data as $data1=>$user_data1)
															@php 
																$split = explode('-',$user_data1);
																$get_session = $split[2];
															@endphp
															@if($get_session == 'early')
																{{$number}} - {{$data1}} - Early Drop Off<br/>
															@elseif($get_session == 'mor')
																{{$number}} - {{$data1}} - Morning<br/>
															@elseif($get_session == 'noon')
																{{$number}} - {{$data1}} - Afternoon<br/>
															@elseif($get_session == 'lunch')
																{{$number}} - {{$data1}} - Lunch Club<br/>
															@elseif($get_session == 'late')
																{{$number}} - {{$data1}} - Late Pickup<br/>
															@elseif($get_session == 'full')
																{{$number}} - {{$data1}} - Full Day<br/>
															@endif
														@endforeach
													
												    @endforeach

												@endforeach

											  	</p>
											  	@endif
		                                      </td>
		                                      <td>Camp
		                                      	@if(!empty($cart->discount_code))
												  	<p><b>Applied Coupon -</b> {{isset($cart->discount_code) ? $cart->discount_code : '-'}}</p>
												  	<p>&pound;{{$cart->discount_price}} off on {{$camp->title}}</p>
												@endif
		                                      </td>
											  <!-- <td>1</td> -->
											  <td>&pound; {{$cart->price}}</td>
											</tr>
											@endif
											@endforeach

										  </tbody>
										</table>
									</div>
									<div class="o-total-table total_price">
										<div class="inner_table_total">
											<h3 class="card-title">Cart Totals</h3>
											<table>
											  <tbody>
											  	<?php $extra = getAllValueWithMeta('service_fee_amount', 'global-settings'); 
	                                              $pro_amt = $order->amount - $extra;
	                                            ?>
											    <tr>
												  <th scope="row">Subtotal(@php echo count($cart_items); @endphp items):</th>
												  <td>&pound; {{$pro_amt}}</td>
												</tr>

												@if($extra > 0)
												<tr>
												  <th scope="row">Service Fee:</th>
												  <td>&pound; {{$extra}}</td>
												</tr>
												@endif
												<tr class="order_total">
												  <th scope="row">Order Total</th>
												  <td>&pound; {{$order->amount}}</td>
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
			    <div class="card">
				     <div class="card-header">
				        <a class="collapsed card-link" data-toggle="collapse" href="#Personal">
				          <span>3</span> Personal Details
				        </a>
				    </div>
				     <div id="Personal" class="collapse" >
				        <div class="card-body"> 
					    <table>
						  <thead>
						    <tr>
							  <th scope="row">Name :</th>
							  <td>{{$user_detail->name}}</td>
							</tr>
							<tr>
							  <th scope="row">Email Id :</th>
							  <td>{{$user_detail->email}}</td>
							</tr>
							<tr>
							  <th scope="row">Mobile No:</th>
							  <td>{{$user_detail->phone_number}}</td>
							</tr>
						  </thead>
						</table>
				        </div>
				     </div>
			    </div> 
<?php 
	$shop_type = array(); 
	foreach($cart_items as $sh){
		$shop_type[] = $sh->shop_type;
	}
	if(!empty($sh->voucher_code))
	{
	}else{
		if (in_array('product', $shop_type, TRUE)){ ?>

		    <div class="card">
		      <div class="card-header">
		        <a class="collapsed card-link" data-toggle="collapse" href="#Shipping">
		          <span>4</span> Shipping Details
		        </a>
		      </div>
		      <div id="Shipping" class="collapse" >
		        @php 
                  $shipping_add = json_decode($order->shipping_address); 
                @endphp

		        <div class="card-body"> 
			    <strong>Name</strong> : {{$shipping_add->name}}<br>
			    <strong>Email</strong> : {{$shipping_add->email}}<br>
			    <strong>Phone No.</strong> : {{$shipping_add->phone_number}}<br/>
			    <address><strong>Address</strong> : {{$shipping_add->address}}, {{$shipping_add->country}}, <br/>
			    {{ $shipping_add->state}}, {{ $shipping_add->city}} <br>
				<strong>Zipcode</strong> : {{$shipping_add->zipcode}}</address>			 
		        </div>
		      </div>
		    </div> 
		    <div class="card">
		      <div class="card-header">
		        <a class="collapsed card-link" data-toggle="collapse" href="#Billing">
		          <span>5</span> Billing Details
		        </a>
		      </div>
		      <div id="Billing" class="collapse" >
		      	@php 
                  $billing_add = json_decode($order->billing_address); 
                @endphp

		        <div class="card-body"> 
			    <strong>Name</strong> : {{$billing_add->name}}<br>
			    <strong>Email</strong> : {{$billing_add->email}}<br>
			    <strong>Phone No.</strong> : {{$billing_add->phone_number}}<br/>
			    <address><strong>Address</strong> : {{$billing_add->address}}, {{$billing_add->country}}, <br/>
			    {{ $billing_add->state}}, {{ $billing_add->city}} <br>
				<strong>Zipcode</strong> : {{$billing_add->zipcode}}</address>			 
		        </div>
		      </div>
		    </div> 
	

	<?php } }?>

		  </div>
		</div>
	</section> 


<section class="click-here-sec">
      <div class="container">
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="click-sec-content">
              <h2 class="click-sec-tagline">Need help with kids camps or our coaching courses?</h2>
                <ul class="click-btn-content">
                  <li>
                    <figure>
                    <img src="http://49.249.236.30:8654/dominic-new/public/images/click-btn-img.png">
                </figure>
                </li>
                <li>
                  <a href="" class="cstm-btn">Click Here</a>
                </li>
                <li>
                    <figure>
                    <img src="http://49.249.236.30:8654/dominic-new/public/images/click-btn-img.png">
                </figure>
                </li>
                </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection