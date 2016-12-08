<?php

/*
Widget Name: Inked Slider
Description: A most basic image slider to leave a great impression.
Author: wpinked
Author URI: http://widgets.wpinked.com
*/

class Inked_Slider_SO_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(

			'ink-slider',

			__( 'Inked Slider', 'wpinked-widgets' ),

			array(
				'description' => __( 'A most basic image slider to leave a great impression.', 'wpinked-widgets' ),
				'help'        => 'http://widgets.wpinked.com/documentation/slider-widget/'
			),

			array(
			),

			array(

				'admin'      => array(
					'type'        => 'text',
					'label'       => __( 'Admin Label', 'wpinked-widgets' )
				),

				'slides'                => array(
					'type'                  => 'repeater',
					'label'                 => __( 'Slides' , 'wpinked-widgets' ),
					'item_name'             => __( 'Slide', 'wpinked-widgets' ),
					'item_label'            => array(
						'selector'             => "[id*='title']",
						'update_event'         => 'change',
						'value_method'         => 'val'
					),
					'fields'                => array(

						'name'                => array(
							'type'                => 'text',
							'label'               => __( 'Name', 'wpinked-widgets' ),
							'default'             => ''
						),

						'image'                => array(
							'type'                => 'media',
							'fallback'            => true,
							'label'               => __( 'Image', 'wpinked-widgets' ),
							'default'             => '',
							'library'             => 'image',
						),

					)
				),

				'settings'      => array(
					'type'        => 'section',
					'label'       => __( 'Settings' , 'wpinked-widgets' ),
					'hide'        => true,
					'fields'      => array(

						'adaptive'           => array(
							'type'                => 'checkbox',
							'default'             => false,
							'label'               => __( 'Enable Adaptive Height', 'wpinked-widgets' ),
						),

						'autoplay'           => array(
							'type'                => 'checkbox',
							'default'             => false,
							'label'               => __( 'Enable Autoplay', 'wpinked-widgets' ),
						),

						'autoplay-speed'             => array(
							'type'             => 'number',
							'label'            => __( 'Autoplay Speed', 'wpinked-widgets' ),
							'default'          => '3000',
							'description'      => __( 'Value in milliseconds.', 'wpinked-widgets' ),
						),

						'autoplay-focus'           => array(
							'type'                => 'checkbox',
							'default'             => true,
							'label'               => __( 'Pause Autoplay on Focus', 'wpinked-widgets' ),
						),

						'autoplay-hover'           => array(
							'type'                => 'checkbox',
							'default'             => true,
							'label'               => __( 'Pause Autoplay on Hover', 'wpinked-widgets' ),
						),

						'arrows'           => array(
							'type'                => 'checkbox',
							'default'             => true,
							'label'               => __( 'Enable Arrow Navigation', 'wpinked-widgets' ),
						),

						'arrows-hover'           => array(
							'type'                => 'checkbox',
							'default'             => false,
							'label'               => __( 'Show arrows only on hover', 'wpinked-widgets' ),
						),

						'prev-arrow'     => array(
							'type'      => 'icon',
							'label'     => __( 'Previous Arrow', 'wpinked-widgets' ),
						),

						'next-arrow'     => array(
							'type'      => 'icon',
							'label'     => __( 'Next Arrow', 'wpinked-widgets' ),
						),

						'dots'           => array(
							'type'                => 'checkbox',
							'default'             => false,
							'label'               => __( 'Enable Dots Navigation', 'wpinked-widgets' ),
						),

						'dots-hover'           => array(
							'type'                => 'checkbox',
							'default'             => false,
							'label'               => __( 'Pause Autoplay on Dots Hover', 'wpinked-widgets' ),
						),

						'fade'           => array(
							'type'                => 'checkbox',
							'default'             => false,
							'label'               => __( 'Enable Fade Transitions', 'wpinked-widgets' ),
						),

						'infinite'           => array(
							'type'                => 'checkbox',
							'default'             => true,
							'label'               => __( 'Enable Infinite Loop', 'wpinked-widgets' ),
						),

					)
				),

				'styling'      => array(
					'type'        => 'section',
					'label'       => __( 'Styling' , 'wpinked-widgets' ),
					'hide'        => true,
					'fields'      => array(

						'icon-color' => array(
							'type'      => 'color',
							'label'     => __( 'Icon Color', 'wpinked-widgets' ),
							'default'   => '#fff'
						),

						'icon-size' => array(
							'type' => 'measurement',
							'label' => __( 'Icon Size', 'wpinked-widgets'),
							'default' => '25px'
						),

						'icon-bg' => array(
							'type'      => 'color',
							'label'     => __( 'Icon Background', 'wpinked-widgets' ),
							'default'   => '#333'
						),

						'icon-hover'           => array(
							'type'                => 'checkbox',
							'default'             => false,
							'label'               => __( 'Display icons only on slider hover', 'wpinked-widgets' ),
						),

						'dot-color' => array(
							'type'      => 'color',
							'label'     => __( 'Dot Color', 'wpinked-widgets' ),
							'default'   => '#333'
						),

						'dot-size' => array(
							'type' => 'measurement',
							'label' => __( 'Dot Size', 'wpinked-widgets'),
							'default' => '18px'
						),

						'dot-position'      => array(
							'type'      => 'select',
							'label'     => __( 'Dot position', 'wpinked-widgets' ),
							'default'   => 'below',
							'options'   => array(
								'below'  => __( 'Below Slider', 'wpinked-widgets' ),
								'bottom'     => __( 'Bottom of Slider', 'wpinked-widgets' ),
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
		return 'slider';
	}

	function get_style_name( $instance ) {
		return 'slider';
	}

	function initialize() {

		$this->register_frontend_scripts(
			array(
				array( 'iw-slider-js', plugin_dir_url(__FILE__) . 'js/slider' . INKED_JS_SUFFIX . '.js', array( 'iw-slick-js' ), INKED_SO_VER, true )
			)
		);

		$this->register_frontend_styles(
			array(
				array( 'iw-slider-css', plugin_dir_url(__FILE__) . 'css/slider.css', array( 'iw-slick' ), INKED_SO_VER )
			)
		);

	}

	function get_less_variables( $instance ) {

		if( empty( $instance ) ) return array();

		return array(
			'icon-color' => $instance['styling']['icon-color'],
			'icon-size' => $instance['styling']['icon-size'],
			'icon-bg' => $instance['styling']['icon-bg'],
			'icon-hover' => $instance['styling']['icon-hover'],
			'dot-color' => $instance['styling']['dot-color'],
			'dot-size' => $instance['styling']['dot-size'],
			'dot-position' => $instance['styling']['dot-position'],
		);

	}

}

siteorigin_widget_register( 'ink-slider', __FILE__, 'Inked_Slider_SO_Widget' );
