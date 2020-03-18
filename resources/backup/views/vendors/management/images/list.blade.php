	 
@if($images->count() > 0)

@php $imagess = $images->paginate(12);  @endphp
     @foreach($imagess as $img)
            <div class="col-lg-4">
                <div class="gallery-card">
                  <div class="image-gallery-container">
                       <img src="{{url($img->keyValue)}}" width="100%">
                       <!-- <div class="olay">
                           <a href="{{route('vendor_category_meta_delete',[$category->slug,$img->id])}}">Delete</a>
                           
                       </div> -->
                   <div class="card-info">
                        
                        <ul class="acrdn-action-btns">
                           <!-- <li><a href="javascript:void(0);" class="action_btn primary-btn"><i class="fas fa-pencil-alt"></i></a></li> -->
                          <li><a data-toggle="tooltip" title="Delete" onclick="deleteItem(this)" href="javascript:void(0)" data-delurl="{{route('vendor_category_meta_delete', [$category->slug, $img->id])}}" class="action_btn danger-btn"><i class="fas fa-trash-alt"></i></a></li>
                     </ul>
              </div>
                    

                  </div>
                </div>
            </div>
          @endforeach

    {{$imagess->links()}}     
@else
                  <div class="col-md-12">
                    <div class="alert alert-warning" role="alert">Your Image Gallery have not images yet.</div>
                  </div>
@endif