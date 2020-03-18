 
 @if(!empty($type))
@php  $variations = $product->subcategory->ProductVariationWithType->where('type',$type); @endphp

  <div class="card productItemParentDiv">
    <div class="card-header" id="headingOne">
      <div class="row">
      	<div class="col-md-8">{{$type}}</div>
      	 <div class="col-md-4 text-right">
             <a href="#" data-toggle="collapse" data-target="#collapseOne{{$type}}" aria-expanded="false" aria-controls="collapseOne{{$type}}">
               <i class="fas fa-list"></i>
            </a>
           <a href="javascript:void(0)" class="remove-attribute" data-id="0"><i class="fa fa-trash"></i></a>
          </div>
      </div>
    </div>

    <div id="collapseOne{{$type}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
       <div class="card-body">
          <div class="row">
          	 <div class="col-md-6">
          	 	 <label>Name</label>
				 <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$type}}">
				 <input type="hidden" name="variation_type[]" value="{{$type}}">
				 
				 <div class="form-group">
				 	<div class="form-check">
					  <input class="form-check-input" type="checkbox" value="1" name="visible[{{$type}}][]" id="defaultCheck-{{$type}}-1">
                      <label class="form-check-label" for="defaultCheck-{{$type}}-1">
					    Visible on the product page  
					  </label>
					</div>
				 </div>

               @if($product->product_type == 1)
				   <div class="form-group">
				 	<div class="form-check">
					  <input class="form-check-input" type="checkbox" value="1" name="variable[{{$type}}][]" id="defaultCheck-{{$type}}-2">

					  <label class="form-check-label" for="defaultCheck-{{$type}}-2">
					     Used for Variation
					  </label>
					</div>
				 </div>

				@else
				  <input type="hidden" value="0" name="variable[{{$type}}][]" id="defaultCheck-{{$type}}-2">
                @endif
				 

				  
          	 </div>
          	 <div class="col-md-6">
                   <div class="form-group">
                         <label>Values</label>
                         <select multiple="" name="variations[{{$type}}][]" class="form-control select2">
                         	@foreach($variations as $v)
                         	  <option value="{{$v->variation->id}}">{{$v->variation->name}}</option>
                         	@endforeach
                         </select>
                   </div>

          	 </div>
          </div>
      </div>
    </div>
  </div>
   



@endif


























