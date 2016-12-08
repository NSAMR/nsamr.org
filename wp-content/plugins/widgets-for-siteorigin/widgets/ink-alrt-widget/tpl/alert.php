<?php
	$icon_styles = array();
	if ( $instance['icon']['color'] ) $icon_styles[] = 'color: ' . $instance['icon']['color'];
?>
<div class="iw-so-alert iw-so-alert-<?php echo $instance['styling']['size'] ?>">

	<?php if ( $instance['icon']['select'] ) : ?>
		<?php echo siteorigin_widget_get_icon( $instance['icon']['select'], $icon_styles ); ?>
	<?php endif; ?>

	<div class="iw-so-alert-msg">
		<?php echo wp_kses_post( $instance['message'] ); ?>
	</div>

	<?php if ( $instance['close'] ) : ?>
		<a class="close" aria-label="Dismiss alert" type="button">
			<span aria-hidden="true">&times;</span>
		</a>
	<?php endif; ?>

</div>
