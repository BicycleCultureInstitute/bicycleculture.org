<?php
/*
*
*/
get_header();

echo '<section class="single">';


  if(have_posts()) : while(have_posts()) : the_post();

    echo '<article>';

    theTitle();
    the_content();

    echo '</article>';

    theFeatured();

  endwhile; else: 

    theMissing();

  endif;

echo '</section>';

get_footer(); ?>
