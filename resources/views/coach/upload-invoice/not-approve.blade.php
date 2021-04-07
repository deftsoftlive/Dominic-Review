@extends('inc.homelayout')

@section('title', 'DRH|Register')

@section('content')
@php
$country_code = DB::table('country_code')->get();
$notification = DB::table('parent_coach_reqs')->where('coach_id',Auth::user()->id)->where('status',NULL)->count();
$user = DB::table('users')->where('role_id',3)->where('id',Auth::user()->id)->first(); 
@endphp
<div class="account-menu">
  <div class="container">
    <div class="menu-title">
	  <span>Account</span> menu
	</div>
	<nav>
	  <ul>
        @include('inc.coach-menu')
    </ul>
	</nav>
  </div>
</div>

<section class="member section-padding">
  <div class="container">
  <div class="outer-wrap">
    <div class="row">
  <div class="col-md-12 pink-heading">
    <h2>Uploaded Invoices</h2>    
  </div>
  <div class="col-md-12 upload_opt">
  <a style="float:right;" href="{{url('user/upload-invoice/add')}}" class="cstm-btn {{ \Request::route()->getName() === 'add_upload_invoice' ? 'active' : 'nav-item' }}"> Add New Invoice</a>

  <a style="float:right;margin-right: 5px;" href="{{url('user/upload-invoice')}}" class="cstm-btn {{ \Request::route()->getName() === 'upload_invoice' ? 'active' : 'nav-item' }}">All Invoices</a>

  <a style="float:right;margin-right: 5px;" href="{{url('user/upload-invoice/not-approved')}}" class="cstm-btn {{ \Request::route()->getName() === 'inv_not_approve' ? 'active' : 'nav-item' }}">Not Approved</a>

  <a style="float:right;margin-right: 5px;" href="{{url('user/upload-invoice/pending')}}" class="cstm-btn {{ \Request::route()->getName() === 'inv_pending' ? 'active' : 'nav-item' }}">Pending</a>

  <a style="float:right;margin-right: 5px;" href="{{url('user/upload-invoice/accept')}}" class="cstm-btn {{ \Request::route()->getName() === 'inv_accept' ? 'active' : 'nav-item' }}">Accepted</a>
  </div>
  <div class="col-md-12 invoice_apd">

        @if(count($req)> 0)
        <div class="player-report-table tbl_shadow">
          <div class="report-table-wrap">
     

					  <div class="m-b-table">

					  <table class="cstm_invoice_wrap">
                        <thead>
                          <tr>
                            <th>Date</th>
                            <th>Invoice Name</th>
                            <th>Uploaded Invoice</th>
                            <th>Status</th>
                            <th>View PDF</th>
                            <th>Comment</th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach($req as $re)

                          <tr>
                            <td><p>@php echo date("d/m/Y", strtotime($re->created_at)); @endphp</p></td>
                            <td><p>{{$re->invoice_name}}</p></td>
                            <td><p>{{$re->invoice_document}}</p></td>
                            <td><p>
                            	@if($re->status == 0)
                            		<p style="color:red;"><b>Admin is unable to accept your request</b></p>
                            	@elseif($re->status == 1)
                            		<p style="color:green;"><b>Accepted</b></p>
                            	@elseif($re->status == 2)
                            		<p style="color:green;"><b>Request Sent</b></p>
                            	@endif
                            </p></td>
                            <td><p><a target="_blank" href="{{URL::asset('/uploads')}}/{{$re->invoice_document}}">View</a></p></td>
                            <td><p>{{isset($re->reason_of_rejection) ? $re->reason_of_rejection  : '-'}}</p></td> 
                          </tr>
                          @endforeach

                        </tbody>
                      </table>

					      </div>

            </div>
          </div>

            @if(!empty($req))
                {{$req->render()}}
            @endif

            @else
              <div class="noData offset-lg-4 col-lg-4 offset-md-3 col-md-6 offset-sm-2 col-sm-8 sorry_msg">
                <div class="no_results">
                  <h3>Sorry, no results</h3>
                  <p>No Invoice Found</p>
                </div>
              </div>
            @endif


                    
        </div>
  </div>
</div>
</section>


@endsection