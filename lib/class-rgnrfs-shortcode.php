<?php

class RGNRFS_SHORTCODE {

  function __construct() {
    add_shortcode( 'rgnrfs_video_embed', array( $this, 'rgnrfs_video_embed_cb' ) );

  }

  function rgnrfs_video_embed_cb( $atts ){
    $args = shortcode_atts( array(
      'url'			 => '',
      'title'    => '',
      'use_meta' => 0
    ), $atts, 'rgnrfs_video_embed' );

    $queried_obj = get_queried_object();

    // FETCH DATA FROM CPT EVENTS ELSE USE VALUES FROM SHORTCODE ATTS
    if( intval( $args['use_meta'] ) === 1 && $queried_obj && isset( $queried_obj->ID ) && isset( $queried_obj->post_type ) && 'events' === $queried_obj->post_type ){
      $meta_array  = get_post_meta( $queried_obj->ID, 'rgnrfs_event_video', true );
      $embed_url  = ( is_array( $meta_array ) && isset( $meta_array['url'] ) ) ? $meta_array['url'] : '';
      $embed_title = ( is_array( $meta_array ) && isset( $meta_array['title'] ) ) ? $meta_array['title'] : '';
    } else {
      $embed_url  = $args['url'];
      $embed_title = html_entity_decode( $args['title'], ENT_QUOTES, 'UTF-8' );
    }

    if( empty( $embed_url ) ){
      return '';
    }

    $oembed_html = wp_oembed_get( $embed_url );

    ob_start();

    if( $oembed_html ){
      echo '
      <div class="rgnrfs-video-embed-sc">'.$oembed_html.'</div>
      <div class="rgnrfs-link-color">
        <a href="'.esc_url( $embed_url ).'">
          <h5 class="rgnrfs-video-embed-sc-title">'.esc_html( $embed_title ).'</h5>
        </a>
      </div>';
    }

    return ob_get_clean();
  }

}

new RGNRFS_SHORTCODE();
