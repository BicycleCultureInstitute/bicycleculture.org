jQuery(document).ready(function($) {

  $('input, textarea').placeholder();

  $('a.nav-icon').click(function(event) {
    event.preventDefault();
    $(this).closest('nav').toggleClass('expand');
  });

});
