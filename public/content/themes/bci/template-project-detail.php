<?php
/*
* Template Name: Project Detail
*/
get_header();

echo '<div class="single project-detail">';

  echo '<section class="sidebar">';
  theSubnav();
  echo '</section>';
  echo '<section class="main-content">';

  if(have_posts()) :
    while(have_posts()) : the_post();

      echo '<article>';

      theTitle();

      echo '<div class="clearfix"></div>';

      the_content();

      echo '</article>';

    endwhile;
  else:

    theMissing();

  endif;

  echo '</section>';

echo '</div>';

get_footer(); ?>
