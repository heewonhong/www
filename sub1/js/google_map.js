// JavaScript Document

 function initialize() {
  var myLatlng = new google.maps.LatLng(37.713347, 127.200024);
  var myOptions = {
   zoom: 15,
   center: myLatlng

  }
  var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
 
  var marker = new google.maps.Marker({
   position: myLatlng, 
   map: map, 
   title:"삼성중공업"
  });   
  
 
  var infowindow = new google.maps.InfoWindow({
   content: "우리집주소"
  });
 
  infowindow.open(map,marker);
 }
 
 
 window.onload=function(){
  initialize();
 }

