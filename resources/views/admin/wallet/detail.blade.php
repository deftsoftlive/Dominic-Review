@extends('layouts.admin')

@section('content')

<style>
p.vou_prod_type {
    color: #3f4d67;
    font-weight: 600;
    border-radius: 12px;
    margin: 0px 165px 0px 0;;
}
</style>
<div class="page-header">
                        <div class="page-block">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <div class="page-header-title">
                                        <h5 class="m-b-10">Wallet Detail</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                                    </ul>
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

                                          <h5>Wallet Detail</h5>

                                          @php 
                                              $creditWalletHistory = DB::table('wallet_histories')->where('type','credit')->where('user_id',$user_id)->get();
                                              $debitWalletHistory = DB::table('wallet_histories')->where('user_id',$user_id)->where('type','debit')->get();

                                              $wallet = DB::table('wallets')->where('user_id',$user_id)->first();

                                              $wallet_amt1 = [];
                                              foreach($creditWalletHistory as $wh){
                                                  $wallet_amt1[] = $wh->money_amount;
                                              }

                                              $wallet_amt2 = [];
                                              foreach($debitWalletHistory as $wh){
                                                  $wallet_amt2[] = $wh->money_amount;
                                              }

                                              $total_credit_amt = array_sum($wallet_amt1);
                                              $total_debit_amt = array_sum($wallet_amt2);

                                              $wallet_amt = $total_credit_amt - $total_debit_amt;
                                          @endphp

                                    </div>

                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">

                                          <p>User Name : <b>@php echo getUsername($user_id); @endphp</b></p>
                                          <p>Wallet Amount : <b>&pound;{{$wallet->money_amount}}</b></p>

                                          @include('admin.error_message')

                                          @if(count($walletHistory)>0)
                                            <table class="table table-hover">
                                                <thead>
                                                <tr> 
                                                    <th>Date</th>
                                                    <th>Type</th>
                                                    <th>Payment By</th>
                                                    <th>Wallet Amount</th>  
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($walletHistory as $wa)
                                                    <tr>
                                                      <td>@php echo date('d-m-Y',strtotime($wa->created_at)); @endphp</td>
                                                      <td>
                                                        @if($wa->type == 'credit') 
                                                          <p class="vou_prod_type" style="background:#c7f197">&nbsp; Credit</p> 
                                                        @elseif($wa->type == 'debit') 
                                                          <p class="vou_prod_type" style="background:#ffddd2">&nbsp; Debit</p> 
                                                        @endif
                                                      </td>
                                                      <td>@if($wa->payment_by == 1) Admin @else User @endif</td>
                                                      <td>&pound;{{$wa->money_amount}}</td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                            @endif

                                        </div>
                                        {{ $walletHistory->render() }}
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>


@endsection