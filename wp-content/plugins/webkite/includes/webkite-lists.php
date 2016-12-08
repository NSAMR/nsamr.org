<?php


// handle time stamp formatting
// $time expected to be mysql date
function webkite_timestamp($time){
  $curr_time = current_time( 'timestamp' );
  $timestamp = strtotime($time);
  $week = strtotime('+7 days', $timestamp);

  if( $week > $curr_time ){
    $timeformat = human_time_diff($timestamp, $curr_time);
    if ($timeformat == "1 day"){
      $timeformat = 'yesterday';
    } else {
      $timeformat .= ' ago';
    }
  } else {
    $timeformat = mysql2date( __( 'm/d/Y' ), $time );
  }

  // http://stackoverflow.com/questions/19780220/customizing-the-text-output-by-the-wordpress-function-human-time-diff
  $timeformat = str_replace('mins', 'minutes', $timeformat);
  return $timeformat;
}


function webkite_unset_welcome_screen_ajax() {
  update_option( 'webkite_show_welcome_screen', 'no' );
  die();
}
add_action( 'wp_ajax_webkite_unset_welcome_screen_ajax', 'webkite_unset_welcome_screen_ajax' );


/**
 * old webkite-lists-relationships.php file
 *
 * Manage Relationships between Pages and Lists
 * Page can be related to 1 List, List can be related to many Pages
 * Relationship created when using Create Page button on List page
 * and when inserting shortcode via tinymce List button
 *
 * stored in meta: _webkite_related_list, _webkite_related_page
 *
 */


// set relationship
function webkite_set_list_relationship($post_id, $list_id) {
  if ( ! $list_id || WEBKITE_POST_TYPE != get_post_type($list_id) )
    return;

  if ( 'page' == get_post_type($post_id) ){ // pages only
    update_post_meta($post_id, '_webkite_related_list', $list_id);

    $current_related_pages = get_post_meta($list_id, '_webkite_related_page');
    if ( $current_related_pages && in_array($post_id, $current_related_pages) )
      return;

    add_post_meta($list_id, '_webkite_related_page', $post_id);
  }
}


// unset relationship on deletion
function webkite_unset_list_relationship($postid) {
  global $post_type;

  // deleting a post/page
  if ( 'page' == $post_type ){
    $list_id = get_post_meta($postid, '_webkite_related_list', true);

    if ( $list_id == '' )
      return;

    delete_post_meta( $list_id, '_webkite_related_page', $postid );
  }

  // deleting a list
  if ( WEBKITE_POST_TYPE == $post_type ){
    $post_ids = get_post_meta($postid, '_webkite_related_page');

    if ( empty($post_ids) )
      return;

    foreach( $post_ids as $single ){
      delete_post_meta( $single, '_webkite_related_list', $postid );
    }
  }
}
add_action('before_delete_post', 'webkite_unset_list_relationship');


// set via ajax (tinymce button insertion)
function webkite_set_list_relationship_ajax(){
  global $post;

  if( isset($_POST['list_id']) && isset($_POST['post_id']) ){
    $list_id = $_POST['list_id'];
    $post_id = $_POST['post_id'];
    webkite_set_list_relationship($post_id, $list_id);
  }
  die();
}
add_action( 'wp_ajax_webkite_set_list_relationship_ajax', 'webkite_set_list_relationship_ajax' );
