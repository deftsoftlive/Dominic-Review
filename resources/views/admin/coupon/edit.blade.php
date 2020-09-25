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

  <form role="form" method="post" class="manage_coupon" id="venueForm" enctype="multipart/form-data">
                
                   @csrf
                  
                   {{textbox($errors,'Coupon Code<span class="cst-upper-star">*</span>','coupon_code', $venue->coupon_code)}}

                   @php $current_date = date("Y-m-d"); @endphp

                   <label class="control-label">Start Date<span class="cst-upper-star">*</span></label>
                   <input type="date" class="form-control" name="start_date" min="{{$current_date}}" value="{{$venue->start_date}}"><br/>

                   <label class="control-label">End Date<span class="cst-upper-star">*</span></label>
                   <input type="date" class="form-control" name="end_date" min="{{$current_date}}" value="{{$venue->end_date}}"><br/>

                   <label class="control-label">Discount Type<span class="cst-upper-star">*</span></label>
                    <select class="form-control" name="discount_type">
                        <option value="0" {{ $venue->discount_type == '0' ?  'selected' : '' }}>Amount</option>
                        <option value="1" {{ $venue->discount_type == '1' ?  'selected' : '' }}>Percentage</option>
                    </select><br/>

                   {{textbox($errors,'Coupon use limit<span class="cst-upper-star">*</span>','uses', $venue->uses)}}
                   <!-- {{textbox($errors,'Amount<span class="cst-upper-star">*</span>','amount', $venue->amount)}} -->
                   {{textbox($errors,'Discount amount<span class="cst-upper-star">*</span>','flat_discount', $venue->flat_discount)}}

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
                                $selected_courses = explode(',',$venue->courses);
                                $selected_camps = explode(',',$venue->camps);
                                $selected_products = explode(',',$venue->products);

                                $courses = DB::table('courses')->where('status','1')->get();
                                $camps = DB::table('camps')->where('status','1')->get();
                                $products = DB::table('products')->where('parent','0')->where('shop_id','0')->get();
                              @endphp

                              <label class="control-label">Courses</label>
                              <input type="checkbox" id="checkbox" >Select All
                              <select id="multiple" class="form-control" name="courses[]" multiple> 
                                <option name="courses[]" value="">All</option>
                                  <!-- To get all engineers -->
                                  @if(isset($courses))
                                    @foreach($courses as $co)
                                         @php
                                           if(in_array($co->id,$selected_courses)){
                                              $selectedDefault  = 'selected';
                                           }else{
                                              $selectedDefault  = '';
                                           }
                                         @endphp

                                        <option name="courses[]" {{$selectedDefault}} value="{{$co->id}}">{{$co->title}}</option>
                                    @endforeach                                        
                                  @endif

                              </select>

                              <label class="control-label">Camps</label>
                              <input type="checkbox" id="checkbox1" >Select All
                              <select id="multiple1" class="form-control" name="camps[]" multiple> 
                                <option name="camps[]" value="">All</option>
                                  <!-- To get all engineers -->
                                  @if(isset($camps))
                                    @foreach($camps as $co)
                                         @php
                                           if(in_array($co->id,$selected_camps)){
                                              $selectedDefault  = 'selected';
                                           }else{
                                              $selectedDefault  = '';
                                           }
                                         @endphp

                                        <option name="camps[]" {{$selectedDefault}} value="{{$co->id}}">{{$co->title}}</option>
                                    @endforeach                                        
                                  @endif

                              </select>

                              <label class="control-label">Products</label>
                              <input type="checkbox" id="checkbox2" >Select All
                              <select id="multiple2" class="form-control" name="products[]" multiple> 
                                <option name="products[]" value="">All</option>
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

                            $('#multiple1').selectator({
                              showAllOptionsOnFocus: true,
                              searchFields: 'value text subtitle right'
                            });

                            $('#multiple2').selectator({
                              showAllOptionsOnFocus: true,
                              searchFields: 'value text subtitle right'
                            });
                            </script>
                            <!--new custom select option end--> 
                      </div>
                  </div>

                <div class="card-footer pl-0">
                  <button type="submit" id="btnVanue" class="btn btn-primary">Submit</button>
                </div>
 </form>
<!-- <div class="demo">
  <div class="wrapper" >
  <select multiple class="demo_slect">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
  </select>
  <button type="button" class="chosen-toggle select">Select all</button>
  <button type="button" class="chosen-toggle deselect">Deselect all</button>
</div>
<div class="wrapper">
  <select id="second" name="ranktypeselect[]" multiple="multiple" size="5" class="demo_slect">
    <optgroup label="OFF">
      <option>QB</option>
      <option>RB</option>
      <option>WR</option>
      <option>TE</option>
      <option>OL</option>
    </optgroup>
    <optgroup label="IDP">
      <option>NT</option>
      <option>DT</option>
      <option>DE</option>
      <option>DL</option>
      <option>DB</option>
      <option>LB</option>
      <option>SF</option>
      <option>CB</option>
    </optgroup>
    <optgroup label="ETC">
      <option>K</option>
      <option>P</option>
      <option>LS</option>
      <option>D/ST</option>
    </optgroup>
  </select>

  <button type="button" class="chosen-toggle select">Select all</button>
  <button type="button" class="chosen-toggle deselect">Deselect all</button>
</div>
 
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.7.0/chosen.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.7.0/chosen.jquery.min.js"></script>
<script type="text/javascript">
  $('select.demo_slect').chosen();

  $('.chosen-toggle').each(function() { 
      $(this).on('click', function(){ 
           $(this).parent().find('option').prop('selected', $(this).hasClass('select')).parent().trigger('chosen:updated');
      });
  });
</script> 
</div> -->

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
<script type="text/javascript">
$(document).ready(function() {
    $("#checkbox").click(function(){
      if($("#checkbox").is(':checked') ){ //select all
        $("#multiple").find('option').prop("selected",true);
        $("#multiple").trigger('change');
      } else { //deselect all
        $("#multiple").find('option').prop("selected",false);
        $("#multiple").trigger('change');
      }
  });

    $("#checkbox1").click(function(){
      if($("#checkbox1").is(':checked') ){ //select all
        $("#multiple1").find('option').prop("selected",true);
        $("#multiple1").trigger('change');
      } else { //deselect all
        $("#multiple1").find('option').prop("selected",false);
        $("#multiple1").trigger('change');
      }
  });

    $("#checkbox2").click(function(){
      if($("#checkbox2").is(':checked') ){ //select all
        $("#multiple2").find('option').prop("selected",true);
        $("#multiple2").trigger('change');
      } else { //deselect all
        $("#multiple2").find('option').prop("selected",false);
        $("#multiple2").trigger('change');
      }
  });
});
</script>
@endsection
