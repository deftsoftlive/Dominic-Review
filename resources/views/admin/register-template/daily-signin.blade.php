@extends('layouts.admin')
@section('content')

<section class="course-detail-table">
    <div class="container">

        <button class="btn btn-primary d-print-none" onClick="window.print()">Print</button>
        <a href="{{url('/admin/register-template/camp')}}/{{$camp->id}}?&week={{ app('request')->input('week') }}" style="float:right;" class="btn btn-primary d-print-none">Go back to full week view</a>
        <a href="{{url('/admin/register-template/camp')}}/{{$camp->id}}?&week=W1" style="float:right;" class="btn btn-primary d-print-none">Back</a>

        <div class="inner-cont">
            <h2>DRH Sports Camp Register</h2>
            <p><b>Came Name</b> - {{$camp->title}}</p>
            <p><b>Camp Location</b> - {{$camp->location}}</p>
            <p><b>Camp Date</b> - {{$camp->camp_date}}</p>
            <br/>
            
            <br/>
            
            <p>Week 1 of 6</p>
            <table class="table table-bordered camp_reg_table">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>

                        @php
                            $camp_price = DB::table('camp_prices')->where('camp_id',$camp->id)->first();
                            $admin_selected = json_decode($camp_price->week); 

                            $week_key = isset($week_value) ? ltrim($week_value, 'W') : '0'; 
                            $week_key_value = $week_key - 1; 

                            $day_filter = Request::get('day'); 
                            $newWeekKeys = [];
                        @endphp

                        @if($week_value == 'W1')
                            @php $key = 0; @endphp
                        @elseif($week_value == 'W2')
                            @php $key = 1; @endphp
                        @elseif($week_value == 'W3')
                            @php $key = 2; @endphp
                        @elseif($week_value == 'W4')
                            @php $key = 3; @endphp
                        @elseif($week_value == 'W5')
                            @php $key = 4; @endphp
                        @elseif($week_value == 'W6')
                            @php $key = 5; @endphp
                        @endif

                        @php //dd($key,1); @endphp

                        @foreach($admin_selected as $keyData=>$sel)
                            @if($keyData == $key)
                                @if($day_filter == 'Monday')
                                    @php $date = $sel->MondayDate; @endphp  
                                @elseif($day_filter == 'Tuesday')
                                    @php $date = $sel->TuesdayDate; @endphp 
                                @elseif($day_filter == 'Wednesday')
                                    @php $date = $sel->WednesdayDate; @endphp 
                                @elseif($day_filter == 'Thursday')
                                    @php $date = $sel->ThursdayDate; @endphp 
                                @elseif($day_filter == 'Friday')
                                    @php $date = $sel->FridayDate; @endphp 
                                @elseif($day_filter == 'Fullweek')
                                    @php $date = $sel->FullweekDate; @endphp 
                                @endif
                            @endif
                        @endforeach
                        <br/>
                        <h5>Date - <b>{{isset($date) ? date('d-m-Y',strtotime($date)) : ''}}</b></h5>
                        <br/>
                        @if(!empty($day_filter))    
                            <th colspan="5"><a href="{{url('admin/register-template/camp')}}/{{$camp->id}}?&week={{$week_value}}&day={{$day_filter}}">{{$day_filter}}</a></th>
                        @else
                            @foreach($admin_selected as $key=>$we)

                                @if($key == $week_key_value)
                                    @if(!empty($we->Monday))
                                        <th colspan="5"><a href="{{url('admin/register-template/camp')}}/{{$camp->id}}?&week={{$week_value}}&day=Monday">Monday</a></th>
                                        @php
                                            array_push($newWeekKeys, 'Monday');
                                        @endphp
                                    @endif
                                    @if(!empty($we->Tuesday))
                                        <th colspan="5"><a href="{{url('admin/register-template/camp')}}/{{$camp->id}}?&week={{$week_value}}&day=Tuesday">Tuesday</a></th>
                                        @php
                                            array_push($newWeekKeys, 'Tuesday');
                                        @endphp
                                    @endif
                                    @if(!empty($we->Wednesday))
                                        <th colspan="5"><a href="{{url('admin/register-template/camp')}}/{{$camp->id}}?&week={{$week_value}}&day=Wednesday">Wednesday</a></th>
                                        @php
                                            array_push($newWeekKeys, 'Wednesday');
                                        @endphp
                                    @endif
                                    @if(!empty($we->Thursday))
                                        <th colspan="5"><a href="{{url('admin/register-template/camp')}}/{{$camp->id}}?&week={{$week_value}}&day=Thursday">Thursday</a></th>
                                        @php
                                            array_push($newWeekKeys, 'Thursday');
                                        @endphp
                                    @endif
                                    @if(!empty($we->Friday))                               
                                        <th colspan="5"><a href="{{url('admin/register-template/camp')}}/{{$camp->id}}?&week={{$week_value}}&day=Friday">Friday</a></th>
                                        @php
                                            array_push($newWeekKeys, 'Friday');
                                        @endphp
                                    @endif
                                    <!-- @if(!empty($we->Fullweek))
                                        <th colspan="5"><a href="{{url('admin/register-template/camp')}}/{{$camp->id}}?&week={{$week_value}}&day=Fullweek">Fullweek</a></th>
                                    @endif -->
                                @endif

                            @endforeach
                        @endif
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Name:</td>
                        <td>Age</td>
                        
                        @if(!empty($day_filter))
                                
                            @php 
                                $newWeekKeys = [ $day_filter ];
                                $headerValue[$day_filter]=1;
                                $session_data = json_decode($camp_price->selected_session);
                                unset($session_data->fullday);
                            @endphp

                                @if(isset($session_data->early_drop) && $session_data->early_drop == 1)
                                    <td class="">ED</td>
                                @endif
                                @if(isset($session_data->morning) && $session_data->morning == 1)
                                    <td class="">AM</td>
                                @endif
                                @if(isset($session_data->lunch) && $session_data->lunch == 1)
                                    <td class="">LC</td>
                                @endif
                                @if(isset($session_data->afernoon) && $session_data->afernoon == 1)
                                    <td class="">PM</td>
                                @endif
                                @if(isset($session_data->fullday) && $session_data->fullday == 1)
                                    <td class="">FD</td>
                                @endif
                                @if(isset($session_data->late_pickup) && $session_data->late_pickup == 1)
                                    <td class="">LS</td>   
                                @endif                    
                                        
                        @else 
                                @foreach($admin_selected as $key=>$we)

                                    @if($key == $week_key_value)

                                        @php $weekValue=['Monday','Tuesday','Wednesday','Thursday','Friday'];@endphp

                                        @foreach($weekValue as $weekDays)
                                            @if(!empty($we->$weekDays))

                                                @php 
                                                    $headerValue[$weekDays]=1;  
                                                @endphp

                                                @if(isset($session_data->early_drop) && $session_data->early_drop == 1)
                                                    <td class="">ED</td>
                                                @endif
                                                @if(isset($session_data->morning) && $session_data->morning == 1)
                                                    <td class="">AM</td>
                                                @endif
                                                @if(isset($session_data->lunch) && $session_data->lunch == 1)
                                                    <td class="">LC</td>
                                                @endif
                                                @if(isset($session_data->afernoon) && $session_data->afernoon == 1)
                                                    <td class="">PM</td>
                                                @endif
                                                @if(isset($session_data->fullday) && $session_data->fullday == 1)
                                                    <td class="">FD</td>
                                                @endif
                                                @if(isset($session_data->late_pickup) && $session_data->late_pickup == 1)
                                                    <td class="">LS</td>   
                                                @endif 
                               
                                            @endif
                                        @endforeach 

                                    @endif

                                @endforeach
                        @endif

                        <td>Sign In</td>
                        <td>Time</td>
                        <td>Sign Out</td>
                        <td>Time</td>

                       <!--  <td>Dob</td>
                        <td> Parent</td>
                        <td>Contact</td>
                        <td> Med</td>
                        <td>Photos</td>
                        <td>Email</td> -->
                    </tr>
                        @php  
                            $camp_we = []; 
                            $userSelectedDataByWeek=[];       
                            //dd($shop);                      
                        @endphp
                   
                             @foreach($shop as $sh)

                                @php 
                                    $player = DB::table('users')->where('id',$sh->child_id)->first(); 
                                    $child_details = DB::table('children_details')->where('id',$sh->child_id)->first();
                                    $user_selected = json_decode($sh->week);   
                                    $playerId = isset($player->id)?$player->id:0;
                                @endphp                              

                                @foreach($user_selected as $week=>$selected_Type)   
                                    @foreach($selected_Type as $selected_Type_Data=>$dayData)
                                        @foreach($dayData as $day=>$day_value)
                                                
                                                @if($selected_Type_Data=="camp")

                                                    @php   
                                                       
                                                        $check_selected_value =explode('-',$day_value);
                                                        $check_selected_value =$check_selected_value[2];
                                                       
                                                        if($check_selected_value=="noon"){
                                                            $userSelectedDataByWeek[$playerId][$week][$day]["noon"]=1; 
                                                        }else if($check_selected_value=="mor"){
                                                            $userSelectedDataByWeek[$playerId][$week][$day]["mor"]=1; 
                                                        }else{
                                                            $userSelectedDataByWeek[$playerId][$week][$day]["full"]=1; 
                                                        }

                                                     continue;

                                                    @endphp                                                          
                                                
                                                @endif

                                                @php
                                                $userSelectedDataByWeek[$playerId][$week][$day][$selected_Type_Data]=1;        
                                                @endphp
                                        @endforeach
                                    @endforeach                        
                                @endforeach
                              @endforeach
                               <!-- Code bb SB Starts Here-->
                               <!-- Modifications for Full Day Functionality -->
                                
                                @foreach( $userSelectedDataByWeek as $keyId => $newData)
                                    @foreach( $newData as $keyh => $newDat)
                                                @php 
                                                    //echo $keyh;

                                                @endphp
                                        @foreach( $newDat as $keyold => $newDa)
                                            @php 
                                                    //echo $keyold;
                                                    //print_r($newDat);

                                                @endphp
                                            @if ((strcmp("Fullweek",$keyold)) == 0)
                                                
                                                @foreach( $newDat as $kkkk => $kData)
                                                    @if ((strcmp("Fullweek",$kkkk)) != 0)
                                                        @php 
                                                        //print_r($userSelectedDataByWeek[$keyId][$keyh]);
                                                            $userSelectedDataByWeek[$keyId][$keyh][$kkkk] = array_merge($userSelectedDataByWeek[$keyId][$keyh][$kkkk],$newDat["Fullweek"]);
                                                            $newDat[$kkkk]=array_merge($newDat[$kkkk],$newDat["Fullweek"]);
                                                            //echo $kkkk;
                                                            //print_r($newDat);
                                                            //echo "modified";
                                                            //print_r($userSelectedDataByWeek[$keyId][$keyh]);
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                @foreach( $newWeekKeys as $newKeyForfullweek )
                                                    @php 
                                                        $userSelectedDataByWeek[$keyId][$keyh][$newKeyForfullweek] = $newDat["Fullweek"];                                                   
                                                    @endphp
                                                    @if(array_key_exists ( $newKeyForfullweek , $newDat ))
                                                    @else
                                                        @php 
                                                            $newDat[$newKeyForfullweek]=$newDat["Fullweek"];
                                                        @endphp
                                                    @endif
                                                @endforeach
                                            @endif  
                                        @endforeach
                                            @php 
                                                unset($newDat['Fullweek']);
                                                unset($userSelectedDataByWeek[$keyId][$keyh]['Fullweek']);
                                                //print_r($userSelectedDataByWeek);
                                            @endphp
                                        @foreach( $newDat as $keyold => $newDa)                                 
                                            @foreach( $newDa as $key => $newD)
                                                @if ((strcmp("full",$key)) == 0)
                                                    @php 
                                                        $userSelectedDataByWeek[$keyId][$keyh][$keyold]["noon"]=1; 
                                                        $userSelectedDataByWeek[$keyId][$keyh][$keyold]["mor"]=1;                                               
                                                        $userSelectedDataByWeek[$keyId][$keyh][$keyold]["lunch"]=1;

                                                    @endphp                                             
                                                @endif                                              
                                                @php 
                                                    unset($newDa['full']);
                                                    unset($userSelectedDataByWeek[$keyId][$keyh][$keyold]["full"]);
                                                    //print_r($userSelectedDataByWeek);
                                                @endphp                                     
                                            @endforeach 
                                        @endforeach                                 
                                    @endforeach
                                @endforeach 
                                @php 
                                    //print_r($userSelectedDataByWeek);
                                @endphp 
                                <!-- Code by SB  ends here-->


                    @foreach($shop1 as $sh)

                    @php 
                        $player = DB::table('users')->where('id',$sh->child_id)->first(); 
                        $child_details = DB::table('children_details')->where('id',$sh->child_id)->first();
                        $user_selected = json_decode($sh->week);   
                         $playerId = isset($player->id)?$player->id:0;
                    @endphp

                    @if($player != '')
                        @php 
                           
                            $parent = DB::table('users')->where('id',$player->parent_id)->first();
                            $user_age = strtotime($player->date_of_birth);
                            $current_date1 = strtotime(date('Y-m-d')); 
                            $user_diff = abs($current_date1 - $user_age);
                            $years1 = floor($user_diff / (365*60*60*24));   
                        @endphp

                    @endif

                                     
                    <tr>
                        <td class="@if(!empty($player) && $player->gender == 'male') odd-name-row @elseif(!empty($player) && $player->gender == 'female') even-name-row @endif">{{isset($player->name) ? $player->name : ''}}</td>
                        <td>{{isset($years1) ? $years1 : ''}}</td>
                        
                        @if(!empty($headerValue))
                        @foreach($headerValue as $currentday=>$currentdaySelected)
                            @php 
                            $listOfHeaderItem=['early_drop','mor','lunch','noon','late_pickup'];

                            @endphp

                            @foreach($listOfHeaderItem as $headItem)
                            
                            @php 
                                $week_data = isset($week_value) ? $week_value : 'W1'; 
                                $week_value = ''.$week_data.''; 
                            @endphp

                            @if(isset($session_data->early_drop) && $session_data->early_drop == 1 && $headItem == 'early_drop')
                                @if(isset($userSelectedDataByWeek[$playerId][$week_value][$currentday][$headItem]))
                                <td style="text-align: center;">X</td>
                                @else
                                <td></td>
                                @endif  
                            @endif

                            @if(isset($session_data->lunch) && $session_data->lunch == 1 && $headItem == 'lunch')
                                @if(isset($userSelectedDataByWeek[$playerId][$week_value][$currentday][$headItem]))
                                <td style="text-align: center;">X</td>
                                @else
                                <td></td>
                                @endif  
                            @endif

                            @if(isset($session_data->afernoon) && $session_data->afernoon == 1 && $headItem == 'noon')
                                @if(isset($userSelectedDataByWeek[$playerId][$week_value][$currentday][$headItem]))
                                <td style="text-align: center;">X</td>
                                @else
                                <td></td>
                                @endif  
                            @endif
                            
                            @if(isset($session_data->late_pickup) && $session_data->late_pickup == 1 && $headItem == 'late_pickup')
                                @if(isset($userSelectedDataByWeek[$playerId][$week_value][$currentday][$headItem]))
                                <td style="text-align: center;">X</td>
                                @else
                                <td></td>
                                @endif  
                            @endif

                            @if(isset($session_data->morning) && $session_data->morning == 1 && $headItem == 'mor')
                                @if(isset($userSelectedDataByWeek[$playerId][$week_value][$currentday][$headItem]))
                                <td style="text-align: center;">X</td>
                                @else
                                <td></td>
                                @endif  
                            @endif

                            <!-- @if(isset($session_data->fullday) && $session_data->fullday == 1 && $headItem == 'full')
                                @if(isset($userSelectedDataByWeek[$playerId][$week_value][$currentday][$headItem]))
                                <td style="text-align: center;">X</td>
                                @else
                                <td></td>
                                @endif  
                            @endif -->
                            
                            @endforeach

                        @endforeach
                        @endif

                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                             
                       <!--  <td>{{isset($player->date_of_birth) ? date('d/m/Y',strtotime($player->date_of_birth)) : ''}}</td>
                        <td>{{!empty($parent) ? $parent->name : ''}}</td>
                        <td>{{!empty($parent) ? $parent->phone_number : ''}}</td>
                        <td>@if($child_details['med_cond'] == 'confirm_accurate_no') N @else Y @endif</td>
                        <td>@if(!empty($player->profile_image)) Y @else N @endif</td>
                        <td>{{!empty($parent) ? $parent->email : ''}}</td> -->
                    </tr>

                    @endforeach
                   
                </tbody>
            </table>


        </div>
        <div class="medical-info">
           <!--  <p>Medical Info:</p>
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
                            $medical_conditions = DB::table('child_medicals')->where('child_id',$sh->child_id)->get();
                        @endphp

                        @if(!empty($child_details->med_cond_info))
                        <tr>
                            <td>{{isset($player->name) ? $player->name : ''}}</td>
                            <td>
                                @if(!empty($child_details->med_cond_info)) 
                                    @php $conditions = []; @endphp

                                    @if(isset($medical_conditions))
                                        @foreach($medical_conditions as $cond)
                                           @php $conditions[] = $cond->medical; @endphp
                                        @endforeach
                                    @endif

                                    @if(isset($conditions))
                                        @php $cond = implode(' , ',$conditions); @endphp
                                        {{$cond}}
                                    @endif
                                @else 
                                    -  
                                @endif</td>
                        </tr>
                        @else
                        @endif
                    @endforeach

                </tbody>
            </table>

            <br/> -->
            <table class="week-dtl d-print-none">
                <tbody>
                    <tr>

                    @if(!empty($day_filter))
                        @foreach($admin_selected as $key=>$we)

                                @if($key == $week_key_value)
                                    @if(!empty($we->Monday))
                                        <th colspan="5"><a href="{{url('admin/register-template/camp')}}/{{$camp->id}}?&week={{$week_value}}&day=Monday">Monday</a></th>
                                    @endif
                                    @if(!empty($we->Tuesday))
                                        <th colspan="5"><a href="{{url('admin/register-template/camp')}}/{{$camp->id}}?&week={{$week_value}}&day=Tuesday">Tuesday &nbsp;&nbsp;&nbsp;</a></th>
                                    @endif
                                    @if(!empty($we->Wednesday))
                                        <th colspan="5"><a href="{{url('admin/register-template/camp')}}/{{$camp->id}}?&week={{$week_value}}&day=Wednesday">Wednesday &nbsp;&nbsp;&nbsp;</a></th>
                                    @endif
                                    @if(!empty($we->Thursday))
                                        <th colspan="5"><a href="{{url('admin/register-template/camp')}}/{{$camp->id}}?&week={{$week_value}}&day=Thursday">Thursday &nbsp;&nbsp;&nbsp;</a></th>
                                    @endif
                                    @if(!empty($we->Friday))                               
                                        <th colspan="5"><a href="{{url('admin/register-template/camp')}}/{{$camp->id}}?&week={{$week_value}}&day=Friday">Friday &nbsp;&nbsp;&nbsp;</a></th>
                                    @endif
                                    <!-- @if(!empty($we->Fullweek))
                                        <th colspan="5"><a href="{{url('admin/register-template/camp')}}/{{$camp->id}}?&week={{$week_value}}&day=Fullweek">Fullweek</a></th>
                                    @endif -->
                                @endif

                            @endforeach
                    @else
                      <td><a class="d-print-none" href="{{url('/admin/register-template/camp')}}/{{$camp->id}}?week=W1">Display Camp Week 1</a></td>
                      <td><a class="d-print-none" href="{{url('/admin/register-template/camp')}}/{{$camp->id}}?week=W2">Display Camp Week 2</a></td>
                      <td><a class="d-print-none" href="{{url('/admin/register-template/camp')}}/{{$camp->id}}?week=W3">Display Camp Week 3</a></td>
                      <td><a class="d-print-none" href="{{url('/admin/register-template/camp')}}/{{$camp->id}}?week=W4">Display Camp Week 4</a></td>
                      <td><a class="d-print-none" href="{{url('/admin/register-template/camp')}}/{{$camp->id}}?week=W5">Display Camp Week 5</a></td>
                      <td><a class="d-print-none" href="{{url('/admin/register-template/camp')}}/{{$camp->id}}?week=W6">Display Camp Week 6</a></td>
                    @endif  

                    </tr>
                    <tr>
                        <td><a class="d-print-none" href="{{url('admin/camp')}}">List of Camps</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection