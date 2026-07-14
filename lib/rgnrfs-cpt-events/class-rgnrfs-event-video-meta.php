<?php

/**
 * MANAGES SERIALIZED VIDEO METAFIELD ARRAY FOR THE 'events' CPT
 */
class RGNRFS_EVENT_VIDEO_META {

  private $post_type    = 'events';
  private $meta_key     = 'rgnrfs_event_video';
  private $nonce_name   = 'rgnrfs_event_video_nonce_field';
  private $nonce_action = 'rgnrfs_event_video_save_action';

  public function __construct(){
    add_action( 'add_meta_boxes', array( $this, 'register_meta_box' ) );
    add_action( 'save_post', array( $this, 'save_cb' ) );
  }

  public function register_meta_box(){
    add_meta_box( $this->meta_key . '_box', 'Event Video Details', array( $this, 'render_html' ), $this->post_type, 'normal', 'default' );
  }

  public function render_html( $post ){
    $meta_data = get_post_meta( $post->ID, $this->meta_key, true );

    // DEFAULT STATE
    $values = wp_parse_args( $meta_data, array(
      'url'   => '',
      'title' => ''
    ) );

    wp_nonce_field( $this->nonce_action, $this->nonce_name );
    ?>
    <div class="<?php echo esc_attr( $this->meta_key ); ?>-wrapper">
      <p>
        <label for="<?php echo esc_attr( $this->meta_key ); ?>-url">Video URL:</label>
        <input type="text" id="<?php echo esc_attr( $this->meta_key ); ?>-url" name="<?php echo esc_attr( $this->meta_key ); ?>[url]" value="<?php echo esc_attr( $values['url'] ); ?>" class="widefat" />
      </p>
      <p>
        <label for="<?php echo esc_attr( $this->meta_key ); ?>-title">Video Title:</label>
        <input type="text" id="<?php echo esc_attr( $this->meta_key ); ?>-title" name="<?php echo esc_attr( $this->meta_key ); ?>[title]" value="<?php echo esc_attr( $values['title'] ); ?>" class="widefat" />
      </p>
    </div>
    <?php
  }

  public function save_cb( $post_id ){

    // RETURN IF NONCE IS INVALID
    if( !isset( $_POST[$this->nonce_name] ) || !wp_verify_nonce( $_POST[$this->nonce_name], $this->nonce_action ) ){
      return;
    }

    // RETURN IF THIS IS AN AUTOSAVE
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
      return;
    }

    // RETURN IF POST_TYPE IS NOT 'events' OR IF THE USER DOESN'T HAVE EDIT PERMISSIONS
    if( isset( $_POST['post_type'] ) && $this->post_type === $_POST['post_type'] ){
      if( !current_user_can( 'edit_post', $post_id ) ){
        return;
      }
    } else{
      return;
    }

    if( isset( $_POST[$this->meta_key] ) && is_array( $_POST[$this->meta_key] ) ){
      $raw_data = $_POST[$this->meta_key];

      $sanitized_array = array(
        'url'   => isset( $raw_data['url'] ) && !empty( $raw_data['url'] ) ? sanitize_text_field( $raw_data['url'] ) : '',
        'title' => isset( $raw_data['title'] ) && !empty( $raw_data['title'] ) ? sanitize_text_field( $raw_data['title'] ) : ''
      );

      if( empty( $sanitized_array['url'] ) ){
        delete_post_meta( $post_id, $this->meta_key );
        return;
      }

      update_post_meta( $post_id, $this->meta_key, $sanitized_array );
    }

  }

}

new RGNRFS_EVENT_VIDEO_META();
