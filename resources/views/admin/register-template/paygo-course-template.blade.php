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
        <div class="inner-cont  paygo_inner-cont">
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
        </div>
            <p> 
                <b>
                @php $thisDate = \App\PaygocourseDate::where('id',$date)->first(); @endphp
                Viewing Register: </b> {{ date('d-m-Y', strtotime( $thisDate->course_date ) ) }}
                    
                
            </p>
            <table class="table table-bordered camp-table">
                <thead>
                    <tr>
                        <th>Player Name</th>
                        <th>Player DOB</th>
                        <th>Media</th>
                        <th>Mem Price</th>
                        <th>Member</th>
                        <!-- <th>Contact Name</th> -->
                        <!-- <th>Contact Tel</th> -->

                        @php 
                            $course_dates = \App\PaygocourseDate::where('course_id',$course->id)->get();
                        @endphp

                        <!-- @foreach($course_dates as $date)
                            <th class="camp-date">@php echo date('d/m',strtotime($date->course_date)); @endphp</th>
                        @endforeach -->

                        <!-- <th>Contact Email</th> -->

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
                        //dd($child_details);
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

                            



                            <!-- <td>{{isset($parent->email) ? $parent->email : $player->email}}</td>  -->

                            @php
                                $contact1_details = \App\ChildContact::where('child_id',$sh->child_id)->first();
                            @endphp                      
                            <td>{{ !empty($contact1_details->first_name) ? $contact1_details->first_name : "N/A" }} {{ !empty($contact1_details->surname) ? $contact1_details->surname : "" }}</td>                        
                            <td>{{ !empty($contact1_details->phone) ? $contact1_details->phone : "N/A" }}</td>                        
                            <td>{{ !empty($contact1_details->email) ? $contact1_details->email : "N/A" }}</td>                        
                            <td>{{ !empty($contact1_details->relationship) ? $contact1_details->relationship : "N/A" }}</td>                      
                        </tr>
                        
                    @endforeach
                @endif


                        
                </tbody>
                <!-- <button type="submit" class="btn btn-primary d-print-none">Save</button> -->

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
                @if(count($shop1)>0)
                <tbody>
                    @foreach($shop1 as $sha)
                        @php 

                            $child_id = $sha->child_id;
                            $player = DB::table('users')->where('id',$child_id)->first();  
                            $child_details = DB::table('children_details')->where('child_id',$child_id)->first();
                            $medicals = DB::table('child_medicals')->where('child_id',$child_id)->get();
                            //dd($medicals);    
                            $med_cond = [];
                        @endphp

                        <tr>
                            @if(!empty($child_details->med_cond) && $child_details->med_cond == 'yes')
                                @if(count($medicals)>0)
                                    @foreach($medicals as $med)
                                        @php $med_cond[] = $med->medical; 

                            
                                        @endphp

			                        @endforeach
                                    @php $medical_conditions = implode(', ',$med_cond); @endphp

                                    <td> {{isset($player->name) ? $player->name : ''}}</td>
                                    <td>{{isset($medical_conditions) ? $medical_conditions : ''}}</td>
			                    @else
			                    	
			                    @endif 
			                @endif   
		                </tr>



                    @endforeach

                </tbody>
                @endif
            </table> </br>
            <br/>
            <table class="week-dtl d-print-none">
                <tbody>
                    <tr>
                    @foreach($course_dates as $dat)

                    <td><a class="d-print-none" href="{{route('admin.register.paygo-course', ['id' => $course->id, 'date'=> $dat->id])}}">Display {{ date('d-m-Y', strtotime( $dat->course_date ) ) }}</a></td>
                    @endforeach                    

                    </tr>
                    <tr>
                        <td><a class="d-print-none" href="{{ route( 'admin.pay.go.course.list' ) }}">List of Pay As You Go Courses</a></td>
                    </tr>
                </tbody>
            </table>

        </div>

    </div>
</section>
@endsection