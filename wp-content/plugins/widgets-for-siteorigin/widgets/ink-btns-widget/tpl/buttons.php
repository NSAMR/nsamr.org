<?php

$classes = array( 'iw-so-button' );
if( !empty( $instance['styling']['hover'] ) ) $classes[] = 'iw-so-button-hover';
if( !empty( $instance['styling']['click'] ) ) $classes[] = 'iw-so-button-click';

$button_attributes = array(
	'class' => esc_attr ( implode ( ' ', $classes ) )
);
if( !empty( $instance['new_window'] ) ) $button_attributes['target'] = '_blank';
if( !empty( $instance['url'] ) ) $button_attributes['href'] = sow_esc_url( $instance['url'] );
if( !empty( $instance['attributes']['id'] ) ) $button_attributes['id'] = esc_attr( $instance['attributes']['id'] );
if( !empty( $instance['attributes']['title'] ) ) $button_attributes['title'] = esc_attr( $instance['attributes']['title'] );
if( !empty( $instance['attributes']['onclick'] ) ) $button_attributes['onclick'] = esc_attr( $instance['attributes']['onclick'] );

$icon_styles = array();
?>

<div class="iw-so-button-base">

	<a <?php foreach ( $button_attributes as $name => $val ) echo $name . '="' . $val . '" ' ?>>
		<?php echo siteorigin_widget_get_icon( $instance['icon']['select'], $icon_styles ); ?>
		<?php echo esc_html ( $instance['text'] ); ?>
	</a>

</div>
