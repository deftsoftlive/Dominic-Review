


<div class="  variableBox">
	<!-- <div class="loader3"><img src="{{url('Reload-1s-200px.webp')}}"></div> -->
	   
	  	<div class="top-field-wrap">

	  		<h3>Product Variations</h3>
	  		<div class="row">
          <div class="col-md-6">
	  			      <select name="variation_type" id="variationType" class="v-cstm-select form-control">
	          	       <option value="0" {{$product->product_type == 0 ? 'selected' : ''}}>Simple Product</option>
	          	       <option value="1" {{$product->product_type == 1 ? 'selected' : ''}}>Variable Product</option>
	               </select>
               </div>
             </div>
	  	</div>
		  	
                    
           
	 
     <div class="col-md-12 cst_tabs">
     	   <div class="row">
     	   	<input type="hidden" id="loadAllstepWhenClieckOnTab" value="{{url(route('shop.variations.loadSteps',$product->id))}}">
           
              <ul class="sideUl">
              	 <li><a href="javascript:void(0)" class="btn btn-primary navVariant active nav-general" data-show="#generalBox">General</a></li>
              	 <li><a href="javascript:void(0)" class="btn btn-primary navVariant nav-inventory" data-show="#inventoryBox">Inventory</a></li>
              	 <li><a href="javascript:void(0)" class="btn btn-primary navVariant nav-attributes" data-show="#attributeBox">Attributes</a></li>
              	 <li><a href="javascript:void(0)" class="btn btn-primary navVariant nav-variation" data-show="#variationBox">Variations</a></li>
              </ul>
            </div>
     </div>

     <!-- <div class="col-md-12"> -->
     	 <div class="row outerWraps">
     	 	 <div class="col-md-12">
     	 	 	 <div class="innerWraps row">
                      <div class="col-md-12 variationBoxInner hide" id="generalBox">
                      	  @include('vendors.E-shop.products.variationBoxes.general')
                      </div>
                      <div class="col-md-12 variationBoxInner hide" id="inventoryBox">
                      	  @include('vendors.E-shop.products.variationBoxes.inventory')
                      	
                      </div>
                      <div class="col-md-12 variationBoxInner hide" id="attributeBox">
                      	  @include('vendors.E-shop.products.variationBoxes.attributes')
                      	
                      </div>
                      <div class="col-md-12 variationBoxInner hide" id="variationBox">
                      	  @include('vendors.E-shop.products.variationBoxes.variation')
                      	
                      </div>
		     	</div>
             </div>
         </div>
     <!-- </div> -->
</div>

 
