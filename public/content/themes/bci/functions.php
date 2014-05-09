<?php

require_once get_template_directory() . '/inc/init.php';
require_once get_template_directory() . '/inc/projects-widget.php';
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

// Define Customization Options

function bci_customize_register($wp_customize) {
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
}

add_action('customize_register', 'bci_customize_register');


// register widgets

function register_theme_widgets() {
  register_widget('Project_Logos_Widget');
}

add_action('widgets_init', 'register_theme_widgets');
