
<footer>
  &copy; 2013-<?php echo date('Y'); ?> Bicycle Culture Institute, 501(c)3
  <?php wp_nav_menu(array('theme_location' => 'contact')); ?>
  <ul class="footer-widgets">
    <?php dynamic_sidebar('Footer'); ?>
  </ul>
  <div class="built-in">
    <?php wp_footer(); ?>
  </div>
</footer>
</body>
</html>
