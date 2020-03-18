@extends('vendors.E-shop.steps.layouts')
@section('innerContent')
    <form method="post" id="shopCreate" action="{{url(route('shop.ajax.firstStep',2))}}">

       <div class="panel" id="step-shop-2" data-step="2">
                <div class="shop-form-card">
                <header class="panel__header text-center">
                  <h2 class="panel__title">Product Category</h2>
                  <p class="panel__subheading">Choose a memorable name that reflects your style.</p>
                </header>
                <div class="create-shop-form">
                    <div class="row">
                    
                         <div id="globalMessages"></div>
                  
                          <div class="col-lg-12">
                            <ul class="shop-category-list">
                              @foreach($category as $cate) 
                                <li>
                                       <div class="product-cate-checkbox custom-checkbox">
                                          <input type="checkbox" class="custom-control-input" id="ProductCate-{{$cate->id}}" name="category[]" value="{{$cate->id}}"
                                          {{in_array($cate->id,$category_ids) ? 'checked' : ''}}
                                          >
                                          <label class="custom-control-label" for="ProductCate-{{$cate->id}}">
                                            {{$cate->label}}
                                          </label>
                                       </div>
                                </li>
                              @endforeach
                            </ul>
                         </div>
                  
                       

                       
                     
                    </div>                    
                </div>
            </div>

            </div>
            <div class="wizard__footer">
               <a href="{{url(route('vendor.shop.index'))}}" class="previous cstm-btn">Previous</a>
               <button class="cstm-btn btn-submit next">Next</button>
            </div>
</form>
 

 


@endsection

@section('jscripts')
<script src="{{url('/js/validations/imageShow.js')}}"></script>
<script type="text/javascript" src="{{url('/js/vendors/shop.js')}}"></script>
  
@endsection