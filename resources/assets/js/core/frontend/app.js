import "./bootstrap";

import "../../../../../node_modules/jquery-validation/dist/jquery.validate";
import "../../../../../node_modules/fancybox/dist/js/jquery.fancybox";

import { TimelineMax, TweenMax, Linear } from 'gsap';

import "../../../../../node_modules/jquery-match-height/jquery.matchHeight";

window.toastr = require('toastr');

// import "../../../../../node_modules/fullpage.js/dist/fullpage";

// import AOS from 'aos';
require ('../../../../../node_modules/lazysizes/lazysizes');
require ('../../../../../node_modules/slick-carousel/slick/slick');

// AOS.init({
//     // Global settings:
//     disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
//     startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
//     initClassName: 'aos-init', // class applied after initialization
//     animatedClassName: 'aos-animate', // class applied on animation
//     useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
//     disableMutationObserver: false, // disables automatic mutations' detections (advanced)
//     debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
//     throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)


//     // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
//     offset: 120, // offset (in px) from the original trigger point
//     delay: 0, // values from 0 to 3000, with step 50ms
//     duration: 500, // values from 0 to 3000, with step 50ms
//     easing: 'ease', // default easing for AOS animations
//     once: false, // whether animation should happen only once - while scrolling down
//     mirror: false, // whether elements should animate out while scrolling past them
//     anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

// });

// import "../../../../../public/libraries/fullPage.js/dist/fullpage.min.js";
import "../../../../../public/libraries/fullPage/jquery.fullPage.min";
// import "../../../../../public/libraries/grid/grid";

import "./global";
import "./custom";
// import "bootstrap-sass";

// Custom Libraries

// const WOW = require('../../../../../public/libraries/wow/wow');
// $(window).on("load", function () {
//     window.wow = new WOW({
//         boxClass: 'wow',
//         // animateClass: 'animated',
//         offset: 0,
//         mobile: true,
//         live: false,
//         mobile: false,
//     });
//     new WOW().init();


//     // WOW.prototype.addBox = function(element){
//     //     this.boxes.push(element);
//     // };
//     // var wow = new WOW();
//     // wow.init();
//     // $('.wow').on('scrollSpy:exit', function() {
//     //     $(this).css({
//     //         'visibility': 'hidden',
//     //         'animation-name': 'none'
//     //     }).removeClass('animated');
//     //     wow.addBox(this);
//     // }).scrollSpy();
// });