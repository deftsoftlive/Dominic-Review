  <ul class="navbar-nav">                                       
                <li class="nav-item active">
                    <a class="nav-link" href="{{url(route('shop.index'))}}">Home <span class="sr-only">(current)</span></a>
                </li>

<?php

 $navbarCategory = \App\Models\Products\ProductCategory::where('status',1)->where('parent',0)->orderBy('sorting','ASC')->get();


?>

  @foreach($navbarCategory as $k => $cate)

         @if($cate->subCategoryActives->count() > 0)
              
                <li class="nav-item dropdown position-static" id="superMenu-{{$cate->id}}">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-{{$cate->id}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$cate->label}}</a>

                    <div class="dropdown-menu rounded-0 bg-light w-100 mega-dropdown" aria-labelledby="navbarDropdown-{{$cate->id}}">
                        <div class="container-fluid">
                            <div class="row">

                                     @foreach($cate->subCategoryActives as $s => $subcate)
                                        <div class="col-12 col-lg-3">
                                               <ul class="category-product-list">
                                                   <li><a href="{{url(route('shop.subcategory',[$cate->slug,$subcate->slug]))}}">{{$subcate->label}} </a></li>
                                                   @if($subcate->childCategoryActives->count() > 0)
                                                       <li>
                                                             <ul class="inn-category-list"> 
                                                                @foreach($subcate->childCategoryActives as $ch => $childCate)
                                                                 <li>
                                                                     <a href="{{url(route('shop.childcategory',[$cate->slug,$subcate->slug,$childCate->slug]))}}" class="">- {{$childCate->label}}</a>
                                                                 </li>
                                                                 @endforeach
                                                                
                                                              </ul>
                                                      </li>
                                                  @endif 
                                            
                                          </ul>
                                        </div>
                                     @endforeach                               
                          
                       
                            
                        </div>
                        </div>
                    </div>
                </li>

        @endif

@endforeach


                 
               
            </ul>