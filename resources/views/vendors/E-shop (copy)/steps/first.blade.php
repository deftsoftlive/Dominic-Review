@extends('vendors.E-shop.steps.layouts')
@section('innerContent')

 <form method="post" id="shopCreate" action="{{url(route('shop.ajax.firstStep',1))}}"> 
<div class="panel" id="step-shop-1" data-step="1">
 <div class="shop-form-card">
  <header class="panel__header text-center">
                      <h2 class="panel__title">Name Your Shop</h2>
                      <p class="panel__subheading">Choose a memorable name that reflects your style.</p>
                  </header>
<div class="create-shop-form">
   <div class="row">
       <div class="col-lg-12">
           
               
                <div id="globalMessages"></div>
                <div class="row">
                  
                        <div class="col-lg-8">
                            <div class="form-group">
                              <div class="cstm-form-control-wrap">
                                <input type="text" name="shop_name"
                                 class="form-control shop-input"
                                  placeholder="Enter your shop name"
                                  value="{{$shop->count() > 0 ? $e->name : ''}}">
                                <input type="hidden" 
                                       id="checkAvailabilty" 
                                       value="{{url(route('shop.ajax.checkAvailablityValiadation'))}}">
                            </div>
                            </div>
                                  <div class="form-group">
                                  <p>Your shop name will appear in your shop and next to each of your listings throughout ENVISIUN. After you open your shop, you can change your name once. </p>
                                  </div>
                                 <a href="javascript:void(0);" class="normal-link mt-3">Here are some tips for picking a shop name.</a>
 
                        </div>


                        <div class="col-lg-4">
                          @if($shop->count() > 0)
                          <input type="hidden" name="logo" value="{{$shop->count() > 0 && $e->logo != '' ? url($e->logo) : ''}}">
                          @endif
                            <!-- Upload  -->
                          <div class="uploader file-upload-form {{$shop->count() > 0 && $e->logo != '' ? 'hasFile' : ''}}">
                            <!-- <input id="file-upload" type="file" name="logo" accept="image/*" /> -->
                              <input type="file" id="file-upload" name="logo" accept="image/*" onchange="ValidateSingleInputs(this, 'file-image')" id="logo" class="form-control">
                            <label for="file-upload" id="file-drag">
                              <img 
                              id="file-image" 
                              src="{{$shop->count() > 0 && $e->logo != '' ? url($e->logo) : ''}}" 
                              alt="Preview" 
                              class="hidden" 
                              style="display:{{$shop->count() > 0 && $e->logo != '' ? 'block' : 'none'}};"
                              >
                              <div id="start">
                                <i class="fa fa-download" aria-hidden="true"></i>
                                
                                <div id="notimage" class="hidden">Please select an image</div>
                                <span id="file-upload-btn" class="btn btn-primary">Select a file</span>
                              </div>
                              <div id="response" class="hidden">
                                <div id="messages"></div>
                                <progress class="progress" id="file-progress" value="0">
                                  <span>0</span>%
                                </progress>
                              </div>
                            </label>
                          </div>
                        </div> 
                      </div>
                  
                       

                      
                 
               
     </div>
   </div>
  
</div>

 
   
 


 </div>
</div>

<div class="wizard__footer">
              
               <button class="cstm-btn btn-submit next">Create Shop</button>
 </div>
 </form>

@endsection

@section('scripts')
<script src="{{url('/js/validations/imageShow.js')}}"></script>
<script type="text/javascript" src="{{url('/js/vendors/shop.js')}}"></script>
 










@endsection