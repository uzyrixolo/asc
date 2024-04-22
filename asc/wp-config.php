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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'asc' );

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
define( 'AUTH_KEY',         '>ha+t25AE!cC ^be3z^XV}:b{Ovi^6txDW=w?$k(:I*?2:Jp4s2&ugwCt/allUG6' );
define( 'SECURE_AUTH_KEY',  '^T5Nz8MCnWqE%$k+zwvi{MTd7<i%d=D`m=(X$}j&(PsI*5>ts`BNKy([xu-W:0Ek' );
define( 'LOGGED_IN_KEY',    'yF2Y-!8h)knsFz%9|V9}y: }]C9<DOM[Jyr[tKEn6:L2jWAOi1xW|8|-_?mwg{X[' );
define( 'NONCE_KEY',        '~y:hk0B/+fs6Aw)ID2kgqA E0&;-)JR?n:lM+?j)15.R2LClnw;jhzEQ3_nEDd=b' );
define( 'AUTH_SALT',        'E9V8Q` hPW>Zu?bb=sW uX? @])-t1?I|(-+->CH~f(Li=(RoCb`82;=4R#BUwD*' );
define( 'SECURE_AUTH_SALT', 'J:rV`-|V+.vv6x*1n^*dmms4,Kq|FDFI<DeK>5@OmgZDZtEX7y)N9Rd0MHtdnVS6' );
define( 'LOGGED_IN_SALT',   '~@/u`BkXB1Nxk#JhDgFI#+4pSG)^c),;I|)1K/<f:k3}xI$ *Pt9+kbev&thXrps' );
define( 'NONCE_SALT',       'Lq<R fMeJe= $uc(e)ind7(r)zsJ.g_kmFW!,x3|qg.|*szOz$d)-:DB9Z_:dhD2' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
