//애니메이션 효과
$(document).ready(function () {

    var h1= $('#content .content_area .con01').offset().top -200;
    var h2= $('#content .content_area .con02').offset().top -200;
    var h3= $('#content .content_area .con03').offset().top -200;

    $(window).on('scroll',function(){  //스크롤의 좌표가 변하면.. 스크롤 이벤트
        var scroll = $(window).scrollTop();        //스크롤top의 좌표를 담는다.

        if(scroll>=0 && scroll<h1){          //스크롤의 거리의 범위를 처리
           $('#content .content_area .con01').addClass('boxMove');
        }else if(scroll>=h1 && scroll<h2){
            $('#content .content_area .con02').addClass('boxMove2');
        }else if(scroll>=h2 && scroll<h3){
            $('#content .content_area .con03').addClass('boxMove');
        }
        
    });


});