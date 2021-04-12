@extends('layouts.admin')
 
@section('content')
<style>
  #main {
    padding-right: 0!important;
    overflow: auto;
  }
  #b-c-modal a{
    box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0
    );
  }
</style>


@if(Session::has('success'))               
    <div class="alert_msg alert alert-success">
        <p>{{ Session::get('success') }} </p>
    </div>
@elseif(Session::has('error'))
    <div class="alert_msg alert alert-danger">
        <p>{{ Session::get('error') }} </p>
    </div>
@endif

<section class="book-camp section-padding">
  <div class="container">
    <div class="camp-logo-section">
      <div class="container">
        <div class="row">
          
          <div class="col-sm-8">
            <div class="camp-logo-section">
              <h4>{{$camp->title}}</h4>
              <p>Camp Location - {{$camp->location}}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <section class="book-camp-accordion-table">
        <div class="row">
          <div class="col-sm-6">
            <div class="b-c-accordion">



      <form action="{{route('admin-submit-book-a-camp')}}" id="camp_booking_table" class="booking_table camp_grid" method="POST">
        @csrf    
              <div class="select-child">

                @php 
                  if(Auth::check()){
                    $children = DB::table('users')->where('parent_id',Auth::user()->id)->get();
                      
                    $selected_child = DB::table('shop_cart_items')->where('shop_type','course')->where('user_id',Auth::user()->id)->get();

                    $child_id = array();
                    foreach($selected_child as $ch)
                    {
                      $child_id[] = $ch->child_id;
                    }
                  }
                @endphp
          <!--       <select id="child-selection" name="child_id" class="book_camp_child selectpicker">
                  <option value="" selected="" disabled="">Select Player</option>
                  @if(Auth::check() && !empty($children))
                    @foreach($children as $child)
                      <option value="{{$child->id}}">{{$child->name}}</option>
                    @endforeach
                  @endif
                </select> -->

                <input type="hidden" name="camp_id" value="{{$camp->id}}">
                <label class="control-label">Select Parent<span class="cst-upper-star">*</span></label>
                  @php 
                    $parents = DB::table('users')->where('role_id','2')->get(); 
                  @endphp

                  <select class="form-control" id="parent_id" name="parent">
                    <option disabled selected="" value="">Select Parent</option>
                    @foreach($parents as $sh)
                      <option value="{{$sh->id}}">@php echo getUsername($sh->id); @endphp</option>
                    @endforeach
                  </select>
                  <br/>

                  <label class="control-label">Select Player<span class="cst-upper-star">*</span></label>
                  <select class="form-control" id="player_id" name="player">
                    <option disabled selected="" value="">Select Player</option>
                  </select>
                  <br/>

                  <label class="control-label">Cost/No Cost</label>
                  <select class="form-control" id="cost_type" name="cost_type">
                    <option disabled selected="" value="">Select Cost Type</option>
                    <option value="Cost">Cost</option>
                    <option value="No Cost">No Cost</option>
                  </select>
                  <br/>
                  
                  <div id="pay_meth">
                    <label class="control-label">Payment Method</label>
                    <select class="form-control" name="payment_method">
                      <option disabled selected="" value="">Select Payment Method</option>
                      <option value="STRIPE">Stripe</option>
                      <option value="Wallet">Wallet</option>
                      <option value="Childcare">Childcare</option>
                    </select>
                    <br/>
                  </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="session-time-table">
              <div class="player-report-table p-i-table">
                <div class="report-table-wrap">
                  <table>

                    @php 
                      $camp_id = $camp->id;
                      $camp_data = DB::table('camp_prices')->where('camp_id',$camp_id)->first();
                    @endphp

                    <thead>
                      <tr>
                        <th>Session</th>
                        <th>Time</th>
                        <th>Costs</th>
                      </tr>
                    </thead>
                    <tbody>

                    <!-- Early Drop -->
                    @if(!empty($camp_data->early_price))
                      <tr>
                        <td>Early Drop</td>
                        <td>{{$camp_data->early_time}}</td>
                        <td>£ {{$camp_data->early_price}}</td>
                      </tr>
                    @endif

                    <!-- Morning -->
                    @if(!empty($camp_data->morning_price))
                      <tr>
                        <td>Morning</td>
                        <td>{{$camp_data->morning_time}}</td>
                        <td>£ {{$camp_data->morning_price}}</td>
                      </tr>
                    @endif

                    <!-- Lunch Club -->
                    @if(!empty($camp_data->lunch_price))
                      <tr>
                        <td>Lunch Club</td>
                        <td>{{$camp_data->lunch_time}}</td>
                        <td>£ {{$camp_data->lunch_price}}</td>
                      </tr>
                    @endif

                    <!-- Afternoon -->
                    @if(!empty($camp_data->afternoon_price))
                      <tr>
                        <td>Afternoon</td>
                        <td>{{$camp_data->afternoon_time}}</td>
                        <td>£ {{$camp_data->afternoon_price}}</td>
                      </tr>
                    @endif

                    <!-- Late Pickup -->
                    @if(!empty($camp_data->latepickup_price))
                      <tr>
                        <td>Late Pickup</td>
                        <td>{{$camp_data->latepickup_time}}</td>
                        <td>£ {{$camp_data->latepickup_price}}</td>
                      </tr>
                    @endif

                    <!-- Full Day -->
                    @if(!empty($camp_data->fullday_price))
                      <tr>
                        <td>Full Day</td>
                        <td>{{$camp_data->fullday_time}}</td>
                        <td>£ {{$camp_data->fullday_price}}</td>
                      </tr>
                    @endif

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
    <div class="b-c-table-container">
  <!-- {!! $camp->usefull_info !!} -->
  <br/><br/>  
      <div class="accordion" id="b-c-table-accordion">

        @php 
          $camp_id = $camp->id;
          $camp = DB::table('camp_prices')->where('camp_id',$camp_id)->first();
          $arrSku = json_decode($camp->week); 
          $selected_session = json_decode($camp->selected_session); 
          // Array of days in week
          $days_arr = [
            'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'
          ];
        @endphp

        

        <input type="hidden" name="camp_id" value="{{$camp_id}}">
@if(!empty($arrSku))
        @foreach($arrSku as $arrKey => $arrData)  
        <!-- To calculate array count for the mutiplication of full week -->
        @php $days_count = 0; 
        $weekDisableA = $weekDisableM = '';
        $fullweekSeatsM = $fullweekSeatsA = [];


        $fullweekSeatsCheckM = $fullweekSeatsCheckA = 0;
        $noWeekdayCheck = 0;
        $keysArr = [];
        @endphp

        @foreach($arrData as $day_key=>$day_value)
        @php array_push( $keysArr, $day_key ); @endphp
          @if( in_array($day_key,$days_arr ) )
            @php 
              $days_count++;
            @endphp
          @endif          
        @endforeach

        @foreach( $days_arr as $che )
          @if( in_array( $che, $keysArr ) )
            @php $noWeekdayCheck = 1; @endphp          
          @endif
        @endforeach

        @if( $noWeekdayCheck == 1 )
        @else
          @foreach($arrData as $day_key=>$day_value)          
            @if( !in_array( $day_key, $days_arr ) &&  !empty( $arrData ) && $day_key == 'Selected' )
              @php $days_count = 5;
              @endphp
            @endif
          @endforeach
        @endif
          <div class="card">
            <div class="card-header" id="b-c-a-heading-one">
              <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#b-c-a-collapse-{{$arrKey+1}}" aria-expanded="false" aria-controls="b-c-a-collapse-one">
                <!-- Week {{$arrKey+1}} -->
                @if(isset($arrData->Selected))
                  Week {{$arrKey+1}} : {{isset($arrData->StartDate) ? $arrData->StartDate : ' - '}} {{isset($arrData->EndDate) ? $arrData->EndDate : ''}} 
                @endif 
                </button>
              </h2>
            </div>
            <div id="b-c-a-collapse-{{$arrKey+1}}" class="collapse" aria-labelledby="b-c-a-heading-one" data-parent="#b-c-table-accordion">
              <div class="card-body">
                <table>
  			    <thead>
  				  <tr class="">
              <th style="border-top:0;" class="info"></th>

              @if(isset($selected_session->early_drop))
                @if($selected_session->early_drop == '1')
                <th class="info ">
                  <div><span><b>Early Drop Off</b></span></div>
                </th>
                @endif
              @endif

              @if(isset($selected_session->morning))
                @if($selected_session->morning == '1')
                <th class="info ">
                  <div><span><b>Morning</b></span></div>
                </th>
                @endif
              @endif

              @if(isset($selected_session->lunch))
                @if($selected_session->lunch == '1')
                <th class="info ">
                  <div><span><b>Lunch Club</b></span></div>
                </th>
                @endif
              @endif

              @if(isset($selected_session->afernoon))
                @if($selected_session->afernoon == '1')
                <th class="info ">
                  <div><span><b>Afternoon</b></span></div>
                </th>
                @endif
              @endif

              @if(isset($selected_session->fullday))
                @if($selected_session->fullday == '1')
                <th class="info ">
                  <div><span><b>Full Day</b></span></div>
                </th>
                @endif
              @endif

              @if(isset($selected_session->late_pickup))
                @if($selected_session->late_pickup == '1')
                <th class="info ">
                  <div><span><b>Late Pick Up</b></span></div>
                </th>
                @endif
              @endif

              <th class="info ">
                <div><span><b>Available spaces</b></span></div>
              </th>
            </tr>
  				</thead>
                  <tbody>

                    <!-- Weeky Management -->
        @php //dd( $arrSku ); @endphp 
                    @php  

                    $weeks=[
                    'Monday'=>'mon',
                    'Tuesday'=>'tue',
                    'Wednesday'=>'wed',
                    'Thursday'=>'thur',
                    'Friday'=>'fri',
                    'Fullweek'=>'fullweek'
                    ]; 

                    @endphp

                    @foreach($weeks as $weekDays=>$weekDaysValue)

                    @if(isset($arrData->$weekDays))
                    @if($arrData->$weekDays == '1')

                      @php //dd($weekDays,$weekDaysValue); 
                        $smallLetterWeekDays= strtolower($weekDays); 
                        $full_weekClass=$weekDays=='Fullweek'?'full_week':'';
                        $full_weekTitle=$weekDays=='Fullweek'?'Full Week':$weekDays;

                        //******************************************
                        // Pricing of sessions & days with discounts
                        //******************************************

                        $EAprice = $camp->early_price;
                        $percentageprice =$camp->early_percent;
                        $fullweekEAPrice=$weekDays=='Fullweek'? ($days_count*$EAprice)*(1-($percentageprice)/100) : $EAprice;

                        $AMprice = $camp->morning_price;
                        $percentageprice1 =$camp->morning_percent;
                        $fullweekAMPrice=$weekDays=='Fullweek'? ($days_count*$AMprice)*(1-($percentageprice1)/100) : $AMprice;
                        //dd($days_count*$AMprice)*(1-($percentageprice1)/100 );

                        $PMprice = $camp->afternoon_price;
                        $percentageprice2 =$camp->afternoon_percent;
                        $fullweekPMPrice=$weekDays=='Fullweek'? ($days_count*$PMprice)*(1-($percentageprice2)/100) : $PMprice;

                        $Lunchprice = $camp->lunch_price;
                        $percentageprice3 =$camp->lunch_percent;
                        $fullweekLunchPrice=$weekDays=='Fullweek'? ($days_count*$Lunchprice)*(1-($percentageprice3)/100) : $Lunchprice;

                        $Fullprice = $camp->fullday_price;
                        $percentageprice4 =$camp->fullday_percent;
                        $fullweekFullPrice=$weekDays=='Fullweek'? ($days_count*$Fullprice)*(1-($percentageprice4)/100) : $Fullprice;

                        $LSprice = $camp->latepickup_price;
                        $percentageprice5 =$camp->latepickup_percent;
                        $fullweekLSPrice=$weekDays=='Fullweek'? ($days_count*$LSprice)*(1-($percentageprice5)/100) : $LSprice;

                      @endphp 


                        @php 
                          $shop_items = DB::table('shop_cart_items')->where('shop_type','camp')->where('type','order')->where( 'product_id', $camp_id )->get();
                          $shop_items_count = DB::table('shop_cart_items')->where('shop_type','camp')->where('type','order')->where( 'product_id', $camp_id )->count();
                          $m = $f = $l = $a = [];
                          if( $shop_items_count !== 0 ){
                            foreach($shop_items as $items){

                              $campSeatsData = \App\CampPrice::where('camp_id', $items->product_id)->first();
                              $morningSeats = (int)$campSeatsData->morning_seats;
                              $afternoonSeats = (int)$campSeatsData->afternoon_seats;
                              $week_data = json_decode($items->week); 

                              foreach($week_data as $number=>$number_array){

                                foreach($number_array as $data=>$user_data){

                                  foreach($user_data as $data1=>$user_data1){
                                    $split = explode('-',$user_data1);
                                    $get_session = $split[2]; 

                                    $week_des = $arrKey+1; 
                                    $week_no = 'W'.$week_des; 
                                    if($weekDays == $data1 && $number == $week_no){
                                      if($get_session == 'mor'){
                                        array_push($m,'1');
                                      }elseif($get_session == 'noon'){
                                        array_push($a,'1');
                                      }elseif($get_session == 'lunch'){
                                        array_push($l,'1');
                                      }elseif($get_session == 'full'){
                                        array_push($f,'1'); 
                                        array_push($m,'1'); 
                                        array_push($l,'1'); 
                                        array_push($a,'1'); 
                                      }
                                    }
                                  }
                                }
                              }
                            }
                          }else{
                            $campSeatsData = \App\CampPrice::where( 'camp_id', $camp_id )->first();
                            $morningSeats = (int)$campSeatsData->morning_seats;
                            $afternoonSeats = (int)$campSeatsData->afternoon_seats;
                          }                                 

                        $lunchSeats = ( $morningSeats > $afternoonSeats ) ? $morningSeats : $afternoonSeats;

                        $eaCheckM = $eaCheckA = $eaCheck = 0;
                        if(isset($selected_session->morning)){

                          if($selected_session->morning == '1'){
                                

                            if( !empty( $m ) ){
                              $seatsMorAf = $morningSeats - array_sum($m);
                            }else{
                              $seatsMorAf = $morningSeats;
                            }
                            $fullweekSeatsM[] = $seatsMor = ( $seatsMorAf < $morningSeats )? $seatsMorAf: $morningSeats;


                            if( $seatsMor > 15 ){
                              $displayTextM = 'Available'; 
                              $disabledM = '';
                            }elseif( in_array( $seatsMor, range( 6, 14 ) ) ){
                              $displayTextM = 'Limited Spaces';
                              $disabledM = '';
                            }elseif( in_array( $seatsMor, range( 1, 5 ) ) ){
                              $displayTextM = 'Last Few';
                              $disabledM = '';
                            }else{
                              $displayTextM = 'Fully Booked';
                              $weekDisableM = $disabledM = 'disabled';
                              $eaCheckM = 1;
                            }
                          }
                        }
                        if( !empty( $l ) ){
                          $seatsMorAf = $lunchSeats - array_sum($l);
                          
                        }else{
                          $seatsMorAf = $lunchSeats;
                        }

                        $fullweekSeats[] = $seatsLu = ( $seatsMorAf < $lunchSeats )? $seatsMorAf: $lunchSeats;

                        if( $seatsLu > 15 ){
                          $displayTextL = 'Available'; 
                          $disabledL = '';                           
                        }elseif( in_array( $seatsLu, range( 6, 14 ) ) ){
                          $displayTextL = 'Limited Spaces';
                          $disabledL = '';
                        }elseif( in_array( $seatsLu, range( 1, 5 ) ) ){
                          $displayTextL = 'Last Few';
                          $disabledL = '';
                        }else{
                          $displayTextL = 'Fully Booked';
                          $disabledL = 'disabled';
                          
                        }
                        


                        /* if(!empty($l)){
                          $seatsLunch = $lunchSeats - array_sum($l);
                          echo 'Lunch: '.$seatsLunch.'<br>'; 
                        }else{
                          echo 'Lunch: '.$lunchSeats.'<br>';
                        } */
                        if(isset($selected_session->afernoon)){

                          if($selected_session->afernoon == '1'){
                              

                            if( !empty( $a ) ){
                              $seatsMorAf = $afternoonSeats - array_sum($a);
                              
                            }else{
                              $seatsMorAf = $afternoonSeats;
                            }

                            $fullweekSeatsA[] = $seatsAF = ( $seatsMorAf < $afternoonSeats )? $seatsMorAf: $afternoonSeats;

                            if( $seatsAF > 15 ){
                              $displayTextA = 'Available'; 
                              $disabledA = '';                                                   
                            }elseif( in_array( $seatsAF, range( 6, 14 ) ) ){
                              $displayTextA = 'Limited Spaces';
                              $disabledA = '';
                            }elseif( in_array( $seatsAF, range( 1, 5 ) ) ){
                              $displayTextA = 'Last Few';
                              $disabledA = '';
                            }else{
                              $displayTextA = 'Fully Booked';
                              $weekDisableA = $disabledA = 'disabled';
                              $eaCheckA = 1;
                            }
                          }
                        }
                        
                        if( $eaCheckA == 1 && $eaCheckM == 1 ){
                          $eaDisabled = 'disabled';
                        }else{
                          $eaDisabled = '';
                        }
                        if( $eaCheckA == 1 || $eaCheckM == 1 ){
                          $fullDisabled = 'disabled';
                        }else{
                          $fullDisabled = '';
                        }
                         if( $weekDisableM == 'disabled' && $weekDisableA == 'disabled' ){
                          $eaFDisabled = 'disabled';
                          $te = 'Fully Booked';
                        }else{
                          $eaFDisabled = '';
                        }
                        if( $weekDisableM == 'disabled' || $weekDisableA == 'disabled' ){
                          $fullWDisabled = 'disabled';
                        }else{
                          $fullWDisabled = '';
                        }
                        if( !empty( $fullweekSeatsM ) ){

                          $fullweekSeatsCheckM = min( $fullweekSeatsM ); 
                        }

                        if( $fullweekSeatsCheckM > 15 ){
                          $weekTextM = 'Available'; 
                          //$disabledA = '';                                                   
                        }elseif( in_array( $fullweekSeatsCheckM, range( 6, 14 ) ) ){
                          $weekTextM = 'Limited Spaces';
                          //$disabledA = '';
                        }elseif( in_array( $fullweekSeatsCheckM, range( 1, 5 ) ) ){
                          $weekTextM = 'Last Few';
                          //$disabledA = '';
                        }else{
                          $weekTextM = 'Fully Booked';                          
                          //$eaCheckA = 1;
                        }
                        if( !empty( $fullweekSeatsA ) ){

                          $fullweekSeatsCheckA = min( $fullweekSeatsA ); 
                        }

                        if( $fullweekSeatsCheckA > 15 ){
                          $weekTextA = 'Available';                                          
                        }elseif( in_array( $fullweekSeatsCheckA, range( 6, 14 ) ) ){
                          $weekTextA = 'Limited Spaces';
                        }elseif( in_array( $fullweekSeatsCheckA, range( 1, 5 ) ) ){
                          $weekTextA = 'Last Few';
                        }else{
                          $weekTextA = 'Fully Booked';
                        }

                        /*if(!empty($a)){
                          $seatsAfter = $afternoonSeats - array_sum($a);
                          echo 'Afternoon: '.$seatsAfter.'<br>';
                        }else{
                          echo 'Afternoon: '.$afternoonSeats.'<br>';
                        }*/



                        @endphp



                    <tr class="week{{$arrKey+1}}">
                      <td class="success"><b>@php //dd($camp); @endphp {{$full_weekTitle}}</b></td>

                      <!-- Early Drop -->
                      @if(isset($selected_session->early_drop))
                        @if($selected_session->early_drop == '1')
                        <td class="active">
                            <div class="cstm-check" id="chk-span-{{$arrKey+1}}{{$weekDaysValue}}early"><input id="checkbox-{{$arrKey+1}}{{$weekDaysValue}}early" class="checkbox-style col-1-W{{$arrKey+1}} {{$full_weekClass}}" week="{{$arrKey+1}}" day="{{$weekDaysValue}}" sel_type="early_drop" name="week[W{{$arrKey+1}}][early_drop][{{$weekDays}}]" type="checkbox" value="{{$arrKey+1}}-{{$weekDaysValue}}-early" {{ $eaDisabled }} @php if( $weekDaysValue == 'fullweek' ) echo $eaFDisabled;@endphp>
                              <label for="checkbox-{{$arrKey+1}}{{$weekDaysValue}}early" class="checkbox-style-3-label"></label>
                              <input type="hidden" id="pricing-{{$arrKey+1}}-{{$weekDaysValue}}-early" value="{{$fullweekEAPrice}}">
                            </div>
                        </td>
                        @endif
                      @endif

                      <!-- Morning -->
                      @if(isset($selected_session->morning))
                        @if($selected_session->morning == '1')
                        <td class="warning">
                          <div class="cstm-check" id="chk-span-{{$arrKey+1}}{{$weekDaysValue}}mor"><input id="checkbox-{{$arrKey+1}}{{$weekDaysValue}}mor" class="checkbox-style  col-2-W{{$arrKey+1}} {{$full_weekClass}}" week="{{$arrKey+1}}" day="{{$weekDaysValue}}" sel_type="morning" name="week[W{{$arrKey+1}}][camp][{{$weekDays}}]" type="checkbox" value="{{$arrKey+1}}-{{$weekDaysValue}}-mor" {{ $disabledM }} @php if( $weekDaysValue == 'fullweek' ) echo $weekDisableM;@endphp>
                            <label for="checkbox-{{$arrKey+1}}{{$weekDaysValue}}mor" class="checkbox-style-3-label"></label>
                            <input type="hidden" id="pricing-{{$arrKey+1}}-{{$weekDaysValue}}-mor" value="{{$fullweekAMPrice}}">
                          </div>
                        </td>
                        @endif
                      @endif

                      <!-- Lunch Club -->
                      @if(isset($selected_session->lunch))
                        @if($selected_session->lunch == '1')
                        <td class="active">
                          <div class="cstm-check" id="chk-span-{{$arrKey+1}}{{$weekDaysValue}}lunch"><input id="checkbox-{{$arrKey+1}}{{$weekDaysValue}}lunch" class="checkbox-style col-3-W{{$arrKey+1}} {{$full_weekClass}} lunch_club" week="{{$arrKey+1}}" day="{{$weekDaysValue}}" sel_type="lunch" name="week[W{{$arrKey+1}}][lunch][{{$weekDays}}]" type="checkbox" value="{{$arrKey+1}}-{{$weekDaysValue}}-lunch" {{ $disabledL }} @php if( $weekDaysValue == 'fullweek' ) echo $eaFDisabled;@endphp>
                            <label for="checkbox-{{$arrKey+1}}{{$weekDaysValue}}lunch" class="checkbox-style-3-label"></label>
                            <input type="hidden" id="pricing-{{$arrKey+1}}-{{$weekDaysValue}}-lunch" value="{{$fullweekLunchPrice}}">
                          </div>
                        </td>
                        @endif
                      @endif

                      <!-- Afternoon -->
                      @if(isset($selected_session->afernoon))
                        @if($selected_session->afernoon == '1')
                        <td class="warning">
                          <div class="cstm-check" id="chk-span-{{$arrKey+1}}{{$weekDaysValue}}noon"><input id="checkbox-{{$arrKey+1}}{{$weekDaysValue}}noon" class="checkbox-style col-4-W{{$arrKey+1}}  {{$full_weekClass}}" week="{{$arrKey+1}}" day="{{$weekDaysValue}}" sel_type="afternoon" name="week[W{{$arrKey+1}}][camp][{{$weekDays}}]" type="checkbox" value="{{$arrKey+1}}-{{$weekDaysValue}}-noon" {{ $disabledA }} @php if( $weekDaysValue == 'fullweek' ) echo $weekDisableA;@endphp>
                            <label for="checkbox-{{$arrKey+1}}{{$weekDaysValue}}noon" class="checkbox-style-3-label"></label>
                            <input type="hidden" id="pricing-{{$arrKey+1}}-{{$weekDaysValue}}-noon" value="{{$fullweekPMPrice}}">
                          </div>
                        </td>
                        @endif
                      @endif
                      

                      <!-- Full Day -->
                      @if(isset($selected_session->fullday))
                        @if($selected_session->fullday == '1')
                        <td class="warning">
                          <div class="cstm-check" id="chk-span-{{$arrKey+1}}{{$weekDaysValue}}full"><input id="checkbox-{{$arrKey+1}}{{$weekDaysValue}}full" class="checkbox-style col-5-W{{$arrKey+1}} full_day {{$full_weekClass}}" week="{{$arrKey+1}}" day="{{$weekDaysValue}}" sel_type="fullday" name="week[W{{$arrKey+1}}][camp][{{$weekDays}}]" type="checkbox" value="{{$arrKey+1}}-{{$weekDaysValue}}-full" {{ $fullDisabled }} @php if( $weekDaysValue == 'fullweek' ) echo $fullWDisabled;@endphp>
                            <label for="checkbox-{{$arrKey+1}}{{$weekDaysValue}}full" class="checkbox-style-3-label"></label>

                            @if($full_weekClass == 'full_week')
                            @php $fullweek_price = $days_count*($camp->fullday_price); //dd($fullweekFullPrice); @endphp
                              <input type="hidden" id="pricing-{{$arrKey+1}}-{{$weekDaysValue}}-full" value="{{$fullweekFullPrice}}">
                            @else
                              <input type="hidden" id="pricing-{{$arrKey+1}}-{{$weekDaysValue}}-full" value="{{$fullweekFullPrice}}">
                            @endif
                          </div>
                        </td>
                        @endif
                      @endif

                      <!-- Late Pickup -->
                      @if(isset($selected_session->late_pickup))
                        @if($selected_session->late_pickup == '1')
                        <td class="active">
                          <div class="cstm-check" id="chk-span-{{$arrKey+1}}-{{$weekDaysValue}}-late"><input id="checkbox-{{$arrKey+1}}{{$weekDaysValue}}late" class="checkbox-style col-6-W{{$arrKey+1}}  {{$full_weekClass}}" week="{{$arrKey+1}}" day="{{$weekDaysValue}}" sel_type="late_pickup" name="week[W{{$arrKey+1}}][late_pickup][{{$weekDays}}]" type="checkbox" value="{{$arrKey+1}}-{{$weekDaysValue}}-late" {{ $eaDisabled }} @php if( $weekDaysValue == 'fullweek' ) echo $eaFDisabled;@endphp>
                            <label for="checkbox-{{$arrKey+1}}{{$weekDaysValue}}late" class="checkbox-style-3-label"></label>
                            <input type="hidden" id="pricing-{{$arrKey+1}}-{{$weekDaysValue}}-late" value="{{$fullweekLSPrice}}">
                          </div>
                        </td>
                        @endif
                      @endif

                      @php 
                        $camp_data = DB::table('camp_prices')->where('camp_id',$camp->id)->first(); 
                      @endphp

                      @if(!empty($camp_data))
                          @php
                            $morning_seats = $camp_data->morning_seats;
                            $afternoon_seats = $camp_data->afternoon_seats; 

                            $shop_data = DB::table('shop_cart_items')->where('shop_type','camp')->where('type','order')->where('product_id',$camp->camp_id)->get();
                            $selected_week_data = [];
                          @endphp

                          @foreach($shop_data as $sh)
                            @php $selected_week_data[] = json_decode($sh->week); @endphp
                          @endforeach
                          @php $week = $selected_week_data; @endphp
                      @endif

                      @php //$AvSpaces = calculateAvSpaces($camp->camp_id); @endphp
                      
                      <!-- Available Spaces - Starts Here -->
                      <td class="active">
                       

                        @php

                          if( $weekDaysValue == 'fullweek' ) {
                            //echo $weekText;
                            if(isset($selected_session->morning)){

                              if($selected_session->morning == '1'){
                                echo '<b>Morning:</b> '.$weekTextM.'<br>';
                              }
                            }
                            if(isset($selected_session->afernoon)){

                              if($selected_session->afernoon == '1'){
                                echo '<b>Afternoon:</b> '.$weekTextA.'<br>';
                              }
                            }
                          }
                          else{
                            if(isset($selected_session->morning)){

                              if($selected_session->morning == '1'){
                                echo '<b>Morning:</b> '.$displayTextM.'<br>';
                              }
                            }
                            if(isset($selected_session->afernoon)){

                              if($selected_session->afernoon == '1'){
                                echo '<b>Afternoon:</b> '.$displayTextA.'<br>';
                              }
                            }
                            //echo 'Lunch: '.$displayTextL.'<br>';
                          }

                        @endphp
                        

                      </td>
                      <!-- Available Spaces - End Here -->

                    </tr>
                    @endif
                    @endif
                    @endforeach  
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        @endforeach
        @endif

      <div class="text-right">
        <div class="total-container">
          <input type="hidden" id="updated_price" name="price" value="">
          <label>Total = &pound; </label><span id="total-form">0</span>
        </div>

        @php 
            $camp_id = $camp->camp_id;
            $camp_details = DB::table('camps')->where('id',$camp_id)->first();
        @endphp

        <button id="submit-booking" type="submit" class="cstm-btn main_button">Add to cart</button>

      </div>

    </form>

    </div>
  </div>
</section>


@endsection

@section('scripts')
<script type="text/javascript">
$("#cost_type").change(function()
{
  var value1 = $(this).val(); 
  
  if(value1 == 'Cost')
  {
    $('#pay_meth').css('display','block');
  }
  else if(value1 == 'No Cost')
  {
    $('#pay_meth').css('display','none');
  } 

});

/*-----------------------------------------
  |
  |     Book a Camp - Table
  |
  |-----------------------------------------*/


function camp_checks(grid_input) {
    
    var col = grid_input.attr("class").match(/col[\w-]*\b/); 
   // console.log(col);
    col = col[0];

    var p = grid_input.attr("name").indexOf("Fullweek"); 
   
    
    // if full week is clicked then clear everything else in that column
    if ( p !== -1) {
      console.log("Full week clicked");
      if (grid_input.prop("checked")) { 

      
        // clear items in this column except full_week
        var ele = "input."+col;
        // var ele = ".camp_grid input."+col;
        $(ele).not(".full_week").prop("checked",false);
        $(ele).not(".full_week").data("checked", false);
      }
    }
    else {
      // untick full week option for that column
      console.log("untick full week");
      //var ele = ".camp_grid input.full_week."+col;
      var ele = "input.full_week."+col; 

      // $('.full_week').prop("checked",false);

      $(ele).prop("checked",false);
      $(ele).removeAttr("checked");
      $(ele).data("checked", false);
    }
    
    // clear lunch club if full day is checked
    if ($(grid_input).hasClass("full_day")) {

      console.log("Full day clicked");
      // console.log( $(grid_input).closest("tr"));
      $(grid_input).closest("tr").find(".lunch_club").prop("checked",false);
      $(grid_input).closest("tr").find(".lunch_club").data("checked",false);
    }
    if ($(grid_input).hasClass("lunch_club")) {

      console.log("lunch club clicked");
      if ($(grid_input).closest("tr").find(".full_day").prop("checked")==true) {

        // console.log("and full day checked");
        $(grid_input).prop("checked",false);
        $(grid_input).data("checked",false);
      }
    }
    
}; // function camp_checks



$(".checkbox-style").click(function(){

  var total = 0;

  if ($(this).data("checked")) {
    $(this).removeAttr("checked");
    $(this).data("checked", false);
  } else {
    $(this).data("checked", true);
  }

 
// console.log($(this));

  camp_checks($(this));

  
  $("input.checkbox-style").each(function () {

    var checkboxID = $(this).attr("id");
    var checkboxValue = $(this).val();
    // console.log(checkboxID);
    // console.log(checkboxValue);
    if($("#"+checkboxID).is(":checked")) {
      total = total + parseFloat($("#pricing-"+checkboxValue).val()); 
      encode_total = window.btoa(total);

      // Round Off upto 2 decimals
      var num = total;
      total_val = num.toFixed(2); 
    }
  });


  if ($("input.checkbox-style:checked").length > 0)
  {
      // any one is checked
  }
  else
  {
    total = 0; 
    encode_total = window.btoa(total);

    // Round Off upto 2 decimals
    var num = total;
    total_val = num.toFixed(2);
  }
  
  $("#total-form").text(total_val);
  $("#updated_price").val(encode_total);

  // if(total > 0) {
  //   $("#total-form").text(total);
  //   $("#updated_price").val(total);
  // }
  // else {
  //   $("#total-form").text("");
  // }
});


$("#submit-booking").click(function() {
  
  if($("#child-selection").val() == "") {
    alert("Please select a child");
    return false;
  }

  var chkChecked = "";
  $("input.checkbox-style").each(function () {

    var checkboxID = $(this).attr("id");

    if($("#"+checkboxID).is(":checked")) {
      chkChecked = 1;
    }
  });

  if(chkChecked != 1) {
    alert("Please choose booking options");
    return false;
  }
  
});
</script>
@endsection