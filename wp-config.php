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
define( 'DB_NAME', 'fas_medical_summit' );

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
define( 'AUTH_KEY',         '9iPw=!uvk-F7tZ4.ugh-ut}J#KxQkwOE#GRx-@~mRq,z|hg1%X;J!BrR;>oMJzv2' );
define( 'SECURE_AUTH_KEY',  'A{<Lm~p}m!MUh.6}zlzC(, Kl#~|h]6u%!8wIxKr hGTar`Tnk<F#<-_%/oST]py' );
define( 'LOGGED_IN_KEY',    'O=Op9-W%Mf1&7$E|8pSBFJytA0X+$&}7E~;lLQfGd(><aA;yZ[ejD?yuF,yDj=KX' );
define( 'NONCE_KEY',        '4SNhqyV?6P?1b;NXSL>_~P,E,v5{tgkC5T_6N.aZ?}Ge>TY&]snmG?O GsLnWdsP' );
define( 'AUTH_SALT',        '!_z!*zR*4HZx.]/Xa4k;>v7;#ey#*|ye5FYJqa:lX9 </.m,SHVWc-;#iAe.j]KB' );
define( 'SECURE_AUTH_SALT', 'Xk]Xj^.&{aL+OCo]7O89XDj}9A.9+!FI*HZyHtnukTp=:.;%z>n9/j0t.CzgU2zV' );
define( 'LOGGED_IN_SALT',   'ehR`f;>{<)hf{6,@ho  PX&B?I$SSOqV7W%6jiTy;cj?*c$/PAar2EdlA$W2<m p' );
define( 'NONCE_SALT',       'E2C`u1XO,/@5_l[^WZlc>f>HbT!]KPhpMli0)G-[7^*fdT0vpxkL]-4u6f(4Y#+o' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
