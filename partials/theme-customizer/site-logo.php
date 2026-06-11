<?php
/**
 * The template for displaying site-logo
*/

global $rgnrfs_customize;
$option = $rgnrfs_customize->get_option();

if( isset( $option['logo'] ) && $option['logo'] ){

  $logo_url = $rgnrfs_customize->get_theme_option('logo', 'desktop', '');
  $img_alt  = $rgnrfs_customize->get_theme_option('logo', 'alt', 'Site Logo');

  /* CONTAINER */
  _e('<a href="'.get_bloginfo('url').'" class="rgnrfs-site-logo">');

  /* SITE LOGO */
  if( $logo_url ){
    _e('<img src="'.$logo_url.'" alt="'.$img_alt.'" />');
  }

  _e('</a>'); // END OF CONTAINER
}
