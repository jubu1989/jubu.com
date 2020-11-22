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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'jubu.com_db' );

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
define( 'AUTH_KEY',         'KZ!7lILpA[HA`UPgvM]t3qTy2}O_5xP0zo|HW%2>jl(z9:U2j#]:7f?]Fu>e9h=e' );
define( 'SECURE_AUTH_KEY',  '(Oe!C-d[#0oJ3{d-<djK5}MP3@1i35{[-+]xqil^Q&{XZb@P.a]b1>4BNvM=L}/i' );
define( 'LOGGED_IN_KEY',    ')+Swc)azV5~ NxY,j8ziP336N ]`9iB0f68X4IRyO`/|fWsZMJ~{#:`R)b2<f4qT' );
define( 'NONCE_KEY',        ')&/BbJ,=.VW63Xv@MA=T%>8XJO3WOT]jG@4W=sL@|F:c%U%4F8Aw|/9jv;i1;>(Y' );
define( 'AUTH_SALT',        'h~-0YAEr0n[{BznSpOp%^g 0b=r*6gQ+HU(r92nO[I8vi1U6$E`HkUE!E$$534;3' );
define( 'SECURE_AUTH_SALT', 'f`8w&Z@`bgsNE{>OV(V9*:A^j7cf+ky4R-KElYi#q Bn2SxIzUwzh/7j(Gq#c`=$' );
define( 'LOGGED_IN_SALT',   '(wu14Unr9(N=GRz?r,,N@AP&(wPgD{>)Czqi&Hd&nUq!:$h`o^t$Obp#r KA&k~9' );
define( 'NONCE_SALT',       'a={lB`w:DT?M3)$Cut#-H~r1z_IKc}9AjRygA1@7%k>bW+#hy]y~^IYubqC9 qGW' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
