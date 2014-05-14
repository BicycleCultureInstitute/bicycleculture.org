<?php
/*
* Page: Projects
*/

$body_classes = array('colorscheme-'.$post->post_name);

get_header();

echo '<div class="single projects-list">';

  echo '<section class="visible-xs">';
    theSubnav();
  echo '</section>';

  echo '<section class="slideshow">';
    theSlideshow();
  echo '</section>';

  echo '<section class="main-content">';

  if(have_posts()) :
    while(have_posts()) : the_post();

      echo '<article>';

      theTitle();

      echo '<div class="clearfix"></div>';

      the_content();

      echo '</article>';

      theFeatured();

    endwhile;
  else:

    theMissing();

  endif;

  echo '</section>';

  echo '<section class="sidebar">';
    echo '<div class="hidden-xs">';
      theSubnav();
    echo '</div>';
    dynamic_sidebar('Side Bar');
  echo '</section>';

echo '</div>';

get_footer(); ?>
