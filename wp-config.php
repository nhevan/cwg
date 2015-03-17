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
define('DB_NAME', 'i789177_wp6');

/** MySQL database username */
define('DB_USER', 'i789177_wp6');

/** MySQL database password */
define('DB_PASSWORD', 'N#vlwoU]Mg74)]7');

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
define('AUTH_KEY',         '48alr5T2wYSIGUZ0zfI0qxyDT6WpQCMKGJG94oPTY0Oy3nErS7dH5YmlKxPymRZ8');
define('SECURE_AUTH_KEY',  '55JmGPwhPC5CjTlCdpzDj7UyixJsS2UUppwXWQlHQiD2fOQrfI2bXEXQ3PdArece');
define('LOGGED_IN_KEY',    'u8bLKmJd1BatqfSu7l5x98OyiGzsdzxucAj0X22b3rNVEEcBHmydNqxgezSEG3j7');
define('NONCE_KEY',        'yslYiRmIXWyEqvXlneXfSMqzGl8LYe6WX3IjRsqB7GgPQmL65F5sISvZ0FQq114L');
define('AUTH_SALT',        'XTU1RtshU7u8rEhxRmn3sCCvO5ziKKKndwqdjU4R84G8lJlfS6YyZj41VeXOvB1B');
define('SECURE_AUTH_SALT', 'xPvfS4UpR6xLwcgHEDQuhi762K0uRHljkEq6qYugSH39s2jjUx2jseWVtIf1gzrq');
define('LOGGED_IN_SALT',   'DQF9XVF2E7SUifjIc38RLS0lJ0LuGGosC6U8C0LIHbtGtS2CraFFNCpkOJdyQxJH');
define('NONCE_SALT',       '6sRDlJuCXXYakymKBV6ROgOKPkup24rt9Ci3XvZOzlkWEJG6ieYOF8KIibjcqjci');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
