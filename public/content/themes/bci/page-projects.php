<?php
/*
* Page: Projects
*/
get_header();

echo '<section class="single projects-list">';


  if(have_posts()) : while(have_posts()) : the_post();

    theTitle();
    the_content();

  endwhile; else: 

    theMissing();

  endif;

echo '</section>';

get_footer(); ?>