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
                    <li class="breadcrumb-item"><a href="{{ route('list_vendors') }}">Vendors</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Business</a></li>
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
                            
                            @if(count($vendor->services))
                            <table id="businessTable" class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Business Name</th>
                                    <th>Services</th>      
                                    <th>Status</th>    
                                    <th>Action</th>               
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($vendor->services as $service)
                                <tr>
                                    <td>{{ $service->title ? $service->title : 'N/A' }}</td>
                                    <td>
                                        {{ $service->category->label }} 
                                        @if(count($service->subcategory))
                                            @foreach($service->subcategory as $subcat)
                                                {{$subcat->title}}
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                          @if($service->status == 1)
                                            <button type="button" class="btn btn-info">Incomplete</button>
                                          @endif

                                          @if($service->status == 2)
                                            <button type="button" class="btn btn-warning">Pending</button>
                                          @endif

                                          @if($service->status == 3)
                                            <button type="button" class="btn btn-success">Approved</button>
                                          @endif

                                          @if($service->status == 4)
                                            <button type="button" class="btn btn-danger">Rejected</button>
                                          @endif      
                                    </td>
                                    <td>
                                         <div class="btn-group">
                                        <button type="button" class="btn btn-primary">Action</button>
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu" x-placement="top-start" style="position: absolute; transform: translate3d(67px, -165px, 0px); top: 0px; left: 0px; will-change: transform;">
                                          
                                          @if(!empty($service->business_url))
                                          <a href="{{route('vendorBusinessView', ['slug' => $service->category->slug, 'businessSlug' => $service->business_url])}}" target="_blank" class="dropdown-item">View</a>
                                          <div class="dropdown-divider"></div>
                                          @endif

                                          @if($service->status !== 2)
                                          <a href="{{route('admin_vendor_business_changeBusinessStatus', ['vendor_id' => $vendor->id, 'id'=> $service->id, 'status' => 2])}}" class="dropdown-item">Pending</a>
                                          <div class="dropdown-divider"></div>
                                          @endif

                                          @if($service->status !== 3)
                                          <a href="{{route('admin_vendor_business_changeBusinessStatus', ['vendor_id' => $vendor->id, 'id'=> $service->id, 'status' => 3])}}" class="dropdown-item">Approved</a>
                                          <div class="dropdown-divider"></div>
                                          @endif

                                          @if($service->status !== 4)
                                          <a class="dropdown-item" data-toggle="modal" onclick="modalClick(this)" href="javascript:void(0);" data-target="#rejectModal" 
                                          data-action="{{ route('admin_vendor_business_rejectBusinessStatus', ['user_id'=> $vendor->id, 'service_id' => $service->id]) }}" data-vendor_page="{{ route('myBusinessView', ['slug' => $service->category->slug, 'url'=> $service->business_url]) }}" data-return_url="{{ route('admin_vendor_business', ['id' => $vendor->id]) }}">
                                          Rejected
                                        </a>
                                          @endif                                          

                                        </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach                                
                                </tbody>
                            </table>
                            
                            @else
                                No Business Available
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="rejectModalLabel">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="businessRejectForm" method="POST" action="">
          @csrf
            <input type="hidden" name="return_url" id="return_url" value="">
            <input type="hidden" name="vendor_page" id="vendor_page" value="">

            <div class="row">
            <div class="col-xl-12">
            <div class="form-group">
              <label for="comment">Comment</label>
              <textarea class="form-control" rows="5" name="comment" id="comment"></textarea>
            </div>
            </div> 

            <div class="col-xl-6">
                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="basic_info">
                  <label class="custom-control-label" for="basic_info">Basic Information</label>
                </div>
                <textarea class="form-control" style="display: none;" rows="2" name="basic_info_comment"></textarea>
               </div> 
           </div>

            <div class="col-xl-6">
                <div class="form-group">      
                  <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="photo">
                  <label class="custom-control-label" for="photo">Photo</label>
                </div>
                  <textarea class="form-control" style="display: none;" rows="2" name="photo_comment"></textarea>
               </div> 
           </div>
           <div class="col-xl-6">
                <div class="form-group">      
                  <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="faq">
                  <label class="custom-control-label" for="faq">Faq</label>
                </div>
                  <textarea class="form-control" style="display: none;" rows="2" name="faq_comment" ></textarea>
               </div> 
           </div>

           <div class="col-xl-6">
                <div class="form-group">      
                  <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="venue">
                  <label class="custom-control-label" for="venue">Venue</label>
                </div>
                  <textarea class="form-control" style="display: none;" rows="2" name="venue_comment" ></textarea>
               </div> 
           </div>

           <div class="col-xl-6">
                <div class="form-group">      
                  <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="description"/>
                  <label class="custom-control-label" for="description">Description</label>
                </div>
                  <textarea class="form-control" style="display: none;" rows="2" name="description_comment" ></textarea>
               </div> 
           </div>

           <div class="col-xl-6">
                <div class="form-group">      
                  <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="amenity" />
                  <label class="custom-control-label" for="amenity">Amenities And Games</label>
                </div>
                  <textarea class="form-control" style="display: none;" rows="2" name="amenity_comment" ></textarea>
               </div>
           </div>

           <div class="col-xl-6">
                <div class="form-group">      
                  <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="deal">
                  <label class="custom-control-label" for="deal">Deals</label>
                </div>
                  <textarea class="form-control" style="display: none;" rows="2" name="deal_comment" ></textarea>
               </div> 
           </div>

           <div class="col-xl-6">
                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="prohibtion_estrictions">
                  <label class="custom-control-label" for="prohibtion_estrictions">Prohibtion & Restrictions</label>
                </div>
                <textarea class="form-control" style="display: none;" rows="2" name="prohibtion_estrictions_comment"></textarea>
               </div> 
           </div>


            <div class="col-xl-6">
                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="packages">
                  <label class="custom-control-label" for="packages">Packages</label>
                </div>
                <textarea class="form-control" style="display: none;" rows="2" name="package_comment"></textarea>
               </div> 
           </div>
           
          </div>
            
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="businessRejectFormBtn" class="btn btn-primary" form="businessRejectForm">Save changes</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')  
<script src="{{url('/admin-assets/js/validations/rejectBusinessValidation.js')}}"></script> 
<script type="text/javascript">
  $(document).ready(function() {
    $('#businessTable').DataTable();
  });

function modalClick(data) {
  const vendor_page = $(data).data('vendor_page');  
  const action = $(data).data('action');  
  const return_url = $(data).data('return_url'); 

  $("#businessRejectForm").trigger("reset");
  // $('#businessRejectForm label').css('display', 'none');


  $("#vendor_page").val(`${vendor_page}`);
  $("#return_url").val(`${return_url}`);  
  $("#businessRejectForm").attr("action", `${action}`);
};

$('.custom-control-input').on('change', function() {
  if($(this).is(':checked')) {
    $(this).closest('.form-group').find('textarea').css('display', 'block');
  } else {
    $(this).closest('.form-group').find('textarea').css('display', 'none');
  }
});

</script>  
@endsection
