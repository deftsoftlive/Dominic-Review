@extends('inc.homelayout')
@section('title', 'DRH|Listing')
@section('content')

@php $base_url = \URL::to('/'); @endphp
<section class="football-course-sec" style="background: url({{$base_url}}/public/uploads/1584684865tennis_course_banner_image.png);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="football-course-content">
                    <h2 class="f-course-heading">Game Charts</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="game-chart">
    <div class="container">
        <div class="pink-heading">
            <h2>Game Charts</h2>
        </div>
        <div class="outer-wrap">
            <div class="row">
            	<div class="col-md-12">
            		<h4>Match Details</h4>
            		<ul class="cart-list">
            			<li><p>Competition Name -<span>{{$competition->comp_name}}</span></p></li>
            			<li><p>Player Name -<span>@php echo getUsername($match->player_id); @endphp</span></p></li>
                        <li><p>Opponent's Name -<span>{{$match->opponent_name}}</span></p></li>
            		</ul>
            	</div>
                @foreach($charts as $ch)

                    <div class="col-md-3">
                  
                        <figure>
                            <img src="{{URL::asset('/uploads/game-charts')}}/{{$ch->image}}">
                        </figure>
                   
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
@endsection