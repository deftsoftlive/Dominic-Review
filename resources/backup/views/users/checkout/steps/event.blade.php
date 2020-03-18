@extends('users.checkout.index1')
@section('checkoutContent')

<fieldset>
      <div class="card-heading">
         @if($UserEvent->count() > 0)
            <h3>Event {{ $UserEvent->first()->title }}</h3>
         @else
            <h3>Event Details</h3>
         @endif                       
        </div>
          <div class="multistep-body text-center">
            <div class="event-detail-card text-center">
                 
            

              @if($UserEvent->count() > 0)
                  <?php $event = $UserEvent->first(); ?>
                      <h3 class="evnt-title">{{$event->title}}</h3>
                      <p><i class="fas fa-calendar-alt"></i> <span>{{date('D-M-Y',strtotime($event->start_date))}} To {{date('D-M-Y',strtotime($event->end_date))}}</span></p>
                      <div class="evt-descripton mt-2">
                      <p>{{$event->description}}</p>
                    </div> 
                        <ul class="button-grp-wrap text-center">
                                  <li>
                                    <a href="javascript:void(0)" class="icon-btn" data-toggle="modal" data-target="#myModal">
                                      <i class="fas fa-edit"></i>
                                    </a>
                                  </li>                   
                       </ul>


              @else
                  <span class="info-icon"><i class="fas fa-info-circle"></i></span>
                   <h3><i class="fa fa-information-circle"></i>Please choose Event before proceeding to Next Step</h3>
                  <ul class="button-grp-wrap text-center">
                                  <li>
                                      <a href="javascript:void(0)" class="icon-btn" data-toggle="modal" data-target="#myModal">
                                         <i class="fas fa-plus"></i>
                                       </a>
                                  </li>                   
                 </ul>

              @endif

                 
            </div>

             <div class="multistep-footer mt-4 text-right"> 
              @if(!empty($backStepUrl))
                 <a href="{{$backStepUrl}}" class="cstm-btn solid-btn previous_button">Back</a>
              @endif

              @if(!empty($newStepUrl))
                
              <a href="{{$newStepUrl}}" class="next cstm-btn solid-btn">NEXT</a>
              @endif
            </div>
           </div>

    </fieldset>












<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">My Events</h4>
      </div>
      <div class="modal-body">
          @include('users.checkout.parts.user_events')      


      </div>
       
    </div>
  </div>
</div>


@endsection