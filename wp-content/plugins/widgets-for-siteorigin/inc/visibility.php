<?php

if ( ! function_exists ( 'wpinked_so_visibility_fields' ) ) :
// Adding visibility options
function wpinked_so_visibility_fields( $fields ) {

	$fields['iw-visible-screen'] = array(
			'name'        => __( 'Visibility - By screen size', 'wpinked-widgets' ),
			'type'        => 'select',
			'group'       => 'attributes',
			'default'     => 'iw-all',
			'options'     => array(
				'iw-all'     => __( 'All', 'wpinked-widgets' ),
				'iw-small'   => __( 'Small (below 640px)', 'wpinked-widgets' ),
				'iw-med-up'  => __( 'Medium Up (above 640px)', 'wpinked-widgets' ),
				'iw-medium'  => __( 'Medium (640px - 1024px)', 'wpinked-widgets' ),
				'iw-med-dw'  => __( 'Medium Down (below 1024px)', 'wpinked-widgets' ),
				'iw-large'   => __( 'Large (above 1024px)', 'wpinked-widgets' )
			),
			'description' => __( 'Show by screen size.', 'wpinked-widgets' ),
			'priority'    => 12,
	);

	$fields['iw-visible-layout'] = array(
			'name'        => __( 'Visibility - By screen layout', 'wpinked-widgets' ),
			'type'        => 'select',
			'group'       => 'attributes',
			'default'     => 'iw-all',
			'options'     => array(
				'iw-all'     => __( 'All', 'wpinked-widgets' ),
				'iw-show-p'  => __( 'Show Portrait', 'wpinked-widgets' ),
				'iw-show-l'  => __( 'Show Landscape', 'wpinked-widgets' ),
				'iw-hide-p'  => __( 'Hide Portrait', 'wpinked-widgets' ),
				'iw-hide-l'  => __( 'Hide Landscape', 'wpinked-widgets' )
			),
			'description' => __( 'Show based on screen orientation.', 'wpinked-widgets' ),
			'priority'    => 13,
	);

	return $fields;
}
endif;
add_filter( 'siteorigin_panels_row_style_fields', 'wpinked_so_visibility_fields' );
add_filter( 'siteorigin_panels_widget_style_fields', 'wpinked_so_visibility_fields' );

if ( ! function_exists ( 'wpinked_so_visibility_attributes' ) ) :
// Adding visibility classes
function wpinked_so_visibility_attributes( $attributes, $args ) {

	if( !empty( $args['iw-visible-screen'] ) && ( $args['iw-visible-screen'] !== 'iw-all' ) ) {
		array_push( $attributes['class'], $args['iw-visible-screen'] );
	}

	if( !empty( $args['iw-visible-layout'] ) && ( $args['iw-visible-layout'] !== 'iw-all' ) ) {
		array_push( $attributes['class'], $args['iw-visible-layout'] );
	}

	return $attributes;
}
endif;
add_filter( 'siteorigin_panels_row_style_attributes', 'wpinked_so_visibility_attributes', 10, 2);
add_filter( 'siteorigin_panels_widget_style_attributes', 'wpinked_so_visibility_attributes', 10, 2);
