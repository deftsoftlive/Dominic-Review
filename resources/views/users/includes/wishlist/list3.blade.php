

@foreach($CartItems as $item)

<tr>
    <td>{{$item->event->title}}</td>
    <td>{{$item->package->title}}</td>
    <td>
        @if($item->deal != null && $item->deal->count() > 0)
             {{$item->deal->title}}
        @else
        N/A
        @endif
    </td>
    <td>${{$item->package->price}}</td>
     
    <td width="150">
    <div class="action-btn-wrap ">

          <form action="{{url(route('cart.addToWishList'))}}" id="addToWishListForm-{{$item->id}}">
                            @csrf
                              <input type="hidden" name="package_id" id="package_id" value="{{$item->package_id}}">
                              <input type="hidden" name="deal_id" id="deal_id" value="{{$item->deal_id}}">
                              <input type="hidden" name="event_type" id="event_type" value="{{$item->event_id}}">
                            
                                        <button 
                                         type="button"
                                         data-form="#addToWishListForm-{{$item->id}}"
                                         data-action="{{url(route('cart.addToCart'))}}"
                                         class="icon-btn wishlist-icon">
                                         <span><i class="fas fa-cart-plus"></i></span>
                                        </button>
                          </form>
        <a href="{{url(route('wishlist.delete',$item->id))}}" class="icon-btn danger-btn">
            <i class="fas fa-trash-alt"></i>
        </a>
    </div>
    </td>
</tr>

@endforeach