<?php

/*
Widget Name: Inked Divider/Gap
Description: Draw seperators or create gaps in your page.
Author: wpinked
Author URI: http://widgets.wpinked.com
*/

class Inked_Divider_SO_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(

			'ink-divider',

			__( 'Inked Divider', 'wpinked-widgets' ),

			array(
				'description' => __( 'Draw seperators or create gaps in your page.', 'wpinked-widgets' ),
				'help'        => 'http://widgets.wpinked.com/documentation/divider-widget/'
			),

			array(
			),

			array(

				'type'            => array(
					'type'           => 'select',
					'label'          => __( 'Type', 'wpinked-widgets' ),
					'default'        => 'none',
					'options'        => array(
						'none'          => __( 'Gap', 'wpinked-widgets' ),
						'solid'         => __( 'Single Line', 'wpinked-widgets' ),
						'double'        => __( 'Double Line', 'wpinked-widgets' ),
						'dotted'        => __( 'Dotted Line', 'wpinked-widgets' ),
						'dashed'        => __( 'Dashed Line', 'wpinked-widgets' )
					)
				),

				'styling'         => array(
					'type'           => 'section',
					'label'          => __( 'Styling' , 'wpinked-widgets' ),
					'hide'           => true,
					'fields'         => array(

						'color'         => array(
							'type'         => 'color',
							'label'        => __( 'Color', 'wpinked-widgets' ),
							'description'  => __( 'Select the color of your divider.', 'wpinked-widgets' ),
							'default'      => '#333'
						),

						'size'          => array(
							'type'         => 'text',
							'label'        => __( 'Thickness', 'wpinked-widgets' ),
							'description'  => __( 'Please specify units, eg: px, em, rem, ...', 'wpinked-widgets' ),
							'default'      => '3px'
						),

						'width'         => array(
							'type'         => 'text',
							'label'        => __( 'Width', 'wpinked-widgets' ),
							'description'  => __( 'Please specify units, eg: px, em, rem, %, ...', 'wpinked-widgets' ),
							'default'      => '100%'
						),

						'margin-top'    => array(
							'type'         => 'text',
							'label'        => __( 'Margin Top', 'wpinked-widgets' ),
							'description'  => __( 'Spacing above the divider. Please specify units, eg: px, em, rem, ...', 'wpinked-widgets' ),
							'default'      => '0'
						),

						'margin-bottom' => array(
							'type'         => 'text',
							'label'        => __( 'Margin Bottom', 'wpinked-widgets' ),
							'description'  => __( 'Spacing below the divider. Please specify units, eg: px, em, rem, ...', 'wpinked-widgets' ),
							'default'      => '0'
						)

					)
				),
			),

			plugin_dir_path(__FILE__)
		);
	}

	function get_template_name( $instance ) {
		return 'divider';
	}

	function get_style_name( $instance ) {
		return 'divider';
	}

	function get_less_variables( $instance ) {
		if( empty( $instance ) ) return array();

		return array(
			'type'  => $instance['type'],
			'color' => $instance['styling']['color'],
			'size'  => $instance['styling']['size'],
			'width' => $instance['styling']['width'],
			'm-top' => $instance['styling']['margin-top'],
			'm-btm' => $instance['styling']['margin-bottom']
		);
	}

}

siteorigin_widget_register( 'ink-divider', __FILE__, 'Inked_Divider_SO_Widget' );
