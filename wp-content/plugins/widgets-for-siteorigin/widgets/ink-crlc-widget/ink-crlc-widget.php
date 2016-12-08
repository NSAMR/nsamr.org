<?php

/*
Widget Name: Inked Circle Counter
Description: Animated circles to display your stats.
Author: wpinked
Author URI: http://widgets.wpinked.com
*/

class Inked_Circle_Counter_SO_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(

			'ink-circle-count',

			__( 'Inked Circle Counter', 'wpinked-widgets' ),

			array(
				'description' => __( 'Animated circles to display your stats.', 'wpinked-widgets' ),
				'help'        => 'http://widgets.wpinked.com/documentation/circle-counter-widget/'
			),

			array(
			),

			array(

				'admin'               => array(
					'type'               => 'text',
					'label'              => __( 'Admin Label', 'wpinked-widgets' ),
					'default'            => ''
				),

				'circle'              => array(
					'type'               => 'section',
					'label'              => __( 'Circle Settings' , 'wpinked-widgets' ),
					'hide'               => true,
					'fields'             => array(

						'title'             => array(
							'type'             => 'text',
							'label'            => __( 'Title', 'wpinked-widgets' ),
							'default'          => ''
						),

						'title-pos'         => array(
							'type'             => 'select',
							'label'            => __( 'Title Position', 'wpinked-widgets' ),
							'default'          => 'above',
							'options'          => array(
								'above'           => __( 'Above', 'wpinked-widgets' ),
								'below'           => __( 'Below', 'wpinked-widgets' )
							),
						),

						'percent'           => array(
							'type'             => 'slider',
							'label'            => __( 'Percentage', 'wpinked-widgets' ),
							'default'          => 50,
							'min'              => 0,
							'max'              => 100,
							'integer'          => true
						),

						'percent-show'      => array(
							'type'             => 'checkbox',
							'label'            => __( 'Show Percentage ?', 'wpinked-widgets' ),
							'default'          => true
						),

						'percent-prefix'    => array(
							'type'             => 'text',
							'label'            => __( 'Percentage Prefix', 'wpinked-widgets' ),
							'default'          => ''
						),

						'percent-suffix'    => array(
							'type'             => 'text',
							'label'            => __( 'Percentage Suffix', 'wpinked-widgets' ),
							'default'          => ''
						),

					)
				),

				'styling'             => array(
					'type'               => 'section',
					'label'              => __( 'Styling' , 'wpinked-widgets' ),
					'hide'               => true,
					'fields'             => array(

						'circle-animation'  => array(
							'type'             => 'checkbox',
							'label'            => __( 'Use circle animations?', 'wpinked-widgets' ),
							'default'          => true
						),

						'title'             => array(
							'type'             => 'color',
							'label'            => __( 'Title Color', 'wpinked-widgets' ),
							'default'          => ''
						),

						'percent'           => array(
							'type'             => 'color',
							'label'            => __( 'Percentage Color', 'wpinked-widgets' ),
							'default'          => ''
						),

						'percent-animation' => array(
							'type'             => 'checkbox',
							'label'            => __( 'Use percentage animations?', 'wpinked-widgets' ),
							'default'          => true
						),

						'percent-size'      => array(
							'type'             => 'text',
							'label'            => __( 'Percentage Size', 'wpinked-widgets' ),
							'default'          => '',
							'description'      => __( 'Please specify units, eg: px, em, rem, ...', 'wpinked-widgets' ),
						),

						'bar'               => array(
							'type'             => 'color',
							'label'            => __( 'Circle Color', 'wpinked-widgets' ),
							'default'          => ''
						),

						'track'             => array(
							'type'             => 'color',
							'label'            => __( 'Circle Background Color', 'wpinked-widgets' ),
							'default'          => ''
						),

						'shape'             => array(
							'type'             => 'select',
							'label'            => __( 'Circle Shape', 'wpinked-widgets' ),
							'default'          => 'butt',
							'options'          => array(
								'butt'            => __( 'Butt', 'wpinked-widgets' ),
								'round'           => __( 'Round', 'wpinked-widgets' ),
								'square'          => __( 'Square', 'wpinked-widgets' ),
							),
						),

						'width'             => array(
							'type'             => 'number',
							'label'            => __( 'Circle Width', 'wpinked-widgets' ),
							'default'          => '3',
							'description'      => __( 'Value in px.', 'wpinked-widgets' ),
						),

						'size'              => array(
							'type'             => 'number',
							'label'            => __( 'Circle Size', 'wpinked-widgets' ),
							'default'          => '200',
							'description'      => __( 'Value in px.', 'wpinked-widgets' ),
						),

					)
				),
			),

			//The $base_folder path string.
			plugin_dir_path(__FILE__)
		);
	}

	function get_template_name( $instance ) {
		return 'circle';
	}

	function get_style_name( $instance ) {
		return 'circle';
	}

	function initialize() {

		$this->register_frontend_scripts(
			array(
				array( 'iw-circle-counter-js', plugin_dir_url(__FILE__) . 'js/circle-counter' . INKED_JS_SUFFIX . '.js', array( 'iw-countto-js', 'iw-waypoints-js', 'iw-easypie-js' ), INKED_SO_VER, true )
			)
		);

	}

	function get_less_variables( $instance ) {

		if( empty( $instance ) ) return array();

		return array(
			'title'    => $instance['styling']['title'],
			'percent'  => $instance['styling']['percent'],
			'per-size' => $instance['styling']['percent-size'],
			'size'     => $instance['styling']['size'],
		);

	}

}

siteorigin_widget_register( 'ink-circle-count', __FILE__, 'Inked_Circle_Counter_SO_Widget' );
