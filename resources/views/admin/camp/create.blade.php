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
                    
                  @php
                    $count=1;  
                  @endphp

                  <div class="form-group">
                    <label class="control-label">Logo</label>
                    <input type="file" required accept="image/*" onchange="ValidateSingleInput(this, 'logo_src')" name="logo" id="selImage1">
                    @if ($errors->has('logo'))
                        <div class="error">{{ $errors->first('logo') }}</div>
                    @endif
                  </div>
                  <img src="" id="logo_src" style="width: 100px; height: 100px; display: none"/>
                  <br/><br/>

                   {{textbox($errors,'Camp Title*','title')}}
                   {{textbox($errors,'Location*','location')}}
                   {{textbox($errors,'Term*','term')}}

                   <div class="form-group">
                    <label class="label-file control-label">Category</label>
                    <select name="category" class="select-player">
                      @foreach($campcategory as $cat)
                        <option value="{{$cat->id}}">{{$cat->title}}</option>
                      @endforeach
                    </select>             
                   </div> 

                   {{textarea($errors,'Description*','description')}}
                   {{textarea($errors,'Usefull Information*','usefull_info')}}
                   {{textbox($errors,'Camp Date*','camp_date')}}
                   <!-- {{textbox($errors,'Price*','price')}} -->

                  <div class="form-group">
                    <label class="control-label">Image</label>
                    <input type="file" required accept="image/*" onchange="ValidateSingleInput(this, 'image_src')" name="image" id="selImage">
                    @if ($errors->has('image'))
                        <div class="error">{{ $errors->first('image') }}</div>
                    @endif
                  </div>
                  <img src="" id="image_src" style="width: 100px; height: 100px; display: none"/>
                  <br/><br/>

                  <!-- ***********************************************
                  |
                  |       CAMP PRICING MANAGEMENT - Start Here 
                  |
                  |*************************************************** -->

                  <div class="form-group">
                    <h5><u>Week</u></h5>
                    <div class="row">
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
                  <br/><br/>
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
                  <br></br>

                  <div class="form-group">
                    <h5><u>EARLY DROP OFF</u> <input type="checkbox" id="Week" name="Session[early_drop]" value="1"></h5>
                    <div class="row">
                      <div class="col-sm-4">{{textbox($errors,'Price','early_price')}}</div>
                      <div class="col-sm-4">{{textbox($errors,'Time','early_time')}}</div>
                      <div class="col-sm-4">{{textbox($errors,'% discount for Full week','early_percent')}}</div>
                    </div>
                  </div>

                  <div class="form-group">
                    <h5><u>MORNING</u> <input type="checkbox" id="Week" name="Session[morning]" value="1"></h5>
                    <div class="row">
                      <div class="col-sm-3">{{textbox($errors,'Price','morning_price')}}</div>
                      <div class="col-sm-3">{{textbox($errors,'Time','morning_time')}}</div>
                      <div class="col-sm-3">{{textbox($errors,'Seats','morning_seats')}}</div>
                      <div class="col-sm-3">{{textbox($errors,'% discount for Full week','morning_percent')}}</div>
                    </div>
                  </div>

                  <div class="form-group">
                    <h5><u>LUNCH CLUB</u> <input type="checkbox" id="Week" name="Session[lunch]" value="1"></h5>
                    <div class="row">
                      <div class="col-sm-4">{{textbox($errors,'Price','lunch_price')}}</div>
                      <div class="col-sm-4">{{textbox($errors,'Time','lunch_time')}}</div>
                      <div class="col-sm-4">{{textbox($errors,'% discount for Full week','lunch_percent')}}</div>
                    </div>
                  </div>

                  <div class="form-group">
                    <h5><u>AFTERNOON</u> <input type="checkbox" id="Week" name="Session[afternoon]" value="1"></h5>
                    <div class="row">
                      <div class="col-sm-3">{{textbox($errors,'Price','afternoon_price')}}</div>
                      <div class="col-sm-3">{{textbox($errors,'Time','afternoon_time')}}</div>
                      <div class="col-sm-3">{{textbox($errors,'Seats','afternoon_seats')}}</div>
                      <div class="col-sm-3">{{textbox($errors,'% discount for Full week','afternoon_percent')}}</div>
                    </div>
                  </div>

                  <div class="form-group">
                    <h5><u>FULL DAY</u> <input type="checkbox" id="Week" name="Session[fullday]" value="1"></h5>
                    <div class="row">
                      <div class="col-sm-4">{{textbox($errors,'Price','fullday_price')}}</div>
                      <div class="col-sm-4">{{textbox($errors,'Time','fullday_time')}}</div>
                      <div class="col-sm-4">{{textbox($errors,'% discount for Full week','fullday_percent')}}</div>
                    </div>
                  </div>

                  <div class="form-group">
                    <h5><u>LATE PICKUP</u> <input type="checkbox" id="Week" name="Session[late_pickup]" value="1"></h5>
                    <div class="row">
                      <div class="col-sm-4">{{textbox($errors,'Price','latepickup_price')}}</div>
                      <div class="col-sm-4">{{textbox($errors,'Time','latepickup_time')}}</div>
                      <div class="col-sm-4">{{textbox($errors,'% discount for Full week','latepickup_percent')}}</div>
                    </div>
                  </div>

                  <div class="form-group">
                    <h5><u>POPUP BOX</u></h5>
                      {{textbox($errors,'Title','popup_title')}}
                      {{textbox($errors,'Sub-title','popup_subtitle')}}
                  </div>

                  <div class="form-group">
                    <label class="label-file control-label">Enable/Disable - Popup Box</label>
                    <select name="popup_enable" class="select-player">
                      <option value="1">Enable</option>
                      <option value="0">Disable</option>
                    </select>
                  </div>

                  <div class="cst-select-close-opt cst-select-close-opt-ipad">
                        <link rel="stylesheet" type="text/css" href="https://harvesthq.github.io/chosen/chosen.css">
                        <script src="https://harvesthq.github.io/chosen/chosen.jquery.js"></script>
                        
                        <div id="user--output"></div>

                        <script>
                            document.getElementById('user--output').innerHTML = location.search;
                            $(".chosen-select--user").chosen();

                        </script>
                        <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
                        <link href="https://www.jqueryscript.net/demo/Select-Replacement-Plugin-jQuery-Selectator/fm.selectator.jquery.css" rel="stylesheet" type="text/css">

                        <label class="control-label">Products</label>
                        <select id="multiple" name="products[]" class="form-control" multiple>
                          @php $products = DB::table('products')->where('parent','0')->where('shop_id','0')->get(); @endphp
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

                        </script>
                </div>


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

</div>
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
