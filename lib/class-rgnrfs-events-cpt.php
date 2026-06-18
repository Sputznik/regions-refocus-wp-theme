<?php

class RGNRFS_EVENTS_CPT {

  function __construct(){

    /* REGISTER CPT USING ORBIT-BUNDLE PLUGIN */
    add_filter( 'orbit_post_type_vars', array( $this, 'register_cpt' ) );

    /* REGISTER CUSTOM META-FIELDS USING ORBIT-BUNDLE PLUGIN */
    add_filter( 'orbit_meta_box_vars', array( $this, 'register_meta_fields' ) );

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

}

new RGNRFS_EVENTS_CPT();
