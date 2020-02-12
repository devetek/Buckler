<?php 
//Begin Really Simple SSL Server variable fix
$_SERVER["HTTPS"] = "on";
//END Really Simple SSL

//Begin Really Simple SSL Load balancing fix
if ((isset($_ENV["HTTPS"]) && ("on" == $_ENV["HTTPS"]))
|| (isset($_SERVER["HTTP_X_FORWARDED_SSL"]) && (strpos($_SERVER["HTTP_X_FORWARDED_SSL"], "1") !== false))
|| (isset($_SERVER["HTTP_X_FORWARDED_SSL"]) && (strpos($_SERVER["HTTP_X_FORWARDED_SSL"], "on") !== false))
|| (isset($_SERVER["HTTP_CF_VISITOR"]) && (strpos($_SERVER["HTTP_CF_VISITOR"], "https") !== false))
|| (isset($_SERVER["HTTP_CLOUDFRONT_FORWARDED_PROTO"]) && (strpos($_SERVER["HTTP_CLOUDFRONT_FORWARDED_PROTO"], "https") !== false))
|| (isset($_SERVER["HTTP_X_FORWARDED_PROTO"]) && (strpos($_SERVER["HTTP_X_FORWARDED_PROTO"], "https") !== false))
|| (isset($_SERVER["HTTP_X_PROTO"]) && (strpos($_SERVER["HTTP_X_PROTO"], "SSL") !== false))
) {
$_SERVER["HTTPS"] = "on";
}
//END Really Simple SSL


require_once(__DIR__ . '/vendor/autoload.php');

(new \Dotenv\Dotenv(__DIR__.'/'))->load();

/** 
 * Adding /blog to request uri (/wp-admin), will used by wordpress in somewhere
 */
if (strpos($_SERVER['REQUEST_URI'], 'wp-admin') !== false) {
  $_SERVER['REQUEST_URI'] = "/blog".$_SERVER['REQUEST_URI'];
}

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
define( 'DB_NAME', getenv('DB_NAME'));

/** MySQL database username */
define( 'DB_USER', getenv('DB_USER'));

/** MySQL database password */
define( 'DB_PASSWORD', getenv('DB_PASSWORD'));

/** MySQL hostname */
define( 'DB_HOST', getenv('DB_HOST'));

/** Wordpress Site Url */
define( 'WP_SITEURL', getenv('WP_SITEURL'));

/** Wordpress Home Url */
define( 'WP_HOME', getenv('WP_HOME'));

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '');

/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ':s9+qt-u-,K@xaK&ERqPrDvq!JJdnhhv[u 2vb6_wA[rhk,hE%Lm$jlCtYb#5,RE');
define('SECURE_AUTH_KEY',  'yAfoGWc|F?[-T!GL;_#1$+u7, pGQ+EjYb+ApxYq~4$QYK]&BPy0q~67wAFBUWoG');
define('LOGGED_IN_KEY',    '/vmu2$S#@r:h+|RuVmn8dpW<}|wyeRbGV.kPFruKz|i#MNAB7E-81r-h^&-K/L)Z');
define('NONCE_KEY',        '^}l4juY1<+OM|oFV/ JpJ-Ct#U{X@S^&[Cs`8P;Rz:UUkDS3q^l|+!vcZjSf7&#V');
define('AUTH_SALT',        'R>L/o]!T9Vtpn;4fy=AhTU|6n%tSls6@N~+Jl]Q|s MtYnf5`7BPfFAZQ/F|M 3S');
define('SECURE_AUTH_SALT', 'gGAtiG:/QtC,<u-Mz|zOf$P[S>eI4tu.4iNt)icca-cF+dNV-3n`#yPFas2xjie/');
define('LOGGED_IN_SALT',   'Al!t)]u6d<[>O4U0QH(U!~,Y=G~-6*>t+e>*/x@j(&TO+lt6/40Cei6&3T]aA4GL');
define('NONCE_SALT',       ',w/KuN>4r<Fae5!Q#<!^3Tqe&RD$w!(9qQ_*tC<OKJLO-w|rShn#EGFz%LJfZvWz');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = getenv('DB_TABLE_PREFIX');

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
define( 'WP_DEBUG', filter_var(getenv('WP_DEBUG'), FILTER_VALIDATE_BOOLEAN) );
define( 'WP_DEBUG_LOG', filter_var(getenv('WP_DEBUG_LOG'), FILTER_VALIDATE_BOOLEAN) );
define( 'WP_DEBUG_DISPLAY', filter_var(getenv('WP_DEBUG_DISPLAY'), FILTER_VALIDATE_BOOLEAN) );

// If we're behind a proxy server and using HTTPS, we need to alert Wordpress of that fact
// see also http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
	$_SERVER['HTTPS'] = 'on';
}

// WP Environment to set setting environment
define( 'WP_ENV', getenv('WP_ENV'));

//Begin Really Simple SSL Server variable fix
$_SERVER["HTTPS"] = WP_ENV === 'development' ? "off" : "on";

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );