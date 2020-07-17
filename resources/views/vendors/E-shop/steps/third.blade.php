@extends('layouts.admin')
 
@section('content')
<form method="post"  id="shopCreate" action="{{url(route('shop.ajax.firstStep',3))}}">
  <div class="panel" id="step-shop-3" data-step="3">
            <div class="shop-form-card">
              <header class="panel__header text-center">
                <h2 class="panel__title">Stay in touch with the community.</h2>
                <p class="panel__subheading">Community is everything, and here we do some crazy stuff.</p>
               </header>
                 <div class="create-shop-form">
                  <div id="globalMessages"></div>
                    <div class="row">
                         @foreach($category as $cate) 



                           @if($cate->subCategoryActives->count() > 0)

                              <div class="eshop_store_card">
                                <div class="eshop_card_head">
                                  <h2>{{$cate->label}}</h2>
                                </div>
                                    <div class="eshop_store_inn_card">
                                        
                                      
                                      <div class="eshop_product_category">
                                          <ul class="selected-categories-list">
                                            @foreach($cate->subCategoryActives as $sub)
                                                 <li>
                                                  <div class="product-cate-checkbox custom-checkbox">
                                                          <input 
                                                             type="checkbox" 
                                                             class="custom-control-input"
                                                             id="Product-subCate-{{$sub->id}}" name="category[]" value="{{$sub->id}}"
                                                             {{in_array($sub->id,$category_id) ? 'checked' : ''}}>
                                                             <label class="custom-control-label" 
                                                             for="Product-subCate-{{$sub->id}}"
                                                             >{{$sub->label}}
                                                           </label>
                                                       </div>
                                                </li>
                                            @endforeach
                                          </ul>
                                     </div>
                                   </div>

                              </div>
                      
                             @endif
 
                                  
                              @endforeach
                    </div>                    
                </div>
            </div>
</div>     

<div class="wizard__footer">
               <a href="{{url(route('shop.ajax.secondStep'))}}" class="previous cstm-btn">Previous</a>
               <button class="cstm-btn btn-submit next">Next</button>
 </div>


</form>

 

 


@endsection

@section('jscripts')
<script src="{{url('/js/validations/imageShow.js')}}"></script>
<script type="text/javascript" src="{{url('/admin-assets/js/shop.js')}}"></script>
  
@endsection
 