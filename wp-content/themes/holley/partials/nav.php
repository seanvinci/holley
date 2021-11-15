<header class="site-nav">
  <div class="site-nav-logo-mobile"><a href="<?php echo home_url(); ?>"><span class="offscreen">Holley McCreary</span></a></div>
  <nav class="site-nav-container">
    <?php
    $defaults = array(
      'theme_location' => 'primary-nav',
      'container'      => false,
      'items_wrap'     => '<ul class="site-nav-links unstyled-list">%3$s</ul>',
    );
    wp_nav_menu($defaults); ?>
  </nav>
  <button class="site-nav-button" type="button">
    <span class="offscreen">Menu</span>
    <div></div>
  </button>
  <div class="site-nav-mobile-overlay"></div>
</header>