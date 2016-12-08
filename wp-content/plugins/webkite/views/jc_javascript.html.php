<script data-url='<?php echo WEBKITE_GRAYSKULL_ENDPOINT; ?>/list_settings/<?php echo $jc_uuid; ?>'
        id='webkite-results'
        class='webkite-results'
        type='application/javascript'>
  (function() {
    if (window.Webkite === undefined || window.Webkite.jafarState === undefined) {
      var wk = document.createElement('script');
      wk.type = 'application/javascript'; wk.async = true;
      wk.src = '<?php echo WEBKITE_JAFAR_SCRIPT; ?>';
      document.body.appendChild(wk);
      window.Webkite = { jafarState: 'injected' };
    }
  })();
</script>
