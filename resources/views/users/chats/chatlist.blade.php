<ul>
<?php 

$activeLists = !empty($activeList) ? $activeList : 0;

$activeList1 = Request::has('chat_id') ? Request::get('chat_id') : $activeLists;

 ?>
@foreach(Auth::user()->chats as $c)

 <?php  $chat = $c->ChatMessages()->orderBy('id','DESC')->first();





  ?>

           <li data-filter-item data-filter-name="{{$c->business->title}}" class="contact {{!empty($activeList1) && $activeList1 == $c->id ? 'active' : ''}}">
                                      <a href="javascript::void(0)"
                                         data-href="{{url(route('chat_user_getMessages',$c->id))}}"
                                         data-id="{{$c->id}}"
                                         class="getChatbox" 
                                       > 
                                      <div class="wrap">
                                         
                                        @if($c->unReadMessages->count() > 0)
                                        <span class="unreadMsgCount">{{$c->unReadMessages->count()}}</span>
                                        @endif
                                        <span class="contact-status online"></span>
                                        <img src="{{ProfileImage($c->business->profileImage->keyValue)}}" 
                                        alt="" />
                                        <div class="meta">
                                          <p class="name">{{$c->business->title}}</p>

                                          <p class="preview">{!! $chat->type == 0 ? $chat->message : "Requested for Custom Package" !!}</p>
                                        </div>
                                      </div>
                                    </a>
                                </li>
@endforeach
</ul>
                                