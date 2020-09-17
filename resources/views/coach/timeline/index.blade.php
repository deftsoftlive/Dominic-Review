@extends('inc.homelayout')
@section('title', 'DRH|Register')
@section('content')

<div class="account-menu">
    <div class="container">
        <div class="menu-title">
            <span>Account</span> menu
        </div>
        <nav>
            <ul>
            @php
            $user_role = \Auth::user()->role_id;
            @endphp
            @if($user_role == '2')
            @include('inc.parent-menu')
            @elseif($user_role == 3)
            @include('inc.coach-menu')
            @endif
            </ul>
        </nav>
    </div>
</div>

@php 
    $report = DB::table('player_reports')->where('player_id',$player_id)->orderBy('id','desc')->first();
    $competition = DB::table('competitions')->where('player_id',$player_id)->orderBy('id','desc')->first();
    $goal = DB::table('set_goals')->where('player_id',$player_id)->orderBy('id','desc')->first();
    $badge = DB::table('user_badges')->where('user_id',$player_id)->orderBy('id','desc')->first();
@endphp

<section class="player-info-sec">
    <div class="container">
        <div class="owl-carousel player-info-slider">
            <div class="item">
                <div class="player-info-card">
                    <div class="game-card">

                        <div class="game-icon-circle">
                             <figure>
                                <img src="http://49.249.236.30:8654/dominic-new/public/images/marker-new.png">
                            </figure>
                            <span class="game-icon"><i class="fas fa-file-invoice"></i></span>
                        </div>
                    </div>
                    <div class="game-detail">
                        <p class="game-date">@php echo date("d/m/Y", strtotime($report->created_at)); @endphp</p>
                        <div class="player-info">
                            <p>[@php echo getUsername($report->player_id); @endphp] Received a new report</p>
                            <a href="{{url('/user/report/timeline')}}/@php echo base64_encode($report->player_id); @endphp" class="normal-link">Click to view info</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="player-info-card">
                    <div class="game-card">
                        <div class="game-icon-circle">
                            <figure>
                                <img src="http://49.249.236.30:8654/dominic-new/public/images/marker-new.png">
                            </figure>
                            <span class="game-icon">
                            <i class="fas fa-file-invoice"></i>
                            </span>
                        </div>
                    </div>
                    <div class="game-detail">
                        <p class="game-date">@php echo date("d/m/Y", strtotime($competition->created_at)); @endphp</p>
                        <div class="player-info">
                            <p>[@php echo getUsername($competition->player_id); @endphp] Received a new competitions</p>
                            <a href="{{url('/user/competition/timeline')}}/@php echo base64_encode($competition->player_id); @endphp" class="normal-link">Click to view info</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="player-info-card">
                    <div class="game-card">
                        <div class="game-icon-circle">
                             <figure>
                                <img src="http://49.249.236.30:8654/dominic-new/public/images/marker-new.png">
                            </figure>
                            <span class="game-icon"><i class="fas fa-file-invoice"></i></span>
                        </div>
                    </div>
                    <div class="game-detail">
                        <p class="game-date">@php echo date("d/m/Y", strtotime($goal->created_at)); @endphp</p>
                        <div class="player-info">
                            <p>[@php echo getUsername($goal->player_id); @endphp] Received a new goals</p>
                            <a href="{{url('/user/goal/timeline')}}/@php echo base64_encode($goal->player_id); @endphp" class="normal-link">Click to view info</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="player-info-card">
                    <div class="game-card">
                        <div class="game-icon-circle">
                             <figure>
                                <img src="http://49.249.236.30:8654/dominic-new/public/images/marker-new.png">
                            </figure>
                            <span class="game-icon"><i class="fas fa-file-invoice"></i></span>
                        </div>
                    </div>
                    <div class="game-detail">
                        <p class="game-date">@php echo date("d/m/Y", strtotime($badge->created_at)); @endphp</p>
                        <div class="player-info">
                            <p>[@php echo getUsername($badge->user_id); @endphp] Received a new badges</p>
                            <a href="{{url('/user/badge/timeline')}}/@php echo base64_encode($badge->user_id); @endphp" class="normal-link">Click to view info</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection