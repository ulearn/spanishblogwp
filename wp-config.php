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
define('DB_NAME', 'engcrs_wp');

/** MySQL database username */
define('DB_USER', 'engcrs_admin');

/** MySQL database password */
define('DB_PASSWORD', 'Aracna5bia');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '!8tA&J]ybm[_i6v2>@.u<~uMJE1f[vw3x|-yB qY>VJ(lKx+(cPyn>0Xzjga%X, ');
define('SECURE_AUTH_KEY',  ']*NuOIOvR*5Ad`kTBv_7MGtO_I37v(Bk>+[)?wPpO~p]U%.-o9#k|J->z6rP]Yd2');
define('LOGGED_IN_KEY',    'dJ|$s+,J17vfk97Ht-jmQZmjvz?_m0!<&)phcca:T_v)M0s%&}~ik:<]I}B9kdDz');
define('NONCE_KEY',        '7E0wiMfB&-UNV-{!Z})A Pa?BY|:-G=!/xq!2_ax1la`If25k-aAP`O|+[]|?BkG');
define('AUTH_SALT',        'Sk_AV[`<`D si@ts&(^?sV8rdM)c!-WVjX`l4| cX278eDkT[QOdnavOV&m8*$5n');
define('SECURE_AUTH_SALT', '#RI;/arR%x>+[{<DD^^wP;4+?(+3sqD([rwf<P;+v]FT_?=8OH1 q=1W{8@vpHRL');
define('LOGGED_IN_SALT',   '3=rdrj]t:gFP>T?1bv*|,6f?Eq4moVL4f+A`<7:})U2[?SHsPn|S[](,0p2jFA+l');
define('NONCE_SALT',       'zLA{PJ.;A[$ee%SN4/7z`Y#~<:|g-|y!DJZ:}TyM3Q0;Of>GX+,|tn2KpDFVl}r)');

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
