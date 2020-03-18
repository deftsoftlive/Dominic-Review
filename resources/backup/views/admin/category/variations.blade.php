@extends('layouts.admin')
 
@section('content')

    <div class="page-header">
                        <div class="page-block">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <div class="page-header-title">
                                        <h5 class="m-b-10">{{$title}}</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item "><a href="{{ url($addLink) }}">View</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


       <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
         @include('admin.error_message')
 
            <div class="card-body">


@php
 $sel_evt= array(); 
 $sel_amenities= array(); 
 $sel_games= array(); 
 $sel_seasons= array(); 
@endphp

@if(count($category_variation))
@foreach($category_variation as $fillCategory)

@if($fillCategory->type == 'event')
@php $sel_evt[] = $fillCategory->variant_id; @endphp  

@elseif($fillCategory->type == 'amenity')
@php $sel_amenities[] = $fillCategory->variant_id; @endphp

@elseif($fillCategory->type == 'seasons')
@php $sel_seasons[] = $fillCategory->variant_id; @endphp

@else
@php $sel_games[] = $fillCategory->variant_id; @endphp
@endif

@endforeach
@endif



  <form role="form" id="formVariations" action="{{ route('category_variations_save', ['slug' => $category->slug]) }}" method="POST" class="row categoryVariants">
      @csrf

        <div class="col-lg-4">
                <h3 class="card-title">Choose Events</h3>
                <ul class="unstyled centered">
                  <li>
                       <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" onclick="allCheck(this)" id="checkbox-event-all" type="checkbox" >
                          <label class="custom-control-label" for="checkbox-event-all">All</label>
                      </div>
                    </li>
                  @foreach($events as $event)  
                    <li>
                       <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" name="events[]" id="styled-checkbox-event-{{$event->id}}" type="checkbox" value="{{$event->id}}" {{ !empty($sel_evt) && in_array($event->id, $sel_evt) ? 'checked' : '' }}>
                          <label class="custom-control-label" for="styled-checkbox-event-{{$event->id}}">{{$event->name}}</label>
                      </div>
                    </li>
                  @endforeach
                  
                </ul>
        </div>

        <div class="col-lg-4">
                <h3 class="card-title">Choose Amenities</h3>
                <ul class="unstyled centered">
                  <li>
                       <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" onclick="allCheck(this)" id="checkbox-amenity-all" type="checkbox" >
                          <label class="custom-control-label" for="checkbox-amenity-all">All</label>
                      </div>
                    </li>
                  @foreach($amenities as $amenity)
  
                    <li>
                       <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" name="amenities[]" id="styled-checkbox-amenity-{{$amenity->id}}" type="checkbox" value="{{$amenity->id}}" {{ !empty($sel_amenities) && in_array($amenity->id, $sel_amenities) ? 'checked' : '' }}>
                          <label class="custom-control-label" for="styled-checkbox-amenity-{{$amenity->id}}">{{$amenity->name}}</label>
                      </div>
                    </li>

                  @endforeach
                  
                </ul>
        </div>

        <div class="col-lg-4">
                <h3 class="card-title">Choose Games</h3>
                <ul class="unstyled centered">
                  <li>
                       <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" onclick="allCheck(this)" id="checkbox-game-all" type="checkbox" >
                          <label class="custom-control-label" for="checkbox-game-all">All</label>
                      </div>
                    </li>
                  @foreach($games as $game)
  
                    <li>
                         <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" name="games[]" id="styled-checkbox-game-{{$game->id}}" type="checkbox" value="{{$game->id}}" {{ !empty($sel_games) && in_array($game->id, $sel_games) ? 'checked' : '' }}>
                          <label class="custom-control-label" for="styled-checkbox-game-{{$game->id}}">{{$game->name}}</label>
                      </div>
                    </li>

                  @endforeach
                  
                </ul>
        </div>

        <div class="col-lg-4">
                <h3 class="card-title">Choose Seasons</h3>
                <ul class="unstyled centered">
                  <li>
                       <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" onclick="allCheck(this)" id="checkbox-season-all" type="checkbox" >
                          <label class="custom-control-label" for="checkbox-season-all">All</label>
                      </div>
                    </li>
                  @foreach($seasons as $season)  
                    <li>
                       <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" name="seasons[]" id="styled-checkbox-season-{{$season->id}}" type="checkbox" value="{{$season->id}}" {{ !empty($sel_seasons) && in_array($season->id, $sel_seasons) ? 'checked' : '' }}>
                          <label class="custom-control-label" for="styled-checkbox-season-{{$season->id}}">{{$season->name}}</label>
                      </div>
                    </li>
                  @endforeach
                  
                </ul>
        </div>

<div class="col-md-12">
      <div class="card-footer">
          <button type="submit" id="btnVariations" class="btn btn-primary">Submit</button>
        </div>
      </div>
</form>
            
            </div>
          </div>
        </div>
      </div>
    </section>

 
     
@endsection

@section('scripts')
<script src="{{url('/admin-assets/js/validations/variationsValidation.js')}}"></script>
<script type="text/javascript">

  // $("#checkbox-season-all").click(function() {
  //   $(this).closest('li').nextAll().find('input[type=checkbox]').not(this).prop('checked', this.checked);
  // });

  function allCheck(tagData) {
    $(`#${tagData.id}`).parent().parent().parent().find('.error').css('display', 'none');
    $(`#${tagData.id}`).closest('li').nextAll().find('input[type=checkbox]').not(`#${tagData.id}`).prop('checked', $(`#${tagData.id}`).prop("checked"));
  }

</script>
@endsection
 
