<?php

function webkite_get_access_token() {
  $parameters = array(
    'client_id' => get_option('webkite_client_id'),
    'client_secret' => get_option('webkite_client_secret'),
    'grant_type' => 'client_credentials'
  );
  $token_endpoint = WEBKITE_TOKEN_URI . '/oauth/token';
  $query = $token_endpoint . '?' . http_build_query($parameters, null, '&');

  $auth_response = wp_remote_post($query);

  if($auth_response['response']['code'] < 300) {
    $response_body = json_decode($auth_response['body'], true);
    return $response_body['access_token'];
  }
}

function webkite_check_migration(){
  $migration_status = get_option(WEBKITE_MIGRATION_OPTION);
  
  if ( $migration_status )
    return false;
    
  $args = array(
    'post_type' => WEBKITE_POST_TYPE,
    'posts_per_page' => -1,
    'post_status' => 'publish,draft',
    'meta_query' => array(
      array(
        'key' => WEBKITE_MIGRATION_METAKEY,
        'compare' => 'NOT EXISTS',
        'value' => 'bug #23268'
      )
  ));
  
  $unmigrated = get_posts( $args );
  
  if (!$unmigrated){
    update_option(WEBKITE_MIGRATION_OPTION, 1);
  } else {
    update_option(WEBKITE_MIGRATION_OPTION, 0);
  }
  return $unmigrated;
}

function webkite_p2_migrate_jc($access_token, $jcID){
  global $webkite_dev_mode;

  if(get_post_meta($jcID, WEBKITE_MIGRATION_METAKEY, true))
    return;

  $dataset = get_post_meta($jcID, '_webkite_dataset', true);
  $theme_name = get_post_meta($jcID, '_webkite_theme_name', true);
  $filters = get_post_meta($jcID, '_webkite_filters', true);
  $sorts = get_post_meta($jcID, '_webkite_sorts', true);
  $style = get_post_meta($jcID, '_webkite_color_scheme', true);
  $perPage = (int) get_post_meta($jcID, '_webkite_item_pp', true);
  $language = get_post_meta($jcID, '_webkite_dataset_alias', true);

  if ( empty( $sorts ) )
    $sorts = array();

  if ( empty( $filters ) )
    $filters = array();

  $post_data = array(
    'theme_org' => 'Webkite-Themes',
    'theme_name' => $theme_name,
    'theme_version' => ($webkite_dev_mode ? 'master': 'stable'),
    'options' => array(
      'filters' => $filters,
      'sorts' => $sorts,
      'style' => $style,
      'per_page' => $perPage,
      'language' => $language
    ),
    'tag_key' => 'krang-jc-for',
    'tag_value' => 'wordpress'
  );
  
  // for pre 1.1.4 lists dataset may not exist but spreadsheet may
  if ( empty( $dataset ) ){
    $dataset = get_post_meta($jcID, '_webkite_spreadsheet_key', true);
    if ( empty( $dataset ) )
      return;
  }
  
  $jc_post_url = WEBKITE_GRAYSKULL_ENDPOINT . '/datasets/' . $dataset . '/jafar_configurations';
  $jc_post_result = wp_remote_post($jc_post_url, array(
    'headers' => array(
      'X-Webkite-Agent' => 'Pegasus/' . WEBKITE_RESULTS_VERSION,
      'Accept' => 'application/vnd.webkite.config+json; version=2',
      'Authorization' => 'Bearer ' . $access_token
     ),
    'body' => json_encode($post_data)
  ));

  if($jc_post_result['response']['code'] == 201) {
    $response_body = json_decode($jc_post_result['body'], true);
    add_post_meta($jcID, WEBKITE_MIGRATION_METAKEY, $response_body['uuid']);
  } elseif ($jc_post_result['response']['code'] == 404) {
    add_post_meta($jcID, WEBKITE_MIGRATION_ERROR_METAKEY, 'error');
  }
}

function webkite_p2_migrate($jcs){
  $access_token = webkite_get_access_token();

  foreach($jcs as $jc){
    webkite_p2_migrate_jc($access_token, $jc);
  }
}

// unset upgrade when on the correct version
function webkite_auto_migration(){
  $to_migrate = webkite_check_migration();
  
  if ( !empty( $to_migrate ) ){
    add_option( 'webkite_show_welcome_screen', 'yes' );

    $migrate_ids = array();
    foreach ( $to_migrate as $list ){
      if ($list->post_status == 'publish')
        $migrate_ids[] = $list->ID;
    }
    webkite_p2_migrate($migrate_ids);
    webkite_check_migration();
  }
}
