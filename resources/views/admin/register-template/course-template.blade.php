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
                        <th>Med</th>
                        <th>Parent Name</th>
                        <th>Parent Tel</th>

                        @php 
                            $course_dates = DB::table('course_dates')->where('course_id',$course->id)->get();
                        @endphp

                        @foreach($course_dates as $date)
                            <th class="camp-date">@php echo date('d/m',strtotime($date->course_date)); @endphp</th>
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
                        $child_details = DB::table('children_details')->where('id',$sh->child_id)->first();
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
                            <td>@if($child_details['med_cond'] == 'confirm_accurate_no') N @else Y @endif</td>
                            <td>{{isset($parent->name) ? $parent->name : ''}}</td>                      
                            <td>{{isset($parent->phone_number) ? $parent->phone_number : ''}}</td>     

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
                            <td>{{isset($parent->email) ? $parent->email : ''}}</td>                        
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

			                        <td>{{$player->name}}</td>
			                        <td>{{$medical_conditions}}</td>
			                    @else
			                    	
			                    @endif 
			                @endif   
		                </tr>

                   <!--      @if(!empty($child_details->med_cond_info))
                        <tr>
                            <td>{{$player->name}}</td>
                            <td>@if(!empty($child_details->med_cond_info)) 
                                    @php 
                                        $med_cond = json_decode($child_details->med_cond_info);
                                        $conditions = [];
                                    @endphp

                                    @foreach($med_cond as $cond)
                                       @php $conditions[] = $cond; @endphp
                                    @endforeach

                                    @php $cond = implode(' , ',$conditions); @endphp
                                    {{$cond}}
                                @else 
                                    -  
                                @endif</td>
                        </tr>
                        @else
                        @endif -->
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
</section>
@endsection