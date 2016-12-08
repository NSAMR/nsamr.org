<div class="iw-so-audio">

	<?php if ($instance['audio']['type'] == 'oembed' ) : ?>

		<div class="iw-so-audio-oembed audio-flex-frame">

			<?php echo wp_oembed_get( esc_url( $instance['audio']['oembed'] ) ); ?>

		</div>

	<?php elseif ($instance['audio']['type'] == 'hosted' ) : ?>

		<div class="iw-so-audio-hosted" style="background-image: url( '<?php echo sow_esc_url ( wp_get_attachment_image_src( $instance['audio']['image'], 'full' )[0] ); ?>' )">

			<div class="iw-so-audio-file <?php echo esc_attr ( $instance['audio']['controls'] ); ?>">

				<h4 class="iw-so-audio-title <?php echo esc_attr ( $instance['audio']['align'] ); ?>"><?php echo esc_html ( $instance['audio']['audio'] ); ?></h4>

				<?php if ( $instance['audio']['artist'] || $instance['audio']['album'] ): ?>

					<p class="iw-so-audio-meta <?php echo esc_attr ( $instance['audio']['align'] ); ?>">
						<?php if ( $instance['audio']['artist'] ): ?>
							<span class="iw-so-audio-artist"><?php echo esc_html ( $instance['audio']['artist'] ); ?></span>
						<?php endif; ?>
						<?php if ( $instance['audio']['album'] ): ?>
							<span class="iw-so-audio-album"> - <?php echo esc_html ( $instance['audio']['album'] ); ?></span>
						<?php endif; ?>
					</p>

				<?php endif; ?>

				<?php echo do_shortcode( '[audio src="' . sow_esc_url ( wp_get_attachment_url( $instance['audio']['hosted'] ) ) . '"]' ); ?>

			</div>

		</div>

	<?php endif; ?>

</div>
