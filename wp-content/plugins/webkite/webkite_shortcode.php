<?php

// Begin - Custom Shortcode
// [webkite-results]
//
function webkite_results_shortcode($atts, $content, $tag) {
  extract( shortcode_atts( array(
    'id' => '0'
  ), $atts ) );
  
  /* when we can actually fully use a "list"
  $list_type = get_post_type($id);
  if ( $list_type != 'webkite_list' )
    return;
  */
  
  /**
   * List Meta
   * Array of all post meta for designated List
   *
   * _webkite_dataset - list identifier
   * _webkite_list_type - Type of List
   * _webkite_view - Chosen theme
   * _webkite_color_scheme - Chosen color scheme
   * _webkite_item_pp - Items per page
   * _webkite_filters - active filters (serialized array)
   * _webkite_sorts - active sorts (serialized array)
   * _webkite_dataset_alias - Chosen language
   *
   * _webkite_jc - Override config for syndication
   */
  $list_meta = get_post_custom( $id );

  // if list is migrated, use the migrated configuration
  if(isset($list_meta['_webkite_jc'][0])) {
    return webkite_jc_render($list_meta['_webkite_jc'][0]);
  }

  // REQUIRED
  // dataset for the list, fallback to global dataset if it doesn't exist.
  $dataset = isset($list_meta['_webkite_dataset'][0]) ? $list_meta['_webkite_dataset'][0] : null;
  
  // allow manual dataset setting via shortcode
  if(isset($atts["dataset"])) {
    $dataset = $atts["dataset"];
  }
  
  // nothing if no dataset
  if (!$dataset)
    return;
  
  wp_register_script('webkite_embed', WEBKITE_JAFAR_SCRIPT);
  wp_enqueue_script('webkite_embed');

  if (isset($list_meta['_webkite_theme_name'][0])) {
    $theme = 'Webkite-Themes/' . $list_meta['_webkite_theme_name'][0];
  } elseif (isset($list_meta['_webkite_theme'][0])) {
    $theme = 'Webkite-Themes/' . $list_meta['_webkite_theme'][0];
  } else {
    $theme = null;
  }

  $theme_style = isset($list_meta['_webkite_color_scheme'][0]) ? $list_meta['_webkite_color_scheme'][0] : null;
  $perpage = isset($list_meta['_webkite_item_pp'][0]) ? $list_meta['_webkite_item_pp'][0] : null;
  $filters = !empty($list_meta['_webkite_filters'][0]) ? json_encode(maybe_unserialize($list_meta['_webkite_filters'][0])) : null;
  $sorts = !empty($list_meta['_webkite_sorts'][0]) ? json_encode(maybe_unserialize($list_meta['_webkite_sorts'][0])) : null;
  $language = isset($list_meta['_webkite_dataset_alias'][0]) ? $list_meta['_webkite_dataset_alias'][0] : null;

  // all manual theme setting via shortcode
  if(isset($atts["theme"])) {
    $theme = $atts["theme"];
  }
      
  ob_start();
  require "views/results_javascript.html.php";
  return ob_get_clean();
}
add_shortcode("webkite_results", "webkite_results_shortcode");

// [webkite-jc]

function webkite_jc_render($jc_uuid) {
  ob_start();
  require "views/jc_javascript.html.php";
  return ob_get_clean();
}

function webkite_jc_shortcode($atts, $content, $tag) {
  extract( shortcode_atts( array(
    'id' => '0'
  ), $atts ) );

  return webkite_jc_render($id);
}
add_shortcode("webkite", "webkite_jc_shortcode");

// End - Custom Shortcode
