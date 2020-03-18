var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

$(document).ready(function(){
    $('#csvForm').validate({
        onfocusout: function(valueToBeTested) {
            $(valueToBeTested).valid();
        },
        rules:{
            'csv': { 
              required: true,
              // maxlength: 50, 
            },
        }
    });

    $('csvSubmitButton').click(function() {
        if($('#csvForm').valid()) {
            $('#csvSubmitButton').prop('disabled', true);
            $('#csvForm').submit();
        } else { return false; }
    });
   
});

function getCSV(event) {
  if(event.value.split('.')[1] == 'csv')
  { 
      // $('#csvSubmitButton').prop('disabled', false);
      return true; 
  }
  else {
      alert('only csv file upload');
      event.value = '';
      // $('#csvSubmitButton').prop('disabled', true); false; 
    }
}
