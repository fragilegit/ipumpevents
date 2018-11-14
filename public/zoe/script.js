document.addEventListener("DOMContentLoaded", function(){
	$('.preloader-background').delay(1700).fadeOut('slow');
	
	$('.preloader-wrapper')
		.delay(1700)
		.fadeOut();
});
$(document).ready(function(){
    var effect = 4000;

    $('.header-content').delay(effect).fadeIn(effect);
    // $('h1').delay(effect + effect).fadeIn(effect);
    $('p').delay(effect  + effect).fadeIn(effect);
    $('h3').delay(effect  + effect  + effect).fadeIn(effect);
   
    // $('.lead').fadeIn(effect);

    
// var birthday = new Date("Nov 18, 2018 00:00:00").getTime();
var birthday = new Date("Nov 14, 2018 00:10:00").getTime();
var birthHolder = $('#birthday');

var x = setInterval(function() {

 
  var now = new Date().getTime();

  
  var distance = birthday - now;

  
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    if(parseInt(days) > 0){
        
        birthHolder.html("<span class='text-warning'>"+days + "d</span> " + "<span class=''>" + hours + "h</span> " + 
        "<span class=''>" + minutes + "m</span> <span class='text-danger'>" + seconds + "s</span> ");
    }
    if (parseInt(days) <= 0){
        birthHolder.html("<span class=''>" + hours + "h</span> " + 
        "<span class=''>" + minutes + "m</span> <span class='text-danger'>" + seconds + "s</span> ");
    }
    if (parseInt(days) <= 0 && parseInt(hours) <= 0){
        birthHolder.html("<span class=''>" + minutes + "m</span> <span class='text-danger'>" + seconds + "s</span> ");
    }
    if (parseInt(days) <= 0 && parseInt(hours) <= 0 && parseInt(minutes) <= 0){
        birthHolder.html( "<span class='text-danger'>" + seconds + "s</span> ");
    }
    
  if (distance < 0) {
    clearInterval(x);
    birthHolder.html("EXPIRED");
    $('h3').append('<br><b>#happybirthday</b>');
  }
}, 1000);
});