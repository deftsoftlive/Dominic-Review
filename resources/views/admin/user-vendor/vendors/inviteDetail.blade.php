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
                                   @include('admin.error_message')
                              <table class="table">
                                  <tr>
                                      <th width="150">Business Name</th><td>{{$vendor->business_name}}</thd
                                  </tr>
                                  <tr>
                                      <th width="150">Business Type</th><td>{{$vendor->category->label}}</td>
                                  </tr>

                                   <tr>
                                      <th width="150">Name</th><td>{{$vendor->name}}</td>
                                  </tr>

                                   <tr>
                                      <th>Email</th><td>{{$vendor->email}}</td>
                                  </tr>

                                   <tr>
                                      <th>Phone Number</th><td>{{$vendor->phone_number}}</td>
                                  </tr>

                                  <tr>
                                      <th>Location</th><td>{{$vendor->address}}</td>
                                  </tr>

                                    <tr>
                                      <th>Description</th><td>{{$vendor->detail}}</td>
                                  </tr>

                                   <tr>
                                      <th>Requested By</th><td>{{$vendor->user->name}}, {{$vendor->user->email}}</td>
                                  </tr>

                                  <tr>
                                    <th>Invitation Status</th>
                                    <td>
                                        {{$vendor->status == 0 ? 'Pending' : 'Invited'}}  
                                    </td>
                                  </tr>


                                  <tr>
                                      <th>Action</th><td>
                                        <a href="{{url(route('admin.vendorInvite',$vendor->id))}}" class="btn btn-warning">Request Invite</a></td>
                                  </tr>

                                  
                              </table>
                       
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