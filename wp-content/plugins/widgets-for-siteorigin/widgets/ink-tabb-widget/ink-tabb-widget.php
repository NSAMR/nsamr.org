<?php

/*
Widget Name: Inked Tabs
Description: Organize and navigate multiple documents in a single container.
Author: wpinked
Author URI: http://widgets.wpinked.com
*/

class Inked_Tabs_SO_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(

			'ink-tabs',

			__( 'Inked Tabs', 'wpinked-widgets' ),

			array(
				'description' => __( 'Organize and navigate multiple documents in a single container.', 'wpinked-widgets' ),
				'help'        => 'http://widgets.wpinked.com/documentation/tabs-widget/'
			),

			array(
			),

			array(
				'admin'                  => array(
					'type'                  => 'text',
					'label'                 => __( 'Admin Label', 'wpinked-widgets' ),
					'default'               => ''
				),

				'id'                     => array(
					'type'                  => 'text',
					'label'                 => __( 'ID', 'wpinked-widgets' ),
					'description'           => __( 'Should be unique on the page. Must begin with alphabets[A-Za-z]. Should not contain spaces.', 'wpinked-widgets' ),
					'default'               => ''
				),

				'tabs'                   => array(
					'type'                  => 'repeater',
					'label'                 => __( 'Tabs' , 'wpinked-widgets' ),
					'item_name'             => __( 'Tab', 'wpinked-widgets' ),
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
							'description'         => __( 'Check this for only one of the tabs.', 'wpinked-widgets' ),
						),

						'icon'                 => array(
							'type'                => 'icon',
							'label'               => __( 'Icon', 'wpinked-widgets' ),
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

						'orientation'          => array(
							'type'                => 'select',
							'label'               => __( 'Oritentation', 'wpinked-widgets' ),
							'default'             => 'horizontal',
							'options'             => array(
								'horizontal'         => __( 'Horizontal', 'wpinked-widgets' ),
								'vertical'           => __( 'Vertical', 'wpinked-widgets' )
							)
						),

						'responsive'          => array(
							'type'                => 'select',
							'label'               => __( 'Mobile View', 'wpinked-widgets' ),
							'default'             => 'default',
							'options'             => array(
								'default'            => __( 'Default', 'wpinked-widgets' ),
								'icons'              => __( 'Icons Only', 'wpinked-widgets' ),
								'fullwidth'          => __( 'Fullwidth', 'wpinked-widgets' ),
							)
						),

						'theme'                => array(
							'type'                => 'select',
							'label'               => __( 'Theme', 'wpinked-widgets' ),
							'default'             => 'flat',
							'options'             => array(
								'boxed'              => __( 'Boxed', 'wpinked-widgets' ),
								'flat'               => __( 'Flat', 'wpinked-widgets' ),
								'underline'          => __( 'Underline', 'wpinked-widgets' ),
								'overline'           => __( 'Overline', 'wpinked-widgets' ),
								'minimal'            => __( 'Minimal', 'wpinked-widgets' ),
							)
						),

						'icon'                 => array(
							'type'                => 'select',
							'label'               => __( 'Icon Location', 'wpinked-widgets' ),
							'default'             => 'flat',
							'options'             => array(
								'left'               => __( 'Left', 'wpinked-widgets' ),
								'right'              => __( 'Right', 'wpinked-widgets' ),
								'above'              => __( 'Above', 'wpinked-widgets' )
							)
						),

						'tab'                  => array(
							'type'                => 'color',
							'label'               => __( 'Tab Background Color', 'wpinked-widgets' ),
							'default'             => ''
						),

						'content'              => array(
							'type'                => 'color',
							'label'               => __( 'Content Background Color', 'wpinked-widgets' ),
							'default'             => ''
						),

						'basic'                => array(
							'type'                => 'color',
							'label'               => __( 'Basic Color', 'wpinked-widgets' ),
							'default'             => '',
							'description'         => __( 'Color of the title.', 'wpinked-widgets' ),
						),

						'highlight'            => array(
							'type'                => 'color',
							'label'               => __( 'Highlight Color', 'wpinked-widgets' ),
							'default'             => '',
							'description'         => __( 'Color of title when it is active.', 'wpinked-widgets' ),
						),

					)
				),
			),

			//The $base_folder path string.
			plugin_dir_path(__FILE__)
		);
	}

	function get_template_name($instance) {
		return 'tabs';
	}

	function get_style_name($instance) {
		return 'tabs';
	}

	function initialize() {

		$this->register_frontend_scripts(
			array(
				array( 'iw-tabs-js', plugin_dir_url(__FILE__) . 'js/tabs' . INKED_JS_SUFFIX . '.js', array( 'jquery' ), INKED_SO_VER )
			)
		);

		$this->register_frontend_styles(
			array(
				array( 'iw-tabs-css', plugin_dir_url(__FILE__) . 'css/tabs.css', array(), INKED_SO_VER )
			)
		);

	}

	function get_less_variables($instance) {

		if( empty( $instance ) ) return array();

		return array(
			'theme'     => $instance['styling']['theme'],
			'bg'        => $instance['styling']['tab'],
			'bg-c'      => $instance['styling']['content'],
			'title'     => $instance['styling']['basic'],
			'highlight' => $instance['styling']['highlight'],
			'icon'      => $instance['styling']['icon'],
		);

	}

}

siteorigin_widget_register( 'ink-tabs', __FILE__, 'Inked_Tabs_SO_Widget' );
