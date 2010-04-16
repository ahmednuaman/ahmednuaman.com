<?php
/** 
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information by
 * visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
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
define('DB_NAME', 'ahmednuaman_com_wp');

/** MySQL database username */
define('DB_USER', 'ahmednuaman_com');

/** MySQL database password */
define('DB_PASSWORD', 'd23d33a9210fb4c228e603fccaaed670');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',        '-{QrR^kGl;T~6-oO-~JWmmRJ+ZQ^}L{!4Gp+PP~C@%pUFiu>`WrOFpw~t*]NlpPY');
define('SECURE_AUTH_KEY', ' i.u}+J#Yt;RC0<r-y{-|j}:M>g(gZ3rLcrpPD41;^NUUJS#w16$pNdW+t)`4mf6');
define('LOGGED_IN_KEY',   'z(J{*d-+S7~zZduZ~3iX?O47.Z{JB,w+7%4|-e<4Hg/yG;R|6L$dj |O/UfmA4?8');
define('NONCE_KEY',       '{Tw@+Vkn1d@Ja^U}q,8O+Fi5J7.u|c<vC7vG$*(_>n>k)vgg`x(tJUd;[+[|dl/B');
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
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', '');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
