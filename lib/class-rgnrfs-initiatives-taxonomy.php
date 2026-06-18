<?php

class RGNRFS_INITIATIVES_TAXONOMY {

  function __construct(){
    /* REGISTER TAXONOMY USING ORBIT-BUNDLE PLUGIN */
    add_filter( 'orbit_taxonomy_vars', array( $this, 'register_taxonomy' ) );
  }

  function register_taxonomy( $taxonomies ){
    $taxonomies['initiatives']	= array(
      'label'			    => 'Initiatives',
      'slug' 			    => 'initiatives',
      'post_types'	  => array( 'convenings', 'events', 'outcomes' )
    );

    return $taxonomies;
  }

}

new RGNRFS_INITIATIVES_TAXONOMY();
