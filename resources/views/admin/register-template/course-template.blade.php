@extends('layouts.admin')
@section('content')

<style>
td.checkbox_course {
    text-align: center;
}
</style>

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">

                <img height="70px;" width="120px;" src="{{url('')}}/public/images/pdf-logo.png">

            
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

                        <button id="print_course" class="btn btn-primary d-print-none">Print</button>
                       
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
                    </tr>

                    <tr>
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
            </figure>
        </div>
            <table class="table table-bordered camp-table">
                <thead>
                    <tr>
                        <th>Player Name</th>
                        <th>Player DOB</th>
                        <th>Media</th>
                        <th>Mem Price</th>
                        <th>Member</th>
                        <!-- <th>Parent Name</th> -->
                        <!-- <th>Parent Tel</th> -->

                        @php 
                            $course_dates = DB::table('course_dates')->where('course_id',$course->id)->get();
                        @endphp

                        @foreach($course_dates as $date)
                            <th class="camp-date">@php echo date('d/m',strtotime($date->course_date)); @endphp</th>
                        @endforeach

                        <!-- <th>Parent Email</th> -->

                        <th>Contact 1 Name</th>
                        <th>Contact 1 Tel</th>
                        <th>Contact 1 Email</th>
                        <th>Relation</th>

                    </tr>
                </thead>

                <form action="{{route('save_course_reg_dates')}}" method="post">
                @csrf

                <tbody>

                @if(count($shop)>0)
                    @foreach($shop as $sh)

                    @php 
                        $player = DB::table('users')->where('id',$sh->child_id)->first();  
                        $child_details = DB::table('children_details')->where('child_id',$sh->child_id)->first();
                    @endphp

                    @if(!empty($player))
                    @php 
                        $parent = DB::table('users')->where('id',$player->parent_id)->first();
                    @endphp
                    @endif
                    
                    <input type="hidden" name="course_id" value="{{$course->id}}">
                    
                        <tr>
                            <td class="@if(!empty($player)) @if($player->gender == 'male') odd-name-row @elseif($player->gender == 'female') even-name-row @endif @endif"> {{isset($player->name) ? $player->name : ''}}</td>
                            <td>@if(isset($player->date_of_birth)) @php echo date('d/m/Y',strtotime($player->date_of_birth)); @endphp @endif</td>
                            <td style="text-align:center;">@if(!empty($child_details->media) && ($child_details->media == 'yes')) Y @else N @endif</td>

                                @if($sh->membership_status == 1 && $sh->membership_price > 0)
                                    <td> Yes </td>                                
                                @elseif($sh->membership_status == 0 && $sh->membership_price > 0)
                                    <td> No </td>
                                @else
                                    <td> N/A </td>
                                @endif

                                @if($sh->membership_status == 1 && $sh->membership_price == null)
                                    <td> Yes </td>
                                @elseif($sh->membership_status == 0 && $sh->membership_price == null)
                                    <td> No </td>
                                @else
                                    <td> N/A </td>                                
                                @endif

                            <!-- <td>{{isset($parent->name) ? $parent->name : $player->name}}</td>                       -->
                            <!-- <td>{{isset($parent->phone_number) ? $parent->phone_number : $player->phone_number}}</td>      -->

                            @if(!empty($player))                   
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
                                <td class="checkbox_course">
                                    <!-- <input type="hidden" name="course_date[{{$i}}][{{$player->id}}][player_id]" value="{{$player->id}}"> -->
                                    <input type="checkbox" checked="" name="course_date[{{$i}}][{{$player->id}}][date_select]" value="1">
                                    <input type="hidden" name="course_date[{{$i}}][{{$player->id}}][course_date]" value="{{$date->course_date}}">
                                </td>
                            @else
                                <td class="checkbox_course">
                                    <!-- <input type="hidden" name="course_date[{{$i}}][{{$player->id}}][player_id]" value="{{$player->id}}"> -->
                                    <input type="checkbox" name="course_date[{{$i}}][{{$player->id}}][date_select]" value="1">
                                    <input type="hidden" name="course_date[{{$i}}][{{$player->id}}][course_date]" value="{{$date->course_date}}">
                                </td>
                            @endif
                            @php $i++; @endphp
                            @endforeach
                            <!-- <td>{{isset($parent->email) ? $parent->email : $player->email}}</td>   -->

                            @php
                                $contact1_details = \App\ChildContact::where('child_id',$sh->child_id)->first();
                            @endphp                      
                            <td>{{ !empty($contact1_details->first_name) ? $contact1_details->first_name : "N/A" }} {{ !empty($contact1_details->surname) ? $contact1_details->surname : "" }}</td>                        
                            <td>{{ !empty($contact1_details->phone) ? $contact1_details->phone : "N/A" }}</td>                        
                            <td>{{ !empty($contact1_details->email) ? $contact1_details->email : "N/A" }}</td>                        
                            <td>{{ !empty($contact1_details->relationship) ? $contact1_details->relationship : "N/A" }}</td>
                        </tr>
                        @endif
                    @endforeach
                @endif


                        
                </tbody>
                <button type="submit" class="btn btn-primary d-print-none">Save</button>

                </form>
            
            </table>
        </div>
        
<br/><br/>

         <div class="medical-info">
            <p>Medical Info:</p>
            <table class="table  medical-info-table">
                <thead>
                    <tr>
                        <th scope="col">Name:</th>
                        <th scope="col">Info:</th>
                </thead>
                <tbody>
                    @foreach($shop1 as $sh)
                        @php 
                            $player = DB::table('users')->where('id',$sh->child_id)->first();   
                            $child_details = DB::table('children_details')->where('child_id',$sh->child_id)->first();
                            $medicals = DB::table('child_medicals')->where('child_id',$sh->child_id)->get();	
                            $med_cond = [];
                        @endphp

	                    <tr>
	                    	@if(!empty($child_details->med_cond) && $child_details->med_cond == 'yes')
		                        @if(count($medicals)>0)
			                        @foreach($medicals as $med)
			                        	@php $med_cond[] = $med->medical; @endphp
			                        @endforeach

			                        @php $medical_conditions = implode(', ',$med_cond); @endphp

			                        <td>{{isset($player->name) ? $player->name : ''}}</td>
			                        <td>{{isset($medical_conditions) ? $medical_conditions : ''}}</td>
			                    @else
			                    	
			                    @endif 
			                @endif   
		                </tr>



                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
</section>
@endsection