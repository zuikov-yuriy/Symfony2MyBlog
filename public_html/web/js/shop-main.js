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
    
//    
//     $("div.tree").each(function() {
//
//
//     });

       
// $("div.tree ul ul").hide();
//      $('div.tree li').live('click',function() {  
//           next = $(this).next();
//           if ( $(next).prop("tagName").toLowerCase() != "li") { 
//                $(next).slideToggle(300, function () { 
//                    $(this).find('ul').each(function() {
//                        $(this).hide();
//                    });
//                });   
//           } 
//       });



      $("div.tree ul ul").hide();
    
      $('div.tree li').live('click',function() {
            if ($(this).next().css('display') == 'none') {
                    $(this).next().slideDown(200, function () {});
                }else {

                   if ($(this).next().prop("tagName").toLowerCase() != "li" ){
                     $(this).next().slideUp(200, function () {
                         $(this).find('ul').each(function() {$(this).hide();});
                     });
                   }
               
                 }
       });
       
$('.table #even:odd').addClass('grey');

});