<?php

/*
Widget Name: Inked Testimonial
Description: Highlight what your customers think of you.
Author: wpinked
Author URI: http://widgets.wpinked.com
*/

class Inked_Testimonial_SO_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(

			'ink-testimonial',

			__( 'Inked Testimonial', 'wpinked-widgets' ),

			array(
				'description' => __( 'Highlight what your customers think of you.', 'wpinked-widgets' ),
				'help' => 'http://widgets.wpinked.com/documentation/testimonial-widget/'
			),

			array(
			),

			array(

				'name' => array(
					'type' => 'text',
					'label' => __( 'Name', 'wpinked-widgets' ),
					'default' => '',
					'description' => __( 'Name of the testimonial author.', 'wpinked-widgets' ),
				),

				'testimonial' => array(
					'type' => 'section',
					'label' => __( 'Testimonial' , 'wpinked-widgets' ),
					'hide' => true,
					'fields' => array(

						'image' => array(
							'type' => 'media',
							'label' => __( 'Image', 'wpinked-widgets' ),
							'choose' => __( 'Choose image', 'wpinked-widgets' ),
							'update' => __( 'Set image', 'wpinked-widgets' ),
							'library' => 'image',
							'fallback' => false
						),

						'company' => array(
							'type' => 'text',
							'label' => __( 'Company', 'wpinked-widgets' ),
							'default' => ''
						),

						'link' => array(
							'type' => 'link',
							'label' => __( 'Company Link', 'wpinked-widgets' ),
							'default' => ''
						),

						'target' => array(
							'type' => 'select',
							'label' => __( 'Open link in', 'wpinked-widgets' ),
							'default' => '_blank',
							'options' => array(
								'_self' => __( 'Same Window', 'wpinked-widgets' ),
								'_blank' => __( 'New Window', 'wpinked-widgets' )
							)
						),

						'content' => array(
							'type' => 'tinymce',
							'label' => __( 'Content', 'wpinked-widgets' ),
							'default' => '',
							'rows' => 5,
							'default_editor' => 'tinymce',
							'button_filters' => array(
								'mce_buttons' => array( $this, 'filter_mce_buttons' ),
								'mce_buttons_2' => array( $this, 'filter_mce_buttons_2' ),
								'mce_buttons_3' => array( $this, 'filter_mce_buttons_3' ),
								'mce_buttons_4' => array( $this, 'filter_mce_buttons_5' ),
								'quicktags_settings' => array( $this, 'filter_quicktags_settings' ),
							),
							'description' => __( 'Change the color of the text in the editor.', 'wpinked-widgets' ),
						)

					)
				),

				'styling' => array(
					'type' => 'section',
					'label' => __( 'Styling' , 'wpinked-widgets' ),
					'hide' => true,
					'fields' => array(

						'design' => array(
							'type' => 'select',
							'label' => __( 'Design', 'wpinked-widgets' ),
							'default' => 'above',
							'options' => array(
								'above' => __( 'Image Above', 'wpinked-widgets' ),
								'below' => __( 'Image Below', 'wpinked-widgets' ),
								'left' => __( 'Image Left', 'wpinked-widgets' ),
								'right' => __( 'Image Right', 'wpinked-widgets' )
							)
						),

						'img-radius' => array(
							'type' => 'select',
							'label' => __( 'Image Shape', 'wpinked-widgets' ),
							'default' => '0',
							'options' => array(
								'0' => __( 'Square', 'wpinked-widgets' ),
								'5%' => __( 'Curved', 'wpinked-widgets' ),
								'50%' => __( 'Round', 'wpinked-widgets' )
							)
						),

						'text' => array(
							'type' => 'select',
							'label' => __( 'Text Alignment', 'wpinked-widgets' ),
							'default' => 'iw-text-left',
							'options' => array(
								'iw-text-left' => __( 'Left', 'wpinked-widgets' ),
								'iw-text-center' => __( 'Center', 'wpinked-widgets' ),
								'iw-text-right' => __( 'Right', 'wpinked-widgets' ),
							)
						),

						'background' => array(
							'type' => 'color',
							'label' => __( 'Background Color', 'wpinked-widgets' ),
							'default' => ''
						),

						'name' => array(
							'type' => 'color',
							'label' => __( 'Name Color', 'wpinked-widgets' ),
							'default' => ''
						),

						'company' => array(
							'type' => 'color',
							'label' => __( 'Company Color', 'wpinked-widgets' ),
							'default' => ''
						)

					)
				),
			),

			plugin_dir_path(__FILE__)
		);
	}

	function get_template_name($instance) {
		return 'testimonial';
	}

	function get_style_name($instance) {
		return 'testimonial';
	}

	function initialize() {

		$this->register_frontend_styles(
			array(
				array( 'iw-testimonial-css', plugin_dir_url(__FILE__) . 'css/testimonial.css', array(), INKED_SO_VER )
			)
		);

	}

	function get_less_variables($instance) {
		if( empty( $instance ) ) return array();

		return array(
			'design' => $instance['styling']['design'],
			'bg' => $instance['styling']['background'],
			'img-r' => $instance['styling']['img-radius'],
			'name' => $instance['styling']['name'],
			'company' => $instance['styling']['company'],
		);
	}

}

siteorigin_widget_register( 'ink-testimonial', __FILE__, 'Inked_Testimonial_SO_Widget' );
