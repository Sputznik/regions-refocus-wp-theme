<?php

/**
 * ACTION HOOKS
*/

/* RETURNS SIDEBAR BASED ON ID */
add_action( 'rgnrfs_sidebar', function( $sidebar_id ){
	if( is_active_sidebar( $sidebar_id ) && $sidebar_id ){
		dynamic_sidebar( $sidebar_id );
  }
});

/* HEADER MENU ATTRIBUTES */
add_action('rgnrfs_nav_menu', function( $location, $menu_id ){
	$rgnrfs_nav_menu_options = array(
		'menu'              => $location,
		'theme_location'    => $location,
		'depth'             => 2,
		'container'         => false,
		'menu_class'        => 'menu',
		'items_wrap'        => '<ul id="'.$menu_id.'" class="%2$s">%3$s</ul>',
		'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
		'walker'            => new WP_Bootstrap_Navwalker()
	);

	wp_nav_menu( $rgnrfs_nav_menu_options );

}, 10, 2 );

/* PRINT SITE LOGO TO THE HEADER */
add_action('rgnrfs_site_logo', function(){
	include( RGNRFS_THEME_PATH.'/partials/site-logo.php' );
});
