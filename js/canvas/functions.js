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

	$('.owl-carousel').owlCarousel({
		loop: true,
		margin: 40,
		nav: false,
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