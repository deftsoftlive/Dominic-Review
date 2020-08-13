@extends('layouts.admin')

@section('content')

<style>
p.vou_prod_type {
    color: #3f4d67;
    font-weight: 600;
    border-radius: 12px;
    margin: 0px 50px 0px 0px;
}
</style>
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Linked Coaches</h5>
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

                        <h5>Player & Coach Linking</h5>
                        <div class="cst-admin-filter">
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
                                <th>Player Name</th>
                                <th>Parent Name</th> 
                                <th>Coach Name</th>
                                <th>Status</th>
                                <th>Further Detials</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($parentCoachReq as $req)
                                <tr>
                                    <td>@php echo date("d/m/Y", strtotime($req->created_at)); @endphp</td>
                                    <td>@php echo getUsername($req->child_id); @endphp</td>
                                    <td>@php echo getUsername($req->parent_id); @endphp</td>
                                    <td>@php echo getUsername($req->coach_id); @endphp</td>
                                    <td>
                                        @if($req->status == 0)
                                            <p class="vou_prod_type" style="background:#d0f0ff">&nbsp; Requested</p>
                                        @elseif($req->status == 1)
                                            <p class="vou_prod_type" style="background:#c7f197">&nbsp; Accepted</p>
                                        @elseif($req->status == 2)
                                            <p class="vou_prod_type" style="background:#ffddd2">&nbsp; Rejected</p>
                                        @endif
                                    </td>
                                    <td>{{isset($req->reason_of_rejection) ? $req->reason_of_rejection : '-'}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    {{ $parentCoachReq->render() }}
                </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>


@endsection
