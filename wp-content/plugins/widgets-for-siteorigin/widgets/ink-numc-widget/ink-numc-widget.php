<?php

/*
Widget Name: Inked Number Counter
Description: Animated numbers to display your stats.
Author: wpinked
Author URI: http://widgets.wpinked.com
*/

class Inked_Number_Counter_SO_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(

			'ink-num-count',

			__( 'Inked Number Counter', 'wpinked-widgets' ),

			array(
				'description' => __( 'Animated numbers to display your stats.', 'wpinked-widgets' ),
				'help'        => 'http://widgets.wpinked.com/documentation/number-counter-widget/'
			),

			array(
			),

			array(

				'admin'          => array(
					'type'          => 'text',
					'label'         => __( 'Admin Label', 'wpinked-widgets' ),
					'default'       => ''
				),

				'number'         => array(
					'type'          => 'section',
					'label'         => __( 'Number Settings' , 'wpinked-widgets' ),
					'hide'          => true,
					'fields'        => array(

						'start'        => array(
							'type'        => 'text',
							'label'       => __( 'Start', 'wpinked-widgets' ),
							'default'     => '0'
						),

						'end'          => array(
							'type'        => 'text',
							'label'       => __( 'End', 'wpinked-widgets' ),
							'default'     => '300'
						),

						'speed'        => array(
							'type'        => 'text',
							'label'       => __( 'Speed', 'wpinked-widgets' ),
							'default'     => '1000',
							'description' => __( 'Number in milliseconds', 'wpinked-widgets' ),
						),

						'prefix'       => array(
							'type'        => 'text',
							'label'       => __( 'Number Prefix', 'wpinked-widgets' ),
							'default'     => ''
						),

						'suffix'       => array(
							'type'        => 'text',
							'label'       => __( 'Number Suffix', 'wpinked-widgets' ),
							'default'     => ''
						),

						'title'        => array(
							'type'        => 'text',
							'label'       => __( 'Title', 'wpinked-widgets' ),
							'default'     => ''
						),

						'title-pos'    => array(
							'type'        => 'select',
							'label'       => __( 'Title Position', 'wpinked-widgets' ),
							'default'     => 'above',
							'options'     => array(
								'above'      => __( 'Above', 'wpinked-widgets' ),
								'below'      => __( 'Below', 'wpinked-widgets' )
							),
						),

					)

				),

				'styling'        => array(
					'type'          => 'section',
					'label'         => __( 'Styling' , 'wpinked-widgets' ),
					'hide'          => true,
					'fields'        => array(

						'title'        => array(
							'type'        => 'color',
							'label'       => __( 'Title Color', 'wpinked-widgets' ),
							'default'     => ''
						),

						'number'       => array(
							'type'        => 'color',
							'label'       => __( 'Number Color', 'wpinked-widgets' ),
							'default'     => ''
						),

						'number-size'  => array(
							'type'        => 'text',
							'label'       => __( 'Number Size', 'wpinked-widgets' ),
							'default'     => '',
							'description' => __( 'Please specify units, eg: px, em, rem, ...', 'wpinked-widgets' ),
						),

					)
				),
			),

			//The $base_folder path string.
			plugin_dir_path(__FILE__)
		);
	}

	function get_template_name( $instance ) {
		return 'number';
	}

	function get_style_name( $instance ) {
		return 'number';
	}

	function initialize() {

		$this->register_frontend_scripts(
			array(
				array( 'iw-num-counter-js', plugin_dir_url(__FILE__) . 'js/number-counter' . INKED_JS_SUFFIX . '.js', array( 'iw-countto-js', 'iw-waypoints-js' ), INKED_SO_VER, true )
			)
		);

	}

	function get_less_variables( $instance ) {

		if( empty( $instance ) ) return array();

		return array(
			'title'    => $instance['styling']['title'],
			't-pos'    => $instance['number']['title-pos'],
			'num'      => $instance['styling']['number'],
			'num-size' => $instance['styling']['number-size'],
		);

	}

}

siteorigin_widget_register( 'ink-num-count', __FILE__, 'Inked_Number_Counter_SO_Widget' );
