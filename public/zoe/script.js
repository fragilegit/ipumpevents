document.addEventListener("DOMContentLoaded", function(){
	$('.preloader-background').delay(1700).fadeOut('slow');
	
	$('.preloader-wrapper')
		.delay(1700)
		.fadeOut();
});
$(document).ready(function(){
    
    var effect = 4000;
    hidePlay();
    $('.header-content').delay(effect).fadeIn(effect);
    // $('h1').delay(effect + effect).fadeIn(effect);
    $('p').delay(effect  + effect).fadeIn(effect);
    $('h3').delay(effect  + effect  + effect).fadeIn(effect);
   


    
var birthday = new Date("Nov 18, 2018 00:00:00").getTime();
// var birthday = new Date("Nov 17, 2018 16:10:14").getTime();
var audio = document.getElementById('audio-control');
var play = document.getElementById('icon-play');
var birthHolder = $('#birthday');
// var distance = 0;

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
        birthHolder.html( "<span class='text-warning'>" + seconds + "s</span> ");
    }
    if(parseInt(days) <= 0 && parseInt(hours) <= 0 && parseInt(minutes) <= 0 && seconds <= 3){
      
    }

    if (distance < 0) {
      birthHolder.html('');
      showFireWorks()
      clearInterval(x);
      birthHolder.removeClass('display-3');
      birthHolder.addClass('animated slideInUp delay-2s display-2');

      setTimeout(function(){
        birthHolder.html("Happy 25th Birthday  <span id='name'>Zoë!!</span>");
        $('h3').append('<b class="bday-hash">#Happy25thBirthdayZoë</b>')
      }, 2000)
      
      setTimeout(function(){

        birthHolder.fadeOut(2000);

        setTimeout(function(){
          $('#icon-play').fadeIn(3000).css({
            display: 'block'
          })
        }, 6000)
        
          // action 
          play.onclick = function(){
            enableAutoplay();
            hidePlay();
            hideHash()
            delay = 30000
            // action
            image = "url('https://lh3.googleusercontent.com/Fztb1I4x4R52-Yyv76QiU0ra36IiotP0U5iU2DXXfq-ml8UnKIP-pm_pYjasiYShXDxUoe4hc057hW2jRbCbUoz7LBD1oggP3UMU3yxCc02YL9R29wCh7mn1MQrXoKhDPGfeMBmdEqMTkOVuYa-EXmTetpFj-VHeASosQaWaBF1OBLzJH3E72_gCzH86JnILKzuKt7LhH5kczdS1eDAKns87C5Z6JIrDW2CHYUTUiB0Zk-uCHXrChyiw4_m-RUgV-sj44fqxv5PEN3P0EFZbhsCuqt_qYHlxMR4QNsUfIZLqeG7AYAJ7hmUGVpEjj1eUMp2ZyxOrejhtxuKFq6Ia484vSjOb86OfzxRPiMirJrqO8pUxk8EExB1yziSiM9D9GBF0_Gfyd9hIPdCcGRXR74amFOlpMncStKALriFkqMEDeAhWcWiwqHYnjy9HFFy7EN_VjnTESMaOq62rXlEdMq3g_tExTphv_Twjrb8FNbJ38dyeQxVKzPfcu4StRdMB7zglTY2jZu4YFnXBqciukHtWMdOUKpG2YuEfPdILK92p_evmArjD11_h-Kut5COQhadSUViDOmhvKrjakrcIw5908hCU_MLGc7a947RRQmzFeRon_i_vu-6zru2Qzc6mM03y-02YDuJjl9zOMMfSjMivNTPI-oF32qp6O1OxbTpiah0xgQXNvRDNJCR8YVDWGX-JXH4bSsDTTqynuw=w305-h626-no') no-repeat center center fixed"
            // birthHolder.html("")
            dance = "<br><img class='img' src='https://s3.us-east-2.amazonaws.com/ipumpevents/music/dancing.gif'>"
           
            
            changeBackground(image, "", dance)
            setTimeout(function(){
              message = 'Your love is true, your heart is pure <br> Always ready but never sure'
              changeBackground(image, message, dance)
              completed = true

              delay = 15000
              setTimeout(function(){
                message = 'Quarter century; may the lord protect your <i class="fa fa-heart fa-2x animated infinite pulse" aria-hidden="true"></i> and guide your soul'
                changeBackground(image, message, dance)
              }, delay);
              
              clearOverlay(7000)
              // action
              image = "url('https://lh3.googleusercontent.com/tZfvzK_LHPUuWpyPcXgpBZEBvVMHekpNQvMe4fDT_SCnLDxM6tBU0312LPuP15M1JzHSfEJUfciUKVmBOLqFNoCIPz8c8HcE_BFJMVTJwgfL2BE02KLdcjN4XiSauIqHQbyoe1_lmtlKkKCYnKtpvTdUv7Txq026aZqBSzSq36Vkql9KE5whbuWLAbffbmHJIStjSdoknNDc3qMfCFTrsJdiDOS5AghvvkbxM5FLbn6mZH2lMmrknXwJ4FheTbGqBk_HjG4URJvjsOu9RM5wnPqhXYBoJkTpiGWPXsEXsbg0MTteGHovpVOC_p79DLQqMmH0iKMakcmJ7hAe1rO91ZWRcMxlnbhZvt8Vn10UBJpWKijCnYNcMJW3OT37zE8DdLn1FvDx4ELdnFOyeMFGsqxE0nsF4lW9M1rE77Pj3xskg2MZcYwTwe7Q9KNpHEBuw1ssGCh5fyldLUwrgDur1Zhxm21-lNbCG3n8KH89v7yE_xa5Lx5W4m-4eIXLkWss04Hx_9a2bymIpEY3c7cC6CN77x1bLbsdZjXpcgZaobrEwQYNeZOi1Q8SpmrDG10xQN5DN-9gXAID411YDvw6vTKZljIqMdJIynlADXaTBDmOxB_axrZmBgaBcK4wU5LdG3suQiF9dcMy2BywmFQj97i6O77Py0I0QqX9I1W_uLq3nciRM1jG-brMDukYKXYTcbywdsFtBO0gX4vt3A=w305-h626-no') no-repeat center center fixed"
              setTimeout(function(){
                message = "Not until we are lost do we begin to understand ourselves... You're surrounded by loved ones. Dont let the world steal your joy, peace & <i class='fa fa-heart fa-2x animated infinite pulse' aria-hidden='true'></i> love <i class='fa fa-heart fa-2x animated infinite pulse' aria-hidden='true'></i>"
                changeBackground(image, message, dance);
              }, delay + delay)

              clearOverlay(35000)
              // action
              setTimeout(function(){
                sally = "<img class='img' src='https://s3.us-east-2.amazonaws.com/ipumpevents/music/sally.gif'>"
                message = "Have a good time like this dude Charlie, not dancing in time  and turning up but hey! Those moves tho<br>"
                changeBackground(image, message, dance, sally);
              }, delay + delay + delay)

              setTimeout(function(){
                sally = "<img class='img' src='https://s3.us-east-2.amazonaws.com/ipumpevents/music/sally.gif'>"
                message = " Enjoy the music! fin <br>"
                changeBackground(image, message, dance, sally);
              }, delay + delay + delay + delay)

              setTimeout(function(){
                sally = "<img class='img' src='https://s3.us-east-2.amazonaws.com/ipumpevents/music/sally.gif'>"
                message = ""
                changeBackground(image, message, dance, sally);
              }, 70000)

              setTimeout(function(){
                $('.header-overlay').fadeOut(2000).css({
                  background: 'transparent',
                  transition: "background 2s"
                  // #ff43
                });
              }, 75000);

            }, delay);
            
              
            
            
            
           
          }
      }, 10000)
    }
  

}, 1000);

function enableAutoplay(){
  audio.autoplay= true;
  audio.load();
  audio.loop = true;
}

function hidePlay(){
  $(play).fadeOut(2000,function(){
      // enableType();
  });
  // $(play).slideUp(2000);
}

function changeBackground(image, message, dance, sally){
  
  $('.fullscreen-image-wrap').fadeIn(3000).css({
    background: image,
    backgroundSize: "cover",
    transition: "background 2s"
  })
  $('.header-overlay').fadeIn(3000).css({
    background: '#22533B',
    transition: "background 2s"
  })

  birthHolder.fadeIn(2000, function(){
    if($(this).hasClass('display-2')){
      $(this).removeClass('display-2')
    }
    $(this).html(message)
    $(this).append(dance)
    $(this).append(sally)
  })
}

function hideHash(){
  $('.hide-hash').hide();
}

function clearOverlay(delay){
  setTimeout(function(){
    $('.header-overlay').fadeOut(2000).css({
      background: 'transparent',
      transition: "background 2s"
      // #ff43
    });
    removeGif()
  }, delay);
}

function removeGif(){
  $('.img').hide();
}
});


function showFireWorks(){
    window.human = false;

    var canvasEl = document.querySelector('.fireworks');
    var ctx = canvasEl.getContext('2d');
    var numberOfParticules = 30;
    var pointerX = 0;
    var pointerY = 0;
    var tap = ('ontouchstart' in window || navigator.msMaxTouchPoints) ? 'touchstart' : 'mousedown';
    var colors = ['#FF1461', '#18FF92', '#5A87FF', '#FBF38C'];
    
    function setCanvasSize() {
      canvasEl.width = window.innerWidth * 2;
      canvasEl.height = window.innerHeight * 2;
      canvasEl.style.width = window.innerWidth + 'px';
      canvasEl.style.height = window.innerHeight + 'px';
      canvasEl.getContext('2d').scale(2, 2);
    }
    
    function updateCoords(e) {
      pointerX = e.clientX || e.touches[0].clientX;
      pointerY = e.clientY || e.touches[0].clientY;
    }
    
    function setParticuleDirection(p) {
      var angle = anime.random(0, 360) * Math.PI / 180;
      var value = anime.random(50, 180);
      var radius = [-1, 1][anime.random(0, 1)] * value;
      return {
        x: p.x + radius * Math.cos(angle),
        y: p.y + radius * Math.sin(angle)
      }
    }
    
    function createParticule(x,y) {
      var p = {};
      p.x = x;
      p.y = y;
      p.color = colors[anime.random(0, colors.length - 1)];
      p.radius = anime.random(16, 32);
      p.endPos = setParticuleDirection(p);
      p.draw = function() {
        ctx.beginPath();
        ctx.arc(p.x, p.y, p.radius, 0, 2 * Math.PI, true);
        ctx.fillStyle = p.color;
        ctx.fill();
      }
      return p;
    }
    
    function createCircle(x,y) {
      var p = {};
      p.x = x;
      p.y = y;
      p.color = '#FFF';
      p.radius = 0.1;
      p.alpha = .5;
      p.lineWidth = 6;
      p.draw = function() {
        ctx.globalAlpha = p.alpha;
        ctx.beginPath();
        ctx.arc(p.x, p.y, p.radius, 0, 2 * Math.PI, true);
        ctx.lineWidth = p.lineWidth;
        ctx.strokeStyle = p.color;
        ctx.stroke();
        ctx.globalAlpha = 1;
      }
      return p;
    }
    
    function renderParticule(anim) {
      for (var i = 0; i < anim.animatables.length; i++) {
        anim.animatables[i].target.draw();
      }
    }
    
    function animateParticules(x, y) {
      var circle = createCircle(x, y);
      var particules = [];
      for (var i = 0; i < numberOfParticules; i++) {
        particules.push(createParticule(x, y));
      }
      anime.timeline().add({
        targets: particules,
        x: function(p) { return p.endPos.x; },
        y: function(p) { return p.endPos.y; },
        radius: 0.1,
        duration: anime.random(1200, 1800),
        easing: 'easeOutExpo',
        update: renderParticule
      })
        .add({
        targets: circle,
        radius: anime.random(80, 160),
        lineWidth: 0,
        alpha: {
          value: 0,
          easing: 'linear',
          duration: anime.random(600, 800),  
        },
        duration: anime.random(1200, 1800),
        easing: 'easeOutExpo',
        update: renderParticule,
        offset: 0
      });
    }
    
    var render = anime({
      duration: Infinity,
      update: function() {
        ctx.clearRect(0, 0, canvasEl.width, canvasEl.height);
      }
    });
    
    document.addEventListener(tap, function(e) {
      window.human = true;
      render.play();
      updateCoords(e);
      animateParticules(pointerX, pointerY);
    }, false);
    
    var centerX = window.innerWidth / 2;
    var centerY = window.innerHeight / 2;
    
    function autoClick() {
      if (window.human) return;
      animateParticules(
        anime.random(centerX-50, centerX+50), 
        anime.random(centerY-50, centerY+50)
      );
      anime({duration: 200}).finished.then(autoClick);
    }
    
    autoClick();
    setCanvasSize();
    window.addEventListener('resize', setCanvasSize, false);
}
  

function birthDay(){
  // var audio = $('#audio-control');
  
}
    

  
  
  
  