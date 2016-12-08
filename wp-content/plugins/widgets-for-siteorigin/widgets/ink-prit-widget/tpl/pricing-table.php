<?php
// Adding columns classes
if( $instance['styling']['columns'] == 1 ):
	$columns = ' iw-so-pricing-one-column';
elseif( $instance['styling']['columns'] == 2 ):
	$columns = ' iw-so-pricing-two-column';
elseif( $instance['styling']['columns'] == 3 ):
	$columns = ' iw-so-pricing-three-column';
elseif( $instance['styling']['columns'] == 4 ):
	$columns = ' iw-so-pricing-four-column';
endif;

$classes = array( 'iw-so-pricing-btn' );
if( !empty( $instance['styling']['btn-hover'] ) ) $classes[] = 'iw-so-pricing-btn-hover';
if( !empty( $instance['styling']['btn-click'] ) ) $classes[] = 'iw-so-pricing-btn-click';
$button_attributes = array( 'class' => esc_attr( implode( ' ', $classes) ) );
?>

<div class="iw-so-pricing<?php if( !$instance['styling']['gap'] ) echo ' iw-so-pricing-no-gap'; ?>">

	<?php foreach( $instance['plans'] as $i => $plan ) { ?>

		<div class="iw-so-pricing-plan<?php echo $columns; ?><?php echo ( $plan['featured'] ? ' iw-so-pricing-featured' : '' ); ?>">

			<div class="iw-so-pricing-title-section">
				<?php if( $instance['styling']['title-tag-p'] == 'above' ) : ?>
					<p class="iw-so-pricing-title-tag <?php echo esc_attr( $instance['styling']['align'] ); ?>"><?php echo esc_html( $plan['title-tag'] ); ?></p>
				<?php endif; ?>
				<h3 class="iw-so-pricing-title <?php echo esc_attr( $instance['styling']['align'] ); ?>"><?php echo esc_html( $plan['title'] ); ?></h3>
				<?php if( $instance['styling']['title-tag-p'] == 'below' ) : ?>
					<p class="iw-so-pricing-title-tag <?php echo esc_attr( $instance['styling']['align'] ); ?>"><?php echo esc_html( $plan['title-tag'] ); ?></p>
				<?php endif; ?>
			</div>

			<div class="iw-so-pricing-price-section">
				<?php if( $instance['styling']['price-tag-p'] == 'above' ) : ?>
					<p class="iw-so-pricing-price-tag <?php echo esc_attr( $instance['styling']['align'] ); ?>"><?php echo esc_html( $plan['price-tag'] ); ?></p>
				<?php endif; ?>
				<p class="iw-so-pricing-price <?php echo esc_attr( $instance['styling']['align'] ); ?>">
					<span class="iw-so-pricing-price-prefix"><?php echo esc_html( $plan['price-prefix'] ); ?></span>
					<?php echo esc_html( $plan['price'] ); ?>
					<span class="iw-so-pricing-price-suffix"><?php echo esc_html( $plan['price-suffix'] ); ?></span>
				</p>
				<?php if( $instance['styling']['price-tag-p'] == 'below' ) : ?>
					<p class="iw-so-pricing-price-tag <?php echo esc_attr( $instance['styling']['align'] ); ?>"><?php echo esc_html( $plan['price-tag'] ); ?></p>
				<?php endif; ?>
			</div>

			<div class="iw-so-pricing-features-section">
				<ul class="<?php echo esc_attr( $instance['styling']['align'] ); ?>">
					<?php foreach( $plan['points'] as $i => $feature ) { ?>
						<li>
							<?php echo wp_kses_post( $feature['text'] ); ?>
						<li>
					<?php } ?>
				</ul>
			</div>

			<?php
			if( !empty( $plan['btn-window'] ) ) $button_attributes['target'] = '_blank';
			if( !empty( $plan['btn-url'] ) ) $button_attributes['href'] = sow_esc_url( $plan['btn-url'] );
			if( !empty( $plan['btn-id'] ) ) $button_attributes['id'] = esc_attr( $plan['btn-id'] );
			if( !empty( $plan['btn-title'] ) ) $button_attributes['title'] = esc_attr( $plan['btn-title'] );
			if( !empty( $plan['btn-onclick'] ) ) $button_attributes['onclick'] = esc_attr( $plan['btn-onclick'] );
			?>

			<div class="iw-so-pricing-button-section">
				<?php if ( $plan['btn'] ): ?>
					<div class="iw-so-pricing-btn-base iw-text-center">
						<a <?php foreach($button_attributes as $name => $val) echo $name . '="' . $val . '" ' ?>>
							<?php echo esc_html( $plan['btn'] ); ?>
						</a>
					</div>
				<?php endif; ?>
			</div>

			<?php
			if( $button_attributes['href'] ) $button_attributes['href'] = '';
			if( $button_attributes['id'] ) $button_attributes['id'] = '';
			if( $button_attributes['title'] ) $button_attributes['title'] = '';
			if( $button_attributes['onclick'] ) $button_attributes['onclick'] = '';
			?>

		</div>

	<?php } ?>

</div>
