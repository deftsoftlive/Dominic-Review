<?php



$requestSizes = Request::get('sizes') ? explode(",",Request::get('sizes')) : array();
$requestMaterial = Request::get('materials') ? explode(",",Request::get('materials')) : array();
$requestColors = Request::get('colors') ? explode(",",Request::get('colors')) : array();
$requestTechniques = Request::get('techniques') ? explode(",",Request::get('techniques')) : array();
$requestStyles = Request::get('styles') ? explode(",",Request::get('styles')) : array();
$requestModels = Request::get('models') ? explode(",",Request::get('models')) : array();
$requestBrands = Request::get('brands') ? explode(",",Request::get('brands')) : array();













?>

<div class="panel-group" id="category">
<div class="filter-hider"></div>
<span class="filter-toggle">Filter</span>
 


    <form method="" id="filterForm" action="<?= url( route('ajax_product_list') ) ?>">
 

  <input type="hidden" name="slug" value="{{$slug}}">
  <input type="hidden" name="filterNewestPopular" value="0">
  <input type="hidden" name="ascending" value="0">
  <input type="hidden" name="high_rated" value="0">
  <input type="hidden" name="prefix" value="{{\Request::segment(1)}}">
 
 
       @foreach($categories  as $cat)

                        
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title category-title">
                                    <a data-toggle="collapse" data-parent="#category" href="#category{{$cat->id}}" aria-expanded="true" class="collapse in">{{$cat->label}}</a>
                                </h4>
                            </div>
                            <div id="category{{$cat->id}}" class="panel-collapse collapse in">
                                <!--sub-catogory-start-->
                                <div class="panel-body">
                                    <div class="panel-group" id="sub-category">
                                    @foreach($cat->subCategory as $subcat)
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title sub-cat-title">

                                                    @php
                                                        $subparent = $category->subparent == $subcat->id ? 'in' : 'in collapsed';

                                                         $subparent2 = $category->subparent == $subcat->id ? 'true' : 'true';
                                                        $active = $category->id == $subcat->id ? 'active' : '';

                                                        $childrenClass= sizeof($subcat->childCategory) ? '' : 'emptyChildrens';

                                                    @endphp

                                                     
                                                    <!-- data-parent="#sub-category" -->
                                                    <a data-toggle="collapse" href="#sub-category{{$subcat->id}}" aria-expanded="{{$subparent2}}" class="collapse {{$active}} {{$subparent}} {{$childrenClass}}">{{$subcat->label}}</a>
                                                </h4>
                                            </div>
                                            @if(!empty($subcat->childCategory))    
                                            <div id="sub-category{{$subcat->id}}" class="panel-collapse {{$subparent}} collapse">
                                                <div class="panel-body">
                                                    <ul class="sub-category-2">
                                                        @foreach($subcat->childCategory as $ch)

                                                        @php
                                                           $chItem = $category->id == $ch->id ? 'active' : '';
                                                        @endphp
                                                        <li class="{{$chItem}}"><a href="{{url($ch->slug)}}">{{$ch->label}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            @endif
                                        </div>

                                  @endforeach
                                       
                                         
                                    </div>
                                </div>
                                <!--sub-catogory-end-->
                            </div>
                        </div>


 @endforeach













<?php

 




$styles = $Productfilters->CategoryStyles;
$sizes =  $Productfilters->CategorySizes;
$brands = $Productfilters->categoryBrands; 
$techniques = $Productfilters->CategoryTechniques;
$materials =  $Productfilters->CategoryMaterials;
$models =  $Productfilters->CategoryModels;
 

    

?>

                                        <div class="cus-filter {{sizeof($styles) ? '' : 'hide'}}">
                                           <h2 class="cus-head">Filter By</h2>
                                           <h3>Style</h3>


                                              @foreach($styles as $style)
                                                    <div class="form-group">
                                               <input type="checkbox" id="style-{{$style->CategoryVariantStyles->id}}" value="{{$style->CategoryVariantStyles->id}}" class="filterOptions" name="styles[]"
                                                  <?= in_array($style->CategoryVariantStyles->id,$requestStyles) ? 'checked' : ''  ?> >
                                                        <label for="style-{{$style->CategoryVariantStyles->id}}">{{$style->CategoryVariantStyles->title}}</label>
                                                    </div>
                                              @endforeach
                                         
                                         
                                        </div>


                                        <div class="cus-filter hide">
                                            <h2 class="cus-head">Branding Options</h2>
                                             
                                            <div class="form-group">
                                                <input type="checkbox" id="cb5">
                                                <label for="cb5">Sleeve Print</label>
                                            </div>
                                             
                                        </div>

                        
                                        <div class="cus-filter {{sizeof($techniques) ? '' : 'hide'}}">
                                                <h2 class="cus-head">Technique</h2>
                                                 
                                                 @foreach($techniques as $technique)
                                                    <div class="form-group">
                                                        <input type="checkbox" id="technique-{{$technique->CategoryVariantTechniques->id}}" class="filterOptions" value="{{$technique->CategoryVariantTechniques->id}}" name="techniques[]"
                                                        <?= in_array($technique->CategoryVariantTechniques->id,$requestTechniques) ? 'checked' : ''  ?>
                                                        >
                                                        <label for="technique-{{$technique->CategoryVariantTechniques->id}}">{{$technique->CategoryVariantTechniques->technique_name}}</label>
                                                    </div>
                                                @endforeach
                                                 
                                         
                                        </div>
                        
                                        <div class="cus-filter {{sizeof($models) ? '' : 'hide'}}">
                                              <h2 class="cus-head">Models</h2>
                                         
                                                  @foreach($models as $model)
                                                    <div class="form-group">
                                                        <input type="checkbox" id="model-{{$model->CategoryVariantModels->id}}" name="models[]" class="filterOptions" value="{{$model->CategoryVariantModels->id}}"

                                                        <?= in_array($model->CategoryVariantModels->id,$requestModels) ? 'checked' : ''  ?>

                                                        >
                                                        <label for="model-{{$model->CategoryVariantModels->id}}">{{$model->CategoryVariantModels->title}}</label>
                                                    </div>
                                                @endforeach
                                         
                                         
                                        </div>
                        
                                    
                                        <div class="cus-filter {{sizeof($brands) ? '' : 'hide'}}">
                                            <h2 class="cus-head">Brand</h2>
                                         
                                         
                                            @foreach($brands as $brand)
                                             @if(!empty($brand->categoryVariantBrands))
                                                    <div class="form-group">
                                                        <input type="checkbox" id="brand-{{$brand->categoryVariantBrands->id}}" name="brands[]" class="filterOptions" value="{{$brand->categoryVariantBrands->id}}"
                                                        <?= in_array($brand->categoryVariantBrands->id,$requestBrands) ? 'checked' : ''  ?>>
                                                        <label for="brand-{{$brand->categoryVariantBrands->id}}">{{$brand->categoryVariantBrands->brand_name}}</label>
                                                    </div>
                                              @endif
                                              @endforeach
                                         
                                        </div>

                                    <div class="filter-colors"> 
                                        <div class="cus-filter {{sizeof($CategoryColors) ? '' : 'hide'}}">
                                             <h2 class="cus-head">Color</h2>
                                         
                                            @foreach($CategoryColors as $color)
                                                 <div class="form-group">
                                                        <input type="checkbox" id="color-{{$color->id}}" class="filterOptions" name="colors[]" value="{{$color->id}}"
                                                        <?= in_array($color->id,$requestColors) ? 'checked' : ''  ?>>


                                                        <label for="color-{{$color->id}}">

                                                            <span style="background:<?= $color->color_code ?>;width:20px;height:20px;display:inline-block;"></span>

                                                            {{$color->title}}</label>
                                                    </div>
                                            @endforeach
                                         
                                        </div>
                                      </div>
                        
                                        <div class="cus-filter {{sizeof($materials) ? '' : 'hide'}}">
                                              <h2 class="cus-head">Material</h2>
                                         
                                         
                                                @foreach($materials as $material)
                                                    <div class="form-group">
                                                        <input type="checkbox" id="material-{{$material->CategoryVariantMaterials->id}}"
                                                         <?= in_array($material->CategoryVariantMaterials->id,$requestMaterial) ? 'checked' : ''  ?>
                                                         class="filterOptions" name="materials[]" value="{{$material->CategoryVariantMaterials->id}}">
                                                        <label for="material-{{$material->CategoryVariantMaterials->id}}">{{$material->CategoryVariantMaterials->title}}</label>
                                                    </div>
                                              @endforeach

                                         
                                        </div>
                        
                                        <div class="cus-filter {{sizeof($sizes) ? '' : 'hide'}}">
                                             <h2 class="cus-head">Sizes</h2>
                                         
                                        
                                              @foreach($sizes as $size)
                                                    <div class="form-group">
                                                        <input type="checkbox" id="sizes-{{$size->CategoryVariantSizes->id}}" 
                                                        <?= in_array($size->CategoryVariantSizes->id,$requestSizes) ? 'checked' : ''  ?>
                                                         name="sizes[]" class="filterOptions" value="{{$size->CategoryVariantSizes->id}}">
                                                        <label for="sizes-{{$size->CategoryVariantSizes->id}}">{{$size->CategoryVariantSizes->title}}</label>
                                                    </div>
                                              @endforeach

                                         
                                        </div>
<!--Custm checkbox Ends here-->

  </form>                  
</div>