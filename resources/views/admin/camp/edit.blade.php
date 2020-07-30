@extends('layouts.admin')
 
@section('content')
 <div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">{{$title}}</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item "><a href="{{ route($addLink) }}">View</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
       @include('admin.error_message')
 
            <div class="card-body">



<div class="col-md-12">

  <form role="form" method="post" id="venueForm" enctype="multipart/form-data">
                
          @csrf
                  <input type="hidden" name="camp_id" value="{{$venue->id}}">      
                  <div class="form-group">
                    <label class="control-label">Logo</label>
                    <input type="file" name="logo" id="selImage1" accept="image/*" onchange="ValidateSingleInput(this, 'logo_src')">
                    @if ($errors->has('logo'))
                        <div class="error">{{ $errors->first('logo') }}</div>
                    @endif
                  </div>

                  <img id="logo_src" style="width: 100px; height: 100px;" src="{{ URL::asset('/uploads').'/'.$venue->logo }}" />

                   {{textbox($errors,'Camp Title<span class="cst-upper-star">*</span>','title', $venue->title)}}

                   {{textbox($errors,'Location<span class="cst-upper-star">*</span>','location', $venue->location)}}

                   {{textbox($errors,'Term<span class="cst-upper-star">*</span>','term', $venue->term)}}

                   <div class="form-group">
                    <label class="label-file control-label">Category</label>
                    <select name="category" class="select-player">
                      @foreach($campcategory as $cat)
                        <option value="{{$cat->id}}" {{$venue->category == $cat->id ? 'selected' : ''}}>{{$cat->title}}</option>
                      @endforeach
                    </select>             
                   </div> 

                   {{textarea($errors,'Description<span class="cst-upper-star">*</span>','description', $venue->description)}}
                   {{textarea($errors,'Usefull Information<span class="cst-upper-star">*</span>','usefull_info', $venue->usefull_info)}}
                   {{textbox($errors,'Camp Date<span class="cst-upper-star">*</span>','camp_date', $venue->camp_date)}}
                   <!-- {{textbox($errors,'Price<span class="cst-upper-star">*</span>','price', $venue->price)}} -->

                  <div class="form-group">
                    <label class="control-label">Image</label>
                    <input type="file" name="image" id="selImage" accept="image/*" onchange="ValidateSingleInput(this, 'image_src')">
                    @if ($errors->has('image'))
                        <div class="error">{{ $errors->first('image') }}</div>
                    @endif
                  </div>

                  <img id="image_src" style="width: 100px; height: 100px;" src="{{ URL::asset('/uploads').'/'.$venue->image }}" />

                  {{textbox($errors,'Coach Cost<span class="cst-upper-star">*</span>','coach_cost', $venue->coach_cost)}}


                  <!-- ***********************************************
                  |
                  |       CAMP PRICING MANAGEMENT - Start Here 
                  |
                  |*************************************************** -->


                  @php
                    $id = $venue->id;
                    $camp = DB::table('camp_prices')->where('camp_id',$id)->first();
                    $arrSku = json_decode($camp->week); 
                    $selected_session = json_decode($camp->selected_session); 
                  @endphp
                  <input type="hidden" name="camp_price_id" id="camp_price_id" value="{{$camp->id}}">
                  <div class="form-group">
                    <h5><u>Week</u></h5>
                    <div class="row"> 

                    @php     
                      $arrNewSku = array();
                      $incI = 0;
                    @endphp
                    @if(!empty($arrSku))

                      @foreach($arrSku as $arrKey => $arrData) 
                      
                        <div class="col-sm-2">
                          <h5>Week {{$arrKey+1}} <input type="checkbox" id="Week" name="Week[{{$arrKey+1}}][Selected]" value="1" {{isset($arrData->Selected) ? 'checked': ''}}></h5>
                          <label for="StartDate"> Start Date</label>
                          <input type="text" id="StartDate" name="Week[{{$arrKey+1}}][StartDate]" style="width:100px;" value="{{isset($arrData->StartDate) ? $arrData->StartDate : ''}}"><br>
                          <label for="EndDate"> End Date</label>
                          <input type="text" id="EndDate" name="Week[{{$arrKey+1}}][EndDate]" style="width:100px;" value="{{isset($arrData->EndDate) ? $arrData->EndDate : ''}}"><br>
                          <input type="checkbox" id="Monday" name="Week[{{$arrKey+1}}][Monday]" value="1" {{isset($arrData->Monday) ? 'checked': ''}}>
                          <label for="Monday"> Monday</label><br>
                          <input type="checkbox" id="Tuesday" name="Week[{{$arrKey+1}}][Tuesday]" value="1" {{isset($arrData->Tuesday) ? 'checked': ''}}>
                          <label for="Tuesday"> Tuesday</label><br>
                          <input type="checkbox" id="Wednesday" name="Week[{{$arrKey+1}}][Wednesday]" value="1" {{isset($arrData->Wednesday) ? 'checked': ''}}>
                          <label for="Wednesday"> Wednesday</label><br>
                          <input type="checkbox" id="Thursday" name="Week[{{$arrKey+1}}][Thursday]" value="1" {{isset($arrData->Thursday) ? 'checked': ''}}>
                          <label for="Thursday"> Thursday</label><br>
                          <input type="checkbox" id="Friday" name="Week[{{$arrKey+1}}][Friday]" value="1" {{isset($arrData->Friday) ? 'checked': ''}}>
                          <label for="Friday"> Friday</label><br>
                          <input type="checkbox" id="Fullweek" name="Week[{{$arrKey+1}}][Fullweek]" value="1" {{isset($arrData->Fullweek) ? 'checked': ''}}>
                          <label for="Fullweek"> Fullweek</label><br>
                        </div>
                      @endforeach

                      @php $keydata = $arrKey+1; @endphp

                      @for( $i=$keydata ; $i<=9 ; $i++)
                        <div class="col-sm-2">
                          <h5>Week {{$i+1}} <input type="checkbox" id="Week" name="Week[{{$i+1}}][Selected]" value="1"></h5>
                          <label for="StartDate"> Start Date</label>
                          <input type="text" id="StartDate" name="Week[{{$i+1}}][StartDate]" style="width:100px;"><br>
                          <label for="EndDate"> End Date</label>
                          <input type="text" id="EndDate" name="Week[{{$i+1}}][EndDate]" style="width:100px;"><br>
                          <input type="checkbox" id="Monday" name="Week[{{$i+1}}][Monday]" value="1">
                          <label for="Monday"> Monday</label><br>
                          <input type="checkbox" id="Tuesday" name="Week[{{$i+1}}][Tuesday]" value="1">
                          <label for="Tuesday"> Tuesday</label><br>
                          <input type="checkbox" id="Wednesday" name="Week[{{$i+1}}][Wednesday]" value="1">
                          <label for="Wednesday"> Wednesday</label><br>
                          <input type="checkbox" id="Thursday" name="Week[{{$i+1}}][Thursday]" value="1">
                          <label for="Thursday"> Thursday</label><br>
                          <input type="checkbox" id="Friday" name="Week[{{$i+1}}][Friday]" value="1">
                          <label for="Friday"> Friday</label><br>
                          <input type="checkbox" id="Fullweek" name="Week[{{$i+1}}][Fullweek]" value="1">
                          <label for="Fullweek"> Fullweek</label><br>
                        </div>
                      @endfor
                    @else
                    <div class="col-sm-2">
                      <h5>Week 1 <input type="checkbox" id="Week" name="Week[1][Selected]" value="1"></h5>
                      <label for="StartDate"> Start Date</label>
                      <input type="text" id="StartDate" name="Week[1][StartDate]" style="width:100px;"><br>
                      <label for="EndDate"> End Date</label>
                      <input type="text" id="EndDate" name="Week[1][EndDate]" style="width:100px;"><br>
                      <input type="checkbox" id="Monday" name="Week[1][Monday]" value="1">
                      <label for="Monday"> Monday</label><br>
                      <input type="checkbox" id="Tuesday" name="Week[1][Tuesday]" value="1">
                      <label for="Tuesday"> Tuesday</label><br>
                      <input type="checkbox" id="Wednesday" name="Week[1][Wednesday]" value="1">
                      <label for="Wednesday"> Wednesday</label><br>
                      <input type="checkbox" id="Thursday" name="Week[1][Thursday]" value="1">
                      <label for="Thursday"> Thursday</label><br>
                      <input type="checkbox" id="Friday" name="Week[1][Friday]" value="1">
                      <label for="Friday"> Friday</label><br>
                      <input type="checkbox" id="Fullweek" name="Week[1][Fullweek]" value="1">
                      <label for="Fullweek"> Fullweek</label><br>
                    </div>
                    <div class="col-sm-2">
                      <h5>Week 2 <input type="checkbox" id="Week" name="Week[2][Selected]" value="1"></h5>
                      <label for="StartDate"> Start Date</label>
                      <input type="text" id="StartDate" name="Week[2][StartDate]" style="width:100px;"><br>
                      <label for="EndDate"> End Date</label>
                      <input type="text" id="EndDate" name="Week[2][EndDate]" style="width:100px;"><br>
                      <input type="checkbox" id="Monday" name="Week[2][Monday]" value="1">
                      <label for="Monday"> Monday</label><br>
                      <input type="checkbox" id="Tuesday" name="Week[2][Tuesday]" value="1">
                      <label for="Tuesday"> Tuesday</label><br>
                      <input type="checkbox" id="Wednesday" name="Week[2][Wednesday]" value="1">
                      <label for="Wednesday"> Wednesday</label><br>
                      <input type="checkbox" id="Thursday" name="Week[2][Thursday]" value="1">
                      <label for="Thursday"> Thursday</label><br>
                      <input type="checkbox" id="Friday" name="Week[2][Friday]" value="1">
                      <label for="Friday"> Friday</label><br>
                      <input type="checkbox" id="Fullweek" name="Week[2][Fullweek]" value="1">
                      <label for="Fullweek"> Fullweek</label><br>
                    </div>
                    <div class="col-sm-2">
                      <h5>Week 3 <input type="checkbox" id="Week" name="Week[3][Selected]" value="1"></h5>
                      <label for="StartDate"> Start Date</label>
                      <input type="text" id="StartDate" name="Week[3][StartDate]" style="width:100px;"><br>
                      <label for="EndDate"> End Date</label>
                      <input type="text" id="EndDate" name="Week[3][EndDate]" style="width:100px;"><br>
                      <input type="checkbox" id="Monday" name="Week[3][Monday]" value="1">
                      <label for="Monday"> Monday</label><br>
                      <input type="checkbox" id="Tuesday" name="Week[3][Tuesday]" value="1">
                      <label for="Tuesday"> Tuesday</label><br>
                      <input type="checkbox" id="Wednesday" name="Week[3][Wednesday]" value="1">
                      <label for="Wednesday"> Wednesday</label><br>
                      <input type="checkbox" id="Thursday" name="Week[3][Thursday]" value="1">
                      <label for="Thursday"> Thursday</label><br>
                      <input type="checkbox" id="Friday" name="Week[3][Friday]" value="1">
                      <label for="Friday"> Friday</label><br>
                      <input type="checkbox" id="Fullweek" name="Week[3][Fullweek]" value="1">
                      <label for="Fullweek"> Fullweek</label><br>
                    </div>
                    <div class="col-sm-2">
                      <h5>Week 4 <input type="checkbox" id="Week" name="Week[4][Selected]" value="1"></h5>
                      <label for="StartDate"> Start Date</label>
                      <input type="text" id="StartDate" name="Week[4][StartDate]" style="width:100px;"><br>
                      <label for="EndDate"> End Date</label>
                      <input type="text" id="EndDate" name="Week[4][EndDate]" style="width:100px;"><br>
                      <input type="checkbox" id="Monday[4]" name="Week[4][Monday]" value="1">
                      <label for="Monday"> Monday</label><br>
                      <input type="checkbox" id="Tuesday[4]" name="Week[4][Tuesday]" value="1">
                      <label for="Tuesday"> Tuesday</label><br>
                      <input type="checkbox" id="Wednesday[4]" name="Week[4][Wednesday]" value="1">
                      <label for="Wednesday"> Wednesday</label><br>
                      <input type="checkbox" id="Thursday[4]" name="Week[4][Thursday]" value="1">
                      <label for="Thursday"> Thursday</label><br>
                      <input type="checkbox" id="Friday[4]" name="Week[4][Friday]" value="1">
                      <label for="Friday"> Friday</label><br>
                      <input type="checkbox" id="Fullweek" name="Week[4][Fullweek]" value="1">
                      <label for="Fullweek"> Fullweek</label><br>
                    </div>
                    <div class="col-sm-2">
                      <h5>Week 5 <input type="checkbox" id="Week" name="Week[5][Selected]" value="1"></h5>
                      <label for="StartDate"> Start Date</label>
                      <input type="text" id="StartDate" name="Week[5][StartDate]" style="width:100px;"><br>
                      <label for="EndDate"> End Date</label>
                      <input type="text" id="EndDate" name="Week[5][EndDate]" style="width:100px;"><br>
                      <input type="checkbox" id="Monday[5]" name="Week[5][Monday]" value="1">
                      <label for="Monday5"> Monday</label><br>
                      <input type="checkbox" id="Tuesday[5]" name="Week[5][Tuesday]" value="1">
                      <label for="Tuesday5"> Tuesday</label><br>
                      <input type="checkbox" id="Wednesday[5]" name="Week[5][Wednesday]" value="1">
                      <label for="Wednesday5"> Wednesday</label><br>
                      <input type="checkbox" id="Thursday[5]" name="Week[5][Thursday]" value="1">
                      <label for="Thursday5"> Thursday</label><br>
                      <input type="checkbox" id="Friday[5]" name="Week[5][Friday]" value="1">
                      <label for="Friday5"> Friday</label><br>
                      <input type="checkbox" id="Fullweek" name="Week[5][Fullweek]" value="1">
                      <label for="Fullweek"> Fullweek</label><br>
                    </div>
                    <div class="col-sm-2">
                      <h5>Week 6 <input type="checkbox" id="Week" name="Week[6][Selected]" value="1"></h5>
                      <label for="StartDate"> Start Date</label>
                      <input type="text" id="StartDate" name="Week[6][StartDate]" style="width:100px;"><br>
                      <label for="EndDate"> End Date</label>
                      <input type="text" id="EndDate" name="Week[6][EndDate]" style="width:100px;"><br>
                      <input type="checkbox" id="Monday[6]" name="Week[6][Monday]" value="1">
                      <label for="Monday6"> Monday</label><br>
                      <input type="checkbox" id="Tuesday[6]" name="Week[6][Tuesday]" value="1">
                      <label for="Tuesday6"> Tuesday</label><br>
                      <input type="checkbox" id="Wednesday[6]" name="Week[6][Wednesday]" value="1">
                      <label for="Wednesday6"> Wednesday</label><br>
                      <input type="checkbox" id="Thursday[6]" name="Week[6][Thursday]" value="1">
                      <label for="Thursday6"> Thursday</label><br>
                      <input type="checkbox" id="Friday[6]" name="Week[6][Friday]" value="1">
                      <label for="Friday6"> Friday</label><br>
                      <input type="checkbox" id="Fullweek" name="Week[6][Fullweek]" value="1">
                      <label for="Fullweek"> Fullweek</label><br>
                    </div>
                    
                    <br>
                  </div>
                  <br></br>
                  <div class="row">
                    
                    <div class="col-sm-2">
                      <h5>Week 7 <input type="checkbox" id="Week" name="Week[7][Selected]" value="1"></h5>
                      <label for="StartDate"> Start Date</label>
                      <input type="text" id="StartDate" name="Week[7][StartDate]" style="width:100px;"><br>
                      <label for="EndDate"> End Date</label>
                      <input type="text" id="EndDate" name="Week[7][EndDate]" style="width:100px;"><br>
                      <input type="checkbox" id="Monday[7]" name="Week[7][Monday]" value="1">
                      <label for="Monday7"> Monday</label><br>
                      <input type="checkbox" id="Tuesday[7]" name="Week[7][Tuesday]" value="1">
                      <label for="Tuesday7"> Tuesday</label><br>
                      <input type="checkbox" id="Wednesday[7]" name="Week[7][Wednesday]" value="1">
                      <label for="Wednesday7"> Wednesday</label><br>
                      <input type="checkbox" id="Thursday[7]" name="Week[7][Thursday]" value="1">
                      <label for="Thursday7"> Thursday</label><br>
                      <input type="checkbox" id="Friday[7]" name="Week[7][Friday]" value="1">
                      <label for="Friday7"> Friday</label><br>
                      <input type="checkbox" id="Fullweek" name="Week[7][Fullweek]" value="1">
                      <label for="Fullweek"> Fullweek</label><br>
                    </div>
                    <div class="col-sm-2">
                      <h5>Week 8 <input type="checkbox" id="Week" name="Week[8][Selected]" value="1"></h5>
                      <label for="StartDate"> Start Date</label>
                      <input type="text" id="StartDate" name="Week[8][StartDate]" style="width:100px;"><br>
                      <label for="EndDate"> End Date</label>
                      <input type="text" id="EndDate" name="Week[8][EndDate]" style="width:100px;"><br>
                      <input type="checkbox" id="Monday[8]" name="Week[8][Monday]" value="1">
                      <label for="Monday8"> Monday</label><br>
                      <input type="checkbox" id="Tuesday[8]" name="Week[8][Tuesday]" value="1">
                      <label for="Tuesday8"> Tuesday</label><br>
                      <input type="checkbox" id="Wednesday[8]" name="Week[8][Wednesday]" value="1">
                      <label for="Wednesday8"> Wednesday</label><br>
                      <input type="checkbox" id="Thursday[8]" name="Week[8][Thursday]" value="1">
                      <label for="Thursday8"> Thursday</label><br>
                      <input type="checkbox" id="Friday[8]" name="Week[8][Friday]" value="1">
                      <label for="Friday8"> Friday</label><br>
                      <input type="checkbox" id="Fullweek" name="Week[8][Fullweek]" value="1">
                      <label for="Fullweek"> Fullweek</label><br>
                    </div>
                    <div class="col-sm-2">
                      <h5>Week 9 <input type="checkbox" id="Week" name="Week[9][Selected]" value="1"></h5>
                      <label for="StartDate"> Start Date</label>
                      <input type="text" id="StartDate" name="Week[9][StartDate]" style="width:100px;"><br>
                      <label for="EndDate"> End Date</label>
                      <input type="text" id="EndDate" name="Week[9][EndDate]" style="width:100px;"><br>
                      <input type="checkbox" id="Monday[9]" name="Week[9][Monday]" value="1">
                      <label for="Monday9"> Monday</label><br>
                      <input type="checkbox" id="Tuesday[9]" name="Week[9][Tuesday]" value="1">
                      <label for="Tuesday9"> Tuesday</label><br>
                      <input type="checkbox" id="Wednesday[9]" name="Week[9][Wednesday]" value="1">
                      <label for="Wednesday9"> Wednesday</label><br>
                      <input type="checkbox" id="Thursday[9]" name="Week[9][Thursday]" value="1">
                      <label for="Thursday9"> Thursday</label><br>
                      <input type="checkbox" id="Friday[9]" name="Week[9][Friday]" value="1">
                      <label for="Friday9"> Friday</label><br>
                      <input type="checkbox" id="Fullweek" name="Week[9][Fullweek]" value="1">
                      <label for="Fullweek"> Fullweek</label><br>
                    </div>
                    <div class="col-sm-2">
                      <h5>Week 10 <input type="checkbox" id="Week" name="Week[10][Selected]" value="1"></h5>
                      <label for="StartDate"> Start Date</label>
                      <input type="text" id="StartDate" name="Week[10][StartDate]" style="width:100px;"><br>
                      <label for="EndDate"> End Date</label>
                      <input type="text" id="EndDate" name="Week[10][EndDate]" style="width:100px;"><br>
                      <input type="checkbox" id="Monday[10]" name="Week[10][Monday]" value="1">
                      <label for="Monday10"> Monday</label><br>
                      <input type="checkbox" id="Tuesday[10]" name="Week[10][Tuesday]" value="1">
                      <label for="Tuesday10"> Tuesday</label><br>
                      <input type="checkbox" id="Wednesday[10]" name="Week[10][Wednesday]" value="1">
                      <label for="Wednesday10"> Wednesday</label><br>
                      <input type="checkbox" id="Thursday[10]" name="Week[10][Thursday]" value="1">
                      <label for="Thursday10"> Thursday</label><br>
                      <input type="checkbox" id="Friday[10]" name="Week[10][Friday]" value="1">
                      <label for="Friday10"> Friday</label><br>
                      <input type="checkbox" id="Fullweek" name="Week[10][Fullweek]" value="1">
                      <label for="Fullweek"> Fullweek</label><br>
                    </div>
                  </div>
                  @endif
                  </br></br>
                </div>


                  <div class="form-group">
                    <h5><u>EARLY DROP OFF</u> <input type="checkbox" id="Week" name="Session[early_drop]" value="1" {{isset($selected_session->early_drop) ? 'checked': ''}}></h5>
                    <div class="row">
                      <div class="col-sm-4">{{textbox($errors,'Price','early_price', $camp->early_price)}}</div>
                      <div class="col-sm-4">{{textbox($errors,'Time','early_time', $camp->early_time)}}</div>
                      <div class="col-sm-4">{{textbox($errors,'% discount for Full week','early_percent', $camp->early_percent)}}</div>
                    </div>
                  </div>

                  <div class="form-group">
                    <h5><u>MORNING</u> <input type="checkbox" id="Week" name="Session[morning]" value="1" {{isset($selected_session->morning) ? 'checked': ''}}></h5>
                    <div class="row">
                      <div class="col-sm-3">{{textbox($errors,'Price','morning_price', $camp->morning_price)}}</div>
                      <div class="col-sm-3">{{textbox($errors,'Time','morning_time', $camp->morning_time)}}</div>
                      <div class="col-sm-3">{{textbox($errors,'Seats','morning_seats', $camp->morning_seats)}}</div>
                      <div class="col-sm-3">{{textbox($errors,'% discount for Full week','morning_percent', $camp->morning_percent)}}</div>
                    </div>
                  </div>

                  <div class="form-group">
                    <h5><u>LUNCH CLUB</u> <input type="checkbox" id="Week" name="Session[lunch]" value="1" {{isset($selected_session->lunch) ? 'checked': ''}}></h5>
                    <div class="row">
                      <div class="col-sm-4">{{textbox($errors,'Price','lunch_price', $camp->lunch_price)}}</div>
                      <div class="col-sm-4">{{textbox($errors,'Time','lunch_time', $camp->lunch_time)}}</div>
                      <div class="col-sm-4">{{textbox($errors,'% discount for Full week','lunch_percent', $camp->lunch_percent)}}</div>
                    </div>
                  </div>

                  <div class="form-group">
                    <h5><u>AFTERNOON</u> <input type="checkbox" id="Week" name="Session[afernoon]" value="1" {{isset($selected_session->afernoon) ? 'checked': ''}}></h5>
                    <div class="row">
                      <div class="col-sm-3">{{textbox($errors,'Price','afternoon_price', $camp->afternoon_price)}}</div>
                      <div class="col-sm-3">{{textbox($errors,'Time','afternoon_time', $camp->afternoon_time)}}</div>
                      <div class="col-sm-3">{{textbox($errors,'Seats','afternoon_seats', $camp->afternoon_seats)}}</div>
                      <div class="col-sm-3">{{textbox($errors,'% discount for Full week','afternoon_percent', $camp->afternoon_percent)}}</div>
                    </div>
                  </div>

                  <div class="form-group">
                    <h5><u>FULL DAY</u> <input type="checkbox" id="Week" name="Session[fullday]" value="1" {{isset($selected_session->fullday) ? 'checked': ''}}></h5>
                    <div class="row">
                      <div class="col-sm-4">{{textbox($errors,'Price','fullday_price', $camp->fullday_price)}}</div>
                      <div class="col-sm-4">{{textbox($errors,'Time','fullday_time', $camp->fullday_time)}}</div>
                      <div class="col-sm-4">{{textbox($errors,'% discount for Full week','fullday_percent', $camp->fullday_percent)}}</div>
                    </div>
                  </div>

                  <div class="form-group">
                    <h5><u>LATE PICKUP</u> <input type="checkbox" id="Week" name="Session[late_pickup]" value="1" {{isset($selected_session->late_pickup) ? 'checked': ''}}></h5>
                    <div class="row">
                      <div class="col-sm-4">{{textbox($errors,'Price','latepickup_price', $camp->latepickup_price)}}</div>
                      <div class="col-sm-4">{{textbox($errors,'Time','latepickup_time', $camp->latepickup_time)}}</div>
                      <div class="col-sm-4">{{textbox($errors,'% discount for Full week','latepickup_percent', $camp->latepickup_percent)}}</div>
                    </div>
                  </div>

                  <div class="form-group">
                    <h5><u>POPUP BOX</u></h5>
                      {{textbox($errors,'Title','popup_title', $venue->popup_title)}}
                      {{textbox($errors,'Sub-Title','popup_subtitle', $venue->popup_subtitle)}}
                  </div>

                  <div class="form-group">
                    <label class="label-file control-label">Enable/Disable - Popup Box</label>
                    <select name="popup_enable" class="select-player">
                      <option value="1" {{$venue->popup_enable == '1' ? 'selected' : ''}}>Enable</option>
                      <option value="0" {{$venue->popup_enable == '0' ? 'selected' : ''}}>Disable</option>
                    </select>
                  </div><br/>

                  <div class="cst-user-add-property">
                      <div class="cst-select-close-opt cst-select-close-opt-ipad">
                        <link rel="stylesheet" type="text/css" href="https://harvesthq.github.io/chosen/chosen.css">
                        <script src="https://harvesthq.github.io/chosen/chosen.jquery.js"></script> 
                                          <div id="user--output"></div>

                            <!--190719 new custom select option--> 
                              <script>
                                    document.getElementById('user--output').innerHTML = location.search;
                                    $(".chosen-select--user").chosen();
                              </script>
                              <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
                              <link href="https://www.jqueryscript.net/demo/Select-Replacement-Plugin-jQuery-Selectator/fm.selectator.jquery.css" rel="stylesheet" type="text/css">


                              @php 
                                $selected_products = explode(',',$venue->products);
                                $products = DB::table('products')->where('parent','0')->where('shop_id','0')->get();
                              @endphp

                              <label class="control-label">Products</label>
                              <select id="multiple" class="form-control" name="products[]" multiple> 

                                  <!-- To get all engineers -->
                                  @if(isset($products))
                                    @foreach($products as $co)
                                         @php
                                           if(in_array($co->id,$selected_products)){
                                              $selectedDefault  = 'selected';
                                           }else{
                                              $selectedDefault  = '';
                                           }
                                         @endphp

                                        <option name="products[]" {{$selectedDefault}} value="{{$co->id}}">{{$co->name}}</option>
                                    @endforeach                                        
                                  @endif

                              </select>

                              <script src="https://www.jqueryscript.net/demo/Select-Replacement-Plugin-jQuery-Selectator/fm.selectator.jquery.js"></script> 
                            <script>
                            $('#multiple').selectator({
                              showAllOptionsOnFocus: true,
                              searchFields: 'value text subtitle right'
                            });
                            </script>
                            <!--new custom select option end--> 
                      </div>
                  </div><br/>

                  <!-- ***********************************************
                  |
                  |      CAMP PRICING MANAGEMENT - Start Here  
                  |
                  |*************************************************** -->
                

                <div class="card-footer pl-0">
                  <button type="submit" id="btnVanue" class="btn btn-primary">Submit</button>
                </div>
 </form>


</div>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

 
     
@endsection

@section('scripts')
<script src="{{url('/admin-assets/js/validations/valueValidation.js')}}"></script>
<script src="{{url('/js/validations/imageShow.js')}}"></script>

<script src="{{ asset('js/cke_config.js') }}"></script>
<script type="text/javascript">
   CKEDITOR.replace('description', options);
   CKEDITOR.replace('usefull_info', options);
</script>
@endsection