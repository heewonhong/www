//애니메이션 효과
$(document).ready(function () {

    var h1= $('#content .open li .tit').offset().top;
    var h2= $('#content .txt').offset().top;

    $(window).on('scroll',function(){  //스크롤의 좌표가 변하면.. 스크롤 이벤트
        var scroll = $(window).scrollTop();        //스크롤top의 좌표를 담는다.

        if(scroll>=300 && scroll<h1){          //스크롤의 거리의 범위를 처리
           $('#content .open li .tit').addClass('boxMove');  //첫번째 내용 콘텐츠 애니메이션
        }else if(scroll>=2100 && scroll<h2){          //스크롤의 거리의 범위를 처리
            $('#content .txt').addClass('boxMove2');  //첫번째 내용 콘텐츠 애니메이션
         }
    });


});