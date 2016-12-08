<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'nsamrorg_main');

/** MySQL database username */
define('DB_USER', 'nsamrorg_main');

/** MySQL database password */
define('DB_PASSWORD', 'DatabaseNs@mr2016');

/** MySQL hostname */
define('DB_HOST', '10.169.0.78');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '=QNGZxY+f*?0A75s8T(9Mx;kK$Cqx{I|y8h;@I1,4 -4u vRq|4,Ri#0C-j}It6P');
define('SECURE_AUTH_KEY',  '(9Hv%ZL!fujc_MWpG x D12,+rahVn}3BjRS}c,A/91g_FRk{V)O2(<lc{e1{W1Z');
define('LOGGED_IN_KEY',    'R-)m([3G%Rix@;!s#G!kQu}+iB^=38i7q(o|WSR;[#YCSJ fVMSU7+&n PO`N@XW');
define('NONCE_KEY',        'eA0FRo&y8:}0Mj&dr|h rN/{!Er[J9:s@k`{(L<PmE`7?^w4xmW1*P7o;:*b*K?D');
define('AUTH_SALT',        'fQtSW#o#<3NB|!3!JxI!!:{b3)L[bY<M{}>/eH2}erXgG>+$@m|gKx1$?fHoH)`F');
define('SECURE_AUTH_SALT', '1bE&tX->|^CA1&@X4oUQPbS;I|vRyfw-, 4r!.X>Aj-Z-zaK{Yp18]hUsWI+-wF2');
define('LOGGED_IN_SALT',   'mZhy$ ;==#N;_/|=(VQ^C+=w,^2 Ibt}H8N+?E>YJx}|1*B+H;;NF/>Dso|$:Y9/');
define('NONCE_SALT',       'uNL,<dx3pq)qY=q|b+@!%Y;|kn27I<6r%jptDdQTQ~pQz@+=461>m/$9QZ}_d2fu');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

define('ADMIN_COOKIE_PATH', '/');
define('COOKIE_DOMAIN', '');
define('COOKIEPATH', '');
define('SITECOOKIEPATH', '');

define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', true);
define('DOMAIN_CURRENT_SITE', 'www.nsamr.org');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

/* Multisite */
define( 'WP_ALLOW_MULTISITE', true );

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
