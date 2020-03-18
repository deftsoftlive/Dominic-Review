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
                                            <h5>Vendor Verification Section</h5>
                                        </div>
                                        <div class="card-block table-border-style">
                                                 @include('admin.error_message')
                                            <div class="row">
                                              <div class="col-lg-12">
                                              <table class="table admin_dashboard-table">
                                                  <tr>
                                                      <th class="">Sr.no</th><th class="">Document</th><th class="">Link</th>
                                                  </tr>
                                                   <tr>
                                                      <td>1</td>
                                                      <td>EIN|BS Number</td>
                                                      <td>{{$vendor->ein_bs_number}}</td>
                                                  </tr>

                                                 @if($vendor->id_proof != "")
                                                  <tr>
                                                      <td>2</td><td>ID Proof</td>
                                                      <td><a class="action-btn btn-primary" href="{{url($vendor->id_proof)}}"><i class="fas fa-eye"></i></a></td>
                                                  </tr>
                                                  @endif
                                              </table>
                                              
                                              <div class="btn-wrap text-right">
                                                <a href="{{url(route('admin.vendor.approved',$vendor->id))}}" class="btn btn-primary">Approve</a>
                                              </div>

                                            </div>
                                             <div class="col-lg-6">
                                               <h4>Basic Info</h4>
                                              <table class="table vendorUser-detail-table">
                                                <tr>
                                                    <th width="150">Name</th><th>{{$vendor->name}}</th>
                                                </tr>

                                                 <tr>
                                                    <th>Email</th><th>{{$vendor->email}}</th>
                                                </tr>

                                                 <tr>
                                                    <th>Phone Number</th><th>{{$vendor->phone_number}}</th>
                                                </tr>

                                                <tr>
                                                    <th>Location</th><th>{{$vendor->user_location}}</th>
                                                </tr>

                                                <tr>
                                                    <th>Website</th><th><a href="{{$vendor->website_url}}">{{$vendor->website_url}}</a></th>
                                                </tr>

                                                <tr>
                                                    <th>Age</th><th>{{$vendor->age}} Yrs</th>
                                                </tr>

                                                
                                            </table>
                                          </div>





<?php $refer_data = !empty($vendor->refer_data) ? (array)json_decode($vendor->refer_data) : []; ?>

 
                       @if(count($refer_data) > 0)
                             <div class="col-lg-6">
                                <h4>Reference Detail</h4>
                                              <table class="table vendorUser-detail-table">
                                                <tr>
                                                   <th width="150">Business Type</th>
                                                   <th>{{$refer_data['business_type']}}</th>
                                                </tr>

                                                 <tr>
                                                   <th width="150">Business Name</th>
                                                   <th>{{$refer_data['reference_business_name']}}</th>
                                                </tr>

                                                 <tr>
                                                   <th width="150">Email</th>
                                                   <th>{{$refer_data['reference_email']}}</th>
                                                </tr>

                                                 <tr>
                                                   <th width="150">Contact Number</th>
                                                   <th>{{$refer_data['reference_contact_number']}}</th>
                                                </tr>

                                                 <tr>
                                                   <th width="150">Address</th>
                                                   <th>{{$refer_data['business_address']}}</th>
                                                </tr>

                                                 
                                                
                                            </table>
                                          </div>


                          @endif

















                                        </div>

                                          <div class="row">
                                                <div class="col-md-12">


                                                    <div class="panel panel-default">
                                                      <div class="panel-heading">
                                                        <label class="panel-title">Rejection Section</label>
                                                      </div>
                                                      <div class="panel-body">
                                                         <form method="post" action="{{url(route('admin.vendor.rejected',$vendor->id))}}">
                                                        @csrf
                                                        <textarea class="form-control cheditor" name="detail" required></textarea>
                                                        <div class="btn-wrap mt-2">
                                                        <button class="btn btn-primary">Rejected</button>
                                                       </div>
                                                   </form>
                                                      </div>
                                                    </div>
                                                </div>
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
 <script>
     var options = {
         filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
         filebrowserWindowWidth  : 800,
         filebrowserWindowHeight : 500,
         uiColor: '#eda208',
         removePlugins: 'save, newpage',
         allowedContent:true,
         fillEmptyBlocks:true,
         extraAllowedContent:'div, a, span, section, img'
       };
   CKEDITOR.replace('detail', options);
</script>
     
@endsection