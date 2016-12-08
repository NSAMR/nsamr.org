<div class="iw-so-bar-counter <?php echo ( $instance['styling']['animation'] ? 'iw-so-bars-animated' : '' ); ?>">

	<?php foreach( $instance['bars'] as $i => $bar ) { ?>

		<div class="iw-so-bar">
			<p class="iw-so-bar-title"><?php echo esc_html ( $bar['title'] ); ?></p>
			<?php if ( $instance['styling']['percent-show'] ) : ?>
				<span class="iw-so-bar-percent"><?php echo esc_html ( $bar['percent'] ); ?>%</span>
			<?php endif; ?>
			<div class="iw-so-bar-container">
				<span class="iw-so-bar-meter" <?php echo ( $instance['styling']['animation'] ? 'aria-valuenow="' . esc_attr ( $bar['percent'] ) . '"' : 'style="width:' . esc_html ( $bar['percent'] ) . '%"' ); ?>></span>
			</div>
		</div>

	<?php } ?>

</div>
