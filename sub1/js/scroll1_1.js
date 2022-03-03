$(document).ready(function () {
        
    $('.text').text(scroll);

    $('.navBox li:eq(0)').find('a').addClass('spy');
   
    $('#content_area section:eq(0)').addClass('boxMove');  
    
    var smh= $('.title_area').offset().top+200 ;
    var h1= $('.content_area section:eq(1)').offset().top-450;

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
        
        if(scroll>=0 && scroll<2000){
            $('.navBox li:eq(0)').find('a').addClass('spy');
            
            $('#content section:eq(0)').addClass('boxMove');
 
        }else if(scroll>=2000  ){
            $('.navBox li:eq(1)').find('a').addClass('spy');
            
             $('#content section:eq(1)').addClass('boxMove');
        }    
        
    });


}); 

//애니메이션 효과
$(document).ready(function () {

    var h1= $('#content .content_area section:eq(0)').offset().top;
    var h2= $('#content .content_area .list').offset().top;
    var h3= $('#content .content_area section:eq(1)').offset().top;

    $(window).on('scroll',function(){  //스크롤의 좌표가 변하면.. 스크롤 이벤트
        var scroll = $(window).scrollTop();        //스크롤top의 좌표를 담는다.

        if(scroll>=0 && scroll<h1){          //스크롤의 거리의 범위를 처리
           $('#content .content_area section:eq(0)').addClass('boxMove');  //첫번째 내용 콘텐츠 애니메이션
        }else if(scroll>=h1 && scroll<h2){
            $('#content .content_area .list').addClass('boxMove2');
        }else if(scroll>=h2 && scroll<h3){
            $('#content .content_area section:eq(1)').addClass('boxMove');
        }
        
    });


});