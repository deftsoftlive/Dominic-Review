<section class="content-header">
    @if(Session::has('flash_message'))
    <div class="row" >
        <div class="col-md-8">
              <div class="alert alert-success " id="success-alert">
                      <button type="button" class="close" data-dismiss="alert">x</button>
                      <strong>Success! </strong>
                      <?=  Session::get('flash_message') ?>
                  </div>
        </div><!-- /.col -->
    </div>
    @endif
          
      @if(Session::has('error_flash_message')) 
        
     <div class="row" >
        <div class="col-md-8">
              <div class="alert alert-danger" id="error-alert">
                      <button type="button" class="close" data-dismiss="alert">x</button>
                      <strong>Error! </strong>
                      <?=  Session::get('error_flash_message') ?>
                  </div>         
        </div><!-- /.col -->
   </div>
    @endif  
  </section>
  