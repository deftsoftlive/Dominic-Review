@if(Auth::check() && Auth::user()->role == 'user')
 <a href="javascript:void(0);" id="calender-toggle" data-toggle="tooltip" data-placement="right" title="Start Planning Here, Choose a Date"><span><i class="fas fa-calendar-alt"></i></span></a>
@endif