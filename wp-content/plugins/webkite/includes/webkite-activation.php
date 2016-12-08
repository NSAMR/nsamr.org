<?php


// base stats for usage
function webkite_collect_stats(){
  global $wp_version;
  $site_url = get_site_url();
  $os = php_uname('s');
  $os_version = php_uname('v');
  $plugins = get_plugins();
  $theme = wp_get_theme();
  $parent = $theme->parent();
  
  $data = array();
  $data['url'] = $site_url;
  $data['wordpress_version'] = $wp_version;
  $data['php_version'] = PHP_VERSION;
  $data['OS'] = array();
  $data['OS']['name'] = $os;
  $data['OS']['version'] = $os_version;
  
  $data['plugins'] = $plugins;
  
  $data['theme'] = array();
  $data['theme']['name'] = $theme->get('Name');
  $data['theme']['version'] = $theme->get('Version');
  $data['theme']['theme_uri'] = $theme->get('ThemeURI');
  $data['theme']['description'] = $theme->get('Description');

  if($parent){
    $data['theme']['parent'] = array();
    $data['theme']['parent']['name'] = $parent->get('Name');
    $data['theme']['parent']['version'] = $parent->get('Version');
    $data['theme']['parent']['theme_uri'] = $parent->get('ThemeURI');
  }
  
  $json_data = json_encode($data);
  $url = WEBKITE_GRAYSKULL_ENDPOINT . '/embeddings/pegasus/' . WEBKITE_GRAYSKULL_VERSION;
  $args = array(
    'headers' => array(
      'accept' => 'application/vnd.webkite.config+json; version=' . WEBKITE_GRAYSKULL_VERSION,
      'Webkite-Agent'  => 'Pegasus/' . WEBKITE_RESULTS_VERSION,
      'content-type' => 'application/json',
    ),
    'body' => $json_data
  );
  
  $response = wp_remote_post($url, $args);
}


// check requirements (PHP + WP version)
function webkite_activation_reqs( $wp = WEBKITE_SUPPORTED_WP_VERSION, $php = WEBKITE_SUPPORTED_PHP_VERSION ) {
  global $wp_version;
  if ( version_compare( PHP_VERSION, $php, '<' ) )
    $flag = 'PHP';
  elseif ( version_compare( $wp_version, $wp, '<' ) )
    $flag = 'WordPress';
  else
    return;
  $version = 'PHP' == $flag ? $php : $wp;
  deactivate_plugins( basename( __FILE__ ) );
  wp_die('<p>The <strong>WebKite</strong> plugin requires '.$flag.'  version '.$version.' or greater.</p>',
    'Plugin Activation Error',  array( 'response'=>200, 'back_link'=>TRUE ) );
}


// temporary. Need to rename certain post meta keys
function webkite_update_meta_key( $old_key=null, $new_key=null ){
  global $wpdb;
   
  $query = "UPDATE ".$wpdb->prefix."postmeta SET meta_key = '".$new_key."' WHERE meta_key = '".$old_key."'";
  $results = $wpdb->get_results( $query, ARRAY_A );
   
  return $results;
}
