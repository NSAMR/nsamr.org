<?php

/*
Widget Name: Inked Video
Description: Play self or externally hosted videos.
Author: wpinked
Author URI: http://widgets.wpinked.com
*/

class Inked_Video_SO_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(

			'ink-video',

			__( 'Inked Video', 'wpinked-widgets' ),

			array(
				'description' => __( 'Play self or externally hosted videos.', 'wpinked-widgets' ),
				'help' => 'http://widgets.wpinked.com/documentation/video-widget/'
			),

			array(
			),

			array(

				'admin'                  => array(
					'type'                  => 'text',
					'label'                 => __( 'Admin Label', 'wpinked-widgets' ),
					'default'               => ''
				),

				'video'                  => array(
					'type'                  => 'section',
					'label'                 => __( 'Video' , 'wpinked-widgets' ),
					'hide'                  => true,
					'fields'                => array(

						'type'                 => array(
							'type'                => 'select',
							'label'               => __( 'Video Type', 'wpinked-widgets' ),
							'default'             => 'oembed',
							'options'             => array(
								'hosted'             => __( 'Self Hosted', 'wpinked-widgets' ),
								'oembed'             => __( 'oEmbed', 'wpinked-widgets' ),
							),
							'state_emitter'       => array(
								'callback'           => 'select',
								'args'               => array( 'video_type' )
							)
						),
						'hosted'               => array(
							'type'                => 'media',
							'fallback'            => true,
							'label'               => __( 'Video File', 'wpinked-widgets' ),
							'default'             => '',
							'library'             => 'video',
							'state_handler'       => array(
								'video_type[hosted]' => array( 'show' ),
								'video_type[oembed]' => array( 'hide' ),
							)
						),

						'image'                => array(
							'type'                => 'media',
							'fallback'            => true,
							'label'               => __( 'Cover Image', 'wpinked-widgets' ),
							'default'             => '',
							'library'             => 'image',
							'state_handler'       => array(
								'video_type[hosted]' => array( 'show' ),
								'video_type[oembed]' => array( 'hide' ),
							)
						),

						'oembed'               => array(
							'type'                => 'text',
							'sanitize'            => 'url',
							'label'               => __( 'oEmbed Video URL', 'wpinked-widgets' ),
							'state_handler'       => array(
								'video_type[hosted]' => array( 'hide' ),
								'video_type[oembed]' => array( 'show' ),
							)
						),

						'controls'             => array(
							'type'                => 'select',
							'label'               => __( 'Controls Theme', 'wpinked-widgets' ),
							'default'             => 'iw-text-center',
							'options'             => array(
								'iw-so-player-light' => __( 'Light', 'wpinked-widgets' ),
								'iw-so-player-dark'  => __( 'Dark', 'wpinked-widgets' )
							),
							'state_handler'       => array(
								'video_type[hosted]' => array( 'show' ),
								'video_type[oembed]' => array( 'hide' ),
							)
						),

						'background'           => array(
							'type'          => 'color',
							'label'         => __( 'Controller Background Color', 'wpinked-widgets' ),
							'default'       => '',
							'state_handler' => array(
								'video_type[hosted]' => array( 'show' ),
								'video_type[oembed]' => array( 'hide' ),
							),
							'description'         => __( 'Leave blank for a transparent background.', 'wpinked-widgets' ),
						),

						'bg-opacity'        => array(
							'type'          => 'slider',
							'label'         => __( 'Controller Background Opacity', 'wpinked-widgets' ),
							'default'       => 0,
							'min'           => 0,
							'max'           => 100,
							'integer'       => true,
							'state_handler' => array(
								'video_type[hosted]' => array( 'show' ),
								'video_type[oembed]' => array( 'hide' ),
							)
						),


					),
				),
			),

			plugin_dir_path(__FILE__)
		);
	}

	function get_template_name( $instance ) {
		return 'video';
	}

	function get_style_name( $instance ) {
		if ( $instance['video']['type'] == 'hosted' ):
			return 'video';
		endif;
	}

	function enqueue_frontend_scripts( $instance ) {

		if ( $instance['video']['type'] == 'hosted' ) {

			wp_enqueue_style( 'iw-video-hosted-css', plugin_dir_url(__FILE__) . 'css/video-hosted.css', array(), INKED_SO_VER );

		} elseif ( $instance['video']['type'] == 'oembed' ) {

			wp_enqueue_style( 'iw-video-oembed-css', plugin_dir_url(__FILE__) . 'css/video-oembed.css', array(), INKED_SO_VER );

		}

		parent::enqueue_frontend_scripts( $instance );
	}

	function get_less_variables($instance) {

		if( empty( $instance ) ) return array();

		return array(
			'bg'    => $instance['video']['background'],
			'bg-op' => $instance['video']['bg-opacity'],
		);

	}

}

siteorigin_widget_register( 'ink-video', __FILE__, 'Inked_Video_SO_Widget' );
