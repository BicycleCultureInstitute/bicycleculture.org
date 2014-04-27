<!DOCTYPE html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" initial-scale="1.0" />

  <title><?php wp_title('|'); ?></title>

  <?php
  // Cache buster for stylesheet
  $stylesheet = '/style/screen.css';
  $style_path = get_template_directory() . $stylesheet;
  $style_uri  = get_bloginfo('template_url') . $stylesheet . '?' . filemtime($style_path);
  ?>

  <link rel="stylesheet" href="<?php echo $style_uri; ?>" />

  <script type="text/javascript" src="//use.typekit.net/jbq0msd.js"></script>
  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header class="container">
    <nav class="contact">
      <?php wp_nav_menu(array(
        'theme_location' => 'contact',
        'walker' => new wp_bootstrap_navwalker()
      )); ?>
    </nav>
    <div class="logos">
    <h1><a href="<?php bloginfo('url'); ?>">BCI LOGO</a></h1>
      <ul class="header-widgets">
        <?php dynamic_sidebar('Header'); ?>
      </ul>
    </div>
    <nav class="main">
      <?php wp_nav_menu(array(
        'theme_location' => 'main',
        'walker' => new wp_bootstrap_navwalker()
      )); ?>
    </nav>
  </header>
