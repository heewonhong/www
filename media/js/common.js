$(document).ready(function(){

   //테블릿이하 네비 열기
   var documentHeight =  $(document).height();

   $(".menuOpen").toggle(function () {
       $('#headerArea').addClass('top0');
       $(".mainMenu").slideDown('slow');
       $('.menu_ham').addClass('open');
   }, function () {
       $('#headerArea').removeClass('top0');
       $(".mainMenu").slideUp('fast');
       $('.menu_ham').removeClass('open');
   });

   var current = 0;  //  0(모바일)   1(모바일 이상의 해상도)

   $(window).resize(function () {  //웹브라우저 크기 조절시 반응하는 이벤트 메소드()
       var screenSize = $(window).width(); 

       if (screenSize > 1024) {
       $(".mainMenu").show();
       $('#headerArea').removeClass('top0');
       $('.menu_ham').removeClass('open');
       current = 1; 
   }
       if (current == 1 && screenSize <= 1024) { 
       $('#headerArea').removeClass('top0');
       $(".mainMenu").hide();
       current = 0;
       }

});


    
    // wide pc gnb scroll event
    $(window).on('scroll',function(){
        var scroll = $(window).scrollTop();
        var winSize= $(window).width(); 
        
        //$('.text').text(scroll);          
    if(winSize>768){    
        if(scroll>600){ 
            $('#headerArea').css('opacity','1');
            
        }else{
            $('#headerArea').css('opacity','0');
        }
    } 
    });
    

    //top
    $('.topMove').click(function(){
        $("html,body").stop().animate({"scrollTop":0},1000); 
    });



    //gallery scroll
    var screenHeight = $(window).height();
    var screenSize = $(window).width();

    $(window).on('scroll',function(){
       var scroll = $(window).scrollTop();
        //스크롤이 움직이면 해당 scrolltop의 값이 저장된다
        
//       $('.text').text(scroll);

        if(scroll>3900){
            $('.imgscroll').css('bottom',600);
        }
        else{
            $('.imgscroll').css('bottom',-1000);
        }
    });


});