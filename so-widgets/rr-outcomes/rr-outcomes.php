<?php
/*
	Widget Name: RR Outcomes
	Description: Regions Refocus Outcomes Widget.
	Author: Stephen Anil, Sputznik
	Author URI:	https://sputznik.com
*/
class SO_RGNRFS_OUTCOMES extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'rr-outcomes',
			__('RR Outcomes', 'siteorigin-widgets'),
			array(
				'description' => __('Regions Refocus Outcomes Widget.'),
				'help'        => '',
			),
			array(),
			array(
				'template_style' => array(
					'type' 		=> 'select',
					'label' 	=> __( 'Choose a Style', 'siteorigin-widgets' ),
					'options' => array(
						'list' 						=> 'List',
						'grid_three_card' => 'Grid 3 Card'
					),
				),
				'outcomes__in' => array(
					'type'   		 => 'autocomplete',
					'label'  		 => __( 'Search and Select Outcome(s)', 'siteorigin-widgets' ),
					'source'		 => 'posts',
					'post_types' => array('outcomes')
				)
			),
			get_template_directory()."/so-widgets/rr-outcomes"
		);
	}

	function get_template_name($instance) {
		return 'template';
	}

	function get_template_dir($instance) {
		return 'templates';
	}

}

siteorigin_widget_register('rr-outcomes', __FILE__, 'SO_RGNRFS_OUTCOMES');
