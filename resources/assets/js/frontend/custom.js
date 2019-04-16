$('document').ready(function(){

	//Scroll to top
	$(window).scroll(function () {
		if ($(this).scrollTop() >= 30) {
		  // If page is scrolled more than 50px
			$(".scrollTop").fadeIn(100).addClass("fadeInUp").removeClass("fadeOutDown"); // Fade in the arrow
			$('.user-menu').parent().addClass('fixed');
		} else {
			$(".scrollTop").fadeOut(200).addClass("fadeOutDown").removeClass("fadeInUp"); // Else fade out the arrow
			$('.user-menu').parent().removeClass('fixed');
		}
	  });
	  
	  $(".scrollTop").click(function () {
		// When arrow is clicked
		$("body,html").animate({
		  scrollTop: 0 // Scroll to top of body
		}, 1000);
	  });

	//SLICK

	$('.slick-slider').slick({
		lazyLoad: 'ondemand',
		infinite: true,
		arrows: true,
		autoplay: false,
		slidesToShow: 2,
		slidesToScroll: 1,
		cssEase: 'linear',
	});

	$('.left.myarrow').click(function(){
		$('.slick-slider .slick-prev').trigger('click');
	});
	$('.right.myarrow').click(function(){
			$('.slick-slider .slick-next').trigger('click');
	});

	//Lazy load
	$('img').lazy({
		effect: 'fadeIn',
		effectTime: 1000,
		threshold: 200
	});
});