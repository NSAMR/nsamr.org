<?php

/*
Widget Name: Inked Pricing Table
Description: Simple responsive pricing tables.
Author: wpinked
Author URI: http://widgets.wpinked.com
*/

class Inked_Pricing_Table_SO_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(

			'ink-pricing-table',

			__( 'Inked Pricing Table', 'wpinked-widgets' ),

			array(
				'description' => __( 'Simple responsive pricing tables.', 'wpinked-widgets' ),
				'help'        => 'http://widgets.wpinked.com/documentation/pricing-table-widget/'
			),

			array(
			),

			array(

				'title'              => array(
					'type'              => 'text',
					'label'             => __( 'Admin Label', 'wpinked-widgets' ),
				),

				'plans'              => array(
					'type'              => 'repeater',
					'label'             => __( 'Pricing Plans' , 'wpinked-widgets' ),
					'item_name'         => __( 'Plan', 'wpinked-widgets' ),
					'item_label'        => array(
						'selector'         => "[id*='title']",
						'update_event'     => 'change',
						'value_method'     => 'val'
					),
					'fields'            => array(

						'title'            => array(
							'type'            => 'text',
							'label'           => __( 'Title', 'wpinked-widgets' ),
						),

						'title-tag'        => array(
							'type'            => 'text',
							'label'           => __( 'Title Tagline', 'wpinked-widgets' ),
						),

						'price'            => array(
							'type'            => 'text',
							'label'           => __( 'Price', 'wpinked-widgets' ),
						),

						'price-prefix'     => array(
							'type'            => 'text',
							'label'           => __( 'Price Prefix', 'wpinked-widgets' ),
						),

						'price-suffix'     => array(
							'type'            => 'text',
							'label'           => __( 'Price Suffix', 'wpinked-widgets' ),
						),

						'price-tag'        => array(
							'type'            => 'text',
							'label'           => __( 'Pricing Tagline', 'wpinked-widgets' ),
						),

						'points' => array(
							'type'       => 'repeater',
							'label'      => __( 'Features' , 'wpinked-widgets' ),
							'item_name'  => __( 'Feature', 'wpinked-widgets' ),
							'item_label' => array(
								'selector'     => "[id*='text']",
								'update_event' => 'change',
								'value_method' => 'val'
							),
							'fields' => array(

								'text' => array(
									'type'    => 'text',
									'label'   => __( 'Text', 'wpinked-widgets' ),
									'default' => '',
								),

							)
						),

						'btn'              => array(
							'type'            => 'text',
							'label'           => __( 'Button text', 'wpinked-widgets' ),
						),

						'btn-url'          => array(
							'type'            => 'link',
							'label'           => __( 'Destination URL', 'wpinked-widgets' ),
						),

						'btn-window'       => array(
							'type'            => 'checkbox',
							'default'         => false,
							'label'           => __( 'Open in a new window', 'wpinked-widgets' ),
						),

						'btn-id'           => array(
							'type'            => 'text',
							'label'           => __( 'Button ID', 'wpinked-widgets' ),
							'description'     => __( 'An ID attribute allows you to target this button in Javascript.', 'wpinked-widgets' ),
						),

						'btn-title'        => array(
							'type'            => 'text',
							'label'           => __( 'Button Title attribute', 'wpinked-widgets' ),
							'description'     => __( 'Adds a title attribute to the button link.', 'wpinked-widgets' ),
						),

						'btn-onclick'      => array(
							'type'            => 'text',
							'label'           => __( 'Button Onclick', 'wpinked-widgets' ),
							'description'     => __( 'Run this Javascript when the button is clicked. Ideal for tracking.', 'wpinked-widgets' ),
						),

						'featured'         => array(
							'type'            => 'checkbox',
							'default'         => false,
							'label'           => __( 'Featured Plan', 'wpinked-widgets' ),
						),
					)
				),

				'styling'            => array(
					'type'              => 'section',
					'label'             => __( 'Styling' , 'wpinked-widgets' ),
					'hide'              => true,
					'fields'            => array(

						'align'            => array(
							'type'            => 'select',
							'label'           => __( 'Text Align', 'wpinked-widgets' ),
							'default'         => 'iw-text-center',
							'options'         => array(
								'iw-text-left'   => __( 'Left', 'wpinked-widgets' ),
								'iw-text-center' => __( 'Center', 'wpinked-widgets' ),
								'iw-text-right'  => __( 'Right', 'wpinked-widgets' )
							),
							'description'     => __( 'Sets alignment for all text.', 'wpinked-widgets' ),
						),

						'background'       => array(
							'type'            => 'color',
							'label'           => __( 'Background Color', 'wpinked-widgets' ),
							'default'         => ''
						),

						'border'           => array(
							'type'            => 'color',
							'label'           => __( 'Border Color', 'wpinked-widgets' ),
							'default'         => ''
						),

						'shadow'       => array(
							'type'            => 'checkbox',
							'default'         => false,
							'label'           => __( 'Use shadow for plans?', 'wpinked-widgets' ),
						),

						'title'            => array(
							'type'            => 'color',
							'label'           => __( 'Title Color', 'wpinked-widgets' ),
							'default'         => '#333333'
						),

						'title-tag'        => array(
							'type'            => 'color',
							'label'           => __( 'Title tagline Color', 'wpinked-widgets' ),
							'default'         => '#666666'
						),

						'title-tag-p'        => array(
							'type'            => 'select',
							'label'           => __( 'Title Tagline Position', 'wpinked-widgets' ),
							'default'         => 'above',
							'options'         => array(
								'above'          => __( 'Above Title', 'wpinked-widgets' ),
								'below'          => __( 'Below Title', 'wpinked-widgets' ),
							),
						),

						'title-padding'   => array(
							'type'            => 'text',
							'label'           => __( 'Title Section Padding', 'wpinked-widgets' ),
							'default'         => '10px',
							'description'     => __( 'Applied above and below the title section. Please specify units, eg: px, em, rem, ...', 'wpinked-widgets' )
						),

						'title-bg'        => array(
							'type'            => 'color',
							'label'           => __( 'Title Section Background', 'wpinked-widgets' ),
							'default'         => ''
						),

						'price'            => array(
							'type'            => 'color',
							'label'           => __( 'Pricing Color', 'wpinked-widgets' ),
							'default'         => '#333333'
						),

						'price-tag'        => array(
							'type'            => 'color',
							'label'           => __( 'Pricing Tagline Color', 'wpinked-widgets' ),
							'default'         => '#666666'
						),

						'price-tag-p'        => array(
							'type'            => 'select',
							'label'           => __( 'Pricing Tag Position', 'wpinked-widgets' ),
							'default'         => 'below',
							'options'         => array(
								'above'          => __( 'Above Pricing', 'wpinked-widgets' ),
								'below'          => __( 'Below Pricing', 'wpinked-widgets' ),
							),
						),

						'price-padding'   => array(
							'type'            => 'text',
							'label'           => __( 'Pricing Section Padding', 'wpinked-widgets' ),
							'default'         => '10px',
							'description'     => __( 'Applied above and below the price section. Please specify units, eg: px, em, rem, ...', 'wpinked-widgets' )
						),

						'price-bg'        => array(
							'type'            => 'color',
							'label'           => __( 'Pricing Section Background', 'wpinked-widgets' ),
							'default'         => ''
						),

						'features'         => array(
							'type'            => 'color',
							'label'           => __( 'Features Color', 'wpinked-widgets' ),
							'default'         => '#666666'
						),

						'features-padding'   => array(
							'type'            => 'text',
							'label'           => __( 'Features Section Padding', 'wpinked-widgets' ),
							'default'         => '10px',
							'description'     => __( 'Applied above and below the features section. Please specify units, eg: px, em, rem, ...', 'wpinked-widgets' )
						),

						'features-gap'   => array(
							'type'            => 'text',
							'label'           => __( 'Padding between Features', 'wpinked-widgets' ),
							'default'         => '5px',
							'description'     => __( 'Applied below each feature. Please specify units, eg: px, em, rem, ...', 'wpinked-widgets' )
						),

						'features-bg'        => array(
							'type'            => 'color',
							'label'           => __( 'Features Section Background', 'wpinked-widgets' ),
							'default'         => ''
						),

						'button-padding'   => array(
							'type'            => 'text',
							'label'           => __( 'Button Section Padding', 'wpinked-widgets' ),
							'default'         => '10px',
							'description'     => __( 'Applied above and below the buttons section. Please specify units, eg: px, em, rem, ...', 'wpinked-widgets' )
						),

						'button-bg'        => array(
							'type'            => 'color',
							'label'           => __( 'Button Section Background', 'wpinked-widgets' ),
							'default'         => ''
						),

						'btn-align'        => array(
							'type'            => 'select',
							'label'           => __( 'Button Align', 'wpinked-widgets' ),
							'default'         => 'center',
							'options'         => array(
								'left'           => __( 'Left', 'wpinked-widgets' ),
								'center'         => __( 'Center', 'wpinked-widgets' ),
								'right'          => __( 'Right', 'wpinked-widgets' ),
								'full'           => __( 'Fullwidth', 'wpinked-widgets' ),
							),
						),

						'btn-theme'        => array(
							'type'            => 'select',
							'label'           => __( 'Button Theme', 'wpinked-widgets' ),
							'default'         => 'classic',
							'options'         => array(
								'classic'        => __( 'Classic', 'wpinked-widgets' ),
								'flat'           => __( 'Flat', 'wpinked-widgets' ),
								'outline'        => __( 'Outline', 'wpinked-widgets' ),
								'threed'         => __( '3D', 'wpinked-widgets' ),
								'shadow'         => __( 'Shadow', 'wpinked-widgets' ),
								'deline'         => __( 'Deline', 'wpinked-widgets' ),
							),
						),

						'btn-clr'          => array(
							'type'            => 'color',
							'label'           => __( 'Button Highlight Color', 'wpinked-widgets' ),
							'description'     => __( 'Typically used as button background.', 'wpinked-widgets' ),
						),

						'btn-base'         => array(
							'type'            => 'color',
							'label'           => __( 'Button Base Color', 'wpinked-widgets' ),
							'description'     => __( 'Typically used as text color.', 'wpinked-widgets' ),
						),

						'btn-hover'        => array(
							'type'            => 'checkbox',
							'default'         => true,
							'label'           => __( 'Use button hover effect ?', 'wpinked-widgets' ),
						),

						'btn-click'        => array(
							'type'            => 'checkbox',
							'default'         => true,
							'label'           => __( 'Use button click effect ?', 'wpinked-widgets' ),
						),

						'btn-corners'      => array(
							'type'            => 'select',
							'label'           => __( 'Button Corners', 'wpinked-widgets' ),
							'default'         => '0.25em',
							'options'         => array(
								'0em'            => __( 'Sharp', 'wpinked-widgets' ),
								'0.25em'         => __( 'Slightly curved', 'wpinked-widgets' ),
								'0.75em'         => __( 'Highly curved', 'wpinked-widgets' ),
								'1.5em'          => __( 'Round', 'wpinked-widgets' ),
							),
						),

						'columns'          => array(
							'type'            => 'slider',
							'label'           => __( 'Columns', 'wpinked-widgets' ),
							'default'         => 3,
							'min'             => 1,
							'max'             => 4,
							'integer'         => true
						),

						'gap'              => array(
							'type'            => 'checkbox',
							'label'           => __( 'Gap between Plans?', 'wpinked-widgets' ),
							'default'         => ''
						),

					)
				),

				'featured'           => array(
					'type'              => 'section',
					'label'             => __( 'Featured Styling' , 'wpinked-widgets' ),
					'hide'              => true,
					'fields'            => array(

						'background'       => array(
							'type'            => 'color',
							'label'           => __( 'Background Color', 'wpinked-widgets' ),
							'default'         => ''
						),

						'border'           => array(
							'type'            => 'color',
							'label'           => __( 'Border Color', 'wpinked-widgets' ),
							'default'         => ''
						),

						'title-bg'        => array(
							'type'            => 'color',
							'label'           => __( 'Title Section Background', 'wpinked-widgets' ),
							'default'         => ''
						),
						'price-bg'        => array(
							'type'            => 'color',
							'label'           => __( 'Pricing Section Background', 'wpinked-widgets' ),
							'default'         => ''
						),
						'features-bg'        => array(
							'type'            => 'color',
							'label'           => __( 'Features Section Background', 'wpinked-widgets' ),
							'default'         => ''
						),
						'button-bg'        => array(
							'type'            => 'color',
							'label'           => __( 'Button Section Background', 'wpinked-widgets' ),
							'default'         => ''
						),

						'title'            => array(
							'type'            => 'color',
							'label'           => __( 'Title Color', 'wpinked-widgets' ),
							'default'         => '#333333'
						),

						'title-tag'        => array(
							'type'            => 'color',
							'label'           => __( 'Title tagline Color', 'wpinked-widgets' ),
							'default'         => '#666666'
						),

						'price'            => array(
							'type'            => 'color',
							'label'           => __( 'Pricing Color', 'wpinked-widgets' ),
							'default'         => '#333333'
						),

						'price-tag'        => array(
							'type'            => 'color',
							'label'           => __( 'Pricing Tagline Color', 'wpinked-widgets' ),
							'default'         => '#666666'
						),

						'features'         => array(
							'type'            => 'color',
							'label'           => __( 'Features Color', 'wpinked-widgets' ),
							'default'         => '#666666'
						),

						'btn-clr'          => array(
							'type'            => 'color',
							'label'           => __( 'Button Highlight Color', 'wpinked-widgets' ),
							'description'     => __( 'Typically used as button background.', 'wpinked-widgets' ),
						),

						'btn-base'         => array(
							'type'            => 'color',
							'label'           => __( 'Button Base Color', 'wpinked-widgets' ),
							'description'     => __( 'Typically used as text color.', 'wpinked-widgets' ),
						),

					)
				),

			),

			plugin_dir_path(__FILE__)
		);
	}

	function get_template_name( $instance ) {
		return 'pricing-table';
	}

	function get_style_name( $instance ) {
		return 'pricing-table';
	}

	function initialize() {

		$this->register_frontend_styles(
			array(
				array( 'iw-pricing-css', plugin_dir_url(__FILE__) . 'css/pricing-table.css', array(), INKED_SO_VER )
			)
		);

	}

	function get_less_variables( $instance ) {
		if( empty( $instance ) ) return array();

		return array(
			'bg'         => $instance['styling']['background'],
			'border'     => $instance['styling']['border'],
			'shadow'     => $instance['styling']['shadow'],
			'title'      => $instance['styling']['title'],
			'title-t'    => $instance['styling']['title-tag'],
			'title-pad'  => $instance['styling']['title-padding'],
			'title-bg'   => $instance['styling']['title-bg'],
			'price'      => $instance['styling']['price'],
			'price-t'    => $instance['styling']['price-tag'],
			'price-pad'  => $instance['styling']['price-padding'],
			'price-bg'   => $instance['styling']['price-bg'],
			'feat'       => $instance['styling']['features'],
			'feat-pad'   => $instance['styling']['features-padding'],
			'feat-bg'    => $instance['styling']['features-bg'],
			'feat-gap'   => $instance['styling']['features-gap'],
			'bttn-pad'   => $instance['styling']['button-padding'],
			'bttn-bg'    => $instance['styling']['button-bg'],
			'btn-align'  => $instance['styling']['btn-align'],
			'btn-theme'  => $instance['styling']['btn-theme'],
			'btn-clr'    => $instance['styling']['btn-clr'],
			'btn-base'   => $instance['styling']['btn-base'],
			'btn-crnr'   => $instance['styling']['btn-corners'],
			'f-title'    => $instance['featured']['title'],
			'f-title-t'  => $instance['featured']['title-tag'],
			'f-price'    => $instance['featured']['price'],
			'f-price-t'  => $instance['featured']['price-tag'],
			'f-feat'     => $instance['featured']['features'],
			'f-bg'       => $instance['featured']['background'],
			'f-border'   => $instance['featured']['border'],
			'f-btn-clr'  => $instance['featured']['btn-clr'],
			'f-btn-base' => $instance['featured']['btn-base'],
			'f-title-bg' => $instance['featured']['title-bg'],
			'f-price-bg' => $instance['featured']['price-bg'],
			'f-feat-bg'  => $instance['featured']['features-bg'],
			'f-bttn-bg'  => $instance['featured']['button-bg']
		);
	}

}

siteorigin_widget_register( 'ink-pricing-table', __FILE__, 'Inked_Pricing_Table_SO_Widget' );
