<?php
// Begin AIOWPSEC Firewall
if (file_exists('/home/e/evkarn/preview_evkarn_ru/public_html/gliga-fe-wp/aios-bootstrap.php')) {
	include_once('/home/e/evkarn/preview_evkarn_ru/public_html/gliga-fe-wp/aios-bootstrap.php');
}
// End AIOWPSEC Firewall
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
define( 'DB_NAME', 'evkarn_gligafe' );

/** Database username */
define( 'DB_USER', 'evkarn_gligafe' );

/** Database password */
define( 'DB_PASSWORD', 'HCQSSP!8r7NLBXFB' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1:3308' );

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
define( 'AUTH_KEY',         '9|Fs1z<c9:43H+aZpA`Rw22zEqpT#5dVG^!N:fm}FfC+nEJgL_jpz?5P_^qs%Dqh' );
define( 'SECURE_AUTH_KEY',  'UU9{qdn.hS3KJH9b;ybGlv[,#gVRZ4?KM,R:[t1$dJJY&HQ]2{ChX#}C;!mI:;O0' );
define( 'LOGGED_IN_KEY',    '!g+@-pjc)/KhHaoXwgQYA1PE}{@mv ocw%z@Y.>nHv=#-1R0Sq8N6}.kb-N=zTX=' );
define( 'NONCE_KEY',        '6TcT0z@drWh!UBs]h4:T9>B$g<6#L43&K[!Vp3:kCI=kxCm7=tvc>{D8oIDE$ZsC' );
define( 'AUTH_SALT',        '299@d/ifX@+4>Ga<!]SXeV(qo+ QmJ>Z)mB>_v<0F%Ukrh8JNf=)#q4|6LFvAZ2k' );
define( 'SECURE_AUTH_SALT', 'pcm%4_l6M@^,XA?*5`ggj@Akde&JfJwO}3h%ckXS$;!SeQBr v wL3+mr5y.QA,W' );
define( 'LOGGED_IN_SALT',   'Kd: 1S>bfc89Pf=*on3@qr]NkfiKJqB!R(vS@tVp0)Fb%qCC{dSdMg4RTVr8m9GC' );
define( 'NONCE_SALT',       'c|W/o[}d/qCeN}*]xgI:@sCA+&ZOV)zkqe,=qLgBK6*6S,X{E!B$#!+LLd~#9PL9' );

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
$table_prefix = 'wpgfe_';

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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';