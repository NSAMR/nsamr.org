<?php

// Styling the format icons
$icon_styles = array();
if(!empty($instance['icons']['color'])) $icon_styles[] = 'color: '.$instance['icons']['color'];
if(!empty($instance['icons']['size'])) $icon_styles[] = 'font-size: '.$instance['icons']['size'];

// Adding classes for the read more button
$btn_class = array( 'iw-so-article-btn' );
if( !empty($instance['styling']['btn-hover']) ) $btn_class[] = 'iw-so-article-btn-hover';
if( !empty($instance['styling']['btn-click']) ) $btn_class[] = 'iw-so-article-btn-click';

// Setting up the blog navigation
$navi_class = array( 'iw-so-navi-btn' );
if( !empty( $instance['pagination']['btn-hover'] ) ) $navi_class[] = 'iw-so-navi-btn-hover';
if( !empty( $instance['pagination']['btn-click'] ) ) $navi_class[] = 'iw-so-navi-btn-click';
if( $instance['pagination']['type'] == 'ajax' ) $navi_class[] = 'iw-so-navi-ajax';
$navi_attributes = esc_attr( implode( ' ', $navi_class) );
$navi_previous = siteorigin_widget_get_icon( $instance['pagination']['newer-icon'] ) . ' ' . esc_html( $instance['pagination']['newer-text'] );
$navi_next = esc_html( $instance['pagination']['older-text'] ) . ' ' . siteorigin_widget_get_icon( $instance['pagination']['older-icon'] );

// Adding columns classes
if( $instance['design']['columns'] == 1 ):
	$columns = ' iw-so-blog-one-column';
elseif( $instance['design']['columns'] == 2 ):
	$columns = ' iw-so-blog-two-column';
elseif( $instance['design']['columns'] == 3 ):
	$columns = ' iw-so-blog-three-column';
elseif( $instance['design']['columns'] == 4 ):
	$columns = ' iw-so-blog-four-column';
endif;

if ( !$instance['styling']['gap-bw'] ) {
	$collapse = ' iw-so-blog-collapse';
}

// Adding class for articles of same height
$height = $instance['design']['equalizer'] ? ' iw-so-blog-equal-height' : '';

// Setting up the article heading tag
$h = $instance['design']['title-tag'];

// Adding using id for this widget
$unique = $instance['pagination']['id'];

// Initializing column class count
$count = 1;

// Setting up posts query
global $paged, $query_result;
$this_post = get_the_ID();
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

// Setting up query
$post_selector_pseudo_query = $instance['posts'];
$processed_query = siteorigin_widget_post_selector_process_query( $post_selector_pseudo_query );
// Adding pagination
if ( $instance['pagination']['activate'] ):
	$processed_query['paged'] = $paged;
endif;
// Excluding current post
if( $instance['current'] ):
	$processed_query['post__not_in'] = array( $this_post );
endif;
$query_result = new WP_Query( $processed_query );
?>

<?php if( !empty( $instance['title'] ) ) echo $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title']; // Displaying the widget title ?>

<?php if( $query_result->have_posts() ) : // Looping through the posts ?>

	<div class="iw-so-blog">

		<div id="<? echo $unique; ?>">

			<div class="iw-so-blog-container<?php echo $height; ?>">

				<?php while( $query_result->have_posts() ) : $query_result->the_post(); ?>

					<div class="iw-so-article iw-so-thumb-behind<?php echo $columns; ?> <?php wpinked_so_blog_post_col( $count, $instance['design']['columns'] ); ?><?php echo $collapse; ?>">

							<?php if ( has_post_thumbnail() ) :
								 $thumbnail = wp_get_attachment_url( get_post_thumbnail_id() );
							endif; ?>

							<div class="iw-so-article-bg iw-blg-thumb-bg" style="background-image: url( '<?php echo $thumbnail; ?>' );">

								<div class="iw-so-article-content iw-blg-thumb-ol">

									<?php
									if ( get_post_format() && $instance['design']['format'] ):
										echo siteorigin_widget_get_icon( $instance['icons'][get_post_format()], $icon_styles );
									elseif ( $instance['design']['format'] ):
										echo siteorigin_widget_get_icon( $instance['icons']['standard'], $icon_styles );
									endif;
									?>

									<?php if ( $instance['design']['byline-above'] ) : ?>

										<p class="iw-so-article-byline-above <?php echo esc_attr( $instance['styling']['align'] ); ?>">
											<?php wpinked_so_post_byline( $instance['design']['byline-above'], get_the_ID(), $instance['design']['cats'] ); ?>
										</p>

									<?php endif; ?>

									<<?php echo $h; ?> class="iw-so-article-title <?php echo $instance['styling']['align']; ?>"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title() ?></a></<?php echo $h; ?>>

									<?php if ($instance['design']['byline-below']) : ?>

										<p class="iw-so-article-byline-below <?php echo esc_attr( $instance['styling']['align'] ); ?>">
											<?php wpinked_so_post_byline( $instance['design']['byline-below'], get_the_ID(), $instance['design']['cats'] ); ?>
										</p>

									<?php endif; ?>

									<?php if ( $instance['design']['content'] ): ?>

										<div class="iw-so-article-full">
											<?php global $more; $more = 1; the_content(); ?>
										</div>

									<?php elseif ( $instance['design']['excerpt'] ): ?>

										<p class="iw-so-article-excerpt <?php echo esc_attr( $instance['styling']['align'] ); ?>">
											<?php if ( $instance['design']['e-link'] ): ?>
												<a href="<?php echo esc_url( get_permalink() ) ?>">
													<?php wpinked_so_post_excerpt( $instance['design']['excerpt-length'], $instance['design']['excerpt-after'] ); ?>
												</a>
											<?php else: ?>
												<?php wpinked_so_post_excerpt( $instance['design']['excerpt-length'], $instance['design']['excerpt-after'] ); ?>
											<?php endif; ?>
										</p>

									<?php endif; ?>

									<?php if ($instance['design']['byline-end']) : ?>

										<p class="iw-so-article-byline-end <?php echo esc_attr( $instance['styling']['align'] ); ?>">
											<?php wpinked_so_post_byline( $instance['design']['byline-end'], get_the_ID(), $instance['design']['cats'] ); ?>
										</p>

									<?php endif; ?>

									<?php if ($instance['design']['button']) : ?>

										<div class="iw-so-article-button">
											<a class="<?php echo esc_attr( implode( ' ', $btn_class) ); ?>" href="<?php esc_url( the_permalink() ); ?>">
												<?php echo $instance['design']['btn-text']; ?>
											</a>
										</div>

									<?php endif; ?>

								</div>

							</div>

					</div>

					<?php $count++; ?>

					<?php if ( has_post_thumbnail() ) :
						 $thumbnail = '';
					endif; ?>

				<?php endwhile; wp_reset_postdata(); ?>

			</div>

			<?php wpinked_so_blog_navigation( $query_result, $instance['pagination']['activate'], $instance['pagination']['links'], $navi_attributes, $navi_previous, $navi_next ); // Blog navigation ?>

		</div>

	</div>

<?php endif; ?>

<?php wpinked_so_blog_navigation_ajax( $instance['pagination']['activate'], $instance['pagination']['type'], $unique ); // Blog ajax navigation ?>
