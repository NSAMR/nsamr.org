<?php
$circle_attributes = array( 'data-scale-color' => 'false' );
if( ! empty ( $instance['circle']['percent'] ) ) $circle_attributes['data-percent'] = esc_attr ( $instance['circle']['percent'] );
if( ! empty ( $instance['styling']['bar'] ) ) $circle_attributes['data-bar-color'] = esc_attr ( $instance['styling']['bar'] );
if( ! empty ( $instance['styling']['track'] ) ) $circle_attributes['data-track-color'] = esc_attr ( $instance['styling']['track'] );
if( ! empty ( $instance['styling']['shape'] ) ) $circle_attributes['data-line-cap'] = esc_attr ( $instance['styling']['shape'] );
if( ! empty ( $instance['styling']['width'] ) ) $circle_attributes['data-line-width'] = esc_attr ( $instance['styling']['width'] );
if( ! empty ( $instance['styling']['size'] ) ) $circle_attributes['data-size'] = esc_attr ( $instance['styling']['size'] );
if( empty ( $instance['styling']['circle-animation'] ) ) $circle_attributes['data-animate'] = false;
?>

<div class="iw-so-circle">

	<?php if ( $instance['circle']['title'] && $instance['circle']['title-pos'] == 'above' ) : ?>
		<h3 class="iw-so-circle-title iw-text-center"><?php echo esc_html ( $instance['circle']['title'] ); ?></h3>
	<?php endif; ?>
	<center>
	<div class="iw-so-circle-chart" <?php foreach( $circle_attributes as $name => $val ) echo $name . '="' . $val . '" ' ?>>
		<?php if ( $instance['circle']['percent-show'] ) : ?>
			<p class="iw-so-circle-percent">
				<?php echo esc_html ( $instance['circle']['percent-prefix'] ); ?>
				<?php if( $instance['styling']['percent-animation'] ) : ?>
					<span class="iw-so-circle-timer iw-so-circle-timer-active" data-from="0" data-to="<?php echo esc_attr ( $instance['circle']['percent'] ); ?>" data-speed="1000" data-refresh-interval="50"></span>
				<?php else : ?>
					<span class="iw-so-circle-timer"><?php echo esc_html ( $instance['circle']['percent'] ); ?></span>
				<?php endif; ?>
				<?php echo esc_html ( $instance['circle']['percent-suffix'] ); ?>
			</p>
		<?php endif; ?>
	</div>
	</center>
	<?php if ( $instance['circle']['title'] && $instance['circle']['title-pos'] == 'below' ) : ?>
		<h3 class="iw-so-circle-title iw-text-center"><?php echo esc_html ( $instance['circle']['title'] ); ?></h3>
	<?php endif; ?>

</div>
