@extends('inc.homelayout')
@section('title', 'DRH|Listing')
@section('content')
<div class="account-menu acc_sub_menu">
    <div class="container">
        <div class="menu-title">
            <span>Account</span> menu
        </div>
        <nav>
            <ul>
                  @php
                    $user_id = \Auth::user()->role_id;
                  @endphp

                  @if($user_id == '2')
                    @include('inc.parent-menu')
                  @elseif($user_id == 3)
                    @include('inc.coach-menu')
                  @endif
            </ul>
        </nav>
    </div>
</div>

@if(Session::has('success'))               
    <div class="alert_msg alert alert-success">
        <p>{{ Session::get('success') }} </p>
    </div>
@endif

<section class="member section-padding">
    <div class="container">
        <div class="pink-heading">
            <h2>Notifications</h2>
        </div>

        <p style="text-align: center;">{{ getAllValueWithMeta('notification_content', 'general-setting') }}</p>

        <br/><br/>
        <div class="col-md-12">
            <!-- <h2 class="cst_sub_heading">Player Name</h2> -->
            <div class="player-report-table tbl_shadow">
                <div class="report-table-wrap">
                    <div class="m-b-table">
                        <table class="notifictaion-timeline">
                            <thead>
                                <tr>
                                    <th width="23%">Date</th>
                                    <!-- <th>Parent Name</th> -->
                                    <th width="53%">Type</th>
                                    <th width="23%">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if($user_id == '2')

                                    @php 
                                        $notifications = DB::table('notifications')->orderBy('created_at','desc')->get();
                                        //dd($notifications);
                                        //dd($notifications);
                                        $children = DB::table('users')->where('parent_id',Auth::user()->id)->get();
                                        $child_id = [];
                                    @endphp

                                    @foreach($children as $child)
                                        @php $child_id[] = $child->id; @endphp
                                    @endforeach

                                    @foreach ($notifications as $notification)

                                    @php 
                                        $notification_arr = json_decode($notification->data); 
                                        //dd( $notification_arr->reason_of_rejection );
                                        //dd($notification_arr,$child_id,Auth::user()->id);
                                    @endphp

                                        <!-- <div style="display: flex; justify-content: space-between; align-items: center;" class="alert_msg alert alert-primary admin_notify"> -->

                                            @if(!empty($notification_arr))

                                            @if($notification->notifiable_type == 'App\UserBadge' || $notification->notifiable_type == 'App\PlayerReport' || $notification->notifiable_type == 'App\MatchReport')

                                                @if(in_array($notification_arr->send_to,$child_id))

                                                    <tr>
                                                        <td>
                                                            <p>@php echo date('d-m-Y',strtotime($notification->created_at)); @endphp </p>
                                                        </td>
                                                        <td>
                                                            <p>{{ $notification_arr->data }}</p>
                                                            @if( isset( $notification_arr->reason_of_rejection ) )
                                                                <p> <b>Reason Of Rejection: </b> {{ $notification_arr->reason_of_rejection }} </p>
                                                            @endif
                                                        </td>
                                                        <td class="view_option">
                                                           <p> <a style="" href="{{url('/user/mark_as_read')}}/{{$notification->id}}" >Mark as Read</a></p>
                                                        </td>
                                                    </tr>

                                                @endif

                                            @else

                                                @if($notification_arr->send_to == Auth::user()->id)

                                                <tr>
                                                    <td>
                                                        <p>@php echo date('d-m-Y',strtotime($notification->created_at)); @endphp </p>
                                                    </td>
                                                    <td>
                                                        <p>{{ $notification_arr->data }}</p>
                                                        @if( isset( $notification_arr->reason_of_rejection ) )
                                                            <p> <b>Reason Of Rejection: </b> {{ $notification_arr->reason_of_rejection }} </p>
                                                        @endif
                                                    </td>
                                                    <td class="view_option">
                                                       <p> <a style="" href="{{url('/user/mark_as_read')}}/{{$notification->id}}" >Mark as Read</a></p>
                                                    </td>
                                                </tr>

                                                @endif

                                            @endif

                                            @endif

                                        <!-- </div> -->

                                    @endforeach

                                @endif
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <br><br>


    </div>
</section>
@endsection