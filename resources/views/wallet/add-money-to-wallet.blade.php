@extends('inc.homelayout')
@section('title', 'DRH|Register')
@section('content')
@php
$country_code = DB::table('country_code')->get();
$notification = DB::table('parent_coach_reqs')->where('coach_id',Auth::user()->id)->where('status',NULL)->count();
$user = DB::table('users')->where('role_id',3)->where('id',Auth::user()->id)->first();
@endphp
<style>
    .card.coach_profile {
   border: 4px solid #be298d;
   padding: 30px;
   box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.1);
   border-radius: 0;
   }
</style>
<div class="account-menu">
    <div class="container">
        <div class="menu-title">
            <span>Account</span> menu
        </div>
        <nav>
            <ul>
                @php
                    $user_id = \Auth::user()->role_id;
                @endphp

                @if($user_id == '3')
                    @include('inc.coach-menu')
                @elseif($user_id == '2')
                    @include('inc.parent-menu')
                @endif
            </ul>
        </nav>
    </div>
</div>
@if(Session::has('success'))
<div class="alert_msg alert alert-success">
    <p>{{ Session::get('success') }} </p>
</div>
@endif
@php
$wallet_amt = DB::table('wallets')->where('user_id',Auth::user()->id)->first();
@endphp
<section class="register-sec cstm-reg-sec">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="wallet_amt">
                    @if(!empty($wallet_amt))
                    <h4>Total Wallet Money : &pound;{{$wallet_amt->money_amount}}</h4>
                    @endif
                </div>
            </div>
            <div class="col-lg-8 col-md-10">
                <div class="card coach_profile">
                    <div class="card-header">{{ __('Add Money To Wallet') }}</div>
                    <div class="card-body">
                        <form id="wallet" method="POST" enctype="multipart/form-data" action="{{route('add_wallet_amt')}}">
                            @csrf
                            <input type="hidden" name="user_id" value="{{\Auth::user()->id}}">
                            <div class="row wallet_form">
                                <!-- Profile Name -->
                                <div class="col-md-8 col-sm-8">
                                    <div class="form-group row f-g-full">
                                        <label for="money_amount" class="col-md-12 col-form-label text-md-right">Enter money amount</label>
                                        <input id="money_amount" type="text" class="form-control{{ $errors->has('money_amount') ? ' is-invalid' : '' }}" name="money_amount" value="{{ isset($user->money_amount) ? $user->money_amount : '' }}" autofocus placeholder="Please enter amount">
                                        @if ($errors->has('money_amount'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('money_amount') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4" id="add_money_btn"><a class="cstm-btn">Add Money</a></div>
                            </div>
                            <div class="form-button">
                                <div class="form-group row mb-0">
                                    <div class="col-md-12 form-btn add_stripe_btn">
                                        <?php $stripe = SripeAccount();  ?>
                                        @csrf
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@php
$walletHistory = DB::table('wallet_histories')->where('user_id',Auth::user()->id)->orderBy('id','desc')->paginate(5);
@endphp
@if(count($walletHistory)>0)
<section class="memberddd">
    <div class="container">
        <div class="pink-heading">
            <h2>Wallet History</h2>
        </div>
        <div class="col-md-12">
            <div class="player-report-table tbl_shadow">
                <div class="report-table-wrap">
                    <div class="m-b-table">
                        <table>
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
                                        <span class="vou_prod_type" style="background:#c7f197"><b>Credit</b></span>
                                        @elseif($wa->type == 'debit')
                                        <span class="vou_prod_type" style="background:#ffddd2"><b>Debit</b></span>
                                        @endif
                                    </td>
                                    <td>@if($wa->payment_by == 1) Admin @else @php echo getUsername($wa->user_id); @endphp @endif</td>
                                    <td>&pound;{{$wa->money_amount}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{ $walletHistory->render() }}
        </div>
    </div>
</section>
@endif
@endsection