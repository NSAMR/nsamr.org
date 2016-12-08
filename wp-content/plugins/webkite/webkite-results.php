<?php
/*
Plugin Name: WebKite
Plugin URI: http://webkite.com
Description: WebKite makes it easy to add faceted search to your WordPress site using a familiar spreadsheet interface.
Version: 2.0.1
Author: WebKite
Author URI: http://webkite.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// Setting constants
define( 'WEBKITE_RESULTS_DIR', plugin_dir_path( __FILE__ ) );
define( 'WEBKITE_RESULTS_URL', plugin_dir_url(__FILE__) );
define( 'WEBKITE_POST_TYPE', 'webkite_list' );
define( 'WEBKITE_RESULTS_VERSION_KEY', 'webkite_results_version' );
define( 'WEBKITE_RESULTS_VERSION', '2.0.1' );
define( 'WEBKITE_SUPPORTED_PHP_VERSION', '5.2.17' );
define( 'WEBKITE_SUPPORTED_WP_VERSION', '3.8.1' );
define( 'WEBKITE_GRAYSKULL_VERSION', '2');
define( 'WEBKITE_AUTH_VERSION', '1');

define( 'WEBKITE_MIGRATION_OPTION', 'webkite_jc_migration_complete');
define( 'WEBKITE_MIGRATION_METAKEY', '_webkite_jc');
define( 'WEBKITE_MIGRATION_ERROR_METAKEY', '_webkite_jc_error');


// endpoints
require_once( WEBKITE_RESULTS_DIR . 'includes/webkite-endpoints.php' );
global $webkite_dev_mode;

//for localizing enqueued js
global $webkite_admin_object;
$webkite_admin_object = array(
    'admin_endpoint' => admin_url(),
    'ajax_endpoint' => admin_url('admin-ajax.php'),
    'grayskull_endpoint' => WEBKITE_GRAYSKULL_ENDPOINT,
    'auth_endpoint' => WEBKITE_TOKEN_URI,
    'grayskull_version' => WEBKITE_GRAYSKULL_VERSION,
    'webkite_version' => WEBKITE_RESULTS_VERSION,
    'webkite_admin_url' => WEBKITE_ADMIN_URL,
    'webkite_hbs_url' => WEBKITE_HB_PATH,
    'webkite_iframe_origin' => WEBKITE_IFRAME_ORIGIN
);

if(is_admin()) {
  require_once( WEBKITE_RESULTS_DIR . 'includes/webkite-p2-migration.php' ); // p2 migration
  require_once( WEBKITE_RESULTS_DIR . 'includes/webkite-activation.php'); // plugin activation 
  require_once( WEBKITE_RESULTS_DIR . 'includes/webkite-lists.php' ); // general list creation and management and handling list/page relationships

  add_action( "admin_init", "webkite_admin_init" );
  add_action( "admin_menu", "webkite_plugin_menu" );
}

// shortcode
require_once( WEBKITE_RESULTS_DIR . 'webkite_shortcode.php' );

// activation
function webkite_activate(){
  webkite_collect_stats();
  webkite_activation_reqs();
  
  webkite_auto_migration();
  
  add_option( WEBKITE_RESULTS_VERSION_KEY, WEBKITE_RESULTS_VERSION ); // add version
  update_option('webkite_upgrade_required','no');
  webkite_update_meta_key('_webkite_view', '_webkite_theme'); //temporary rename meta key 
  
  $cur_version = get_option( WEBKITE_RESULTS_VERSION_KEY );
  if ( $cur_version !=  WEBKITE_RESULTS_VERSION ){
    update_option( WEBKITE_RESULTS_VERSION_KEY, WEBKITE_RESULTS_VERSION ); // update version
  }
}
register_activation_hook( WEBKITE_RESULTS_DIR.basename(__FILE__), 'webkite_activate' );

// unset upgrade when on the correct version
function webkite_upgrade_set_options(){
  $cur_version = get_option( WEBKITE_RESULTS_VERSION_KEY );
  if ( $cur_version != WEBKITE_RESULTS_VERSION ){
    update_option( WEBKITE_RESULTS_VERSION_KEY, WEBKITE_RESULTS_VERSION ); // update version
    update_option('webkite_upgrade_required','no');
    webkite_auto_migration();
  }
}
add_action( 'plugins_loaded', 'webkite_upgrade_set_options' );

// register scripts and styles
function webkite_admin_init(){
  global $webkite_admin_object;
  wp_register_style('webkite_admin_css', WEBKITE_RESULTS_URL . 'css/webkite_admin.css', array(), WEBKITE_RESULTS_VERSION ); 
  wp_register_style('webkite_editor_dialog_css', WEBKITE_RESULTS_URL . 'css/webkite_editor_dialog.css', array(), WEBKITE_RESULTS_VERSION ); 
  wp_register_script('webkite_editor_js', WEBKITE_RESULTS_URL . 'js/webkite_editor.js', array(), WEBKITE_RESULTS_VERSION );
  wp_localize_script('webkite_editor_js', 'webkite_admin_object', $webkite_admin_object);
  wp_register_script('webkite_migration_view_js', WEBKITE_RESULTS_URL . 'js/migration.js', array(), WEBKITE_RESULTS_VERSION );
  wp_register_script( 'webkite_iframe_js', WEBKITE_RESULTS_URL . 'js/iframe.js', array(), WEBKITE_RESULTS_VERSION );
  wp_localize_script( 'webkite_iframe_js', 'webkite_admin_object', $webkite_admin_object );
}

// Add List editor button on add/edit post views (post_type=page)
global $pagenow;
if (! empty($pagenow)  && ('post-new.php' == $pagenow || 'post.php' == $pagenow ) ){
  global $typenow;
  // when editing pages, $typenow isn't set until later!
  if (empty($typenow)) {
    // try to pick it up from the query string
    if (!empty($_GET['post'])) {
      $post = get_post($_GET['post']);
      $typenow = $post->post_type;
    }
  }  
  if ( ( isset($_GET['post_type']) && 'page' == $_GET['post_type'] ) || 'page' == $typenow  ) {
    include_once( WEBKITE_RESULTS_DIR . 'includes/webkite-wp-editor.php' );    
  }
}

// enqueue scripts and css to WebKite admin pages
function webkite_admin_scripts(){
  add_action('admin_enqueue_scripts', 'webkite_enqueue_admin_css' );
  wp_enqueue_script('underscore');
}
function webkite_enqueue_admin_css(){
  wp_enqueue_style('webkite_admin_css');
  wp_enqueue_style('dashicons');
}


function webkite_check_versions(){
  $version_transient = get_transient( 'webkite_version_check' );
  $upgrade_required = get_option( 'webkite_upgrade_required' );
  
  // transient expired or missing, check versions
  if ( !$version_transient && 'yes' != $upgrade_required ){
    $grayskull = webkite_check_grayskull_version();
    $webkite_auth = webkite_check_auth_version();

    if('406' == $webkite_auth || '406' == $grayskull){
      update_option('webkite_upgrade_required','yes');
    } else {
      update_option('webkite_upgrade_required','no');
    }
    
    set_transient('webkite_version_check', 'checked', 1 * MINUTE_IN_SECONDS);
  }  
}
add_action( 'admin_init', 'webkite_check_versions' );

// check grayskull version
function webkite_check_grayskull_version(){
  $url = WEBKITE_GRAYSKULL_ENDPOINT . '/version';
  $args = array(
    'method' => 'GET',
    'headers' => array(
      'accept' => 'application/vnd.webkite.config+json; version=' . WEBKITE_GRAYSKULL_VERSION,
      'Webkite-Agent'  => 'Pegasus/' . WEBKITE_RESULTS_VERSION,      
    )
  );
  $response = wp_remote_post($url, $args);
  $status_code = wp_remote_retrieve_response_code( $response );
  return $status_code;
}

// check auth version
function webkite_check_auth_version(){
  $url = WEBKITE_TOKEN_URI . '/api_versions';
  $args = array(
    'method' => 'GET',
    'headers' => array(
      'Accept' => "application/vnd.webkite.auth.v".WEBKITE_AUTH_VERSION."+json",
    )
  );
  $response = wp_remote_post($url, $args);
  $status_code = wp_remote_retrieve_response_code( $response );
  return $status_code;
}

// intercom output
function webkite_intercom_output(){
  $email = get_option('webkite_client_email');
  $date = webkite_account_timestamp();
  
  if ( ! $date )
    return;
    
  $settings = array(
    'app_id'    => WEBKITE_INTERCOM_ID,
    'email'     => $email,
    'create_at' => $date
  );
  $settings['user_hash'] = hash_hmac("sha256", $email, "P10qvQ_NsAj7LbI4gF4jrmEDypYEib2yf0VXlC40");
  
  $output  = '<script id="IntercomSettingsScriptTag">';
  $output .= 'window.settingsForIntercom = ' . json_encode( (object) $settings ) . ';' . "\n";
  $output .= '</script>' . "\n";
  $output .= '<script>(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic(\'reattach_activator\');ic(\'update\',intercomSettings);}else{var d=document;var i=function(){i.c(arguments)};i.q=[];i.c=function(args){i.q.push(args)};w.Intercom=i;function l(){var s=d.createElement(\'script\');s.type=\'text/javascript\';s.async=true;s.src=\'https://widget.intercom.io/widget/fcc31f41969f0373fc4f36198ef77be9307df8aa\';var x=d.getElementsByTagName(\'script\')[0];x.parentNode.insertBefore(s,x);}if(w.attachEvent){w.attachEvent(\'onload\',l);}else{w.addEventListener(\'load\',l,false);}}})()</script>' . "\n";
  
  echo $output;
}

// account timestamp.
function webkite_account_timestamp(){
  $client_id = get_option('webkite_client_id');
  $client_secret = get_option('webkite_client_secret');
  $client_email = get_option('webkite_client_email');
  
  if ( ! $client_id || ! $client_secret || ! $client_email )
    return false;
    
  $time = get_option( 'webkite_client_created_at' );
  
  if( ! $time )
    update_option( 'webkite_client_created_at', current_time( 'timestamp', 1 ) );
    
  $timestamp = get_option( 'webkite_client_created_at' );
  return $timestamp;
}

// add plugin action links
function webkite_action_links($links){
  return array_merge(
    array(
      'settings' => '<a href="' . admin_url('admin.php?page=webkite_list') . '">Settings</a>'
    ),
    $links
  );
}
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'webkite_action_links' );


// add migration problems message on lists page
// see foreach in webkite_plugin_menu for add_action portion
function webkite_run_migration_notice(){
  $migration_status = get_option('webkite_jc_migration_complete');
  if( !$migration_status ){
    add_action('admin_notices','webkite_migration_notice');
  }
}
function webkite_migration_notice(){
  echo '<div class="update-nag">We had problems moving some of your Lists. See the <a href="'. admin_url('admin.php?page=webkite_migration') .'">Lists With Errors</a> page for more information.</div>';
}

// build menu
function webkite_plugin_menu() {
  $migrated = get_option( WEBKITE_MIGRATION_OPTION );
  
  $webkite_menu = array();
  $webkite_menu['menu'] = add_menu_page( 'Webkite', 'WebKite', 'manage_options', 'webkite_list', 'webkite_list_management_page', 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkxheWVyXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzRweCIgaGVpZ2h0PSIzMHB4IiB2aWV3Qm94PSIwIDAgMzQgMzAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDM0IDMwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxnPg0KCTxnPg0KCQk8cGF0aCBmaWxsPSIjRkZGRkZGIiBkPSJNMjAuMTY0LDEzLjFjLTEuNDE2LDYuNzgtNS4xNzQsMTQuNDkyLTYuMjkzLDE2LjYyN2MyLjk4OS0zLjU1Miw5LTEwLjYyLDEwLjA5LTE0LjUyOA0KCQkJQzIyLjQ2NywxMy44OTksMjEuMTA3LDEzLjQzNiwyMC4xNjQsMTMuMXoiLz4NCgkJPHBhdGggZmlsbD0iI0ZGRkZGRiIgZD0iTTEzLjg3MSwyOS43MjhjMC4wMzQtMC4wNDEsNC4yMTMtMTAuMjcyLDUuNTE4LTE2Ljg2NmMtMy42ODQtMS40NDUtMTAuNzcyLTEuNTY4LTExLjQ4Mi0xLjU0DQoJCQlDMTIuNzIsMTYuNjc1LDE0LjMwNSwyNi41NjIsMTMuODcxLDI5LjcyOHoiLz4NCgk8L2c+DQoJPGc+DQoJCTxwYXRoIGZpbGw9IiNGRkZGRkYiIGQ9Ik0xOC41NDUsMC4yNzJjMC45MSwxLjE3NiwyLjcxMyw3LjAyNywxLjc0NCwxMi4xNDdjMS43ODMsMC41NDYsMy4zNDQsMi4wMTYsMy42NzIsMi43OA0KCQkJQzI0LjIwNSwxMS42MDQsMjAuNDk2LDIuMDc3LDE4LjU0NSwwLjI3MnoiLz4NCgkJPHBhdGggZmlsbD0iI0ZGRkZGRiIgZD0iTTcuOTA3LDExLjMyMWMzLjM2Ny0wLjU5Myw4LjgwMS0wLjE1LDExLjYyNSwwLjc5YzAuOTQ3LTcuNDgxLTAuNDY3LTEwLjY0Mi0wLjk4Ni0xMS44MzgNCgkJCUMxNC40OCw2LjUxOSwxMi42OTYsOC41MjMsNy45MDcsMTEuMzIxeiIvPg0KCTwvZz4NCjwvZz4NCjwvc3ZnPg0K');

  if ( !$migrated ) {
    $webkite_menu['lists'] = add_submenu_page( 'webkite_list', 'WebKite Lists', 'Lists', 'manage_options', 'webkite_list', 'webkite_list_management_page');
    $webkite_menu['migration'] = add_submenu_page( 'webkite_list', 'WebKite Lists Migration', 'Lists With Errors', 'manage_options', 'webkite_migration', 'webkite_migration_page');
  }

  // load scripts/styles and output intercom code
  foreach( $webkite_menu as $key => $value ){
    add_action( 'load-' . $value, 'webkite_admin_scripts' );
    add_action( 'admin_footer-' . $value, 'webkite_intercom_output' );
    
    if ($key == 'lists' || $key == 'menu'){
      add_action( 'load-' . $value, 'webkite_run_migration_notice');
    }
  }
  
  // intercom options ouput
  
  // set All Lists in active state, js keeps submenu open see js/webkite-admin.js @wp_activate_menu
  #if( isset($_GET['page'])){
  #  if( $_GET['page'] == 'webkite_new_list' || $_GET['page'] == 'webkite_edit_list'){
  #    global $submenu_file;
  #    $submenu_file = 'webkite_list';
  #  }
  #}
}

// add migration page
function webkite_migration_page() {
  if ( !current_user_can( 'manage_options' ) )  {
    wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
  }
  require_once( WEBKITE_RESULTS_DIR . 'views/migration.php');
}


// add lists page
function webkite_list_management_page() {
  if ( !current_user_can( 'manage_options' ) )  {
    wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
  }
  require_once( WEBKITE_RESULTS_DIR . 'views/lists.php');
}


// build custom post type
function webkite_list_type_init(){
  $labels = array(
    'name'               => 'Lists',
    'singular_name'      => 'List',
    'add_new'            => 'Add New',
    'add_new_item'       => 'Add New List',
    'edit_item'          => 'Edit List',
    'new_item'           => 'New List',
    'all_items'          => 'All Lists',
    'view_item'          => 'View List',
    'search_items'       => 'Search Lists',
    'not_found'          => 'No lists found',
    'not_found_in_trash' => 'No lists found in Trash',
    'parent_item_colon'  => '',
    'menu_name'          => 'Lists'
  );

  $args = array(
    'labels'             => $labels,
    'public'             => false,
    'exclude_from_search'=> true,
    'publicly_queryable' => false,
    'show_ui'            => false,
    'show_in_menu'       => 'webkite_mgmt_menu',
    'query_var'          => false,
    'rewrite'            => false,
    'capability_type'    => 'page',
    'has_archive'        => false,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => false,
    '_edit_link'         => 'admin.php?page=webkite_edit_list&action=edit&post=%d'
  );

  register_post_type( WEBKITE_POST_TYPE, $args );
}
add_action( 'init', 'webkite_list_type_init' );


// don't allow manual url shenanigans
function webkite_disable_edit_list_default(){
  if ( get_current_screen()->post_type == WEBKITE_POST_TYPE )
    wp_die( "You can't access WebKite lists here" );
}
add_action( 'load-post.php', 'webkite_disable_edit_list_default' );
add_action( 'load-edit.php', 'webkite_disable_edit_list_default' );

// if somehow the post.php page loads using a list ID, it'll be empty
function webkite_remove_metaboxes(){
  remove_meta_box('slugdiv', WEBKITE_POST_TYPE, 'normal');
  remove_meta_box('submitdiv', WEBKITE_POST_TYPE, 'side');
}
add_action( 'add_meta_boxes', 'webkite_remove_metaboxes', 11 );

// render a view
function wk_render_view($view, $data = null){
  ($data) ? extract($data) : null;
  
  ob_start();
  include( WEBKITE_RESULTS_DIR . '/views/' . $view . '.php');
  $view = ob_get_contents();
  ob_end_clean();
  
  return $view;
}

// fix icon issue in some IEs
function webkite_admin_icon_fix(){
  echo '<style>#adminmenu .dashicons > br {font-family:"Open Sans", sans-serif;} #adminmenu #toplevel_page_webkite_mgmt_menu div.wp-menu-image.svg{background-size:28px auto;}</style>';
}
add_action( 'admin_head', 'webkite_admin_icon_fix' );

// add async property to jafar script tag for legacy shortcodes
// http://wordpress.stackexchange.com/questions/38319/how-to-add-defer-defer-tag-in-plugin-javascripts/38335#38335
function add_async_to_jafar( $url ){
  if ( FALSE === strpos( $url, WEBKITE_JAFAR_SCRIPT ) ) {
    return $url;
  }
  return "$url' async='async";
}
add_filter( 'clean_url', 'add_async_to_jafar', 11, 1 );
