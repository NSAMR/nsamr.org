<?php

/*
Widget Name: Inked Media Box
Description: Highlight important bits of information.
Author: wpinked
Author URI: http://widgets.wpinked.com
*/

class Inked_Media_Box_SO_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(

			'ink-media-box',

			__( 'Inked Media Box', 'wpinked-widgets' ),

			array(
				'description' => __( 'Highlight important bits of information.', 'wpinked-widgets' ),
				'help'        => 'http://widgets.wpinked.com/documentation/media-box-widget/'
			),

			array(
			),

			array(

				'admin'                  => array(
					'type'                  => 'text',
					'label'                 => __( 'Admin Label', 'wpinked-widgets' ),
					'default'               => ''
				),

				'box'                    => array(
					'type'                  => 'section',
					'label'                 => __( 'Box Settings' , 'wpinked-widgets' ),
					'hide'                  => true,
					'fields'                => array(

						'media'                => array(
							'type'                => 'select',
							'label'               => __( 'Media Type', 'wpinked-widgets' ),
							'default'             => 'image',
							'options'             => array(
								'image'              => __( 'Image', 'wpinked-widgets' ),
								'icon'               => __( 'Icon', 'wpinked-widgets' ),
								'oembed'             => __( 'oEmbed', 'wpinked-widgets' ),
							),
							'state_emitter'       => array(
								'callback'           => 'select',
								'args'               => array( 'media_type' )
							)
						),

						'image'                => array(
							'type'                => 'media',
							'fallback'            => false,
							'label'               => __( 'Image', 'wpinked-widgets' ),
							'default'             => '',
							'library'             => 'image',
							'state_handler'       => array(
								'media_type[image]'  => array( 'show' ),
								'media_type[icon]'   => array( 'hide' ),
								'media_type[oembed]' => array( 'hide' ),
							),
						),

						'icon'                 => array(
							'type'                => 'icon',
							'label'               => __( 'Icon', 'wpinked-widgets' ),
							'state_handler'       => array(
								'media_type[image]'  => array( 'hide' ),
								'media_type[icon]'   => array( 'show' ),
								'media_type[oembed]' => array( 'hide' ),
							),
						),

						'oembed'               => array(
							'type'                => 'text',
							'sanitize'            => 'url',
							'label'               => __( 'oEmbed URL', 'wpinked-widgets' ),
							'state_handler'       => array(
								'media_type[image]'  => array( 'hide' ),
								'media_type[icon]'   => array( 'hide' ),
								'media_type[oembed]' => array( 'show' ),
							)
						),

						'title'                => array(
							'type'                => 'text',
							'label'               => __( 'Title', 'wpinked-widgets' ),
							'default'             => '',
						),

						'content'              => array(
							'type'                => 'textarea',
							'label'               => __( 'Content', 'wpinked-widgets' ),
							'rows'                => 5
						),

						'btn'                  => array(
							'type'                => 'text',
							'label'               => __( 'Button text', 'wpinked-widgets' ),
						),

						'btn-url'              => array(
							'type'                => 'link',
							'label'               => __( 'Destination URL', 'wpinked-widgets' ),
						),

						'btn-window'           => array(
							'type'                => 'checkbox',
							'default'             => false,
							'label'               => __( 'Open in a new window', 'wpinked-widgets' ),
						),

						'btn-id'               => array(
							'type'                => 'text',
							'label'               => __( 'Button ID', 'wpinked-widgets' ),
							'description'         => __( 'An ID attribute allows you to target this button in Javascript.', 'wpinked-widgets' ),
						),

						'btn-title'            => array(
							'type'                => 'text',
							'label'               => __( 'Button Title attribute', 'wpinked-widgets' ),
							'description'         => __( 'Adds a title attribute to the button link.', 'wpinked-widgets' ),
						),

						'btn-onclick'          => array(
							'type'                => 'text',
							'label'               => __( 'Button Onclick', 'wpinked-widgets' ),
							'description'         => __( 'Run this Javascript when the button is clicked. Ideal for tracking.', 'wpinked-widgets' ),
						),

					)

				),

				'styling'                => array(
					'type'                  => 'section',
					'label'                 => __( 'Styling' , 'wpinked-widgets' ),
					'hide'                  => true,
					'fields'                => array(

						'padding-top'          => array(
							'type'                => 'text',
							'label'               => __( 'Padding Top', 'wpinked-widgets' ),
							'default'             => '30px',
							'description'         => __( 'Please specify units, eg: px, em, rem, ...', 'wpinked-widgets' )
						),

						'padding-bottom'       => array(
							'type'                => 'text',
							'label'               => __( 'Padding Bottom', 'wpinked-widgets' ),
							'default'             => '30px',
							'description'         => __( 'Please specify units, eg: px, em, rem, ...', 'wpinked-widgets' )
						),

						'img-shape'            => array(
							'type'                => 'select',
							'label'               => __( 'Image Shape', 'wpinked-widgets' ),
							'default'             => '0',
							'options'             => array(
								'0'                  => __( 'Sharp', 'wpinked-widgets' ),
								'3px'                => __( 'Slight Curve', 'wpinked-widgets' ),
								'10px'               => __( 'High Curve', 'wpinked-widgets' ),
								'50%'                => __( 'Round', 'wpinked-widgets' ),
							),
							'state_handler'       => array(
								'media_type[image]'  => array( 'show' ),
								'media_type[icon]'   => array( 'hide' ),
								'media_type[oembed]' => array( 'hide' ),
							),
						),

						'icon-clr'             => array(
							'type'                => 'color',
							'label'               => __( 'Icon Color', 'wpinked-widgets' ),
							'state_handler'       => array(
								'media_type[image]'  => array( 'hide' ),
								'media_type[icon]'   => array( 'show' ),
								'media_type[oembed]' => array( 'hide' ),
							),
						),

						'icon-size'            => array(
							'type'                => 'text',
							'label'               => __( 'Icon Size', 'wpinked-widgets' ),
							'default'             => '',
							'description'         => __( 'Please specify units, eg: px, em, rem, ...', 'wpinked-widgets' ),
							'state_handler'       => array(
								'media_type[image]'  => array( 'hide' ),
								'media_type[icon]'   => array( 'show' ),
								'media_type[oembed]' => array( 'hide' ),
							),
						),

						'icon-border'          => array(
							'type'                => 'checkbox',
							'label'               => __( 'Show Icon Border ?', 'wpinked-widgets' ),
							'default'             => false,
							'state_handler'       => array(
								'media_type[image]'  => array( 'hide' ),
								'media_type[icon]'   => array( 'show' ),
								'media_type[oembed]' => array( 'hide' ),
							),
						),

						'icon-border-clr'      => array(
							'type'                => 'color',
							'label'               => __( 'Icon Border Color', 'wpinked-widgets' ),
							'default'             => '',
							'state_handler'       => array(
								'media_type[image]'  => array( 'hide' ),
								'media_type[icon]'   => array( 'show' ),
								'media_type[oembed]' => array( 'hide' ),
							),
						),

						'icon-shape'           => array(
							'type'                => 'select',
							'label'               => __( 'Icon Border Shape', 'wpinked-widgets' ),
							'default'             => '0',
							'options'             => array(
								'0'                  => __( 'Sharp', 'wpinked-widgets' ),
								'3px'                => __( 'Slight Curve', 'wpinked-widgets' ),
								'10px'               => __( 'High Curve', 'wpinked-widgets' ),
								'50%'                => __( 'Round', 'wpinked-widgets' ),
							),
							'state_handler'       => array(
								'media_type[image]'  => array( 'hide' ),
								'media_type[icon]'   => array( 'show' ),
								'media_type[oembed]' => array( 'hide' ),
							),
						),

						'title'                => array(
							'type'                => 'color',
							'label'               => __( 'Title Color', 'wpinked-widgets' ),
							'default'             => ''
						),

						'content'              => array(
							'type'                => 'color',
							'label'               => __( 'Content Color', 'wpinked-widgets' ),
							'default'             => ''
						),

						'btn-size'             => array(
							'type'                => 'select',
							'label'               => __( 'Button Size', 'wpinked-widgets' ),
							'default'             => 'default',
							'options'             => array(
								'default'            => __( 'Default', 'wpinked-widgets' ),
								'full'               => __( 'Fullwidth', 'wpinked-widgets' ),
							),
						),

						'btn-theme'            => array(
							'type'                => 'select',
							'label'               => __( 'Button Theme', 'wpinked-widgets' ),
							'default'             => 'classic',
							'options'             => array(
								'classic'            => __( 'Classic', 'wpinked-widgets' ),
								'flat'               => __( 'Flat', 'wpinked-widgets' ),
								'outline'            => __( 'Outline', 'wpinked-widgets' ),
								'threed'             => __( '3D', 'wpinked-widgets' ),
								'shadow'             => __( 'Shadow', 'wpinked-widgets' ),
								'deline'             => __( 'Deline', 'wpinked-widgets' ),
							),
						),

						'btn-clr'              => array(
							'type'                => 'color',
							'label'               => __( 'Button Highlight Color', 'wpinked-widgets' ),
							'description'         => __( 'Typically used as button background.', 'wpinked-widgets' ),
						),

						'btn-base'             => array(
							'type'                => 'color',
							'label'               => __( 'Button Base Color', 'wpinked-widgets' ),
							'description'         => __( 'Typically used as text color.', 'wpinked-widgets' ),
						),

						'btn-hover'            => array(
							'type'                => 'checkbox',
							'default'             => true,
							'label'               => __( 'Use button hover effect ?', 'wpinked-widgets' ),
						),

						'btn-click'            => array(
							'type'                => 'checkbox',
							'default'             => true,
							'label'               => __( 'Use button click effect ?', 'wpinked-widgets' ),
						),

						'btn-corners'          => array(
							'type'                => 'select',
							'label'               => __( 'Button Corners', 'wpinked-widgets' ),
							'default'             => '0.25em',
							'options'             => array(
								'0em'                => __( 'Sharp', 'wpinked-widgets' ),
								'0.25em'             => __( 'Slightly curved', 'wpinked-widgets' ),
								'0.75em'             => __( 'Highly curved', 'wpinked-widgets' ),
								'1.5em'              => __( 'Round', 'wpinked-widgets' ),
							),
						),

						'background'           => array(
							'type'                => 'color',
							'label'               => __( 'Media Box Background Color', 'wpinked-widgets' ),
							'default'             => ''
						),

					)
				),
			),

			//The $base_folder path string.
			plugin_dir_path(__FILE__)
		);
	}

	function get_template_name($instance) {
		return 'media-box';
	}

	function get_style_name($instance) {
		return 'media-box';
	}

	function enqueue_frontend_scripts( $instance ) {

		wp_enqueue_style( 'iw-imgbox', siteorigin_widget_get_plugin_dir_url( 'ink-media-box' ) . 'css/media-box.css', array(), INKED_SO_VER );

		parent::enqueue_frontend_scripts( $instance );
	}

	function get_less_variables($instance) {
		if( empty( $instance ) ) return array();

		return array(
			'img-shape'    => $instance['styling']['img-shape'],
			'icon-bdr'     => $instance['styling']['icon-border'],
			'icon-bdr-clr' => $instance['styling']['icon-border-clr'],
			'icon-shape'   => $instance['styling']['icon-shape'],
			'btn-size'     => $instance['styling']['btn-size'],
			'btn-theme'    => $instance['styling']['btn-theme'],
			'btn-clr'      => $instance['styling']['btn-clr'],
			'btn-base'     => $instance['styling']['btn-base'],
			'btn-crnr'     => $instance['styling']['btn-corners'],
			'pad-top'      => $instance['styling']['padding-top'],
			'pad-btm'      => $instance['styling']['padding-bottom'],
			'title'        => $instance['styling']['title'],
			'content'      => $instance['styling']['content'],
			'bg'           => $instance['styling']['background'],
		);
	}

}

siteorigin_widget_register( 'ink-media-box', __FILE__, 'Inked_Media_Box_SO_Widget' );
