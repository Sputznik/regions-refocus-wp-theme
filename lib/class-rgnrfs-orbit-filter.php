<?php

class RGNRFS_ORBIT_FILTER {

  function __construct(){
    add_shortcode( 'rgnrfs_library_filter_post_item', array( $this, 'shortcode_cb' ) );
    add_filter( 'orbit_search_results_heading', array( $this, 'search_results_heading_cb' ), 10, 2 );
  }

  function shortcode_cb(){
    ob_start();
    include( RGNRFS_THEME_PATH.'/partials/shortcode/library-filter-post-item.php' );
    return ob_get_clean();
  }

  function search_results_heading_cb( $heading, $args ){
    if( empty( $_GET ) ){
      return "Showing all Publications, Events and Resources";
    }

    return $heading;
  }

}

new RGNRFS_ORBIT_FILTER();
