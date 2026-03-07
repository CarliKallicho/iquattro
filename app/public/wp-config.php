<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'k++ I#68~TA:W!01RRrg){2^35 RuRha9_Ug H!$vA!NL:`Ci :{!KE|9?Y)qZ k' );
define( 'SECURE_AUTH_KEY',   '@5.;8nzf&!?:d~dLzX0AG<?p(4gBjMe|+p0Gbl^Cn Ss;)tAWoVI3b|hP(uH_D^t' );
define( 'LOGGED_IN_KEY',     'a^V@)N&#rJ&EzOy$&q+E I3ck.Rs|XTL_wmTTFpKv|{/XenB;Rn5?sAUk:s>_A`_' );
define( 'NONCE_KEY',         'eD-z!P!M+ 0vv$E(N[#HArJNAwfFoXqTkZb*w0HVKUe+t44E O&R/i^vMF+!LNsv' );
define( 'AUTH_SALT',         'c7bt(n 0_MLnO{W4}`:)LIX=8G$%2%v|ONY`6TZQ3!M/F^G<Yw]X@-@|.a:R>}:6' );
define( 'SECURE_AUTH_SALT',  '.crgpiUG(7LYxQWtB2vXgfQ-m{0g^m5 ?o)B9 ~rYrhBj<,&zTffaDla4dsRp`oD' );
define( 'LOGGED_IN_SALT',    ':PRM=>p2F2kXEp;{60?<m0]T0:BH)f45JB~l;p+!goXPkzpx$v;eHv5A}M-u`>K4' );
define( 'NONCE_SALT',        'eT$@miOkZ/.g-u5A4>QP+d<s$.JeyJpXb`e3nb`8IFZZ@W B]S0U aVE.Sf*8~9.' );
define( 'WP_CACHE_KEY_SALT', '+oUU>H=}B!ZGBQJ2On2up9{-yTG|R||XQfU.TBtGu9OpT+!>qvh JDYJiVdv8NkC' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
