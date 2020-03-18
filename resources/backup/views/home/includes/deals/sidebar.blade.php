
<div class="col-lg-3 range eventside-bar">
    <form id="formBusinessDisountDeals" action="{{url(route('get_all_dealAndDiscount'))}}">
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header">
                                    <a class="card-link collapsed" data-toggle="collapse" href="#collapseOne" aria-expanded="true">
                                        category
                                    </a>
                                </div>


                              


                                <div id="collapseOne" class="collapse show" data-parent="#accordion">

                                 @foreach($categories as $category)
                                     <div class="card-body listing sub-head">
                                         <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input businesses" name="categories[]" id="customCheck{{$category->id}}" value="{{$category->id}}"
                                            {{checkCategoryWithRequest('vendors',$category->id)}}>
                                            <label class="custom-control-label" for="customCheck{{$category->id}}">{{$category->label}}</label>
                                          </div>
                                    </div>
                                    <div class="sub-cat-wrap">
                                   @foreach($category->subcategory as $subcategory)
                                  
                                     <div class="card-body listing">
                                           
                                          <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input businesses" name="categories[]" value="{{$subcategory->id}}" id="customCheck{{$subcategory->id}}"  >
                                            <label class="custom-control-label" for="customCheck{{$subcategory->id}}">{{$subcategory->label}}</label>
                                          </div>

                                    </div>

                                    @endforeach
                                </div>
                                 @endforeach
                                   
                                </div>
                            </div>

                            
                        </div>
                    </form>
                    </div>