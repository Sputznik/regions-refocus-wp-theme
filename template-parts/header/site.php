<header class="banner">
  <!-- <div class="header-bg dark-bg"></div> -->
  <div class="header-bg overlay" style="background: url(/assets/images/RR-WEBSITE-FEATURED-BANNER.png)"></div>
  <div class="brand-wrap">
  <?php the_custom_logo(); ?>
</div>

  <nav class="nav-primary">
    <?php
      wp_nav_menu([
        'theme_location' => 'primary',
        'container' => false,
        'menu_class' => 'nav',
        'fallback_cb' => false,
      ]);
    ?>
  </nav>

  <div class="social">
    <ul>
      <li class="menu-item-has-children">
        <a href="#" tabindex="0" role="button" aria-expanded="false">
          <!-- SVG kept as-is -->
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16.31 17.19">
            <path fill="#fff"
              d="M6.2,8.6a3,3,0,0,1-.19,1L10.93,12a3.09,3.09,0,1,1-.81,2.09,2.63,2.63,0,0,1,0-.49L4.92,11.1A3.1,3.1,0,1,1,3.1,5.5a3,3,0,0,1,1.82.6l5.24-2.52a2.59,2.59,0,0,1,0-.48,3.12,3.12,0,1,1,.81,2.08L6,7.55a3.05,3.05,0,0,1,.19,1Z"/>
          </svg>
          Stay Connected
        </a>

        <div class="social-dropdown">

          <span class="cap">Follow us</span>
          
          <?php rr_social_links(); ?>

          <span class="cap">Join our mailing list</span>

          <?php echo do_shortcode('[mc4wp_form id=1008474]'); ?>

          <a href="<?php echo esc_url(home_url('/contact')); ?>" class="cap contact">Contact Us</a>

        </div>
      </li>
    </ul>
  </div>

  <div class="search-box">
    <?php get_search_form(); ?>
  </div>

  <div class="search-wrap">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/search.svg" alt="Search" class="search-btn">
  </div>

</header>


<!-- MOBILE NAV -->

<header class="mobile-nav dark-bg">

  <div class="mob-nav-main">
    <span style="background: url(/assets/images/RR-WEBSITE-FEATURED-BANNER.png)"></span>

    <div class="brand-wrap">
      <a class="brand" href="<?php echo esc_url(home_url('/')); ?>">
        <?php the_custom_logo(); ?>
      </a>
    </div>

    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mob-search.svg" alt="Search" class="mob-search-icon">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mob-share.svg" alt="Share" class="mob-share-icon">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mob-burger.svg" alt="Mobile Menu Toggle" class="mob-burger-icon">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mob-x.svg" alt="Mobile Menu Toggle" class="mob-x-icon">

  </div>

  <div class="mob-nav-body">
    <div class="mob-nav-body-inner">

      <div class="nav-items">

        <nav class="nav-primary">
          <?php
            wp_nav_menu([
              'theme_location' => 'primary',
              'container' => false,
              'menu_class' => 'nav',
              'fallback_cb' => false,
            ]);
          ?>
        </nav>

        <nav class="additional-links cap">
          <?php
            wp_nav_menu([
              'theme_location' => 'footer',
              'container' => false,
              'menu_class' => 'footer-pages',
              'fallback_cb' => false,
            ]);
          ?>
        </nav>

      </div>

      <div class="search-box">
        <?php get_search_form(); ?>
      </div>

      <div class="social">

        <span class="cap">Follow us</span>

        <?php rr_social_links(); ?>

        <span class="cap">Join our mailing list</span>

        <?php echo do_shortcode('[mc4wp_form id=1008474]'); ?>

        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="cap contact">Contact Us</a>

      </div>

    </div>
  </div>

</header>
