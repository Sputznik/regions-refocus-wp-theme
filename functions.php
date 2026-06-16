<?php

/*  CONSTANTS */
if( !defined( 'RGNRFS_THEME_PATH' ) ){
  define( 'RGNRFS_THEME_PATH', get_template_directory() );
}

if( !defined( 'RGNRFS_THEME_URI' ) ){
  define( 'RGNRFS_THEME_URI', get_template_directory_uri() );
}

if( !defined( 'RGNRFS_THEME_VERSION' ) ){
  define( 'RGNRFS_THEME_VERSION', time() );
}

// INCLUDE FILES
$inc_files = array(
  'lib/class-rgnrfs-theme.php',
  'lib/customize-theme/customize-theme.php',
  'lib/wp-bootstrap-navwalker.php',
  'lib/rgnrfs-hooks/rgnrfs-action-hooks.php',
  'lib/class-rgnrfs-convenings-cpt.php',
  'lib/class-rgnrfs-outcomes-cpt.php',
  'lib/class-rgnrfs-regions-taxonomy.php',
  'lib/class-rgnrfs-initiatives-taxonomy.php',
  'lib/class-rgnrfs-siteorigin.php',
  'lib/class-rgnrfs-transparent-navbar.php',
  'lib/class-rgnrfs-orbit-filter.php'
);

foreach( $inc_files as $inc_file ){ require_once( $inc_file ); }
