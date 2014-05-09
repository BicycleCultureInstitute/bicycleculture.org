<?php

class Project_Logos_Widget extends WP_Widget {

  function Project_Logos_Widget() {
    parent::__construct( false, 'Project Logos' );
  }

  function widget($args, $instance) {
    global $post, $project_slug;

    $projects = new WP_Query( array(
      'post_type' => 'page',//it is a Page right?
      'post_status' => 'publish',
      'meta_query' => array(
        array(
          'key' => '_wp_page_template',
          'value' => 'template-project.php', // template name as stored in the dB
        )
      )
    ) );
    if ( $projects->have_posts() ) :
      echo '<ul class="projects-widget">';
      while ( $projects->have_posts() ) : $projects->the_post();
        $logoColor = get_field('logo_color');
        $logoGrayscale = get_field('logo_grayscale');
        $classes = array('project-logo', 'project-logo-'.$post->post_name);
        if ($project_slug == $post->post_name) $classes[] = 'active';

        echo '<li class="'.implode(' ', $classes).'">';
        echo '<a href="'.get_the_permalink().'">';
        echo '<img src="'.$logoColor['url'].'" alt="'.$logoColor['url'].'" class="logo-color">';
        echo '<img src="'.$logoGrayscale['url'].'" alt="'.$logoGrayscale['url'].'" class="logo-grayscale">';
        echo '</a>';
        echo '</li>';
      endwhile;
      echo '</ul>';
    endif;
    wp_reset_postdata();
  }

  function update($new_instance, $old_instance) {
  }

  function form($instance) {
  }

}
