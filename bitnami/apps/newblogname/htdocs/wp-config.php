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
define('DB_NAME', 'bitnami_newblogname');

/** MySQL database username */
define('DB_USER', 'bn_newblogname');

/** MySQL database password */
define('DB_PASSWORD', '72950ad161');

/** MySQL hostname */
define('DB_HOST', 'localhost:3306');

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
define('AUTH_KEY',         'd0d81aac4a8118c18183118f72c6b28efe9cc146b14669bc2e6142f45d8d7d08');
define('SECURE_AUTH_KEY',  '2fe36875e931c10536a2f1738ebe43c9c4a5378906878bfe6e3da3f0f6c241b4');
define('LOGGED_IN_KEY',    '47e0752d10bb24d15f67c52ec60df291a2bed061f650685eba63310ea7d1a3f7');
define('NONCE_KEY',        'edfe1b41a94eda542f0623abbfaec02e6b2185323062180699e521adb8dc1914');
define('AUTH_SALT',        '66c520888c2d97da49678a011dc4fd90f9c05ce65d358b190e75ba187f03e298');
define('SECURE_AUTH_SALT', 'a02b2c202be61f1d12dd653214aecd02325ba6c1f6f8e83ee78d79d0d206d41e');
define('LOGGED_IN_SALT',   '7c763b698480b7206886684454210a223c59aea682781e1c9659eea4ffed6b8f');
define('NONCE_SALT',       'f6977996ec843b2884d419316284bac7c99ba4411de0705345c784853e77de83');

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
/**
 * The WP_SITEURL and WP_HOME options are configured to access from any hostname or IP address.
 * If you want to access only from an specific domain, you can modify them. For example:
 *  define('WP_HOME','http://example.com');
 *  define('WP_SITEURL','http://example.com');
 *
*/

define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/newblogname');
define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST'] . '/newblogname');


/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define('WP_TEMP_DIR', '/opt/bitnami/apps/newblogname/tmp');


define('FS_METHOD', 'ftpext');
define('FTP_BASE', '/opt/bitnami/apps/newblogname/htdocs/');
define('FTP_USER', 'bitnamiftp');
/*define('FTP_PASS', 'bitnamiftp');*/
define('FTP_HOST', '127.0.0.1');
define('FTP_SSL', false);



//  Disable pingback.ping xmlrpc method to prevent Wordpress from participating in DDoS attacks
//  More info at: https://wiki.bitnami.com/Applications/Bitnami_Wordpress#XMLRPC_and_Pingback

// remove x-pingback HTTP header
add_filter('wp_headers', function($headers) {
    unset($headers['X-Pingback']);
    return $headers;
});
// disable pingbacks
add_filter( 'xmlrpc_methods', function( $methods ) {
        unset( $methods['pingback.ping'] );
        return $methods;
});
