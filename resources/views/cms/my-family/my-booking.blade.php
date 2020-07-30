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
                            $user_id = $sho->user_id;
                            $orderID = $sho->orderID;
                            $cart_items = DB::table('shop_cart_items')->where('user_id',$user_id)->where('orderID',$orderID)->where('type','order')->get(); 
                          @endphp

                          @foreach($cart_items as $items)
                          <tr>
                            <td><p>{{$sho->created_at}}</p></td>
                            <td><p>&nbsp;{{$sho->orderID}}</p></td>
                            <td><p>
                              @if(!empty($items->voucher_code))
                                Voucher Product
                              @elseif($items->shop_type == 'product') 
                                Product 
                              @elseif($items->shop_type == 'course')
                                Course
                              @elseif($items->shop_type == 'camp')
                                Camp
                              @endif
                            </p></td>
                            <td><p>&pound;{{$items->total}}</p></td>
                            <td><p>{{$sho->payment_by}}</p></td>
                            <td><p><a href="{{url('user/booking/detail')}}/@php echo base64_encode($sho->id); @endphp">View Booking Detail</a></p></td> 
                          </tr>
                          @endforeach

                          @endforeach
                        </tbody>
                      </table>

					  </div>

            </div>
          </div>

            @else
              <div class="noData offset-md-4 col-md-4 sorry_msg">
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