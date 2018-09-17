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
define('DB_NAME', 'wp-unite');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'i2E>G>oJj)xJ`4Q/j$!7@Dg4bn^OH_h%xs-b@*)W?ddP+G$x4ObvU&gPC[.v4 J(');
define('SECURE_AUTH_KEY',  'vxrzNma&(8O?`3Qp1cUEyB6UaF]27lGNX^8n2M:A0z!]|%V{6)P~+=<v]d9sDTf}');
define('LOGGED_IN_KEY',    'G)xAt5f<lyunPrP(9=siz}qrZWTTpfuqwCUY|)%0NY1?v/%pFf4e%MiZSQRE0V{h');
define('NONCE_KEY',        'F9U>H?Fr#)k|Eg_>{Ou}9 hk J{8FCR4-:GhVuc`qMG<]0ZwEk$jiLwzwL_VN&$w');
define('AUTH_SALT',        'pDEW*R7G9XJQJ:%b0RQgpRU@MfrmV&xu%Ag`aF-}[MVA_;`8$1]La)) ?HcGs?dN');
define('SECURE_AUTH_SALT', 'ah?z@#9f1`y73ayCW9?)|2m4fV5-]%it=R_7qfWdqHLS})VnE&+r-?FR9NdfX8GV');
define('LOGGED_IN_SALT',   'n}WPIM~}iGs$+X+M5tk,m3X(EqopJtZ^Diei/BowIchu<xFOWoYX.>O<4XM(3M+C');
define('NONCE_SALT',       '8&[52-;0Pj4Q*S;*Y%rK:fgL=#&Cz6g^7qK^Rw>K(PS9Uc@,~sZ[@o9yiGv0xrph');

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

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
