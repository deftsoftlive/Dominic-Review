@extends('layouts.admin')

@section('content')

<div class="page-header">
                        <div class="page-block">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <div class="page-header-title">
                                        <h5 class="m-b-10">Wallet Management</h5>
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

                                            <h5>Wallet Management</h5>
                                        
                                    </div>
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                          @include('admin.error_message')
                                            <table class="table table-hover">
                                                <thead>
                                                <tr> 
                                                    <th>User Name</th> 
                                                    <th>Wallet Amount</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($wallet as $wa)
                                                    <tr>
                                                        <td>@php echo getUsername($wa->user_id); @endphp</td>
                                                        <td>
                                                        @php 
                                                            $creditWalletHistory = DB::table('wallet_histories')->where('type','credit')->where('user_id',$wa->user_id)->get();
                                                            $debitWalletHistory = DB::table('wallet_histories')->where('user_id',$wa->user_id)->where('type','debit')->get();

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

                                                        &pound;{{$wa->money_amount}}
                                                        </td>

                                                        <td>
                                                        <div class="wallet-action">
                                                            <div class="reject-view" data-toggle="modal" data-target="#credit-money-{{$wa->id}}">
                                                                <a href="javascript:void(0);" class="btn btn-primary">Credit</a>
                                                            </div>

                                                            <div class="reject-view" data-toggle="modal" data-target="#debit-money-{{$wa->id}}">
                                                                <a href="javascript:void(0);" class="btn btn-primary">Debit</a>
                                                            </div>

                                                            <a class="btn btn-primary" href="{{url('/admin/wallet-details/view')}}/{{$wa->user_id}}">View Details</a>
                                                        </div>

                                                            <!-- Credit form -->
                                                            <div class="modal fade" id="credit-money-{{$wa->id}}" role="dialog">
                                                                <div class="modal-dialog">
                                                                  <!-- Modal content-->
                                                                  <div class="modal-content">
                                                                     <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                     </div>
                                                                     <div class="modal-body">
                                                                        <div class="card coach_profile">
                                                                        <form method="POST" action="{{route('admin.credit.wallet')}}">
                                                                          @csrf
                                                                          <input type="hidden" name="user_id" value="{{$wa->user_id}}">
                                                                          <input type="hidden" name="id" value="{{$wa->id}}">
                                                                          <div class="form-group">
                                                                            <h4>Enter money amount to credit the amount in user account:</h4>
                                                                            <input type="text" name="money_amount" class="form-control">
                                                                          </div>
                                                                          <button type="submit" class="btn btn-primary">Submit</button>
                                                                        </form>
                                                                        </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>

                                                               <!-- Debit Form -->
                                                               <div class="modal fade" id="debit-money-{{$wa->id}}" role="dialog">
                                                                <div class="modal-dialog">
                                                                  <!-- Modal content-->
                                                                  <div class="modal-content">
                                                                     <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                     </div>
                                                                     <div class="modal-body">
                                                                        <div class="card coach_profile">
                                                                        <form method="POST" action="{{route('admin.debit.wallet')}}">
                                                                          @csrf
                                                                          <input type="hidden" name="id" value="{{$wa->id}}">
                                                                          <input type="hidden" name="user_id" value="{{$wa->user_id}}">
                                                                          <div class="form-group">
                                                                            <h4>Enter money amount to debit the amount from user account:</h4>
                                                                            <input type="text" name="money_amount" class="form-control">
                                                                          </div>
                                                                          <button type="submit" class="btn btn-primary">Submit</button>
                                                                        </form>
                                                                        </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                        {{ $wallet->render() }}
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>


@endsection