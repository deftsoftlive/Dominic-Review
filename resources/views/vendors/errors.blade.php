@if(Session::has('flash_message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
   <strong>Success! </strong><?=  Session::get('flash_message') ?>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
   </button>
</div>
@endif
@if (session('status'))
<div class="alert alert-success" role="alert">
   {{ session('status') }}
</div>
@endif
@if(Session::has('error_message'))
<div class="alert alert-warning" role="alert">
   <?=  Session::get('error_message') ?>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
   </button>
</div>
@endif
@if(Session::has('error_flash_message'))
<div class="alert alert-warning" role="alert">
  <?=  Session::get('error_flash_message') ?>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
   </button>
</div>
@endif
@if(Session::has('verified') && Session::get('verified'))
<div class="alert alert-success" role="alert">
   Your email has been verified successfully. Please login to proceed.
   
</div>
@endif
@if(Session::has('messages'))
<div class="alert alert-success" role="alert">
   <?=  Session::get('messages') ?>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
   </button>
</div>
@endif

<div id="globalMessages"></div>