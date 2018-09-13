document.addEventListener("DOMContentLoaded", function(){
	$('.preloader-background').delay(1700).fadeOut('slow');
	
	$('.preloader-wrapper')
		.delay(1700)
		.fadeOut();
});
$(document).ready(function(){
    var effect = 4000;

    $('.header-content').delay(effect).fadeIn(effect);
    $('h1').delay(effect + effect).fadeIn(effect);
    $('p').delay(effect  + effect).fadeIn(effect);
    $('h3').delay(effect  + effect  + effect).fadeIn(effect);
   
    // $('.lead').fadeIn(effect);
});