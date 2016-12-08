<?php 
  global $wp_version;
?>


<div id="webkite_help">
</div>

<div id="webkite_content"><div class="webkite-content-wrap">
  <h3 class="title">Please upgrade your WebKite plugin to continue.</h3>
  <p class="lead">You are currently using version <?php echo WEBKITE_RESULTS_VERSION ?> of the plugin.</p>

  <div>
    <a id="webkite-upgrade" href="<?php echo admin_url( 'plugins.php' ); ?>" class="button button-large button-primary webkite-button" style="<?php echo $webkite_authorized_display; ?>">Upgrade <span class="webkite-button-arrow-right"></span></a>
  </div>

  <div class="webkite-signin-wrapper webkite-clear">
    <div id="webkite-registered-info" style="<?php echo $webkite_authorized_display; ?>">
      <p><strong>This update to the plugin is required for enhanced features and security.</strong></p>
      <p>Need help upgrading the WebKite for Wordpress plugin? <a href='http://support.webkite.com/knowledgebase/articles/385104-how-do-i-upgrade-my-plugin' target="_blank">Read our support document detailing the upgrading process.</a></p>
    </div>
    <p>To stay up to date on the plugin, follow us on Twitter <a href="https://twitter.com/webkite">@webkite</a>. <br />
    For detailed support information, check out our <a href="http://support.webkite.com/">support page</a>.</p>
  </div>
</div></div>

