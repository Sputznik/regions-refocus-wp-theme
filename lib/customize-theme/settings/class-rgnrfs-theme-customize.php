<?php

class RGNRFS_THEME_CUSTOMIZE {

	private $option;
	private $option_slug;

	function __construct(){
		$this->option_slug = 'rgnrfs_theme';
		$this->option 		 = get_option( $this->option_slug );
	}

	function get_option(){ return $this->option; }

	function get_one_option( $slug, $default ){
		$option = $this->get_option();

		if( isset( $option[ $slug ] ) && $option[ $slug ] ){
			return $option[ $slug ];
		}

		return $default;
	}

	function get_option_slug( $id ){ return $this->option_slug.$id; }

	// RETURNS CUSTOMIZER SETTING BASED ON SECTION AND SLUG
	function get_theme_option( $section, $slug, $default ){
		$option = $this->get_option();

		if( isset( $option[$section][ $slug ] ) && $option[$section][ $slug ] ){
			return $option[$section][ $slug ];
		}

		return $default;
	}

	// WRAPPER AROUND WP_Customize_Manager::add_panel
	function panel( $wp_customize, $panel_id, $panel_label ){

		$wp_customize->add_panel( $panel_id, array(
			'priority' 				=> 30,
			'capability' 			=> 'edit_theme_options',
			'theme_supports'	=> '',
			'title' 					=> $panel_label,
			'description' 		=> ''
		)	);

	}

	// WRAPPER AROUND WP_Customize_Manager::add_section
	function section( $wp_customize, $panel_id, $section_id, $section_label, $section_desc ){

		$wp_customize->add_section( $section_id , array(
  		'title'       	=> $section_label,
    	'priority'    	=> 30,
    	'description' 	=> $section_desc,
    	'panel'					=> $panel_id
		)	);

	}

	// WRAPPER AROUND WP_Customize_Manager::add_setting
	function add_setting( $wp_customize, $setting_id, $default_setting ){

		$wp_customize->add_setting( $setting_id, array(
			'type'				=> 'option',
			'default' 		=> $default_setting,
			'capability'=> 'edit_theme_options'
		)	);

	}

	function textarea( $wp_customize, $section_id, $setting_id, $setting_label, $default_setting ){
		$setting_id = $this->get_option_slug( $setting_id );

		$this->add_setting( $wp_customize, $setting_id, $default_setting );

		$wp_customize->add_control( $setting_id, array(
			'settings' 	=> $setting_id,
  		'type' 			=> 'textarea',
    	'label' 		=> $setting_label,
  		'section' 	=> $section_id,
    )	);

	}

	function image( $wp_customize, $section_id, $setting_id, $setting_label, $default_setting ){
		$setting_id = $this->get_option_slug( $setting_id );

		$this->add_setting( $wp_customize, $setting_id, $default_setting );

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $setting_id, array(
  		'label' 		=> $setting_label,
  		'section' 	=> $section_id,
  		'settings' 	=> $setting_id,
		)	)	);
	}

}

global $rgnrfs_customize;
$rgnrfs_customize = new RGNRFS_THEME_CUSTOMIZE;
