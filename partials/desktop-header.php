<?php
/**
 * The template for displaying header menu
*/
?>
<header class="rgnrfs-site-header<?php if( !is_front_page() ){ echo " scrolled"; } ?>">
  <nav id="rgnrfs-navigation" class="navbar">
    <div id="primary-navbar-container" class="container-fluid">
      <?php do_action('rgnrfs_site_logo'); ?>
      <?php do_action('rgnrfs_nav_menu', 'primary', 'desktop-header'); ?>
      <div class="navbar-buttons">
        <button class="nav-search" title="Search">
          <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
        </button>
        <button class="navbar-toggler" type="button" aria-label="Open Sidebar Menu" aria-expanded="false" aria-controls="mobile-nav">
          <i class="fa-solid fa-bars" aria-hidden="true"></i>
        </button>
      </div>
    </div>
  </nav>
</header>
