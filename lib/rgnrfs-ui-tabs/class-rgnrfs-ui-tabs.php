<?php

 /**
  * RGNRFS UI COMPONENT FOR RENDERING TABBED LAYOUTS
  */
class RGNRFS_UI_TABS {

  function __construct() {
    add_action( 'wp_enqueue_scripts', array( $this, 'assets' ) );
  }

  function assets(){
    wp_register_style( 'rgnrfs-tabs-css', RGNRFS_THEME_URI. '/lib/rgnrfs-ui-tabs/tabs.css', array(), time() );
    wp_register_script( 'rgnrfs-tabs-js', RGNRFS_THEME_URI. '/lib/rgnrfs-ui-tabs/tabs.js', array('jquery'), time(), true );
  }

  /**
  * Renders tabbed layout
  *
  * @param array  $tabs_array Structured data array containing arrays with 'title' and 'content(can hold HTML, layouts)'.
  * @param string $unique_id  An optional namespace parameter to prevent conflicts on multiple setups.
  * @return string HTML output.
  */
  static function render( array $tabs_array, string $unique_id = 'rgnrfs-tab' ){
    if( empty( $tabs_array ) ){
      return '';
    }

    // ENQUEUE ASSETS ON LAYOUT INVOCATION
    wp_enqueue_style( 'rgnrfs-tabs-css' );
    wp_enqueue_script( 'rgnrfs-tabs-js' );

    ob_start();
    ?>
    <div data-behaviour="rgnrfs-tabs" id="tab-group-<?php echo esc_attr( $unique_id ); ?>">
      <ul class="rgnrfs-tabs-tab-container" role="tablist">
        <?php self::render_loop( $tabs_array, $unique_id, 'nav' ); ?>
      </ul>
      <div class="rgnrfs-tabs-panel-container">
        <?php self::render_loop( $tabs_array, $unique_id, 'panel' ); ?>
      </div>
    </div>
    <?php
    return ob_get_clean();
  }

  /**
  * Helper method to handle both Nav and Panel elements.
  *
  * @param array  $tabs_array The data set.
  * @param string $unique_id  The instance prefix.
  * @param string $mode       Accepts 'nav' or 'panel' to toggle HTML layout generation.
  */
  private static function render_loop( array $tabs_array, string $unique_id, string $mode ){
    $is_first = true;

    foreach( $tabs_array as $index => $tab ){
      $active_class = $is_first ? 'active' : '';
      $panel_id     = sanitize_title( $unique_id.'-'. ( $tab['id'] ?? $index ) );

      if( 'nav' === $mode ){
      ?>
        <li class="tab-link <?php echo esc_attr( $active_class ); ?>" data-tab="<?php echo esc_attr( $panel_id ); ?>" role="tab"
          aria-selected="<?php echo $is_first ? 'true' : 'false'; ?>"><?php echo esc_html( $tab['title'] );?></li>
      <?php
      }
      elseif( 'panel' === $mode ){
      ?>
        <div id="<?php echo esc_attr( $panel_id ); ?>" class="tab-panel <?php echo esc_attr( $active_class ); ?>" role="tabpanel">
          <?php echo apply_filters( 'the_content', $tab['content'] ); ?>
        </div>
      <?php
      }

      $is_first = false;
    }

  }

}

new RGNRFS_UI_TABS();
