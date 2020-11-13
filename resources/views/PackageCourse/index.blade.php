@extends('inc.homelayout')
@section('title', 'DRH')
@section('content')

<section class="account-menu-sec player-badge-sec memberddd">
    <div class="container">
        <br/>
        <div class="tab-page-heading">
            <h1 class="package-heading">Book your coaching courses</h1>
        </div>

        <div class="col-md-12">
            <p style="font-size:20px;"><b>For : {{isset($pack->player_id) ? getUsername($pack->player_id) : getUsername($pack->parent_id)}}</b></p><br/>
            <div class="player-report-table tbl_shadow">
                <div class="report-table-wrap">
                    <div class="m-b-table">

                        <table>
                            <thead>
                                <tr>
                                    <th>Course</th>
                                    <th>Price</th>
                                </tr>
                            </thead>

                            <tbody>
                            	@foreach($get_packages as $package)
                            	@php $amount[] = $package->price; @endphp
                                <tr>
                                    <td> 
                                        <p>
                                            @php 
                                              $course = DB::table('courses')->where('id',$package->course_id)->first();
                                            @endphp

                                            <b>Course Name</b> : @php echo getCourseName($package->course_id); @endphp<br/>
                                            <b>Location</b> : {{$course->location}}<br/>
                                            <b>Day/Time</b> : {{$course->day_time}}<br/>
                                        </p>
                                    </td>
                                    <td style="text-align: center;">&pound;{{$package->price}}</td>
                                </tr>
                                @endforeach

                                @php
									$total = array_sum($amount)*100;
									$account_data = DB::table('stripe_accounts')->where('id',$pack->account_id)->first();
								@endphp
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <form class="pack_form" action="{{url('save-package-courses')}}/{{$booking_no}}" method="POST">

            <b style="font-size:20px;">Total Price : &pound;{{ array_sum($amount) }}</b> &nbsp;
            <?php $stripe = SripeAccount();  ?>
            @csrf
            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button new-main-button" data-key="{{$account_data->public_key}}" data-amount="{{$total}}" data-name="DRH Panel" data-class="DRH Panel" data-description="Shopping" data-email="{{getUseremail($pack->parent_id)}}" data-currency="gbp" data-locale="auto">
            </script>
        </form>
    </div>
</section>


@endsection