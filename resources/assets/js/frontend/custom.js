$('document').ready(function(){

	$(window).scroll(function () {
		if ($(this).scrollTop() >= 50) {
			$('.user-menu').parent().addClass('fixed');
		} else {
			$('.user-menu').parent().removeClass('fixed');
		}
	});


	//Scroll to top
	$(window).scroll(function () {
		if ($(this).scrollTop() >= 400) {
		  // If page is scrolled more than 50px
			$(".scrollTop").fadeIn(100).addClass("fadeInUp").removeClass("fadeOutDown"); // Fade in the arrow
			$(".mag-download").fadeIn(100).addClass("fadeInUp").removeClass("fadeOutDown"); // Fade in the arrow
		} else {
			$(".scrollTop").fadeOut(200).addClass("fadeOutDown").removeClass("fadeInUp"); // Else fade out the arrow
			$(".mag-download").fadeOut(200).addClass("fadeOutDown").removeClass("fadeInUp"); // Else fade out the arrow
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
	$( '.inputfile' ).each( function()
	{
		var $input	 = $( this ),
			$label	 = $input.next( 'label' ),
			labelVal = $label.html();

		$input.on( 'change', function( e )
		{
			var fileName = '';

			if( this.files && this.files.length > 1 )
				fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
			else if( e.target.value )
				fileName = e.target.value.split( '\\' ).pop();

			if( fileName )
				$label.find( 'span' ).html( fileName );
			else
				$label.html( labelVal );
		});

		// Firefox bug fix
		$input
		.on( 'focus', function(){ $input.addClass( 'has-focus' ); })
		.on( 'blur', function(){ $input.removeClass( 'has-focus' ); });
	});

	var youtube = document.querySelectorAll(".youtube");
	for (var i = 0; i < youtube.length; i++) {

		var source = "https://img.youtube.com/vi/" + youtube[i].dataset.embed + "/hqdefault.jpg";

		var image = new Image();
		image.src = source;
		image.addEventListener("load", function () {
			youtube[i].appendChild(image);
		}(i));

		youtube[i].addEventListener("click", function () {

			var iframe = document.createElement("iframe");

			iframe.setAttribute("frameborder", "0");
			iframe.setAttribute("allowfullscreen", "");
			iframe.setAttribute("src", "https://www.youtube.com/embed/" + this.dataset.embed + "?rel=0&showinfo=0&autoplay=1");

			this.innerHTML = "";
			this.appendChild(iframe);
		});
	};

	$('.testimonials-block').scroll(function(){
		alert('hey!');
	});
});