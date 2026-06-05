<?php
/*
	Widget Name: RR Allies
	Description: Regions Refocus Allies Widget.
	Author: Stephen Anil, Sputznik
	Author URI:	https://sputznik.com
	Widget URI:
	Video URI:
*/
class SO_RGNRFS_ALLIES extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'rr-allies',
			__('RR Allies', 'siteorigin-widgets'),
			array(
				'description' => __('Regions Refocus Allies Widget.'),
				'help'        => '',
			),
			array(),
			array(
				'template_style' => array(
					'type' 		=> 'select',
					'label' 	=> __( 'Choose a Style', 'siteorigin-widgets' ),
					'options' => array(
						'show_img_desc' => 'Show image and description',
						'hide_img_desc' => 'Hide image and description'
					),
					'state_emitter' => array(
						'callback' => 'select',
						'args' 		 => array( 'template_style' )
					),
				),
				'allies' => array(
					'type' 	=> 'repeater',
					'label' => __( 'Allies' , 'siteorigin-widgets' ),
					'item_name'  => __( 'Repeater item', 'siteorigin-widgets' ),
					'fields' => array(
						'ally_name' => array(
							'type' 			=> 'text',
							'label' 		=> __( 'Ally Name', 'siteorigin-widgets' ),
						),
						'ally_url' => array(
							'type' 			=> 'text',
							'label' 		=> __( 'URL', 'siteorigin-widgets' ),
						),
						'ally_description' => array(
							'type' => 'textarea',
							'label' => __( 'Ally Description', 'siteorigin-widgets' ),
							'rows' => 10,
							'state_handler' => array(
								'template_style[show_img_desc]' => array('show'),
								'template_style[hide_img_desc]' => array('hide'),
							),
						),
						'ally_logo' => array(
							'type' 		=> 'media',
							'label' 	=> __( 'Ally Logo', 'siteorigin-widgets' ),
							'choose' 	=> __( 'Choose image', 'siteorigin-widgets' ),
							'update' 	=> __( 'Set image', 'siteorigin-widgets' ),
							'library' 	=> 'image',
							'fallback' 	=> false,
							'state_handler' => array(
								'template_style[show_img_desc]' => array('show'),
								'template_style[hide_img_desc]' => array('hide'),
							),
						)
					)
				),

			),
			get_template_directory()."/so-widgets/rr-allies"
		);
	}

	function get_template_name($instance) {
		return 'template';
	}

	function get_template_dir($instance) {
		return 'templates';
	}

}

siteorigin_widget_register('rr-allies', __FILE__, 'SO_RGNRFS_ALLIES');
