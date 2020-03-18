 <ul>
    @foreach($business->chats as $c)
      <?php  $chat = $c->ChatMessages()->orderBy('id','DESC')->first(); ?>
        <li data-filter-name="{{$c->user->name}}" class="contact  {{!empty($activeList) && $activeList == $c->id ? 'active' : ''}}">
             
                                   <a href="javascript::void(0)"
                                         data-href="{{url(route('getChatBoxOfBusiness',[$business->category->slug,$c->id]))}}"
                                         data-id="{{$c->id}}"
                                         class="getChatbox" 
                                       > 
                <div class="wrap">
                 @if($c->unReadMessages->count() > 0)
                  <span class="unreadMsgCount">{{$c->unReadMessages->count()}}</span>
                 @endif
                  <span class="contact-status online"></span>
                  <img src="{{ProfileImage($c->user->profile_image)}}" alt="" />
                  <div class="meta">
                    <p class="name">{{$c->user->name}}</p>
                    <p class="preview">{!! $chat->message !!}</p>
                  </div>
                </div>
              </a>
        </li>
        @endforeach
</ul>