//애니메이션 효과
$(document).ready(function () {

    var h1= $('#content .ethics ul li:eq(0)').offset().top;
    var h2= $('#content .ethics ul li:eq(1)').offset().top;
    var h3= $('#content .ethics ul li:eq(2)').offset().top;
    var h4= $('#content .ethics ul li:eq(3)').offset().top;

    $(window).on('scroll',function(){  //스크롤의 좌표가 변하면.. 스크롤 이벤트
        var scroll = $(window).scrollTop();        //스크롤top의 좌표를 담는다.

        if(scroll>=0 && scroll<h1){          //스크롤의 거리의 범위를 처리
           $('#content .ethics ul li:eq(0)').addClass('boxMove'); 
        }else if(scroll>=h1 && scroll<h2){         
            $('#content .ethics ul li:eq(1)').addClass('boxMove2');  
         }else if(scroll>=h2 && scroll<h3){          
            $('#content .ethics ul li:eq(2)').addClass('boxMove'); 
         }else if(scroll>=h3 && scroll<h4){       
            $('#content .ethics ul li:eq(3)').addClass('boxMove2');  
         }
         
    });


});