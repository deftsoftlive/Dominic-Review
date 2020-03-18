@if(Auth::check() && Auth::user()->role == "user")
 
<li>
    <div class="nav-item nav-profile dropdown">
       <a class="nav-link dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
            <span class="nav-profile-img">
                        <i class="fas fa-envelope"></i>
                         @if(Auth::user()->newMessages->count() > 0)
                                    <sup class="msg-front-count">{{Auth::user()->newMessages->count()}}</sup> 
                         @endif
                      </span>

        </a>
       
         
          <?php $business = getUserNotifications(); ?>
         <ul class="dropdown-menu navbar-dropdown msg-dropdown" aria-labelledby="profileDropdown" x-placement="bottom-start">
              <li class="header">You have {{Auth::user()->newMessages->count()}} messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  @foreach($business as $busine)
                  <li><!-- start message -->
                    <a href="{{url(route('deal_discount_chats'))}}" class="msg-number">
                      <div class="profile-img">
                        <img src="{{ProfileImage($busine->business->profileImage->keyValue)}}" class="img-circle" alt="">
                        <span class="unreadMessages">{{$busine->unReadMessages->count()}}</span>
                      </div>
                      <div class="msg-descrip">
                      <h4>
                        <span class="usr-name">{{$busine->business->title}}</span>
                        <small><i class="fa fa-clock-o"></i> {{$busine->updated_at->diffForHumans()}}</small>

                      </h4>
                      <p> {{$busine->unReadFirstMessage->message}}</p>
                    </div>
                    </a>
                  </li>
                  @endforeach
                  <!-- end message -->
                <li class="footer"><a href="{{url(route('deal_discount_chats'))}}" class="all-msg">See All Messages</a></li> 
            </ul>





    </div>

</li>











@elseif(Auth::check() && Auth::user()->role == "vendor")

<li>
    <div class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
            <span class="nav-profile-img">
                        <i class="fas fa-envelope"></i>
                         @if(Auth::user()->newVendorsMessages->count() > 0)
                                    <sup class="msg-front-count">{{Auth::user()->newVendorsMessages->count()}}</sup> 
                         @endif
                      </span>

        </a>
       
         
          <?php $business = getVendorNotifications(); ?>
         <ul class="dropdown-menu navbar-dropdown msg-dropdown" aria-labelledby="profileDropdown" x-placement="bottom-start">
              <li class="header">You have {{Auth::user()->newVendorsMessages->count()}} messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  @foreach($business as $busine)
                  <li><!-- start message -->
                    <a href="{{url(route('myCategoryChat',$busine->business->category->slug))}}" class="msg-number">
                      <div class="profile-img">
                        <img src="{{ProfileImage($busine->user->profile_image)}}" class="img-circle" alt="">
                        <span class="unreadMessages">{{$busine->unReadMessages->count()}}</span>
                      </div>
                      <div class="msg-descrip">
                      <h4>
                        <span class="usr-name">{{$busine->user->name}}</span>
                        <small><i class="fa fa-clock-o"></i> {{$busine->updated_at->diffForHumans()}}</small>

                      </h4>
                      <p>{{$busine->business->title}} </p>
                    </div>
                    </a>
                  </li>
                  @endforeach
                  <!-- end message -->
             <!--  <li class="footer"><a href="#" class="all-msg">See All Messages</a></li> -->
            </ul>


    </div>

</li>

@endif