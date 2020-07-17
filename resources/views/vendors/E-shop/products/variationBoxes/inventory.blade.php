<h3>Inventory Management</h3>

<form id="inventoryFormSubmit" data-action="{{url(route('vendor.shop.variations.inventoryCreate',$product->id))}}">
<div class="form-group">
   <div class="row">
    <label class="col-lg-2 col-form-label text-right">SKU <small>(stock keeping unit)</small></label>
    <div class="col-sm-7">
      <input 
      type="text" 
      class="form-control " 
      id="staticEmail" 
      name="sku" 
      placeholder="SKU12345685"
      value="{{$product->HasInventory != null &&$product->HasInventory->count() > 0 ? $product->HasInventory->sku : ''}}" 
      >
    </div>
   </div>
</div>





<div class="form-group">
<div class="row">
    <label class="col-lg-2 col-form-label text-right">Manage stock ?</label>
    <div class="col-sm-7">
      <div class="form-check">
		  <input 
        class="form-check-input"
        type="checkbox"
        value="1" 
        id="hasStock" 
        name="hasStock"
        {{$product->HasInventory != null && $product->HasInventory->count() > 0 && $product->HasInventory->status == 1 ? 'checked' : ''}}
        >
      <label class="form-check-label" for="hasStock">
		    Enable stock management at product level <i class="fas fa-question-circle"></i>
		  </label>
		</div>
    </div>
 </div>
</div>
 


 
<div class="form-group hasStock">
 <div class="row ">
    <label class="col-lg-2 col-form-label text-right">Product Quantity <small>(In Stock)</small><span class="q-mark"><i class="fas fa-question-circle"></i></span></label>
    <div class="col-sm-7">
      <input 
      type="number" 
      min="1" 
      class="form-control " 
      name="stock"
      value="{{$product->HasInventory != null && $product->HasInventory->count() > 0 ? $product->HasInventory->stock : ''}}" 
      >
    </div>
 </div>
</div>

<div class="form-group hasStock">
 <div class="row ">
    <label class="col-lg-2 col-form-label text-right">Low stock threshold <span class="q-mark"><i class="fas fa-question-circle"></i></span></label>
    <div class="col-sm-7">
      <input 
      type="number" 
      min="0" 
      class="form-control" 
      name="lowInStock"
      value="{{$product->HasInventory != null && $product->HasInventory->count() > 0 ? $product->HasInventory->lowInStock : ''}}" 
      >
     </div>
  </div>
</div>


<div class="form-group">
 <div class="row ">
    <label class="col-lg-9 text-right">
       <button class="btn btn-primary">Create Inventory</button>
    </div>
  </div>
</div>



</form>