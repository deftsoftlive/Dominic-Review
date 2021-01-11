@extends('inc.homelayout')
@section('title', 'DRH')
@section('content')


<section class="account-menu-sec player-badge-sec memberddd package-purchase">
    
    @foreach($get_packages as $package)

    @if($package->status == 1 && $package->orderID != '')

        <!-- Error Message -->            
        <div class="alert_msg alert alert-danger">
           <p>You are already booked this package course </p>
        </div>

    @endif

    @php break; @endphp

    @endforeach

    <div class="container">

        <br/>
        <div class="tab-page-heading">
            <h1 class="package-heading">Book your coaching courses</h1>
        </div>

        <div class="col-md-12">
            <p style="font-size:20px;"><b>For : {{isset($pack->player_id) ? getUsername($pack->player_id) : getUsername($pack->parent_id)}}</b></p><br/>
            <div class="player-report-table tbl_shadow">
                <div class="report-table-wrap">
                    <div class="m-b-table">

                        <table>
                            <thead>
                                <tr>
                                    <th>Course</th>
                                    <th>Price</th>
                                </tr>
                            </thead>

                            <tbody>
                            	@foreach($get_packages as $package)
                            	@php $amount[] = $package->price; @endphp
                                <tr>
                                    <td> 
                                        <p>
                                            @php 
                                              $course = DB::table('courses')->where('id',$package->course_id)->first();
                                            @endphp

                                            <b>Course Name</b> : @php echo getCourseName($package->course_id); @endphp<br/>
                                            <b>Location</b> : {{$course->location}}<br/>
                                            <b>Day/Time</b> : {{$course->day_time}}<br/>
                                        </p>
                                    </td>
                                    <td style="text-align: center;">&pound;{{$package->price}}</td>
                                </tr>
                                @endforeach

                                @php
                									$total = array_sum($amount)*100;
                									$account_data = DB::table('stripe_accounts')->where('id',$pack->account_id)->first();
                								@endphp

                            </tbody>
                        </table>
                      </div>
                  </div>
              </div>

          </div>
          <div class="total_wrap">
                  
          <p><b>Total Price</b> <span>: &pound;{{array_sum($amount)}}</span></p>     
          </div>

        @foreach($get_packages as $package)

        @if($package->status == 1 && $package->orderID != '')

        @else

        <div class="pay_with_wallet" >
          <div class="payment-switches">

            <div class="container">
               <div class="row">
                  <div class="col-lg-6 res-tabs"></div>
                  <div class="col-lg-6 col-md-12">
                     <div class="tabs-wrap">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                           <li class="nav-item">
                              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Card</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Wallet</a>
                           </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                           <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                              @include('e-shop.includes.checkout.package_stripe',['user_id' => $pack->parent_id])
                           </div>
                           <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                              @php 
                                    $package = DB::table('package_courses')->where('parent_id',$pack->parent_id)->where('booking_no',$pack->booking_no)->get(); 
                                    $wallet = DB::table('wallets')->where('user_id',$pack->parent_id)->first(); 
                                    $price = [];  
                                @endphp

                                @if(!empty($package))
                                    @foreach($package as $pack)
                                        @php $price[] = $pack->price; @endphp
                                    @endforeach

                                    @php $total = array_sum($price); @endphp

                                @endif

                                @if(!empty($wallet) && $wallet->money_amount >= $total)

                                	<p><b>Wallet Amount:</b><span> &pound;{{isset($wallet->money_amount) ? $wallet->money_amount : ''}}</span></p><br/>

                                    <button type="button" class="btn btn-primary cstm-btn main_button" data-toggle="modal" data-target="#wallet_payment">
                                      Pay with wallet
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="wallet_payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                               <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLongTitle">Pay with Wallet</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                  </button>
                                               </div>
                                               <div class="modal-body">
                                                  <ul>
                                                     <li>
                                                        <p>Wallet Amount:<span> &pound;{{isset($wallet->money_amount) ? $wallet->money_amount : ''}}</span></p>
                                                     </li>
                                                     <li>
                                                        <p>Cart Amount:<span> &pound;{{$total}}</span></p>
                                                     </li>
                                                  </ul>
                                                  <div class="tect-wrap">
                                                     <p>Are you sure you wish to pay using wallet funds?</p>
                                                     <!-- <button type="button" class="btn btn-primary cstm-btn main_button">
                                                        Conform Order
                                                        </button> -->
                                                     <form id="save_package_wallet_pay" action="{{route('save_package_wallet_pay')}}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="u_id" value="@php echo base64_encode($pack->parent_id); @endphp"> 
                                                        <input type="hidden" name="booking_no" value="@php echo base64_encode($booking_no); @endphp"> 
                                                        <button class="wallet_confirm_order cstm-btn main_button" >Confirm Order</button>
                                                     </form>
                                                  </div>
                                               </div>
                                            </div>
                                        </div>
                                    </div>

                                @else

                                    No sufficient amount in wallet. 

                                @endif
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

        </div>

        @endif

        @php break; @endphp

        @endforeach

    </div>

</section>

@endsection