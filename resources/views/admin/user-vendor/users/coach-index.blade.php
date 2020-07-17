@extends('layouts.admin')

@section('content')

<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Coach Users</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Users</a></li>
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
                        <h5>Coach Users</h5>
                        <div class="cst-admin-filter">
                            <a href="{{ route('add_user') }}" class="btn btn-primary">Add</a>
                            <a href="{{ route('list_users') }}" class="btn btn-primary">All Users</a>
                            <a href="{{ route('children_users') }}" class="btn btn-primary">Children</a>
                            <a href="{{ route('parent_users') }}" class="btn btn-primary">Parents / Adults</a>
                            <a href="{{ route('coach_users') }}" class="active btn btn-primary">Coaches</a>
                        </div>
                        <!-- <span class="d-block m-t-5">use class <code>table-hover</code> inside table element</span> -->
                    </div>

                    <br/>
                    <!-- Filter Section - Start -->
                    <form action="{{route('list_users')}}" method="POST" class="cst-selection">
                    @csrf
                        <div class="container">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="search_first_name" id="search_first_name" placeholder="Enter First Name">
                                            </div>

                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="search_last_name" id="search_last_name" placeholder="Enter Last Name">
                                            </div>
                                                
                                            <div class="col-sm-3" >
                                                <input type="email" class="form-control" name="search_email" id="search_email" placeholder="Enter User Email">
                                            </div>
                                            
                                            <div class="col-sm-1" style="margin-right: 10px;">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>

                                            <div class="col-sm-1" style="margin-left: 10px;">
                                                <a href="" onclick="myFunction();" class="btn btn-primary">Reset</a>
                                            </div>
                                        </div><br/>
                                    </div>
                    </form>
                    <!-- Filter Section - End -->

                </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive cst_table_width">
                          @include('admin.error_message')
                            <table id="example2" class="table table-hover">
                                <thead>
                                <tr> 
                                    <th>Name</th> 
                                    <th>DOB</th>
                                    <th>Contact</th>
                                    <th>Address</th>
                                    <!-- <th>Coach Status</th> -->
                                    <th>Upload Inovoice Feature (On/Off)</th>
                                    <th>Action</th>

                                </tr>admin/users
                                </thead>
                                <tbody>
                                @foreach($users as $user) 
                                @php $dob = date("d-m-Y", strtotime($user->date_of_birth)); @endphp
                                    <tr>
                                        <td>@if($user->gender == 'male')
                                                <i class="gender_icon fas fa-male"></i>
                                            @else
                                                <i class="gender_icon fas fa-female"></i>
                                            @endif
                                            &nbsp; {{$user->name}}</td>
                                        <td>{{$dob}}</td>
                                        <td>{{$user->email}}<br/>{{$user->phone_number}}</td>
                                        <td>{{$user->address}}, {{$user->town}}<br/>{{$user->postcode}}, {{$user->country}}</td>
                                       <!--  <td>
                                        @if($user->updated_status == '1')
                                            <span class="cst_active"><i class="fas fa-check-circle"></i></span>
                                        @else
                                            <span class="cst_in-active"><i class="fas fa-times-circle"></i></span>
                                        @endif
                                        </td> -->
                                        <td>
                                        <form id="enable_inv_status-{{$user->id}}" action="{{route('enable_inv_status')}}" method="POST">
                                            @csrf
                                            <input type="hidden" id="change_status" name="id" value="{{$user->id}}">
                                            <label class="switch">
                                              <input type="checkbox" onclick="enablechecktoggle({{$user->id}});" id="enabletoggle-{{$user->id}}" value="1" name="enable_inovice" @if($user->enable_inovice == 1) checked @endif>
                                              <span class="slider round"></span>
                                            </label>
                                        </form>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary">Action</button><button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                                                <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(82px, -64px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                    <a href="{{url('admin/users/edit')}}/{{$user->id}}" class="dropdown-item">Edit</a>
                                                    <!-- <a href="{{route('admin.user.status',$user->id)}}" class="dropdown-item">
                                                        @if($user->updated_status == '1')
                                                            In-active
                                                        @else
                                                            Active
                                                        @endif
                                                    </a> -->
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        {{ $users->render() }}
                    </div>
                <!-- </div> -->
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>

@endsection

@section('scripts')
<script>
function myFunction() {
        $("#all_users")[0].click();
    }
</script>

<script type="text/javascript">
  function enablechecktoggle(id){ 
    $("#enabletoggle-"+id).change(function(){
        $("#enable_inv_status-"+id).submit();
   });
  }   
</script>

@endsection