@extends('layouts.admin')
@section('content')

<aside class="right-side">               
    <section class="content-header">
        <h1>
            Messages
            <small>Listing</small>
        </h1>
    </section>

    @include('partials/removeMessage')
    @include('partials/message')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">                           
                
                <div class="box">
                    
                    <div class="box-header">
                        <h3 class="box-title">Messages:</h3>                                    
                    </div>
                    <div id="message-frame">
                                    <div class="content">
                                        <div class="messages">
                                            <ul>
                                                @if( count($messages)>0 )
                                                    @foreach($messages as $message)
                                                        @if($message->from_id == $user1_id)
                                                        <!-- classes are reverted "sent"-->
                                                            <li class="replies">
                                                                <img src="/upload/images/{{App\User::where('id', $user1_id)->pluck('profile_picture')->first()}}" alt="" />
                                                                <p>{{ $message->message }}</p>
                                                            </li>
                                                        @endif
                                                        @if($message->from_id == $user2_id)
                                                        <!-- classes are reverted "reply"-->
                                                            <li class="sent">
                                                                <img src="/upload/images/{{App\User::where('id', $user2_id)->pluck('profile_picture')->first()}}" alt="" />
                                                                <p>{{ $message->message }}</p>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                    <!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </section><!-- /.content -->
</aside>
@endsection