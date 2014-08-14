<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */


// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'madkkqbe_wordpress');

/** MySQL database username */
define('DB_USER', 'madkkqbe_admin');

/** MySQL database password */
define('DB_PASSWORD', '!Q59Q9WxmfZB');

/** MySQL hostname */
define('DB_HOST', 'localhost:8889');

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
define('AUTH_KEY',         'fL>7X%1^ w+^2p-VEo_W+r4*e1+.%Snx5_s[UKVp$;|1Vd!*[u0Ft`gjjTm(]$+<');
define('SECURE_AUTH_KEY',  '/`r7&4A.m2UeXD(W<bzu|4Goa1eMC_0pl>yEe1XWDw-R+o4.u5]~G^gaN{qT#HHW');
define('LOGGED_IN_KEY',    'Wgh^NXz8NJz3A]-?-LBYyCEEwnnc._I[.B|hbt: !<.qr^m3Ssy&@9hMa|K/)f]f');
define('NONCE_KEY',        'm(>HQ7j);x6iSpyDY/t9+S,9-H,.-czzP9k^p0B>: F#|kn#a3pBOOf&>MsC<NhK');
define('AUTH_SALT',        'N0NcmQ,A nOD9!9xwu/0R4#7f[:QJiM|Xq|+-^7^[5( AJH|F.a!D+MdRd8X30mo');
define('SECURE_AUTH_SALT', 'MCk}-^5Z|AcTy*e[Be;Vimik8;^!m[cpW RQD4f#R(:j!-?+f]-h.R33@+C_`KN1');
define('LOGGED_IN_SALT',   'zK0++|)-#}P8:SdYa_t:U9?T2PQ-o{ZKJs7b;WN!miJjr_NxfA}?G{ec+YrAGECA');
define('NONCE_SALT',       'CM*#H&K9d!&S&6%+hlOl=RPzkMcOSnK]JQQ0LXE 2>2DQaz*7rqG.W^<L0b@kJ<9');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Increasing memory allocated to PHP
* http://codex.wordpress.org/Editing_wp-config.php#Increasing_memory_allocated_to_PHP
*/
define( 'WP_MEMORY_LIMIT', '64M' );

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

