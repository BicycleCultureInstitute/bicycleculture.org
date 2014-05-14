jQuery(document).ready(function($) {

  $('input, textarea').placeholder();

  $('a.nav-icon, .backup-menu a').click(function(event) {
    var navTop;
    event.preventDefault();
    $('nav.main, nav.page-subnav').toggleClass('expand');
    navTop = $('nav.main').offset().top;
    $('html, body').stop(true, true).animate({
      scrollTop: navTop
    }, 300);
  });

  var nextSlide = function(slideshow) {
    var active, next, duration, timeoutID;
    active = $('.active', slideshow);
    next = active.next();
    if (!next.length) {
      next = slideshow.children().first();
    }
    duration = active.data('duration');
    timeoutID = setTimeout(function() {
      active.removeClass('active');
      next.addClass('active');
      nextSlide(slideshow);
    }, (duration && !isNaN(duration) ? duration * 1000 : 7000));

    slideshow.data('timeoutID', timeoutID);
  };

  $('.slideshow-container').each(function() {
    nextSlide($(this));
  });

});
