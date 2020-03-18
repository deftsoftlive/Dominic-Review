jQuery(function(){





// $("body").on('click','a.btn-accepted',function(e){
//     e.preventDefault();
//     var parent = $(this).attr('data-chatID');
//     var pid = $(this).attr('data-id');
//     var msg = "Your Custom Package Request is Accepted";
//     //sendMessage(msg,parent,pid,2);
// });



$("body").on('click','a.btn-delined',function(e){
    e.preventDefault();
    var parent = $(this).attr('data-chatID');
    var pid = $(this).attr('data-id');
    var msg = "Your Custom Package Request is Delined";
    sendMessage(msg,parent,pid,3);
});

//----------------------------------------------------------------------

function sendMessage(msg,parent=0,pid=0,type=0){
  
    var $this = jQuery("body").find('#sendMessage');
    var url = $this.attr('action');
      $.ajax({
               url : url,
               data : {
                message : msg,
                parent : parent,
                package_id : pid,
                type: type
               },
               type: 'POST',   
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
               },
                beforeSend: function() {
                   //$("body").find('.custom-loading').show();
                     $this.find('.messageNotofications').html('');
                     $this.find('button.cstm-btn').attr('disabled','true');
                     $this[0].reset();


                },
                success: function (result) {
                        if(parseInt(result.status) == 1){
                            $("body").find('#ChatMessages').append(result.message);
                            $this.find('button.cstm-btn').removeAttr('disabled');
                             scrollingTop();
                             getChatListOfUser('all');
                       }
               },
               complete: function() {
                        $("body").find('.custom-loading').hide();
               },
               error: function (jqXhr, textStatus, errorMessage) {
                     
               }

        });
   
}









/*----------------------------------------------------------------------------
|
|   Business filter
|_____________________________________________________________________________
*/




$("body").on('keyup','[data-search]',function() { // This will need to change to the id of your search field
     var searchStr = $(this).val().toLowerCase();
     $("body").find('li.contact').each(function() { // Here you'll need to update your selector to find each image. As you are not using the class "caption" on any of your images. // '#thumbnails li' or something similar
          var str = $(this).attr("data-filter-name").toLowerCase(); //this call pulls the attribute "data-title", you'll need to update it to the attribute value you're using for the caption text. // 'data-ilb2-caption', You should also keep the code clean and add a space between attributes. 'data-imagelightbox="demo"data-ilb2-caption' to 'data-imagelightbox="demo" data-ilb2-caption'
          
          console.log(str.indexOf(searchStr));
          if(str.indexOf(searchStr) > -1) {  
               $(this).show(); 
          } else {
               $(this).hide(); 
          }
     });
});




  $(window).on('keypress keydown',function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
       if(event.target.nodeName == 'TEXTAREA'){
           $("body").find('#sendMessage').submit();
       }
      return false;
    }
  });

jQuery("body").on('submit','#sendMessage',function(e){
   e.preventDefault();
   var $this = jQuery( this );
   var url = $this.attr('action');
   //if($this.valid()){
      $.ajax({
               url : url,
               data : $this.serialize(),
               type: 'POST',   
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
               },
                beforeSend: function() {
                   //$("body").find('.custom-loading').show();
                     $this.find('.messageNotofications').html('');
                     $this.find('button.cstm-btn').attr('disabled','true');
                     $this[0].reset();


                },
                success: function (result) {
                        if(parseInt(result.status) == 1){
                            $("body").find('#ChatMessages').append(result.message);
                            $this.find('button.cstm-btn').removeAttr('disabled');
                             scrollingTop();
                             getChatListOfUser('all');
                       }
               },
               complete: function() {
                        $("body").find('.custom-loading').hide();
               },
               error: function (jqXhr, textStatus, errorMessage) {
                     
               }

        });
   //}

});




getChatListOfUser('all');
getMessagesAccordingToID();
getDealAndDiscountChat();

setInterval(function(){ 
   getDealAndDiscountChat('onlyNewMessages');
   getChatListOfUser();
}, 5000);



function getDealAndDiscountChat(type="all") {
 
   var $this = jQuery('#ChatMessages');
   var url = $this.attr('data-action');
   
      $.ajax({
               url : url,
               data : {
                 type : type
               },
               type: 'GET',   
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
               },
                beforeSend: function() {
                     
                },
                success: function (result) {
                        if(parseInt(result.status) == 1){
                            $("body").find('#ChatMessages').html(result.messages);
                            scrollingTop();
                        }
               },
               complete: function() {
                        
               },
               error: function (jqXhr, textStatus, errorMessage) {
                     
               }

        });
 
}




///////////////////////////////////////////////////////////////////////////////



function getChatListOfUser(type="some") {
 
   var $this = jQuery('#contacts');
   var url = $this.attr('data-action');

   var activeList = jQuery("body").find('#listactive').val();
   
      $.ajax({
               url : url,
               type: 'GET',
               data:{
                 activeList:activeList,
                 type : type
               },   
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
               },
               beforeSend: function() {
                   
               },
               success: function (result) {
                      if(parseInt(result.status) == 1){
                         $this.html(result.list);
                          

                      }
               },
               complete: function() {
                        
               },
               error: function (jqXhr, textStatus, errorMessage) {
                     
               }

        });
 
}


function scrollingTop() {

  var sheight = jQuery("body").find('ul#ChatMessages').height();
  console.log(sheight);
  jQuery("body").find('.messages').animate({ scrollTop: sheight }, "slow");
 
}




///////////////////////////////////////////////////////////////////////////



jQuery("body").on('click','a.getChatbox',function(e){
      e.preventDefault();
      var $this = jQuery( this );

      jQuery("body").find('#listactive').val($this.attr('data-id'));

      $('li.contact').removeClass('active');
      
      $this.closest('li.contact').addClass('active');

      var url = $this.attr('data-href');
      $.ajax({
               url : url,
                
               type: 'GET',   
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
               },
                beforeSend: function() {
                     
                },
                success: function (result) {
                        if(parseInt(result.status) == 1){
                           $("body").find('#userChatBox').html(result.data);
                           getChatListOfUser('all');
                           scrollingTop();

                        }
               },
               complete: function() {
                        
               },
               error: function (jqXhr, textStatus, errorMessage) {
                     
               }

        });  
});






 

function getMessagesAccordingToID() {
   
      //jQuery("body").find('#listactive').val($this.attr('data-id'));
      var $this = jQuery("body").find('#contacts').find('li.active').find('a.getChatbox');

     

      var url = $this.attr('data-href');
      $.ajax({
               url : url,
                
               type: 'GET',   
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
               },
                beforeSend: function() {
                     
                },
                success: function (result) {
                        if(parseInt(result.status) == 1){
                           $("body").find('#userChatBox').html(result.data);
                           getChatListOfUser('all');
                           scrollingTop();
                        }
               },
               complete: function() {
                        
               },
               error: function (jqXhr, textStatus, errorMessage) {
                     
               }

        });  
}






});