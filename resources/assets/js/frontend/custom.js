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

	//Slick Slider
	var $status = $('.pagingInfo');
	var $slickElement = $('.slick-slider');

	$slickElement.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
	//currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
	var i = (currentSlide ? currentSlide : 0) + 1;
	$status.text(i + '/' + slick.slideCount);

		$('.slide-label').removeClass('active');
		$('.slide-label-' + i).addClass('active');

	});

	//SLICK

	$('.slick-slider').slick({
		lazyLoad: 'ondemand',
		infinite: true,
		arrows: true,
		autoplay: true,
		autoplaySpeed: 2000,
		fade: true,
  	cssEase: 'linear'
	});
	$('#myslick1 .left svg').click(function(){
			$('#myslick1 .slick-prev').trigger('click');
	});
	$('#myslick1 .right svg').click(function(){
			$('#myslick1 .slick-next').trigger('click');
	});

	$('#myslick2 .left svg').click(function(){
			// $('#myslick2 .slick-prev').trigger('click');
	});
	$('#myslick2 .right svg').click(function(){
			// $('#myslick2 .slick-next').trigger('click');
	});

	//Lazy load
	$('img').lazy({
		effect: 'fadeIn',
		effectTime: 1000,
		threshold: 200
	});
});