@extends('layouts.admin')
 
@section('content')
@php $country_code = DB::table('country_code')->get(); @endphp

@if(Session::has('success'))
<div class="alert_msg alert alert-success">
    <p>{{ Session::get('success') }} </p>
</div>
@endif

<section class="register-acc overview-sec">
    <div class="container">
        <div class="outer-wrap">
            <div id="accordion" class="parent_fam_mem">
                <div class="card">
                    <div class="card-header family-tabs" id="headingo-One">
                        <h5 class="mb-0 edit-family-member">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                <span>1</span> Participant Details
                            </button>
                            <a class="btn btn-primary" href="{{URL('/admin/family-member/add?user=')}}{{$user->id}}&sec=1">Edit</a>
                        </h5>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingo-One" data-parent="#accordion">
                        <div class="card-body">
                            <div class="register-sec form-register-sec family_mem ">
                                <div class="form-partition">
                                    <div class="col-md-12 report_row">
                                        <div class="table_wrap">
                                            <div class="report-table-wrap">
                                                <table class="stats table table-bordered cst-reports">
                                                    <tbody>
                                                        <tr>
                                                            <th>
                                                                <p><b>First Name </b></p>
                                                            </th>
                                                            <td>
                                                                <h5><b>{{isset($user->first_name) ? $user->first_name : ''}}</b></h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <p><b>Last Name </b></p>
                                                            </th>
                                                            <td>
                                                                <h5><b>{{isset($user->last_name) ? $user->last_name : ''}}</b></h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <p><b>Gender </b></p>
                                                            </th>
                                                            <td>
                                                                <h5><b>{{isset($user->gender) ? $user->gender : ''}}</b></h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <p><b>Date of birth </b></p>
                                                            </th>
                                                            <td>
                                                                <h5><b>{{isset($user->date_of_birth) ? date("d/m/Y", strtotime($user->date_of_birth)) : ''}}</b></h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <p><b>Address </b></p>
                                                            </th>
                                                            <td>
                                                                <h5><b>{{isset($user->address) ? $user->address : ''}} </b></h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <p><b>Town </b></p>
                                                            </th>
                                                            <td>
                                                                <h5><b>{{isset($user->town) ? $user->town : ''}} </b></h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <p><b>Postcode </b></p>
                                                            </th>
                                                            <td>
                                                                <h5><b>{{isset($user->postcode) ? $user->postcode : ''}} </b></h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <p><b>County </b></p>
                                                            </th>
                                                            <td>
                                                                <h5><b>{{isset($user->county) ? $user->county : ''}} </b></h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <p><b>Country </b></p>
                                                            </th>
                                                            <td>
                                                                <h5><b>{{isset($user->country) ? $user->country : ''}} </b></h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <p><b>What Is The Relationship Of The Account Holder To This Person? </b></p>
                                                            </th>
                                                            <td>
                                                                <h5><b>{{isset($user->relation) ? $user->relation : ''}} </b></h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <p><b>Is English your child's primary language? </b></p>
                                                            </th>
                                                            <td>
                                                                <h5><b>{{isset($user_details->core_lang) ? $user_details->core_lang : ''}} </b></h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <p><b>What Is Their Primary Language? </b></p>
                                                            </th>
                                                            <td>
                                                                <h5><b>{{isset($user_details->primary_language) ? $user_details->primary_language : ''}} </b></h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <p><b>Will this person be booking onto a DRH coaching course or holiday camp ?</b></p>
                                                            </th>
                                                            <td>
                                                                <h5><b>{{isset($user->book_person) ? $user->book_person : ''}} </b></h5>
                                                            </td>
                                                        </tr>
                                                        <!-- <tr>
                                                            <th>
                                                                <p><b>Do You Want To Show Player Name In Leaderboard? </b></p>
                                                            </th>
                                                            <td>
                                                                <h5><b>@if(!empty($user->show_name == 1)) yes @else no @endif</b></h5>
                                                            </td>
                                                        </tr> -->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header family-tabs" id="headingo-tow">
                        <h5 class="mb-0 edit-family-member">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapsetwo" aria-expanded="false" aria-controls="collapsetwo">
                                <span>2</span> contact
                            </button>
                            <a class="btn btn-primary" href="{{URL('/admin/family-member/add?user=')}}{{$user->id}}&sec=2">Edit</a>
                        </h5>
                    </div>
                    <div id="collapsetwo" class="collapse" aria-labelledby="headingo-tow" data-parent="#accordion">
                        <div class="card-body">
                            <div class="register-sec form-register-sec family_mem ">
                                <div class="form-partition fam-mem-contact">
                                    <div class="col-md-12 report_row">
                                        <div class="table_wrap">
                                            <div class="report-table-wrap">
                                                <table class="stats table table-bordered cst-reports">
                                                    <tbody>
                                                        <tr>
                                                        	<th>
                                                        		<p><b>Contact No.</b></p>
                                                        	</th>
                                                            <th>
                                                                <p><b>First Name</b></p>
                                                            </th>
                                                            <th>
                                                                <p><b>Last Name</b></p>
                                                            </th>
                                                            <th>
                                                                <p><b>Phone</b></p>
                                                            </th>
                                                            <th>
                                                                <p><b>Email</b></p>
                                                            </th>
                                                            <th>
                                                                <p class="text_split"><b>What is the relationship to the participant?</b></p>
                                                            </th>
                                                            <th>
                                                                <p class="text_split"><b>If you chose other who are they?</b></p>
                                                            </th>
                                                        </tr>

                                                        @php $i = 1; @endphp

                                                        @if(count($user_contacts)>0)
                            							@foreach($user_contacts as $us)
                                                        <tr>
                                                        	<td>
                                                                <h5>{{$i}}</h5>
                                                            </td>
                                                            <td>
                                                                <h5>{{isset($us->first_name) ? $us->first_name : ''}}</h5>
                                                            </td>
                                                            <td>
                                                                <h5>{{isset($us->surname) ? $us->surname : ''}}</h5>
                                                            </td>
                                                            <td>
                                                                <h5>{{isset($us->phone) ? $us->phone : ''}}</h5>
                                                            </td>
                                                            <td>
                                                                <h5>{{isset($us->email) ? $us->email : ''}}</h5>
                                                            </td>                                                          
                                                            <td>
                                                                <h5>{{isset($us->relationship) ? $us->relationship : ''}}</h5>
                                                            </td>
                                                            <td>
                                                                <h5>{{isset($us->who_are_they) ? $us->who_are_they : ''}}</h5>
                                                            </td>
                                                        </tr>
                                                        @php $i++; @endphp
                                                        @endforeach
                                                        @else
                                                        	<tr><td colspan="7"><h2>No Data Found</h2></td></tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header family-tabs" id="headingo-three">
                        <h5 class="mb-0 edit-family-member">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapsethree" aria-expanded="false" aria-controls="collapsethree">
                                <span>3</span> Medical and behavioural
                            </button>
                            <a class="btn btn-primary" href="{{URL('/admin/family-member/add?user=')}}{{$user->id}}&sec=3">Edit</a>
                        </h5>
                    </div>
                    <div id="collapsethree" class="collapse" aria-labelledby="headingo-three" data-parent="#accordion">
                        <div class="card-body">
                             <div class="register-sec form-register-sec family_mem ">
                                <div class="form-partition fam-mem-contact">
                                    <div class="col-md-12 report_row">
                                        <div class="table_wrap">
                                            
                                            	@if($user->type == 'Adult')
                                            	<div class="report-table-wrap">
                                            	<table class="stats table table-bordered cst-reports">
                                                    <tbody>
                                                        <tr>
                                                        	<th>
                                                        		<p><b>Medical Condition No.</b></p>
                                                        	</th>
                                                            <th>
                                                                <p class="text_split"><b>State the name of the medical condition and describe how it affects this child</b></p>
                                                            </th>
                                                        </tr>

                                                        @php $i = 1; @endphp

                                                        @if(!empty($user_details->med_cond_info))

                            							@php 
                            								$med_cond = json_decode($user_details->med_cond_info);
                            							@endphp

                            							@foreach($med_cond as $cond)
                                                        <tr>
                                                        	<td>
                                                                <h5>{{$i}}</h5>
                                                            </td>
                                                            <td>
                                                                <h5>{{$cond}}</h5>
                                                            </td>
                                                        </tr>
                                                        @php $i++; @endphp
                                                        @endforeach

                                                        @else
                                                        	<tr><td colspan="2"><h2>No Data Found</h2></td></tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            	</div>

                                            	@elseif($user->type == 'Child')
                                            	<div class="report-table-wrap">
                                            	<table class="stats table table-bordered cst-reports">
                                                    <tbody>
                                                        <tr>
                                                        	<th>
                                                        		<p><b>Medical Condition No.</b></p>
                                                        	</th>
                                                            <th>
                                                                <p class="text_split"><b>Name of the medical condition and describe how it affects this child.</b></p>
                                                            </th>
                                                        </tr>

                                                        @php $i = 1; @endphp

                                                        @if(!empty($user_details->med_cond_info))

                            							@php 
                            								$med_cond = json_decode($user_details->med_cond_info);
                            							@endphp

                            							@foreach($med_cond as $cond)
                                                        <tr>
                                                        	<td>
                                                                <h5>{{$i}}</h5>
                                                            </td>
                                                            <td>
                                                                <h5>{{$cond}}</h5>
                                                            </td>
                                                        </tr>
                                                        @php $i++; @endphp
                                                        @endforeach

                                                        @else
                                                        	<tr><td colspan="2"><h2>No Data Found</h2></td></tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            	</div>
                                                
                                            	<div class="report-table-wrap">
                                                <table class="stats table table-bordered cst-reports">
                                                    <tbody>
                                                        <tr>
                                                        	<th>
                                                        		<p><b>Allergy No.</b></p>
                                                        	</th>
                                                            <th>
                                                                <p class="text_split"><b>Name of the allergy and describe how it affects this child</b></p>
                                                            </th>
                                                        </tr>

                                                        @php $i = 1; @endphp

                                                        @if(!empty($user_details->allergies_info))

                            							@php 
                            								$allergies_info = json_decode($user_details->allergies_info);
                            							@endphp

                            							@foreach($allergies_info as $cond)
                                                        <tr>
                                                        	<td>
                                                                <h5>{{$i}}</h5>
                                                            </td>
                                                            <td>
                                                                <h5>{{$cond}}</h5>
                                                            </td>
                                                        </tr>
                                                        @php $i++; @endphp
                                                        @endforeach

                                                        @else
                                                        	<tr><td colspan="2"><h2>No Data Found</h2></td></tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            	</div>

                                                <div class="report-table-wrap">
                                            	<table class="stats table table-bordered cst-reports">
                                                    <tbody>
                                                        <tr>
                                                            <th>
                                                                <p><b>Does your child have any medical condition the we should be aware of? </b></p>
                                                            </th>
                                                            <td>
                                                                <h5><b>{{isset($user_details->med_cond) ? $user_details->med_cond : ''}}</b></h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <p><b>Does your child have any allergies that we should be aware of? </b></p>
                                                            </th>
                                                            <td>
                                                                <h5><b>{{isset($user_details->allergies) ? $user_details->allergies : ''}}</b></h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <p><b>Will your child need to take any prescribed medication during the coaching course or holiday camp? </b></p>
                                                            </th>
                                                            <td>
                                                                <h5><b>{{isset($user_details->pres_med) ? $user_details->pres_med : ''}}</b></h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <p><b>Please state the name of the medication along with how and when this might be administered. </b></p>
                                                            </th>
                                                            <td>
                                                                <h5><b>{{isset($user_details->pres_med_info) ? $user_details->pres_med_info : ''}}</b></h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <p><b>Does the child have any additional medical requirements that we may need be aware of? </b></p>
                                                            </th>
                                                            <td>
                                                                <h5><b>{{isset($user_details->	med_req) ? $user_details->	med_req : ''}} </b></h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <p><b>Please state the name of the medical requirements along with how and when this might be administered.  </b></p>
                                                            </th>
                                                            <td>
                                                                <h5><b>{{isset($user_details->med_req_info) ? $user_details->med_req_info : ''}} </b></h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <p><b>Is this child toilet trained and able to go to the toilet without any assitance form an adult? </b></p>
                                                            </th>
                                                            <td>
                                                                <h5><b>{{isset($user_details->toilet) ? $user_details->toilet : ''}} </b></h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <p><b>Are there any behavioural and/or special needs we need to consider to help your child to settel,participate in ans enjoy their activity? </b></p>
                                                            </th>
                                                            <td>
                                                                <h5><b>{{isset($user_details->beh_need) ? $user_details->beh_need : ''}} </b></h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <p><b>Please provide more information on behavioural and/or special needs. </b></p>
                                                            </th>
                                                            <td>
                                                                <h5><b>{{isset($user_details->beh_need_info) ? $user_details->beh_need_info : ''}} </b></h5>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                </div>
                                               @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header family-tabs" id="headingo-four">
                        <h5 class="mb-0 edit-family-member">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                                <span>4</span> consents
                            </button>
                            <a class="btn btn-primary" href="{{URL('/admin/family-member/add?user=')}}{{$user->id}}&sec=4">Edit</a>
                        </h5>
                    </div>
                    <div id="collapsefour" class="collapse" aria-labelledby="headingo-four" data-parent="#accordion">
                        <div class="card-body">
                             <div class="register-sec form-register-sec family_mem ">
                                <div class="form-partition">
                                    <div class="col-md-12 report_row">
                                        <div class="table_wrap">
                                            <div class="report-table-wrap">
                                                <table class="stats table table-bordered cst-reports">
                                                    <tbody>
                                                        <tr>
                                                            <th>
                                                                <p><b>Do you give consent for this participant to be included in photos and videos to be used for promotional purposes such as social media or marketing material? </b></p>
                                                            </th>
                                                            <td>
                                                                <h5><b>{{isset($user_details->media) ? $user_details->media : ''}}</b></h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <p><b>I confirm that the information given above is accurate and correct to the best of my knowledge at the time of registration. I also confirm that if any of the details change, I will amend the form to reflect these changes. </b></p>
                                                            </th>
                                                            <td>
                                                                <h5><b>{{isset($user_details->confirm) ? $user_details->confirm : ''}}</b></h5>
                                                            </td>
                                                        </tr>                                                      
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <a href="{{url('user/family-member/add?user=')}}{{$user->id}}" class="btn btn-primary">Edit {{$user->type}} Information</a>
</section>
@endsection