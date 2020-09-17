@php 
  $categories = DB::table('product_categories')->where('type','Product')->where('parent',0)->where('subparent',0)->orderBy('id','asc')->get();
@endphp
<div class="col-lg-3" id="filters-sidebar">
      <div class="filters-sidebar">
        <a href="javascript:void(0);" onclick="closeSidebar();"><i class="fas fa-window-close"></i></a>
          <form action="{{route('shop.index')}}" method="POST" class="cst-selection">
            @csrf
              <h5>Filter By :</h5>
                    <div class="cst_Product_cateogory">
                        <label for="inputCity">Product Category</label>
                        <select id="people" name="product_category" class="form-control" >
                          <option value="" disabled="" selected="">Select Category</option>
                          @foreach($categories as $cat)
                            <option value="{{$cat->id}}">{{$cat->label}}</option>
                          @endforeach
                        </select>
                    </div>
                    <input type="hidden" name="selected_cat" id="selected_cat">
                    
                    <div class="cst_Product_cateogory">
                          <label for="inputAge">Product Subcategory</label>
                          <select class="form-control" name="subcategory_id" id="subCategory">
                            <option disabled="" selected="" value="">Select Product Subcategory</option>
                          </select>
                    </div>
                    <input type="hidden" name="selected_sub_cat" id="selected_sub_cat">

                    <div class="submit_reset_btns">
                        <button type="submit" class="cstm-btn main_button">Submit</button>
                        <a href="{{url('/shop')}}" class="cstm-btn">Reset</a>
                    </div>
                </form>

                @if(isset($category))
                    <a href="javascript:void(0);" class="" id="CloseFilterCategory"><i class="fas fa-times-circle"></i></a>
                    <h5 class="filter_categories"> Categories</h5>
                       <div id="filters-accordion"> 
                        <div class="card">
                          <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                               {{$category->categorySubparent->label}}
                            </a>
                          </div>
                          <div id="collapseThree" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                              <ul class="sub-category-list">
                                          @foreach($category->categorySubparent->subCategory as $childCategory)

                                          <li class="{{$childCategory->id == $category->id ? 'active' : ''}}">
                                              <a href="{{url(route('shop.childcategory',[
                                              $childCategory->categoryParent->slug,
                                              $childCategory->slug
                                              ]))}}">
                                              {{$childCategory->label}}
                                            </a>
                                          </li>
                                          @endforeach
                                         </ul>
                            </div>
                          </div>
                        </div>
                      </div> 







                       <!--    <div class="card">
                            <div class="card-header" id="heading-1">
                              <h5 class="mb-0">
                                <a class="collapsed" role="button" data-toggle="collapse" href="collapse-1" aria-expanded="false" aria-controls="collapse-1-2">
                                          {{$category->categorySubparent->label}}
                                        </a>
                              </h5>
                            </div>
                            <div id="collapse-1" class="collapse  " data-parent="#filters-accordion" aria-labelledby="heading-1">
                              <div class="card-body">   -->
                                        <!-- <div class="product-checkbox-list">

                                          <div class="custom-control ">
                                             <label class="custom-control-label">lorem ipsum</label>
                                          </div>
                                         
                                         </div> -->
                                     <!--     <ul class="sub-category-list">
                                          @foreach($category->categorySubparent->subCategory as $childCategory)

                                          <li class="{{$childCategory->id == $category->id ? 'active' : ''}}">
                                              <a href="{{url(route('shop.childcategory',[
                                              $childCategory->categoryParent->slug,
                                              $childCategory->slug
                                              ]))}}">
                                              {{$childCategory->label}}
                                            </a>
                                          </li>
                                          @endforeach
                                         </ul>
                                    </div>
                                    </div>
                                  </div>
                                </div>      
                                -->

                          <form id="ProductFilterOfSidebar" action="{{url(route('shop.ajax.product.sidebarFilter',$category->id))}}">
                           
                          <!-- <div class="card">
                            <div class="card-header" id="heading-3">
                              <h5 class="mb-0">
                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="true" aria-controls="collapse-3">
                                  Price Range
                                </a>
                              </h5>
                            </div>
                            <div id="collapse-3" class="collapse show" data-parent="#accordion" aria-labelledby="heading-3">
                              <div class="card-body">
                                  <ul class="price-range product-checkbox-list">
                                    <li>
                                        <div class="custom-control custom-checkbox">
                                            <input type="radio" class="custom-control-input formInputFilter" name="price" value="1&1000" id="PriceRange1">
                                            <label class="custom-control-label" for="PriceRange1"
                                            >Under $1000</label>
                                          </div>
                                        </li>
                                        <li><div class="custom-control custom-checkbox">
                                            <input type="radio" class="custom-control-input formInputFilter" name="price" value="1000&1999" id="PriceRange2">
                                            <label class="custom-control-label" for="PriceRange2"
                                            >$1,000 - 1,999</label>
                                          </div>
                                        </li>
                                        <li><div class="custom-control custom-checkbox">
                                            <input type="radio" class="custom-control-input formInputFilter" name="price" value="2000&2999" id="PriceRange3">
                                            <label class="custom-control-label" for="PriceRange3"
                                            >$2,000 - $2,999</label>
                                          </div>
                                        </li>
                                        <li><div class="custom-control custom-checkbox">
                                            <input type="radio" class="custom-control-input formInputFilter" name="price" value="3000&3999" id="PriceRange4">
                                            <label class="custom-control-label" for="PriceRange4"
                                            >$3,000 - $3,999</label>
                                          </div>
                                        </li>
                                        <li><div class="custom-control custom-checkbox">
                                            <input type="radio" class="custom-control-input formInputFilter" value="4000&1000000" name="price" id="PriceRange5">
                                            <label class="custom-control-label" 
                                            for="PriceRange5"
                                            >$4,000 +</label>
                                          </div>
                                        </li>
                                        <li>
                                          <div class="form-group mini-btn-wrap text-right">
                                                <a href="javascript::void(0)" class="resetRadio cstm-btn solid-btn">Reset</a> 
                                           </div>
                                        </li>
                                  </ul>
                              </div>
                            </div>
                          </div> -->

                      @if($category->categorySubparent->ProductVariations != null && $category->categorySubparent->ProductVariations->count() > 0)    
                          
                        @foreach($category->categorySubparent->ProductVariations as $variation)
                          <div class="card">
                            <div class="card-header" id="heading-4">
                              <h5 class="mb-0">
                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-{{$variation->type}}-{{$variation->id}}" aria-expanded="true" aria-controls="collapse-4">
                                 {{$variation->variations->name}}
                                </a>
                              </h5>
                            </div>
                            <div id="collapse-{{$variation->type}}-{{$variation->id}}" class="collapse show" data-parent="#accordion" aria-labelledby="heading-4">
                              <div class="card-body">
                                <ul class="{{$variation->type == 'colors' ? 'product-colors-wrap' : 'price-range product-checkbox-list'}}">
                                 @foreach($variation->variationTypes as $v)
                                   
                                   <?php $attributes = json_decode($v->variation->data);  ?>

                                   @if(!empty($attributes->color))
                                    <li>
                                      <div class="product-color-checkbox">
                                          <input type="checkbox" class="formInputFilter" name="{{$variation->type}}[]" value="{{$v->variation->id}}" id="productColor-{{$v->id}}">
                                          <label for="productColor-{{$v->id}}" class="productColor-label" style="background-color: {{$attributes->color}};"></label>
                                       </div>
                                    </li>
 
                                   @else
                                       <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input formInputFilter" name="{{$variation->type}}[]" id="productColor-{{$v->id}}" value="{{$v->variation->id}}">
                                                <label class="custom-control-label" for="productColor-{{$v->id}}">
                                                  {{$v->variation->name}}
                                                </label>
                                              </div>
                                       </li>
                                   @endif

                                    
                                 @endforeach
                              
                                </ul>
                              </div>
                            </div>
                          </div>
                          @endforeach
                        @endif

                        </form>

                @endif        
              </div> 
      </div>
