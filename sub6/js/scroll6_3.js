$(document).ready(function () {
        
    $('.text').text(scroll);

    $('.navBox li:eq(0)').find('a').addClass('spy');
   
    $('#content_area section:eq(0)').addClass('boxMove');  
    
    var smh= $('.title_area').offset().top+250 ;
    var h1= $('.content_area section:eq(1)').offset();

    $(window).on('scroll',function(){
        var scroll = $(window).scrollTop();
       
        
        if(scroll>smh){ 
            $('.navBox').addClass('navOn');           
            $('header').hide();
        }else{
            $('.navBox').removeClass('navOn');
            $('header').show();
        }
           
        
        $('.navBox li').find('a').removeClass('spy');
        
        if(scroll>=0 && scroll<4000){
            $('.navBox li:eq(0)').find('a').addClass('spy');
            
            $('#content section:eq(0)').addClass('boxMove');
 
        }else if(scroll>=4000  ){
            $('.navBox li:eq(1)').find('a').addClass('spy');
            
             $('#content section:eq(1)').addClass('boxMove');
        }    
        
    });


}); 

