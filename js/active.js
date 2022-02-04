/* 
Project Name: Pantheon
Contributor: Ahan Jaiswal, Parth Arora
Version:	1.0
/*
[Start Activation Code]

	01. Sticky Header
	02. Mobile Menu JS
	04. Onepage Nav JS
	05. Home Slider JS
	06. Youtube Player JS
	07. Wow JS
	08. Video Popup JS
	09. Scroll UP JS
	10. Others JS
	11. Prealoader JS

[End Activation Code]
*/ 
(function($) {
    "use strict";
     $(document).on('ready', function() {	
		
		/*====================================
			Sticky Header JS
		======================================*/ 
		jQuery(window).on('scroll', function() {
			if ($(this).scrollTop() > 100) {
				$('.site-header').addClass("sticky");
			} else {
				$('.site-header').removeClass("sticky");
			}
		});
		
		/*====================================
			Mobile Menu
		======================================*/ 	
		$('.menu').slicknav({
			prependTo:".mobile-nav",
			duration: 600,
			closeOnClick:true,
		});

		/*====================================
			Onepage Nav JS
		======================================*/ 
		$('.menu').onePageNav({
			currentClass: 'active',
			changeHash: false,
			scrollSpeed: 1400,
			scrollThreshold: 0.2,
			filter: '',
			easing: 'easeInOutExpo',
			begin: function() {
				//I get fired when the animation is starting
			},
			end: function() {
				//I get fired when the animation is ending
			},
			scrollChange: function($currentListItem) {
				//I get fired when you enter a section and I pass the list item of the section
			}
		});
		
		/*=======================
			Home Slider JS
		=========================*/ 
		$('.home-slider').owlCarousel({
			items:1,
			autoplay:false,
			autoplayTimeout:4500,
			smartSpeed: 500,
			autoplayHoverPause:true,
			loop:true,
			merge:true,
			nav:true,
			dots:false,
			navText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'],
		});
		
		/*===============================
			Brand Carousel JS
		=================================*/ 
		$(".brand-slider").owlCarousel({
			loop:true,
			autoplay:true,
			smartSpeed: 500,
			autoplayTimeout:2000,
			singleItem: true,
			autoplayHoverPause:true,
			center:false,
			margin:30,
			nav:false,
			dots:false,
			responsive:{
				0: {
					items:1,
				},
				300: {
					items:1,
				},
				480: {
					items:2,
				},
				768: {
					items:3,
				},
				1170: {
					items:5,
				},
			}
		});	
		
		/*=======================
			Extra Scroll JS
		=========================*/
		$('.scroll').on("click", function (e) {
			var anchor = $(this);
				$('html, body').stop().animate({
					scrollTop: $(anchor.attr('href')).offset().top - 0
				}, 900);
			e.preventDefault();
		});
		
		/*===============================
			Testimonial Slider JS
		=================================*/ 
		$(".testimonial-slider").owlCarousel({
			loop:true,
			autoplay:false,
			smartSpeed: 500,
			autoplayTimeout:3500,
			singleItem: true,
			autoplayHoverPause:true,
			items:1,
			nav:false,
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
			dots:true,
			responsive:{
				300: {
					items:1,
				},
				480: {
					items:1,
				},
				768: {
					items:2,
				},
				1170: {
					items:2,
				},
			}
		});	
		
		/*===============================
			Counter JS
		=================================*/  
		$('.number').counterUp({
			time: 1000
		});
		
		/*====================================
			Youtube Player JS
		======================================*/
		$('.player').mb_YTPlayer();		
		
		/*====================================
			Wow JS
		======================================*/		
		var window_width = $(window).width();   
			if(window_width > 767){
            new WOW().init();
		}
		
		/*=====================================
		15.  Video Popup
		======================================*/ 
		$('.video-popup').magnificPopup({
			type: 'iframe',
			removalDelay: 300,
			mainClass: 'mfp-fade'
		});
		
		/*====================================
			14. Scroll Up JS
		======================================*/
		$.scrollUp({
			scrollText: '<span><i class="fa fa-angle-up"></i></span>',
			easingType: 'easeInOutExpo',
			scrollSpeed: 900,
			animation: 'fade'
		});  
		
	});
	
	/*=====================================
		Others JS
	======================================*/ 	
		$( function() {
			$( "#slider-range" ).slider({
			  range: true,
			  min: 0,
			  max: 500,
			  values: [ 0, 500 ],
			  slide: function( event, ui ) {
				$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
			  }
			});
			$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
			  " - $" + $( "#slider-range" ).slider( "values", 1 ) );
		} );
		
	/*====================================
		Preloader JS
	======================================*/		
	$(window).on('load', function () {
		"use strict";
		$(".preeloader").fadeOut(1000);

	});
	 
})(jQuery);
