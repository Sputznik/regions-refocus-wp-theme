<?php

class RGNRFS_CONVENINGS_CPT {

  function __construct(){

    /* REGISTER CPT USING ORBIT-BUNDLE PLUGIN */
    add_filter( 'orbit_post_type_vars', array( $this, 'register_cpt' ) );

    /* REGISTER CUSTOM META-FIELDS USING ORBIT-BUNDLE PLUGIN */
    add_filter( 'orbit_meta_box_vars', array( $this, 'register_meta_fields' ) );

  }

  function register_cpt( $post_types ){

    $post_types['convenings'] = array(
      'slug' 		=> 'convenings',
      'labels'	=> array(
        'name' => 'Convenings',
        'singular_name' => 'Convening'
      ),
      'public'		   => true,
      'menu_icon' 	 => 'dashicons-admin-post',
      'supports'	   => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author' )
    );

    return $post_types;

  }

  function register_meta_fields( $meta_box ){
    $meta_box['convenings'] = array(
      array(
        'id'			=> 'rgnrfs-convening-metafields',
        'title'		=> 'Additional Information',
        'fields'	=> array(
          'rgnrfs_date_range'	=> array(
            'type' => 'text',
            'text' => 'Date Range'
          ),
          'rgnrfs_location'	=> array(
            'type' => 'text',
            'text' => 'Location'
          )
        )
      )
    );

    return $meta_box;
  }

}

new RGNRFS_CONVENINGS_CPT();
