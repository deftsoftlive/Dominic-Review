@extends('layouts.admin')

@section('content')


<div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Uploaded Invoices</h5>
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
                        <h5>Invoice PDF</h5>
                        <div class="cst-admin-filter">
                            <a href="{{ route('uploaded_invoice') }}" id="all_users" class="btn btn-primary">All Invoices</a>
                            <a href="{{ route('new_uploaded_invoice') }}" class="btn btn-primary">New Invoices</a>
                            <a href="{{ route('accept_uploaded_invoice') }}" class="btn btn-primary">Accepted Invoices</a>
                            <a href="{{ route('reject_uploaded_invoice') }}" class="btn btn-primary">Rejected Invoices</a>
                        </div>
                        <!-- <span class="d-block m-t-5">use class <code>table-hover</code> inside table element</span> -->
                    </div>
                    <br/>
                    <!-- Filter Section - Start -->
                      <!-- <div class="container">
                          <div class="row">
                              <div class="col-sm-5">
                                <label>Search by coach name :</label>
                                <input placeholder="Please enter coach name" type="text" id="coach_search" name="coach_search" class="form-control">
                              </div>  
                              
                          </div><br/>
                      </div> -->
                      <!-- Filter Section - End -->

                        <div class="card-block table-border-style">
                        <div class="table-responsive">
                          @include('admin.error_message')
                            <table id="coach_player" class="table table-hover">
                                <thead>
                                <tr> 
                                    <th>Date</th>
                                    <th>Coach Name</th>
                                    <th>Invoice Name</th>
                                    <!-- <th>Description</th> -->
                                    <th>Uploaded Invoice</th> 
                                    <th>Status</th>
                                    <th>View PDF</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($req as $re)
                                    <tr>
                                    @php $user = DB::table('users')->where('id',$re->coach_id)->first();  @endphp
                                        <td>{{$user->updated_at}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$re->invoice_name}}</td>
                                        <td>{{$re->invoice_document}}</td>
                                        <td>
                                        @if($re->status == 1)
                                            <h6 style="color:green;"><b>Accepted</b></h6>
                                        @elseif($re->status == 0)
                                            <h6 style="color:red;"><b>Not Accepted</b></h6>
                                        @elseif($re->status == 2)
                                            <h6 style="color:green;"><b>Requested</b></h6>
                                        @endif
                                        </td>
                                        <td><a target="_blank" href="{{URL::asset('/uploads')}}/{{$re->invoice_document}}">View</a></td> 
                                        <td>
                                        <form id="upd_inv_status-{{$re->id}}" action="{{route('update_inv_status')}}" method="POST">
                                            @csrf
                                            <input type="hidden" id="change_status" name="id" value="{{$re->id}}">
                                            <label class="switch">
                                              <input type="checkbox" onclick="checktoggle({{$re->id}});" id="toggle-{{$re->id}}" value="1" name="status" @if($re->status == 1) checked @endif>
                                              <span class="slider round"></span>
                                            </label>
                                        </form>

                                        @if($re->status == 0)
                                        <div class="reject-view" data-toggle="modal" data-target="#reject-detail-{{$re->id}}">
                                        	<a href="javascript:void(0);" class="cstm-btn">Add Comment</a>
				                        </div>
				                        @endif

				                        <div class="modal fade" id="reject-detail-{{$re->id}}" role="dialog">
								           <div class="modal-dialog">
								              <!-- Modal content-->
								              <div class="modal-content">
								                 <div class="modal-header">
								                    <button type="button" class="close" data-dismiss="modal">&times;</button>
								                 </div>
								                 <div class="modal-body">
								                    <div class="card coach_profile">
								                    <form method="POST" id="reject_request" action="{{route('reject_invoice')}}">
								                      @csrf
								                      <input type="hidden" name="id" value="{{$re->id}}">
								                      <div class="form-group">
								                       <h4>Please state why this invoice cannot be accepted:</h4>
								                        <textarea name="reason_of_rejection" class="form-control" id="exampleFormControlTextarea1" rows="3">{{isset($re->reason_of_rejection) ? $re->reason_of_rejection : ''}}</textarea>
								                      </div>
								                      <!-- <div class="form-group">
								                        <p>The player will be able to see this message so please ensure that your are professional and respectful when stating your reasoning - Thank you</p>
								                      </div> -->
								                     
								                      <button type="submit" id="rej_req" class="btn btn-primary">Submit</button>
								                      
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
                        <div id="cust_paginate">
                            {!! $req->render() !!}
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>

@endsection

@section('scripts')

 <script type="text/javascript">
  function checktoggle(id){ 
    $("#toggle-"+id).change(function(){
        $("#upd_inv_status-"+id).submit();
   });
  }   

/*****************************
| Customer's Search
|*****************************/
jQuery(document).ready(function() {
    
    function fetch_coach_data(query = '')
    {
      $.ajax({
        url:"http://demo.drhsports.co.uk/admin/coach_search/",
        method:'GET',
        data:{query:query},
        dataType:'json',
        success:function(data)
        { 
          console.log(data);
          $('#coach_player tbody').html(data.table_data);
          $('#cust_paginate').html(data.paginate);
        }
      })
    }

    $(document).on('keyup keypress blur change', '#coach_search',function(){
      var query = $(this).val(); 
      fetch_coach_data(query);
    });


}); 
 </script>


@endsection
