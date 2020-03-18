
<div class="live-chatbox-wrap">
    <a href="javascript:void(0);" class="live-chatbox-btn" id="chatbox-btn"><i class="fas fa-comment-alt"></i></a>
<div id="chatbox" class="live-chatbox">
	<div id="friendslist">
    	<div id="topmenu">
        	<span class="friends"></span>
            <span class="chats"></span>
            <span class="history"></span>
        </div>
        
        <div id="friends">
        	<div class="friend">
            	<img src="/frontend/images/girl.png" />
                <p>
                	<strong>Miro Badev</strong>
	                <span>miro001@gmail.com</span>
                </p>
                <div class="status available"></div>
            </div>
            
            <div class="friend">
            	<img src="/frontend/images/girl.png" />
                <p>
                	<strong>Martin Joseph</strong>
	                <span>mar001@gmail.com</span>
                </p>
                <div class="status away"></div>
            </div>
            
            <div class="friend">
            	<img src="/frontend/images/girl.png" />
                <p>
                	<strong>Tomas Kennedy</strong>
	                <span>tom0001@gmail.com</span>
                </p>
                <div class="status inactive"></div>
            </div>
            
            <div class="friend">
            	<img src="/frontend/images/girl.png" />
                <p>
                	<strong>Enrique	Sutton</strong>
	                <span>enri001@gmail.com</span>
                </p>
                <div class="status inactive"></div>
            </div>
            
            <div class="friend">
            	<img src="/frontend/images/girl.png" />
                <p>
                <strong>	Darnell	Strickland</strong>
	                <span>darne001@gmail.com</span>
                </p>
                <div class="status inactive"></div>
            </div>
            
            <div id="search">
	            <input type="text" id="searchfield" value="Search contacts..." />
            </div>
            
        </div>                
        
    </div>	
    
    <div id="chatview" class="p1">    	
        <div id="profile">

            <div id="close">
                <div class="cy"></div>
                <div class="cx"></div>
            </div>
            
            <p>Miro Badev</p>
            <span>miro@ba001@gmail.com</span>
        </div>
        <div id="chat-messages">
        	<label>Thursday 02</label>
            
            <div class="message">
            	<img src="/frontend/images/girl.png" />
                <div class="bubble">
                	Really cool stuff!
                    <div class="corner"></div>
                    <span>3 min</span>
                </div>
            </div>
            
            <div class="message right">
            	<img src="/frontend/images/girl.png" />
                <div class="bubble">
                	Can you share a link for the tutorial?
                    <div class="corner"></div>
                    <span>1 min</span>
                </div>
            </div>
            
             
            
        </div>
    	
        <div id="sendmessage">
        	<input type="text" value="Send message..." />
            <button id="send"></button>
        </div>
    
    </div>        
</div>
</div>	


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<script>
    $(document).ready(function() {

        $("#chatbox-btn").click(function(){
            $(this).toggleClass("active");
          $("#chatbox").toggleClass("chatbox-active");
        });

    
    $(".friend").each(function(){       
        $(this).click(function(){
            var childOffset = $(this).offset();
            var parentOffset = $(this).parent().parent().offset();
            var childTop = childOffset.top - parentOffset.top;
            var clone = $(this).find('img').eq(0).clone();
            var top = childTop+12+"px";
            
            $(clone).css({'top': top}).addClass("floatingImg").appendTo("#chatbox");                                    
            
            setTimeout(function(){$("#profile p").addClass("animate");$("#profile").addClass("animate");}, 100);
            setTimeout(function(){
                $("#chat-messages").addClass("animate");
                $('.cx, .cy').addClass('s1');
                setTimeout(function(){$('.cx, .cy').addClass('s2');}, 100);
                setTimeout(function(){$('.cx, .cy').addClass('s3');}, 200);         
            }, 150);                                                        
            
            $('.floatingImg').animate({
                'width': "68px",
                'left':'108px',
                'top':'20px'
            }, 200);
            
            var name = $(this).find("p strong").html();
            var email = $(this).find("p span").html();                                                      
            $("#profile p").html(name);
            $("#profile span").html(email);         
            
            $(".message").not(".right").find("img").attr("src", $(clone).attr("src"));                                  
            $('#friendslist').fadeOut();
            $('#chatview').fadeIn();
        
            
            $('#close').unbind("click").click(function(){               
                $("#chat-messages, #profile, #profile p").removeClass("animate");
                $('.cx, .cy').removeClass("s1 s2 s3");
                $('.floatingImg').animate({
                    'width': "40px",
                    'top':top,
                    'left': '12px'
                }, 200, function(){$('.floatingImg').remove()});                
                
                setTimeout(function(){
                    $('#chatview').fadeOut();
                    $('#friendslist').fadeIn();             
                }, 50);
            });
            
        });
    });         
});
</script>