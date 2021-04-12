@extends('inc.homelayout')

@section('title', 'DRH|Register')

@section('content')
@php 
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
  	    @include('inc.parent-menu')
      @elseif($user_id == 3)
        @include('inc.coach-menu')
      @endif
	  </ul>
	</nav>
  </div>
</div>

<section class="member section-padding">
  <div class="container">
  <div class="pink-heading">
    <h2>My Bookings</h2>
  </div>

    <div class="col-md-12">

        @if(count($shop)> 0)
        <div class="player-report-table tbl_shadow">
          <div class="report-table-wrap">
     

					  <div class="m-b-table">

					       <table>
                        <thead>
                          <tr>
                            <th>Booking Date</th>
                            <th>Booking ID</th>
                            <th>Booking Type</th>
                            <th>Amount</th>
                            <th>Payment Type</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>

                          @foreach($shop as $sho)
                          @php 
                            $orderId = $sho->orderID; 
                            $user_id = $sho->user_id; 
                            $user_detail = DB::table('users')->where('id',$user_id)->first(); 

                            $cart_items = DB::table('shop_cart_items')->where('orderID', $orderId)->get(); 
                          @endphp

                          <tr>
                            <td><p>@php echo date('d/m/Y',strtotime($sho->created_at)); @endphp</p></td>
                            <td><p>&nbsp;{{$sho->orderID}}</p></td>
                            <td><p>

                              @php 
                                  $shop1 = DB::table('shop_cart_items')->where('orderID',$orderId)->get(); 
                                  $shop_ty = [];
                              @endphp

                              @foreach($shop1 as $sh)
                                  @php $shop_ty[] = $sh->shop_type; @endphp
                              @endforeach
                              @php $order_shop_type = implode(', ',$shop_ty); @endphp

                              @php echo getShopType($orderId); @endphp
                            </p></td>
                            <td><p>&pound;{{ custom_format( $sho->amount, 2) }}</p></td>
                            <td><p>{{$sho->payment_by}}</p></td>
                            <td><p><a href="{{url('user/booking/detail')}}/@php echo base64_encode($sho->id); @endphp">View Booking Detail</a></p></td> 
                          </tr>

                          @endforeach
                        </tbody>
                      </table>

					         </div>
                </div>

              </div>

              {{ $shop->links() }}


            @else
              <div class="noData offset-lg-4 col-lg-4 offset-md-3 col-md-6 offset-sm-2 col-sm-8 sorry_msg">
                <div class="no_results">
                  <h3>Sorry, no results</h3>
                  <p>No Booking Found</p>
                </div>
              </div>
            @endif


                    
        </div>
  </div>
</section>

@endsection