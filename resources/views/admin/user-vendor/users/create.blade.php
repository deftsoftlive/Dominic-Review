@extends('layouts.admin')
 
@section('content')

      <div class="page-header">
          <div class="page-block">
              <div class="row align-items-center">
                  <div class="col-md-12">
                      <div class="page-header-title">
                          <h5 class="m-b-10">Add User</h5>
                      </div>
                      <ul class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                          <li class="breadcrumb-item"><a href="{{route('list_users')}}">Users</a></li>
                          <li class="breadcrumb-item"><a href="">Add User</a></li>
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

              <form role="form" action="{{route('save_user')}}" method="post" id="userEditForm" enctype="multipart/form-data">
                @csrf

                  
                  {{textbox($errors,'First Name<span class="cst-upper-star">*</span>','first_name')}}
                  {{textbox($errors,'Last Name<span class="cst-upper-star">*</span>','last_name')}}

                  <label class="control-label">Role<span class="cst-upper-star">*</span></label>
                  <select class="form-control" name="role_id">
                        <option value="2">Parent</option>
                        <option value="3">Coach</option>
                  </select><br/>
                  
                  <label class="control-label">Gender<span class="cst-upper-star">*</span></label>
                  <select class="form-control" name="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                  </select><br/>

                  {{textbox($errors,'Email<span class="cst-upper-star">*</span>','email')}}

                  <label class="control-label">Date Of Birth<span class="cst-upper-star">*</span></label>
                  <input type="date" class="form-control" name="date_of_birth"><br/>

                  {{textbox($errors,'Phone Number<span class="cst-upper-star">*</span>','phone_number')}}
                  {{textbox($errors,'Address<span class="cst-upper-star">*</span>','address')}}
                  {{textbox($errors,'Town<span class="cst-upper-star">*</span>','town')}}
                  {{textbox($errors,'Postcode<span class="cst-upper-star">*</span>','postcode')}}
                  {{textbox($errors,'County<span class="cst-upper-star">*</span>','county')}}

                  <label class="control-label">Country<span class="cst-upper-star">*</span></label>
                  <select class="form-control" name="country">
                    @php $country_code = DB::table('country_code')->get(); @endphp
                    @foreach($country_code as $name)
                        <option value="{{$name->countryname}}">{{$name->countryname}}</option>
                    @endforeach
                  </select><br/>

                  <label class="control-label">Status<span class="cst-upper-star">*</span></label>
                  <select class="form-control" name="updated_status">
                        <option value="1">Verified</option>
                        <option value="0">Not Verified</option>
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
     
@endsection

