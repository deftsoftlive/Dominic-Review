@extends('emails.layout')
@section('content')
@php
    $get_package = \DB::table('package_courses')->where('booking_no',$booking_no)->first();
    $get_all_packages = \DB::table('package_courses')->where('booking_no',$booking_no)->orderBy('id','desc')->get();
    $account = \DB::table('stripe_accounts')->where('id',$get_package->account_id)->first();
@endphp

<div class="text-wrap" style="padding: 10px 30px;">
    <p style="font-family: 'Maven Pro', sans-serif;font-size: 16px;font-weight: 600;">Hi {{isset($get_package->player_id) ? getUsername($get_package->player_id) : getUsername($get_package->parent_id)}}</p>
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
                                    <th style="width: 70%;color: #fff;background: #001642;font-family: 'Maven Pro', sans-serif; font-size: 16px; line-height: 22px;  padding: 10px 0;border-top-left-radius: 20px;border-right: 1px solid #fff;">Course</th>
                                    <th style="width: 30%;color: #fff;background: #001642;font-family: 'Maven Pro', sans-serif; font-size: 16px; line-height: 22px;  padding: 10px 0;border-top-right-radius: 20px;">Price</th>

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
    <td>
        <table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="table-layout: fixed; vertical-align: top; min-width: 320px; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF; width: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td style="word-break: break-word; vertical-align: top;" valign="top">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color:#FFFFFF"><![endif]-->
<div style="background-color:transparent;">
<div class="block-grid" style="min-width: 320px; width:100%; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:100%"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
<!--[if (mso)|(IE)]><td align="center" style="background-color:transparent;width:100%; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;"><![endif]-->
<div class="col num12" style="min-width: 320px; display: table-cell; vertical-align: top; ">
<div class="col_cont" style="width:100% !important;">
<!--[if (!mso)&(!IE)]><!-->
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
<!--<![endif]-->
<div align="right" class="button-container" style="padding-top:0px;padding-right:15px;padding-bottom:5px;padding-left:5px;">
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"><tr><td style="padding-top: 0px; padding-right: 15px; padding-bottom: 5px; padding-left: 5px" align="right"><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="googlr.com" style="height:24pt; width:60.5pt; v-text-anchor:middle;" arcsize="13%" stroke="false" fillcolor="#3AAEE0"><w:anchorlock/><v:textbox inset="0,0,0,0"><center style="color:#ffffff; font-family:Arial, sans-serif; font-size:16px"><![endif]--><a href="{{url('/purchase-package-course')}}/{{$get_package->booking_no}}" style="-webkit-text-size-adjust: none; text-decoration: none; display: inline-block; color: #ffffff; background-color: #3AAEE0; border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px; width: auto; width: auto; border-top: 1px solid #3AAEE0; border-right: 1px solid #3AAEE0; border-bottom: 1px solid #3AAEE0; border-left: 1px solid #3AAEE0; padding-top: 0px; padding-bottom: 0px; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; text-align: center; mso-border-alt: none; word-break: keep-all;" target="_blank"><span style="padding-left:20px;padding-right:20px;font-size:16px;display:inline-block;"><span style="font-size: 16px; line-height: 2; mso-line-height-alt: 32px;">Pay</span></span></a>
    
<!--[if mso]></center></v:textbox></v:roundrect></td></tr></table><![endif]-->
</div>
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
</td>
</tr>
</tbody>
</table>
    </td>
</tr>
 
 



    You can purchase the courses through this link - 


    @if($get_package->status == 0)

        <a target="_blank" href="{{url('/purchase-package-course')}}/{{$get_package->booking_no}}">{{url('/purchase-package-course')}}/{{$get_package->booking_no}}</a>
     

    @elseif($get_package->status == 1)
        
        <a target="_blank" href="{{url('/404')}}">{{url('/purchase-package-course')}}/{{$get_package->booking_no}}</a>

    @endif

</p>

@endsection