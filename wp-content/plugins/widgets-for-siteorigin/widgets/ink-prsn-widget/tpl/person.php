<div class="iw-so-person <?php echo ( $instance['styling']['img-width'] == false ? 'iw-so-person-fit' : '' ) ?>">

	<div class="iw-so-person-img">

		<?php echo wp_get_attachment_image( $instance['person']['image'], 'full' ); ?>

		<div class="iw-so-person-ol">

			<?php if( $instance['styling']['design'] == 'about' ) : ?>

				<p class="iw-so-person-about <?php echo esc_attr ( $instance['styling']['align'] );?>"><?php echo wp_kses_post( $instance['person']['about'] ); ?></p>

			<?php endif; ?>

			<?php if( $instance['styling']['design'] == 'icons' ) : ?>

				<?php wpinked_so_person_social( $instance['social']['profiles'], $instance['styling']['align'], $instance['social']['target'] ); ?>

			<?php endif; ?>

		</div>

	</div>

	<div class="iw-so-person-content">

		<h4 class="iw-so-person-name <?php echo esc_attr ( $instance['styling']['align'] );?>"><?php echo esc_html( $instance['name'] ); ?></h4>

		<p class="iw-so-person-desig <?php echo esc_attr ( $instance['styling']['align'] );?>"><?php echo esc_html( $instance['person']['designation'] ); ?></p>

		<?php if( $instance['styling']['design'] != 'about' ) : ?>

			<p class="iw-so-person-about <?php echo esc_attr ( $instance['styling']['align'] );?>"><?php echo wp_kses_post( $instance['person']['about'] ); ?></p>

		<?php endif; ?>

		<?php if( $instance['styling']['design'] != 'icons' ) : ?>

			<?php wpinked_so_person_social( $instance['social']['profiles'], $instance['styling']['align'], $instance['social']['target'] ); ?>

		<?php endif; ?>

	</div>

</div>
