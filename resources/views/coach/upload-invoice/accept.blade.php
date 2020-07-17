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
  <a style="float:right;" href="{{url('user/upload-invoice/add')}}" class="cstm-btn">Add New Invoice</a>
  <a style="float:right;margin-right: 5px;" href="{{url('user/upload-invoice')}}" class="cstm-btn">All Invoices</a>
  <a style="float:right;margin-right: 5px;" href="{{url('user/upload-invoice/not-approved')}}" class="cstm-btn">Not Approved</a>
  <a style="float:right;margin-right: 5px;" href="{{url('user/upload-invoice/pending')}}" class="cstm-btn">Pending</a>
  <a style="float:right;margin-right: 5px;" href="{{url('user/upload-invoice/accept')}}" class="cstm-btn">Accepted</a>
  </div>
  <div class="col-md-12 invoice_apd">

        @if(count($req)> 0)
        <div class="player-report-table tbl_shadow">
          <div class="report-table-wrap">
     

					  <div class="m-b-table">

					  <table>
                        <thead>
                          <tr>
                            <th>Date</th>
                            <th>Invoice Name</th>
                            <th>Uploaded Invoice</th>
                            <th>Status</th>
                            <th>View PDF</th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach($req as $re)

                          <tr>
                            <td><p>{{$re->created_at}}</p></td>
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
                          </tr>
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
                  <p>No Accepted Invoice Found</p>
                </div>
              </div>
            @endif


                    
        </div>
  </div>
</div>
</section>


@endsection