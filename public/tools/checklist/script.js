// add new task to checklist

$("body").on('click','#AddNewTask',function(e){
	    e.preventDefault();
	    $("body").find('#addNewTaskModal').modal('show');
});




 

$("body").on('submit','#chooseTaskCategories',function(e){

     e.preventDefault();
     var $this = $( this );
     $.ajax({
               url : $this.attr('data-action'),
               data : $this.serialize(),
               type: 'POST',   
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
               },
                beforeSend: function() {
                     $this.find('.messageNotofications').html('');
                     $this.find('button.cstm-btn').attr('disabled','true');                     
                },
                success: function (result) {
                        if(parseInt(result.status) == 1){
                              $("body").find('#ChatMessages').append(result.message);
                              $this.find('button.cstm-btn').removeAttr('disabled');
                              window.location.reload();
                        }
                        $("body").find('.custom-loading').hide();
               },
               complete: function() {
                        $("body").find('.custom-loading').hide();
               },
               error: function (jqXhr, textStatus, errorMessage) {
                     
               }

        });
});





//=========================================================================================
//=========================================================================================
//=========================================================================================




$("body").on('submit','form#AddNewTasks',function(e){
  e.preventDefault();
       var $modal =$("body").find('#addNewTaskModal');
 
       var $this = $( this );
       $.ajax({
                 url : $this.attr('data-action'),
                 data : $this.serialize(),
                 type: 'POST',   
                 dataTYPE:'JSON',
                 headers: {
                   'X-CSRF-TOKEN': $('input[name=_token]').val()
                 },
                  beforeSend: function() {
                       $this.find('.messageNotofications').html('');
                       $this.find('button.cstm-btn').attr('disabled','true');                     
                  },
                  success: function (result) {
                          if(parseInt(result.status) == 1){
                                $("body").find('#ChatMessages').append(result.message);
                                $this.find('button.cstm-btn').removeAttr('disabled');
                                loadAllTasks();
                                $modal.modal('hide');
                          }else{
                                $this.find('#messagesystem').html(result.messages);
                          }
                          $("body").find('.custom-loading').hide();
                 },
                 complete: function() {
                          $("body").find('.custom-loading').hide();
                 },
                 error: function (jqXhr, textStatus, errorMessage) {
                       
                 }

          });
});






function loadAllTasks() {
    $this = $("body").find('form#sidebarFormCheckList');
    var $div = $("body").find('#loadCheckListTasks');
    $.ajax({
           url : $this.attr('data-action'),
           data : $this.serialize(),
           type: 'POST',   
           dataTYPE:'JSON',
           headers: {
             'X-CSRF-TOKEN': $('input[name=_token]').val()
           },
            beforeSend: function() {
                 $this.find('.messageNotofications').html('');
                 $this.find('button.cstm-btn').attr('disabled','true');                     
            },
            success: function (result) {
                    if(parseInt(result.status) == 1){
                            $div.html(result.taskList);
                            $("body").find('.custom-loading').hide();
                            resetDefaultInput();
                    } 
                    $("body").find('.custom-loading').hide();
           },
           complete: function() {
                    $("body").find('.custom-loading').hide();
           },
           error: function (jqXhr, textStatus, errorMessage) {
                 
           }

    });
}

loadAllTasks();




$("body").on('change','.cstm-planning-checkbox',function(){
     if($(this).is(':checked')){
        $(this).closest('.cst-planing').addClass('complete_layer_task');

        $("body").find('#complete').val($(this).val());
        $("body").find('#uncomplete').val(0);

     }else{
      $(this).closest('.cst-planing').removeClass('complete_layer_task');
        $("body").find('#uncomplete').val($(this).val());
        $("body").find('#complete').val(0);
     }

     loadAllTasks();
});


$("body").on('click','.task-deleted',function(){
     var $this = $( this );
     $("body").find('#deleted').val($this.attr('data-value'));
     
     loadAllTasks();
});





$("body").on('change','.formCategoryItem',function(){
     loadAllTasks();
});




function resetDefaultInput() {
        $("body").find('#uncomplete').val(0);
        $("body").find('#complete').val(0);
        $("body").find('#deleted').val(0);

                 $("body").find(".js-select2").select2();
                 $("body").find(".js-select2-multi").select2();
}






$("body").on('click','.edit-task',function(e){
    e.preventDefault();
    var $this = $( this );
    var $id = $this.attr('data-id');
    var $modal = $("body").find('#taskLayerModal');
    var $modalContent = $modal.find('#loadTaskContentForEditPopup');
    $.ajax({
           url : $this.attr('data-action'),
           type: 'GET',   
           dataTYPE:'JSON',
           headers: {
             'X-CSRF-TOKEN': $('input[name=_token]').val()
           },
            beforeSend: function() {
                 $modal.modal('show');
                 $modal.find('.loaderModal').show();
            },
            success: function (result) {
                    if(parseInt(result.status) == 1){
                             $modalContent.html(result.content);
                             resetDefaultInput();
                             $modal.find('.loaderModal').hide();

                    } 
                    $modal.find('.loaderModal').hide();
           },
           complete: function() {
                    $("body").find('.custom-loading').hide();
           },
           error: function (jqXhr, textStatus, errorMessage) {
                 
           }

  });
});



$("body").on('click','.edit-event-target',function(e){
   e.preventDefault();
   var $this = $( this );
   var $target = $this.attr('data-target');
    $this.closest('.edit-something').hide();
   $("body").find($target).show();
});




function hideShowWrittenInput($this) {
    $this.closest('.edit-something').hide();
    $($this.attr('data-target')).show();

}


$("body").on('submit','#updateTaskInformation',function(e){
          e.preventDefault();
          updateTaskInformation();
});




function updateTaskInformation() {
     var $this = $("body").find('#updateTaskInformation');
     var $modal = $("body").find('#taskLayerModal');
     var $modalContent = $modal.find('#loadTaskContentForEditPopup');
      $.ajax({
           url : $this.attr('data-action'),
           type: 'POST',   
           data : $this.serialize(),
           dataTYPE:'JSON',
           headers: {
             'X-CSRF-TOKEN': $('input[name=_token]').val()
           },
            beforeSend: function() {
                 $modal.modal('show');
                 $modal.find('.loaderModal').show();
            },
            success: function (result) {
                    if(parseInt(result.status) == 1){
                             $modalContent.html(result.content);
                             resetDefaultInput();
                             $modal.find('.loaderModal').hide();
                    } 
                    $modal.find('.loaderModal').hide();
           },
           complete: function() {
                    $("body").find('.custom-loading').hide();
           },
           error: function (jqXhr, textStatus, errorMessage) {
                 
           }

  });
}




$("body").on('change','#addMyVendorToTask',function(){
    updateTaskInformation();
});



$("body").on('change','#markAsCompleted',function(){
    updateTaskInformation();
});




$("body").on('change','#taskDate',function(){
 updateTaskInformation();
});


$("body").on('change','#vendor_remove',function(){
 updateTaskInformation();
});
  $("#taskLayerModal").on('hide.bs.modal', function(){
     loadAllTasks();
  });


 
 jQuery("body").on('click','.resetRadio',function(){
     var $input = $( this ).attr('data-target');
           $this = $('input[name='+$input+']:checked');
        if($this.is(':checked')) { 
           $this.prop('checked', false);
        } 
        loadAllTasks();  
});



$("body").on('click','#printMe',function(){
                //Print ele4 with custom options
                $("#loadCheckListTasks").print({
                    //Use Global styles
                    globalStyles : false,
                    //Add link with attrbute media=print
                    mediaPrint : false,
                    //Custom stylesheet
                    stylesheet : "http://fonts.googleapis.com/css?family=Inconsolata",
                    //Print in a hidden iframe
                    iframe : false,
                    //Don't print this
                    noPrintSelector : ".avoid-this",
                    //Add this at top
                   // prepend : "Hello World!!!<br/>",
                    //Add this on bottom
                   // append : "<span><br/>Buh Bye!</span>",
                    //Log to console when printing is done via a deffered callback
                    deferred: $.Deferred().done(function() { console.log('Printing done', arguments); })
                });
            });
