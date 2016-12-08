<?php
global $wpinked_widget_count;

if( !empty($instance['title']) ) echo $args['before_title'] . esc_html($instance['title']) . $args['after_title'];

$icon_styles = array();
if(!empty($instance['icon']['color'])) $icon_styles[] = 'color: '.$instance['icon']['color'];

$tab_no = 1;
$cnt_no = 1;
$tab_active_set = false;
$cnt_active_set = false;

if( $instance['id'] ):
	$unique = $instance['id'];
else :
	$unique = 'tab-' . ++$wpinked_widget_count;
endif;
?>

<div class="iw-so-tabs iw-so-tabs-<?php echo $instance['styling']['orientation']; ?> iw-so-tabs-<?php echo $instance['styling']['responsive']; ?>">

	<ul class="iw-so-tabs-nav">

		<?php foreach( $instance['tabs'] as $i => $tab ) { ?>
			<li class="iw-so-tab-title<?php echo ( ( $tab['active'] == 1 && !$tab_active_set ) ? ' iw-so-tab-active' : '' ); ?>" id="<?php echo $unique . '-' . $tab_no; ?>">
				<a href="#<?php echo $unique . '-' . $tab_no . '-content'; ?>">
					<?php echo siteorigin_widget_get_icon( $tab['icon'], $icon_styles ); ?>
					<span class="iw-so-tab-text"><?php echo esc_html( $tab['title'] ); ?></span>
				</a>
			</li>
			<?php $tab_active_set = ( $tab['active'] == 1 ) ? true : false; ?>
			<?php $tab_no++; ?>
		<?php } ?>

	</ul>

	<div class="iw-so-tabs-content">

		<?php foreach( $instance['tabs'] as $i => $tab ) : ?>
			<div class="iw-so-tabs-panel<?php echo ( ( $tab['active'] == 1 && !$cnt_active_set ) ? ' iw-so-tab-active' : '' ); ?>" id="<?php echo $unique . '-' . $cnt_no . '-content'; ?>">
				<?php echo do_shortcode( $tab['content'] ); ?>
			</div>
			<?php $cnt_active_set = ( $tab['active'] == 1 ) ? true : false; ?>
			<?php $cnt_no++; ?>
		<?php endforeach; ?>

	</div>

</div>
