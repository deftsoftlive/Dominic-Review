$(document).ready(function() {
   // couponForm
  $('#couponForm').validate({
    onfocusout: function (valueToBeTested) {
      $(valueToBeTested).valid();
    },
  
    highlight: function(element) {
      $('element').removeClass("error");
    },
  
    rules: {
      "coupon_code": {
          required: true,
      },
      valueToBeTested: {
          required: true,
      }
    },
    });   
  
    // couponForm Submitting 
    $('#couponFormBtn').click(function() {
      if($('#couponForm').valid()) {
        $('#couponFormBtn').prop('disabled', true);
        checkCoupon();
      } else {
        return false;
      }
    });
    
});

function checkCoupon() {
	var $this = jQuery('#couponForm');
        var url = $this.attr('action');
		    $.ajax({
			    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			    url: url,
			    type: "POST",
			    dataType: "JSON",
			    data: $this.serialize(),
			    beforeSend: function() {
		 			jQuery("body").find('.custom-loading').show();
			   	},   
			    success: function(res) {
			        $('#suc_show').show();
			        $('#res_mess').html(res.message);
              $('#pay_amount').val(res.amount);

			        setTimeout(function() {
			            $('#suc_show').fadeOut('smooth');
			        }, 3000);
			        
			    	// $('#couponFormBtn').prop('disabled', false);
			        $('#couponForm').hide();
			        $('#payment-table tbody').replaceWith(res.data);  
			    }, 
			    error: function(err) {
			     
			      	$('#err_show').show();
		            $('#err_mess').html(JSON.parse(err.responseText).message);

		            setTimeout(function() {
		              $('#err_show').fadeOut('smooth');
		            }, 3000);
			    },
			    complete: function() {
             $('#couponFormBtn').prop('disabled', false);
					jQuery("body").find('.custom-loading').hide();
			   }
			});
}

function removeCoupon() {
var url = $('#removeCouponUrl').val();
var packageId = $('#packageId').val();
$.ajax({
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    url: url,
    type: "POST",
    dataType: "JSON",
    data: { _token: $('meta[name="csrf-token"]').attr('content'), packageId },
    beforeSend: function() {
			jQuery("body").find('.custom-loading').show();
   	},   
    success: function(res) {
        $('#suc_show').show();
        $('#res_mess').html(res.message);
        $('#pay_amount').val(res.amount);
        $('#coupon_code').val('');

        setTimeout(function() {
            $('#suc_show').fadeOut('smooth');
        }, 3000);
        
    	// $('#couponFormBtn').prop('disabled', false);
        $('#couponForm').show();
        $('#payment-table tbody').replaceWith(res.data);  
    }, 
    error: function(err) {
      	$('#err_show').show();
        $('#err_mess').html(JSON.parse(err.responseText).message);

        setTimeout(function() {
          $('#err_show').fadeOut('smooth');
        }, 3000);
    },
    complete: function() {
		jQuery("body").find('.custom-loading').hide();
   }
});
}
