<?php

add_action('customize_register', function( $wp_customize ){

	global $rgnrfs_customize;

	$rgnrfs_customize->panel( $wp_customize, 'rgnrfs_theme_panel', 'Theme Options' );

	$rgnrfs_customize->section( $wp_customize, 'rgnrfs_theme_panel', 'rgnrfs_logo_section', 'Logo', '' );

	/* Site Logo */
	$rgnrfs_customize->image( $wp_customize, 'rgnrfs_logo_section', '[logo][desktop]', 'Logo', '' );

	/* Logo Alt Text */
	$rgnrfs_customize->textarea( $wp_customize, 'rgnrfs_logo_section', '[logo][alt]', 'Logo Alt Text', '' );

});
