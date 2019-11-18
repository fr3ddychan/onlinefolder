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
define( 'DB_NAME', 'onlinefolder_db' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'kZH`(:2 %;0j!;1:s7R{0X3_.mKRN1erh?NB8bp.rDwJnTby98(C2>r6Uyn)i?K<' );
define( 'SECURE_AUTH_KEY',  '}[#w^@{0)Yw]R,W;]:_1D]e6ATg+s)TG+.IxlWu1b?]]:<F-6,b3tdX`M623xjQU' );
define( 'LOGGED_IN_KEY',    '-wAzX$2Y^ 4J@aQDxw+?EPnr*ArVo+Ekg;+hiE3_[NCVu*]&X}jlIPo[AJSJ`V]k' );
define( 'NONCE_KEY',        'GkOmN8Y)7d?)N_I[$9?,!=Z8M^p((Aa5 %nOzxz{dD=;POoI/7:]p7X;4,CRJp~!' );
define( 'AUTH_SALT',        'O2t{x{_Y9Zv%RwC@5|-{~Q#sjxg73o(0l/j:N<[xt38.skCI9C=M2=&un%4_d[!d' );
define( 'SECURE_AUTH_SALT', 'x9K-?xCi~H&4,Xqsr6$s5T(&bo+iD_J`7?3AKe_qhEGiO*:Xiy6+bLPc]29O`V+w' );
define( 'LOGGED_IN_SALT',   '.7& 4IyDX31q-h}]0I/@PsA9LjsQ?YbutnyFZ8A{;xy ,62HSG;hkMy0/{c{4^~s' );
define( 'NONCE_SALT',       '$A$6D~AIZL`^Nbrs$}+;`6|EpM*5<jQ-fY%9j*.Zq/wo8//v-=eS`{:c>#NLE[Uj' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
