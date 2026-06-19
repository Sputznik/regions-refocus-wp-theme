<?php

class RGNRFS_INITIATIVES_PAGE_ADMIN {

  private $metabox_id;
  private $meta_field_slug;
  private $page_template_slug;

  function __construct(){
    $this->metabox_id         = 'rgnrfs-initiatives-page-metafields';
    $this->meta_field_slug    = 'rgnrfs_initiatives_page_hero_ids';
    $this->page_template_slug = 'page-templates/rgnrfs-initiatives-page.php';

    /* REGISTER CUSTOM META-FIELD */
    add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
    add_action( 'save_post', array( $this, 'save_meta_box' ), 10 );

    /* ENQUEUE ADMIN ASSETS */
    add_action('admin_enqueue_scripts', array( $this, 'admin_assets' ) );
  }

  function add_meta_box(){
    add_meta_box( $this->metabox_id, 'Initiatives Carousel Images', array( $this, 'render_meta_box' ), 'page', 'normal', 'low' );
  }

  function render_meta_box( $post ){
    include( RGNRFS_THEME_PATH.'/lib/initiatives-page-admin/metabox.php' );
  }

  function save_meta_box( $post_id ){
    if( get_post_type( $post_id ) !== 'page' )  return;

    // CHECK IF NONCE IS SET
    if( ! isset( $_POST['rgnrfs_initiatives_page_meta_box_nonce'] ) ) return;

    // VERIFY THAT THE NONCE IS VALID
    if( ! wp_verify_nonce( $_POST['rgnrfs_initiatives_page_meta_box_nonce'], 'rgnrfs_initiatives_page_meta_box' ) ) return;

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    $chosen_template = isset( $_POST['page_template'] ) ? sanitize_text_field( $_POST['page_template'] ) : '';

    // DELETE METADATA IF PAGE TEMPLATE IS SWITCHED
    if( $chosen_template !== $this->page_template_slug ){
      delete_post_meta( $post_id, $this->meta_field_slug );
      return;
    }

    // SAVE
    if( isset( $_POST[$this->meta_field_slug] ) ){
      $clean_ids = sanitize_text_field( $_POST[$this->meta_field_slug] );
      update_post_meta( $post_id, $this->meta_field_slug, $clean_ids );
    }
  }

  function admin_assets(){
    global $pagenow, $post;

    // RETURN IF IT'S NOT A PAGE EDIT/NEW SCREEN
    if( ( $pagenow !== 'post.php' && $pagenow !== 'post-new.php' ) || !isset( $post ) || get_post_type( $post ) !== 'page' ){
      return;
    }

    wp_enqueue_media();
    wp_enqueue_style( 'rgnrfs-initiatives-page-css', RGNRFS_THEME_URI.'/lib/initiatives-page-admin/main.css', array(), RGNRFS_THEME_VERSION );
    wp_register_script( 'rgnrfs-initiatives-page-js', RGNRFS_THEME_URI.'/lib/initiatives-page-admin/main.js', array('jquery'), RGNRFS_THEME_VERSION, true );

    wp_localize_script( 'rgnrfs-initiatives-page-js', 'rgnrfsData', array(
      'targetTemplate' => $this->page_template_slug,
      'metaFieldBoxId' => '#'.$this->metabox_id
    ) );

    wp_enqueue_script('rgnrfs-initiatives-page-js');
  }

}

new RGNRFS_INITIATIVES_PAGE_ADMIN();
