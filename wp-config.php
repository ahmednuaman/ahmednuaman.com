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

$json_config	= @file_get_contents( $_ENV['CRED_FILE'], false );

if ( $json_config == false )
{
	$creds	= array(
		'MYSQLS_DATABASE'	=> '_ahmednuaman',
		'MYSQLS_PASSWORD'	=> '',
		'MYSQLS_PORT'		=> '3306',
		'MYSQLS_HOSTNAME'	=> 'localhost',
		'MYSQLS_USERNAME'	=> 'root'
	);
}
else
{
	$creds	= json_decode( $json_config );
	
	$creds	= $creds[ 'MYSQLS' ];
}

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', $creds['MYSQLS_DATABASE']);

/** MySQL database username */
define('DB_USER', $creds['MYSQLS_USERNAME']);

/** MySQL database password */
define('DB_PASSWORD', $creds['MYSQLS_PASSWORD']);

/** MySQL hostname */
define('DB_HOST', $creds['MYSQLS_HOSTNAME']);

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
define('AUTH_KEY',         'a9WAN1hI30Y2?QJjr=^G~VG0%*|7OcXAT>F=MtueObV9&u*@r|gv[3Nx:Wc>aH7-');
define('SECURE_AUTH_KEY',  'U+S,%P(Zo5zVo?s3uCjl|%~L.z9PPjNJFpx^g-=l*h;,O(8}1gB=1q]Dzfz6#uAv');
define('LOGGED_IN_KEY',    '5BKL37@%P<$Dyhx(ip%FZ[X90JYv3F]o!m(s5ER/b@LD9|t37lA.~q_C*OYF$@TP');
define('NONCE_KEY',        'l<}M2-leMbm$*jnX3hl$,`Gd6qO6ehpLthJN-.d+,U)kE:C[b06@.}X&wrQ&Qjb|');
define('AUTH_SALT',        'Zd+X+@r^^(.Lv{eT)c8h@l5?}!m4rm[]BjL4-2g-O#>r+fb_9>OP[96Q;>i5tC[/');
define('SECURE_AUTH_SALT', 't7N|1}w/9tTo:02wf-t5hq+OW#y;VV%jV@?PP#-)*j Oi-&%-B?.SFP|H6P%)4K>');
define('LOGGED_IN_SALT',   'R,|{uA*&FMt8dtOSBnJ=%-%0pwNNGpAY!F%L:Bv:m^$vzm|~?AaV!w&k|ApjlqBL');
define('NONCE_SALT',       '59s^KR,IsGOVf $[3+I*T?9+K+.E{V3z qFAVT. vi4QCqRkx- &2?DicOLRF#&V');

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
define('WP_DEBUG', !$json_config);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
