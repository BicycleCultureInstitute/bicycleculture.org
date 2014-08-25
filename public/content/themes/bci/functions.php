<?php

require_once get_template_directory() . '/inc/init.php';
require_once get_template_directory() . '/inc/projects-widget.php';
require_once get_template_directory() . '/inc/social-links-widget.php';
require_once get_template_directory() . '/inc/assets.php';
require_once get_template_directory() . '/inc/content-functions.php';

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

register_sidebar( array(
  'name' => 'Contact Bar'/*,
  'before_title' => '',
  'after_title' => '',
  'before_widget' => '',
  'after_widget' => '' */
) );

register_sidebar( array(
  'name' => 'Side Bar'/*,
  'before_title' => '',
  'after_title' => '',
  'before_widget' => '',
  'after_widget' => '' */
) );

register_sidebar( array(
  'name' => 'Footer'/*,
  'before_title' => '',
  'after_title' => '',
  'before_widget' => '',
  'after_widget' => '' */
) );

// Define Customization Options

function bci_customize_register($wp_customize) {
  // Logo setting
  $wp_customize->add_section( 'images' , array(
    'title'       => 'Images',
    'priority'    => 30,
  ) );
  $wp_customize->add_setting( 'logo' , array(
    'default'     => '',
    'transport'   => 'refresh',
  ) );
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo', array(
    'label'      => 'Logo',
    'section'    => 'images',
    'settings'   => 'logo',
    'priority'   => 1
  ) ) );

  // Google Analytics setting
  $wp_customize->add_section( 'integration' , array(
    'title'       => 'Integration',
    'priority'    => 10,
  ) );
  $wp_customize->add_setting( 'ga_id' , array(
    'default'     => '',
    'transport'   => 'refresh',
  ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ga_id', array(
    'label'      => 'Google Analytics ID',
    'section'    => 'integration',
    'settings'   => 'ga_id',
    'priority'   => 1
  ) ) );
}

add_action('customize_register', 'bci_customize_register');


// register widgets

function register_theme_widgets() {
  register_widget('Project_Logos_Widget');
  register_widget('Social_Links_Widget');
}

add_action('widgets_init', 'register_theme_widgets');
