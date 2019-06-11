(function( $ ) {

	// Large Carousel
	$('#oc-features').owlCarousel({
		items: 1,
		margin: 60,
		nav: true,
		navText: ['<i class="icon-line-arrow-left"></i>','<i class="icon-line-arrow-right"></i>'],
		dots: false,
		stagePadding: 30,
		responsive:{
			768: { items: 2 },
			1200: { stagePadding: 200 }
		},
	});

	// Small Carousel
	$('.owl-carousel').owlCarousel({
		loop: true,
		autoplay: true,
		slideTransition: 'linear',
		autoplayTimeout: 7500,
		autoplaySpeed: 7500,
		autoplayHoverPause: false,
		margin: 25,
		nav: false,
		dots: false,
		stagePadding: 40,
		responsive:{
			0:{
				items:3
			},
			600:{
				items:5
			},
			1000:{
				items:7
			}
		}
	});

})( jQuery );