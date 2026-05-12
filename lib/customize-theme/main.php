<?php

	function rr_customize_register($wp_customize) {

	$wp_customize->add_panel('rr_theme_options', [
		'title'    => 'Theme Options',
		'priority' => 10,
	]);

	rr_register_social_section($wp_customize);
	rr_register_background_section($wp_customize);

	}


	add_action('customize_register', 'rr_customize_register');

	$inc_files = array(
		'social-links.php',
		'logo.php',
		'background.php',
	);

	foreach($inc_files as $inc_file){
		require_once( $inc_file );
	}

