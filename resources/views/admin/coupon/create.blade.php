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

              <form role="form" class="manage_coupon" method="post" id="venueForm" enctype="multipart/form-data">
                
                   @csrf
                  
                   {{textbox($errors,'Coupon Code*','coupon_code')}}

                   @php $current_date = date("Y-m-d"); @endphp

                   <label class="control-label">Start Date<span class="cst-upper-star">*</span></label>
                   <input type="date" class="form-control" name="start_date" min="{{$current_date}}"><br/>

                   <label class="control-label">End Date<span class="cst-upper-star">*</span></label>
                   <input type="date" class="form-control" name="end_date" min="{{$current_date}}"><br/>

                   <label class="control-label">Discount Type<span class="cst-upper-star">*</span></label>
                    <select class="form-control" name="discount_type">
                      <option value="0">Amount</option>
                      <option value="1">Percentage</option>
                    </select><br/>

                   {{textbox($errors,'Coupon use limit*','uses')}}
                   <!-- {{textbox($errors,'Amount*','amount')}} -->
                   {{textbox($errors,'Discount amount*','flat_discount')}}

                   <!-- <div class="col-sm-12"> -->
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

                        <label class="control-label">Courses</label>
                        <input type="checkbox" id="checkbox" >Select All
                        <select id="multiple" name="courses[]" class="form-control" multiple>
                        	@php $courses = DB::table('courses')->where('status','1')->get(); @endphp
                            <option name="courses[]" value="">All</option>
                            @foreach($courses as $co)
                            <option data-att="{{$co->id}}" name="courses[]" value="{{$co->id}}">{{$co->title}}</option>
                            @endforeach
                        </select>

                        <label class="control-label">Camps</label>
                        <input type="checkbox" id="checkbox1" >Select All
                        <select id="multiple1" name="camps[]" class="form-control" multiple>
                        	@php $camps = DB::table('camps')->where('status','1')->get(); @endphp
                            <option name="camps[]" value="">All</option>
                            @foreach($camps as $co)
                            <option data-att="{{$co->id}}" name="camps[]" value="{{$co->id}}">{{$co->title}}</option>
                            @endforeach
                        </select>

                        <label class="control-label">Products</label>
                        <input type="checkbox" id="checkbox2" >Select All
                        <select id="multiple2" name="products[]" class="form-control" multiple>
                        	@php $products = DB::table('products')->where('parent','0')->where('shop_id','0')->get(); @endphp
                            <option name="products[]" value="">All</option>
                            @foreach($products as $co)
                            <option data-att="{{$co->id}}" name="products[]" value="{{$co->id}}">{{$co->name}}</option>
                            @endforeach
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
                    <!-- </div> -->
                </div>

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
