$(document).ready(function() {
	
	$('.wp-block-gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		tLoading: 'Loading image #%curr%...',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
		}
	});

	$('.search-popup').magnificPopup({
		type: 'inline',

		fixedContentPos: false,
		fixedBgPos: true,

		overflowY: 'auto',

		closeBtnInside: true,
		preloader: false,
		
		midClick: true,
		removalDelay: 300,
		mainClass: 'my-mfp-zoom-in'
	});

	// Табы в поиске
	$(document).on("click", ".search-tabs li", function(){
		var tab_id = $(this).attr('data-tab');

		$('.search-tabs li').removeClass('current');
		$('.tab-content').removeClass('tab-current');

		$(this).addClass('current');
		$("#"+tab_id).addClass('tab-current');
	});

	// Карусель на главной
	$(".owl-carousel").owlCarousel({
		nav:true,
		loop:true,
		dots:false,
		responsive:{
		        0:{
		            items:1
		        }
		    }		
	});

	// Кастомная галерея
	$('.popup-gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		tLoading: 'Загрузка #%curr%...',
		mainClass: 'mfp-img-mobile',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: '<a href="%url%">Не удалось загрузить изображение #%curr%</a>',
			titleSrc: function(item) {
				return false;
			}			
		}
	});	

	// Табы на главной
	$(document).on("click", ".tab-link", function(){
		var tab = $(this).attr("data-tab");

		$(".tab-link").removeClass("active");
		$(this).addClass("active");
		
		$(".tab-current").removeClass("tab-current");
		$(".tab-"+tab).addClass("tab-current");
	});

	// Gallery in news
	$('.news-gallery').magnificPopup({
	  type: 'image',
	  delegate: 'a',
	  gallery:{
	    enabled:true
	  }
	});	

});