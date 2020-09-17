@extends('layouts.admin')
@section('content')
<section class="course-detail-table">
    <div class="container">
        <div class="inner-cont">
            <h2>DRHSports.co.uk Camp Register</h2>
            <h4>{{$camp->title}} @ {{$camp->location}} - {{$camp->term}}</h4>
            <br/>

            <button style="float:right;" class="btn btn-primary" onClick="window.print()">Print</button>
            <br/>
            
            <p>Week 1 of 6</p>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>

                        @php
                            $camp_price = DB::table('camp_prices')->where('camp_id',$camp->id)->first();
                            $admin_selected = json_decode($camp_price->week); 
                        @endphp

                        @foreach($admin_selected as $key=>$we)

                            @if($key == 0)
                                @if(!empty($we->Monday))
                                    <th colspan="6"><a href="{{url('admin/register-template/camp')}}/{{$camp->id}}?day=Monday">Monday</a></th>
                                @endif
                                @if(!empty($we->Tuesday))
                                    <th colspan="6"><a href="{{url('admin/register-template/camp')}}/{{$camp->id}}?day=Tuesday">Tuesday</a></th>
                                @endif
                                @if(!empty($we->Wednesday))
                                    <th colspan="6"><a href="{{url('admin/register-template/camp')}}/{{$camp->id}}?day=Wednesday">Wednesday</a></th>
                                @endif
                                @if(!empty($we->Thursday))
                                    <th colspan="6"><a href="{{url('admin/register-template/camp')}}/{{$camp->id}}?day=Thursday">Thursday</a></th>
                                @endif
                                @if(!empty($we->Friday))                               
                                    <th colspan="6"><a href="{{url('admin/register-template/camp')}}/{{$camp->id}}?day=Friday">Friday</a></th>
                                @endif
                                @if(!empty($we->Fullweek))
                                    <th colspan="6"><a href="{{url('admin/register-template/camp')}}/{{$camp->id}}?day=Fullweek">Fullweek</a></th>
                                @endif
                            @endif

                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Name:</td>
                        <td>Age</td>

                        @foreach($admin_selected as $key=>$we)

                            @if($key == 0)
                                @php $weekValue=['Monday','Tuesday','Wednesday','Thursday','Friday','Fullweek'];@endphp
                                @foreach($weekValue as $weekDays)
                               @if(!empty($we->$weekDays))
                                    @php
                                    $headerValue[$weekDays]=1;
                                    @endphp
                                    <td class="">ED</td>
                                    <td class="">AM</td>
                                    <td class="">LC</td>
                                    <td class="">PM</td>
                                    <td class="">FD</td>
                                    <td class="">LS</td> 
                       
                                   @endif
                                @endforeach
                              

                            @endif

                        @endforeach

                        <td>Dob</td>
                        <td> Parent</td>
                        <td>Contact</td>
                        <td> Med</td>
                        <td>Photos</td>
                        <td>Email</td>
                    </tr>
                        @php  
                            $camp_we = []; 
                            $userSelectedDataByWeek=[];       
                          //  dd($shop);                      
                        @endphp
                            
                        

                       
                    @foreach($shop as $sh)
                    @php 
                        $player = DB::table('users')->where('id',$sh->child_id)->first();
                        $parent = DB::table('users')->where('id',$player->parent_id)->first();
                        $child_details = DB::table('children_details')->where('id',$sh->child_id)->first();

                        $user_age = strtotime($player->date_of_birth);
                        $current_date1 = strtotime(date('Y-m-d')); 
                        $user_diff = abs($current_date1 - $user_age);
                        $years1 = floor($user_diff / (365*60*60*24));

                        $user_selected = json_decode($sh->week); 
                    @endphp

                    @foreach($user_selected as $week=>$selected_Type)   
                           @foreach($selected_Type as $selected_Type_Data=>$dayData)
                               @foreach($dayData as $day=>$day_value)
                                        
                                        @if($selected_Type_Data=="camp")
                                            @php   
                                                
                                                $check_selected_value =explode('-',$day_value);
                                                $check_selected_value =$check_selected_value[2];
                                                if($check_selected_value=="noon"){
                                                    $userSelectedDataByWeek[$week][$day]["noon"]=1; 
                                                }else if($check_selected_value=="mor"){
                                                    $userSelectedDataByWeek[$week][$day]["mor"]=1; 
                                                }else{
                                                    $userSelectedDataByWeek[$week][$day]["full"]=1; 
                                                }

                                             continue;

                                            @endphp

                                             @php //dd($user_selected,$selected_Type_Data,$dayData);                       @endphp             
                                        
                                        @endif

                                        @php
                                             

                                        $userSelectedDataByWeek[$week][$day][$selected_Type_Data]=1;        
                                        @endphp
                                 @endforeach
                             @endforeach                        
                        @endforeach
                    
                    <tr>
                        <td class="@if($player->gender == 'male') odd-name-row @elseif($player->gender == 'female') even-name-row @endif">{{$player->name}}</td>
                        <td>{{$years1}}</td>
                        
                        @foreach($headerValue as $currentday=>$currentdaySelected)
                            @php 
                            $listOfHeaderItem=['early_drop','mor','lunch','noon','full','late_pickup'];

                            @endphp

                            @foreach($listOfHeaderItem as $headItem)
                            
                            <?php 
                                $week_data = isset($week_value) ? $week_value : 'W1'; 
                                $week_value = ''.$week_data.''; 
                            ?>

                            @if(isset($userSelectedDataByWeek[$week_value][$currentday][$headItem]))
                            <td>*</td>
                            @else
                            <td></td>
                            @endif
                            


                            @endforeach

                        @endforeach
                             
                        <td>{{$player->date_of_birth}}</td>
                        <td>{{$parent->name}}</td>
                        <td>{{$parent->phone_number}}</td>
                        <td>@if($child_details['med_cond'] == 'confirm_accurate_no') N @else Y @endif</td>
                        <td>@if(!empty($player->profile_image)) Y @else N @endif</td>
                        <td>{{$parent->email}}</td>
                    </tr>

                    @endforeach
                </tbody>
            </table>


        </div>
        <div class="medical-info">
            <p>Medical Info:</p>
            <table class="table  medical-info-table">
                <thead>
                    <tr>
                        <th scope="col">Name:</th>
                        <th scope="col">Info:</th>
                </thead>
                <tbody>
                    @foreach($shop as $sh)
                        @php 
                            $player = DB::table('users')->where('id',$sh->child_id)->first();   
                            $child_details = DB::table('children_details')->where('child_id',$sh->child_id)->first(); 
                        @endphp

                        @if(!empty($child_details->med_cond_info))
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
                        @endif
                    @endforeach

                </tbody>
            </table>

            <br/>
            <table class="week-dtl">
                <tbody>
                    <tr>
                      <td><a href="{{url('/admin/register-template/camp')}}/{{$camp->id}}?week=W1">Display Camp Week 1</a></td>
                      <td><a href="{{url('/admin/register-template/camp')}}/{{$camp->id}}?week=W2">Display Camp Week 2</a></td>
                      <td><a href="{{url('/admin/register-template/camp')}}/{{$camp->id}}?week=W3">Display Camp Week 3</a></td>
                      <td><a href="{{url('/admin/register-template/camp')}}/{{$camp->id}}?week=W4">Display Camp Week 4</a></td>
                      <td><a href="{{url('/admin/register-template/camp')}}/{{$camp->id}}?week=W5">Display Camp Week 5</a></td>
                      <td><a href="{{url('/admin/register-template/camp')}}/{{$camp->id}}?week=W6">Display Camp Week 6</a></td>
                    </tr>
                    <tr>
                        <td><a href="{{url('admin/camp')}}">List of Camps</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection