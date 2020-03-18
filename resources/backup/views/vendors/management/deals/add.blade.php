@extends('vendors.management.layout')
@section('vendorContents')

<div class="container-fluid">


 <div class="page_head-card">
    <div class="page-info">
            <div class="page-header-title">
                <h3 class="m-b-10">{{$title}}</h3>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('vendor_dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                <li class="breadcrumb-item"><a href="{{url(route($addLink, $slug))}}">List</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Add</a></li>
            </ul>
        </div>
  </div>

    <div class="row">
       <div class="col-lg-12">
          <div class="card vendor-dash-card">
            <div class="card-header">
              <h3>{{$title}} </h3>
            </div>
                 <div class="card-body">  
                     <form method="post" id="dealForm" enctype="multipart/form-data">
                          @csrf
                         <div class="row"> 
                           <div class="col-lg-6">
                            {{textbox($errors,'Title*','title')}}
                           </div>

                           <div class="col-lg-6">
                              {{selectsimple($errors, "Type Of Deal's", 'type_of_deal',[0 => 'Universal',1 => 'Assign Packages'])}}
                          </div>
                          <div class="col-lg-6" style="display: none;">
                            <label>Packages</label>
                          	<select class="form-control" id="packages" class="form-control" 
                            name="packages">
                            <option value="">Select</option>
                            @foreach($packages as $package)
                                <option value="{{$package->id}}">{{$package->title}}</option>
                                @endforeach
                            </select>
                          </div>

                           <div class="col-lg-6"> 
                            {{textbox($errors, 'Deal Code*', 'deal_code')}}
                           </div>

                            <div class="col-lg-6">
                              {{selectsimple($errors, "Deal's Life", 'deal_life',[0 => 'Permanent',1 => 'According to Expiry Date'])}}
                          </div>

                            <div class="col-lg-6" style="display: none;">
                            {{datebox($errors, 'Start Date', 'start_date')}}
                            
                             <!--  <div class="form-group"><label>Start Date</label>
                                <input type="date" class="form-control valid" data-rule-required="false" id="start_date" name="start_date"/>
                              </div> -->

                           </div>

                           <div class="col-lg-6" style="display: none;">
                            {{datebox($errors, 'Expiry Date', 'expiry_date')}}
                            
                             <!--  <div class="form-group"><label>Expiry Date</label>
                                <input type="date" class="form-control valid" data-rule-required="false" id="expiry_date" name="expiry_date"/>
                              </div> -->
                           </div>

                            <div class="col-lg-6">
                              {{selectsimple($errors, "Deal's Off Type", 'deal_off_type',[0 => 'Percent',1 => 'Direct'])}}
                          </div>
                          <div class="col-lg-6">
                            {{textbox($errors, 'Percent/Amount*', 'amount')}}
                           </div>

                           
                           <div class="col-lg-6"> 
                            {{textarea($errors,'Description*','description')}}
                           </div>
                           <div class="col-lg-6"> 
                            {{textarea($errors,'Default Message Text*','message_text')}}
                           </div>
                           <div class="col-lg-6">
                            <!-- {{choosefile($errors, 'Picture For This Deal*', 'image')}} -->

                            <div class="form-group">
                              <!-- <label class="label-file">Picture For This Deal*</label> -->
                               <input type="file" accept="image/*" required onchange="ValidateSingleInput(this, 'image_src')" class="form-control" name="image">
                           </div>
                           
                         </div>
                         <div class="col-lg-6">
                           <div class="uploaded-img"><img src="" style="display: none" id="image_src" width="80"/></div>
                         </div>
                         
      <!--        <div class="form-group">
                <div class="col-lg-12">
                 
                      <div class="category-radio category-title">
                      <input type="radio" name="type" value="1" id="type-parmanently" >
                           <label for="type-parmanently">Permanent promotion</label>
 
                    </div>
                    
                    

                  </div>

                   <div class="col-lg-12">
                 
                      <div class="category-radio category-title">
                      <input type="radio" name="type" value="0" id="type-parmanently" >
                           <label for="type-parmanently">Permanent promotion</label>
 
                    </div>
                    
                    

                  </div>


</div> -->







                         <div class="form-group mt-4 col-lg-12"><button class="cstm-btn">Save</button></div>
                   </form>
                </div>
           </div>
         </div>
     </div>
 </div>
 
</div>
@endsection

@section('scripts')
<script src="{{url('/js/validations/dealValidation.js')}}"></script>
<script src="{{url('/js/validations/imageShow.js')}}"></script>
<script type="text/javascript">
  $('select[name="deal_life"]').change(function() {
        const selectedDealLife = $(this).children("option:selected").val();
        if(selectedDealLife === '1') {
          $('#start_date').parents('.col-lg-6').css('display', 'block');
          $('#expiry_date').parents('.col-lg-6').css('display', 'block');
        } else {
          $('#start_date').parents('.col-lg-6').css('display', 'none');
          $('#expiry_date').parents('.col-lg-6').css('display', 'none');
        }
    });

  $("#start_date").change(function() {
    $(this).parent('.form-group').find('label').eq(1).css('display', 'none');
  });

  $("#expiry_date").change(function() {
    $(this).parent('.form-group').find('label').eq(1).css('display', 'none');
  });

  $('select[name="type_of_deal"]').change(function() {
      const selectedDealLife = $(this).children("option:selected").val();
        if(selectedDealLife === '0') {
          $('#deal_code').parents('.col-lg-6').css('display', 'block');
          $('#packages').parents('.col-lg-6').css('display', 'none');
        } else if(selectedDealLife === '1') {
          $('#deal_code').parents('.col-lg-6').css('display', 'none');
          $('#packages').parents('.col-lg-6').css('display', 'block');
        } else {
          $('#deal_code').parents('.col-lg-6').css('display', 'none');
          $('#packages').parents('.col-lg-6').css('display', 'none');
        }
  });

</script>
@endsection
