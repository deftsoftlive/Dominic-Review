                               
@foreach($userCartContent->get() as $item)
<?php
  if($item->shop_type == 'product')
  {
    $product = $item->VariantProduct != null && $item->VariantProduct->count() > 0 ? $item->VariantProduct : $item->product;
    $product = $item->variant_id > 0 ? App\Models\Products\Product::where('variant_id',$item->variant_id)->first() : $item->product;
    $variation = \App\Models\Products\ProductAssignedVariation::find($item->variant_id);
    $stock = $product->checkStock();
    $TotalStock = $stock != null ? $stock->stock : 10;
    $availableStock = $TotalStock > 0 ? ($TotalStock - $item->quantity) : 0;
    $stockMessage = $availableStock <= 1 ? $availableStock == 0 ? 'no item' : $availableStock.' item left only' : $availableStock.' items left only';
  }
  
 ?>

@if($item->shop_type == 'product')
   <tr class="cart-table__row">
          <td class="cart-table__column cart-table__column--image">
              <a href=""><img src="{{url($product->thumbnail)}}" alt=""></a>
          </td>
          <td class="cart-table__column cart-table__column--product">
              <a href="{{url('/shop/product')}}/{{$product->slug}}" class="cart-table__product-name">{{$product->name}}</a>
              <!-- <h4>Product Type: {{$product->product_type == 1 ? 'Variable' : 'Simple'}}</h4> -->
             
            @if($product->product_type == 1)
              <ul class="cart-table__options">
                  @foreach($variation->hasVariationAttributes as $v)
                          <li>{{$v->parentVariation->variations->name}}: 
                              <b class="bText">{{$v->parentVariation->name}}</b>
                          </li>
                  @endforeach
                  
              </ul>
           @endif


            @if($stock != null)
                      
                    <!--  <p class="vote"><strong>Stock : </strong> {{$availableStock == 0 ? 'Out Of Stock' : 'In Stock'}} 

                     {!!$stock->lowInStock >= $availableStock ? '<strong>('.$stockMessage.')</strong>' :''!!}
                    </p> -->
            @endif

          </td>
          <td class="cart-table__column cart-table__column--price" data-title="Price">
             £{{custom_format($item->price,2)}}    

          </td>
          <td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
              <div class="input-number">
                  <input disabled="" class="form-control input-number__input" 
                  type="number" min="1" value="{{$item->quantity}}">
                  <a class="input-number__sub cartItemQty {{$item->quantity == 1 ? 'disabled-type' : ''}}"
                  data-type="sub"
                  data-id="{{$item->id}}"
                  data-disable="{{$item->quantity == 1 ? 0 : 1}}"
                  >
                    <i class="fas fa-minus"></i>
                  </a>
                  <a 
                  class="input-number__add cartItemQty {{$availableStock == 0 ? 'disabled-type' : ''}}"
                  data-type="add"
                  data-id="{{$item->id}}"
                  data-disable="{{$availableStock == 0 ? 0 : 1}}"
                   >
                   <i class="fas fa-plus"></i>
                  </a>
              </div>
          </td>
          <td class="cart-table__column cart-table__column--total" data-title="Total">

                  £{{($item->price * $item->quantity)}} 
          </td>
          <td class="cart-table__column cart-table__column--remove">
              <a href="javascript" class="btn btn-light btn-sm btn-svg-icon cartItemQty"
                  data-type="remove"
                  data-id="{{$item->id}}"
                  data-disable="1"
              >
                 <i class="fas fa-trash-alt"></i>
              </a>
          </td>
    </tr>
@elseif($item->shop_type == 'course')

@php 
  $course_id = $item->product_id;
  $course = DB::table('courses')->where('id',$course_id)->first();  
  $child = DB::table('users')->where('id',$item->child_id)->first();
  $login_user = Auth::user()->id;
@endphp
   <tr class="cart-table__row">
          <td class="cart-table__column cart-table__column--image">
              <b>Course </b>
          </td>
          <td class="cart-table__column cart-table__column--product">
              <a href="{{url('/course-detail')}}/@php echo base64_encode($course->id); @endphp" class="cart-table__product-name">{{$course->title}}</a>

              <ul class="cart-table__options">
                <li>@if($item->child_id == $login_user) Account Holder @else Child @endif:  
                  <b class="bText">{{isset($child->name) ? $child->name : 'No child selected'}}</b>
                </li>                 
              </ul>
          </td>
          <td class="cart-table__column cart-table__column--price" data-title="Price">
             £{{custom_format($item->price,2)}}    
          </td>
          <td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
              1
          </td>
          <td class="cart-table__column cart-table__column--total" data-title="Total">

                  £{{($item->price * $item->quantity)}} 
          </td>
          <td class="cart-table__column cart-table__column--remove">
              <a href="javascript" class="btn btn-light btn-sm btn-svg-icon cartItemQty"
                  data-type="remove"
                  data-id="{{$item->id}}"
                  data-disable="1"
              >
                 <i class="fas fa-trash-alt"></i>
              </a>
          </td>
    </tr>
@elseif($item->shop_type == 'camp')

@php
  $camp_id = $item->product_id;
  $camp = DB::table('camps')->where('id',$camp_id)->first(); 
  $child = DB::table('users')->where('id',$item->child_id)->first(); 
  $week = json_decode($item->week); 
@endphp
   <tr class="cart-table__row">
          <td class="cart-table__column cart-table__column--image">
              <b>Camp </b>
          </td>
          <td class="cart-table__column cart-table__column--product">
              <a href="{{url('/book-a-camp')}}/{{$camp->slug}}" class="cart-table__product-name">{{$camp->title}}</a>

              <ul class="cart-table__options">
                <li>Child: 
                  <b class="bText">{{isset($child->name) ? $child->name : 'No child selected'}}</b>
                </li>                 
              </ul>

              <br/>
              <p>
                @foreach($week as $number=>$number_array)

                    @foreach($number_array as $data=>$user_data)

                      @foreach($user_data as $data1=>$user_data1)
                        @php 
                          $split = explode('-',$user_data1);
                          $get_session = $split[2];
                        @endphp
                        @if($get_session == 'early')
                          {{$number}} - {{$data1}} - Early Drop Off<br/>
                        @elseif($get_session == 'mor')
                          {{$number}} - {{$data1}} - Morning<br/>
                        @elseif($get_session == 'noon')
                          {{$number}} - {{$data1}} - Afternoon<br/>
                        @elseif($get_session == 'lunch')
                          {{$number}} - {{$data1}} - Lunch Club<br/>
                        @elseif($get_session == 'late')
                          {{$number}} - {{$data1}} - Late Pickup<br/>
                        @elseif($get_session == 'full')
                          {{$number}} - {{$data1}} - Full Day<br/>
                        @endif
                      @endforeach
                    
                      @endforeach

                  @endforeach
              </p>
          </td>
          <td class="cart-table__column cart-table__column--price" data-title="Price">
             £{{custom_format($item->price,2)}}    
          </td>
          <td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
              1
          </td>
          <td class="cart-table__column cart-table__column--total" data-title="Total">

                  £{{($item->price * $item->quantity)}} 
          </td>
          <td class="cart-table__column cart-table__column--remove">
              <a href="javascript" class="btn btn-light btn-sm btn-svg-icon cartItemQty"
                  data-type="remove"
                  data-id="{{$item->id}}"
                  data-disable="1"
              >
                 <i class="fas fa-trash-alt"></i>
              </a>
          </td>
    </tr>
@endif


@endforeach
