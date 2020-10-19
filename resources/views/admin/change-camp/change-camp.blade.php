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
                <h4>Change Camp</h4>
            </div>
            <br/>
          </div>
        </div>
      </div>
    </div>
    <section class="book-camp-accordion-table">
        <div class="">
          <div class="">
            <div class="b-c-accordion">

              <div class="card-block table-border-style">
                <div class="table-responsive">
                    <table class="table table-bordered  cst-reports reports-detail" style="width:100%">
                      <tr>
                        <th>Date</th>
                        <th>Player Name</th> 
                        <th>Parent Name</th>
                        <th>Purchased Camp</th>
                      </tr>
                      <tr>
                        @php 
                          $camp = DB::table('camps')->where('id',$shop_cart_items->product_id)->first();
                        @endphp
                        <td style="width:25%"><p>@php echo date("d-m-Y",strtotime($shop_cart_items->created_at)); @endphp</p></td>
                        <td style="width:25%"><p>@php echo getUsername($shop_cart_items->child_id); @endphp</p></td>
                        <td style="width:25%"><p>@php echo getUsername($shop_cart_items->user_id); @endphp</p></td>
                        <td style="width:25%"><p>{{$camp->title}}</p></td>
                    </tr>
                    </table>
                </div>
              </div>




      <form action="{{route('save_change_camp')}}" id="camp_booking_table" class="booking_table camp_grid" method="POST">
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

                <input type="hidden" name="shop_id" value="{{$shop_cart_items->id}}">
                <input type="hidden" name="player" value="{{$shop_cart_items->child_id}}">
                <input type="hidden" name="parent_id" value="{{$shop_cart_items->user_id}}">
                <input type="hidden" name="old_camp_id" value="{{$shop_cart_items->product_id}}">

                  <label class="control-label">Change Camp<span class="cst-upper-star">*</span></label>
                  @php $camps = DB::table('camps')->where('status',1)->orderby('id','desc')->get(); @endphp
                  <select class="form-control" name="camp_id">
                    <option disabled selected="" value="">Select Camp</option>
                    @foreach($camps as $co)
                      <option value="{{$co->id}}">{{$co->title}}</option>
                    @endforeach
                  </select>

                  <br/>
                  
                  <label class="control-label">Payment Method<span class="cst-upper-star">*</span></label>
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
          <!-- <div class="col-sm-6">
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

                   
                    @if(!empty($camp_data->early_price))
                      <tr>
                        <td>Early Drop</td>
                        <td>{{$camp_data->early_time}}</td>
                        <td>£ {{$camp_data->early_price}}</td>
                      </tr>
                    @endif

                   
                    @if(!empty($camp_data->morning_price))
                      <tr>
                        <td>Morning</td>
                        <td>{{$camp_data->morning_time}}</td>
                        <td>£ {{$camp_data->morning_price}}</td>
                      </tr>
                    @endif


                    @if(!empty($camp_data->lunch_price))
                      <tr>
                        <td>Lunch Club</td>
                        <td>{{$camp_data->lunch_time}}</td>
                        <td>£ {{$camp_data->lunch_price}}</td>
                      </tr>
                    @endif

                 
                    @if(!empty($camp_data->afternoon_price))
                      <tr>
                        <td>Afternoon</td>
                        <td>{{$camp_data->afternoon_time}}</td>
                        <td>£ {{$camp_data->afternoon_price}}</td>
                      </tr>
                    @endif


                    @if(!empty($camp_data->latepickup_price))
                      <tr>
                        <td>Late Pickup</td>
                        <td>{{$camp_data->latepickup_time}}</td>
                        <td>£ {{$camp_data->latepickup_price}}</td>
                      </tr>
                    @endif

                  
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
          </div> -->
        </div>
    </section>
    <div class="b-c-table-container">
  <br/><br/>  
      <div class="accordion" id="b-c-table-accordion">

        @php 
          $camp_id = $camp->id;
          $camp = DB::table('camp_prices')->where('camp_id',$camp_id)->first();
          $arrSku = json_decode($camp->week); 
          $selected_session = json_decode($camp->selected_session); 
        @endphp

        

        <!-- <input type="hidden" name="camp_id" value="{{$camp_id}}"> -->
        @if(!empty($arrSku))
        @foreach($arrSku as $arrKey => $arrData)  

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
                      @php
                        $smallLetterWeekDays= strtolower($weekDays); 
                        $full_weekClass=$weekDays=='Fullweek'?'full_week':'';
                        $full_weekTitle=$weekDays=='Fullweek'?'Full Week':$weekDays;
                      @endphp 
                    <tr class="week{{$arrKey+1}}">
                      <td class="success"><b> {{$full_weekTitle}}</b></td>

                      <!-- Early Drop -->
                      @if(isset($selected_session->early_drop))
                        @if($selected_session->early_drop == '1')
                        <td class="active">
                            <div class="cstm-check" id="chk-span-{{$arrKey+1}}{{$weekDaysValue}}early"><input id="checkbox-{{$arrKey+1}}{{$weekDaysValue}}early" class="checkbox-style col-1-W{{$arrKey+1}} {{$full_weekClass}}" week="{{$arrKey+1}}" day="{{$weekDaysValue}}" sel_type="early_drop" name="week[W{{$arrKey+1}}][early_drop][{{$weekDays}}]" type="checkbox" value="{{$arrKey+1}}-{{$weekDaysValue}}-early">
                              <label for="checkbox-{{$arrKey+1}}{{$weekDaysValue}}early" class="checkbox-style-3-label"></label>
                              <input type="hidden" id="pricing-{{$arrKey+1}}-{{$weekDaysValue}}-early" value="{{$camp->early_price}}">
                            </div>
                        </td>
                        @endif
                      @endif

                      <!-- Morning -->
                      @if(isset($selected_session->morning))
                        @if($selected_session->morning == '1')
                        <td class="warning">
                          <div class="cstm-check" id="chk-span-{{$arrKey+1}}{{$weekDaysValue}}mor"><input id="checkbox-{{$arrKey+1}}{{$weekDaysValue}}mor" class="checkbox-style  col-2-W{{$arrKey+1}} {{$full_weekClass}}" week="{{$arrKey+1}}" day="{{$weekDaysValue}}" sel_type="morning" name="week[W{{$arrKey+1}}][camp][{{$weekDays}}]" type="radio" value="{{$arrKey+1}}-{{$weekDaysValue}}-mor">
                            <label for="checkbox-{{$arrKey+1}}{{$weekDaysValue}}mor" class="checkbox-style-3-label"></label>
                            <input type="hidden" id="pricing-{{$arrKey+1}}-{{$weekDaysValue}}-mor" value="{{$camp->morning_price}}">
                          </div>
                        </td>
                        @endif
                      @endif

                      <!-- Lunch Club -->
                      @if(isset($selected_session->lunch))
                        @if($selected_session->lunch == '1')
                        <td class="active">
                          <div class="cstm-check" id="chk-span-{{$arrKey+1}}{{$weekDaysValue}}lunch"><input id="checkbox-{{$arrKey+1}}{{$weekDaysValue}}lunch" class="checkbox-style col-3-W{{$arrKey+1}} {{$full_weekClass}} lunch_club" week="{{$arrKey+1}}" day="{{$weekDaysValue}}" sel_type="lunch" name="week[W{{$arrKey+1}}][lunch][{{$weekDays}}]" type="checkbox" value="{{$arrKey+1}}-{{$weekDaysValue}}-lunch">
                            <label for="checkbox-{{$arrKey+1}}{{$weekDaysValue}}lunch" class="checkbox-style-3-label"></label>
                            <input type="hidden" id="pricing-{{$arrKey+1}}-{{$weekDaysValue}}-lunch" value="{{$camp->lunch_price}}">
                          </div>
                        </td>
                        @endif
                      @endif

                      <!-- Afternoon -->
                      @if(isset($selected_session->afernoon))
                        @if($selected_session->afernoon == '1')
                        <td class="warning">
                          <div class="cstm-check" id="chk-span-{{$arrKey+1}}{{$weekDaysValue}}noon"><input id="checkbox-{{$arrKey+1}}{{$weekDaysValue}}noon" class="checkbox-style col-4-W{{$arrKey+1}}  {{$full_weekClass}}" week="{{$arrKey+1}}" day="{{$weekDaysValue}}" sel_type="afternoon" name="week[W{{$arrKey+1}}][camp][{{$weekDays}}]" type="radio" value="{{$arrKey+1}}-{{$weekDaysValue}}-noon">
                            <label for="checkbox-{{$arrKey+1}}{{$weekDaysValue}}noon" class="checkbox-style-3-label"></label>
                            <input type="hidden" id="pricing-{{$arrKey+1}}-{{$weekDaysValue}}-noon" value="{{$camp->afternoon_price}}">
                          </div>
                        </td>
                        @endif
                      @endif
                      
                      <!-- Full Day -->
                      @if(isset($selected_session->fullday))
                        @if($selected_session->fullday == '1')
                        <td class="warning">
                          <div class="cstm-check" id="chk-span-{{$arrKey+1}}{{$weekDaysValue}}full"><input id="checkbox-{{$arrKey+1}}{{$weekDaysValue}}full" class="checkbox-style col-5-W{{$arrKey+1}} full_day {{$full_weekClass}}" week="{{$arrKey+1}}" day="{{$weekDaysValue}}" sel_type="fullday" name="week[W{{$arrKey+1}}][camp][{{$weekDays}}]" type="radio" value="{{$arrKey+1}}-{{$weekDaysValue}}-full">
                            <label for="checkbox-{{$arrKey+1}}{{$weekDaysValue}}full" class="checkbox-style-3-label"></label>

                            @if($full_weekClass == 'full_week')
                            @php $fullweek_price = ($camp->fullday_price); @endphp
                              <input type="hidden" id="pricing-{{$arrKey+1}}-{{$weekDaysValue}}-full" value="{{$fullweek_price}}">
                            @else
                              <input type="hidden" id="pricing-{{$arrKey+1}}-{{$weekDaysValue}}-full" value="{{$camp->fullday_price}}">
                            @endif
                          </div>
                        </td>
                        @endif
                      @endif

                      <!-- Late Pickup -->
                      @if(isset($selected_session->late_pickup))
                        @if($selected_session->late_pickup == '1')
                        <td class="active">
                          <div class="cstm-check" id="chk-span-{{$arrKey+1}}-{{$weekDaysValue}}-late"><input id="checkbox-{{$arrKey+1}}{{$weekDaysValue}}late" class="checkbox-style col-6-W{{$arrKey+1}}  {{$full_weekClass}}" week="{{$arrKey+1}}" day="{{$weekDaysValue}}" sel_type="late_pickup" name="week[W{{$arrKey+1}}][late_pickup][{{$weekDays}}]" type="checkbox" value="{{$arrKey+1}}-{{$weekDaysValue}}-late">
                            <label for="checkbox-{{$arrKey+1}}{{$weekDaysValue}}late" class="checkbox-style-3-label"></label>
                            <input type="hidden" id="pricing-{{$arrKey+1}}-{{$weekDaysValue}}-late" value="{{$camp->latepickup_price}}">
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

                      <td class="active">&nbsp;</td>
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
        var ele = ".camp_grid input."+col;
        $(ele).not(".full_week").prop("checked",false);
        $(ele).not(".full_week").data("checked", false);
      }
    }
    else {
      // untick full week option for that column
      console.log("untick full week");
      var ele = ".camp_grid input.full_week."+col;
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
    }
  });
  if(total > 0) {
    $("#total-form").text(total);
    $("#updated_price").val(total);
  }
  else {
    $("#total-form").text("");
  }
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