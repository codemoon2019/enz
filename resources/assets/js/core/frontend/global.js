window.pageLoaded = () => {
  // Scroll to top on page refresh
  $("html, body").removeClass("processing-page-load").addClass('page-loaded').animate({ scrollTop: 0 }, 800);
  console.log('pageloaded');
  // Show the main wrapper when the page is fully loaded
  $(".main-wrapper, .main-footer").fadeTo(500, 1);

  // Remove page loading when the page is fully loaded
  $(".page-loading")
    .fadeTo(500, 0)
    .removeClass("page-loading-show");
  $(".loading")
    .fadeTo(500, 1)
    .removeClass("loading");
  $(".to-load").fadeTo(500, 1);
  console.log('loaded!');


  $('#scrollTopBtn').click(function(){
    $('html, body').animate({ scrollTop: 0 }, 800);
  });
  offsetBT();
};


$(window).on('scroll', function(){
  offsetBT();
});

function offsetBT() {
  var ofs = window.pageYOffset;
  var nav = $('.header').outerHeight();
  if(ofs > nav) {
    $('#scrollTopBtn').addClass('visible');
  }else {
    $('#scrollTopBtn').removeClass('visible');
  }
}

window.pageLoading = () => {
  // Scroll to top on page refresh
  // $("html, body").removeClass("processing-page-load").animate({ scrollTop: 0 }, 800);
  // // Show the main wrapper when the page is fully loaded
  // $(".main-wrapper, .main-footer").fadeTo(500, 0);

  // // Remove page loading when the page is fully loaded
  // $(".page-loading")
  //   .fadeTo(500, 1)
  //   .removeClass("page-loading-show");
  // $(".loading")
  //   .fadeTo(500, 0)
  //   .removeClass("loading");
  // $(".to-load").fadeTo(500, 0);
};

/**
 * jQuery functions
 */
$(window).on("load", function() {
  pageLoaded();
});
