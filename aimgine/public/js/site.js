$(document).ready(function(e) {
	
	// FIXING header
	
	var nav_fix = $('.no-touch .site-header');
	 
	 //if ($(window).width() > 785) {
//		 
//        $(window).scroll(function () {
//			  if ($(this).scrollTop() > 280) {
//					nav_fix.addClass("fix-top");
//					$('.fix-top-header').css('height', '100px');
//			  } else {
//					nav_fix.removeClass("fix-top");
//					$('.fix-top-header').css('height', '100px');
//			  }
//		 });
//		 
//    }

	 if ($(window).resize().width() > 785) {
		 
       $(window).scroll(function () {
			  if ($(this).scrollTop() > 280) {
				nav_fix.addClass("fix-top animated fadeInDown");
					$('.fix-top-header').css('height', '100px');
					$('.btn-go-to-top').css('display', 'block').addClass('animated bounceIn');
			  } else {
						nav_fix.removeClass("fix-top animated fadeInDown");
					$('.fix-top-header').css('height', '100px');
					$('.btn-go-to-top').css('display', 'none');
			  }
		 });
	
		// CSS3 animation for the navigation dropdown menus
		$('.sub_menu').hover( function() {
			$(this).find('.in_sub_menu').addClass('animated fadeInDown');	
		}, function() {
			$(this).find('.in_sub_menu').removeClass('animated fadeInDown');	
		});
		
	 }
	 
	 
	 if ($(window).resize().width() < 785) {
		 
		  // Touch devices nav dropdowns
		 $('.site-nav li.sub_menu a').click( function() {
				 $(this).first('a').toggleClass('clicked');
				 $(this).next('.in_sub_menu').slideToggle('fast');
				 
		 });
	 }
	 
	 
	
	 
	 
	
	// Toggle site navigation bar
	$('.h-mainbar .toggle-it').click( function() {
		$('.h-navbar').stop().slideToggle('250', 'easeInOutCubic');
		return false;
	});
	
	// FADE in on hover
	$('.thumb_holder .img_h').hover( function() {
		$(this).find('.hover').stop().fadeIn('fast');
	}, function() {
		$(this).find('.hover').stop().fadeOut('fast');
	});
	
	// Home page sliders
	$(".home-slider").slidesjs({
	  width: 1500,
	  height: 400,
	  navigation: {
			active: false  
	  }
	});
	
	$('.home-slider').hover( function() {
		$('.home-slider .slidesjs-navigation.slidesjs-previous').stop().fadeIn('fast');
		$('.home-slider .slidesjs-navigation.slidesjs-next').stop().fadeIn('fast');
	}, function() {
		$('.home-slider .slidesjs-navigation.slidesjs-previous').stop().fadeOut('fast');
		$('.home-slider .slidesjs-navigation.slidesjs-next').stop().fadeOut('fast');
	});
	
	
	// CLIENTS
	$('.client-box .img-holder').hover( function() {
		$(this).find('.hover').stop().fadeIn('fast', 'easeOutQuad');
	}, function() {
		$(this).find('.hover').stop().fadeOut('fast', 'easeOutQuad');
	});
	
	
	// Testomonials
	$(".sliding-quotes").slidesjs({
	  width: 1500,
	  height: 220
	});
	
	
	// Who we are dim focus
	$('.no-touch .team-row .team-box').hover(function() {
		 var thumbBtnIdPrefix = 'team';
		 var thumbBtnNum = $(this).attr('id').substring((thumbBtnIdPrefix.length));
		 $('.no-touch .team-row .team-box:not(#team' + thumbBtnNum + ')').stop().animate({
			  "opacity": 0.4
		 });
	}, function() {
		 $('.no-touch .team-box').stop().animate({
			  "opacity": 1
		 });
	});
	
	// HOMEPAGE services dim focus
	$('.no-touch .home-services-wrap .s_box').hover(function() {
		 var thumbBtnIdPrefix = 'serv';
		 var thumbBtnNum = $(this).attr('id').substring((thumbBtnIdPrefix.length));
		 $('.no-touch .home-services-wrap .s_box:not(#serv' + thumbBtnNum + ')').stop().animate({
			  "opacity": 0.4
		 });
	}, function() {
		 $('.no-touch .home-services-wrap .s_box').stop().animate({
			  "opacity": 1
		 });
	});
	
	
	
	
	$(".get-quote[data-toggle='modal']").click( function() {
		return true;
	});
	
	$('.js_select').dropkick({
		theme: 'jsnew'	
	});
	
	
	
	// Projects slider
	$(".project-image").slidesjs({
	  width: 940,
	  height: 600
	});
	
	
	// PROJECT full info toggle
	$('.project-ifno .show-info').click( function() {
		$('.project-ifno .project-full-info').slideDown('fast');
		return false;
	});
	
	$('.project-full-info .btn-close').click( function() {
		$('.project-ifno .project-full-info').slideUp('fast')
		return false;
	});
	
	
	// BLOG post slider
	$(".blog-post .image-holder").slidesjs({
	  width: 940,
	  height: 500,
	  navigation: {
			active: false  
	  }
	});
	
	
	
	// FLOATING NAVIGATION apply
// 	
//	 function moveFloatMenu() {
//        var menuOffset = menuYloc.top + $(this).scrollTop() + "px";
//        $('.no-touch .site-header').animate({
//            top: menuOffset
//        }, {
//            duration: 250,
//            queue: false
//        }, 'easeOutQuad');
//    }
//
//    menuYloc = $('.no-touch .site-header').offset();
//
//    $(window).scroll(moveFloatMenu);
//
//    moveFloatMenu();
	
	
					$('.scroll-btn').bind('click',function(event){
						 
                    var $anchor = $(this);
                    
                    $('html, body').stop().animate({
                        scrollTop: $($anchor.attr('href')).offset().top
                    }, 1500,'easeInOutExpo');
                    /*
                    if you don't want to use the easing effects:
                    $('html, body').stop().animate({
                        scrollTop: $($anchor.attr('href')).offset().top
                    }, 1000);
                    */
                    event.preventDefault();
                });
	
});