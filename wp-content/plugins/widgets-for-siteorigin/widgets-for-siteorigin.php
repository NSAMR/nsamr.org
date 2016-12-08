<?php
/**
 * @wordpress-plugin
 * Plugin Name: Widgets for SiteOrigin
 * Plugin URI: http://widgets.wpinked.com/
 * Description: A collection of highly customizable and thoughtfully crafted widgets. Built on top of the SiteOrigin Widgets Bundle.
 * Version: 1.2.4
 * Author: wpinked
 * Author URI: widgets.wpinked.com
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: wpinked-widgets
 * Domain Path: /languages
 *
 * @link wpinked.com
 * @since 1.0.0
 * @package Widgets_For_SiteOrigin
 *
 */

define( 'INKED_SO_VER', '1.2.4' );

// Allow JS suffix to be pre-set
if( !defined( 'INKED_JS_SUFFIX' ) ) {
	define('INKED_JS_SUFFIX', '.min');
}

require_once ( 'inc/visibility.php' );

require_once ( 'inc/enqueue.php' );

require_once ( 'inc/functions.php' );

// Widgets.... Come out and play!
function wpinked_so_widgets($folders){
	$folders[] = plugin_dir_path(__FILE__) . '/widgets/';
	return $folders;
}
add_filter( 'siteorigin_widgets_widget_folders', 'wpinked_so_widgets' );

// Placing all widgets under the 'Widgets for SiteOrigin' Tab
function wpinked_so_add_widget_tabs($tabs) {
	$tabs[] = array(
		'title' => __( 'Widgets for SiteOrigin', 'wpinked-widgets' ),
		'filter' => array(
			'groups' => array( 'widgets-for-so' )
		)
	);
	return $tabs;
}
add_filter( 'siteorigin_panels_widget_dialog_tabs', 'wpinked_so_add_widget_tabs', 5);

// Adding Icon for all Widgets
function wpinked_so_widget_add_bundle_groups($widgets){
	foreach( $widgets as $class => &$widget ) {
		if( preg_match( '/Inked_(.*)_SO_Widget/', $class, $matches) ) {
			$widget['icon'] = 'wpinked-widget dashicons dashicons-editor-code';
			$widget['groups'] = array( 'widgets-for-so' );
		}
	}
	return $widgets;
}
add_filter( 'siteorigin_panels_widgets', 'wpinked_so_widget_add_bundle_groups', 11);

// Making the plugin translation ready
function wpinked_so_translation() {
	load_plugin_textdomain( 'wpinked_widgets', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'wpinked_so_translation' );

/**
* GLOBAL VARIABLES
*/
global $wpinked_widget_count;
$wpinked_widget_count = 0;

require_once ( 'inc/activate.php' );

// Create a helper function for easy SDK access.
function wpinkedwidgets() {
    global $wpinkedwidgets;

    if ( ! isset( $wpinkedwidgets ) ) {
        // Include Freemius SDK.
        require_once dirname(__FILE__) . '/freemius/start.php';

        $wpinkedwidgets = fs_dynamic_init( array(
            'id'                => '341',
            'slug'              => 'wpinked-widgets',
            'public_key'        => 'pk_7ebc491e750cd32db6fb5681d1bcf',
            'is_premium'        => false,
            'has_addons'        => false,
            'has_paid_plans'    => false,
            'menu'              => array(
                'slug'       => 'wpinked-widgets',
                'first-path' => 'plugins.php',
                'account'    => false,
                'contact'    => false,
                'support'    => false,
            ),
        ) );
    }

    return $wpinkedwidgets;
}

// Init Freemius.
wpinkedwidgets();
