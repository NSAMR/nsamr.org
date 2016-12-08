<?php

/*
Widget Name: Inked Alert
Description: Communicate success, warnings, failure or just information.
Author: wpinked
Author URI: http://widgets.wpinked.com
*/

class Inked_Alert_SO_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(

			'ink-alert',

			__( 'Inked Alert', 'wpinked-widgets' ),

			array(
				'description' => __( 'Communicate success, warnings, failure or just information.', 'wpinked-widgets' ),
				'help'        => 'http://widgets.wpinked.com/documentation/alert-widget/'
			),

			array(
			),

			array(

				'message'      => array(
					'type'        => 'text',
					'label'       => __( 'Message', 'wpinked-widgets' ),
					'default'     => 'This is an Alert Message'
				),

				'close'        => array(
					'type'        => 'checkbox',
					'label'       => __( 'Show Close Button ?', 'wpinked-widgets' ),
					'default'     => true
				),

				'icon'         => array(
					'type'        => 'section',
					'label'       => __( 'Icon' , 'wpinked-widgets' ),
					'hide'        => true,
					'fields'      => array(

						'select'     => array(
							'type'      => 'icon',
							'label'     => __( 'Select Icon', 'wpinked-widgets' ),
						),

						'color'      => array(
							'type'      => 'color',
							'label'     => __( 'Icon Color', 'wpinked-widgets' ),
							'default'   => '#fff'
						),

					)
				),

				'styling'      => array(
					'type'        => 'section',
					'label'       => __( 'Styling' , 'wpinked-widgets' ),
					'hide'        => true,
					'fields'      => array(

						'theme'      => array(
							'type'      => 'select',
							'label'     => __( 'Theme', 'wpinked-widgets' ),
							'default'   => 'classic',
							'options'   => array(
								'classic'  => __( 'Classic', 'wpinked-widgets' ),
								'flat'     => __( 'Flat', 'wpinked-widgets' ),
								'outline'  => __( 'Outline', 'wpinked-widgets' ),
								'threed'   => __( '3D', 'wpinked-widgets' ),
								'shadow'   => __( 'Shadow', 'wpinked-widgets' ),
								'modern'   => __( 'Modern', 'wpinked-widgets' ),
							),
						),

						'background' => array(
							'type'      => 'color',
							'label'     => __( 'Background Color', 'wpinked-widgets' ),
							'default'   => '#333'
						),

						'text'       => array(
							'type'      => 'color',
							'label'     => __( 'Text Color', 'wpinked-widgets' ),
							'default'   => '#fff'
						),

						'close'      => array(
							'type'      => 'color',
							'label'     => __( 'Close Color', 'wpinked-widgets' ),
							'default'   => '#fff'
						),

						'corners'    => array(
							'type'      => 'select',
							'label'     => __( 'Corners', 'wpinked-widgets' ),
							'default'   => '0.25em',
							'options'   => array(
								'0em'      => __( 'Sharp', 'wpinked-widgets' ),
								'0.25em'   => __( 'Slightly curved', 'wpinked-widgets' ),
								'0.75em'   => __( 'Highly curved', 'wpinked-widgets' ),
							),
						),

						'size'       => array(
							'type'      => 'select',
							'label'     => __( 'Size', 'wpinked-widgets' ),
							'default'   => 'standard',
							'options'   => array(
								'small'    => __( 'Small', 'wpinked-widgets' ),
								'standard' => __( 'Standard', 'wpinked-widgets' ),
								'large'    => __( 'Large', 'wpinked-widgets' ),
							),
						),

					)
				),
			),

			//The $base_folder path string.
			plugin_dir_path(__FILE__)
		);
	}

	function get_template_name( $instance ) {
		return 'alert';
	}

	function get_style_name( $instance ) {
		return 'alert';
	}

	function initialize() {

		$this->register_frontend_scripts(
			array(
				array( 'iw-alert-js', plugin_dir_url(__FILE__) . 'js/alert' . INKED_JS_SUFFIX . '.js', array( 'jquery' ), INKED_SO_VER, true )
			)
		);

		$this->register_frontend_styles(
			array(
				array( 'iw-alert-css', plugin_dir_url(__FILE__) . 'css/alert.css', array(), INKED_SO_VER )
			)
		);

	}

	function get_less_variables( $instance ) {

		if( empty( $instance ) ) return array();

		return array(
			'size'   => $instance['styling']['size'],
			'radius' => $instance['styling']['corners'],
			'text'   => $instance['styling']['text'],
			'bg'     => $instance['styling']['background'],
			'theme'  => $instance['styling']['theme'],
			'close'  => $instance['styling']['close'],
		);

	}

}

siteorigin_widget_register( 'ink-alert', __FILE__, 'Inked_Alert_SO_Widget' );
