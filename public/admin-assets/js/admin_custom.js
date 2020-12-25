$base_url = 'http://49.249.236.30:8654/dominic-new';

/*****************************
| Print Test Scores
|*****************************/
$(document).ready(function() {
    $('#print_course').click(function() {
        window.print();
    });

/*****************************
| Print Test Scores
|*****************************/
    $('#print_test_score').click(function() {
        window.print();
    });

/*****************************
| Course Quick Price Update
|*****************************/
    function fetch_course_price_data(price = '', course_id = '')
    {
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
| Actvity Sort Number Update
|*****************************/
    function fetch_activity_sort_data(sort_no = '', activity_id = '')
    {

        $.ajax({
            url:$base_url+"/admin/update_drhactivity_sort/"+sort_no+"/"+activity_id,
            method:'GET',
            data:{sort_no:sort_no, activity_id:activity_id},
            dataType:'json',
            success:function(data)
            {   
                
            },      
        })
    }

    $(document).on('keyup', '#update_drhactivity_sort',function(){
        var sort_no = $(this).val(); 
        var activity_id = $(this).attr("data-id");

        fetch_activity_sort_data(sort_no,activity_id);
    });


/*********************************
| Home Slider Sort Number Update
|*********************************/
    function fetch_homeslider_sort_data(sort_no = '', homeslider_id = '')
    {

        $.ajax({
            url:$base_url+"/admin/update_homeslider_sort/"+sort_no+"/"+homeslider_id,
            method:'GET',
            data:{sort_no:sort_no, homeslider_id:homeslider_id},
            dataType:'json',
            success:function(data)
            {   
                
            },      
        })
    }

    $(document).on('keyup', '#update_homeslider_sort',function(){
        var sort_no = $(this).val(); 
        var homeslider_id = $(this).attr("data-id");

        fetch_homeslider_sort_data(sort_no,homeslider_id);
    });


/*****************************
| Menu Sort Number Update
|*****************************/
    function fetch_menu_sort_data(sort_no = '', menu_id = '')
    {

        $.ajax({
            url:$base_url+"/admin/update_menu_sort/"+sort_no+"/"+menu_id,
            method:'GET',
            data:{sort_no:sort_no, menu_id:menu_id},
            dataType:'json',
            success:function(data)
            {   
                
            },      
        })
    }

    $(document).on('keyup', '#update_menu_sort',function(){
        var sort_no = $(this).val(); 
        var menu_id = $(this).attr("data-id");

        fetch_menu_sort_data(sort_no,menu_id);
    });

/*****************************
| Season Course Linking
|****************************/
$(document).ready(function(){
    $("select#season_id").change(function(){ 
        var selectedSeason = $(this).children("option:selected").val(); 

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
| Parent player Linking
|****************************/
$(document).ready(function(){
    $("select#parent_id").change(function(){ 
        var parent = $(this).children("option:selected").val(); 

        $.ajax({
            url:$base_url+"/admin/parent-player-linking/",
            method:'GET',
            data:{parent:parent},
            dataType:'json',
            success:function(data)
            {   
                $('#player_id').html(data.option);
            },      
        })

        
    });
  });

    $(document).ready(function(){
      $("select#parent_id").change(function(){
          var parent = $(this).children("option:selected").val();    
          // $('#parent').val(parent);
        });
});


/*****************************
| Package Courses
|****************************/
$(document).ready(function(){

        $("select#player_id").change(function(){ 
            var player = $(this).children("option:selected").val(); 
            $("#player").val(player);
            var account = $("#account_id").val();

            $("#select_account").val("");

            AjaxPackageCourse();
        });

        $("select#parent_id").change(function(){ 
            var parent = $(this).children("option:selected").val(); 
            $("#parent").val(parent);
            var account = $("#account_id").val(); 

            $("#select_account").val("");  

             AjaxPackageCourse();  
        });

        $("select#select_account").change(function(){ 
            var account_id = $(this).children("option:selected").val(); 
            var account = $("#account_id").val(account_id);

             AjaxPackageCourse();
        });

});

    function AjaxPackageCourse()
    {
            var account = $("#account_id").val();
            var parent = $("#parent").val();
            var player = $("#player").val();

            $.ajax({
                url:$base_url+"/admin/get-courses",
                method:'GET',
                data:{account:account,parent:parent,player:player},
                dataType:'json',
                success:function(data)
                {   
                    $('.append_courses').html(data.option);
                },      
            })
    }

    function AddMoreAjaxPackageCourse(parent,player,account)
    {
        $.ajax({
            url:$base_url+"/admin/get-courses",
            method:'GET',
            data:{account:account,parent:parent,player:player},
            dataType:'json',
            success:function(data)
            {   
                console.log(data);
                $('.append_courses').html(data.option);
            },      
        })
    }


    $(document).ready(function(){
      $("select#parent_id").change(function(){
          var parent = $(this).children("option:selected").val();    
          // $('#parent').val(parent);
        });
});


/*****************************
| Badge Sort Number Update
|*****************************/
    function fetch_badge_sort_data(sort_no = '', badge_id = '')
    {

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
          // lettersonly:true,
      },
      last_name: {
          required: true,
          maxlength:25,
          // lettersonly:true,
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

