@extends('inc.homelayout')
@section('title', 'DRH|Listing')
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
@php $base_url = \URL::to('/'); @endphp
<section class="inner-banner b-camp-detail img-manage-cust" style="background: url({{$base_url}}/public/uploads/{{ !empty($camp->banner_image) ? 'camp-banner/' : '' }}{{ !empty($camp->banner_image) ? $camp->banner_image : getAllValueWithMeta('book_camp_banner_image', 'book-a-camp') }});">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="inner-banner-content">
          <h2 class="inner-banner-heading">{{ getAllValueWithMeta('book_camp_title', 'book-a-camp') }}</h2>
        </div>
      </div>
    </div>
  </div>
</section>

@if(Session::has('success'))               
    <div class="alert_msg alert alert-success">
        <p>{{ Session::get('success') }} </p>
    </div>
@elseif(Session::has('error'))
    <div class="alert_msg alert alert-danger">
        <p>{{ Session::get('error') }} </p>
    </div>
@endif

@if($camp->popup_enable == 1)
  @if(!empty(Session::get('success')))
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script>
          $(function(){
            $('#b-c-modal').modal('show');
          });
        </script>
  @endif
@endif
<section class="book-camp section-padding cstm-book-camp">
  <div class="container">
    <div class="camp-logo-section">
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <a href="javascript:void(0);" class="inner-logo"><img src="{{URL::asset('/uploads')}}/{{$camp->logo}}"></a>
          </div>
          <div class="col-sm-8">
            <div class="camp-logo-section">
              <h2>Camp Name</h2>
              <!-- <p>{{$camp->title}} @ {{$camp->location}} – {{$camp->term}}</p> -->
              <p>{{$camp->title}}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <section class="book-camp-accordion-table">
        <div class="row">
          <div class="col-sm-6">
            <div class="b-c-accordion">
              <div id="accordion">
                <!-- *************************
                  |   Accordian - Start Here
                  |***************************** -->
                @foreach($accordian_book_a_camp as $acc)
                <div class="card @if($acc->color == '#001642')blue @elseif($acc->color == '#00afef')sky-blue @elseif($acc->color == '#bea029')yellow @endif">
                  <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                      <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$acc->id}}" aria-expanded="false" aria-controls="collapse{{$acc->id}}">
                      {{$acc->title}}
                      </button>
                    </h5>
                  </div>
                  <div id="collapse{{$acc->id}}" class="collapse" aria-labelledby="heading{{$acc->id}}" data-parent="#accordion" style="">
                    <div class="card-body">
                      {!! $acc->description !!}
                    

                    @php 
                      $acc_id = $acc->id;
                      $accor_pdfs = DB::table('accordian_pdfs')->where('accordian_id','=', $acc_id)->get(); 
                    @endphp

                  @if(count($accor_pdfs)> 0)
                    @foreach($accor_pdfs as $pdf)
                <a target="_blank" href="{{URL::asset('/uploads/accordian')}}/{{$pdf->pdf}}" class="course-pdf-icon"><i class="fa fa-file-pdf"></i>{{$pdf->accordian_title}}</a>
                      @endforeach
                  @endif
                  </div>
                  </div>
                </div>
                @endforeach
                <!-- *************************
                  |   Accordian - End Here
                  |***************************** -->
              </div>


      <form action="{{route('submit-book-a-camp')}}" id="camp_booking_table" class="booking_table camp_grid" method="POST">
        @csrf    
              <div class="select-child">
                <h4>Select Child: </h4>

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
                <select id="child-selection" name="child_id" class="book_camp_child selectpicker">
                  <option value="" selected="" disabled="">Select Player</option>
                  @if(Auth::check() && !empty($children))
                    @foreach($children as $child)
                      <option value="{{$child->id}}">{{$child->name}}</option>
                    @endforeach
                  @endif
                </select>
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
  {!! $camp->usefull_info !!}
  <br/><br/>  
      <div class="accordion" id="b-c-table-accordion">

        <!-- Particular Camp Data -->
        @php 
          $camp_id = $camp->id;
          $camp = DB::table('camp_prices')->where('camp_id',$camp_id)->first(); 

          // Week selection of camp
          $arrSku = json_decode($camp->week); 

          // Selected sessions
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

                <!-- Week's Date -->
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

              <!-- Selected session of early drop i.e. early drop will appear or not -->
              @if(isset($selected_session->early_drop))
                @if($selected_session->early_drop == '1')
                <th class="info ">
                  <div><span><b>Early Drop Off</b></span></div>
                </th>
                @endif
              @endif

              <!-- Selected session of morning i.e. morning will appear or not -->
              @if(isset($selected_session->morning))
                @if($selected_session->morning == '1')
                <th class="info ">
                  <div><span><b>Morning</b></span></div>
                </th>
                @endif
              @endif

              <!-- Selected session of lunch club i.e. lunch club will appear or not -->
              @if(isset($selected_session->lunch))
                @if($selected_session->lunch == '1')
                <th class="info ">
                  <div><span><b>Lunch Club</b></span></div>
                </th>
                @endif
              @endif

              <!-- Selected session of afternoon i.e. afternoon will appear or not -->
              @if(isset($selected_session->afernoon))
                @if($selected_session->afernoon == '1')
                <th class="info ">
                  <div><span><b>Afternoon</b></span></div>
                </th>
                @endif
              @endif

              <!-- Selected session of fullday i.e. fullday will appear or not -->
              @if(isset($selected_session->fullday))
                @if($selected_session->fullday == '1')
                <th class="info ">
                  <div><span><b>Full Day</b></span></div>
                </th>
                @endif
              @endif

              <!-- Selected session of late pickup i.e. late pickup will appear or not -->
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
                          <div class="cstm-check" id="chk-span-{{$arrKey+1}}{{$weekDaysValue}}mor"><input id="checkbox-{{$arrKey+1}}{{$weekDaysValue}}mor" class="checkbox-style  col-2-W{{$arrKey+1}} {{$full_weekClass}}" week="{{$arrKey+1}}" day="{{$weekDaysValue}}" sel_type="morning" name="week[W{{$arrKey+1}}][camp][{{$weekDays}}]" type="radio" value="{{$arrKey+1}}-{{$weekDaysValue}}-mor" {{ $disabledM }} @php if( $weekDaysValue == 'fullweek' ) echo $weekDisableM;@endphp>
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
                          <div class="cstm-check" id="chk-span-{{$arrKey+1}}{{$weekDaysValue}}noon"><input id="checkbox-{{$arrKey+1}}{{$weekDaysValue}}noon" class="checkbox-style col-4-W{{$arrKey+1}}  {{$full_weekClass}}" week="{{$arrKey+1}}" day="{{$weekDaysValue}}" sel_type="afternoon" name="week[W{{$arrKey+1}}][camp][{{$weekDays}}]" type="radio" value="{{$arrKey+1}}-{{$weekDaysValue}}-noon" {{ $disabledA }} @php if( $weekDaysValue == 'fullweek' ) echo $weekDisableA;@endphp>
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
                          <div class="cstm-check" id="chk-span-{{$arrKey+1}}{{$weekDaysValue}}full"><input id="checkbox-{{$arrKey+1}}{{$weekDaysValue}}full" class="checkbox-style col-5-W{{$arrKey+1}} full_day {{$full_weekClass}}" week="{{$arrKey+1}}" day="{{$weekDaysValue}}" sel_type="fullday" name="week[W{{$arrKey+1}}][camp][{{$weekDays}}]" type="radio" value="{{$arrKey+1}}-{{$weekDaysValue}}-full" {{ $fullDisabled }} @php if( $weekDaysValue == 'fullweek' ) echo $fullWDisabled;@endphp>
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
<section class="click-here-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="click-sec-content">
          <h2 class="click-sec-tagline">{{ getAllValueWithMeta('book_camp_box_title', 'book-a-camp') }}</h2>
          <ul class="click-btn-content">
            <li>
              <figure>
                <img src="{{url('/')}}/public/images/click-btn-img.png">
              </figure>
            </li>
            <li>
              <a href="{{ getAllValueWithMeta('book_camp_button_url', 'book-a-camp') }}" target="_blank" class="cstm-btn main_button">{{ getAllValueWithMeta('book_camp_button_title', 'book-a-camp') }}</a>
            </li>
            <li>
              <figure>
                <img src="{{url('/')}}/public/images/click-btn-img.png">
              </figure>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Book a camp - Popup -->
<div class="dg_prod_sec modal fade" id="b-c-modal" tabindex="-1" role="dialog" aria-labelledby="b-c-modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="b-c-modalLabel">{{$camp_details->popup_title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- <h2></h2> -->

        @php 
          $products = explode(',',$camp_details->products); 
        @endphp

        @if(count($products)>0 && !empty($products['0']))
        <div class="outer-table-wrap">
          <table>
            <thead>
              <th colspan="4">{{$camp_details->popup_subtitle}}</th>
            </thead>
       
              @foreach($products as $pro=>$data) 
                <tbody>
                  @php $prod_data = DB::table('products')->where('id',$data)->first();
                  $price = 0;

                  @endphp

                  @if( $prod_data->product_type == 1 )
                    @php $url = url('/shop/product').'/'.$prod_data->slug.'-1';
                    $slug = $prod_data->slug.'-1';
                    $prod_data = DB::table('products')->where('slug',$slug)->first();
                    @endphp

                  @else
                    @php $url = url('/shop/product').'/'.$prod_data->slug;
                    @endphp

                  @endif
                  @php 
                    $arr['price'] = ($prod_data->price);
                    $arr['sale_price'] = ($prod_data->price - $prod_data->sale_price);
                    $sale = $prod_data->sale_price;
                    $text  = '<div class="product-price">';
                    if($sale > 0){
                       $text .='<small>£'.custom_format($arr['price'],2).'</small>';
                    }
                    $text .='£'.custom_format($arr['sale_price'],2).'</div>';
                         
                  @endphp 
                  <td><img src="{{url('/')}}/{{isset($prod_data->thumbnail) ? $prod_data->thumbnail : ''}}" alt="" /></td>
                  <td>{{isset($prod_data->name) ? $prod_data->name : ''}}</td>
                  <td>@php echo $text; @endphp</td>
                  <td><a class="pop-view-item" target="_blank" href="{{ $url }}">View Item</a></td>
                </tbody>
              @endforeach       
          </table>
        </div>
        @else
        <br/>
        <h5 style="text-align: center;">No shop product is linked with this camp.</h5>
        <br/>
      @endif

      </div>
      <div class="modal-footer">
        <a href="{{url('/shop')}}"><button type="button" class="cstm-btn main_button">Go to Shop</button></a>
        <button type="button" onclick="moreChild();" class="cstm-btn main_button">Book more children</button>
          <a href="{{url('/shop/cart')}}"><button type="button" class="cstm-btn main_button">Continue to cart</button></a>
          <!-- <button type="button" class="cstm-btn" data-dismiss="modal">Continue to cart</button> -->
      </div>
    </div>
  </div>
</div>
@php $base_url = \URL::to('/'); @endphp
@endsection