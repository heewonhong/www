$(document).ready(function () {
   
    
    $('.product_list a').each(function (index) {  
        $(this).click(function(e){    
            e.preventDefault();  

            var height_info=$(window).scrollTop()+(60); 

            $('.wrap #back').show()
            $('.product_info .info').hide(); 
            $('.product_info .info_'+ (index+1)).fadeIn('fast').css('top',height_info);
       });
        
    $('.wrap #back, .btnClose').click(function(e){ 
        e.preventDefault();  

        $('.wrap #back').hide()  
        $('.product_info .info').hide(); 
    });
        
    });
    
});