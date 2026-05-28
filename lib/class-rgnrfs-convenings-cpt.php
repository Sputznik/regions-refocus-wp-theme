<?php

class RGNRFS_CONVENINGS_CPT {

  function __construct(){

    /* REGISTER CPT USING ORBIT-BUNDLE PLUGIN */
    add_filter( 'orbit_post_type_vars', array( $this, 'register_cpt' ) );

    /* REGISTER CUSTOM TAXONOMY USING ORBIT-BUNDLE PLUGIN */
    add_filter( 'orbit_taxonomy_vars', array( $this, 'register_taxonomy' ) );

  }

  function register_cpt( $post_types ){

    $post_types['convenings'] = array(
      'slug' 		=> 'convenings',
      'labels'	=> array(
        'name' => 'Convenings',
        'singular_name' => 'Convening'
      ),
      'public'		   => true,
      'show_in_rest' => true,
      'menu_icon' 	 => 'dashicons-admin-post',
      'supports'	   => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author' )
    );

    return $post_types;

  }

  function register_taxonomy( $taxonomies ){
    $taxonomies['regions']	= array(
      'label'			    => 'Regions',
      'slug' 			    => 'regions',
      'post_types'	  => array( 'convenings' ),
      'show_in_rest'	=> true
    );
    return $taxonomies;
  }

}

new RGNRFS_CONVENINGS_CPT();
