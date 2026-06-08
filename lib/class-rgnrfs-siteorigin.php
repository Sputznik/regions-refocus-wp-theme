<?php

/**
 * BOOTSTRAPS SITEORIGIN SPECIFIC FUNCTIONALITIES
 */
class RGNRFS_SITEORIGIN {

  function __construct() {
    /* ADD SOW FROM THE THEME */
    add_filter( 'siteorigin_widgets_widget_folders', array( $this, 'register_widgets_folder' ) );

    /* REGISTER PREBUILT LAYOUTS */
    add_filter( 'siteorigin_panels_local_layouts_directories', array( $this, 'register_prebuilt_layouts' ) );
  }

  function register_widgets_folder( $folders ){
    $folders[] = RGNRFS_THEME_PATH . '/so-widgets/';
    return $folders;
  }

  function register_prebuilt_layouts( $folders ){
    $folders[] = RGNRFS_THEME_PATH . '/so-layouts/';
    return $folders;
  }

}

new RGNRFS_SITEORIGIN;
