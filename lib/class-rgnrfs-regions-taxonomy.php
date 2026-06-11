<?php

class RGNRFS_REGIONS_TAXONOMY {

  function __construct(){
    /* REGISTER TAXONOMY USING ORBIT-BUNDLE PLUGIN */
    add_filter( 'orbit_taxonomy_vars', array( $this, 'register_taxonomy' ) );

    /* ALTER REGIONS TAXONOMY ARGS */
    add_filter( 'register_taxonomy_args', array( $this, 'alter_regions_tax_args' ), 10, 2 );
  }

  function register_taxonomy( $taxonomies ){
    $taxonomies['regions']	= array(
      'label'			    => 'Regions',
      'slug' 			    => 'regions',
      'post_types'	  => array( 'convenings', 'outcomes' )
    );

    return $taxonomies;
  }

  function alter_regions_tax_args( $args, $taxonomy ){
    if ( 'regions' !== $taxonomy ) {
      return $args;
    }

    $args['public']             = false; // Disables public visibility and frontend links
    $args['publicly_queryable'] = false; // Disables matching URLs against this taxonomy
    $args['query_var']          = false; // Disables the query variable (?taxonomy=term)
    $args['show_in_rest']       = false; // Disables rest-api endpoint
    $args['rewrite']            = false; // Disables permalink structures and rewrite rules entirely

    return $args;

  }

}

new RGNRFS_REGIONS_TAXONOMY();
