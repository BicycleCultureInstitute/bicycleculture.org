jQuery(document).ready(function($) {

  $('input, textarea').placeholder();

  $('a.nav-icon, .backup-menu a').click(function(event) {
    event.preventDefault();
    $(this).closest('nav').toggleClass('expand');
  });

});
