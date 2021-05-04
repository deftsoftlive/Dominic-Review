@extends('layouts.admin')
@section('content')
<div class="page-header">
   <div class="page-block">
      <div class="row align-items-center">
         <div class="col-md-12">
            <div class="page-header-title">
               <h5 class="m-b-10">Parent Users</h5>
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
                  <h5>Parent Users</h5>
                  <div class="cst-admin-filter">
                      <a href="{{ route('add_user') }}" class="btn btn-primary">Add</a>
                      <a href="{{ route('list_users') }}" class="btn btn-primary">All Users</a>
                      <a href="{{ route('children_users') }}" class="btn btn-primary">Children</a>
                      <a href="{{ route('parent_users') }}" class="active btn btn-primary">Parents / Adults</a>
                      <a href="{{ route('coach_users') }}" class="btn btn-primary">Coaches</a>
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
                              <th>Child</th>
                              <th width="150px">Action</th>
                           </tr>
                           admin/users
                        </thead>
                        <tbody>
                           @foreach($users as $user) 
                            @php 
                                $dob = date("d-m-Y", strtotime($user->date_of_birth)); 
                                $user_id = $user->id;
                                $children = DB::table('users')->where('role_id',4)->where('parent_id',$user_id)->get(); 
                            @endphp
                           <tr class="parent-row">
                              <td>@if($user->gender == 'male')
                                 <i class="gender_icon fas fa-male"></i>
                                 @else
                                 <i class="gender_icon fas fa-female"></i>
                                 @endif
                                 &nbsp; {{$user->name}}
                              </td>
                              <td>{{$dob}}</td>
                              <td>{{$user->email}}<br/>{{$user->phone_number}}</td>
                              <td>{{$user->address}}, {{$user->town}}<br/>{{$user->postcode}}, {{$user->country}}</td>

                              <td>
                                @if(count($children)> 0)
                                    <a href="javascript:void(0);" class="btn btn-primary b-child"><i class="fa fa-plus-circle"></i></a>
                                @else
                                    <span class="cst_in-active"><i class="fas fa-times-circle"></i></span>
                                @endif
                              </td>

                              <td>
                                 <div class="btn-group">
                                    <button type="button" class="btn btn-primary">Action</button><button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                                    <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(82px, -64px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <a href="{{url('/admin/family-member/overview')}}/{{$user->id}}" class="dropdown-item">View</a>
                                        <a href="{{ route('ChangePassword',encrypt($user->id)) }}" class="dropdown-item">Change Password</a>
                                    </div>
                                 </div>
                              </td>
                           </tr>
                           <tr class="child-row">
                              <td colspan="6">
                                 <div class="child-container">
                                    <table>
                                       <thead>
                                          <tr>
                                             <th>Name</th>
                                             <th>Person Type</th>
                                             <th>DOB</th>
                                             <th>Address</th>
                                             <th>Action</th>
                                          </tr>
                                       </thead>

                                        @if(count($children)> 0)
                                        @foreach($children as $ch)
                                        @php $dob = date("d-m-Y", strtotime($ch->date_of_birth)); @endphp
                                        <tbody>
                                          <tr>
                                             <td>                                                
                                                @if($ch->gender == 'male')
                                                 <i class="gender_icon fas fa-male"></i>
                                                @else
                                                 <i class="gender_icon fas fa-female"></i>
                                                @endif
                                                &nbsp; {{$ch->first_name}} {{$ch->last_name}}
                                             </td>
                                             <td>{{$ch->type}}</td>
                                             <td>{{$dob}}</td>
                                             <td>{{$ch->address}}, {{$ch->town}}<br/>{{$ch->postcode}}, {{$ch->country}}</td>
                                             <td>
                                                <div class="btn-group">
                                                   <button type="button" class="btn btn-primary">Action</button><button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                                                   <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(82px, -64px, 0px); top: 0px; left: 0px; will-change: transform;"><a href="{{url('admin/family-member/overview')}}/{{$ch->id}}" class="dropdown-item">View</a>
                                                    <a onclick="return confirm('Are you sure you want to delete this child?')" href="{{url('admin/user/delete')}}/{{$ch->id}}" class="dropdown-item">Delete</a>
                                                   </div>
                                                </div>
                                             </td>
                                          </tr>
                                        </tbody>
                                        @endforeach
                                        @endif
                                    </table>
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
<script>
   $('.parent-row .b-child').click(function(){
    $(this).toggleClass('minus');
    $(this).closest('.parent-row').next('.child-row').toggleClass('expanded');
   });

   function myFunction() {
        $("#all_users")[0].click();
    }
</script>
@endsection