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

                  <label class="control-label">Gender<span class="cst-upper-star">*</span></label>
                  <select class="form-control" name="gender">
                        <option value="male" {{ $user->gender == 'male' ?  'selected' : '' }}>Male</option>
                        <option value="female" {{ $user->gender == 'female' ?  'selected' : '' }}>Female</option>
                  </select><br/>

                  {{textbox($errors, 'Email<span class="cst-upper-star">*</span>', 'email', $user->email)}}
                  {{textbox($errors, 'Phone Number<span class="cst-upper-star">*</span>', 'phone_number', $user->phone_number)}}
                  {{textbox($errors, 'Address<span class="cst-upper-star">*</span>', 'address', $user->address)}}
                  {{textbox($errors, 'Town<span class="cst-upper-star">*</span>', 'town', $user->town)}}
                  {{textbox($errors, 'Postcode<span class="cst-upper-star">*</span>', 'postcode', $user->postcode)}}
                  {{textbox($errors, 'County<span class="cst-upper-star">*</span>', 'county', $user->county)}}

                  <label class="control-label">Country<span class="cst-upper-star">*</span></label>
                  <select class="form-control" name="country">
                    @php $country_code = DB::table('country_code')->get(); @endphp
                    @foreach($country_code as $name)
                        <option @if($name->countryname == $user->country) selected @endif value="{{$name->countryname}}">{{$name->countryname}}</option>
                    @endforeach
                  </select><br/>

                  <!-- {{textbox($errors, 'Email Verified At*', 'email_verified_at', $user->email_verified_at)}} -->

                  <label class="control-label">Status<span class="cst-upper-star">*</span></label>
                  <select class="form-control" name="updated_status">
                        <option value="1" {{ $user->updated_status == '1' ?  'selected' : '' }}>Verified</option>
                        <option value="0" {{ $user->updated_status == '0' ?  'selected' : '' }}>Not Verified</option>
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

