// JavaScript Document
$(document).ready(function () {
	var article = $('.share .article'); // 모든 li들(질문답변들)
	article.find('span').html('<i class="fas fa-plus"></i>');

	$('.share .article .trigger').click(function(e){  //각각의 질문을 클릭하면
		e.preventDefault();
	var myArticle = $(this).parents('.article');  //클릭한 해당 메뉴에 li(리스트)
	
	if(myArticle.hasClass('hide')){   //클릭한 해당 리스트가 닫혀있나?
	    article.find('.a').slideUp('fast'); // 모든 리스트의 답변을 닫아라
        article.removeClass('show').addClass('hide');  //클래스 hide로 바꾼다
		article.find('span').html('<i class="fas fa-plus"></i>');

	    myArticle.removeClass('hide').addClass('show');  //클래스를 show로 바꾼다
	    myArticle.find('.a').slideDown(300);  //해당 리스트의 답변을 열어라
		myArticle.find('span').html('<i class="fas fa-minus"></i>');
	 } else {  //클링한 해당 리스트가 열려있나?(show)
	   myArticle.removeClass('show').addClass('hide');  //클래스 hide로 바꾼다
	   myArticle.find('.a').slideUp('fast'); //해당 리스트의 답변을 닫아라  
	   myArticle.find('span').html('<i class="fas fa-plus"></i>');
	}  
  });      
  
  //모두여닫기
	$('.all').toggle(function(e){ 
		e.preventDefault();
		article.find('.a').slideDown(300);
		article.removeClass('hide').addClass('show');
		//$(this).text('모두닫기');
		$(this).html('<span class="hidden">모두닫기</span><i class="fas fa-caret-up"></i>');
	},function(e){ 
		e.preventDefault();
		article.find('.a').slideUp(300);
		article.removeClass('show').addClass('hide');
		//$(this).text('모두열기');
		$(this).html('<span class="hidden">모두열기</span><i class="fas fa-caret-down"></i>');
	});

}); 
