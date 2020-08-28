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

<section class="player-info-sec">
    <div class="container">
        <div class="owl-carousel player-info-slider">
            <div class="item">
                <div class="player-info-card">
                    <div class="game-card">
                        <div class="game-icon-circle">
                            <span class="game-icon"><i class="fas fa-file-invoice"></i></span>
                        </div>
                    </div>
                    <div class="game-detail">
                        <p class="game-date">15/08/2020</p>
                        <div class="player-info">
                            <p>[Player Name] Received a new report</p>
                            <a href="javascript:void(0);" class="normal-link">Click to view info</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="player-info-card">
                    <div class="game-card">
                        <div class="game-icon-circle">
                            <span class="game-icon"><i class="fas fa-file-invoice"></i></span>
                        </div>
                    </div>
                    <div class="game-detail">
                        <p class="game-date">15/08/2020</p>
                        <div class="player-info">
                            <p>[Player Name] Received a new report</p>
                            <a href="javascript:void(0);" class="normal-link">Click to view info</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="player-info-card">
                    <div class="game-card">
                        <div class="game-icon-circle">
                            <span class="game-icon"><i class="fas fa-file-invoice"></i></span>
                        </div>
                    </div>
                    <div class="game-detail">
                        <p class="game-date">15/08/2020</p>
                        <div class="player-info">
                            <p>[Player Name] Received a new report</p>
                            <a href="javascript:void(0);" class="normal-link">Click to view info</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="player-info-card">
                    <div class="game-card">
                        <div class="game-icon-circle">
                            <span class="game-icon"><i class="fas fa-file-invoice"></i></span>
                        </div>
                    </div>
                    <div class="game-detail">
                        <p class="game-date">15/08/2020</p>
                        <div class="player-info">
                            <p>[Player Name] Received a new report</p>
                            <a href="javascript:void(0);" class="normal-link">Click to view info</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="player-info-card">
                    <div class="game-card">
                        <div class="game-icon-circle">
                            <span class="game-icon"><i class="fas fa-file-invoice"></i></span>
                        </div>
                    </div>
                    <div class="game-detail">
                        <p class="game-date">15/08/2020</p>
                        <div class="player-info">
                            <p>[Player Name] Received a new report</p>
                            <a href="javascript:void(0);" class="normal-link">Click to view info</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




@endsection