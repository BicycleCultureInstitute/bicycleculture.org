<?php

require_once get_template_directory() . '/inc/init.php';
require_once get_template_directory() . '/inc/assets.php';
require_once get_template_directory() . '/inc/content-functions.php';

$google_analytics_id = 'UA-XXXXXXXX-X';

// Navigation Menu Array
register_nav_menus( array(
  'main' => 'Main Navigation',
  'contact' => 'Contact Options'
) );

// Sidebar / Widget Array
register_sidebar( array(
  'name' => 'Header'/*,
  'before_title' => '',
  'after_title' => '',
  'before_widget' => '',
  'after_widget' => '' */
) );
