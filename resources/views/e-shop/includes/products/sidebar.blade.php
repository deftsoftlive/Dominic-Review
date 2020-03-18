<div class="col-lg-3" id="filters-sidebar">
                   <div class="filters-sidebar">
                    <a href="javascript:void(0);" class="" id="CloseFilterCategory"><i class="fas fa-times-circle"></i></a>
                       <div id="filters-accordion">
                          <div class="card">
                            <div class="card-header" id="heading-1">
                              <h5 class="mb-0">
                                <a role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                                  Categories
                                </a>
                              </h5>
                            </div>
                            <div id="collapse-1" class="collapse show" data-parent="#filters-accordion" aria-labelledby="heading-1">
                              <div class="card-body">

                                <div id="filter-sub-accordion">
                                 
                                  <div class="card">
                                    <div class="card-header" id="heading-1-2">
                                      <h5 class="mb-0">
                                        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-1-2" aria-expanded="true" aria-controls="collapse-1-2">
                                          {{$category->categorySubparent->label}}
                                        </a>
                                      </h5>
                                    </div>
                                    <div id="collapse-1-2" class="collapse show" data-parent="#filter-sub-accordion" aria-labelledby="heading-1-2">
                                      <div class="card-body">
                                        <!-- <div class="product-checkbox-list">

                                          <div class="custom-control ">
                                             <label class="custom-control-label">lorem ipsum</label>
                                          </div>
                                         
                                         </div> -->

                                         <ul class="sub-category-list">
                                          @foreach($category->categorySubparent->childCategory as $childCategory)
                                          <li class="{{$childCategory->id == $category->id ? 'active' : ''}}">
                                              <a href="{{url(route('shop.childcategory',[
                                              $childCategory->categoryParent->slug,
                                              $childCategory->categorySubparent->slug,
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
                              
                              </div>
                            </div>
                          </div>

                          <form id="ProductFilterOfSidebar" action="{{url(route('shop.ajax.product.sidebarFilter',$category->id))}}">
                           
                          <div class="card">
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
                          </div>


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
                        </div>
                   </div> 
                </div>