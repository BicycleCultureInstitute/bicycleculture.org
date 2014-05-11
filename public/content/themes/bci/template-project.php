<?php
/*
* Template Name: Project
*/
get_header();

echo '<section class="single project">';


  if(have_posts()) : while(have_posts()) : the_post();

    theSubnav();

    echo '<article>';

    theTitle();

    echo '<div class="clearfix"></div>';

    the_content();

    echo '</article>';

  endwhile; else: 

    theMissing();

  endif;

echo '</section>';

get_footer(); ?>
