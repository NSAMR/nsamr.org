<?php
global $wpinked_widget_count;

if( !empty($instance['title']) ) echo $args['before_title'] . esc_html($instance['title']) . $args['after_title'];

$icon_styles = array();
$icon_styles[] = 'font-size: 2em';
if(!empty($instance['styling']['icon'])) $icon_styles[] = 'color: '.$instance['styling']['icon'];

$expand = ( $instance['settings']['expand'] ) ? '' : ' iw-so-acc-singleExpand';
$toggle = ( $instance['settings']['toggleable'] ) ? ' iw-so-acc-toggle' : '';

$acc_no = 1;
$first = true;

$unique = ( $instance['id'] ) ? $instance['id'] : 'fard-' . ++$wpinked_widget_count;
?>

<div class="iw-so-filter-acrdn-terms">
	<ul class="iw-so-acrdn-terms">
		<?php if( $instance['show-all'] ) {
			echo '<li><a class="' . $unique . '-filter-fard" data-filter="all">' . esc_html( $instance['all'] ) . '</a></li>';
		}

		foreach ( $instance['filters'] as $term ) {
			if( !$instance['show-all'] && $first ) {
				$active_item = '.' . $term['slug'];
				$first = false;
			}
			echo '<li><a class="' . $unique . '-filter-fard" data-filter=".' . esc_attr( $term['slug'] ) . '" >' . esc_html( $term['name'] ) .'</a></li>';
		}
		$active_item = ( $active_item ) ? $active_item : 'all';
		?>
	</ul>
</div>

<div class="iw-so-accordion<?php echo $expand . $toggle; ?>" id="<?php echo $unique . '-fard-container'; ?>">

	<?php foreach( $instance['toggles'] as $i => $toggle ) { ?>

		<div class="iw-so-acc-item<?php echo ($toggle['active'] == 1 ? ' iw-so-acc-item-active' : '' ); ?> mix <?php echo esc_attr( $toggle['slugs'] ); ?>">

			<a href="#" class="iw-so-acc-title <?php echo $instance['styling']['text']; ?>" id="<?php echo $unique . '-' . $acc_no; ?>">
				<?php echo esc_html( $toggle['title'] ); ?>
				<span class="iw-so-tgl-open"><?php echo siteorigin_widget_get_icon( $instance['icon-open'], $icon_styles ); ?></span>
				<span class="iw-so-tgl-close"><?php echo siteorigin_widget_get_icon( $instance['icon-close'], $icon_styles ); ?></span>
			</a>

			<div class="iw-so-acc-content">
				<?php echo do_shortcode( $toggle['content'] ); ?>
			</div>

		</div>

		<?php $acc_no++; ?>

	<?php } ?>

</div>

<script type="text/javascript">
( function($) {

	$(document).ready( function() {

		$( '#<?php echo $unique . '-fard-container'; ?>' ).mixItUp({
			selectors: {
				filter: '.<?php echo $unique . '-filter-fard'; ?>'
			},
			load: {
				filter: '<?php echo $active_item; ?>'
			}
		});

	});

})( jQuery );
</script>
