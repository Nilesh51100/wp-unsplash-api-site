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
define( 'DB_NAME', 'id9848616_wp_05e610df1cfeb0837be1cd32b087339d' );

/** MySQL database username */
define( 'DB_USER', 'id9848616_wp_05e610df1cfeb0837be1cd32b087339d' );

/** MySQL database password */
define( 'DB_PASSWORD', 'da2ea8ffdcf5f0024159dc4d0247bfe6c9e26ccb' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'Xpe,Z #q;`Jpp66NC{:}s3hm~,)`* &C3O|s~$}LB@DphxX{r^6DO/^-*(:KbGzy' );
define( 'SECURE_AUTH_KEY',   'V1uj`{d_$tCPfb+xSNiHPO<vSpP 0-/u.vU,E(k67VTM#ySKg6|4p{G9_MvD~V|[' );
define( 'LOGGED_IN_KEY',     '-17NM3]#15za.IWe1D2 |1V=TnmfcE_<A,EkFbXE^jF57jV^a)N{:(3TZD@WNeID' );
define( 'NONCE_KEY',         ':0IYIA0%W3_@UUFu%X?X-fs?32+/Ms4_`q-HkO3;x%?Yovx6jkyweC1P+8G}FSa;' );
define( 'AUTH_SALT',         '9D> ~;he ,>&K~@PezFk[7IBNE<yWm>?[Pv&5bU<[o-tNw]p:>E1W!h8t<KB]k?#' );
define( 'SECURE_AUTH_SALT',  'n/R0qTOqe(/>![EnA ]7aN.v8_{W<*EIOF]3e-/8Q]Z~`usDMr1{^9aO1GR%*H C' );
define( 'LOGGED_IN_SALT',    'pb<#k{nCrL,?C$?kS H+l(let#8-MKey?uqr?mr0sw?O<Bs@aYZa92&l)QI}kxKZ' );
define( 'NONCE_SALT',        '@)lSZL2)v=</=AVa!|C#(8N/oc^ZR!ihTt<H>:<i_4J(W+ [7M|/&!Liz^57!!eD' );
define( 'WP_CACHE_KEY_SALT', '9pLg5$DoPX P,8=) bq!xPe4Yi2ow/?22cM+2Net;F1(+c4uu,,NQX(q[0G#;gn*' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
