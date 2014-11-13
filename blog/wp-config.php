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
define('DB_NAME', 'WordPress');

/** MySQL database username */
define('DB_USER', 'wpuser');

/** MySQL database password */
define('DB_PASSWORD', 'wpuser');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('FS_METHOD', 'direct');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '0T,Xb{1t@hs7E!tAB9Wg)E|R#-NNwm&E@Fm4pY}=#QXVGXVm@GM|V_-)y>0=?!.G');
define('SECURE_AUTH_KEY',  '|e;,;<=/`_Co:6a=Av?8wf$-JNq`qj!UPy5y|x4a 8)r|+(GKLJ^#XRv5e?(]bb9');
define('LOGGED_IN_KEY',    '~S-[LXEqI-d>OqsuEB$IOQde=-n,Bi|DHRTD%-]<M:]$#+dL,sO?sw^4E: pn(:A');
define('NONCE_KEY',        'M3+w7Hj|?g-`%pty|p+o}<,I-^2-*(Am|#b/93[+J6Qm9Fu2$zu&x/e2UO0]Gpl=');
define('AUTH_SALT',        '[Lb1LEAn+TE(1>5loJsH m>|O|Hv=>Dch>1Y0jV+Oy#fHs:$@rzv0I]dpOb;4)Y9');
define('SECURE_AUTH_SALT', 't#Mu:.[K]pV*@Z*o}? /MH7=|R9uUYW-Q1D;:eJ7HTZA[Xfxv5uPve%Ic8*l |--');
define('LOGGED_IN_SALT',   '+E-2(l?hZy2qCQg`3_pqy?^mPC5|`>{C9]X+-c2]Ocu_d}zr4T:1M]*#>U=<MI-9');
define('NONCE_SALT',       ';5>s?{SxiK8W[{-K%>13Kc+4:QA/VyZVe.GS&`N7]@~UF)mzZFPGocbL;b`M~1M#');

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

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
