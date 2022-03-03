$(document).ready(function () {

     var h1= $('#content #management').offset().top;
     var h2= $('#content .best_product_inner').offset().top;
     var h3= $('#content .community').offset().top;
     var h4= $('#content .recruit').offset().top
     var h5= $('#content .investment').offset().top


    $(window).on('scroll',function(){
        var scroll = $(window).scrollTop();

        $('.text').text(scroll);
        //스크롤 좌표의 값을 찍는다.

        if(scroll>=300 && scroll<h1){
            $('#content #management').addClass('boxMove');
        }else if(scroll>=1100 && scroll<h2){
             $('#content .best_product_inner').addClass('boxMove2');
        }else if(scroll>=2100 && scroll<h3){
             $('#content .community .service .text_ani1').addClass('boxMove');
             $('#content .community .news .text_ani2').addClass('boxMove');
        }else if(scroll>=2900 && scroll<h4){
             $('#content .recruit').addClass('boxMove2');
        }else if(scroll>=3700 && scroll<h5){
             $('#content .investment').addClass('boxMove');
        }
    });
});
  