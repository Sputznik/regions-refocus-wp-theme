<?php

/**
 * MANAGES MULTI-SELECT AUTOCOMPLETE FIELD SAVED AS COMMA SEPARATED LIST OF outcome_ids FOR THE 'events' CPT
 */
class RGNRFS_EVENT_OUTCOMES_META {

  private $post_type    = 'events';
  private $search_cpt   = 'outcomes';
  private $meta_key     = 'rgnrfs_event_outcomes';
  private $nonce_action = 'rgnrfs_event_outcomes_save_action';
  private $nonce_name   = 'rgnrfs_event_outcomes_nonce_field';

  public function __construct(){
    add_action( 'add_meta_boxes', array( $this, 'register_meta_box' ) );
    add_action( 'save_post', array( $this, 'save_cb' ) );
    add_action('wp_ajax_rgnrfs_event_outcomes_json', array( $this, 'rgnrfs_event_outcomes_json' ) );
  }

  function rgnrfs_event_outcomes_json(){
    global $wpdb;
    $search_term     = isset( $_GET['term'] ) ? sanitize_text_field( $_GET['term'] ) : '';
    $wildcard_search = '%' . $wpdb->esc_like($search_term) . '%';

    $query = $wpdb->prepare(
      "SELECT ID, post_title
       FROM {$wpdb->posts}
       WHERE post_type = %s AND post_status = 'publish' AND post_title LIKE %s
       ORDER BY post_title ASC
       LIMIT 10",
      $this->search_cpt,
      $wildcard_search
    );

    $posts = $wpdb->get_results($query);
    $results = array();

    if( !empty( $posts) ){
      foreach( $posts as $post ){
        $results[] = array(
          'id'    => intval( $post->ID ),
          'label' => esc_html( $post->post_title ),
          'value' => esc_html( $post->post_title )
        );
      }
    }

    wp_send_json($results);
  }

  public function register_meta_box(){
    add_meta_box( $this->meta_key . '_box', 'Event Outcomes', array( $this, 'render_html' ), $this->post_type, 'normal', 'default' );
  }

  public function render_html( $post ){
    $saved_ids = get_post_meta( $post->ID, $this->meta_key, true );
    wp_nonce_field( $this->nonce_action, $this->nonce_name );
    ?>
    <div class="rgnrfs-multiselect-autocomplete-wrapper">
      <p>
        <label for="rgnrfs-multiselect-autocomplete-value"><strong>Type or select IDs manually.</strong></label>
        <input type="text" name="<?php echo esc_attr( $this->meta_key ); ?>" id="rgnrfs-multiselect-autocomplete-value" data-behaviour="rgnrfs-multiselect-autocomplete" class="large-text" value="<?php echo esc_attr($saved_ids); ?>" />
        <span class="description">Comma-separated list with NO spaces.</span>
      </p>
      <p id="rgnrfs-multiselect-autocomplete-search">
        <label for="rgnrfs-multiselect-autocomplete-display"><strong>Search and Select Outcomes:</strong></label>
        <input type="text" id="rgnrfs-multiselect-autocomplete-display" class="large-text" placeholder="Type to search outcomes..." autocomplete="off" />
      </p>
    </div>
    <?php
  }

  function save_cb( $post_id ){

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

    if( isset( $_POST[$this->meta_key] ) ){
      global $wpdb;

      $raw_ids  = sanitize_text_field($_POST[$this->meta_key]);
      $id_array = array_filter( array_map( 'intval', explode(',', $raw_ids ) ) );

      if( !empty( $id_array ) ){
        $id_array     = array_unique( $id_array );
        $placeholders = implode( ',', array_fill(0, count($id_array), '%d') );

        $valid_ids = $wpdb->get_col($wpdb->prepare(
          "SELECT ID
           FROM {$wpdb->posts}
           WHERE ID IN ($placeholders) AND post_type = '$this->search_cpt' AND post_status = 'publish'
           ORDER BY FIELD(ID, $placeholders)",
           array_merge( $id_array, $id_array )
        ));

        if( !empty( $valid_ids ) ){
          $clean_ids = implode( ',', $valid_ids );
          update_post_meta( $post_id, $this->meta_key, $clean_ids );
        } else {
          // ALL IDs ARE NON-EXISTENT, DELETE COMPLETELY
          delete_post_meta( $post_id, $this->meta_key );
        }

      } else {
        delete_post_meta( $post_id, $this->meta_key );
      }

    }

  }

}

new RGNRFS_EVENT_OUTCOMES_META();
