window.onload = function() {
  $ = jQuery.noConflict();
  $('.js-scroll').on('click', function( evt ) {
    evt.preventDefault();

    // Scroll to about one section
    $('html, body').animate({
      scrollTop: $(this.hash).offset().top
    }, 800);
  });

  var windowHeight = $(window).height();
  var heroHeight = $('.js-hero').outerHeight();
  var aboutOneHeight = $('.js-about-one').outerHeight();
  var aboutTwoHeight = $('.js-about-two').outerHeight();
  var dividerHeight = $('.js-divider').outerHeight();
  var worksHeight = $('.js-works').outerHeight();
  var quoteHeight = $('.js-quote').outerHeight();
  var contactHeight = $('.js-contact').outerHeight();
  var firstScroll = true;

  $('.js-about-one__img').hide(); 
  $('.js-about-two__img').hide();

  // Call scroll event handler once every 100ms
  var throttledHandler = _.throttle(scrollHandler, 100);
  $(window).scroll(throttledHandler);
  
  function scrollHandler() {
    // Slide about sections images
    var scrollTopPos = $(document).scrollTop();
    var heroHeight = $('.hero').outerHeight();

    if (firstScroll && scrollTopPos > 350) {
    $('.js-about-one__img').show().addClass('fade-in-slide');
    }
    
    if (firstScroll && scrollTopPos > 1050) {
      $('.js-about-two__img').show().addClass('fade-in-slide');
      firstScroll = false;
    }
    
    // Recalculate heights on window vertical resize
    if (windowHeight != $(window).height()) { 
      windowHeight = $(window).height();
      heroHeight = $('.js-hero').outerHeight();
      aboutOneHeight = $('.js-about-one').outerHeight();
      aboutTwoHeight = $('.js-about-two').outerHeight();
      dividerHeight = $('.js-divider').outerHeight();
      worksHeight = $('.js-works').outerHeight();
      quoteHeight = $('.js-quote').outerHeight();
      contactHeight = $('.js-contact').outerHeight();
    }

    // Modify fixed navigation
    var fixedNavOffset = $('.fixed-nav').offset()
    var fixedNavPos = fixedNavOffset ? fixedNavOffset.top : 0;
    var sum;

    if (fixedNavPos < heroHeight) {
      $('.js-line').removeClass('active');
      $('.js-line').eq(0).addClass('active');
      $('.fixed-nav').removeClass('blue');
    }

    sum = heroHeight + aboutOneHeight;
    if (fixedNavPos > heroHeight && fixedNavPos < sum) {
      $('.js-line').removeClass('active');
      $('.js-line').eq(1).addClass('active');
      $('.fixed-nav').addClass('blue');
    }

    if (fixedNavPos > sum && fixedNavPos < sum + aboutTwoHeight + dividerHeight) {
      $('.js-line').removeClass('active');
      $('.js-line').eq(2).addClass('active');
      $('.fixed-nav').addClass('blue');
    }

    sum = heroHeight + aboutOneHeight + aboutTwoHeight;
    if (fixedNavPos > sum && fixedNavPos <= sum + dividerHeight + worksHeight + quoteHeight) {
      $('.js-line').removeClass('active');
      $('.js-line').eq(3).addClass('active');
      $('.fixed-nav').addClass('blue');
    }

    sum += dividerHeight + worksHeight + quoteHeight;
    if (fixedNavPos > sum) {
      $('.js-line').removeClass('active');
      $('.js-line').eq(4).addClass('active');
      $('.fixed-nav').addClass('blue');
    }

    if (fixedNavPos > sum + contactHeight - 40) {
      $('.fixed-nav').removeClass('blue');
    }
  } //scrollHandler()
}//window.onload
