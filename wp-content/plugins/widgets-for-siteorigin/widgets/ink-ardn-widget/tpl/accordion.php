<?php
global $wpinked_widget_count;

$icon_styles = array();
$icon_styles[] = 'font-size: 2em';
if(!empty($instance['styling']['icon'])) $icon_styles[] = 'color: '.$instance['styling']['icon'];

$expand = ( $instance['settings']['expand'] ) ? '' : ' iw-so-acc-singleExpand';
$toggle = ( $instance['settings']['toggleable'] ) ? ' iw-so-acc-toggle' : '';

$acc_no = 1;

if( $instance['settings']['id'] ):
	$unique = $instance['settings']['id'];
else :
	$unique = 'toggle-' . ++$wpinked_widget_count;
endif;
?>

<div class="iw-so-accordion<?php echo $expand . $toggle; ?>">

	<?php foreach( $instance['toggles'] as $i => $toggle ) { ?>

		<div class="iw-so-acc-item<?php echo ( $toggle['active'] == 1 ? ' iw-so-acc-item-active' : '' ); ?>"  id="<?php echo $unique . '-' . $acc_no; ?>">

			<a href="#" class="iw-so-acc-title <?php echo $instance['styling']['text']; ?>">
				<?php echo esc_html( $toggle['title'] ); ?>
				<span class="iw-so-tgl-open"><?php echo siteorigin_widget_get_icon( $instance['settings']['icon-open'], $icon_styles ); ?></span>
				<span class="iw-so-tgl-close"><?php echo siteorigin_widget_get_icon( $instance['settings']['icon-close'], $icon_styles ); ?></span>
			</a>

			<div class="iw-so-acc-content">
				<?php echo do_shortcode( $toggle['content'] ); ?>
			</div>

		</div>

		<?php $acc_no++; ?>

	<?php } ?>

</div>
