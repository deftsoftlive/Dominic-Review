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

      <section class="content c-qualification cstm-qual">
      <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
       @include('admin.error_message')
 
            <div class="card-body">

@if(count($uploaded_documents)> 0)

      
      
    <div class="form-group f-g-upload">
        <label class="control-label" for="timelsots">My certificates and qualifications</label>
        <br/>

              <!-- Upload Document Section - start -->
               <div class="upload-section">

                @foreach($uploaded_documents as $doc)
                  <div id="upload_doc">
                    <div class="row">
                      <div class="col-lg-2 col-md-3 col-sm-3">
                        <div class="document-name">
                          <label><strong>Document Name</strong> - </label>
                          {{$doc->document_name}}
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-3">
                        <label><strong>Document Type</strong> - </label>
                        {{$doc->document_type}}
                       </div>
                      <div class="col-lg-2 col-md-3 col-sm-3">
                        <label><strong>Expiry Date</strong> - </label>
                        {{!empty($doc->expiry_date) ? $doc->created_at->format('d-m-Y') : 'No expiry date'}}
                      </div>
                      <div class="col-lg-2 col-md-3 col-sm-3">
                        <label><strong>Notification</strong> - </label>
                        @if($doc->notification == 'No Reminder')
                          @php $date = 'No Reminder'; @endphp
                        @elseif($doc->notification == '1 Month')
                          @php  $date = $doc->created_at->addMonths(1)->format('d-m-Y'); @endphp
                        @elseif($doc->notification == '3 Months')
                          @php  $date = $doc->created_at->addMonths(3)->format('d-m-Y'); @endphp
                        @elseif($doc->notification == '6 Months')
                          @php  $date = $doc->created_at->addMonths(6)->format('d-m-Y'); @endphp
                        @endif
                        {{isset($date) ? $date : ''}}
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-3 ">
                        <label><strong>Upload Document</strong> - </label>
                        <div class="doct-wrap">
                          <a target="_blank" href="{{URL::asset('/uploads/coach-document')}}/{{$doc->upload_document}}">{{ $doc->upload_document }}</a>
                          <a onclick="return confirm('After deleting this, the document is no more visible to admin. Are you sure you want to delete this document?')" href="{{url('/user/delete/coach/document')}}/{{$doc->id}}"><i class="fa fa-minus-circle" aria-hidden="true"></i></a>
                        </div>
                      </div>
                  
                    </div>
                  </div>
                  <br/>
                  @endforeach
                  
                </div>
                <!-- Upload Document Section - start -->

            </div>
      
            <br/><br/>
@endif
      <!-- ***********************************************
      |
      |     COACH PROFILE - UPLOAD DOCUMENTS - Start Here 
      |
      |*************************************************** -->
     

        <form role="form" action="{{route('save-qualifications')}}" method="post" id="venueForm" enctype="multipart/form-data">
                      
                  @csrf
                  <input type="hidden" name="coach_id" value="{{\Auth::user()->id}}">

                      @php
                        $count=1;  
                      @endphp
         
                        <div class="form-group f-g-upload">
                              <label class="control-label" for="timelsots">Upload Documents To Complete Your Profile</label>
                              <br/>
                              <a onclick="addnewsection11();" href="javascript:void(0);"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>

                      <!-- Upload Document Section - start -->
							         <div class="upload-section" id="add_on_services">
                        <input type="hidden" id="noOfQuetion" value="{{$count}}">

                          <div id="upload_doc" class="upload_doc doc{{$count}}">
            							  <div class="row">
              							  <div class="col-lg-2 col-md-4 qly-row">
              							    <div class="document-name">
                								  <label>Document Name</label>
                								  <input type="text" name="document_name[{{$count}}]" id="document_name" class="form-control" placeholder="Document Name" required/>
                								</div>
              							  </div>
              							  <div class="col-lg-3 col-md-4 qly-row">
                							  <label>Document Type</label>
                							  <select name="document_type[{{$count}}]" class="form-control">
                								  <option value="Coaching Qualification">Coaching Qualification</option>
                								  <option value="DBS Certificate">DBS Certificate</option>
                								  <option value="First Aid Certificate">First Aid Certificate</option>
                								  <option value="Safeguarding Certificate">Safeguarding Certificate</option>
                                  <option value="Insurance Document">Insurance Document</option>
                                  <option value="LTA Accreditation">LTA Accreditation</option>
                                  <option value="Others">Others</option>
                								</select>
                							 </div>
              							  <div class="col-lg-2 col-md-4 qly-row">
              							    <label>Expiry Date</label>
              							    <div class="calendar">
              								  <input type="date" id="" class="form-control" name="expiry_date[{{$count}}]" placeholder="Expiry Date">
              								</div>
              							  </div>
                              <div class="col-lg-2 col-md-4 qly-row">
                                <label>Notification</label>
                                <select name="notification[{{$count}}]" class="form-control">
                                  <option value="No Reminder">No Reminder</option>
                                  <option value="1 Month">1 Month</option>
                                  <option value="3 Months">3 Months</option>
                                  <option value="6 Months">6 Months</option>
                                </select>
                              </div>
                              <div class="col-lg-3 col-md-5 qly-row">
                                <label>Upload Document</label>
                                <input type="file" name="upload_document[{{$count}}]" class="form-control" required=""><a onclick="removeSection11({{$count}});" href="javascript:void(0);"><i class="fa fa-minus-circle" aria-hidden="true"></i></a>
                              </div>
                          
  							            </div>

                          </div>
                          <br/>
							          </div>
                        <!-- Upload Document Section - start -->

							         <button type="submit" id="btnVanue" class="btn btn-primary">Submit</button>
                    </div>
       </form>


     


            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
    </div>
      <!-- /.row -->
    </section>

 
     
@endsection


<!-- Coach Profile Management -->
<script type="text/javascript">

        function addnewsection11(){
            //noOfattribute
            var number = parseInt($("#noOfQuetion").val());  
            var newnumber =number+1;                        
            $("#noOfQuetion").val(newnumber);

            var mainHtml='<div id="upload_doc" class="upload_doc doc'+newnumber+'"><div class="row"><div class="col-lg-2 col-md-4 qly-row"><div class="document-name"><input type="text" name="document_name['+newnumber+']" id="document_name" class="form-control" placeholder="Document name" required /></div></div>';

            mainHtml+='<div class="col-lg-3 col-md-4 qly-row"><select name="document_type['+newnumber+']" class="form-control"><option value="Coaching Qualification">Coaching Qualification</option><option value="DBS Certificate">DBS Certificate</option><option value="First Aid Certificate">First Aid Certificate</option><option value="Safeguarding Certificate">Safeguarding Certificate</option><option value="Insurance Document">Insurance Document</option><option value="LTA Accreditation">LTA Accreditation</option><option value="Others">Others</option></select></div>';
                              
            mainHtml+='<div class="col-lg-2 col-md-4 qly-row"><div class="calendar"><input type="date" id="" class="form-control" name="expiry_date['+newnumber+']" placeholder="Expiry date"></div></div>';

            mainHtml+='<div class="col-lg-2 col-md-4 qly-row"><select name="notification[{{$count}}]" class="form-control"><option value="No Reminder">No Reminder</option><option value="1 Month">1 Month</option><option value="3 Months">3 Months</option><option value="6 Months">6 Months</option></select></div>';
                              
            mainHtml+='<div class="col-lg-3 col-md-5 qly-row"><input type="file" name="upload_document['+newnumber+']" class="form-control" required /><a onclick="removeSection11('+newnumber+');" href="javascript:void(0);"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></div>';


            $("#add_on_services").append(mainHtml);
        }


        function removeSection11(counter){ 
            //noOfattribute
            var number = parseInt($("#noOfQuetion").val()); 
            $
            $(".doc"+counter).remove();
        }

</script>


