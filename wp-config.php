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
define('DB_NAME', 'devwp');

/** MySQL database username */
define('DB_USER', 'dev');

/** MySQL database password */
define('DB_PASSWORD', 'Pa22w0rd');

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
 * You can generate these using the {@link http://api.wordpress.org/secret-key/1.1/ WordPress.org secret-key service}
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Q@wfvgwrN%xlGJ@JfT#hbER8$(SKklx&AihindHbe1N2mnh0CNp(mQ)ZmNbCyKZ$');
define('SECURE_AUTH_KEY',  'YZuPLRW0k^FicNYcSf&diM^g)yNyDc^6jIWyw%B1FVzxynWr58BUwwd!X@BG9HDa');
define('LOGGED_IN_KEY',    '4pXJUr3Sa4ABvxU%zL@oxpZAMnGuLMfM9XgYJtWBfK6Q$hx5U5s$gZlRsN!X&*A$');
define('NONCE_KEY',        '8bm@6&8F(A04n&UL%6imG(7X0z@w@bpfubYRbwtWm3!RBQXQHK3LWc6GMT#$kYtO');
define('AUTH_SALT',        'sfWHOCSU9yxGfxOdZLI8Kwm!hYxp9XhVcxM0SYqar^FlVC3wRZ0SEJ$!)%yOyyYr');
define('SECURE_AUTH_SALT', 'luNaeM!$luPisjFgA1oWre5E!GrzC0%z5x&X^TaE4$uQ@zRwF^$abT7B7GSEv4Z*');
define('LOGGED_IN_SALT',   '2^Lm!Lh)7PhHvvV^#Cd%qdeZt6lsxdBwD5W*VL6(iGQIxucA(M9zg&YBRGIfo14W');
define('NONCE_SALT',       'Q^qhLQrDT%tRBB7HHS!jHekHgaOd^3b9(bEHLylbJY2Xj)IaDQhDqNZi$UQ0qh6h');
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
define ('WPLANG', 'en_US');

define ('FS_METHOD', 'direct');

define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

?>
