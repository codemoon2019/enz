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