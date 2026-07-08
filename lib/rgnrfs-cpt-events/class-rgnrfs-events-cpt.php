<?php

class RGNRFS_EVENTS_CPT {

  function __construct(){

    /* REGISTER CPT USING ORBIT-BUNDLE PLUGIN */
    add_filter( 'orbit_post_type_vars', array( $this, 'register_cpt' ) );

    /* REGISTER CUSTOM META-FIELDS USING ORBIT-BUNDLE PLUGIN */
    add_filter( 'orbit_meta_box_vars', array( $this, 'register_meta_fields' ) );

    /* REGISTER TAXONOMY USING ORBIT-BUNDLE PLUGIN */
    add_filter( 'orbit_taxonomy_vars', array( $this, 'register_taxonomy' ) );

    /* ENQUEUE ASSETS */
    add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_assets' ) );

  }

  public function enqueue_admin_assets( $hook ) {
    global $post;

    if( !in_array( $hook, array( 'post.php', 'post-new.php' ) ) || ( isset( $post->post_type ) && $post->post_type !== 'events' ) ){
      return;
    }

    $assets_path = RGNRFS_THEME_URI.'/lib/rgnrfs-cpt-events/assets';

    wp_enqueue_style( 'rgnrfs-repeater-css', $assets_path.'/css/main.css', array(), RGNRFS_THEME_VERSION );
    wp_enqueue_script( 'rgnrfs-repeater-js', $assets_path.'/js/repeater.js', array( 'jquery' ), RGNRFS_THEME_VERSION, true );
  }

  function register_cpt( $post_types ){

    $post_types['events'] = array(
      'slug' 		=> 'events',
      'labels'	=> array(
        'name' => 'Events',
        'singular_name' => 'Event'
      ),
      'taxonomies'   => array( 'category' ),
      'public'		   => true,
      'menu_icon' 	 => 'dashicons-admin-post',
      'supports'	   => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author' )
    );

    return $post_types;

  }

  function register_meta_fields( $meta_box ){
    $meta_box['events'] = array(
      array(
        'id'			=> 'rgnrfs-event-metafields',
        'title'		=> 'Additional Information',
        'fields'	=> array(
          'rgnrfs_event_date_range'	=> array(
            'type' => 'text',
            'text' => 'Event Date Range'
          ),
          'rgnrfs_event_location'	=> array(
            'type' => 'text',
            'text' => 'Event Location'
          )
        )
      )
    );

    return $meta_box;
  }

  function register_taxonomy( $taxonomies ){
    $taxonomies['event-type']	= array(
      'label'       => 'Event Type',
      'slug'        => 'event-type',
      'post_types'  => array( 'events' )
    );

    return $taxonomies;
  }

}

new RGNRFS_EVENTS_CPT();
