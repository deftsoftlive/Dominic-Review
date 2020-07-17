@extends('layouts.admin')

@section('content')

<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
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
                        <div class="card-block table-border-style">
                        <div class="table-responsive">
                          @include('admin.error_message')
                            <table class="table table-hover">
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
                                    @php $user = DB::table('users')->where('id',$re->coach_id)->first(); @endphp
                                        <td>{{$user->updated_at}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$re->invoice_name}}</td>
                                        <td>{{$re->invoice_document}}</td>
                                        <td>
                                        @if($re->status == 1)
                                            <h6 style="color:green;"><b>Accepted</b></h6>
                                        @elseif($re->status == 0)
                                            <h6 style="color:red;"><b>Rejected</b></h6>
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
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        {{ $req->render() }}
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
 </script>


@endsection
