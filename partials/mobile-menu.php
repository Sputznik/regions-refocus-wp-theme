<?php
/**
 * The template for displaying hamburger menu
*/
?>
<nav id="mobile-nav" aria-hidden="true">
	<div class="mobile-nav-inner">
		<div class="mobile-nav-header">
			<button id="close-mobile-nav" type="button" aria-label="Close Sidebar Menu">
				<i class="fa fa-times" aria-hidden="true"></i>
			</button>
		</div>
		<?php do_action('rgnrfs_nav_menu', 'primary', 'sidebar-menu'); ?>
	</div>
</nav>
