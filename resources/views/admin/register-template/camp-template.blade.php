@extends('layouts.admin')
@section('content')
<section class="course-detail-table">
    <div class="container">
        <div class="inner-cont">
            <h2>DRHSports.co.uk Camp Register</h2>
            <h4>{{$camp->title}} @ {{$camp->location}} - {{$camp->term}}</h4>
            <br/>

            <a style="float:right;" class="btn btn-primary" href="{{url('admin/register-template/camp')}}/{{$camp->id}}">Reset</a>
            <br/>
            
            <p>Week 1 of 6</p>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>

                        @if($day == 'Monday')
                            <th colspan="6"><a href="{{url('admin/register-template/camp')}}/{{$camp->id}}?day=Monday">Monday</a></th>
                        @elseif($day == 'Tuesday')
                            <th colspan="6"><a href="{{url('admin/register-template/camp')}}/{{$camp->id}}?day=Tuesday">Tuesday</a></th>
                        @elseif($day == 'Wednesday')
                            <th colspan="6"><a href="{{url('admin/register-template/camp')}}/{{$camp->id}}?day=Wednesday">Wednesday</a></th>
                        @elseif($day == 'Thursday')
                            <th colspan="6"><a href="{{url('admin/register-template/camp')}}/{{$camp->id}}?day=Thursday">Thursday</a></th>
                        @elseif($day == 'Friday')
                            <th colspan="6"><a href="{{url('admin/register-template/camp')}}/{{$camp->id}}?day=Friday">Friday</a></th>
                        @elseif($day == 'Fullweek')
                            <th colspan="6"><a href="{{url('admin/register-template/camp')}}/{{$camp->id}}?day=Fullweek">Fullweek</a></th>
                        @else
                            <th colspan="6"><a href="{{url('admin/register-template/camp')}}/{{$camp->id}}?day=Monday">Monday</a></th>
                            <th colspan="6"><a href="{{url('admin/register-template/camp')}}/{{$camp->id}}?day=Tuesday">Tuesday</a></th>
                            <th colspan="6"><a href="{{url('admin/register-template/camp')}}/{{$camp->id}}?day=Wednesday">Wednesday</a></th>
                            <th colspan="6"><a href="{{url('admin/register-template/camp')}}/{{$camp->id}}?day=Thursday">Thursday</a></th>
                            <th colspan="6"><a href="{{url('admin/register-template/camp')}}/{{$camp->id}}?day=Friday">Friday</a></th>
                            <th colspan="6"><a href="{{url('admin/register-template/camp')}}/{{$camp->id}}?day=Fullweek">Fullweek</a></th>
                        @endif

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Name:</td>
                        <td>Age</td>

                        @php  

                        $weeks=[
                        'Monday'=>'Monday',
                        'Tuesday'=>'Tuesday',
                        'Wednesday'=>'Wednesday',
                        'Thursday'=>'Thursday',
                        'Friday'=>'Friday',
                        'Fullweek'=>'Fullweek'
                        ]; 

                        @endphp

                        @foreach($weeks as $weekDays=>$weekDaysValue)
                            <td class="{{$weekDays}}-early">ED</td>
                            <td class="{{$weekDays}}-mor">AM</td>
                            <td class="{{$weekDays}}-lunch">LC</td>
                            <td class="{{$weekDays}}-noon">PM</td>
                            <td class="{{$weekDays}}-full">FD</td>
                            <td class="{{$weekDays}}-late">LS</td>                          
                        @endforeach

                        <td>Dob</td>
                        <td> Parent</td>
                        <td>Contact</td>
                        <td> Med</td>
                        <td>Photos</td>
                        <td>Email</td>
                    </tr>
                
                    @foreach($shop as $sh)
                    @php 
                        $player = DB::table('users')->where('id',$sh->child_id)->first();
                        $parent = DB::table('users')->where('id',$player->parent_id)->first();
                        $child_details = DB::table('children_details')->where('id',$sh->child_id)->first();

                        $user_age = strtotime($player->date_of_birth);
                        $current_date1 = strtotime(date('Y-m-d')); 
                        $user_diff = abs($current_date1 - $user_age);
                        $years1 = floor($user_diff / (365*60*60*24));

                        $week = json_decode($sh->week); 
                    @endphp

                    <tr>
                        <td class="@if($player->gender == 'male') odd-name-row @elseif($player->gender == 'female') even-name-row @endif">{{$player->name}}</td>
                        <td>{{$years1}}</td>
                           
                        @php 
                            $comp_week = array('Monday','Tuesday','Wednesday','Thursday','Friday','Fullweek');
                        @endphp       

                        @foreach($week as $number=>$number_array)   

                        @if($number == 'W1')

                        @foreach($number_array as $data=>$user_data)
                          @foreach($user_data as $data1=>$user_data1)

                            @php 
                              $split = explode('-',$user_data1);   
                              $get_session = $data1.'-'.$split[2]; 
                            @endphp

                            @if(in_array($data1,$comp_week))

                                <td>@if($get_session ==  $data1.'-early') X - @php echo $data1; @endphp @endif </td>
                                <td>@if($get_session ==  $data1.'-mor') X @php echo $data1; @endphp @endif</td>
                                <td>@if($get_session ==  $data1.'-lunch') X @php echo $data1; @endphp @endif</td>
                                <td>@if($get_session ==  $data1.'-noon') X @php echo $data1; @endphp @endif</td>
                                <td>@if($get_session ==  $data1.'-full') X @php echo $data1; @endphp @endif</td>
                                <td>@if($get_session ==  $data1.'-late') X @php echo $data1; @endphp @endif</td>

                            @elseif(!in_array($data1,$comp_week))
                                @php echo '11'; @endphp
                            @endif

                          @endforeach
                        
                          @endforeach

                        @endif

                        @endforeach

                        @php dd('1'); @endphp


                        <td>{{$player->date_of_birth}}</td>
                        <td>{{$parent->name}}</td>
                        <td>{{$parent->phone_number}}</td>
                        <td>@if($child_details['med_cond'] == 'confirm_accurate_no') N @else Y @endif</td>
                        <td>@if(!empty($player->profile_image)) Y @else N @endif</td>
                        <td>{{$parent->email}}</td>
                    </tr>
                    @endforeach

                    <!-- <tr>
                        <td>Total</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>0</td>
                        <td>0</td>
                    </tr> -->
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
                            <td>@if(!empty($child_details->med_cond_info)) {{$child_details->med_cond_info}} @else -  @endif</td>
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
                        <td><a href="">Display Camp Week 1</a></td>
                        <td><a href="">Display Camp Week 2</a></td>
                        <td><a href="">Display Camp Week 3</a></td>
                        <td><a href="">Display Camp Week 4</a></td>
                        <td><a href="">Display Camp Week 5</a></td>
                        <td><a href="">Display Camp Week 6</a></td>
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