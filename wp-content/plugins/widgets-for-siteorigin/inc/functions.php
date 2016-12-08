<?php

// Add custom image size
add_image_size( 'folio', 600, 400, true );

if ( ! function_exists ( 'wpinked_so_post_byline' ) ) :
function wpinked_so_post_byline( $byline, $id, $sep ) {

	$byline = str_replace( '%category%', get_the_category_list( $sep, '', $id ), $byline );
	$byline = str_replace( '%author%', '<a href="' . get_author_posts_url( $id ) . '">' . get_the_author() . '</a>', $byline );
	$byline = str_replace( '%date%', get_the_date( '', $id ), $byline );
	$byline = str_replace( '%comments%', get_comments_number( $id ), $byline );
	$byline = do_shortcode( $byline );

	echo wp_kses_post( $byline );

}
endif;

if ( ! function_exists ( 'wpinked_so_post_byline_metafield' ) ) :
function wpinked_so_post_byline_metafield( $atts ) {
	$atts = extract( shortcode_atts( array(
		'id' => '',
	), $atts ) );
	if ( ! $id ) return;
	$data = get_post_meta( get_the_ID(), $id, true );
	if ( $data ) {
		return '<span class="iw-so-custom-field id-'. $id .'">'. $data .'</span>';
	}
}
endif;
add_shortcode( 'ink_custom_field', 'wpinked_so_post_byline_metafield' );

if ( ! function_exists ( 'wpinked_so_post_excerpt' ) ) :
function wpinked_so_post_excerpt ( $limit, $after ) {

	if ( $limit ) :

		$excerpt = explode( ' ', get_the_excerpt(), $limit);

		if ( count($excerpt) >= $limit):
			array_pop($excerpt);
			$excerpt = implode(" ",$excerpt). esc_html( $after );
		else:
			$excerpt = implode(" ",$excerpt);
		endif;

	else :

		$excerpt = get_the_excerpt();

	endif;

	$excerpt = preg_replace( '`\[[^\]]*\]`','',$excerpt);

	echo $excerpt;

}
endif;

if ( ! function_exists ( 'wpinked_so_blog_navigation' ) ) :
function wpinked_so_blog_navigation( $query, $navigation, $type, $attr, $previous, $next ) {

	if( $navigation ): ?>

		<?php if( $type == 'next-prev' ): ?>
			<h3 class="screen-reader-text"><?php _e( 'Posts Navigation', 'wpinked-widgets' ); ?></h3>
			<nav id='iw-so-blog-pagination' class="iw-so-blog-pagination iw-so-blog-prev-next <?php echo $attr; ?>" role="navigation">
				<ul>
					<li class="iw-so-blog-previous"><?php echo str_replace ( '<a', '<a', get_previous_posts_link( $previous, $query->max_num_pages) ) ?></li>
					<li class="iw-so-blog-next"><?php echo str_replace ( '<a', '<a', get_next_posts_link( $next, $query->max_num_pages) ) ?></li>
				</ul>
			</nav>
		<?php endif; ?>

		<?php if( $type == 'paginate' ): ?>
			<nav id='iw-so-blog-pagination' class="iw-so-blog-pagination iw-so-blog-paginate <?php echo $attr; ?>" role="navigation">
				<h3 class="screen-reader-text"><?php _e( 'Posts Navigation', 'wpinked-widgets' ); ?></h3>
				<div class="iw-so-nav-links">
					<?php
						$big = 999999999; // need an unlikely integer
						$args = array(
							'base'         => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
							'format'       => '?page=%#%', // ?page=%#% : %#% is replaced by the page number
							'total'        => $query->max_num_pages,
							'current'      => max( 1, $query->get('paged') ),
							'show_all'     => false,
							'prev_next'    => true,
							'prev_text'    => $previous,
							'next_text'    => $next,
							'end_size'     => 1,
							'mid_size'     => 1,
							'type'         => 'plain',
							'add_args'     => false, // array of query args to add
							'add_fragment' => ''
						);
					?>
					<?php echo paginate_links( $args ); ?>

				</div>
			</nav>
		<?php endif; ?>

	<?php endif;

}
endif;

if ( ! function_exists ( 'wpinked_so_blog_navigation_ajax' ) ) :
function wpinked_so_blog_navigation_ajax( $navigation, $type, $id ) {

	if ( $navigation && $type == 'ajax' ): ?>

		<script>
		jQuery(document).ready(function(){
			// AJAX pagination
			jQuery(function($) {
				$( '#<?php echo $id; ?>' ).parent( '.iw-so-blog' ).on( 'click', '#iw-so-blog-pagination.iw-so-navi-ajax a', function(e){
					e.preventDefault();
					var link = $(this).attr( 'href' );
					$( '#<?php echo $id; ?>' ).parent().fadeOut(300, function(){
						$(this).load(link + ' #<?php echo $id; ?>', function() {
							$(this).fadeIn(300);
						});
					});
				});
			});
		});
		</script>

	<?php endif;

}
endif;

if ( ! function_exists( 'wpinked_so_person_social' ) ) :
function wpinked_so_person_social( $profiles, $align, $target ) {

	if ( $profiles ) { ?>

		<p class="iw-so-person-profiles <?php echo esc_attr( $align );?>">

			<?php
			$icon_styles = array();

			foreach( $profiles as $index => $profile ) { ?>

				<a href="<?php echo sow_esc_url( $profile['link'] ); ?>" target="<?php echo esc_attr( $target ); ?>"><?php echo siteorigin_widget_get_icon( $profile['icon'], $icon_styles );?></a>

			<?php } ?>

		</p>

	<?php }
}
endif;

if ( ! function_exists ( 'wpinked_so_testimonial_name' ) ) :
function wpinked_so_testimonial_name ( $name, $company, $link, $target, $align ) {

	if ( $name ) { ?>

		<h4 class="iw-so-testimonial-name <?php echo $align; ?>"><?php echo esc_html( $name ); ?></h4>

	<?php }

	if ( $company ) { ?>

		<p class="iw-so-testimonial-company <?php echo $align; ?>">

			<?php if ( $link ) : ?>
				<a target="<?php echo esc_attr( $target ); ?>" href="<?php echo sow_esc_url( $link ); ?>"><?php echo esc_html( $company ); ?></a>
			<?php else : ?>
				<?php echo esc_html( $company ); ?>
			<?php endif; ?>
		</p>

	<?php }
}
endif;

if ( ! function_exists ( 'wpinked_so_blog_post_col' ) ) :
function wpinked_so_blog_post_col($count, $cols) {
	if( $count % $cols == 0 ):
		echo 'iw-so-last-col';
	endif;
	if( $count % $cols == 1 ):
		echo 'iw-so-first-col';
	endif;
}
endif;

if ( ! function_exists ( 'wpinked_so_unique_id' ) ) :
function wpinked_so_unique_id() {
	return mt_rand(1111, 9999) . '-' . mt_rand(1111, 9999) . '-' . mt_rand(1111, 9999);
}
endif;
