<?php
/*
*
*/
get_header();

echo '<div class="single">';

  echo '<section class="slideshow">';
    theSlideshow();
  echo '</section>';

  echo '<section class="main-content">';

  if(have_posts()) :
    while(have_posts()) : the_post();

      echo '<article>';

      the_content();

      echo '</article>';

      theFeatured();

    endwhile;
  else:

    theMissing();

  endif;

  echo '</section>';

  echo '<section class="sidebar">';
    dynamic_sidebar('Side Bar');
  echo '</section>';

echo '</div>';

get_footer(); ?>
