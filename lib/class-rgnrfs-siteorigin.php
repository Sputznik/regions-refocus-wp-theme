<?php

/**
 * BOOTSTRAPS SITEORIGIN SPECIFIC FUNCTIONALITIES
 */
class RGNRFS_SITEORIGIN {

  function __construct() {
    /* ADD SOW FROM THE THEME */
    add_filter( 'siteorigin_widgets_widget_folders', array( $this, 'register_widgets_folder' ) );
  }

  function register_widgets_folder( $folders ){
    $folders[] = RGNRFS_THEME_PATH . '/so-widgets/';
    return $folders;
  }

}

new RGNRFS_SITEORIGIN;
