<?php

class RGNRFS_OUTCOMES_CPT {

  function __construct(){

    /* REGISTER CPT USING ORBIT-BUNDLE PLUGIN */
    add_filter( 'orbit_post_type_vars', array( $this, 'register_cpt' ) );
  }

  function register_cpt( $post_types ){

    $post_types['outcomes'] = array(
      'slug' 		=> 'outcomes',
      'labels'	=> array(
        'name' => 'Outcomes',
        'singular_name' => 'Outcome'
      ),
      'public'		   => true,
      'menu_icon' 	 => 'dashicons-admin-post',
      'supports'	   => array( 'title', 'editor', 'excerpt', 'author' )
    );

    return $post_types;

  }

}

new RGNRFS_OUTCOMES_CPT();
