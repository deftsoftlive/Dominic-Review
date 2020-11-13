@extends('emails.layout')
@section('content')
@php
    $get_package = \DB::table('package_courses')->where('booking_no',$booking_no)->first();
    $get_all_packages = \DB::table('package_courses')->where('booking_no',$booking_no)->get();
    $account = \DB::table('stripe_accounts')->where('id',$get_package->account_id)->first();
@endphp

<div class="text-wrap" style="padding: 10px 30px;">
    <p style="font-family: 'Maven Pro', sans-serif;font-size: 16px;font-weight: 600;">Hi {{isset($account->account_name) ? $account->account_name : ''}}</p>
    <p style="font-family: 'Maven Pro', sans-serif;display: block;margin-bottom: 15px;font-size: 16px;font-weight: 400;">Thank you for requesting to enrol {{isset($get_package->player_id) ? getUsername($get_package->player_id) : getUsername($get_package->parent_id)}} onto the courses below. Please review the course and click the payment link to confirm the booking. </p>
    <span style="font-family: 'Maven Pro', sans-serif;display: block;margin-bottom: 15px;font-size: 16px;font-weight: 400;">Thank you!</span>
</div>

<p style="font-size:20px; padding: 0 30px; margin-bottom: 0;"><b>For : {{isset($get_package->player_id) ? getUsername($get_package->player_id) : getUsername($get_package->parent_id)}}</b></p><br/>

<!-- Hello {{getUsername($get_package->parent_id)}}, -->
<tr style="background-color: #fff;">
    <td style="">
        <table align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
            <tbody>
                <tr>
                    <td style="background-color: #fff; padding-top:0px;  padding-bottom: 30px; padding-left: 30px; padding-right: 30px; border-top-left-radius: 20px; border-top-right-radius: 20px; border-bottom-left-radius: 20px; border-bottom-right-radius: 20px;">
                        <table align="center" table-layout="fixed" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                            

                            <tbody>
                                <tr>
                                    <th style="color: #fff;background: #001642;font-family: 'Maven Pro', sans-serif; font-size: 16px; line-height: 22px;  padding: 10px 0;border-top-left-radius: 20px;border-right: 1px solid #fff;">Course</th>
                                    <th style="color: #fff;background: #001642;font-family: 'Maven Pro', sans-serif; font-size: 16px; line-height: 22px;  padding: 10px 0;border-top-right-radius: 20px;">Price</th>

                                @foreach($get_all_packages as $package)
                                <tr>
                                    <td style="font-family: 'Maven Pro', sans-serif; font-size: 16px;line-height: 22px;    color:#726c6c; padding: 10px; border: 1px solid #d9dada; border-bottom-left-radius: 20px;">

                                        <p>
                                            @php 
                                              $course = DB::table('courses')->where('id',$package->course_id)->first();
                                            @endphp

                                            <b>Course Name</b> : @php echo getCourseName($package->course_id); @endphp<br/>
                                            <b>Location</b> : {{$course->location}}<br/>
                                            <b>Day/Time</b> : {{$course->day_time}}<br/>
                                        </p> 

                                    </td>
                                    <td style="    font-family: 'Maven Pro', sans-serif;    font-size: 16px;    line-height: 22px;    color:#726c6c;   padding: 10px;    border: 1px solid #d9dada;    border-bottom-left-radius: 20px;text-align: center;">&pound;{{$package->price}}</td>
                                </tr>
                                @endforeach

                                <!-- <tr>
                  <td style="font-family: 'Maven Pro', sans-serif; font-size: 16px; line-height: 22px; color: #726c6c; padding-top: 10px;">

                       
                       Hello {{getUsername($get_package->parent_id)}},

                       @foreach($get_all_packages as $package)
                          <p>{{getCourseName($package->course_id)}} - {{$package->price}}</p>
                       @endforeach

                       You can purchase the courses through this link - 


                        @if($get_package->status == 0)

                            <a target="_blank" href="{{url('/purchase-package-course')}}/{{$get_package->booking_no}}">{{url('/purchase-package-course')}}/{{$get_package->booking_no}}</a>
                         

                        @elseif($get_package->status == 1)
                            
                            <a target="_blank" href="{{url('/404')}}">{{url('/purchase-package-course')}}/{{$get_package->booking_no}}</a>

                        @endif

                  </td>
                </tr> -->
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
</tr>
<div class="btn_wrap" style="text-align: right;padding: 0 30px;">
   
<a href="{{url('/purchase-package-course')}}/{{$get_package->booking_no}}" class="btn btn-primary" style="color: #fff;background-color: #04a9f5;border-color: #04a9f5;color: #fff;background-color: #04a9f5;font-family: 'Maven Pro', sans-serif;border-color: #04a9f5;padding: 13px 20px;border-radius: 5px;text-decoration: none;
    font-size: 14px;">Submit</a>
</div>
<p style="margin-top: 40px;">

    You can purchase the courses through this link - 


    @if($get_package->status == 0)

        <a target="_blank" href="{{url('/purchase-package-course')}}/{{$get_package->booking_no}}">{{url('/purchase-package-course')}}/{{$get_package->booking_no}}</a>
     

    @elseif($get_package->status == 1)
        
        <a target="_blank" href="{{url('/404')}}">{{url('/purchase-package-course')}}/{{$get_package->booking_no}}</a>

    @endif

</p>

@endsection