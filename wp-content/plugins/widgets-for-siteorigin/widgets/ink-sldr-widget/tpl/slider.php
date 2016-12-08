<?php

$icon_styles = array();

$prev = $instance['settings']['prev-arrow'] ? str_replace(  '"', "'", siteorigin_widget_get_icon( $instance['settings']['prev-arrow'], $icon_styles ) ) : __( 'Previous', 'wpinked' );
$next = $instance['settings']['next-arrow'] ? str_replace(  '"', "'", siteorigin_widget_get_icon( $instance['settings']['next-arrow'], $icon_styles ) ) : __( 'Next', 'wpinked' );

$prevButton = "<button id='iw-so-slick-prev' class='slick-arrow slick-prev'>" . $prev . "</button>";
$nextButton = "<button id='iw-so-slick-next' class='slick-arrow slick-next'>" . $next . "</button>";

// Settings
$settings = array();
$settings[] = '"prevArrow" : "' . $prevButton . '"';
$settings[] = '"nextArrow" : "' . $nextButton . '"';
if( $instance['settings']['adaptive'] ) $settings[] = '"adaptiveHeight" : true';
if( $instance['settings']['autoplay'] ) $settings[] = '"autoplay" : true';
if( $instance['settings']['autoplay-speed'] != 3000 ) $settings[] = '"autoplaySpeed" :' . $instance['settings']['autoplay-speed'] ;
if( !$instance['settings']['autoplay-focus'] ) $settings[] = '"pauseOnFocus" : false';
if( !$instance['settings']['autoplay-hover'] ) $settings[] = '"pauseOnHover" : false';
if( !$instance['settings']['arrows'] ) $settings[] = '"arrows" : false';
if( $instance['settings']['dots'] ) $settings[] = '"dots" : true';
if( $instance['settings']['dots-hover'] ) $settings[] = '"pauseOnDotsHover" : true';
if( $instance['settings']['fade'] ) $settings[] = '"fade" : true';
if( !$instance['settings']['infinite'] ) $settings[] = '"infinite" : false';

$data_settings = esc_attr ( implode ( ', ', $settings ) );

if ( $instance['settings']['arrows-hover'] ) $arrow_hover = ' iw-so-slider-arrow-hover';
?>

<div class="iw-so-slider<?php echo $arrow_hover; ?>" data-slick='{<?php echo $data_settings; ?>}'>

	<?php foreach( $instance['slides'] as $i => $slide ) { ?>

		<div class="iw-so-slider-slide">
			<center><?php echo wp_get_attachment_image( $slide['image'], 'full' ); ?></center>
		</div>

	<?php } ?>
</div>
