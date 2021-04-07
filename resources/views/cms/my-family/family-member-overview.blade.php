@extends('inc.homelayout')
@section('title', 'DRH|Register')
@section('content')
@php 
$country_code = DB::table('country_code')->orderBy('countryname','asc')->get(); 
@endphp
<div class="account-menu acc_sub_menu">
    <div class="container">
        <div class="menu-title">
            <span>Account</span> menu
        </div>
        <nav>
            <ul>
                @include('inc.parent-menu')
            </ul>
        </nav>
    </div>
</div>
@if(Session::has('success'))
<div class="alert_msg alert alert-success">
    <p>{{ Session::get('success') }} </p>
</div>
@endif
@if(Session::has('error'))
<div class="alert_msg alert alert-danger">
    <p>{{ Session::get('error') }} </p>
</div>
@endif
<section class="register-acc overview-sec">
    <div class="container">
        <div class="inner-cont">
            @if(!empty($user_id) && !empty($user))
            <div class="back-to-family">
                <h4 class="pl_name">Name : <p>{{$user->name}}</p></h4>
                <a href="{{url('/user/my-family')}}" class="cstm-btn main_button">Back to my family</a>
            </div>
            @endif
            <br/>
            <div id="accordion" class="parent_fam_mem">
                <div class="card">
                    <div class="card-header family-tabs" id="headingo-One">
                        <h5 class="mb-0 edit-family-member">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                <span>1</span> Participant Details
                            </button>
                            @if(Auth::user()->id == $user->id)
                                <a class="cst_tennis_btn" href="{{URL('/user/account-holder/details')}}?&sec=1">Edit</a>
                            @else
                                <a class="cst_tennis_btn" href="{{URL('/user/family-member/add?user=')}}{{$user->id}}&sec=1">Edit</a>
                            @endif
                        </h5>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingo-One" data-parent="#accordion">
                        <div class="card-body">
                            <div class="register-sec form-register-sec family_mem ">
                                <div class="form-partition">
                                    <div class="col-md-12 report_row">
                                        <div class="text-wrap">
                                            <ul>
                                                <li>
                                                    <p>First Name -
                                                    	<span>{{isset($user->first_name) ? $user->first_name : ''}}</span></p>
                                                </li>
                                                <li>
                                                    <p>Last Name -
                                                    	<span>{{isset($user->last_name) ? $user->last_name : ''}}</span></p>
                                                </li>
                                                <li>
                                                    <p>Gender -
                                                    	<span>{{isset($user->gender) ? $user->gender : ''}}</span></p>
                                                </li>
                                                <li>
                                                    <p>Date of Birth -
                                                    	<span>{{isset($user->date_of_birth) ? date("d/m/Y", strtotime($user->date_of_birth)) : ''}}</span></p>
                                                </li>
                                                <li>
                                                    <p>Address -
                                                    	<span>{{isset($user->address) ? $user->address : ''}}</span></p>
                                                </li>
                                                <li>
                                                    <p>Town -
                                                    	<span>{{isset($user->town) ? $user->town : ''}} </span></p>
                                                </li>
                                                <li>
                                                    <p>Postcode -
                                                    	<span>{{isset($user->postcode) ? $user->postcode : ''}}</span></p>
                                                </li>
                                                <li>
                                                    <p>County -
                                                    	<span>{{isset($user->county) ? $user->county : ''}}</span></p>
                                                </li>
                                                <li>
                                                    <p>Country -
                                                    	<span>{{isset($user->country) ? $user->country : ''}}</span></p>
                                                </li>
                                                @php //dd(Auth::user()->type); @endphp

                                                @if($user->type == 'Adult' || $user->type == 'Child')
                                                <li>
                                                    <p>What Is The Relationship Of The Account Holder To This Person? -
                                                    	<span>{{isset($user->relation) ? $user->relation : ''}} </span></p>
                                                </li>
                                                <li>
                                                    <p>Is English this person’s primary language? - <span>{{isset($user_details->core_lang) ? $user_details->core_lang : ''}} </span></p>
                                                </li>
                                                @endif

                                                <li>
                                                    <p>Will this person be booking onto a DRH coaching course or holiday camp ? - 
                                                    	<span>{{isset($user->book_person) ? $user->book_person : ''}}</span></p>
                                                </li>
                                                <!-- <li>
                                                    <p>Do You Want To Show Player Name In Leaderboard? - 
                                                    	<span>@if(!empty($user->show_name == 1)) yes @else no @endif</span></p>
                                                </li> -->
                                            </ul>
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
                            @if(Auth::user()->id == $user->id)
                                <a class="cst_tennis_btn" href="{{URL('/user/account-holder/details')}}?&sec=2">Edit</a>
                            @else
                                <a class="cst_tennis_btn" href="{{URL('/user/family-member/add?user=')}}{{$user->id}}&sec=2">Edit</a>
                            @endif
                            <!-- <a class="cst_tennis_btn" href="{{URL('/user/family-member/add?user=')}}{{$user->id}}&sec=2">Edit</a> -->
                        </h5>
                    </div>
                    <div id="collapsetwo" class="collapse" aria-labelledby="headingo-tow" data-parent="#accordion">
                        <div class="card-body">
                            <div class="register-sec form-register-sec family_mem ">
                                <div class="form-partition fam-mem-contact">
                                    <div class="col-md-12 report_row">
                                      
                                        @php $i = 1; @endphp
                                        @if(count($user_contacts)>0)
                                        @foreach($user_contacts as $us)
                                        <div id="accordion{{$us->id}}" class="parent_fam_mem">
                                            <div class="card">
                                                <div class="card-header family-tabs conatct-inner-tab" id="headingo-{{$us->id}}">
                                                    <h5 class="mb-0 edit-family-member">
                                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$us->id}}" aria-expanded="false" aria-controls="collapse{{$us->id}}">
                                                            contact - {{$i}}
                                                        </button>
                                                        <a href="{{url('/user/remove-contact')}}/{{$us->id}}" onclick="return confirm('Are you sure you want to remove this contact?')" class="cstm-btn">Remove</a>
                                                    </h5>
                                                </div>
                                                <div id="collapse{{$us->id}}" class="collapse" aria-labelledby="headingo-{{$us->id}}" data-parent="#accordion{{$us->id}}">
                                                    <div class="card-body">
                                                        <div class="register-sec form-register-sec family_mem ">
                                                            <div class="form-partition fam-mem-contact">
                                                                <div class="col-md-12 report_row">
                                                                    <div class="table_wrap">
                                                                        <ul>
                                                                            <li>
                                                                                <p>First Name -
                                                                                    <span>{{isset($us->first_name) ? $us->first_name : ''}}</span>
                                                                                </p>
                                                                            </li>
                                                                            <li>
                                                                                <p>Last Name -
                                                                                    <span> {{isset($us->surname) ? $us->surname : ''}}
                                                                                    </span>
                                                                                </p>
                                                                            </li>
                                                                            <li>
                                                                                <p>Phone -
                                                                                	<span>{{isset($us->phone) ? $us->phone : ''}}
                                                                                    </span>
                                                                                </p>
                                                                            </li>
                                                                            <li>
                                                                                <p>Email -
                                                                                    <span>{{isset($us->email) ? $us->email : ''}}
                                                                                    </span>
                                                                                </p>
                                                                            </li>
                                                                            <li>
                                                                                <p class="text_split">What is the relationship to the participant? - 
                                                                                    <span>{{isset($us->relationship) ? $us->relationship : ''}}</span>
                                                                                </p>
                                                                            </li>
                                                                            <li>
                                                                                <p class="text_split">If you chose other who are they? - 
                                                                                    <span>{{isset($us->who_are_they) ? $us->who_are_they : ''}}</span>
                                                                                </p>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @php $i++; @endphp
                                        @endforeach
                                        @endif

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

                            @if(Auth::user()->id == $user->id)
                                <a class="cst_tennis_btn" href="{{URL('/user/account-holder/details')}}?&sec=3">Edit</a>
                            @else
                                <a class="cst_tennis_btn" href="{{URL('/user/family-member/add?user=')}}{{$user->id}}&sec=3">Edit</a>
                            @endif
                            <!-- <a class="cst_tennis_btn" href="{{URL('/user/family-member/add?user=')}}{{$user->id}}&sec=3">Edit</a> -->
                        </h5>
                    </div>
                    <div id="collapsethree" class="collapse" aria-labelledby="headingo-three" data-parent="#accordion">
                        <div class="card-body">
                            <div class="register-sec form-register-sec family_mem ">
                                <div class="form-partition fam-mem-contact">
                                    <div class="col-md-12 report_row">
                                        <div class="table_wrap">


                                        @if(!empty($user_details))

                                        @if($user_details->med_cond == 'yes')
                                            <h3>Medical Conditions -</h3><br/>
                                        @endif

                                        @if($user->type == '')
                                            @if($user_details->med_cond == 'yes')

                                            @php $i = 1; @endphp
                                            @if(count($user_medicals)>0)
                                                @foreach($user_medicals as $cond)
                                                    <div id="accordion{{$i}}-11" class="parent_fam_mem">
                                                        <div class="card">
                                                            <div class="card-header family-tabs conatct-inner-tab" id="headingo-{{$i}}-11">
                                                                <h5 class="mb-0 edit-family-member">
                                                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$i}}-11" aria-expanded="false" aria-controls="collapse{{$i}}-11">
                                                                        Medical Condition - {{$i}}
                                                                    </button>
                                                                    <a href="{{url('/user/remove-medical')}}/{{$cond->id}}" onclick="return confirm('Are you sure you want to remove this medical condition?')" class="cstm-btn">Remove</a>
                                                                </h5>
                                                            </div>
                                                            <div id="collapse{{$i}}-11" class="collapse" aria-labelledby="headingo-{{$i}}-11" data-parent="#accordion{{$i}}-11">
                                                                <div class="card-body">
                                                                    <div class="register-sec form-register-sec family_mem ">
                                                                        <div class="form-partition fam-mem-contact">
                                                                            <div class="col-md-12 report_row">
                                                                                <div class="table_wrap">
                                                                                    <ul>

                                                                                        <li>
                                                                                            <p>State the name of the medical condition and describe how it affects this child -
                                                                                                <span> {{$cond->medical}}
                                                                                                </span>
                                                                                            </p>
                                                                                        </li>
                                                                                        
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @php $i++; @endphp
                                                @endforeach
                                            @endif
                                            @endif
                                        @endif

                                        @if($user->type == 'Adult')

                                            @if($user_details->med_cond == 'yes')

                                            @php $i = 1; @endphp
                                            @if(count($user_medicals)>0)
                                            @foreach($user_medicals as $cond)


                                            <div id="accordion{{$i}}-11" class="parent_fam_mem">
                                                <div class="card">
                                                    <div class="card-header family-tabs conatct-inner-tab" id="headingo-{{$i}}-11">
                                                        <h5 class="mb-0 edit-family-member">
                                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$i}}-11" aria-expanded="false" aria-controls="collapse{{$i}}-11">
                                                                Medical Condition - {{$i}}
                                                            </button>
                                                            <a href="{{url('/user/remove-medical')}}/{{$cond->id}}" onclick="return confirm('Are you sure you want to remove this medical condition?')" class="cstm-btn">Remove</a>
                                                        </h5>
                                                    </div>
                                                    <div id="collapse{{$i}}-11" class="collapse" aria-labelledby="headingo-{{$i}}-11" data-parent="#accordion{{$i}}-11">
                                                        <div class="card-body">
                                                            <div class="register-sec form-register-sec family_mem ">
                                                                <div class="form-partition fam-mem-contact">
                                                                    <div class="col-md-12 report_row">
                                                                        <div class="table_wrap">
                                                                            <ul>

                                                                                <li>
                                                                                    <p>State the name of the medical condition and describe how it affects this child -
                                                                                        <span> {{$cond->medical}}
                                                                                        </span>
                                                                                    </p>
                                                                                </li>
                                                                                
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @php $i++; @endphp
                                            @endforeach
                                            @endif

                                            @endif

                                        @endif

                                        @if($user->type == 'Child')

                                            @if($user_details->med_cond == 'yes')

                                            @php $i = 1; @endphp
                                            @if(count($user_medicals)>0)
                                            @foreach($user_medicals as $cond)
                                            <div id="accordion{{$i}}-11" class="parent_fam_mem">
                                                <div class="card">
                                                    <div class="card-header family-tabs conatct-inner-tab" id="headingo-{{$i}}-11">
                                                        <h5 class="mb-0 edit-family-member">
                                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$i}}-11" aria-expanded="false" aria-controls="collapse{{$i}}-11">
                                                                Medical Condition - {{$i}}
                                                            </button>

                                                            <a href="{{url('/user/remove-medical')}}/{{$cond->id}}" onclick="return confirm('Are you sure you want to remove this medical condition?')" class="cstm-btn">Remove</a>
                                                        </h5>
                                                    </div>
                                                    <div id="collapse{{$i}}-11" class="collapse" aria-labelledby="headingo-{{$i}}-11" data-parent="#accordion{{$i}}-11">
                                                        <div class="card-body">
                                                            <div class="register-sec form-register-sec family_mem ">
                                                                <div class="form-partition fam-mem-contact">
                                                                    <div class="col-md-12 report_row">
                                                                        <div class="table_wrap">
                                                                            <ul>

                                                                                <li>
                                                                                    <p>State the name of the medical condition and describe how it affects this child -
                                                                                        <span> {{$cond->medical}}
                                                                                        </span>
                                                                                    </p>
                                                                                </li>
                                                                                
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @php $i++; @endphp
                                            @endforeach
                                            @endif

                                            @endif
                                        @endif


                                            <!-- <div class="report-table-wrap">
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
                                                        <tr>
                                                            <td colspan="2">
                                                                <h2>No Data Found</h2>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div> -->

                                            @if($user->type == 'Child')

                                                @if($user_details->allergies == 'yes')

                                                    @php $i = 1; @endphp
                                                    @if(count($user_allergies)>0)
                                                    <br/><h3>Allergies -</h3><br/>
                                                    @foreach($user_allergies as $cond)
                                                    <div id="accordion{{$i}}-22" class="parent_fam_mem">
                                                        <div class="card">
                                                            <div class="card-header family-tabs conatct-inner-tab" id="headingo-{{$i}}-22">
                                                                <h5 class="mb-0 edit-family-member">
                                                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$i}}-22" aria-expanded="false" aria-controls="collapse{{$i}}-22">
                                                                        Allergy - {{$i}}
                                                                    </button>

                                                                    <a href="{{url('/user/remove-allergy')}}/{{$cond->id}}" onclick="return confirm('Are you sure you want to remove this allergy condition?')" class="cstm-btn">Remove</a>
                                                                </h5>
                                                            </div>
                                                            <div id="collapse{{$i}}-22" class="collapse" aria-labelledby="headingo-{{$i}}-22" data-parent="#accordion{{$i}}-22">
                                                                <div class="card-body">
                                                                    <div class="register-sec form-register-sec family_mem ">
                                                                        <div class="form-partition fam-mem-contact">
                                                                            <div class="col-md-12 report_row">
                                                                                <div class="table_wrap">
                                                                                    <ul>

                                                                                        <li>
                                                                                            <p>Name of the allergy and describe how it affects this child -
                                                                                                <span> {{$cond->allergy}}
                                                                                                </span>
                                                                                            </p>
                                                                                        </li>
                                                                                        
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @php $i++; @endphp
                                                    @endforeach
                                                    @endif

                                                @endif

                                            @endif
                                            

                                            <br/><h3>Medical & Behavioural Information -</h3><br/>
                                            <ul>
                                                <li>
                                                    <p>- Does this person have any medical or behavioural conditions that we should be aware of? - <span>{{isset($user_details->med_cond) ? $user_details->med_cond : ''}} </span></p>
                                                </li>
                                                
                                               <!--  <li>
                                                    <p>- Does this person have any medical or behavioural conditions that we should be aware of? - <span>{{isset($user_details->med_cond) ? $user_details->med_cond : ''}} </span></p>
                                                </li> -->

                                                @if($user->type == 'Child')

                                                    <li>
                                                        <p>- Does your child have any allergies that we should be aware of? - 
                                                            <span>{{isset($user_details->allergies) ? $user_details->allergies : ''}}</span></p>
                                                    </li>

                                                    <li>
                                                        <p>- Will your child need to take any prescribed medication during the coaching course or holiday camp? - 
                                                            <span>{{isset($user_details->pres_med) ? $user_details->pres_med : ''}}</span></p>
                                                    </li>

                                                    @if($user_details->pres_med == 'yes')
                                                    <li>
                                                        <p>- Please state the name of the medication along with how and when this might be administered. - 
                                                            <span>{{isset($user_details->pres_med_info) ? $user_details->pres_med_info : ''}}</span></p>
                                                    </li>
                                                    @endif

                                                    <li>
                                                        <p>- Does the child have any additional medical requirements that we may need be aware of? - <span>{{isset($user_details->med_req) ? $user_details->med_req : ''}} </span></p>
                                                    </li>

                                                    @if($user_details->med_req == 'yes')
                                                    <li>
                                                        <p>- Please state the name of the medical requirements along with how and when this might be administered. - 
                                                            <span>{{isset($user_details->med_req_info) ? $user_details->med_req_info : ''}}</span></p>
                                                    </li>
                                                    @endif

                                                    <li>
                                                        <p>- Is this child toilet trained and able to go to the toilet without any assitance form an adult? - 
                                                            <span>{{isset($user_details->toilet) ? $user_details->toilet : ''}}</span></p>
                                                    </li>

                                                    <li>
                                                        <p>- Are there any behavioural and/or special needs we need to consider to help your child to settel,participate in ans enjoy their activity? - 
                                                            <span>{{isset($user_details->beh_need) ? $user_details->beh_need : ''}}</span></p>
                                                    </li>

                                                    @if($user_details->beh_need == 'yes')
                                                    <li>
                                                        <p>- Please provide more information on behavioural and/or special needs. - 
                                                            <span>{{isset($user_details->beh_need_info) ? $user_details->beh_need_info : ''}}</span></p>
                                                    </li>
                                                    @endif

                                                @endif
                                                
                                            </ul>
                                            <!-- <div class="report-table-wrap">
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
                                                                <h5><b>{{isset($user_details-> med_req) ? $user_details-> med_req : ''}} </b></h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <p><b>Please state the name of the medical requirements along with how and when this might be administered. </b></p>
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
                                                                <p><b>Are there any behavioural and/or special needs we need to consider to help your child to settel,<br />participate in ans enjoy their activity? </b></p>
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
                                            </div> -->
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
                            @if(Auth::user()->id == $user->id)
                                <a class="cst_tennis_btn" href="{{URL('/user/account-holder/details')}}?&sec=4">Edit</a>
                            @else
                                <a class="cst_tennis_btn" href="{{URL('/user/family-member/add?user=')}}{{$user->id}}&sec=4">Edit</a>
                            @endif
                            <!-- <a class="cst_tennis_btn" href="{{URL('/user/family-member/add?user=')}}{{$user->id}}&sec=4">Edit</a> -->
                        </h5>
                    </div>
                    <div id="collapsefour" class="collapse" aria-labelledby="headingo-four" data-parent="#accordion">
                        <div class="card-body">
                            <div class="register-sec form-register-sec family_mem ">
                                <div class="form-partition">
                                    <div class="col-md-12 report_row">
                                        <!-- <div class="table_wrap"> -->
                                           <!--  <div class="report-table-wrap">
                                                <table class="stats table table-bordered cst-reports">
                                                    <tbody>
                                                        <tr>
                                                            <th>
                                                                <p><b>Do you give consent for this participant to be included in photos and videos to be <br />used for promotional purposes such as social media or marketing material? </b></p>
                                                            </th>
                                                            <td>
                                                                <h5><b>{{isset($user_details->media) ? $user_details->media : ''}}</b></h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <p><b>I confirm that the information given above is accurate and correct to the best of my<br /> knowledge at the time of registration. <br />I also confirm that if any of the details change, I will amend the form to reflect these changes. </b></p>
                                                            </th>
                                                            <td>
                                                                <h5><b>{{isset($user_details->confirm) ? $user_details->confirm : ''}}</b></h5>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div> -->

                                            <div class="text-wrap">
                                            <ul>
                                                <li>
                                                    <p>1) Do you give consent for this participant to be included in photos and videos to be used for promotional purposes such as social media or marketing material? - <span>{{isset($user_details->media) ? $user_details->media : ''}} </span></p>
                                                </li>
                                                <li>
                                                    <p>2) I confirm that the information given above is accurate and correct to the best of my knowledge at the time of registration. I also confirm that if any of the details change, I will amend the form to reflect these changes. - 
                                                        <span>{{isset($user_details->confirm) ? $user_details->confirm : ''}}</span></p>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <a href="{{url('user/family-member/add?user=')}}{{$user->id}}" class="cstm-btn main_button">Edit Information</a>
</section>
@endsection