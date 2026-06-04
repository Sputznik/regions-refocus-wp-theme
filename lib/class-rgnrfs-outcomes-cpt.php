<?php

class RGNRFS_OUTCOMES_CPT {

  function __construct(){

    /* REGISTER CPT USING ORBIT-BUNDLE PLUGIN */
    add_filter( 'orbit_post_type_vars', array( $this, 'register_cpt' ) );

    /* REGISTER CUSTOM META-FIELDS USING ORBIT-BUNDLE PLUGIN */
    add_filter( 'orbit_meta_box_vars', array( $this, 'register_meta_fields' ) );

  }

  function register_cpt( $post_types ){

    $post_types['outcomes'] = array(
      'slug' 		=> 'outcomes',
      'labels'	=> array(
        'name' => 'Outcomes',
        'singular_name' => 'Outcome'
      ),
      'taxonomies'   => array( 'category' ),
      'public'		   => true,
      'menu_icon' 	 => 'dashicons-admin-post',
      'supports'	   => array( 'title', 'editor', 'excerpt', 'author' )
    );

    return $post_types;

  }

  function register_meta_fields( $meta_box ){
    $meta_box['outcomes'] = array(
      array(
        'id'			=> 'rgnrfs-outcome-metafields',
        'title'		=> 'Additional Information',
        'fields'	=> array(
          'rgnrfs_resource_url'	=> array(
            'type' => 'text',
            'text' => 'Resource URL'
          ),
          'rgnrfs_resource_type'	=> array(
            'type' => 'dropdown',
            'text' => 'Resource Type',
            'options' => array(
              'video' => 'Video',
              'weblink' => 'Weblink',
              'document' => 'Document'
            )
          )
        )
      )
    );

    return $meta_box;
  }

}

new RGNRFS_OUTCOMES_CPT();
