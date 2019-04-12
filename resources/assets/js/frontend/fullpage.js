// fullpage customization

if($('.hasPageScroll').length > 0) {
	$('#main')
	.fullpage({
	//   sectionsColor: ['#B8AE9C', '#348899', '#F2AE72', '#5C832F', '#B8B89F'],
		sectionSelector: '.block',
		//   slideSelector: '.block', 
		navigation: false,
		slidesNavigation: false,
		scrollingSpeed: 1000,
		autoScrolling: true,
		fitToSection: true,
		fitToSectionDelay: 2000,
		verticalCentered: false,
		controlArrows: false,
		scrollBar: true,
		// scrollOverflow: true
		// anchors: ['block-slider', 'block-categories', 'block-facts', 'block-development', 'footer'],
	//   menu: '#menu',

	});

}