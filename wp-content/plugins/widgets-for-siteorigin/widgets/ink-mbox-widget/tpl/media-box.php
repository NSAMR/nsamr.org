<?php

$icon_styles = array();
if( !empty($instance['styling']['icon-size'] ) ) $icon_styles[] = 'font-size: '.$instance['styling']['icon-size'];
if( !empty($instance['styling']['icon-clr'] ) ) $icon_styles[] = 'color: '.$instance['styling']['icon-clr'];

$classes = array( 'iw-so-media-box-btn' );
if( !empty($instance['styling']['btn-hover'] ) ) $classes[] = 'iw-so-media-box-btn-hover';
if( !empty($instance['styling']['btn-click'] ) ) $classes[] = 'iw-so-media-box-btn-click';

$button_attributes = array(
	'class' => esc_attr(implode( ' ', $classes))
);
if( !empty( $instance['box']['btn-window'] ) ) $button_attributes['target'] = '_blank';
if( !empty( $instance['box']['btn-url'] ) ) $button_attributes['href'] = sow_esc_url( $instance['box']['btn-url'] );
if( !empty( $instance['box']['btn-id'] ) ) $button_attributes['id'] = esc_attr( $instance['box']['btn-id'] );
if( !empty( $instance['box']['btn-title'] ) ) $button_attributes['title'] = esc_attr( $instance['box']['btn-title'] );
if( !empty( $instance['box']['btn-onclick'] ) ) $button_attributes['onclick'] = esc_attr( $instance['box']['btn-onclick'] );
?>

<div class="iw-so-media-box">

	<div class="iw-so-media-box-media">

		<?php if( $instance['box']['media'] == 'image' ) : ?>
			<center><?php echo wp_get_attachment_image( $instance['box']['image'], 'full' ); ?></center>
		<?php elseif ( $instance['box']['media'] == 'icon' ) : ?>
			<center><?php echo siteorigin_widget_get_icon( $instance['box']['icon'], $icon_styles ); ?></center>
		<?php elseif ( $instance['box']['media'] == 'oembed' ) : ?>
			<div class="oembed-flex-frame"><?php echo wp_oembed_get( esc_url( $instance['box']['oembed'] ) ); ?></div>
		<?php endif; ?>

	</div>

	<div class="iw-so-media-box-text">

		<?php if ( $instance['box']['title'] ): ?>
			<h3 class="iw-so-media-box-title iw-text-center"><?php echo wp_kses_post( $instance['box']['title'] ); ?></h3>
		<?php endif; ?>
		<?php if ( $instance['box']['content'] ): ?>
			<p class="iw-so-media-box-content iw-text-center"><?php echo wp_kses_post( $instance['box']['content'] ); ?></p>
		<?php endif; ?>

	</div>

	<div class="iw-so-media-box-button">

		<?php if ( $instance['box']['btn'] ): ?>
			<div class="iw-so-media-box-btn-base iw-text-center">
				<a <?php foreach($button_attributes as $name => $val) echo $name . '="' . $val . '" ' ?>>
					<?php echo $instance['box']['btn']; ?>
				</a>
			</div>
		<?php endif; ?>

	</div>

</div>
