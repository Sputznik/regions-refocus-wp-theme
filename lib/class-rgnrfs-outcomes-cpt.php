<?php

class RGNRFS_OUTCOMES_CPT {

public const VIDEO    = 'video';
public const WEBLINK  = 'weblink';
public const DOCUMENT = 'document';

  function __construct(){

    /* REGISTER CPT USING ORBIT-BUNDLE PLUGIN */
    add_filter( 'orbit_post_type_vars', array( $this, 'register_cpt' ) );

    /* REGISTER CUSTOM META-FIELDS USING ORBIT-BUNDLE PLUGIN */
    add_filter( 'orbit_meta_box_vars', array( $this, 'register_meta_fields' ) );

    /* REGISTER TAXONOMY USING ORBIT-BUNDLE PLUGIN */
    add_filter( 'orbit_taxonomy_vars', array( $this, 'register_taxonomy' ) );

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
      'supports'	   => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author' )
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
              self::VIDEO => 'Video',
              self::WEBLINK => 'Weblink',
              self::DOCUMENT => 'Document'
            )
          )
        )
      )
    );

    return $meta_box;
  }

  static function get_resource_type_icon( $resource_type ){
    switch( strtolower( $resource_type ) ){
      case self::VIDEO:
        return '<i class="fa-solid fa-video" aria-hidden="true"></i>';
      case self::WEBLINK:
        return '<i class="fa-solid fa-link" aria-hidden="true"></i>';
      case self::DOCUMENT:
        return '<i class="fa-regular fa-file" aria-hidden="true"></i>';
      default:
        return "";
    }
  }

  static function get_resource_action_text( $resource_type ){
    switch( strtolower( $resource_type ) ){
      case self::VIDEO:
        return 'Watch now';
      case self::WEBLINK:
        return 'Visit link';
      case self::DOCUMENT:
        return 'Open document';
      default:
        return "See More";
    }
  }

  function register_taxonomy( $taxonomies ){
    $taxonomies['outcome-type']	= array(
      'label'       => 'Outcome Type',
      'slug'        => 'outcome-type',
      'post_types'  => array( 'outcomes' )
    );

    return $taxonomies;
  }

}

new RGNRFS_OUTCOMES_CPT();
