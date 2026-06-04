<?php

class RGNRFS_TAXONOMY {

  function __construct(){
    /* REGISTER CUSTOM TAXONOMY USING ORBIT-BUNDLE PLUGIN */
    add_filter( 'orbit_taxonomy_vars', array( $this, 'register_taxonomy' ) );
  }

  function register_taxonomy( $taxonomies ){
    $taxonomies['regions']	= array(
      'label'			    => 'Regions',
      'slug' 			    => 'regions',
      'post_types'	  => array( 'convenings', 'outcomes' ),
      'show_in_rest'	=> true
    );

    $taxonomies['initiatives']	= array(
      'label'			    => 'Initiatives',
      'slug' 			    => 'initiatives',
      'post_types'	  => array( 'convenings', 'outcomes' ),
      'show_in_rest'	=> true
    );

    return $taxonomies;
  }

}

new RGNRFS_TAXONOMY();
