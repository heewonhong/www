//네비게이션, top
$(document).ready(function() {
  
    //2depth 열기/닫기
    $('ul.dropdownmenu').hover(
       function() { 
          $('ul.dropdownmenu li.menu ul').fadeIn('normal',function(){$(this).stop();}); //모든 서브를 다 열어라
          $('#headerArea').animate({height:350},'fast').clearQueue();
       },function() {
          $('ul.dropdownmenu li.menu ul').hide(); //모든 서브를 다 닫아라
          $('#headerArea').animate({height:131},'fast').clearQueue();
     });
     
     //1depth 효과
     $('ul.dropdownmenu li.menu').hover(
       function() { 
           $('.depth1',this).css('color','#0c4da2');
       },function() {
          $('.depth1',this).css('color','#333');
     });

     //tab 처리
     $('ul.dropdownmenu li.menu .depth1').on('focus', function () {        
        $('ul.dropdownmenu li.menu ul').fadeIn('normal');
        $('#headerArea').animate({height:350},'fast').clearQueue();
     });

    $('ul.dropdownmenu li.m6 li:last').find('a').on('blur', function () {        
        $('ul.dropdownmenu li.menu ul').hide();
        $('#headerArea').animate({height:131},'fast').clearQueue();
    });


    //상단으로 이동
    $('.topMove').hide();
           
    $(window).on('scroll',function(){ //스크롤 값의 변화가 생기면
         var scroll = $(window).scrollTop(); //스크롤의 거리
        
        
         //$('.text').text(scroll);

         if(scroll>500){ //500이상의 거리가 발생되면
             $('.topMove').fadeIn('slow');  //top보여라~~~~
         }else{
             $('.topMove').fadeOut('fast');//top안보여라~~~~
         }
    });
  
     $('.topMove').click(function(e){
        e.preventDefault();
         //상단으로 스르륵 이동합니다.
        $("html,body").stop().animate({"scrollTop":0},1000); 
     });


    // 패밀리사이트 이동
    $('.family .arrow').toggle(function(e){
        e.preventDefault();
		$('.family .list').show();
        $('.family .arrow i').removeClass().addClass('fas fa-chevron-down');
	},function(e){
        e.preventDefault();
		$('.family .list').hide();
        $('.family .arrow i').removeClass().addClass('fas fa-chevron-up');
	});

	//tab키 처리
    $('.family .arrow').on('focus', function () {        
        $('.family .list').show();	
        $('.family .list i').removeClass().addClass('fas fa-chevron-down');
        });
        $('.family .list li:last').find('a').on('blur', function () {        
        $('.family .list').hide();
        $('.family .arrow i').removeClass().addClass('fas fa-chevron-up');
    });  


});


//네비메뉴
$(document).ready(function() {
    var op = false;  //네비가 열려있으면(true) , 닫혀있으면(false)
      
    $(".menu_open").click(function(e) { //메뉴버튼 클릭시
       e.preventDefault();   
 
        var documentHeight =  $(document).height();
        $("#gnb").css('height',documentHeight); //전체 body의 높이를 네비의 높이로 반환한다
 
       if(op==false){ //네비가 닫혀있는 상태에서 클릭했나요
         $("#gnb").animate({right:0,opacity:1}, 'fast');
         $('#headerArea').addClass('mn_open');
         op=true;
       }else{ //네비가 열려있는 상태에서 클릭했나요
         $("#gnb").animate({right:'-100%',opacity:0}, 'fast');
         $('#headerArea').removeClass('mn_open');
         op=false;
       }
 
    });
    
    
     //2depth 메뉴 교대로 열기 처리 
     var onoff=[false,false,false,false]; //각각의 메뉴가 닫혀있으면(false) / 열려있으면(true)
     var arrcount=onoff.length; 
     
     //console.log(arrcount);
     
     $('#gnb .depth1 h3 a').click(function(){ //1depth 메뉴를 각각 클릭하면
         var ind=$(this).parents('.depth1').index(); 
         
         //console.log(ind);
         
        if(onoff[ind]==false){
         //$('#gnb .depth1 ul').hide();
         $(this).parents('.depth1').find('ul').slideDown('slow'); //클릭한 해당 메뉴의 2depth를 열어라
         $(this).parents('.depth1').siblings('li').find('ul').slideUp('fast'); //나머지 메뉴의 서브를 닫아라
          for(var i=0; i<arrcount; i++) {
            onoff[i]=false; //모든 메뉴의 상태를 false로 바꿔라
         }  
          onoff[ind]=true; //자신의 상태만 true
            
          $('.depth1 span').html('<i class="fas fa-chevron-down"></i>');
          $(this).find('span').html('<i class="fas fa-chevron-up"></i>');   
             
        }else{ // 클릭한 해당메뉴가 열려있나?
          $(this).parents('.depth1').find('ul').slideUp('fast'); // 자신의 서브메뉴만 닫아라
          onoff[ind]=false;   
            
          $(this).find('span').html('<i class="fas fa-chevron-down"></i>');     
        }
     });    
   
   });
 