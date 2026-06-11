<?php

class RGNRFS_TRANSPARENT_NAVBAR {

  private $meta_slug;

  function __construct(){

    $this->meta_slug = 'rgnrfs_sticky_transparent';

    /* REGISTER CUSTOM META-FIELDS USING ORBIT-BUNDLE PLUGIN */
    add_filter( 'orbit_meta_box_vars', array( $this, 'register_meta_fields' ) );

    /* PRINTS ADDITIONAL CLASSES */
    add_filter( 'body_class', array( $this, 'set_body_class' ) );
    add_action('rgnrfs_transparent_navbar_classes', array( $this, 'set_transparent_navbar_classes' ) );
  }

  function set_body_class( $classes ){
    if( !is_page() ){
      return $classes;
    }

    global $post;
    $is_transparent = get_post_meta( $post->ID, $this->meta_slug, true );

    if( !empty( $is_transparent ) && $is_transparent[0] === 'show' ){
      $classes[] = 'rgnrfs-transparent-navbar';
    }

    return $classes;
  }

  function set_transparent_navbar_classes(){
    if( !is_page() ){
      echo " scrolled";
      return;
    }

    global $post;
    $is_transparent = get_post_meta( $post->ID, $this->meta_slug, true );

    if( empty( $is_transparent ) ){
      echo " scrolled";
      return;
    }

  }

  function register_meta_fields( $meta_box ){
    $meta_box['page'] = array(
      array(
        'id'			=> 'rgnrfs-transparent-navbar',
        'title'		=> 'Page Settings',
        'context' => 'side',
        'fields'	=> array(
          $this->meta_slug => array(
            'type' => 'checkbox',
            'text' => 'Transparent Header',
            'options' => array(
              'show' => 'Enable transparent navbar'
            )
          )
        )
      )
    );

    return $meta_box;
  }

}

new RGNRFS_TRANSPARENT_NAVBAR();
