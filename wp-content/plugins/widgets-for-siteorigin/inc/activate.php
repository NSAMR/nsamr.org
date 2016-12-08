<?php
if ( ! function_exists( 'wpinked_so_wb_default_active' ) ) :
// Activating widgets on install
function wpinked_so_wb_default_active( $group ) {
	$active_widgets = array(
		'ink-alert'         => true,
		'ink-accordion'     => true,
		'ink-audio'         => true,
		'ink-bar-count'     => true,
		'ink-blog'          => true,
		'ink-buttons'       => true,
		'ink-circle-count'  => true,
		'ink-divider'       => true,
		'ink-filt-ardn'     => true,
		'ink-media-box'     => true,
		'ink-num-count'     => true,
		'ink-pricing-table' => true,
		'ink-person'        => true,
		'ink-folio'         => true,
		'ink-slider'        => true,
		'ink-tabs'          => true,
		'ink-testimonial'   => true,
		'ink-video'         => true,
	);
	return $active_widgets;
}
endif;
add_filter( 'siteorigin_widgets_default_active', 'wpinked_so_wb_default_active', 20 );
