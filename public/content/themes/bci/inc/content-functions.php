<?php
/*
*
* Content functions that can be used around the site, theTitle();
* depends on having ACF installed so that helper function in init
* can run.
*
*/
//
// Image zoomed at a locked aspect: zoom-crop in the client
function aspectImage($src, $options = array()) {
  $options = array_merge(array(
    'aspect' => '16x9',
    'classes' => array(),
    'alt' => '',
    'title' => '',
  ), $options);

  $classes = array_merge(array('aspect-image', 'asepct-'.$options['aspect']), $options['classes']);

  $markup = '<img' .
    ' class="'.implode(' ', $classes).'"' .
    ' src="'.get_template_directory_uri().'/img/'.$options['aspect'].'.png"' .
    ' style="background-image:url('.$src.');"';
  $options['alt'] && ($markup .= ' alt="'.$options['alt'].'"');
  $options['title'] && ($markup .= ' title="'.$options['title'].'"');
  $markup .= '>';

  return $markup;
}

// Page Titles
function theTitle() {

  $title_classes = array('page-title');

  $featured_image = '';

  if (has_post_thumbnail()) {
    $featured_image_id = get_post_thumbnail_id();
    $featured_image_src = wp_get_attachment_image_src($featured_image_id);

    $featured_image = aspectImage($featured_image_src[0], array(
      'alt' => get_post_meta($featured_image_id, '_wp_attachment_image_alt', true),
      'title' => get_post_meta($featured_image_id, '_wp_attachment_image_title', true),
    ));

    $title_classes[] = 'featured-image';
  }

  $title_start = '<h1 class="'.implode(' ', $title_classes).'">';

  $title_start .= '<span>';

  if (get_field('title_type') === 'text') {
    $title = get_field('title_text');
  } elseif (get_field('title_type') === 'image' ) {
    $titleImage = get_field('title_image');
    $title = '<img src="'.$titleImage['url'].'" alt="'.$titleImage['alt'].'">';
  } else {
    $title = get_the_title();
  }

  $title_end = '</span>'.$featured_image.'</h1>';

  echo $title_start.$title.$title_end;

}

// Page Subnav
function theSubnav() {
  global $post;

  $child_pages = get_pages(array('parent'=>$post->ID));

  $nav_reference_id = NULL;
  if (count($child_pages)) {
    $nav_reference_id = $post->ID;
  } else if ($post->post_parent) {
    $nav_reference_id = $post->post_parent;
  }

  if ($nav_reference_id !== NULL) {
    echo '<nav class="page-subnav">';
    // var_dump( get_ancestors( $nav_reference_id ) ); // list ancestors also
    wp_list_pages( array(
      'parent'=>$nav_reference_id,
      'title_li'=>'',
    ) );
    echo '</nav>';
  }

}

// Default loop content not found
function theMissing() {
  $missing = '
    <article class="the-missing">
      <h2><span>Not Found</span></h2>
      <p>Sorry, but the content you\'re looking for is not here.</p>
    </article>';
  echo $missing;
}

// consume the Featured advanced custom fields
function theSlideshow() {
  $use_slideshow = get_field('use_slideshow');
  $slideshow = get_field('slideshow');
  if ($use_slideshow && $slideshow) {
    echo '<div class="slideshow-container">';
    $i = 0;
    foreach ($slideshow as $field) {
      $i++;
      $slide_classes = array('slide');
      if ($i == 1) {
        $slide_classes[] = 'active';
      }
      $link = false;
      if ($field['link_type'] == 'url') {
        if ($field['url_link']) $link = $field['url_link'];
      } else if ($field['page_link']) {
        $link = get_permalink($field['page_link']);
      }
      echo '<article class="'.implode(' ', $slide_classes).'" data-duration="'.$field['duration'].'">';
      if ($link)
        echo '<a href="'.$link.'">';
      echo '<h2>'.$field['title'].'</h2>';
      echo '<div class="slide-text" style="background-color:'.$field['background_color'].'; color:'.$field['text_color'].';">';
        echo $field['message'];
      echo '</div>';
      echo '<div class="slide-image">';
      if ($field['image']) {
        echo '<img src="'.$field['image']['url'].'">';
      }
      echo '</div>';
      if ($link)
        echo '</a>';
      echo '</article>';
  }
    echo '</div>';
  }
}

// consume the Featured advanced custom fields
function theFeatured() {
  $use_featured = get_field('use_featured');
  $featured = get_field('featured');
  if ($use_featured && $featured) {
    echo '<div class="featured">';
    foreach ($featured as $field) {
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
      echo "<a href=\"$link\">";
      echo "<h2>";
      echo "$title";
      echo '</h2>';
      echo aspectImage($imageSRC);
      echo '</a>';
      echo '</div>';
    }
    echo '</div>';
  }
}
