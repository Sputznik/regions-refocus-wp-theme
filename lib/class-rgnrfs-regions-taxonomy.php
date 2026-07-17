<?php

class RGNRFS_REGIONS_TAXONOMY {

  function __construct(){
    /* REGISTER TAXONOMY USING ORBIT-BUNDLE PLUGIN */
    add_filter( 'orbit_taxonomy_vars', array( $this, 'register_taxonomy' ) );

    /* ALTER REGIONS TAXONOMY ARGS */
    add_filter( 'register_taxonomy_args', array( $this, 'alter_regions_tax_args' ), 10, 2 );

    /* MAP PERMALINK OF ALL SINGLE / NESTED TERMS IN REGIONS TAXONOMY TO PAGES */
    // add_filter( 'term_link', array( $this, 'map_regions_to_pages' ), 10, 3 );
  }

  function register_taxonomy( $taxonomies ){
    $taxonomies['regions']	= array(
      'label'			    => 'Regions',
      'slug' 			    => 'regions',
      'post_types'	  => array( 'events', 'outcomes' )
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

  // function map_regions_to_pages( $url, $term, $taxonomy ){
  //   if( 'regions' !== $taxonomy ){
  //     return $url;
  //   }
  //
  //   $slug_paths = array( $term->slug );
  //
  //   // FETCH ALL PARENT TERM-IDs IF THEY EXIST(bottom-to-top array)
  //   $ancestors = get_ancestors( $term->term_id, $taxonomy, 'taxonomy' );
  //
  //   if( !empty( $ancestors ) ){
  //     foreach ( $ancestors as $ancestor_id ) {
  //       $ancestor_term = get_term( $ancestor_id, $taxonomy );
  //
  //       // ADD PARENT-SLUG TO THE FRONT OF THE ARRAY
  //       if( $ancestor_term && ! is_wp_error( $ancestor_term ) ){
  //         array_unshift( $slug_paths, $ancestor_term->slug );
  //       }
  //     }
  //   }
  //
  //   $full_path = implode( '/', $slug_paths );
  //   return home_url( '/regions/' . $full_path . '/' );
  // }

}

new RGNRFS_REGIONS_TAXONOMY();
