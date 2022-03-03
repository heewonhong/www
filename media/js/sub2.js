$(document).ready(function(){

    //sub2 back
    var screenSize = $(window).width();
    var screenHeight = $(window).height();

    $("#content").css('margin-top',screenHeight);

    if( screenSize > 768){
        $('.videoBox img').attr('src','images/sub2_bg.jpg');
    }
    if(screenSize <= 768){
        $('.videoBox img').attr('src','images/sub2_bg2.jpg');
    }
    
    $(window).resize(function(){   
    screenSize = $(window).width(); 
    screenHeight = $(window).height();
        
    $("#content").css('margin-top',screenHeight);
        
    if( screenSize > 768){
        $('.videoBox img').attr('src','images/sub2_bg.jpg');
    }
    if(screenSize <= 768){
        $('.videoBox img').attr('src','images/sub2_bg2.jpg');
    }
    }); 

    $('.down').click(function(){
		screenHeight = $(window).height();
		$('html,body').animate({'scrollTop':screenHeight}, 1000);
	});
});