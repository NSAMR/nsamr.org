<?php

/*
Widget Name: Inked Person
Description: Getting to know you better.
Author: wpinked
Author URI: http://widgets.wpinked.com
*/

class Inked_Person_SO_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(

			'ink-person',

			__( 'Inked Person', 'wpinked-widgets' ),

			array(
				'description' => __( 'Getting to know you better.', 'wpinked-widgets' ),
				'help'        => 'http://widgets.wpinked.com/documentation/person-widget/'
			),

			array(
			),

			array(

				'name'               => array(
					'type'              => 'text',
					'label'             => __( 'Name', 'wpinked-widgets' ),
					'default'           => ''
				),

				'person'             => array(
					'type'              => 'section',
					'label'             => __( 'Person' , 'wpinked-widgets' ),
					'hide'              => true,
					'fields'            => array(

						'image'            => array(
							'type'            => 'media',
							'label'           => __( 'Image', 'wpinked-widgets' ),
							'choose'          => __( 'Choose image', 'wpinked-widgets' ),
							'update'          => __( 'Set image', 'wpinked-widgets' ),
							'library'         => 'image',
							'fallback'        => false
						),

						'designation'      => array(
							'type'            => 'text',
							'label'           => __( 'Designation', 'wpinked-widgets' ),
							'default'         => ''
						),

						'about'            => array(
							'type'            => 'textarea',
							'label'           => __( 'About', 'wpinked-widgets' ),
							'rows'            => 5
						)

					)
				),

				'social'             => array(
					'type'              => 'section',
					'label'             => __( 'Social' , 'wpinked-widgets' ),
					'hide'              => true,
					'fields'            => array(

						'target'           => array(
							'type'            => 'select',
							'label'           => __( 'Open Link in', 'wpinked-widgets' ),
							'default'         => '_blank',
							'options'         => array(
								'_self'          => __( 'Same Window', 'wpinked-widgets' ),
								'_blank'         => __( 'New Window', 'wpinked-widgets' )
							)
						),

						'profiles'         => array(
							'type'            => 'repeater',
							'label'           => __( 'Profiles' , 'wpinked-widgets' ),
							'item_name'       => __( 'Profile', 'wpinked-widgets' ),
							'item_label'      => array(
								'selector'       => "[id*='repeat_text']",
								'update_event'   => 'change',
								'value_method'   => 'val'
							),
							'fields'          => array(

								'link'           => array(
									'type'          => 'link',
									'label'         => __( 'Link', 'wpinked-widgets' ),
									'default'       => ''
								),

								'icon'           => array(
									'type'          => 'icon',
									'label'         => __( 'Icon', 'wpinked-widgets' ),
								),

							)
						)

					)
				),

				'styling'            => array(
					'type'              => 'section',
					'label'             => __( 'Styling' , 'wpinked-widgets' ),
					'hide'              => true,
					'fields'            => array(

						'design'           => array(
							'type'            => 'select',
							'label'           => __( 'Design', 'wpinked-widgets' ),
							'default'         => 'basic',
							'options'         => array(
								'basic'          => __( 'Basic', 'wpinked-widgets' ),
								'icons'          => __( 'Icons over image', 'wpinked-widgets' ),
								'about'          => __( 'About over image', 'wpinked-widgets' )
							)
						),

						'img-width'              => array(
							'type'                   => 'checkbox',
							'label'                  => __( 'Set image width to 100%?', 'wpinked-widgets' ),
							'default'                => true,
						),

						'img-radius'       => array(
							'type'            => 'select',
							'label'           => __( 'Image Corners', 'wpinked-widgets' ),
							'default'         => '0',
							'options'         => array(
								'0'              => __( 'Sharp', 'wpinked-widgets' ),
								'3%'             => __( 'Slightly curved', 'wpinked-widgets' ),
								'12%'            => __( 'Highly curved', 'wpinked-widgets' ),
								'50%'            => __( 'Circle', 'wpinked-widgets' ),
							)
						),

						'img-hover'        => array(
							'type'            => 'color',
							'label'           => __( 'Image Hover Overlay Color', 'wpinked-widgets' ),
							'default'         => ''
						),

						'img-hover-op'     => array(
							'type'            => 'slider',
							'label'           => __( 'Image Hover Opacity', 'wpinked-widgets' ),
							'default'         => 0,
							'min'             => 0,
							'max'             => 100,
							'integer'         => true
						),

						'icon'             => array(
							'type'            => 'color',
							'label'           => __( 'Icon Color', 'wpinked-widgets' ),
							'default'         => ''
						),

						'icon-hover'       => array(
							'type'            => 'color',
							'label'           => __( 'Icon Hover Color', 'wpinked-widgets' ),
							'default'         => ''
						),

						'content'          => array(
							'type'            => 'color',
							'label'           => __( 'Content Background Color', 'wpinked-widgets' ),
							'default'         => ''
						),

						'name'             => array(
							'type'            => 'color',
							'label'           => __( 'Name Color', 'wpinked-widgets' ),
							'default'         => ''
						),

						'designation'      => array(
							'type'            => 'color',
							'label'           => __( 'Designation Color', 'wpinked-widgets' ),
							'default'         => ''
						),

						'about'            => array(
							'type'            => 'color',
							'label'           => __( 'About Color', 'wpinked-widgets' ),
							'default'         => ''
						),

						'align'            => array(
							'type'            => 'select',
							'label'           => __( 'Text Alignment', 'wpinked-widgets' ),
							'default'         => 'iw-text-center',
							'options'         => array(
								'iw-text-left'   => __( 'Left', 'wpinked-widgets' ),
								'iw-text-center' => __( 'Center', 'wpinked-widgets' ),
								'iw-text-right'  => __( 'Right', 'wpinked-widgets' ),
							),
						),

					)
				),
			),

			//The $base_folder path string.
			plugin_dir_path(__FILE__)
		);
	}

	function get_template_name($instance) {
		return 'person';
	}

	function get_style_name($instance) {
		return 'person';
	}

	function initialize() {

		$this->register_frontend_styles(
			array(
				array( 'iw-person-css', plugin_dir_url(__FILE__) . 'css/person.css', array(), INKED_SO_VER )
			)
		);

	}

	function get_less_variables($instance) {
		if( empty( $instance ) ) return array();

		return array(
			'img-r'       => $instance['styling']['img-radius'],
			'img-h'       => $instance['styling']['img-hover'],
			'img-h-o'     => $instance['styling']['img-hover-op'],
			'icon-h'      => $instance['styling']['icon-hover'],
			'icon'        => $instance['styling']['icon'],
			'content'     => $instance['styling']['content'],
			'name'        => $instance['styling']['name'],
			'designation' => $instance['styling']['designation'],
			'about'       => $instance['styling']['about'],
		);
	}

}

siteorigin_widget_register( 'ink-person', __FILE__, 'Inked_Person_SO_Widget' );
