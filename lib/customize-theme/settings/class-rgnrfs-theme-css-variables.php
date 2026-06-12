<?php

/**
 * BOOTSTRAPS THEME SPECIFIC CSS VARIABLES
 */
class RGNRFS_THEME_CSS_VARIABLES {
	function __construct(){
		add_action('wp_head', array( $this, 'theme_css_variables' ) );
	}

	function theme_css_variables(){
		?>
		<style>
			:root {
        --rgnrfs-img-pacific-terrain: url(<?php echo RGNRFS_THEME_URI.'/images/pacific-terrain.svg'; ?>);
			}
		</style>
		<?php
	}

}

new RGNRFS_THEME_CSS_VARIABLES();
