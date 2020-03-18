@extends('layouts.admin')

 
 
@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">{{$title}}</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Vendors</a></li>
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
                                            <h5>{{$title}}</h5>
                                        </div>
                                        <div class="card-block table-border-style">
                                            <div class="table-responsive">
                                              @include('admin.error_message')
                                                <table id="example2" class="table table-hover">
                                                    <thead>
                                                    <tr>
                                                        
                                                        @php $i=1; @endphp
                                                        <th>Business Name</th>
                                                        <th>Business Type</th>
                                                        <th>Email</th>      
                                                        <th>Date</th>
                                                           
                                                        <th width="120">Action</th>                                              
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                    </tbody>
                                                </table>
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
 
 
$(function() { 
        var i=1;
  $('#example2').DataTable({
         
        processing: true,
        serverSide: true,
        ajax: '<?= url(route('ajax_getInvitingVendors')) ?>',
        columns: [
             { data: 'business_name', name: 'business_name' },
             { data: 'label', name: 'label' },
             { data: 'email', name: 'email' },
             { data: 'created_at', name: 'created_at' },
            //{ data: 'status', name: 'status' },
             { data: 'action', name: 'action' },
        ]
       
    });
});
 
</script>
     
@endsection