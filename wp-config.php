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
define('DB_NAME', 'crazyquizzer');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'coderslab');

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
define('AUTH_KEY',         'i?^-xYSwTzc;ztSt&TGhCPb44UlI<_HA*/Jpw~rUbD@t}ZHNv2a=cn,djXej70o ');
define('SECURE_AUTH_KEY',  'Sv.[DsqS=9.+d1w%mTtqslimdoe*/5(h`,6O36!k[+5iVj#&MZahOe[6xJ;$If8a');
define('LOGGED_IN_KEY',    'q>yI~*m]XzG9XPrCvBv&LKtcNpuV^;L8u5-QW ubaEazWSo~Lp;J=95=xO`BLtjo');
define('NONCE_KEY',        ';VlK6foiG`!*!ft:D+fY55`s9h:<NQ=rgpQ)A5f&w7?G~ >deGU~<e`skWm+-uR3');
define('AUTH_SALT',        'v8c]{[*#m {i]xQ >c1=P`%A.`/@C)yqUC]lw$)IG9UUQ`$4GVLf4rso)d/eQ%@}');
define('SECURE_AUTH_SALT', 'YiADY$cEK~kx+TKMZ*oU8V*.cf-gb7Kd2Olk$za4>Mmww{gwYIG0H<K8AKsZ^Kfp');
define('LOGGED_IN_SALT',   'R{3V>6P ]c=f*WR2I=8=U,ara]v6jAIJzNA5J3 c!cG-]b^L-.zxv%N1Aj2N|ZXL');
define('NONCE_SALT',       'Vh}&!V8S=A&viU}Ro,b.(|8N)Ok/Nr(?Y0/3@s-c+Z:#|f!^G-|r[pbjs[Ie]*Q5');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'cq_';

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
