<?php
/*
	Widget Name: RR Regions Hero
	Description: Use as the header section of all regions page.
	Author: Stephen Anil, Sputznik
	Author URI:	https://sputznik.com
*/
class SO_RGNRFS_REGIONS_HERO extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'rr-regions-heo',
			__('RR Regions Hero', 'siteorigin-widgets'),
			array(
				'description' => __( 'Use as the header section of all regions page', 'siteorigin-widgets' )
			),
			array(),
			array(
				'hero_image' => array(
					'type' 		=> 'media',
					'label' 	=> __( 'Background Image', 'siteorigin-widgets' ),
					'choose' 	=> __( 'Choose image', 'siteorigin-widgets' ),
					'update' 	=> __( 'Set image', 'siteorigin-widgets' ),
					'library' 	=> 'image',
					'fallback' 	=> false
				),
				'region_title' => array(
					'type' 			=> 'text',
					'label' 		=> __( 'Title', 'siteorigin-widgets' ),
					'default'		=> 'Region'
				),
				'region_name' => array(
					'type' 			=> 'text',
					'label' 		=> __( 'Region Name', 'siteorigin-widgets' )
				),
				'featured_post_id' => array(
					'type'   		 => 'autocomplete',
					'label'  		 => __( 'Search and Select Featured Event', 'siteorigin-widgets' ),
					'source'		 => 'posts',
					'post_types' => array('events'),
					'multiple'	 => false
				),
				'co_conveners' => array(
					'type' 	=> 'repeater',
					'label' => __( 'Co-conveners' , 'siteorigin-widgets' ),
					'item_name'  => __( 'Repeater item', 'siteorigin-widgets' ),
					'item_label' => array(
						'selector'     => "[id*='convener_name']",
						'update_event' => 'change',
						'value_method' => 'val'
					),
					'fields' => array(
						'convener_name' => array(
							'type' 			=> 'text',
							'label' 		=> __( 'Convener Name', 'siteorigin-widgets' )
						),
						'convener_url' => array(
							'type' 			=> 'text',
							'label' 		=> __( 'URL', 'siteorigin-widgets' )
						)
					)
				),

			),
			get_template_directory()."/so-widgets/rr-regions-heo"
		);
	}

	function get_template_name($instance) {
		return 'template';
	}

	function get_template_dir($instance) {
		return 'templates';
	}

}

siteorigin_widget_register('rr-regions-heo', __FILE__, 'SO_RGNRFS_REGIONS_HERO');
