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
                    <li class="breadcrumb-item"><a href="javascript:void(0);">{{$title}}</a></li>
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
                                        <div class="card-header status-btns">
                                            <h5>{{$title}}</h5>
                                            <div>
                                <button type="button" onclick="getBusinesses(2)" class="btn btn-warning"><i class="fas fa-eye"></i>View Pending Businesses</button>
                                <button type="button" onclick="getBusinesses(3)" class="btn btn-success"><i class="fas fa-eye"></i>View Approved Businesses</button>
                                <button type="button" onclick="getBusinesses(4)" class="btn btn-danger"><i class="fas fa-eye"></i>View Rejected Businesses</button>
                            </div>
                                        </div>
                                        <div class="card-block table-border-style">
                                            <div class="table-responsive">
                                              @include('admin.error_message')
                                                <table id="example2" class="table table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>Business Name</th>
                                                        <th>Services</th>      
                                                        <th>Status</th>    
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

function getBusinesses(status) {
$('#example2').DataTable({
    destroy: true,
    processing: true,
    serverSide: true,
    ajax: `/admin/businesses/ajax_getBusinesses/${status}`,
    columns: [
         { data: 'title', name: 'title' },
         { data: 'services', name: 'services' },
         { data: 'status', name: 'status', fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
            let status = '';
            if(sData == 4) status = "<button type='button' class='btn btn-danger'>Rejected</button>";
            else if(sData == 3) status = "<button type='button' class='btn btn-success'>Approved</button>";
            else if(sData == 2) status = "<button type='button' class='btn btn-warning'>Pending</button>";
            $(nTd).html(status);
            } 
        },
         { data: 'action', name: 'action' },
    ]           
});
}
getBusinesses(3);
 
function modalClick(data) {
  const vendor_page = $(data).data('vendor_page');  
  const action = $(data).data('action');  
  const return_url = $(data).data('return_url');  

  $("#businessRejectForm").trigger("reset");
  $("#vendor_page").val(`${vendor_page}`);
  $("#return_url").val(`${return_url}`);  
  $("#businessRejectForm").attr("action", `${action}`);
}

$('.custom-control-input').on('change', function() {
  if($(this).is(':checked')) {
    $(this).closest('.form-group').find('textarea').css('display', 'block');
  } else {
    $(this).closest('.form-group').find('textarea').css('display', 'none');
  }
});

</script>


     
@endsection