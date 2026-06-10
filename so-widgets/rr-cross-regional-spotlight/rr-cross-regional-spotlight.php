<?php
/*
	Widget Name: RR Cross Regional Spotlight
	Description: Cross Regional Spotlight Widget.
	Author: Stephen Anil, Sputznik
	Author URI:	https://sputznik.com
*/
class SO_RGNRFS_CROSS_REGIONAL_SPOTLIGHT extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'rr-cross-regional-spotlight',
			__('RR Cross Regional Spotlight', 'siteorigin-widgets'),
			array(
				'description' => __('Cross Regional Spotlight Widget.')
			),
			array(),
			array(
				'spotlight_img' => array(
					'type' 		=> 'media',
					'label' 	=> __( 'Spotlight Image', 'siteorigin-widgets' ),
					'choose' 	=> __( 'Choose image', 'siteorigin-widgets' ),
					'update' 	=> __( 'Set image', 'siteorigin-widgets' ),
					'library' 	=> 'image',
					'fallback' 	=> false
				),
				'spotlight_title' => array(
					'type' 			=> 'text',
					'label' 		=> __( 'Spotlight Title', 'siteorigin-widgets' )
				),
				'spotlight_url' => array(
					'type' 			=> 'text',
					'label' 		=> __( 'Spotlight URL', 'siteorigin-widgets' )
				)
			),
			get_template_directory()."/so-widgets/rr-cross-regional-spotlight"
		);
	}

	function get_template_name($instance) {
		return 'template';
	}

	function get_template_dir($instance) {
		return 'templates';
	}

}

siteorigin_widget_register('rr-cross-regional-spotlight', __FILE__, 'SO_RGNRFS_CROSS_REGIONAL_SPOTLIGHT');
