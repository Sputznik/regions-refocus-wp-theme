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
