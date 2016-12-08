<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

    class ChildThemeConfigurator {
        
        static $instance;
        static $plugin = 'child-theme-configurator/child-theme-configurator.php';
        static $oldpro = 'child-theme-configurator-plugins/child-theme-configurator-plugins.php';
        static $ctcpro = 'child-theme-configurator-pro/child-theme-configurator-pro.php';
        
        static function init() {
            
            // verify WP version support
            global $wp_version;
            if ( version_compare( $wp_version, CHLD_THM_CFG_MIN_WP_VERSION, '<' ) ):
                add_action( 'admin_notices',        'ChildthemeConfigurator::version_notice' );
                return;
            endif;
            add_action( 'admin_init',               'ChildThemeConfigurator::check_ctc_pro', 15 );
            // setup admin hooks
            if ( is_multisite() )
                add_action( 'network_admin_menu',   'ChildThemeConfigurator::network_admin' );
            add_action( 'admin_menu',               'ChildThemeConfigurator::admin' );
            // add plugin upgrade notification
            add_action( 'in_plugin_update_message-' . self::$plugin, 
                                                    'ChildThemeConfigurator::upgrade_notice', 10, 2 );
            // setup ajax actions
            add_action( 'wp_ajax_ctc_update',       'ChildThemeConfigurator::save' );
            add_action( 'wp_ajax_ctc_query',        'ChildThemeConfigurator::query' );
            add_action( 'wp_ajax_ctc_dismiss',      'ChildThemeConfigurator::dismiss' );
            // initialize languages
            add_action( 'init',                     'ChildThemeConfigurator::lang' );
            // prevent old Pro activation
            if ( isset( $_GET[ 'action' ] ) && isset( $_GET[ 'plugin' ] ) && 'activate' == $_GET[ 'action' ] && self::$oldpro == $_GET[ 'plugin' ] )
                unset( $_GET[ 'action' ] );
        }
        
        static function ctc() {
            // create admin object
            if ( !isset( self::$instance ) ):
                include_once( CHLD_THM_CFG_DIR . '/includes/class-ctc-admin.php' );
                self::$instance = new ChildThemeConfiguratorAdmin( __FILE__ );
            endif;
            return self::$instance;
        }
        
        static function lang() {
            // initialize languages
            load_plugin_textdomain( 'child-theme-configurator', FALSE, basename( CHLD_THM_CFG_DIR ) . '/lang' );
        }
        
        static function save() {
            // ajax write
            self::ctc()->ajax_save_postdata();
        }
        
        static function query() {
            // ajax read
            self::ctc()->ajax_query_css();
        }
                
        static function network_admin() {
            $hook = add_theme_page( 
                    __( 'Child Theme Configurator', 'child-theme-configurator' ), 
                    __( 'Child Themes', 'child-theme-configurator' ), 
                    'install_themes', 
                    CHLD_THM_CFG_MENU, 
                    'ChildThemeConfigurator::render' 
            );
            add_action( 'load-' . $hook, 'ChildThemeConfigurator::page_init' );
        }
        
        static function admin() {
            $hook = add_management_page(
                    __( 'Child Theme Configurator', 'child-theme-configurator' ), 
                    __( 'Child Themes', 'child-theme-configurator' ), 
                    'install_themes', 
                    CHLD_THM_CFG_MENU, 
                    'ChildThemeConfigurator::render' 
            );
            add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'ChildThemeConfigurator::action_links' );
            add_action( 'load-' . $hook, 'ChildThemeConfigurator::page_init' );        
        }
        
        static function action_links( $actions ) {
            $actions[] = '<a href="' . admin_url( 'tools.php?page=' . CHLD_THM_CFG_MENU ). '">' 
                . __( 'Child Themes', 'child-theme-configurator' ) . '</a>' . LF;
            return $actions;
        }
        
        static function page_init() {
            // start admin controller
            self::ctc()->ctc_page_init();
        }
        
        static function render() {
            // display admin page
            self::ctc()->render();
        }
        
        static function version_notice() {
            deactivate_plugins( plugin_basename( __FILE__ ) );
            unset( $_GET[ 'activate' ] );
            echo '<div class="notice-warning notice is-dismissible"><p>' . 
                sprintf( __( 'Child Theme Configurator requires WordPress version %s or later.', 'child-theme-configurator' ), 
                CHLD_THM_CFG_MIN_WP_VERSION ) . '</p></div>' . LF;
        }
        
        static function dismiss() {
            self::ctc()->ajax_dismiss_notice();
        }
    
        static function upgrade_ctc_pro_notice() {
            $key = 'unregistered';
            if ( ( $options = get_site_option( CHLD_THM_CFG_OPTIONS ) )
                && is_array( $options ) 
                && isset( $options[ 'update_key' ] ) ) // old versions were unpacking as object type instead of array type
                $key = $options[ 'update_key' ];
                
            $download = '<a href="' . LILAEAMEDIA_URL . '/ctc-pro-latest-version/' . ( empty( $key ) 
                ? '' 
                : '?lilaea_update_key=' . $key ) . '" target="_blank">' 
                . __( 'Click here to download and save the latest version to your computer.', 'child-theme-configurator' ) . '</a>';
                
            $install = '<a href="' . ( is_multisite() 
                ? network_admin_url( 'plugin-install.php?tab=upload' ) 
                : admin_url( 'plugin-install.php?tab=upload' ) ) . '">' 
                . __( 'Click here to switch to the plugin install page.', 'child-theme-configurator' ) . '</a>';
    ?>
    <div class="notice-warning notice is-dismissible">
<p><?php printf( __( 'Child Theme Configurator Pro version %s is not compatible with this version of Child Theme Configurator and has been deactivated.'), CHLD_THM_CFG_PLUGINS_VERSION ); ?></p>
<p><strong><?php _e( 'Please follow these steps carefully to upgrade to the latest version.', 'child-theme-configurator' ); ?></strong></p>         
<ol><li><?php _e( 'DO NOT DELETE THE EXISTING PRO PLUGIN or you will lose your settings.', 'child-theme-configurator' ); ?></li>
<li><?php echo $download; ?></li>
<li><?php echo $install; ?></li>
<li><?php printf( __( 'Click the "Browse" button in the center of the page (NOT the button at the top) and select the "%s" file from your computer.', 'child-theme-configurator' ), 'child-theme-configurator-pro-' . CHLD_THM_CFG_PRO_MIN_VERSION . '.zip' ); ?></li>
<li><?php _e( 'Click "Install Now."', 'child-theme-configurator' ); ?></li>
<li><?php _e( 'Click "Activate Plugin"', 'child-theme-configurator' ); ?></li>
<li><?php _e( 'WordPress will automatically remove the original plugin when you activate the new version.', 'child-theme-configurator' ); ?></li></ol>
    </div>
    <?php
        }
    
        static function deactivate_ctc_pro() {
            if ( current_user_can( 'activate_plugins' ) )
                deactivate_plugins( self::$oldpro, FALSE, is_network_admin() );
        }
        
        static function check_ctc_pro() {
            
            if ( file_exists( trailingslashit( dirname( CHLD_THM_CFG_DIR ) ) . self::$oldpro ) 
                && ( $oldpro = get_plugins( '/' . dirname( self::$oldpro ) ) ) ): // get_plugins() throwing a FNF notice for some code checkers
                $version = isset( $oldpro[ basename( self::$oldpro ) ] ) ? $oldpro[ basename( self::$oldpro ) ][ 'Version' ] : '';
                self::deactivate_ctc_pro();
                defined( 'CHLD_THM_CFG_PLUGINS_VERSION' ) or define( 'CHLD_THM_CFG_PLUGINS_VERSION', $version );
                add_action( 'admin_notices',        'ChildThemeConfigurator::upgrade_ctc_pro_notice' );
                add_action( 'network_admin_notices','ChildThemeConfigurator::upgrade_ctc_pro_notice' );
            endif;
            
        }
        
        static function upgrade_notice( $current, $new ){
           if ( isset( $new->upgrade_notice ) && strlen( trim ( $new->upgrade_notice ) ) )
                echo '<p style="background-color:#d54d21;padding:1em;color:#fff;margin: 9px 0">'
                    . esc_html( $new->upgrade_notice ) . '</p>';
        }
        
    }
    
    defined( 'LILAEAMEDIA_URL' ) or 
    define( 'LILAEAMEDIA_URL',                  "http://www.lilaeamedia.com" );
    defined( 'CHLD_THM_CFG_DOCS_URL' ) or 
    define( 'CHLD_THM_CFG_DOCS_URL',            "http://www.childthemeconfigurator.com" );
    define( 'CHLD_THM_CFG_VERSION',             '2.1.2' );
    define( 'CHLD_THM_CFG_PREV_VERSION',        '1.7.9.1' );
    define( 'CHLD_THM_CFG_MIN_WP_VERSION',      '3.7' );
    define( 'CHLD_THM_CFG_PRO_MIN_VERSION',     '2.2.0' );
    defined( 'CHLD_THM_CFG_BPSEL' ) or 
    define( 'CHLD_THM_CFG_BPSEL',               '2500' );
    defined( 'CHLD_THM_CFG_MAX_RECURSE_LOOPS' ) or 
    define( 'CHLD_THM_CFG_MAX_RECURSE_LOOPS',   '1000' );
    defined( 'CHLD_THM_CFG_MENU' ) or 
    define( 'CHLD_THM_CFG_MENU',                'chld_thm_cfg_menu' );

    add_action( 'plugins_loaded', 'ChildThemeConfigurator::init' );
