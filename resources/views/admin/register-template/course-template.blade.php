@extends('layouts.admin')
@section('content')

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Course Register</h5>
                </div>
                <br/>
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

                        <h5>Course : {{$course->title}}</h5>
                       
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>

@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

<section class="course-detail-table camp-detail-table">
    <div class="container">
        <div class="inner-cont">
            <div class="outer-wrap camp-person-detail">
            <table class="table table-bordered person-detail">
                <thead>
                    <tr>
                        <th>Category:</th>
                        <td>@php echo getProductCatname($course->type); @endphp</td>
                    </tr>
                    <tr>
                        <th>Group:</th>
                        <td>{{$course->age_group}}</td>
                    </tr>

                    <tr>
                        <th>Location:</th>
                        <td>{{$course->location}}</td>
                    </tr><tr>
                          <th>Season:</th>
                        <td>@php echo getSeasonname($course->season); @endphp</td>
                    </tr>

                    <tr>
                          <th>Coach:</th>
                        <td>@php echo getUsername($course->linked_coach); @endphp</td>
                    </tr>
                </thead>
            </table>
            <figure>
                <!-- <img src="http://49.249.236.30:8654/dominic-new/public/uploads/1584078701website_logo.png"> -->
            </figure>
        </div>
            <table class="table table-bordered camp-table">
                <thead>
                    <tr>
                        <th>Player Name</th>
                        <th>Player DOB</th>
                        <th>Med Y/N</th>
                        <th>Parent Name</th>
                        <th>Parent Tel</th>

                        @php 
                            $course_dates = DB::table('course_dates')->where('course_id',$course->id)->get();
                        @endphp

                        @foreach($course_dates as $date)
                            <th class="camp-date">{{$date->course_date}}</th>
                        @endforeach

                        <th>Parent Email</th>

                    </tr>
                </thead>

                <form action="{{route('save_course_reg_dates')}}" method="post">
                @csrf

                <tbody>

                @if(count($shop)>0)
                    @foreach($shop as $sh)

                    @php 
                        $player = DB::table('users')->where('id',$sh->child_id)->first();
                        $parent = DB::table('users')->where('id',$player->parent_id)->first();
                        $child_details = DB::table('children_details')->where('id',$sh->child_id)->first(); 
                    @endphp
                    
                    <input type="hidden" name="course_id" value="{{$course->id}}">
                    

                        <tr>
                            <td class="@if($player->gender == 'male') odd-name-row @elseif($player->gender == 'female') even-name-row @endif">{{isset($player->name) ? $player->name : ''}}</td>
                            <td>{{isset($player->date_of_birth) ? $player->date_of_birth : ''}}</td>
                            <td>@if($child_details['med_cond'] == 'confirm_accurate_no') N @else Y @endif</td>
                            <td>{{isset($parent->name) ? $parent->name : ''}}</td>                      
                            <td>{{isset($parent->phone_number) ? $parent->phone_number : ''}}</td>                        
                            @php 
                                $i=1;
                                $check_date = DB::table('course_register_dates')->where('player_id',$player->id)->where('course_id',$course->id)->where('checked',1)->get();  
                                $selected_date = [];
                            @endphp

                            @if(count($check_date)>0)
                            @foreach($check_date as $da)
                                @php $selected_date[] = $da->course_date; @endphp
                            @endforeach
                            @endif

                            @foreach($course_dates as $date)

                            @if(in_array($date->course_date, $selected_date))
                                <td>
                                    <!-- <input type="hidden" name="course_date[{{$i}}][{{$player->id}}][player_id]" value="{{$player->id}}"> -->
                                    <input type="checkbox" checked="" name="course_date[{{$i}}][{{$player->id}}][date_select]" value="1">
                                    <input type="hidden" name="course_date[{{$i}}][{{$player->id}}][course_date]" value="{{$date->course_date}}">
                                </td>
                            @else
                                <td>
                                    <!-- <input type="hidden" name="course_date[{{$i}}][{{$player->id}}][player_id]" value="{{$player->id}}"> -->
                                    <input type="checkbox" name="course_date[{{$i}}][{{$player->id}}][date_select]" value="1">
                                    <input type="hidden" name="course_date[{{$i}}][{{$player->id}}][course_date]" value="{{$date->course_date}}">
                                </td>
                            @endif
                            @php $i++; @endphp
                            @endforeach
                            <td>{{isset($parent->email) ? $parent->email : ''}}</td>                        
                        </tr>
                    @endforeach
                @endif
                        
                </tbody>
                <button type="submit" class="btn btn-primary">Save</button>
                </form>
            
            </table>
        </div>
        
    </div>
</section>
@endsection