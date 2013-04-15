$(document).ready(function() {
     
    function aj(u) {   
        $.ajax({
            type: "POST",
            url: u,
            data: '',
            success: function(data) {
                $(".test").html(data);
            }
        });
    } 


    $('.reg').live('click',function() {
        aj('/ajax/reg/');	
    });

    $('.login').live('click',function() {
        aj('/ajax/login/');	
    });
    
});