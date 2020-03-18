@extends('layouts.vendor')
@section('vendorContents')


<div class="container-fluid">
    <div class="row">
       <div class="col-lg-12">
          <div class="card vendor-dash-card">
       <div class="card-header">Assign Categories</div>
           <div class="card-body">
               <form id="assignCategory">
              <div class="row ">
                 
                 @foreach($category as $cate)

                  <?php $vendorCategory = \App\VendorCategory::where('category_id',$cate->id)
                  ->where('user_id',Auth::user()->id)->count(); ?>
@if($vendorCategory == 0)
                  <div class="col-lg-6">
                   <div class="vendor-category">
                      <div class="category-checkboxes category-title">
                      <input type="checkbox" name="category[]" value="{{$cate->id}}" id="category-{{$cate->id}}">
                           <label for="category-{{$cate->id}}">{{$cate->label}} ({{$cate->subcategory->count()}})</label>

                           <!--  @if($cate->subcategory->count() > 0)
                      <div class="subcategory-of-category">

                          @foreach($cate->subcategory as $sub)

                              <div class="category-checkboxes">
                                  <input type="checkbox" name="subcategory[{{$cate->id}}][]" value="{{$sub->id}}" id="subcategory-{{$sub->id}}">
                                  <label for="subcategory-{{$sub->id}}">{{$sub->label}}</label>
                               </div>


                          @endforeach

                     </div>
                    @endif -->


                    </div>
                   
                  

                   </div>

                  </div>


         @endif               
                 @endforeach



                 <div class="col-md-12">
                  <div class="btn-wrap mt-2">
                      @csrf <button class="cstm-btn" id="assignCategoryBtn">Assign</button>
                    </div>

                      <div class="errorMessages"></div>
                 </div>
                 </div>
                </form>

           </div>
        </div>
     </div>
   </div>
</div>















@endsection


@section('scripts')
<script src="{{url('/js/validations/selCategoryValidation.js')}}"></script>

<script type="text/javascript">

    function ErrorMsg(type,message){

      var txt='';
          txt +='<div class="alert alert-'+type+'" role="alert">';
      txt +=message;
      txt +='</div>';
    return txt;
  }



function erorrMessage(errors) {
 


      var txt ="";
      $.each(errors, function( index, value ) {
        txt += ErrorMsg('danger',value);
          //  txt +='<li>'+ value +'</li>';
      });
     /// txt +='</ul>';

      return txt;
}

  function assignCategory($this) {
      $.ajax({
               url : "<?= url(route('vendorAssignCategory')) ?>",
               data : $this.serialize(),
               type: 'POST',  // http method
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
               },
                beforeSend: function() {
                     $this.find('button').attr('disabled','true');
                     $("body").find('.loadingDiv').show();
                },
                success: function (data) {
                    if(parseInt(data.status) == 1){
                           $this[0].reset();
                            
                           $this.find('.errorMessages').html(ErrorMsg('success','Business is Assigned.'));
                           
                           window.location.href = data.redirect_links;
                           return true;



                      }else{
                          
                           $this.find('.errorMessages').html(erorrMessage(data.errors));
                            $this.find('button').removeAttr('disabled');
                            $("body").find('.loadingDiv').hide();
                           
                      }
                    
               },
               complete: function() {
                    $this.find('button').removeAttr('disabled');
                    $("body").find('.loadingDiv').hide();
               },
               error: function (jqXhr, textStatus, errorMessage) {
                     $this.find('button').removeAttr('disabled');
               }

        });
  }


  $("body").on('submit','#assignCategory',function(e){
      e.preventDefault();
      assignCategory($(this));
  });


</script>






@endsection