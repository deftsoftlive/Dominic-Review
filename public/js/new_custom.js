/*****************************
| Courses's Search
|*****************************/
$(document).ready(function() {

    //fetch_course_data();
    
    function fetch_course_data(query = '')
    {
        $base_url = "http://49.249.236.30:8654/dominic-new";

        $.ajax({
            url:$base_url+"/course_search",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {   
                $('#course_list').html(data.table_data);
                $('#course_dropdown').html(data.table_list);
            }, 
            // error: function(jqXHR, textStatus, errorThrown) {
            //     console.log(JSON.stringify(jqXHR));
            //     console.log("AJAX error: " + textStatus + ' : ' + errorThrown); 
            // }
                
        })
    }

    $(document).on('keyup', '#course_search',function(){
        var query = $(this).val(); 

        fetch_course_data(query);
    });


}); 