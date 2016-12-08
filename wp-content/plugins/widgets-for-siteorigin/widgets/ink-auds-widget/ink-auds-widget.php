<?php

/*
Widget Name: Inked Audio
Description: Play self or externally hosted audios.
Author: wpinked
Author URI: http://widgets.wpinked.com
*/

class Inked_Audio_SO_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(

			'ink-audio',

			__( 'Inked Audio', 'wpinked-widgets' ),

			array(
				'description' => __( 'Play self or externally hosted audios.', 'wpinked-widgets' ),
				'help'        => 'http://widgets.wpinked.com/documentation/audio-widget/'
			),

			array(
			),

			array(

				'admin'                  => array(
					'type'                  => 'text',
					'label'                 => __( 'Admin Label', 'wpinked-widgets' ),
					'default'               => ''
				),

				'audio'                  => array(
					'type'                  => 'section',
					'label'                 => __( 'Audio' , 'wpinked-widgets' ),
					'hide'                  => true,
					'fields'                => array(

						'type'                 => array(
							'type'                => 'select',
							'label'               => __( 'Audio Type', 'wpinked-widgets' ),
							'default'             => 'oembed',
							'options'             => array(
								'hosted'             => __( 'Self Hosted', 'wpinked-widgets' ),
								'oembed'             => __( 'oEmbed', 'wpinked-widgets' ),
							),
							'state_emitter'       => array(
								'callback'           => 'select',
								'args'               => array( 'audio_type' )
							)
						),

						'hosted'               => array(
							'type'                => 'media',
							'fallback'            => true,
							'label'               => __( 'Audio File', 'wpinked-widgets' ),
							'default'             => '',
							'library'             => 'audio',
							'state_handler'       => array(
								'audio_type[hosted]' => array( 'show' ),
								'audio_type[oembed]' => array( 'hide' ),
							)
						),

						'image'                => array(
							'type'                => 'media',
							'fallback'            => true,
							'label'               => __( 'Background Image', 'wpinked-widgets' ),
							'default'             => '',
							'library'             => 'image',
							'state_handler'       => array(
								'audio_type[hosted]' => array( 'show' ),
								'audio_type[oembed]' => array( 'hide' ),
							)
						),

						'oembed'               => array(
							'type'                => 'text',
							'sanitize'            => 'url',
							'label'               => __( 'oEmbed Audio URL', 'wpinked-widgets' ),
							'state_handler'       => array(
								'audio_type[hosted]' => array( 'hide' ),
								'audio_type[oembed]' => array( 'show' ),
							)
						),

						'background'           => array(
							'type'                => 'color',
							'label'               => __( 'Background Color', 'wpinked-widgets' ),
							'default'             => '',
							'state_handler'       => array(
								'audio_type[hosted]' => array( 'show' ),
								'audio_type[oembed]' => array( 'hide' ),
							)
						),

						'bg-opacity'           => array(
							'type'                => 'slider',
							'label'               => __( 'Background Opacity', 'wpinked-widgets' ),
							'default'             => 0,
							'min'                 => 0,
							'max'                 => 100,
							'integer'             => true,
							'state_handler'       => array(
								'audio_type[hosted]' => array( 'show' ),
								'audio_type[oembed]' => array( 'hide' ),
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
								'audio_type[hosted]' => array( 'show' ),
								'audio_type[oembed]' => array( 'hide' ),
							)
						),

						'audio'                => array(
							'type'                => 'text',
							'label'               => __( 'Audio Name', 'wpinked-widgets' ),
							'state_handler'       => array(
								'audio_type[hosted]' => array( 'show' ),
								'audio_type[oembed]' => array( 'hide' ),
							)
						),

						'artist'               => array(
							'type'                => 'text',
							'label'               => __( 'Artist', 'wpinked-widgets' ),
							'state_handler'       => array(
								'audio_type[hosted]' => array( 'show' ),
								'audio_type[oembed]' => array( 'hide' ),
							)
						),

						'album'                => array(
							'type'                => 'text',
							'label'               => __( 'Album', 'wpinked-widgets' ),
							'state_handler'       => array(
								'audio_type[hosted]' => array( 'show' ),
								'audio_type[oembed]' => array( 'hide' ),
							)
						),

						'text'                 => array(
							'type'                => 'color',
							'label'               => __( 'Text Color', 'wpinked-widgets' ),
							'default'             => '',
							'state_handler'       => array(
								'audio_type[hosted]' => array( 'show' ),
								'audio_type[oembed]' => array( 'hide' ),
							)
						),

						'align'                => array(
							'type'                => 'select',
							'label'               => __( 'Text Alignment', 'wpinked-widgets' ),
							'default'             => 'iw-text-center',
							'options'             => array(
								'iw-text-left'       => __( 'Left', 'wpinked-widgets' ),
								'iw-text-center'     => __( 'Center', 'wpinked-widgets' ),
								'iw-text-right'      => __( 'Right', 'wpinked-widgets' ),
							),
							'state_handler'       => array(
								'audio_type[hosted]' => array( 'show' ),
								'audio_type[oembed]' => array( 'hide' ),
							)
						),
					),
				),

			),

			plugin_dir_path(__FILE__)
		);
	}

	function get_template_name( $instance ) {
		return 'audio';
	}

	function get_style_name( $instance ) {
		if ( $instance['audio']['type'] == 'hosted' ):
			return 'audio';
		endif;
	}

	function enqueue_frontend_scripts( $instance ) {

		if ( $instance['audio']['type'] == 'hosted' ) {

			wp_enqueue_style( 'iw-audio-hosted-css', plugin_dir_url(__FILE__) . 'css/audio-hosted.css', array(), INKED_SO_VER );

		} elseif ( $instance['audio']['type'] == 'oembed' ) {

			wp_enqueue_style( 'iw-audio-oembed-css', plugin_dir_url(__FILE__) . 'css/audio-oembed.css', array(), INKED_SO_VER );

		}

		parent::enqueue_frontend_scripts( $instance );
	}

	function get_less_variables( $instance ) {

		if( empty( $instance ) ) return array();

		$bg_img = wp_get_attachment_image_src( $instance['audio']['image'], 'full' );

		return array(
			'bg'    => $instance['audio']['background'],
			'bg-op' => $instance['audio']['bg-opacity'],
			'text'  => $instance['audio']['text'],
		);

	}

}

siteorigin_widget_register( 'ink-audio', __FILE__, 'Inked_Audio_SO_Widget' );
