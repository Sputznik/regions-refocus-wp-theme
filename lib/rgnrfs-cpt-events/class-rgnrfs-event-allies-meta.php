<?php
/**
* MANAGES REPEATER FIELD SAVED AS A SERIALIZED ARRAY FOR THE 'events' CPT
*/
class RGNRFS_EVENT_ALLIES_META {

  private $post_type    = 'events';
  private $meta_key     = 'rgnrfs_event_allies';
  private $nonce_action = 'rgnrfs_event_allies_save_action';
  private $nonce_name   = 'rgnrfs_event_allies_nonce_field';

  public function __construct() {
    add_action( 'add_meta_boxes', array( $this, 'register_meta_box' ) );
    add_action( 'save_post', array( $this, 'save_cb' ) );
  }

  public function register_meta_box() {
    add_meta_box( $this->meta_key.'_box', 'Event Allies', array( $this, 'render_html' ), $this->post_type, 'normal', 'default' );
  }

  public function render_html( $post ) {
    $meta_data = get_post_meta( $post->ID, $this->meta_key, true );
    $allies    = ( !empty( $meta_data ) && is_array( $meta_data ) ) ? $meta_data : array();

    wp_nonce_field( $this->nonce_action, $this->nonce_name );
    ?>
    <div id="<?php echo esc_attr( $this->meta_key ); ?>_container" class="rgnrfs-repeater-wrapper" data-behaviour="rgnrfs-allies-repeater" data-meta-key="<?php echo esc_attr( $this->meta_key ); ?>">
      <div class="repeater-rows">
        <?php
          $index = 0;
          if( !empty( $allies ) ) :
          foreach( $allies as $ally ) :
            $name = isset( $ally['name'] ) ? $ally['name'] : '';
            $url  = isset( $ally['url'] ) ? $ally['url'] : '';
          ?>
            <div class="repeater-row">
              <div class="field-group">
                <label>Ally Name:</label>
                <input type="text" name="<?php echo esc_attr( $this->meta_key ); ?>[<?php echo $index; ?>][name]" value="<?php echo esc_attr( $name ); ?>" class="widefat" />
              </div>
              <div class="field-group">
                <label>Ally URL:</label>
                <input type="text" name="<?php echo esc_attr( $this->meta_key ); ?>[<?php echo $index; ?>][url]" value="<?php echo esc_attr( $url ); ?>" class="widefat" />
              </div>
              <div>
                <button type="button" class="button remove-row-btn">Delete</button>
              </div>
            </div>
          <?php
          $index++;
          endforeach;
          endif;
        ?>
      </div>
      <button type="button" id="add_<?php echo esc_attr( $this->meta_key ); ?>_row" class="button button-primary">+ Add New Ally</button>
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

    // RETURN IF POST_TYPE IS NOT events OR IF THE USER DOESN'T HAVE EDIT PERMISSIONS
    if( isset( $_POST['post_type'] ) && $this->post_type === $_POST['post_type'] ){
      if( !current_user_can( 'edit_post', $post_id ) ){
        return;
      }
    } else{
      return;
    }

    if( isset( $_POST[$this->meta_key] ) && is_array( $_POST[$this->meta_key] ) ){
      $raw_rows        = $_POST[$this->meta_key];
      $sanitized_array = array();

      foreach( $raw_rows as $row ){
        $name = isset( $row['name'] ) ? sanitize_text_field( $row['name'] ) : '';
        $url  = isset( $row['url'] )  ? sanitize_text_field( $row['url'] )  : '';

        if( !empty( $name ) || !empty( $url ) ){
          $sanitized_array[] = array(
            'name' => $name,
            'url'  => $url,
          );
        }
      }

      if( !empty( $sanitized_array ) ){
        update_post_meta( $post_id, $this->meta_key, $sanitized_array );
      } else {
        delete_post_meta( $post_id, $this->meta_key );
      }
    } else {
      delete_post_meta( $post_id, $this->meta_key );
    }

  }

}

new RGNRFS_EVENT_ALLIES_META();
