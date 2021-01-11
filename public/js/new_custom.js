/*****************************
| Print Goal Data
|*****************************/
$(document).ready(function() {
    $('#goal_print').click(function() {
        $('.collapse').addClass('show');
        window.print();
    });
});

/*****************************
| Courses's Search
|*****************************/
$(document).ready(function() {

    function fetch_course_data(query = '')
    {
        $base_url = 'http://49.249.236.30:8654/dominic-new';
        
        $.ajax({
            url:$base_url+"/course_search",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {   
                $('#course_dropdown').html(data.table_list);
            }, 
                
        })
    }

    $(document).on('keyup', '#course_search',function(){
        var query = $(this).val(); 

        fetch_course_data(query);
    });


/*****************************
| Complex Report - Players
|*****************************/
$('.coach_player_id').on('change', function() {
  $('#playerID').val(this.value);
});


/*****************************
| Simple Report - Players
|*****************************/
$('#season_ID').on('change', function() {
  $('#season_id').val(this.value);
    
    var season_id = this.value;   
    $base_url = 'http://49.249.236.30:8654/dominic-new';

        $.ajax({
            url:$base_url+"/user/get_course_from_season/"+season_id,
            method:'GET',
            dataType:'json',
            success:function(data)
            {   
                // console.log(data);
                $('#course_ID').html(data.option);
            }, 
                
        })
});
$('#course_ID').on('change', function() {
  $('#course_id').val(this.value);
    
    var course_id = this.value;   
    $base_url = 'http://49.249.236.30:8654/dominic-new';

        $.ajax({
            url:$base_url+"/user/get_player_from_course/"+course_id,
            method:'GET',
            dataType:'json',
            success:function(data)
            {   
                $('#player_ID').html(data.option);
            }, 
                
        })
});

$('#player_ID').on('change', function() {
  $('#player_id').val(this.value);
});




/*****************************
| Copy Address Functionality
|*****************************/
$('.copy_address a').click(function(){

    $base_url = 'http://49.249.236.30:8654/dominic-new';
    
        $.ajax({
            url:$base_url+"/user/copy_address",
            method:'GET',
            dataType:'json',
            success:function(data)
            {   
                $('.paste_address').val(data.address);
                $('.paste_town').val(data.town);
                $('.paste_postcode').val(data.postcode);
                $('.paste_county').val(data.county);
                $('.paste_country').val(data.country);
            }, 
                
        })
    });

/*****************************
| Parent-Coach Linking
|*****************************/
$('#parent-coach').click(function()
{
    var coach_id = $(this).attr("coach"); 
    var parent_id = $(this).attr("parent"); 
    $base_url = 'http://49.249.236.30:8654/dominic-new';

        $.ajax({
            url:$base_url+"/user/parent-coach",
            method:'GET',
            data:{coach_id:coach_id,parent_id:parent_id},
            dataType:'json',
            success:function(data)
            {   
                location.reload(true);
            }, 
                
        })
    });

/*****************************
| Parent request status 
|*****************************/
$('#parent_request a').click(function()
{
    var status = $(this).attr("req");      
    var parent_id = $(this).attr("parent"); 
    var child_id = $(this).attr("child"); 
    $base_url = 'http://49.249.236.30:8654/dominic-new';

    $('.par-req-'+child_id).css('display','none');
    $('.par-req-'+child_id).after('<div style="margin-top:50px;" class="loading"></div>');

        $.ajax({
            url:$base_url+"/user/parent-req-status",
            method:'GET',
            data:{status:status,parent_id:parent_id,child_id:child_id},
            dataType:'json',
            success:function(data)
            {   
                location.reload(true);
            }, 
                
        })
    });

/**********************************
|   Match Report
|**********************************/
$('#child_id').on('change', function() {
  var id = $( "#child_id option:selected" ).val(); 
  $('#match_player_id').val(id);
});

}); 