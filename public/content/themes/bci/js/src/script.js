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

});
