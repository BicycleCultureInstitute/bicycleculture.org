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

  endwhile; else: 

    theMissing();

  endif;

  $fields = get_fields();

  // if (isset($fields['slideshow'])) :
  //   echo '<div class="slideshow">';
  //   foreach ($fields['slideshow'] as $field) :
  //     $title = $field['title'];
  //     $bg_image = $field['background_image'];
  //     echo '<div class="slide">';
  //     echo "<h2>$title</h2>";
  //     echo '</div>';
  //   endforeach;
  //   echo '</div>';
  // endif;

  ini_set('display_errors', true);
  if (isset($fields['featured'])) {
    echo '<div class="featured">';
    foreach ($fields['featured'] as $field) {
      echo '<div class="feature">';
      if ($field['source_type'] == 'relationship') {
        $relationship = $field['source_relationship'];
        if ($relationship) {
          $post = $relationship[0];
          if (has_post_thumbnail($post->ID)) {
            $imageID = get_post_thumbnail_id($post->ID);
            $imageInfo = wp_get_attachment_image_src($imageID);
            $imageSRC = $imageInfo[0];
          } else {
            $imageSRC = 'post, but no featured image';
          }
          $title = $post->post_title;
          $link = get_permalink($post);
        }
      } else {
        $title = 'url title';
        $imageSRC = 'url image';
      }
      echo "<h2 class=\"featured-image\"><a href=\"$link\">";
      echo "$title";
      echo aspectImage($imageSRC);
      echo '</a></h2>';
      echo '</div>';
    }
    echo '</div>';
  }

echo '</section>';

get_footer(); ?>
