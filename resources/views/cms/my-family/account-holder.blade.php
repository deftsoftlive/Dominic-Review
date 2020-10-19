@extends('inc.homelayout')
@section('title', 'DRH|Register')
@section('content')

@php 
    $country_code = DB::table('country_code')->orderBy('countryname','asc')->get(); 
    $user_id = request()->get('user');
    $sec = request()->get('sec');  
@endphp

@if(isset($user->id))

@php
    $user_data = DB::table('users')->where('id',$user_id)->first();

    $children_details = DB::table('children_details')->where('parent_id',$user->id)->first();   
    $child_contacts = DB::table('child_contacts')->where('child_id',$user->id)->get(); 
    $count_child_contacts = $child_contacts->count();

    $child_medicals = DB::table('child_medicals')->where('child_id',$user->id)->get();
    $count_child_medicals = $child_medicals->count();
@endphp

@else

@php 
    $user_data = '';
    $children_details = '';
    $child_contacts = '';
    $count_child_contacts = '';
    $count_child_medicals = '';
    $count_child_allergies = '';
@endphp

@endif

@php $count = 1; @endphp

<style>
#child_section, #medical_info, #child_contacts, #medical_beh, #media_consent, #primary_lang, #beh_info, #med_cond_info, #med_con_button, #pres_med_info, #allergy_button, #allergies_info, #special_needs_info{
    display: none;
}
input#agree {
    display: none;
}
/*.card-header.family-tabs {
    background: #00afef;
}*/
</style>
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

<section class="register-acc">
    <div class="container">
        <div class="inner-cont">
            @if(isset($user_id) && isset($user_data))
            <div class="back-to-family">
                <h4 class="pl_name">Name : <p>{{$user_data->name}}</p></h4>
                <a href="{{url('/user/my-family')}}" class="cstm-btn main_button">Back to my family</a>
            </div>
            @endif
            <br/>
            <div id="accordion" class="parent_fam_mem">
                <div class="card">
                    <div class="card-header family-tabs" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" @if($sec == 1) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="collapseOne">
                                <span>1</span> Participant Details
                            </button>
                            <div class="cstm-radio tab-cstm-radio">
                                <input type="radio" disabled="" name="type1" data-type="child" id="tab1" @if(!empty($user)) checked @endif>
                                <label for="tab1"></label>
                            </div>
                        </h5>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion" style="">
                        <div class="card-body">
                            <div class="register-sec form-register-sec family_mem ">

                                <form id="add-family-mem" action="{{route('ah_participant_details')}}" class="register-form" method="POST" novalidate="novalidate">
                                    @csrf
                                    <input type="hidden" name="user_id" id="user_id" value="{{$user->id}}">
                                    <input type="hidden" name="role_id" id="role_id" value="{{$user->role_id}}">
                                    <div class="form-partition">

                                        <div class="adult-selection-content">
                                            <div class="row">
                                                <input type="hidden" class="form_type" id="form_type" name="form_type" value="">
                                                <!-- First Name -->
                                                <div class="form-group row">
                                                    <label for="first_name" class="col-md-12 col-form-label text-md-right">First Name</label>
                                                    <div class="col-md-12">
                                                        <input id="first_name" type="text" class="form-control" name="first_name" value="{{isset($user->first_name) ? $user->first_name : ''}}" required="">
                                                    </div>
                                                </div>
                                                <!-- Last Name -->
                                                <div class="form-group row">
                                                    <label for="last_name" class="col-md-12 col-form-label text-md-right">Last Name</label>
                                                    <div class="col-md-12">
                                                        <input id="last_name" type="text" class="form-control" name="last_name" value="{{isset($user->last_name) ? $user->last_name : ''}}" required="">
                                                    </div>
                                                </div>
                                                <!-- Gender -->
                                                <div class="form-group row gender-opt signup-gender-op">
                                                    <label for="gender" class="col-md-12 col-form-label text-md-right ">Gender</label>
                                                    <div class="col-md-12 ">
                                                        <div class="cstm-radio">
                                                            <input type="radio" value="male" name="gender" id="1male" @if(!empty($user)) @if($user->gender == 'male') checked @endif @endif>
                                                            <label for="1male">Male</label>
                                                        </div>
                                                        <div class="cstm-radio">
                                                            <input type="radio" value="female" name="gender" id="1female" @if(!empty($user)) @if($user->gender == 'female') checked @endif @endif>
                                                            <label for="1female">Female</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Date of Birth -->
                                                <div class="form-group row">
                                                    <label for="date_of_birth" class="col-md-12 col-form-label text-md-right">Date Of Birth</label>
                                                    <div class="col-md-12">
                                                        <input id="date_of_birth" type="date" class="form-control" name="date_of_birth" value="{{isset($user->date_of_birth) ? $user->date_of_birth : ''}}" required="" max="2020-10-06">
                                                    </div>
                                                </div>
                                                <!-- Address -->
                                                <div class="form-group row address-detail validate_address">
                                                    <label for="address" class="col-md-12 col-form-label text-md-right">Address (Number &amp; Street)</label>
                                                    <div class="col-md-12">
                                                        <input id="address" type="text" class="paste_address form-control" name="address" value="{{isset($user->address) ? $user->address : ''}}" required="">
                                                        <!-- <div class="copy_address">
                                                            <a href="javascript:void(0);">Copy address of account holder</a>
                                                        </div> -->
                                                    </div>
                                                </div>
                                                <!-- Town -->
                                                <div class="form-group row">
                                                    <label for="town" class="col-md-12 col-form-label text-md-right">Town</label>
                                                    <div class="col-md-12">
                                                        <input id="town" type="text" class="paste_town form-control" name="town" value="{{isset($user->town) ? $user->town : ''}}" required="">
                                                    </div>
                                                </div>
                                                <!-- Postcode -->
                                                <div class="form-group row">
                                                    <label for="postcode" class="col-md-12 col-form-label text-md-right">Postcode</label>
                                                    <div class="col-md-12">
                                                        <input id="postcode" type="text" class="paste_postcode form-control" name="postcode" value="{{isset($user->postcode) ? $user->postcode : ''}}" required="">
                                                    </div>
                                                </div>
                                                <!-- County -->
                                                <div class="form-group row">
                                                    <label for="county" class="col-md-12 col-form-label text-md-right">County</label>
                                                    <div class="col-md-12">
                                                        <input id="county" type="text" class="paste_county form-control" name="county" value="{{isset($user->county) ? $user->county : ''}}" required="">
                                                    </div>
                                                </div>
                                                <!-- Country -->
                                                <div class="form-group row">
                                                    <label for="country" class="col-md-12 col-form-label text-md-right">{{ __('Country') }}</label>
                                                    <div class="col-md-12">
                                                        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
                                                        <select id="country" name="country" class="paste_country form-control cstm-select-list">
                                                            @foreach($country_code as $name)
                                                            <option value="{{$name->countryname}}" @if($name->countryname == $user->country) selected @endif >{{$name->countryname}}</option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('country'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('country') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <!-- Relationship -->
                                               <!--  <div class="form-group row">
                                                    <label for="relation" class="col-md-12 col-form-label text-md-right">What is the relationship of the account holder to this person?</label>
                                                    <div class="col-md-12">
                                                        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
                                                        <select id="relation" name="relation" class="form-control cstm-select-list">
                                                            <option value="Mother" @if(!empty($user)) @if($user->relation == 'Mother') selected @endif @endif>Mother</option>
                                                            <option value="Father" @if(!empty($user)) @if($user->relation == 'Father') selected @endif @endif>Father</option>
                                                            <option value="Grandparent" @if(!empty($user)) @if($user->relation == 'Grandparent') selected @endif @endif>Grandparent</option>
                                                            <option value="Guardian" @if(!empty($user)) @if($user->relation == 'Guardian') selected @endif @endif>Guardian</option>
                                                            <option value="Spouse" @if(!empty($user)) @if($user->relation == 'Spouse') selected @endif @endif>Spouse/Partner</option>
                                                        </select>
                                                    </div>
                                                </div> -->
                                                <!-- school -->
                                                <div class="form-group row" style="display: none;">
                                                    <label for="tennis_club" class="col-md-12 col-form-label text-md-right person_attend">Which school does this person attend</label>
                                                    <div class="col-md-12">
                                                        <input id="school" type="text" class="form-control" name="school" value="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 option_row coach_option">
                                                    <div class="form-group row ">
                                                        <div class="form-radios">
                                                            <p class="holiday_camps" style="display: inline-block; font-weight: 500; margin-right: 15px;">Will this person be booking onto a DRH coaching course or holiday camp?</p>
                                                        </div>
                                                        <div class="cstm-radio">
                                                            <input type="radio" name="book_person" id="book_person_yes" value="yes" @if(!empty($user)) @if($user->book_person == 'yes') checked @endif @endif>
                                                            <label for="book_person_yes">Yes</label>
                                                        </div>
                                                        <div class="cstm-radio booking">
                                                            <input type="radio" name="book_person" id="book_person_no" value="no" @if(!empty($user)) @if($user->book_person == 'no') checked @endif @endif>
                                                            <label for="book_person_no">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="submit" id="family_mem_btn" class="cstm-btn main_button">Save Section</button>
                                                </div>
                                                <!-- Selection Section - End -->
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card  ">
                    <div class="card-header family-tabs" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" @if($sec == 2) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="collapseTwo">
                                <span>2</span> contacts
                            </button>
                            <div class="cstm-radio tab-cstm-radio">
                                <input type="radio" disabled="" name="type2" data-type="child" id="tab2" @if(!empty($child_contacts) && count($child_contacts)>0) checked @endif>
                                <label for="tab2"></label>
                            </div>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse " aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            <div class="card-body">
                                <div class="register-sec form-register-sec family_mem ">
                                    <div class="form-partition">
                                        <div class="row">
                                            <form action="{{route('ah_contact_information')}}" class="register-form contact_form" method="POST">
                                                @csrf
                                                <!-- <input type="hidden" name="child_id" value="450"> -->
                                                <!-- <input type="hidden" name="type" value="Adult"> -->

                                                <input type="hidden" name="child_id" value="{{Auth::user()->id}}">
                                                <input type="hidden" name="type" value="Account Holder">

                                                <div class="adult-selection-content">
                                                    <div class="form-group-wrap">
                                                        <h4>Contacts</h4>
                                                        <div class="col-sm-12">
                                                            <p style="font-weight: 500;margin-right: 15px;text-transform: capitalize;font-size: 18px;margin-bottom: 8px;color: #00000;">Please note</p>
                                                        </div>
                                                        <br>
                                                        <div class="col-sm-12">
                                                            <p style="font-weight: 400; margin-right: 15px; color: #858686;">If you are an adult seperate to the account holder and are wishing to book yourself onto a course, then you can add your own contact details in this section.</p>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <p style="font-weight: 400; margin-right: 15px; color: #858686;">All information including payment and booking information, notices about upcoming events and notifications from linked sports coaches will be sent to the account holder email address.</p>
                                                        </div>
                                                        <!-- <div class="col-sm-12">
                                                                        <p style="font-weight: 400; margin-right: 15px; color: #858686;">All information including payment and booking information, notices about upcoming events and notifications from linked sports coaches will be sent to the account holder email address.</p>
                                                                    </div> -->
                                                        <div class="child-contact-container" id="sec_contact1">

                                                            @if(isset($count_child_contacts) && !empty($child_contacts))
                                                            @php $i = 1; @endphp
                                                            <input type="hidden" id="noOfContact1" value="{{$count_child_contacts}}">

                                                            @foreach($child_contacts as $contacts)
                                                            <div class="contact_wrap contact_section1[{{$count_child_contacts}}]">
                                                                <div class="col-sm-12">
                                                                    <p style="font-weight: 500; margin-right: 15px;margin-bottom: 0;color: #000;">Contact {{$i}}</p>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <p style="font-weight: 400; margin-right: 15px;color: #858686;margin-bottom: 0;">This is the person that would be contacted in case of any emergency</p>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-md-12 col-form-label text-md-right">contact {{$i}} - first name:</label>
                                                                    <div class="col-md-12">
                                                                        <input id="first_name1" type="text" class="form-control" name="contact1[{{$i}}][con_first_name1]" value="{{isset($contacts->first_name) ? $contacts->first_name : ''}}">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-md-12 col-form-label text-md-right">contact {{$i}} - surname:</label>
                                                                    <div class="col-md-12">
                                                                        <input id="last_name1" type="text" class="form-control" name="contact1[{{$i}}][con_last_name1]" value="{{isset($contacts->surname) ? $contacts->surname : ''}}">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-md-12 col-form-label text-md-right">contact {{$i}} - tel number:</label>
                                                                    <div class="col-md-12">
                                                                        <input id="phone1" type="tel" class="form-control" name="contact1[{{$i}}][con_phone1]" value="{{isset($contacts->phone) ? $contacts->phone : ''}}">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-md-12 col-form-label text-md-right">contact {{$i}} - email:</label>
                                                                    <div class="col-md-12">
                                                                        <input id="email1" type="email" class="form-control" name="contact1[{{$i}}][con_email1]" value="{{isset($contacts->email) ? $contacts->email : ''}}">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="relation" class="col-md-12 col-form-label text-md-right">What is this person's relationship to the participant?</label>
                                                                    <div class="col-md-12">
                                                                        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
                                                                        <select id="relation1" name="contact1[{{$i}}][con_relation1]" class="form-control cstm-select-list">
                                                                            <option selected="" disabled="" value="">Please Choose</option>
                                                                            <option value="Mother" @if(isset($contacts->   relationship)) @if($contacts->relationship == 'Mother') selected @endif @endif>Mother</option>
                                                                            <option value="Father" @if(isset($contacts->relationship)) @if($contacts->relationship == 'Father') selected @endif @endif>Father</option>
                                                                            <option value="Grandparent" @if(isset($contacts->relationship)) @if($contacts->relationship == 'Grandparent') selected @endif @endif>Grandparent</option>
                                                                            <option value="Guardian" @if(isset($contacts->relationship)) @if($contacts->relationship == 'Guardian') selected @endif @endif>Guardian</option>
                                                                            <option value="Spouse" @if(isset($contacts->relationship)) @if($contacts->relationship == 'Spouse') selected @endif @endif>Spouse/Partner</option>
                                                                            <option value="Its me" @if(isset($contacts->relationship)) @if($contacts->relationship == "Its me") selected @endif @endif>It's me</option>
                                                                            <option value="Other" @if(isset($contacts->relationship)) @if($contacts->relationship == 'Other') selected @endif @endif>Other</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-md-12 col-form-label text-md-right who_they">If you choose other who are they?</label>
                                                                    <div class="col-md-12">
                                                                        <input id="who_are_they1" type="text" class="form-control" name="contact1[{{$i}}][who_are_they1]" value="{{isset($contacts->who_are_they) ? $contacts->who_are_they : ''}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @php $i++; @endphp
                                                            @endforeach
                                                            @else
                                                            <input type="hidden" id="noOfContact1" value="{{$count}}">
                                                            <div class="contact_wrap contact_section1[{{$count}}]">
                                                                <div class="col-sm-12">
                                                                    <p style="font-weight: 500; margin-right: 15px;margin-bottom: 0;color: #000;">Contact 1</p>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <p style="font-weight: 400; margin-right: 15px;color: #858686;margin-bottom: 0;">This is the person that would be contacted in case of any emergency</p>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-md-12 col-form-label text-md-right">contact {{$count}} - first name:</label>
                                                                    <div class="col-md-12">
                                                                        <input id="first_name1" type="text" class="form-control" name="contact1[{{$count}}][con_first_name1]" value="">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-md-12 col-form-label text-md-right">contact {{$count}} - surname:</label>
                                                                    <div class="col-md-12">
                                                                        <input id="last_name1" type="text" class="form-control" name="contact1[{{$count}}][con_last_name1]" value="">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-md-12 col-form-label text-md-right">contact {{$count}} - tel number:</label>
                                                                    <div class="col-md-12">
                                                                        <input id="phone1" type="tel" class="form-control" name="contact1[{{$count}}][con_phone1]" value="">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-md-12 col-form-label text-md-right">contact {{$count}} - email:</label>
                                                                    <div class="col-md-12">
                                                                        <input id="email1" type="email" class="form-control" name="contact1[{{$count}}][con_email1]" value="">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="relation" class="col-md-12 col-form-label text-md-right">What is this person's relationship to the participant?</label>
                                                                    <div class="col-md-12">
                                                                        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
                                                                        <select id="relation1" name="contact1[{{$count}}][con_relation1]" class="form-control cstm-select-list">
                                                                            <option selected="" disabled="" value="">Please Choose</option>
                                                                            <option value="Mother">Mother</option>
                                                                            <option value="Father">Father</option>
                                                                            <option value="Grandparent">Grandparent</option>
                                                                            <option value="Guardian">Guardian</option>
                                                                            <option value="Spouse">Spouse/Partner</option>
                                                                            <option value="Its me">It's me</option>
                                                                            <option value="Other">Other</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-md-12 col-form-label text-md-right who_they">If you choose other who are they?</label>
                                                                    <div class="col-md-12">
                                                                        <input id="who_are_they1" type="text" class="form-control" name="contact1[{{$count}}][who_are_they1]" value="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endif
                                                        </div>
                                                        <div class="form-group row f-g-full">
                                                            <div class="col-sm-12" style="margin-top: 15px;">
                                                                <a href="javascript:void(0);" style="margin:0;" onclick="addcontact1();" class="additional_contact1 cstm-btn main_button">Add an additional contact <i class="fas fa-plus"></i></a>
                                                                <!--  <button onclick="addcontact();" class="cstm-btn" style="margin:0;">add an additional contact <i class="fas fa-plus"></i></button> -->
                                                            </div>
                                                        </div>
                                                        <div class="form-group row f-g-full ">
                                                            <div class="col-sm-12 next-setp">
                                                                <button id="medical_info_to_next" class="cstm-btn main_button" style="margin:0px;">Save section</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card  ">
                    <div class="card-header family-tabs" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" @if($sec == 3) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="collapseThree">
                                <span>3</span> Medical and behavioural
                            </button>
                            <div class="cstm-radio tab-cstm-radio">
                                <input disabled="" type="radio" name="type3" data-type="child" id="tab3" @if(isset($children_details) && isset($children_details->med_cond)) checked @endif>
                                <label for="tab3"></label>
                            </div>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse " aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            <div class="register-sec form-register-sec family_mem ">
                                <div class="form-partition">

                                    <form action="{{route('ah_medical_information')}}" class="register-form contact_form medicical-form" method="POST">
                                        @csrf
                                        <input type="hidden" name="child_id" value="{{Auth::user()->id}}">
                                        <input type="hidden" name="type" value="Account Holder">

                                        <div class="adult-selection-content" >
                                            <p class="sub_headings" style="margin-top: 15px;">Medical and behavioural conditions</p>
                                            <div class="row">
                                                <div class="col-md-12 option_row consent-option-row">
                                                    <div class="form-group row ">
                                                        <div class="form-radios">
                                                            <p style="display: inline-block; font-weight: 400; margin-right: 15px;">Does this person have any medical or behavioural conditions that we should be aware of?</p>
                                                        </div>
                                                        <div class="radio-wrap">
                                                            <div class="cstm-radio">
                                                                <input type="radio" class="medical_cond" name="med_cond" id="med_cond_yes1" value="yes" @if(isset($children_details->med_cond)) @if($children_details->med_cond == 'yes') checked @endif @endif>
                                                                <label for="med_cond_yes1">Yes</label>
                                                            </div>
                                                            <div class="cstm-radio">
                                                                <input type="radio" class="medical_cond" name="med_cond" id="med_cond_no1" value="no" @if(isset($children_details->med_cond)) @if($children_details->med_cond == 'no') checked @endif @endif> 
                                                                <label for="med_cond_no1">No</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="medical_cond1" class="col-md-12 option_row consent-option-row" @if(isset($children_details->med_cond)) @if($children_details->med_cond == 'no') style="display:none;" @elseif($children_details->med_cond == 'yes') style="display:block;" @endif @endif> 

                                                @if(count($child_medicals)>0)
                                                @php $i=1; @endphp
                                                @foreach($child_medicals as $con)

                                                <div class="child-contact-container slots{{$i}}" id="sec_med_con1[{{$i}}]">
                                                    <div class="form-group row address-detail">
                                                        <label for="address" class=" col-form-label text-md-right">
                                                            <p style="margin-bottom:0;display: inline-block;font-weight: 400;margin-right: 15px;" ;> Please state the name of the medical condition and describe how it affects this person.</p>
                                                        </label>
                                                        <div class="col-md-12 textarea-wrap">
                                                            <textarea class="form-control" name="med_cond_info[{{$i}}]" class="form-control" rows="5">{{$con->medical}}</textarea>

                                                            <!-- <a onclick="removeSection1({{$i}});" href="javascript:void(0);"><i class="fa fa-minus-circle" aria-hidden="true"></i></a> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                @php $i++; @endphp
                                                @endforeach

                                                @else

                                                <input type="hidden" id="noOfMed1" value="{{$count}}">

                                                <div class="child-contact-container slots{{$count}}" id="sec_med_con1[{{$count}}]">
                                                    
                                                    <div class="form-group row address-detail">
                                                        <label for="address" class=" col-form-label text-md-right">
                                                            <p style="margin-bottom:0;display: inline-block;font-weight: 400;margin-right: 15px;" ;> Please state the name of the medical condition and describe how it affects this person.</p>
                                                        </label>
                                                        <div class="col-md-12 textarea_wrap">
                                                            <textarea class="form-control" name="med_cond_info[{{$count}}]" class="form-control" rows="5"></textarea>

                                                            <!-- <a onclick="removeSection1({{$count}});" href="javascript:void(0);"><i class="fa fa-minus-circle" aria-hidden="true"></i></a> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                </div>

                                                <div class="form-group row f-g-full" @if(isset($children_details->med_cond)) @if($children_details->med_cond == 'no') style="display:none;" @elseif($children_details->med_cond == 'yes') style="display:block;" @endif @endif>
                                                    <div class="col-sm-12 button-center another_medical" style="margin-top: 15px;">
                                                        <a href="javascript:void(0);" style="margin:0;" onclick="addmedical();" class="additional_contact cstm-btn main_button">Add Another Medical or Behavioural Condition <i class="fas fa-plus"></i></a>
                                                    </div>
                                                </div>
                                                <div class="form-group row f-g-full ">
                                                    <div class="col-sm-12 next-setp">
                                                        <button id="medical_info_to_next" class="cstm-btn main_button" style="margin:10px 0;">Save section</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card  ">
                    <div class="card-header family-tabs" id="headingfour">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsefour" @if($sec == 4) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="collapsefour">
                                <span>4</span> consents
                            </button>
                            <div class="cstm-radio tab-cstm-radio">
                                <input type="radio" disabled="" name="type4" data-type="child" id="tab4" @if(isset($children_details->media) && isset($children_details->confirm)) checked @endif>
                                <label for="tab4"></label>
                            </div>
                        </h5>
                    </div>
                    <div id="collapsefour" class="collapse " aria-labelledby="headingfour" data-parent="#accordion">
                        <div class="card-body">
                            <div class="register-sec form-register-sec family_mem ">
                                <div class="form-partition">
                                    <div class="row">

                                        <form action="{{route('ah_media_consent')}}" class="register-form contact_form" method="POST">
                                            @csrf

                                            <input type="hidden" name="child_id" value="{{Auth::user()->id}}">
                                            <input type="hidden" name="type" value="Account Holder">

                                            <div class="col-md-12 option_row consent-option-row">
                                                <div class="media_cont_wrap">
                                                    <p class="main_head media_cont" style="display: inline-block; font-weight: 500; margin:15px 15px 0 0 ;">Media -</p><span class="media_photo">During activities run by DRH Sports(excluding activities run within school settings), photos and videos may occasionally be taken solely for promotional purposes.</span>
                                                </div>
                                                <div class="form-group row ">
                                                    <div class="form-radios">
                                                        <p style="display: inline-block; font-weight: 400; margin-right: 15px;">Do you give consent for this participant to be included in photos and videos to be used for promotional purposes such as social media or marketing material?</p>
                                                    </div>
                                                    <div class="radio-wrap">
                                                        <div class="cstm-radio">
                                                            <input type="radio" name="media_consent" id="media_consent_yes" value="yes" @if(!empty($children_details)) @if($children_details->media == 'yes') checked @endif @endif>
                                                            <label for="media_consent_yes">Yes</label>
                                                        </div>
                                                        <div class="cstm-radio">
                                                            <input type="radio" name="media_consent" id="media_consent_no" value="no" @if(!empty($children_details)) @if($children_details->media == 'no') checked @endif @endif> 
                                                            <label for="media_consent_no">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row ">
                                                    <div class="form-radios">
                                                        <p style="display: inline-block; font-weight: 400; margin-right: 15px;">I confirm that the information given above is accurate and correct to the best of my knowledge at the time of registration. I also confirm that if any of the details change, I will amend the form to reflect these changes.</p>
                                                    </div>
                                                    <div class="radio-wrap">
                                                        <div class="cstm-radio">
                                                            <input type="radio" name="confirm" id="confirm_yes" value="yes" @if(!empty($children_details)) @if($children_details->media == 'yes') checked @endif @endif>
                                                            <label for="confirm_yes">Yes</label>
                                                        </div>
                                                        <div class="cstm-radio">
                                                            <input type="radio" name="confirm" id="confirm_no" value="no" @if(!empty($children_details)) @if($children_details->media == 'no') checked @endif @endif>
                                                            <label for="confirm_no">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 option_row consent-option-row">
                                                <div class="form-group row ">
                                                    <div class="radio-wrap conform_wrap">
                                                        <div class="cstm-radio">
                                                            <input type="radio" name="agree" id="agree" value="yes" @if(!empty($children_details)) @if($children_details->agree == 'yes') checked @endif @endif>
                                                            <label for="agree"></label>
                                                        </div>
                                                    </div>
                                                    <div class="form-radios conform_radios">
                                                        <p style="display: inline-block; font-weight:400; margin-right: 15px;">I confirm that I agree to the DRH Sports Terms & conditions</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <p class="impor-note"><span>Please note: </span>You may be asked to confirm the above details are all correct before being able to complete future bookings</p>
                                            </div>
                                            <div class="col-md-12 contact_form_row">
                                                <button type="submit" class="cstm-btn main_button">Save Section</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               <!--  <div class="delete-child-container">
                    <h2>Delete Person</h2>
                    <a href="{{url('/user/family-member/delete')}}/@php echo base64_encode($user_id); @endphp" onclick='return confirm("If you delete this user, then it may affect other information stored against this user name. This may include Goals, Reports, Linked Coach Data, Match Charts etc. We recommend that users are not deleted. Are you sure you want to delete this user?")' class="cstm-btn main_button">I confirm i want to delete this person</a>
                </div> -->
            </div>
        </div>
    </div>
</section>
@endsection

<script type="text/javascript">
function addmedical() {
    var number = parseInt($("#noOfMed1").val());
    var newnumber = number + 1;
    $("#noOfMed1").val(newnumber);

    var mainHtml = '<div class="child-contact-container slot'+newnumber+'" id="sec_med_con['+newnumber+']"><div class="form-group row address-detail"><label for="address" class="col-form-label text-md-right"><p style="margin-bottom:0;display: inline-block;font-weight: 400;margin-right: 15px;" ;> Please state the name of the medical or behavioural condition and describe how it affects this person.</p></label><div class="col-md-12 textarea_wrap"><textarea class="form-control" name="med_cond_info[' + newnumber + ']" class="form-control" rows="5"></textarea></div></div></div>';

    $("#medical_cond1").append(mainHtml);
}

function removeSection11(counter){  
    var number = parseInt($("#noOfMed1").val());     
    $(".slots"+ counter).remove();
}

// Allergy
function addallergy() {
    var numb = parseInt($("#noOfAllergy").val());   
    var newnumb = numb + 1;
    $("#noOfAllergy").val(newnumb);

    var mainHtml = '<div class="form-group row address-detail" id="aller[' + newnumb + ']"><label for="address" class="col-md-12 col-form-label text-md-right"><p style="margin-bottom:0;display: inline-block;font-weight: 400;margin-right: 15px;" ;> Please state the name of the allergy and describe how it affects this child</p></label><div class="col-md-12"><textarea class="form-control" name="allergies_info[' + newnumb + ']" class="form-control" rows="5"></textarea></div></div>';

    $("#sec_all").append(mainHtml);
}

// Contacts
function addcontact1() {
    var num = parseInt($("#noOfContact1").val());
    var newnum = num + 1;
    $("#noOfContact1").val(newnum);

   var mainHtml = '<div id="contact_section" class="contact_section1[' + newnum + ']"><div class="col-sm-12"><h5 style="width: 100%;">Contact ' + newnum + ':</h5></div><div class="form-group row"><label class="col-md-12 col-form-label text-md-right">contact ' + newnum + ' - first name:</label><div class="col-md-12"><input id="con_first_name1" type="text" class="form-control" name="contact1[' + newnum + '][con_first_name1]" value=""></div></div>';

    mainHtml += '<div class="form-group row"><label class="col-md-12 col-form-label text-md-right">contact ' + newnum + ' - surname:</label><div class="col-md-12"><input id="con_last_name1" type="text" class="form-control" name="contact1[' + newnum + '][con_last_name1]" value=""></div></div>';

    mainHtml += '<div class="form-group row"><label class="col-md-12 col-form-label text-md-right">contact ' + newnum + ' - tel number:</label><div class="col-md-12"><input id="con_phone1" type="tel" class="form-control" name="contact1[' + newnum + '][con_phone1]" value=""></div></div>';

    mainHtml += '<div class="form-group row"><label class="col-md-12 col-form-label text-md-right">contact ' + newnum + ' - email:</label><div class="col-md-12"><input id="con_email1" type="email" class="form-control" name="contact1[' + newnum + '][con_email1]" value="" ></div></div>';

    mainHtml += "<div class='form-group row'><label for='relation' class='col-md-12 col-form-label text-md-right'>What is this person's relationship to the participant?</label><div class='col-md-12'><link rel='stylesheet' href='https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'><select id='con_relation1' name='contact1[" + newnum + "][con_relation1]' class='form-control cstm-select-list'><option selected='' disabled='' value=''>Please Choose</option><option value='Mother'>Mother</option><option value='Father'>Father</option><option value='Grandparent'>Grandparent</option><option value='Guardian'>Guardian</option><option value='Spouse'>Spouse/Partner</option><option value='Its me'>It's me</option><option value='Other'>Other</option></select></div></div>";

    mainHtml += '<div class="form-group row"><label class="col-md-12 col-form-label text-md-right">If you choose other who are they?</label><div class="col-md-12"><input id="who_are_they1" type="text" class="form-control" name="contact1[' + newnum + '][who_are_they1]" value="" ></div></div></div>';

    $("#sec_contact1").append(mainHtml);

    var contact_count = $("#noOfContact1").val();
    if (contact_count >= '4') {
        $('.additional_contact1').css('display', 'none');
    }
}
</script>