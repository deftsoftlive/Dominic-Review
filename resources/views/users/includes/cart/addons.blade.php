@if($VendorPackage->package_addons->count() > 0)

<h4 class="mb-3">Addons for {{$VendorPackage->title}} </h4>

	<form id="AddonSubmit" action="{{url(route('addPackageAddons'))}}">
	

	<input type="hidden" name="order_id" value="{{$request->orderID}}">
	<ul>

	@php $addon = explode(',',$order->addons);   @endphp

	@foreach($VendorPackage->package_addons as $addons)

	<li>

				   <div class="vendor-category mini-checkbox">
                      <div class="category-checkboxes category-title">
		  					<input id="Addons-{{$addons->id}}" class="addonPkg" type="checkbox" name="addons[]" value="{{$addons->id}}" data-price="{{$addons->key_value}}" {{in_array($addons->id,$addon) ? 'checked' : ''}}>
                           <label for="Addons-{{$addons->id}}">{{$addons->key}}</label>
                    </div>
                    <div class="alertMessage error"></div>
                   </div>		
<!-- 	<label for="Addons-{{$addons->id}}">
		  <input id="Addons-{{$addons->id}}" class="addonPkg" type="checkbox" name="addons[]" value="{{$addons->id}}" data-price="{{$addons->key_value}}" {{in_array($addons->id,$addon) ? 'checked' : ''}}>
		  <span>{{$addons->key}}</span>
	</label> -->
	</li>

	@endforeach
	</ul>
   <div class="d-f a-i-c j-c-s-b">
    <h5 class="addonTotal-price">Cart Total: $<span id="addonTotal">{{$request->total}}</span></h5>
    <div class="mini-btn-wrap">
	<button class="cstm-btn"><span><img src="{{url('200.gif')}}"></span>Apply</button>
  </div>
</div>
	</form>
@else

	<p>This package have not Extra Addons.</p>

@endif































