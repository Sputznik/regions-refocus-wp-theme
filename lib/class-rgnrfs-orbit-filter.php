<?php

class RGNRFS_ORBIT_FILTER {

  function __construct(){
    add_shortcode( 'rgnrfs_library_filter_post_item', array( $this, 'shortcode_cb' ) );
  }

  function shortcode_cb(){
    ob_start();
    include( RGNRFS_THEME_PATH.'/partials/shortcode/library-filter-post-item.php' );
    return ob_get_clean();
  }

}

new RGNRFS_ORBIT_FILTER();
