<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'kycK-2*L(o.`pi->CY6kbP,`-Eg| `d}2qa$0|`,9Y-yla)KA2W)5d,]Lk(= o)*' );
define( 'SECURE_AUTH_KEY',  '}%XyyS8`Aj ]%&IZdGLX%9!]15qD-7zyK! dW;zr#nT3bqoLvqTNW?hWXo#9>a01' );
define( 'LOGGED_IN_KEY',    'YB`$RV7KWQ(ZFtydp9,#pfKvN5XFnBidvC<W<Z5dv1L&}NSovl}V6hk}rwCUS@4c' );
define( 'NONCE_KEY',        'HnO=H%f>JKIRb>]Ec-KiUCs?V]iYn]hFE}e43.L]|74o}E5~_S)(hLa/!Zb@<Wka' );
define( 'AUTH_SALT',        '<ZU=g[43Mj&%z8XFhV>fQQa3n0h*Q3-CVKMFNIXd(&=&|4M.N`l{ICqW.|/!#svg' );
define( 'SECURE_AUTH_SALT', '=Jut*Q JUTR0YaplXGT5JE1oUotmvT[9iSCqkJfR_(Vc0d|UY3_[![V3?MogD=9q' );
define( 'LOGGED_IN_SALT',   '9iqfBT:l:C k7?Hr`p0t+y<<O^^la8qNu3},QqDwS],9>c D91pW#ub+pv`8[oaT' );
define( 'NONCE_SALT',       '*M+qK`zP&fnMm|{zR{X@5*WSQSPdm#N#2V3xr,G>[?P:[ vqdD+_]Ec:-i,9z-~x' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
