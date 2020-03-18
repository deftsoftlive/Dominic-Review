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

@include('vendors.errors')
 



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
                             {{textbox($errors,'Title*','title', $deal->title)}}
                           </div>

                           <div class="col-lg-6">
                            <label class="control-label">Type Of Deal's </label>
                             <div class="form-group">	
                             <select class="form-control" id="type_of_deal" class="form-control" 
                            name="type_of_deal">
                            <option value="">Select</option>
                                <option {{ $deal->type_of_deal == '0' ? 'selected' : '' }} value="0">Universal</option>
                                <option {{ $deal->type_of_deal == '1' ? 'selected' : '' }} value="1">Assign Packages</option>
                            </select>
                              <!-- {{selectsimple($errors, "Type Of Deal's", 'type_of_deal',[0 => 'Universal',1 => 'Assign Packages', $deal->type_of_deal])}} -->
                          </div>
                          </div>
                          <div class="col-lg-6" style="display: {{ $deal->type_of_deal == '1' ? 'block' : 'none' }}">
                          	<div class="form-group">
                            <label class="control-label">Packages </label>
                            <select class="form-control" id="packages" class="form-control" 
                            name="packages">
                            <option value="">Select</option>
                            @foreach($packages as $package)
                                <option {{ $deal->packages == $package->id ? 'selected' : '' }} value="{{$package->id}}">{{$package->title}}</option>
                                @endforeach
                            </select>
                          	</div>
                          </div>
                          
                          <div class="col-lg-6" style="display: {{ $deal->type_of_deal == '0' ? 'block' : 'none' }}"> 
                            {{textbox($errors, 'Deal Code*', 'deal_code', $deal->deal_code)}}
                           </div>                          

                          <div class="col-lg-6">
                              {{selectsimple($errors,"Deal's Life",'deal_life',[0 => 'Permanent',1 => 'According to Expiry Date'],$deal->deal_life)}}
                          </div>

                           <div class="col-lg-6" style="display: {{ $deal->deal_life == '1' ? 'block' : 'none' }}">
                            {{datebox($errors, 'Start Date', 'start_date', date('Y-m-d',strtotime($deal->start_date)))}}
                           </div>

                           <div class="col-lg-6" style="display:  {{ $deal->deal_life == '1' ? 'block' : 'none' }}">
                          {{datebox($errors,'Expiry Date','expiry_date', date('Y-m-d',strtotime($deal->expiry_date)))}}
                          </div>

                           <div class="col-lg-6">
                              {{selectsimple($errors, "Deal's Off Type", 'deal_off_type',[0 => 'Percent',1 => 'Direct'], $deal->deal_off_type)}}
                          </div>
                          <div class="col-lg-6">
                            {{textbox($errors, 'Percent/Amount*', 'amount', $deal->amount)}}
                           </div>

                            <div class="col-lg-12" style="display: none;" id="min_rs">
                            {{textbox($errors, 'Apply on Min Order Amount*', 'min_amount',$deal->min_price)}}
                           </div>
                          <div class="col-lg-6">
                             {{textarea($errors,'Description*','description',$deal->description)}}
                          </div>
                           <div class="col-lg-6">
                            {{textarea($errors,'Deal Message Text*','message_text',$deal->message_text)}}
                          </div>
                           <div class="col-lg-6">
                              <!-- {{choosefile($errors,'Picture For This Deal*','image')}} -->
                            <div class="form-group">
                              <!-- <label class="label-file">Picture For This Deal*</label> -->
                               <input type="file" accept="image/*" onchange="ValidateSingleInput(this, 'image_src')" class="form-control" name="image">
                           </div>

                            </div>
                            <div class="col-md-6">
                               <div class="form-group">
                             <div class="deal-container">
                              <img src="{{url($deal->image)}}" id="image_src" width="200">
                           </div>
                         </div>
                           </div>
                        </div>
                         <div class="form-group"><button id="dealFormBtn" class="cstm-btn">Save</button></div>
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
