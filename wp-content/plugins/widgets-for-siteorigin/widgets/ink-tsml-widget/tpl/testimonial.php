<div class="iw-so-testimonial <?php echo 'iw-so-testimonial-' . $instance['styling']['design']; ?>">

	<?php if ( $instance['testimonial']['image'] && ($instance['styling']['design'] != 'below' ) ) : ?>

		<div class="iw-so-testimonial-img">

			<?php echo wp_get_attachment_image( $instance['testimonial']['image'], 'full' ); ?>

		</div>

	<?php endif; ?>

	<div class="iw-so-testimonial-content">

		<?php if ( $instance['testimonial']['content'] ) : ?>

			<div class="iw-so-testimonial-message <?php echo $instance['testimonial']['text']; ?>"><?php echo do_shortcode( $instance['testimonial']['content'] ); ?></div>

		<?php endif; ?>

		<?php wpinked_so_testimonial_name( $instance['name'], $instance['testimonial']['company'], $instance['testimonial']['link'], $instance['testimonial']['target'], $instance['styling']['text'] ); ?>

	</div>

	<?php if ( $instance['testimonial']['image'] && ($instance['styling']['design'] == 'below' ) ) : ?>

		<div class="iw-so-testimonial-img">

			<?php echo wp_get_attachment_image( $instance['testimonial']['image'], 'full' ); ?>

		</div>

	<?php endif; ?>

</div>
