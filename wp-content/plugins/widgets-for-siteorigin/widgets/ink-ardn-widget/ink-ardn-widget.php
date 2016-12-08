<?php

/*
Widget Name: Inked Accordion
Description: Expand and collapse content that is broken into logical sections.
Author: wpinked
Author URI: http://widgets.wpinked.com
*/

class Inked_Accordion_SO_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(

			'ink-accordion',

			__( 'Inked Accordion', 'wpinked-widgets' ),

			array(
				'description' => __( 'Expand and collapse content that is broken into logical sections.', 'wpinked-widgets' ),
				'help'        => 'http://widgets.wpinked.com/documentation/accordion-widget/'
			),

			array(
			),

			array(

				'admin'                  => array(
					'type'                  => 'text',
					'label'                 => __( 'Admin Label', 'wpinked-widgets' ),
					'default'               => ''
				),

				'settings'               => array(
					'type'                  => 'section',
					'label'                 => __( 'Settings' , 'wpinked-widgets' ),
					'hide'                  => true,
					'fields'                => array(

						'id'                   => array(
							'type'                => 'text',
							'label'               => __( 'ID', 'wpinked-widgets' ),
							'description'         => __( 'Should be unique on the page. Must begin with alphabets[A-Za-z]. Should not contain spaces.', 'wpinked-widgets' ),
							'default'             => ''
						),

						'expand'               => array(
							'type'                => 'checkbox',
							'label'               => __( 'Open multiple toggles simultaneously?', 'wpinked-widgets' ),
							'default'             => false
						),

						'toggleable'           => array(
							'type'                => 'checkbox',
							'label'               => __( 'Close toggle only if another is open ?', 'wpinked-widgets' ),
							'default'             => false
						),

						'icon-open'            => array(
							'type'                => 'icon',
							'label'               => __( 'Closed Toggle Icon', 'wpinked-widgets' ),
						),

						'icon-close'           => array(
							'type'                => 'icon',
							'label'               => __( 'Open Toggle Icon.', 'wpinked-widgets' ),
						),

					),
				),

				'toggles'                => array(
					'type'                  => 'repeater',
					'label'                 => __( 'Toggles' , 'wpinked-widgets' ),
					'item_name'             => __( 'Toggle', 'wpinked-widgets' ),
					'item_label'            => array(
						'selector'             => "[id*='title']",
						'update_event'         => 'change',
						'value_method'         => 'val'
					),
					'fields'                => array(

						'title'                => array(
							'type'                => 'text',
							'label'               => __( 'Title', 'wpinked-widgets' ),
							'default'             => ''
						),

						'active'               => array(
							'type'                => 'checkbox',
							'label'               => __( 'Open by default ?', 'wpinked-widgets' ),
							'default'             => false,
						),

						'content'              => array(
							'type'                => 'tinymce',
							'label'               => __( 'Content', 'wpinked-widgets' ),
							'default'             => '',
							'rows'                => 10,
							'default_editor'      => 'tinymce',
							'button_filters'      => array(
								'mce_buttons'        => array( $this, 'filter_mce_buttons' ),
								'mce_buttons_2'      => array( $this, 'filter_mce_buttons_2' ),
								'mce_buttons_3'      => array( $this, 'filter_mce_buttons_3' ),
								'mce_buttons_4'      => array( $this, 'filter_mce_buttons_5' ),
								'quicktags_settings' => array( $this, 'filter_quicktags_settings' ),
							),
						)

					)
				),

				'styling'                => array(
					'type'                  => 'section',
					'label'                 => __( 'Styling' , 'wpinked-widgets' ),
					'hide'                  => true,
					'fields'                => array(

						'icon'                 => array(
							'type'                => 'select',
							'label'               => __( 'Icon Location', 'wpinked-widgets' ),
							'default'             => 'right',
							'options'             => array(
								'left'               => __( 'Left', 'wpinked-widgets' ),
								'right'              => __( 'Right', 'wpinked-widgets' )
							)
						),

						'text'                 => array(
							'type'                => 'select',
							'label'               => __( 'Text Alignment', 'wpinked-widgets' ),
							'default'             => 'iw-text-left',
							'options'             => array(
								'iw-text-left'       => __( 'Left', 'wpinked-widgets' ),
								'iw-text-center'     => __( 'Center', 'wpinked-widgets' ),
								'iw-text-right'      => __( 'Right', 'wpinked-widgets' ),
							)
						),

						'gap'                  => array(
							'type'                => 'checkbox',
							'label'               => __( 'Gap between toggles?', 'wpinked-widgets' ),
							'default'             => true
						),

						'title-bg'             => array(
							'type'                => 'color',
							'label'               => __( 'Title Background Color', 'wpinked-widgets' ),
							'default'             => ''
						),

						'title-h-bg'           => array(
							'type'                => 'color',
							'label'               => __( 'Title Background Hover Color', 'wpinked-widgets' ),
							'default'             => ''
						),

						'title'                => array(
							'type'                => 'color',
							'label'               => __( 'Title Color', 'wpinked-widgets' ),
							'default'             => ''
						),

						'title-h'              => array(
							'type'                => 'color',
							'label'               => __( 'Title Hover Color', 'wpinked-widgets' ),
							'default'             => ''
						),

						'icon-open'            => array(
							'type'                => 'color',
							'label'               => __( 'Icon Open Color', 'wpinked-widgets' ),
							'default'             => ''
						),

						'icon-close'           => array(
							'type'                => 'color',
							'label'               => __( 'Icon Close Color', 'wpinked-widgets' ),
							'default'             => ''
						),

						'content-bg'           => array(
							'type'                => 'color',
							'label'               => __( 'Content Background Color', 'wpinked-widgets' ),
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
		return 'accordion';
	}

	function get_style_name($instance) {
		return 'accordion';
	}

	function initialize() {

		$this->register_frontend_scripts(
			array(
				array( 'iw-accordion-js', plugin_dir_url(__FILE__) . 'js/accordion' . INKED_JS_SUFFIX . '.js', array( 'jquery' ), INKED_SO_VER )
			)
		);

		$this->register_frontend_styles(
			array(
				array( 'iw-accordion-css', plugin_dir_url(__FILE__) . 'css/accordion.css', array(), INKED_SO_VER )
			)
		);

	}

	function get_less_variables($instance) {
		if( empty( $instance ) ) return array();

		return array(
			'gap'        => $instance['styling']['gap'],
			'icon'       => $instance['styling']['icon'],
			'title'      => $instance['styling']['title'],
			'title-bg'   => $instance['styling']['title-bg'],
			'title-h'    => $instance['styling']['title-h'],
			'title-h-bg' => $instance['styling']['title-h-bg'],
			'cont-bg'    => $instance['styling']['content-bg'],
			'icon-open'  => $instance['styling']['icon-open'],
			'icon-close' => $instance['styling']['icon-close'],
		);
	}

}

siteorigin_widget_register( 'ink-accordion', __FILE__, 'Inked_Accordion_SO_Widget' );
