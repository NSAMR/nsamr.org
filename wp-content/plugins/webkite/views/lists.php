<div class="wrap">

  <?php if ( "yes" == get_option('webkite_upgrade_required') ) {
    include( WEBKITE_RESULTS_DIR . 'views/upgrade-needed.php' );
  } else {
    wp_enqueue_script('webkite_iframe_js');

    if ( 'yes' == get_option( 'webkite_show_welcome_screen' ) ) {
  ?>
    <div id='show-welcome-screen' data-show='true'></div>
  <?php } ?>
    <div id='webkite-lists-iframe' class='webkite-lists'></div>
  <?php } ?>

</div>
