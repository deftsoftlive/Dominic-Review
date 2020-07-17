/*****************************
| Print Test Scores
|*****************************/
$(document).ready(function() {
    $('#print_test_score').click(function() {
        window.print();
    });

/*****************************
| Course Quick Price Update
|*****************************/
    function fetch_course_price_data(price = '', course_id = '')
    {
        $base_url = "http://49.249.236.30:8654/dominic-new";

        $.ajax({
            url:$base_url+"/admin/update_course_price/"+price+"/"+course_id,
            method:'GET',
            data:{price:price, course_id:course_id},
            dataType:'json',
            success:function(data)
            {   
                
            },      
        })
    }

    $(document).on('keyup', '#update_course_price',function(){
        var price = $(this).val(); 
        var course_id = $(this).attr("data-id");

        fetch_course_price_data(price,course_id);
    });

/*****************************
| Course Sort Number Update
|*****************************/
    function fetch_course_sort_data(sort_no = '', course_id = '')
    {
        $base_url = "http://49.249.236.30:8654/dominic-new";

        $.ajax({
            url:$base_url+"/admin/update_course_sort/"+sort_no+"/"+course_id,
            method:'GET',
            data:{sort_no:sort_no, course_id:course_id},
            dataType:'json',
            success:function(data)
            {   
                
            },      
        })
    }

    $(document).on('keyup', '#update_course_sort',function(){
        var sort_no = $(this).val(); 
        var course_id = $(this).attr("data-id");

        fetch_course_sort_data(sort_no,course_id);
    });

/*****************************
| Season Course Linking
|****************************/
$(document).ready(function(){
    $("select#season_id").change(function(){ 
        var selectedSeason = $(this).children("option:selected").val(); 
       
        $base_url = "http://49.249.236.30:8654/dominic-new";
        $.ajax({
            url:$base_url+"/admin/selectedSeason/",
            method:'GET',
            data:{selectedSeason:selectedSeason},
            dataType:'json',
            success:function(data)
            {   
                $('#course').html(data.option);
            },      
        })

        $('#selected_cat').val(selectedSeason);
    });
  });

    $(document).ready(function(){
      $("select#course").change(function(){
          var selectedSubCat = $(this).children("option:selected").val();    
          $('#selected_sub_cat').val(selectedSubCat);
        });
}); 

/*****************************
| Badge Sort Number Update
|*****************************/
    function fetch_badge_sort_data(sort_no = '', badge_id = '')
    {
        $base_url = "http://49.249.236.30:8654/dominic-new";

        $.ajax({
            url:$base_url+"/admin/update_badge_sort/"+sort_no+"/"+badge_id,
            method:'GET',
            data:{sort_no:sort_no, badge_id:badge_id},
            dataType:'json',
            success:function(data)
            {   
                
            },      
        })
    }

    $(document).on('keyup', '#update_badge_sort',function(){
        var sort_no = $(this).val(); 
        var badge_id = $(this).attr("data-id");

        fetch_badge_sort_data(sort_no,badge_id);
    });


/*****************************
| Product Sort Number Update
|*****************************/
    function fetch_product_sort_data(sort_no = '', product_id = '')
    {
        $base_url = "http://49.249.236.30:8654/dominic-new";

        $.ajax({
            url:$base_url+"/admins/shop/products/update_product_sort/"+sort_no+"/"+product_id,
            method:'GET',
            data:{sort_no:sort_no, product_id:product_id},
            dataType:'json',
            success:function(data)
            {   
                
            },      
        })
    }

    $(document).on('keyup', '#update_product_sort',function(){
        var sort_no = $(this).val(); 
        var product_id = $(this).attr("data-id");

        fetch_product_sort_data(sort_no,product_id);
    });


/*****************************
| Accordian Sort Number Update
|*****************************/
    function fetch_acc_sort_data(sort_no = '', accordian_id = '')
    {
        $base_url = "http://49.249.236.30:8654/dominic-new";

        $.ajax({
            url:$base_url+"/admin/update_acc_sort/"+sort_no+"/"+accordian_id,
            method:'GET',
            data:{sort_no:sort_no, accordian_id:accordian_id},
            dataType:'json',
            success:function(data)
            {   
                
            },      
        })
    }

    $(document).on('keyup', '#update_acc_sort',function(){
        var sort_no = $(this).val(); 
        var accordian_id = $(this).attr("data-id");

        fetch_acc_sort_data(sort_no,accordian_id);
    });

/*****************************
| Custombox Sort Number Update
|*****************************/
    function fetch_custombox_sort_data(sort_no = '', custombox_id = '')
    {
        $base_url = "http://49.249.236.30:8654/dominic-new";

        $.ajax({
            url:$base_url+"/admin/update_custombox_sort/"+sort_no+"/"+custombox_id,
            method:'GET',
            data:{sort_no:sort_no, custombox_id:custombox_id},
            dataType:'json',
            success:function(data)
            {   
                
            },      
        })
    }

    $(document).on('keyup', '#update_custombox_sort',function(){
        var sort_no = $(this).val(); 
        var custombox_id = $(this).attr("data-id");

        fetch_custombox_sort_data(sort_no,custombox_id);
    });


/******************************************
| Voucher functionality in product section
|******************************************/ 
    $("select.vou_prod_type").change(function(){
        var selected = $(this).children("option:selected").val();

        if(selected == 'voucher'){ 
            $('#voucher_list').css('display','block');
        }else if(selected == 'normal'){
            $('#voucher_list').css('display','none');
        }
    });


/*****************************
| Remove PDF
|*****************************/ 
    function remove_pdf_data(acc_id = '')
    {
        $base_url = "http://49.249.236.30:8654/dominic-new";

        $.ajax({
            url:$base_url+"/admin/remove_pdf_data/"+acc_id,
            method:'GET',
            data:{acc_id:acc_id},
            dataType:'json',
            success:function(data)
            {   
                location.reload(true);
            },      
        })
    }

    $(document).on('click', '#remove_pdf',function(){
        var acc_id = $(this).attr("data-id"); 

        remove_pdf_data(acc_id);
    });
  

    /*validations on User Management Section*/
     $('#userEditForm').validate({

      rules: {

      first_name: {
          required: true,
          maxlength:25,
          lettersonly:true,
      },
      last_name: {
          required: true,
          maxlength:25,
          lettersonly:true,
      },
      },

    highlight: function (element, errorClass, validClass) {

      if(element.type =='text'||element.type =='password'||element.type =='email'||element.type =='select-one'||element.type == 'tel') {
          // $(element).siblings("label").addClass("error");
          $(element).addClass('input--error').removeClass(validClass+' input--success');
          $(element).closest('.myForm').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        // this.findByName(element.name).removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $(element).closest('.myForm').find('i.fa').remove();
        $(element).closest('.myForm').append('<i class="fa fa-exclamation fa-lg form-control-feedback"></i>');
      }else if(element.type == 'checkbox'){
          $("input#checkbox1").after('<span class="checkmark"></span>');
      }
    },
    unhighlight: function (element, errorClass, validClass) {
      if (element.type === "text"||element.type =='password' ||element.type =='email'||element.type =='select-one'||element.type == 'tel') {
          // $(element).siblings("label").removeClass("error");
          $('.errorMsg').addClass('displaynone');
          $(element).closest('.myForm').removeClass('has-error has-feedback').addClass('has-success has-feedback');
          $(element).removeClass('input--error').addClass(validClass+' input--success');
          $(element).closest('.myForm').find('i.fa').remove();
          $(element).closest('.myForm').append('<i class="fa fa-check fa-lg form-control-feedback"></i>');
      } 
    },


  });


}); 

