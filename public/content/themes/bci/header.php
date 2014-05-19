<?php
global $project_slug;

$project_slug = preg_replace('/^\/projects\/([^\/]+).*/', '$1', $_SERVER['REQUEST_URI']);
if (!$project_slug || $project_slug == $_SERVER['REQUEST_URI'])
  $project_slug = 'bci';
$body_classes = array('colorscheme-'.$project_slug);
?>
<!DOCTYPE html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" initial-scale="1.0">

  <title><?php wp_title('|'); ?></title>

  <?php
  // Cache buster for stylesheet
  $stylesheet = '/style/screen.css';
  $style_path = get_template_directory() . $stylesheet;
  $style_uri  = get_bloginfo('template_url') . $stylesheet . '?' . filemtime($style_path);
  ?>

  <link rel="shortcut icon" type="image/png" href="/favicon.png">
  <link rel="stylesheet" href="<?php echo $style_uri; ?>" />

  <script type="text/javascript" src="//use.typekit.net/jbq0msd.js"></script>
  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>

  <?php wp_head(); ?>
</head>
<body <?php body_class($body_classes); ?>>
  <header>
    <nav class="contact">
      <div class="container">
        <?php wp_nav_menu(array('theme_location' => 'contact')); ?>
        <ul class="contact-bar-widgets">
          <?php dynamic_sidebar('Contact Bar'); ?>
        </ul>
      </div>
    </nav>
    <div class="container">
      <div class="logos">
        <h1><a href="<?php bloginfo('url'); ?>" style="background-image:url(<?php echo get_theme_mod('logo'); ?>);"><?php bloginfo('title'); ?></a></h1>
        <ul class="header-widgets">
          <?php dynamic_sidebar('Header'); ?>
        </ul>
      </div>
    </div>
    <nav class="main container">
      <ul class="backup-menu"><li><a href="#">Menu</a></li></ul>
      <?php wp_nav_menu(array('theme_location' => 'main')); ?>
      <a class="nav-icon fa fa-bars"> </a>
    </nav>
  </header>
