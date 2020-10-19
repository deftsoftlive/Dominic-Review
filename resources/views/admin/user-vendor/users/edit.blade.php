@extends('layouts.admin')
 
@section('content')

      <div class="page-header">
          <div class="page-block">
              <div class="row align-items-center">
                  <div class="col-md-12">
                      <div class="page-header-title">
                          <h5 class="m-b-10">Edit User</h5>
                      </div>
                      <ul class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                          <li class="breadcrumb-item"><a href="{{route('list_users')}}">Users</a></li>
                          <li class="breadcrumb-item"><a href="">Edit User</a></li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>

      <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
       @include('admin.error_message')
 
            <div class="card-body">

            <div class="col-md-12">

              <form role="form" action="{{route('update_users')}}" method="post" id="userEditForm" enctype="multipart/form-data">
                @csrf
                  <input type="hidden" name="id" value="{{$user->id}}">
                  
                  {{textbox($errors, 'First Name<span class="cst-upper-star">*</span>', 'first_name', $user->first_name)}}
                  {{textbox($errors, 'Last Name<span class="cst-upper-star">*</span>', 'last_name', $user->last_name)}}

                  <label class="control-label">Role<span class="cst-upper-star">*</span></label>
                  <select class="select-player" name="role_id">
                        <option value="2" {{ $user->role_id == '2' ?  'selected' : '' }}>Parent</option>
                        <option value="3" {{ $user->role_id == '3' ?  'selected' : '' }}>Coach</option>
                  </select><br/>

                  <label class="control-label">Gender<span class="cst-upper-star">*</span></label>
                  <select class="select-player" name="gender">
                        <option value="male" {{ $user->gender == 'male' ?  'selected' : '' }}>Male</option>
                        <option value="female" {{ $user->gender == 'female' ?  'selected' : '' }}>Female</option>
                  </select><br/>

                  {{textbox($errors, 'Email<span class="cst-upper-star">*</span>', 'email', $user->email)}}

                  <label class="control-label">Date Of Birth<span class="cst-upper-star">*</span></label>
                  <input type="date" value="{{$user->date_of_birth}}" class="form-control" name="date_of_birth"><br/>

                  {{textbox($errors, 'Phone Number<span class="cst-upper-star">*</span>', 'phone_number', $user->phone_number)}}
                  {{textbox($errors, 'Address<span class="cst-upper-star">*</span>', 'address', $user->address)}}
                  {{textbox($errors, 'Town<span class="cst-upper-star">*</span>', 'town', $user->town)}}
                  {{textbox($errors, 'Postcode<span class="cst-upper-star">*</span>', 'postcode', $user->postcode)}}
                  {{textbox($errors, 'County<span class="cst-upper-star">*</span>', 'county', $user->county)}}

                  <label class="control-label">Country<span class="cst-upper-star">*</span></label>
                  <select class="select-player" name="country">
                    @php $country_code = DB::table('country_code')->orderBy('countryname','asc')->get(); @endphp
                    @foreach($country_code as $name)
                        <option @if($name->countryname == $user->country) selected @endif value="{{$name->countryname}}">{{$name->countryname}}</option>
                    @endforeach
                  </select><br/>

                  <!-- {{textbox($errors, 'Email Verified At*', 'email_verified_at', $user->email_verified_at)}} -->

                  <label class="control-label">Status<span class="cst-upper-star">*</span></label>
                  <select class="select-player" name="updated_status">
                        <option value="0" {{ $user->updated_status == '0' ?  'selected' : '' }}>Not Verified</option>
                        <option value="1" {{ $user->updated_status == '1' ?  'selected' : '' }}>Verified</option>
                  </select><br/>
             
                  <div class="card-footer">
                    <button type="submit" id="faqFormBtn" class="btn btn-primary">Update</button>
                  </div>
             </form>

            </div>

            </div>
          </div>
        </div>
      </div>
    </section>

<!-- ***************************
| Uploaded Documents - Coach
|******************************* -->

@if($user->role_id == 3)
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body">

        <div class="col-md-12">
        <label class="control-label">Document Uploaded By Coach - </label>
        <br/>
        @if(count($coach_document)> 0)

          @foreach($coach_document as $doc)
              <div class="upload-section" id="add_on_services">

                  <div id="upload_doc" class="upload_doc">
                    <div class="row">
                      <div class="col-sm-3">
                        <div class="document-name">
                          {{ $doc->document_name }}
                        </div>
                      </div>
                      <div class="col-sm-3">
                          {{ $doc->document_type }}
                       </div>
                      <div class="col-sm-2">
                        <div class="calendar">
                        {{ $doc->expiry_date }}
                      </div>
                      </div>
                      <div class="col-sm-3">
                        <a target="_blank" href="{{URL::asset('/uploads/coach-document')}}/{{$doc->upload_document}}">{{ $doc->upload_document }}</a><br/>
                      </div>
                  
                    </div>
                  </div>
                  <br/>
                </div>
              
          @endforeach

        @else
              <p>There is no document uploaded by "{{$user->first_name}} {{$user->last_name}}" coach.</p> 
        @endif 
      </div>
    </div>
  </div>
</div>
</div>
</section>
@endif

@endsection

