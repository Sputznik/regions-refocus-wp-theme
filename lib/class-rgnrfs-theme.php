<?php

/**
 * BOOTSTRAPS THEME SPECIFIC FUNCTIONALITIES
 */
class RGNRFS_THEME {

  private $sidebars;

  function __construct() {

    // LIST OF CUSTOM SIDEBARS
    $this->sidebars = array(
      'rgnrfs-footer-sidebar'	=> array(
        'name' 				=> 'Footer',
        'description' => 'Appears in the footer area',
      )
    );

    add_action( 'after_setup_theme', array(  $this, 'after_setup_theme' ) );  // AFTER THE THEME HAS BEEN ACTIVATED
    add_action( 'widgets_init', array( $this, 'widgets_init' ) );  // INITIALIZE ALL THE WIDGETS IN THE SIDEBAR

  }

  function after_setup_theme(){

    // REGISTER THEME MENUS
    register_nav_menus( array(
      'primary' 	      => __( 'Primary Menu', 'regions-refocus-wp-theme' )
    ) );


    // REGISTER THEME SUPPORTS
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );

    show_admin_bar(false);  // HIDE ADMIN BAR FROM THE FRONTEND

  }

  function widgets_init() {
    foreach( $this->sidebars as $id => $sidebar ) {
      $sidebar['id'] = $id;
      $this->register_sidebar( $sidebar );
    }
  }

  function register_sidebar( $sidebar ) {
    register_sidebar( array(
      'id' 			      => $sidebar['id'],
      'name' 					=> __( $sidebar['name'], 'regions-refocus-wp-theme' ),
      'description' 	=> __( $sidebar['description'], 'regions-refocus-wp-theme' ),
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget' 	=> "</aside>",
      'before_title' 	=> '<h3>',
      'after_title' 	=> '</h3>'
    ) );
  }

}

new RGNRFS_THEME;
