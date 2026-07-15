<?php
/*
	Widget Name: RR Allies
	Description: Regions Refocus Allies Widget.
	Author: Stephen Anil, Sputznik
	Author URI:	https://sputznik.com
*/
class SO_RGNRFS_ALLIES extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'rr-allies',
			__('RR Allies', 'siteorigin-widgets'),
			array(
				'description' => __('Regions Refocus Allies Widget.')
			),
			array(),
			array(
				'rgnrfs_allies_cf' => array(
					'type' 		=> 'checkbox',
					'label' 	=> __( 'Show allies from custom fields ?', 'siteorigin-widgets' ),
					'description' => __( 'Custom field values will only appear on single-events template.', 'siteorigin-widgets' ),
					'default' => false,
					'state_emitter' => array(
						'callback' => 'conditional',
						'args'     => array(
							'rgnrfs_get_allies_cf[show]: val',
							'rgnrfs_get_allies_cf[hide]: !val'
						),
					),
				),
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
					'state_handler' => array(
						'rgnrfs_get_allies_cf[show]'	=> array( 'hide' ),
						'rgnrfs_get_allies_cf[hide]'	=> array( 'show' )
					),
				),
				'allies' => array(
					'type' 	=> 'repeater',
					'label' => __( 'Allies' , 'siteorigin-widgets' ),
					'item_name'  => __( 'Repeater item', 'siteorigin-widgets' ),
					'item_label' => array(
						'selector'     => "[id*='ally_name']",
						'update_event' => 'change',
						'value_method' => 'val'
					),
					'fields' => array(
						'ally_name' => array(
							'type' 			=> 'text',
							'label' 		=> __( 'Ally Name', 'siteorigin-widgets' )
						),
						'ally_url' => array(
							'type' 			=> 'text',
							'label' 		=> __( 'URL', 'siteorigin-widgets' )
						),
						'ally_description' => array(
							'type' => 'textarea',
							'label' => __( 'Ally Description', 'siteorigin-widgets' ),
							'rows' => 10,
							'state_handler' => array(
								'template_style[show_img_desc]' => array('show'),
								'template_style[hide_img_desc]' => array('hide')
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
								'template_style[hide_img_desc]' => array('hide')
							),
						)
					),
					'state_handler' => array(
						'rgnrfs_get_allies_cf[show]' => array( 'hide' ),
						'rgnrfs_get_allies_cf[hide]' => array( 'show' )
					),
				)

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
