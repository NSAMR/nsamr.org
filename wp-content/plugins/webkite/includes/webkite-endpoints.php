<?php
  global $webkite_dev_mode;
  $webkite_dev_mode = false;

  //production
  define( 'WEBKITE_GRAYSKULL_ENDPOINT', 'https://admin.webkite.org' );
  define( 'WEBKITE_JAFAR_SCRIPT', '//jafar.webkite.org/stable/webkite.min.js' );
  define( 'WEBKITE_RR_URL', '//results.webkite.org' );
  define( 'WEBKITE_THEME_URL', '//iago.webkite.org' );
  define( 'WEBKITE_TOKEN_URI', 'https://auth.webkite.org' );
  define( 'WEBKITE_ERROR_URL', 'https://errors.webkite.org' );
  define( 'WEBKITE_THEME_MANIFEST_URL', '//iago.webkite.org' );
  define( 'WEBKITE_ADMIN_URL', 'https://admin.webkite.com' );
  define( 'WEBKITE_IFRAME_ORIGIN', 'https://flan.webkite.org/wordpress' );


  // leave be
  define( 'WEBKITE_INTERCOM_ID', 'fcc31f41969f0373fc4f36198ef77be9307df8aa' );
  define( 'WEBKITE_HB_PATH', WEBKITE_IFRAME_ORIGIN );
