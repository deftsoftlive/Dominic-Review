
// Get Current color and append the value in next input
// function loadColorJQ() {
//     $('.ColorGet').on('change', function() { 
//       var val = $( this ).val();
//       $( this ).next().val(val);
//     });
//   }

// loadColorJQ();

// Add Remove multiple color for event
$(document).ready(function() {
 
    const maxField = 4; //Input fields increment limitation
    const wrapper = $('.field_wrapper'); //Input field wrapper
    const addBtn = `<li> <button class="icon-btn add_button action_btn" type="button" style=""><i class="fas fa-plus"></i></button></li>`;
    const removeBtn = `<li> <button class="icon-btn btn-danger add-more action_btn" type="button"
    						style="">
					    	<i class="fas fa-trash-alt"></i>
					   </button></li>`;
    const fieldHTML = `
    <div class="element col-lg-3 col-md-6">
	     <div class="pick-color-field-wrap">
              <div class="form-group">
                <input type="color" class="ColorGet" style="width: 46px; margin-left: -2px;" name="colours[]">
                <input type="text" placeholder="Colour Name" class="form-control ColourSelect" name="colourNames[]"> 
                <ul class="input-group-btn color-btn acrdn-action-btns remove_button">
                	${removeBtn}
                </ul>
              </div>
          </div>
	</div>`;

    let x = parseInt($('#countColours').val()); //Initial field counter is 1
    
    //Once add button is clicked

function addBtnJQ(addButton) {
	
    $(addButton).click(function() {
    	console.log('x add ', x);
        //Check maximum number of input fields
        if(x < maxField) {
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        	// loadColorJQ(); 
        }
        if(x === 4) {
        	$($('.color-btn')[0]).addClass('remove_button');
        	$($('.color-btn')[0]).html(removeBtn);
        }
    });
}
    
addBtnJQ('.add_button');

    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e) {
    	console.log('x del ', x);
        $(this).parents('.element').remove(); //Remove field html
        x--; //Decrement field counter
        if(x < maxField) {
	        $($('.color-btn')[0]).removeClass('remove_button');
        	$($('.color-btn')[0]).html(addBtn);
        	addBtnJQ('.add_button');
        }
    });

});

