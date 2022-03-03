$(function() {                                   

  
    var fragment = $('#content #tab_menu li a.current').attr('href');
       
    fragment = fragment.replace('#', ' #');            
    $('#details').load(fragment); //$('선택자').load('파일명.html');  $('선택자').load('파일명.html #아이디');  
   
     $('#content #tab_menu li a').on('click', function(e) { 
       e.preventDefault();                                     
       //fragment = this.href;   //자바스크립트 원문
       fragment = $(this).attr('href');                               
   
       fragment = fragment.replace('#', ' #');  
       $('#details').load(fragment);                          
   
       $('#tab_menu a.current').removeClass('current');       
       $(this).addClass('current');
     });
   
   });