
<h3>Product Price</h3>
 
<form data-action="{{url(route('vendor.shop.products.ajax.createGeneralSetting',$product->id))}}" id="VariationGeneralSetting">
	<div class="row">
<div class="col-md-12">
	<div class="row">
		<div class="col-lg-6">
		<div class="form-group">
		    <label>Regular price(£)<span class="q-mark"><i class="fas fa-question-circle"></i></span></label>
		  
		      <input type="number" min="0" class="form-control" value="{{$product->price}}" name="price" id="staticEmail" placeholder="">
		    
		</div>
	</div>
     <div class="col-lg-6">
		<div class="form-group">
		    <label>Sale discount amount(£)<span class="q-mark"><i class="fas fa-question-circle"></i></span></label>
		    
		      <input type="number" min="0" class="form-control" value="{{$product->sale_price}}" name="sale_price" id="staticEmail1" placeholder="">	  
		   </div>
		</div>
</div>
</div>
</div>
<div class="row">
		<div class="col-md-12">
				   <div class="row">
				       <div class="col-md-12">
				            <h4>For Shipping Information</h4>
				       </div>
				       <div class="col-md-12">
				            <div class="form-group">
				                 <label>Product Weight(KG)</label>
				                 <input type="number" name="weight" value="{{$product->weight}}" class="form-control" min="1">
				            </div>
				       </div>
				       <div class="col-md-12">
				            <h6>Dimensions (L×W×H) (cm)</h6>
				       </div>
				       <div class="col-md-4">
				            <div class="form-group">
				                 <label>Product Height</label>
				                 <input type="number" name="height" value="{{$product->height}}" class="form-control" min="1">
				            </div>
				       </div>
				       <div class="col-md-4">
				            <div class="form-group">
				                 <label>Product Width</label>
				                 <input type="number" name="width" value="{{$product->width}}" class="form-control" min="1">
				            </div>
				       </div>
				       <div class="col-md-4">
				            <div class="form-group">
				                 <label>Product Length</label>
				                 <input type="number" name="length" value="{{$product->length}}" class="form-control" min="1">
				            </div>
				       </div>


				       <div class="col-md-12 text-right">
				            <div class="form-group">
				               <button class="btn btn-primary">Save Changes</button>
				            </div>
				       </div>


				   </div>
       </div>
</div>


</form>